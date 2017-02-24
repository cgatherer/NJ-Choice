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
			<div class="basic-panel1">
				<div class="basic-panel-inner1 isoContainer">
			
							<?php
								$args = array( 
									'posts_per_page' => 8, 
									'post_type' => 'page', 
									'category__in' => array(3), 
									'order'   => 'ASC' 
								);
								$query = new WP_Query( $args );
									// The Loop
									if ( $query->have_posts() ) {
										while ( $query->have_posts () ): $query->the_post(); 

											echo get_template_part( 'content', 'keystile' );

										endwhile; 
									} else {
									// no posts found
											echo "<h1 style='text-align:center;'>something went wrong!</h1>";
									}
								/* Restore original Post Data */
								wp_reset_postdata();
							//End Loop
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
	// Magnific Popup

	jQuery(window).load(function(){
		jQuery('.popup-modal').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#username',
			modal: true,
		});

	jQuery(document).on('click', '.popup-modal-dismiss', function (e) {
			e.preventDefault();
			jQuery('.popup-modal-dismiss').magnificPopup('close');
		});

});

</script>

<script type="text/javascript">

// Isotope
jQuery(window).load(function(){
    var $container = jQuery('.isoContainer');
    $container.isotope({
        filter: '*',
        layoutMode: 'fitColumns',
  		itemSelector: '.grid-item',
    });
});

</script>

<?php get_footer(); ?>