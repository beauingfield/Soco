<?php

 function add_media_box() {
 		wp_enqueue_media();

 		//Register and enqueues the required javascript
 		wp_register_script('meta-box-image', get_bloginfo('template_directory'). '/inc/meta-box-image.js', array('jquery'));
 		wp_localize_script('meta-box-image', 'meta_image', array(
 			'title' => 'Select or Upload an image for the Staff',
 			'button' => 'Use this image'
 		));

 		wp_enqueue_script('meta-box-image');
 }
 add_action('admin_enqueue_scripts', 'add_media_box');

function soco_home_settings(){

	if(!current_user_can('manage_options')) {
		wp_die('You do not have sufficient permissions to access this page.');
	} else {

		// Set Keys
		$CTAOne = get_option('CTAOne');
		$CTATwo = get_option('CTATwo');
		$CTAThree = get_option('CTAThree');

		$menuDinner = get_option('PDF Dinner Menu Link' );
		$menuWine = get_option('PDF Wine Menu Link' );
		$menuBar = get_option('PDF Bar Menu Link' );
		$menuDessert = get_option('PDF Dessert Menu Link' );
		$menuBrunch = get_option('PDF Brunch Menu Link' );
		$menuLibations = get_option('PDF Libations Menu Link' );

		// Get menu Items for Links
		$locations = get_nav_menu_locations();
		$menuItems = wp_get_nav_menu_items(2);

		global $wpdb;

		// Get all uploaded images.
		$results = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file' ");

	?>

		<div class="wrap">
			<h2>Home Page Settings</h2>
			<form method="post" action="">

				<table width="100%">

					<!-- Page Intro -->
					<tr>
						<td colspan="3" width="100%">
							<h3>Intro</h3>
							<h4>Page Title</h4>
							<input type="text" name="home-page-title" id="home-page-title" value="<?php echo get_option('home_page_title'); ?>" style="width: 100%;">

							<!-- <h4>Banner Image</h4>
							<input type="text" name="home-page-banner" id="home-page-banner" value="<?php echo get_option('home_page_banner'); ?>" style="width: 100%;"> -->

							<h4>Page Introduction</h4>
							<textarea name="home-page-text" id="home-page-text" rows="10" style="width: 100%;"><?php echo stripslashes(trim(get_option('home_page_text'))); ?></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<h3>Call to Actions</h3>
						</td>
					</tr>

					<tr>
						<td colspan="3">
							<div class="postbox">
								<h4 style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0;">Upload Files</h4>

								<div style="padding: .5em">

									<a href="#" class="openMedia button-secondary">Image</a>

								</div>
							</div>
						</td>
					</tr>

					<!-- CTA One -->
					<tr>
						<td width="33.333%">

							<div class="postbox">

								<h4 style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0;">CTA One</h4>

								<div style="padding: .5em">

									<table width="100%">
										<tr>
											<td>Title:</td>
											<td>
												<input type="text" name="cta-one-title" id="cta-one-title" value="<?php echo $CTAOne['Title']; ?>" style="width: 100%;">
											</td>
										</tr>
										<tr>
											<td>Background Image URL:</td>
											<td>
												<select name="cta-one-bg" id="cta-one-bg" style="width: 100%;">
												<?php 

													foreach($results as $result){

														$imgID = get_post($result->post_id);
														$imgTitle = get_the_title($result->post_id);
														$imgCaption = $imgID->post_excerpt;
														$imgURL = $imgID->guid;

														if ($imgCaption == 'Home CTA'){ ?>

															<option value="<?php echo $imgURL; ?>" <?php if($CTAOne['Image'] == $imgURL): echo 'selected'; endif; ?>><?php echo $imgTitle; ?></option>

														<?php }

													};

												?>
												</select>
											</td>
										</tr>
										<tr>
											<td>Link to Content:</td>
											<td>

												<select name="cta-one-link" id="cta-one-link" style="width: 100%;">
												<?php 

													foreach($menuItems as $menuItem){
														$menuURL = $menuItem->url;
														$menuTitle = $menuItem->title;
												
												?>
														<option value="<?php echo $menuURL; ?>" <?php if($CTAOne['URL'] == $menuURL): echo 'selected'; endif; ?>><?php echo $menuTitle; ?></option>
														
												<?php } ?>

												</select>

											</td>
										</tr>
									</table>

								</div>

							</div>

						</td>

						<!-- CTA Two -->
						<td width="33.333%">

							<div class="postbox">

								<h4 style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0;">CTA Two</h4>

								<div style="padding: .5em">
									<table width="100%">
										<tr>
											<td>Title:</td>
											<td>
												<input type="text" name="cta-two-title" id="cta-two-title" value="<?php echo $CTATwo['Title']; ?>" style="width: 100%;">
											</td>
										</tr>
										<tr>
											<td>Background Image URL:</td>
											<td>

												<select name="cta-two-bg" id="cta-two-bg" style="width: 100%;">
												<?php 

													foreach($results as $result){

														$imgID = get_post($result->post_id);
														$imgTitle = get_the_title($result->post_id);
														$imgCaption = $imgID->post_excerpt;
														$imgURL = $imgID->guid;

														if ($imgCaption == 'Home CTA'){ ?>

															<option value="<?php echo $imgURL; ?>" <?php if($CTATwo['Image'] == $imgURL): echo 'selected'; endif; ?>><?php echo $imgTitle; ?></option>

														<?php }

													};

												?>
												</select>

											</td>
										</tr>
										<tr>
											<td>Link to Content:</td>
											<td>
												<select name="cta-two-link" id="cta-two-link" style="width: 100%;">
												<?php 

													foreach($menuItems as $menuItem){
														$menuURL =$menuItem->url;
														$menuTitle = $menuItem->title;
												
												?>
														<option value="<?php echo $menuURL; ?>" <?php if($CTATwo['URL'] == $menuURL): echo 'selected'; endif; ?>><?php echo $menuTitle; ?></option>
														
												<?php } ?>

												</select>
											</td>
										</tr>
									</table>
								</div>

							</div>

						</td>

						<!-- CTA Three -->
						<td width="33.333%">

							<div class="postbox">

								<h4 style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0;">CTA Three</h4>

								<div style="padding: .5em">

									<table width="100%">
										<tr>
											<td>Title:</td>
											<td>
												<input type="text" name="cta-three-title" id="cta-three-title" value="<?php echo $CTAThree['Title']; ?>" style="width: 100%;">
											</td>
										</tr>
										<tr>
											<td>Background Image URL:</td>
											<td>

												<select name="cta-three-bg" id="cta-three-bg" style="width: 100%;">
												<?php 

													foreach($results as $result){

														$imgID = get_post($result->post_id);
														$imgTitle = get_the_title($result->post_id);
														$imgCaption = $imgID->post_excerpt;
														$imgURL = $imgID->guid;

														if ($imgCaption == 'Home CTA'){ ?>

															<option value="<?php echo $imgURL; ?>" <?php if($CTAThree['Image'] == $imgURL): echo 'selected'; endif; ?>><?php echo $imgTitle; ?></option>

														<?php }

													};

												?>
												</select>

											</td>
										</tr>
										<tr>
											<td>Link to Content:</td>
											<td>
												<select name="cta-three-link" id="cta-three-link" style="width: 100%;">
												<?php 

													foreach($menuItems as $menuItem){
														$menuURL =$menuItem->url;
														$menuTitle = $menuItem->title;
												
												?>
														<option value="<?php echo $menuURL; ?>" <?php if($CTAThree['URL'] == $menuURL): echo 'selected'; endif; ?>><?php echo $menuTitle; ?></option>
														
												<?php } ?>

												</select>
											</td>
										</tr>
									</table>

								</div>

							</div>

						</td>
					</tr>
					<tr>
						<td colspan="3">
							<div class="postbox">
								<h4 style="padding: 1em; border-bottom: 1px solid #e9e9e9; margin: 0;">Menu PDF's</h4>
								<div style="padding: .5em">
									<p>Dinner Menu</p>
									<select name="dinner-menu-link" id="dinner-menu-link" style="width: 100%;">
									<?php 

										foreach($results as $result){

											$imgID = get_post($result->post_id);
											$docTitle = get_the_title($result->post_id);
											$docCaption = $imgID->post_excerpt;
											$docURL = $imgID->guid;

											if ($docCaption == 'Menu'){ ?>

												<option value="<?php echo $docURL; ?>" <?php if($menuDinner == $docURL): echo 'selected'; endif; ?>><?php echo $docTitle; ?></option>

											<?php }

										};

									?>
									</select>
								</div>
								<div style="padding: .5em">
									<p>Wine/Cocktails</p>
									<select name="wine-menu-link" id="wine-menu-link" style="width: 100%;">
									<?php 

										foreach($results as $result){

											$imgID = get_post($result->post_id);
											$docTitle = get_the_title($result->post_id);
											$docCaption = $imgID->post_excerpt;
											$docURL = $imgID->guid;

											if ($docCaption == 'Menu'){ ?>

												<option value="<?php echo $docURL; ?>" <?php if($menuWine == $docURL): echo 'selected'; endif; ?>><?php echo $docTitle; ?></option>

											<?php }

										};

									?>
									</select>
								</div>
								<div style="padding: .5em">
									<p>Bar Plates</p>
									<select name="bar-menu-link" id="bar-menu-link" style="width: 100%;">
									<?php 

										foreach($results as $result){

											$imgID = get_post($result->post_id);
											$docTitle = get_the_title($result->post_id);
											$docCaption = $imgID->post_excerpt;
											$docURL = $imgID->guid;

											if ($docCaption == 'Menu'){ ?>

												<option value="<?php echo $docURL; ?>" <?php if($menuBar == $docURL): echo 'selected'; endif; ?>><?php echo $docTitle; ?></option>

											<?php }

										};

									?>
									</select>
								</div>
								<div style="padding: .5em">
									<p>Dessert</p>
									<select name="dessert-menu-link" id="dessert-menu-link" style="width: 100%;">
									<?php 

										foreach($results as $result){

											$imgID = get_post($result->post_id);
											$docTitle = get_the_title($result->post_id);
											$docCaption = $imgID->post_excerpt;
											$docURL = $imgID->guid;

											if ($docCaption == 'Menu'){ ?>

												<option value="<?php echo $docURL; ?>" <?php if($menuDessert == $docURL): echo 'selected'; endif; ?>><?php echo $docTitle; ?></option>

											<?php }

										};

									?>
									</select>
								</div>
								<div style="padding: .5em">
									<p>Brunch</p>
									<select name="brunch-menu-link" id="brunch-menu-link" style="width: 100%;">
									<?php 

										foreach($results as $result){

											$imgID = get_post($result->post_id);
											$docTitle = get_the_title($result->post_id);
											$docCaption = $imgID->post_excerpt;
											$docURL = $imgID->guid;

											if ($docCaption == 'Menu'){ ?>

												<option value="<?php echo $docURL; ?>" <?php if($menuBrunch == $docURL): echo 'selected'; endif; ?>><?php echo $docTitle; ?></option>

											<?php }

										};

									?>
									</select>
								</div>
								<div style="padding: .5em">
									<p>Brunch Libations</p>
									<select name="libations-menu-link" id="libations-menu-link" style="width: 100%;">
									<?php 

										foreach($results as $result){

											$imgID = get_post($result->post_id);
											$docTitle = get_the_title($result->post_id);
											$docCaption = $imgID->post_excerpt;
											$docURL = $imgID->guid;

											if ($docCaption == 'Menu'){ ?>

												<option value="<?php echo $docURL; ?>" <?php if($menuLibations == $docURL): echo 'selected'; endif; ?>><?php echo $docTitle; ?></option>

											<?php }

										};

									?>
									</select>
								</div>
							</div>
						</td>
					</tr>
				</table>

				<input type="submit" class="button-primary" value="Save Settings" name="save-settings" />
			</form>
		</div>

<?php
		if(isset($_POST['save-settings'])) {
			UpdateHomepage();
		}
	}
}

