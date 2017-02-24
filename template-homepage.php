<?php
/**
 * Template Name: Home Page
 *
 * @package ChooseNJ
 * @author Princeton Partners
 */

get_header('choose'); ?>

<style text="text/css">
img.scale-with-grid,
#Content .flexslider img {
	max-width: 175%;
    height: auto;
}

body:not(.template-slider) #Header {
    min-height: 50px;
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

			<!-- Keys Industries Section -->
			<?php get_template_part('key-industries-slider') ?>

	        <!-- News Section-->
			<?php get_template_part('news-events') ?>

			<!-- Ambassador Section-->
			<?php get_template_part('ambassador-logos') ?>

			<!-- Contact Section-->
			<?php get_template_part('contact-us') ?>

		<!-- /.Main Content -->
		</div>


	</div>
</div>

<script type="text/javascript">

// Banner Fade In
jQuery(window).load(function(){
    jQuery("#home-banner").animate({"opacity": "1"}, 1000);
});

</script>

<script type="text/javascript">

jQuery(document).ready(function($){

		// Globally Connected animation
		jQuery(window).scroll(function(event){
			var y = jQuery(this).scrollTop();
			if(y = '#globally-connected-headline') {
				jQuery('h4.title').addClass('.ChooseInRightTitle');
			}
		});

		// 5 Reasons scrolling Buttons
		jQuery(".highly-educated-button").click(function() {
	    	jQuery('html, body').animate({
	        	scrollTop: $("#highly-educated").offset().top - 127
	    	}, 1200);
		});

		jQuery(".perfectly-located-button").click(function() {
	    	jQuery('html, body').animate({
	        	scrollTop: $("#perfectly-located-headline").offset().top - 127
	    	}, 1200);
		});

		jQuery(".world-class-button").click(function() {
	    	jQuery('html, body').animate({
	        	scrollTop: $("#world-class-infrastructure").offset().top - 127
	    	}, 1200);
		});

		jQuery(".globally-connected-button").click(function() {
	    	jQuery('html, body').animate({
	        	scrollTop: $("#globally-connected-headline").offset().top - 127
	    	}, 1200);
		});

		jQuery(".business-assistance-button").click(function() {
	    	jQuery('html, body').animate({
	        	scrollTop: $("#business-assistance").offset().top - 127
	    	}, 1200);
		});

		// Flex Slider
	    jQuery(window).load(function(){
		    var itemz = 1;
		    var itemwidth = 327;
		    if(window.innerWidth < 992){
			    itemz = 1;
			    itemwidth = 327;
		    } else{
			    itemz = 3;
			    itemwidth = 400;
		    }
	      	jQuery('.flexslider').flexslider({
	        	animation: "slide",
	        	controlNav: false,
	        	directionNav: true,
	        	itemWidth: itemwidth,
	        	itemMargin: 0,
	        	minItems: itemz,
	        	move: 1,
	        	start: function(slider){
	          		jQuery('body').removeClass('loading');
	        }
	    });

    });
});

</script>

<script type="text/javascript">

// Isotope
jQuery(window).load(function(){
    var $container = jQuery('.isoContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
});

jQuery("h1").click( function (e) {
	var anchor = jQuery(this).children().attr("href");
	if (anchor.search("#") === 0) {
		e.preventDefault();
		jQuery('html, body').animate({
			'scrollTop':   jQuery(anchor).offset().top - 127
		}, 2000);
		return false;
	}
});

</script>

<?php get_footer('choose'); ?>
