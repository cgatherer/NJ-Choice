<?php
/**
 * The Template for displaying all single photos content type.
 *
 * @package ChooseNJ
 * @author Princeton Partners
 */

get_header('choose'); ?>

<style type="text/css">

.fluid-centered {
    width: 100%;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    /*padding-left: 130px;
    padding-right: 130px;*/
}

.photo {
	/*max-width: 460px;*/
	/*margin:10px;*/
	padding: 0px 3px;
}

img.scale-with-grid, #Content img {
    max-width: 100%;
    width: 100%;
    height: auto;
    /*min-height: 250px;*/
}


.gutter-sizer { width: 4%; }

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

</style>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- Main Content -->
		<div class="sections_group">
			<div class="entry-content" itemprop="mainContentOfPage">
				
				<div class="fluid-centered isoContainer popup-gallery">
					<div class="container">
						<?php 
							$images = get_field('gallery');

							if( $images ): ?>
								<?php foreach( $images as $image ): ?>
								    <div class="photo vc_col-xs-12 vc_col-sm-6 vc_col-md-3 vc_col-lg-3">
								        <a href="<?php echo $image['url']; ?>">
								            <img src="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>" alt="<?php echo $image['alt']; ?>" />
								        </a>
								        <!--<p><?php echo $image['caption']; ?></p>-->
								    </div>
								<?php endforeach; ?>
						<?php endif; ?>
					</div>
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
	          	type: 'image',
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