function UpdateHomepage() {

	$CTAOneSection = array(
		'Title' => $_POST['cta-one-title'],
		'Image' => $_POST['cta-one-bg'],
		'URL' => $_POST['cta-one-link']
	);

	$CTATwoSection = array(
		'Title' => $_POST['cta-two-title'],
		'Image' => $_POST['cta-two-bg'],
		'URL' => $_POST['cta-two-link']
	);

	$CTAThreeSection = array(
		'Title' => $_POST['cta-three-title'],
		'Image' => $_POST['cta-three-bg'],
		'URL' => $_POST['cta-three-link']
	);

	//Update Content
	update_option('home_page_title', $_POST['home-page-title']);
	update_option('home_page_banner', $_POST['home-page-banner']);
	update_option('home_page_text', stripslashes(trim($_POST['home-page-text'])));
	update_option('CTAOne', $CTAOneSection);
	update_option('CTATwo', $CTATwoSection);
	update_option('CTAThree', $CTAThreeSection);
	update_option('PDF Dinner Menu Link', $_POST['dinner-menu-link']);
	update_option('PDF Wine Menu Link', $_POST['wine-menu-link']);
	update_option('PDF Bar Menu Link', $_POST['bar-menu-link']);
	update_option('PDF Dessert Menu Link', $_POST['dessert-menu-link']);
	update_option('PDF Brunch Menu Link', $_POST['brunch-menu-link']);
	update_option('PDF Libations Menu Link', $_POST['libations-menu-link']);

}
?>