<?php
/**
 * Template Name: Videos Page
 *
 * @package ChooseNJ
 * @author Princeton Partners
 */

get_header('choose'); ?>

<style type="text/css">

.video {
    max-width: 290px;
    margin: 5px;
    background: #eee;
    border: solid 3px #eee;
}
.video a {
	text-align: center;
	padding: 63px 0;
    display:block;
}
.vimeo-play {
    background-image: url("http://www.choosenj.com/wp-content/themes/ChooseNJ/images/vimeo-play-button-gray.png");
    background-repeat: no-repeat;
    padding: 21px 43px;
}
.vimeo-play:hover {
	background-image: url("http://www.choosenj.com/wp-content/themes/ChooseNJ/images/vimeo-play-button-blue.png");
	background-repeat: no-repeat;
    padding: 21px 43px;
}
img.scale-with-grid, #Content img {
    max-width: 100%;
    width: 100%;
    height: auto;
    /*min-height: 250px;*/
}
.gutter-sizer { 
	width: 4%; 
}
.mfp-bottom-bar {
	font-family: 'ITCFranklinGothicStd-MdCd', Arial, sans-serif !important;
    margin-top: -110px;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    cursor: auto;
    padding: 10px 0;
    background: #000;
    opacity: 0.70;
    height: 50px;
}
.mfp-title {
    text-align: left;
    line-height: 18px;
    color: #F3F3F3;
    word-wrap: break-word;
    padding: 10px 20px;
}
.mfp-image-holder .mfp-close {
    color: #FFF !important;
    right: 0px;
    text-align: right;
    padding-right: 6px;
    width: 100%;
    top: 35px;
    width: 35px;
}
.mfp-counter {
    position: absolute;
    top: 25px;
    right: 20px;
    color: #CCC;
    font-size: 12px;
    line-height: 18px;
    white-space: nowrap;
}
.video-gallery {margin:0 0 50px 0;}

.isoContainer {
    min-height: 750px;
    height: auto !important;
}

</style>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- Main Content -->
		<div class="sections_group">
			<div class="entry-content" itemprop="mainContentOfPage">
				<div class="fluid-centered isoContainer popup-gallery">
				<?php
					$args = array(
						'posts_per_page' => 21,
						'post_type' => 'videos',
						'order'   => 'ASC'
					); ?>
					<?php $the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) {
							while ( $the_query->have_posts () ): $the_query->the_post(); ?>

							<div class="row">
								<div class="container video-gallery">
									<h3 class="gallery-heading" style="text-align:center;"><?php echo the_title(); ?></h3>
									<?php if( have_rows('videos_gallery') ): ?>
										<?php while( have_rows('videos_gallery') ): the_row(); 
											$youtube = get_sub_field('youtube_video');
											$vimeo = get_sub_field('Vimeo_video'); 
											$vid_thumbnail = get_sub_field('video_thumbnail'); ?>
												<div class="video vc_col-xs-12 vc_col-sm-6 vc_col-md-3 vc_col-lg-3" style="background-image: url('<?php echo $vid_thumbnail; ?>'); background-size: cover;">
													<?php if( $youtube ): ?>
														<a href="http://www.youtube.com/watch?v=<?php echo $youtube;?>"><span class="vimeo-play" style="width:85px; height:56px;"></span></a>
													<?php elseif( $vimeo ): ?>
														<a href="https://vimeo.com/<?php echo $vimeo;?>"><span class="vimeo-play" style="width:85px; height:56px;"></span></a>
													<?php endif;?>
												</div>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>

							<?php endwhile; ?>
						<?php } else {} ?>
					<?php wp_reset_postdata();?>
				</div>
		</div>

			<!-- Contact Section-->
			<?php get_template_part('contact-us') ?>

		<!-- /.Main Content -->
		</div>


	</div>
</div>

<script src="http://www.choosenj.com/wp-content/themes/ChooseNJ/js/packery.pkgd.min.js"></script>

<script type="text/javascript">

	// Fade In Content
	jQuery('body').hide().fadeIn(500);

	// Isotope
	jQuery(window).load(function(){
	    var $container = jQuery('.isoContainer');

	    $container.packery({
	        itemSelector : '.photo',
	        filter: '*',
  			 gutter: 0
	    });
	});

	// Gallery Popup
	jQuery(document).ready(function() {
	    jQuery('.popup-gallery').magnificPopup({
	          	delegate: 'a',
	          	type: 'iframe',
	          	tLoading: 'Loading image #%curr%...',
	          	mainClass: 'my-mfp-zoom-in',
	          	gallery: {
	            	enabled: true,
	            	navigateByImgClick: true,
	            	preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	          	},
	          	image: {
	            	tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
	            	titleSrc: function(item) {
	              	return '<small>by Choose New Jersey</small>';
	            }
	        }
	    });
	});

</script>

<?php get_footer('choose'); ?>