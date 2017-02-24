<?php
/**
 * Template Name: Sub Level 2
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
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
});

window.setTimeout(function(){doScroll()},7000);

function doScroll(hash){
	if(window.location.hash) {
		var hash = window.location.hash;
		hash = hash.slice(1);
		//hash = "a[name=" + hash + "]";
		//alert(hash);
		var element_to_scroll_to = document.getElementsByName(hash)[0];
		element_to_scroll_to.scrollIntoView();
		// jQuery(document.body).animate({
		//     'scrollTop':   jQuery(hash).offset().top
		// }, 2000);
	}
}

</script>

<?php get_footer('choose'); ?>
