<?php
/**
* PHONES CLASS
*
* @package              Phones
* @author               $Author$
* @version              $Rev$
* @lastrevision $Date$
* @filesource   $URL$
* @license              $License: http://creativecommons.org/licenses/by-sa/3.0/$
* @copyright    $Copyright: (c)2010 Chuck Burgess. All Rights Reserved.$
*
* Please feel free to visit my blog http://blogchuck.com
*
* Description of Class, usage, and documentation can be found on the wiki: 
* http://code.google.com/p/blogchuck/wiki/PhonesClass
* 
*/
class Phones{
	// optional country code (will always be 1)
	private $us_cc_regex = '(?:1)?';
	
	// base
	private $npa = '[2-9][0-8][0-9]';
	private $nxx = '[2-9][0-9]{2}';
	private $xxxx = '[0-9]{4}';
	
	// inalid area_codes
	private $invalid_npa = '37[0-9]|96[0-9]|[2-9]11'; // 37x & 96x set aside : x11 not used as area codes
	private $invalid_nxx = '[2-9]11';  // x11 not used as NXX codes either
	
	// invalid phone numbers
	private $invalid_nxx_xxxx = '555(01([0-9][0-9])|1212)';
	
	# FILTERS #
	// filtered area_codes ($npa IS this number)
	private $toll_free = '8(00|22|33|44|55|66|77|80|81|82|88)'; // valid toll free area code designations
	private $special = '[2-9](00|11|22|33|44|55|66|77|88|99)';      // known as ERCs, designated as special services (duplicates the 8 x11 codes)
	
	#subsets of special
	private $toll = '900';
	private $service = '500';
	private $carrier = '700';
	
	
	/**
	 * Filters
	 * 
	 * This will append the regex to filter phone numbers based on business rules.
	 *
	 */
	function _buildFilter($filter){
		switch (strtolower($filter)) {
			case 'toll_free':
				$filter_regex  = '|'.$this->toll_free;
				break;
			case 'toll':
				$filter_regex  = '|'.$this->toll;
				break;
			case 'toll_all':
				$filter_regex  = '|'.$this->toll_free.'|'.$this->toll;
				break;
			case 'service':
				$filter_regex  = '|'.$this->service;
				break;
			case 'carrier':
				$filter_regex  = '|'.$this->carrier;
				break;
			case 'special':
				$filter_regex  = '|'.$this->special;
				break;
			case 'all':
				$filter_regex  = '|'.$this->toll_free.'|'.$this->special;
				break;
			default:
				break;
		}
		return $filter_regex;
	}
	
	
	/**
	 * Clean the phone number for verification
	 *
	 * Basic rules of the phone number will eliminate the invalid data:
	 * âˆš - phone numbers contain numbers only (no letters, puncuation, etc.)
	 * âˆš - phone numbers may include extensions (which need to be detached)
	 * 
	 */
	function cleansePhone($phone){
		// split the phone on x. if there is an extension, the string will most likely always have an x
		list($phone, $ext) = split('x', $phone);
		
		// remove anything that is not a digit from the phone number
		$phone = preg_replace('/\D/', '', $phone);
		
		// remove anything that is not a digit from the extension
		$ext = preg_replace('/\D/', '', $ext);  
		
		// return the cleansed numbers
		return array($phone, $ext);
	}

	/**
	* Validation Rules: (http://www.nanpa.com/area_codes/)
	*  Reference Information
	*   - http://en.wikipedia.org/wiki/North_American_Numbering_Plan#List_of_NANPA_countries_and_territories
	*
	* NPA (Area) Codes (NXX)
	* âˆš - N is any digit 2 thru 9 (area code cannot start with a 1)
	* âˆš - N11 service codes not used as area codes (i.e. 911, 811, 711)
	* âˆš - N9X expansion codes cannot be used (known as expansion codes) 
	* âˆš - 37X & 96X cannot be used (set aside for unanticipated purposes)
	*
	* Central Office Codes (exchanges, prefixes, or simply NXXs)
	* âˆš - N cannot be 0 or 1
	*
	* Carrier Identification Codes (CIC) XXXX
	* âˆš - X is any digit 0-9
	*
	* Phone Number
	* âˆš - phone number cannot be 555-0100 thru 555-0199 (fictional numbers)
	* âˆš - phone number 555-1212 is for information (not assignable)
	*
	* Filters
	* There are a base set of filter that can be applied during the validation process.
	* - TOLL_FREE
	* - SPECIAL
	*       - TOLL
	*       - SERVICE
	*       - CARRIER
	* - ALL
	* 
	* TODO:
	* Add filters for:
	* - NPA country (US|CANADA)
	* - NPA state/province
	* - custom filtering
	*/
	function validatePhone($phone, $filter = null){
	
		// check to see if there is a filter
		if(isset($filter)){
				$filter_regex = '';
				// check to see if the filter is an array
				if(is_array($filter)){
						// concantenate each filter
						foreach($filter as $name){
								$filter_regex .= $this->_buildFilter($name);
						}
				}else{
						$filter_regex = $this->_buildFilter($filter);   
				}
		}
		
		list($phone, $ext) = $this->cleansePhone($phone);
		
		// basic regex to confirm the phone number is one that can be called
		$regex = '/^'.$this->us_cc_regex.'(?(?!('.$this->invalid_npa.$filter_regex.'))'.$this->npa.')(?(?!('.$this->invalid_nxx.'))'.$this->nxx.$this->xxxx.')(?<!('.$this->invalid_nxx_xxxx.'))'.'$/';

		// return valid phone with ext otherwise, false
		if(preg_match($regex, $phone))
		{
				return array($phone, $ext);
		} else {
				return false;
		}
			
	}
	
	
	/**
	 * Format the phone
	 * 
	 * $phone               : the phone number (could come in as 10 or 11 digits)
	 * $delimiter   : what to use as delimiters in the phone (defaults to dash)
	 * $format              : will determine what get's sent back
	 *        {default}     : formats what ever number is passed resulting in optional 1    
	 *                  10d : removes the 1 from the front and returns only xxx-xxx-xxxx
	 *            1+10d     : will add the 1 if it is not there returning 1-xxx-xxx-xxxx
	 *
	 * Return the phone number in a standard format after it has been cleansed, validated, and verified
	 * 10d          XXX-XXX-XXXX
	 * 1+10d        1-XXX-XXX-XXXX
	 *
	 * TODO:
	 * - allow (NPA)-XXX-XXX formatted phone numbers
	 */
	function formatPhone($phone, $delimiter = '-', $country_code = false){
		list($phone, $ext) = $this->cleansePhone($phone);
		
		if($country_code){
				$phone = preg_replace('/^(1?)([0-9]{3})([0-9]{3})([0-9]{4})$/', "1$delimiter$2$delimiter$3$delimiter$4", $phone);
		}else{
				$phone = preg_replace('/^(1?)([0-9]{3})([0-9]{3})([0-9]{4})$/', "$2$delimiter$3$delimiter$4", $phone);
		}
		
		// return the formated phone and extension
		return array($phone, $ext);
	}
		
}
?>