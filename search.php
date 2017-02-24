<?php
/**
 * The search template file.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */

get_header('choose');

$translate['search-title'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-title','Ooops...') : __('Ooops...','betheme');
$translate['search-subtitle'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-subtitle','No results found for:') : __('No results found for:','betheme');

$translate['published'] 	= mfn_opts_get('translate') ? mfn_opts_get('translate-published','Published by') : __('Published by','betheme');
$translate['at'] 			= mfn_opts_get('translate') ? mfn_opts_get('translate-at','at') : __('at','betheme');
// $translate['readmore'] 		= mfn_opts_get('translate') ? mfn_opts_get('translate-readmore','Read more') : __('Read more','betheme');
?>

<style>
	.news_post1,
	.alm-listing h4{
		margin: 0 !important;
	}
	.news-list-item h4 {
	    padding-top: 8px;
	}
	.news_post1:nth-child(2n){
		background: #EEEEEE;
	}
	.news-list-item h5,
	.first_page_search + .alm-btn-wrap,
	.first_page_search .news-list-item p,
	.alm-listing .container > div:nth-child(2),
	.alm-listing .container > div:nth-child(3){
		display: none !important;
	}
</style>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">
			<?php echo do_shortcode('[ajax_load_more post_type="page" category__not_in="4" search="'.$_GET['s'].'" posts_per_page="100" css_classes="first_page_search"]'); ?>
			<?php echo do_shortcode('[ajax_load_more post_type="post, ambassador_logo, testimonial" category__not_in="4" search="'.$_GET['s'].'"]'); ?>
			<!-- Search Items-->
			<!-- <div class="basic-panel1">
				<div class="basic-panel-inner1 isoContainer" style="overflow:hidden;"> -->

						<?php
							// $c = 0;
							// $oddpost = 'news_post1';
							//
							// $args = array(
							// 	'posts_per_page' => 100,
							// 	'order'   => 'ASC'
							// );
							// if ( have_posts() ) {
							//  	while (have_posts ()): the_post(); ?>
									<!-- <div style="width:100%;" class="<?php echo $oddpost; ?> grid-item"> -->
										<?php //echo get_template_part( 'content', 'newslist' ); ?>
									<!-- </div> -->
									<?php
								// 		$c++;
								// 		if( $c % 2 != 0) {
   					// 						$oddpost = 'news_post2';
         				// 					} else {
         				// 					    $oddpost = 'news_post1';
								// 	    }
								// endwhile;
							// } else { ?>
									<!-- <div class="snf-desc">
										<h2><?php //echo $translate['search-title']; ?></h2>
										<h4><?php //echo $translate['search-subtitle'] .' '. esc_html( $_GET['s'] ); ?></h4>
									</div> -->
						<?php
							// }
							// wp_reset_postdata();
						?>

				<!-- </div>
			</div> -->

			<!-- Contact Section-->
			<!-- <?php //get_template_part('contact-us') ?> -->

		<!-- /.Main Content -->
		</div>


	</div>
</div>

<?php get_footer('choose'); ?>
