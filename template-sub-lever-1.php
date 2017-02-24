<?php
/**
 * Template Name: Sub Level 1
 *
 * @package Betheme
 * @author Princeton Partners
 */

get_header('choose'); ?>

<style type="text/css">

#Content {
	padding-top: 50px !important;
}

</style>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- Main Content -->
		<div class="sections_group">
			<div class="entry-content" itemprop="mainContentOfPage">
				<!-- Main Content -->
                <?php
					while ( have_posts() ){
						the_post();							// Post Loop
						mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
					}
				?>
			</div>

			<!-- Sub-level 1 Gri-->
			<div class="vc_row">
				<div class="fluid-centered isoContainer">

						<?php
							$categories = get_the_category();
							$cat = $categories[0]->term_id;
							$postID = $post->ID;

							//var_dump($postID);

							if ( in_category( $cat ) ){
								$args = array(
									'posts_per_page' => 21,
									'post_type' => 'page',
									'category__in' => array($cat),
									'post__not_in' => array($postID),
									'order'   => 'ASC',
									//'orderby' => 'menu_order',
								);
								$the_query = new WP_Query( $args );
									if ( $the_query->have_posts() ) {
										while ( $the_query->have_posts () ): $the_query->the_post();
											echo get_template_part( 'content', 'keystile' );
										endwhile;
									} else {
									// no posts found
										echo "<h1 style='text-align:center; width:100%; padding: 50px 0 100px 0;'>No post in that category!</h1>";
									}
									/* Restore original Post Data */
								wp_reset_postdata();
								//End Loop
							} else {
							// no posts found
								echo "<h1 style='text-align:center; width:100%; padding: 50px 0 100px 0;'>No Category Selected!</h1>";
							}
						?>

				</div>
			</div>

			<!-- Contact Section-->
			<?php get_template_part('contact-us') ?>

		<!-- /.Main Content -->
		</div>


	</div>
</div>

<script type="text/javascript">

// Fade In Content
jQuery('body').hide().fadeIn(500);

// Isotope
jQuery(window).load(function(){
    var $container = jQuery('.isoContainer');
    $container.isotope({
        filter: '*',
        // animationOptions: {
        //     duration: 750,
        //     easing: 'linear',
        //     queue: false
        // }
    });
});

</script>

<?php get_footer('choose'); ?>
