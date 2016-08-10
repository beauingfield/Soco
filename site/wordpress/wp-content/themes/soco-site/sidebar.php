<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Soco Site
 */
?>

<div class="single-post-page">
	<div class="container">

		<?php
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			return;
		}
		?>

		<div class="sidebar">	
			<div id="secondary" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- #secondary -->
		</div>
	</div>
</div>