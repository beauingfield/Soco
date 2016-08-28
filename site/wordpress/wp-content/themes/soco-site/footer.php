<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Soco Site
 */
?> 

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	
	    <div class="notification">	    	
	    	<a href="<?php bloginfo('template_directory'); ?>/_assets/pdf/magicalDining.pdf" target="_blank">
            	<img class="notification right" src="<?php bloginfo('template_directory'); ?>/_assets/img/magical-dining2.jpg" alt="Magical Dining logo">
            </a>
            <h5 class="notification"><strong>View PDF </strong> <span class="icon-arrowRight"></span></h5>
            <div class="container">
                <a href="http://www.orlandomagazine.com/Orlando-Magazine/May-2016/2016-Dining-Awards/" target="_blank">
                	<img class="notification" src="<?php bloginfo('template_directory'); ?>/_assets/img/orlando-mag-logo.jpg" alt="Orlando Magazine logo">
                	<h4 class="notification"><strong>Best Southern Restaurant</strong> - Orlando Magazine Dining Awards 2016</h4>
                	<div class="notification button buttonBlack">Read More</div>
                </a>				
            </div><!-- .container -->
        </div><!-- .notification -->
	
		<div class="subscribe" id="Subscribe">
			<div class="container">
				<!-- Begin MailChimp Signup Form -->
				<form action="//socothorntonpark.us8.list-manage.com/subscribe/post?u=bb4f005c8d8a16cfdf042776c&amp;id=5019239e64" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div class="formTable">
						<div class="formTableCell">
							<label for="mce-EMAIL">Sign up to receive updates and special offers</label>
						</div>
						<div class="formTableCell fullWidth">
							<input type="email" value="" name="EMAIL6" class="email" id="mce-EMAIL" placeholder="Your email address" required>
						</div>
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div class="formTableCell">
							<div style="position: absolute; left: -5000px;"><input type="text" name="b_bb4f005c8d8a16cfdf042776c_5019239e64" tabindex="-1" value=""></div>
							<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
						</div>
					</div>
				</form>
				<!--End mc_embed_signup-->
			</div><!-- .container -->
		</div><!-- .subscribe -->
		
		<div class="footer-container">
			<div class="footerInfo">
				<div class="container">
					<a href="tel:<?php echo str_replace("-", "", get_option('soco_phone' ));; ?>" class="phone hoverLink"><?php echo get_option('soco_phone'); ?></a>
					<span class="header2">Location</span>
					<a href="https://www.google.com/maps/preview?q=629+E+Central+Blvd,+Thornton+Park,+Downtown+Orlando&ie=UTF-8&ei=s73zU4LtDcblsASv5oDoAw&ved=0CAYQ_AUoAQ"
						target="_blank" class="redLink address">
						<strong>629 E Central Blvd, Thornton Park, <span>Downtown Orlando</span></strong>
					</a>
					<a href="#Subscribe" class="hoverLink newsletter triggerActive">Sign Up for Our Newsletter</a>
					<a href="#Subscribe" class="hoverLink newsletter triggerSlide mobile">Sign Up for Our Newsletter</a>
					<span class="header2">Hours</span>
					<a href="https://www.facebook.com/pages/Soco-Thornton-Park/837419106286087" target="_blank"> <span class="icon-facebook"></span></a>
					<a href="https://twitter.com/SOCOThorntonPk" target="_blank"> <span class="icon-twitter"></span></a>
					<a href="http://instagram.com/socothorntonpark" target="_blank"> <span class="icon-instagram"></span></a>
				</div><!-- .container -->
				<div class="container">
					<p><span class="break">Open Daily 5:00pm - 10:00pm</span> <span class="hide-stuff">|</span> <span class="break">Sunday Brunch 11:00am - 3:00pm</span> <span class="hide-stuff">|</span> © 2016 Soco Restaurant</p>
				</div><!-- .container -->
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
