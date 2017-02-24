<?php
/**
 * The template for displaying all pages.
 *
 * @package Betheme
 * @author Princeton Partners
 */

get_header('choose'); ?>
	
<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .Main Content -->
		<div class="sections_group">
		
			<div class="entry-content" itemprop="mainContentOfPage">
				<?php 
					while ( have_posts() ){
						the_post();							// Post Loop
						mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
					}
				?>
			</div>
			
			<!-- Contact Section-->
			<?php wp_reset_postdata(); ?>
			<?php get_template_part('contact-us') ?>
	
		</div>

	</div>
</div>

<script type="text/javascript">
	// Fade In Content
	jQuery('body').hide().fadeIn(500);
</script>

<?php get_footer('choose'); ?>