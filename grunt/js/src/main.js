// Main javascript

// Culture page
	var tablet;
	var mobile;
$(document).ready(function(){

	//IE Detection
	if(Function('/*@cc_on return document.documentMode===10@*/')()){
		document.documentElement.className+=' ie10';
	}

	// Smooth scroll
	$('.icon-arrowDown').on('click',function (e) {
		e.preventDefault();

		var target = this.hash,
		$target = $(target);

		$('html, body').stop().animate({
			'scrollTop': $target.offset().top - 50
		}, 900, 'swing', function () {
			window.location.hash = target;
		});
	});

	// Banner fading image
	$(function(){
		$('.plate img:gt(0)').hide();
		setInterval(function(){
			$('.plate :first-child').fadeOut()
				.next('img').fadeIn()
				.end().appendTo('.plate');
		}, 4000);
	});


	// Check for mobile/tablet device
	var swTablet = document.body.clientWidth, breakpointTablet = 768, tablet = true;
	var swPhone = document.body.clientWidth, breakpointPhone = 640, mobile = true;
	var checkMobile = function() {
		// When setting variables inside functions for use later,
		// always set them up outside of the function.
		// Otherwise, an error will be thrown.
		tablet = (swTablet > breakpointTablet) ? false : true;
		mobile = (swPhone > breakpointPhone) ? false : true;
	};
	checkMobile();
	//Masonry for photos page
	if(!mobile) {
		$("#update-mansory").imagesLoaded(function(){
			$("#update-mansory").masonry({
				columnWidth: 320,
				gutter:20,
				isFitWidth:!0,
				itemSelector:".mansory-post"})
		});
	}

	// Class Toggle
	$(".triggerActive").on('click', function(event) {
		var triggerEvent = $(this).attr("href");
		event.preventDefault();
		$(triggerEvent).toggleClass("active");
	});

	// Fading in
	$(".triggerFadeIn").on('click', function(event) {
		var triggerEvent = $(this).attr("href");
		event.preventDefault();
		$(triggerEvent).stop(true, true).fadeIn(500);
	});

	// Fading out
	$(".triggerFadeOut").on('click', function(event) {
		var triggerEvent = $(this).attr("href");
		event.preventDefault();
		$(triggerEvent).stop(true, true).fadeOut(500);
	});

	// Slide Toggle
	$(".triggerSlide").on('click', function(event) {
		var triggerEvent = $(this).attr("href");
		event.preventDefault();
		$(triggerEvent).slideToggle();
	});

	$('.triggerSlide').on('click', function(event){
		if($(this).text() == "Read More"){
			$(this).text('Read Less');
		} else if($(this).text() == "Read Less") {
			$(this).text('Read More');
		}
	});

	// Tab Selection
	//$('.optionSelect a.tab').first().addClass('active');


	$('.menu-wrap .menuDisplay').first().addClass('active');
	//$('.pdf-menu-links .menuDownload').first().addClass('active');

	$('.optionSelect a.tab').on('click', function(e) {
		var activeTab = $(this).attr('href');
		var className = activeTab.replace('#', '');

		e.preventDefault();
		$('.optionSelect a.tab').removeClass('active');
		$(this).addClass('active');

		$('.pdf-menu-links .menuDownload.active').removeClass('active');
		$('.'+className).addClass('active');

		$('.tabDisplay').stop( true, true ).fadeOut(350);
		$(activeTab).stop( true, true ).delay(350).fadeIn(350);
	});
	var hash = window.location.hash.substr(1);
	console.log(hash);
	if(hash == 'group') {
		console.log('true');
		$('.optionSelect a[data-tab="group"]').trigger('click');
	}

	// Form Submission
	$('.submitForm').on('submit', function(e) {
		e.preventDefault();
		var href = $(this).attr('action');
		var data = $(this).serialize();

		$('input.error').removeClass('error');
		$('.submitForm .icon-exit').remove();
		$('.error-message').remove();

		$.ajax({
			url: href,
			type: 'POST',
			data: data,
			dataType: 'json',
			success: function(response) {
				if(response.mail == 'sent') {
					$('.thankyou-form').fadeOut(250, function() {
						$('.thankyou-message').fadeIn(250);
					});

				} else {
					delete response.error;
					for(property in response){
						console.log(property);
						$('[name="'+property+'"]').addClass('error').after('<span class="icon-exit"></span>');
					}
					$('.submitForm').append('<div class="error-message"><p>Validation errors have occured please confirm the fields and submit again, thank you.</p></div>');
				}
			}
		});
	});

});

$(window).load(function(){

	// Footer - copyright slide up on scrolling to bottom
	var body = document.body,
	html = document.documentElement;
	var height = Math.max( body.scrollHeight, body.offsetHeight,
	                   html.clientHeight, html.scrollHeight, html.offsetHeight );

	window.onscroll = function(ev) {
		if (!mobile) {
		    if ((window.innerHeight + window.scrollY) >= height - 119) {
		        $("body").addClass('footer');
		        $(".footer-container").addClass("relative");
		    }
		    if ((window.innerHeight + window.scrollY) < height - 1) {
		        $("body").removeClass('footer');
		        $(".footer-container").removeClass("relative");
		    }
		}
	};

});