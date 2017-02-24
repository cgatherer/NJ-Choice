<?php
/**
 * The template for displaying the footer.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */


$back_to_top_class = mfn_opts_get('back-top-top');

if( $back_to_top_class == 'hide' ){
	$back_to_top_position = false;
} elseif( strpos( $back_to_top_class, 'sticky' ) !== false ){
	$back_to_top_position = 'body';
} elseif( mfn_opts_get('footer-hide') == 1 ){
	$back_to_top_position = 'footer';
} else {
	$back_to_top_position = 'copyright';
}

?>

<?php do_action( 'mfn_hook_content_after' ); ?>

<!-- #Footer -->

<!-- #Sitemap Modal -->
<div id="sitemap-modal" class="zoom-anim-dialog mfp-hide">
	<button class="ubermenu-responsive-toggle ubermenu-responsive-toggle-open other_toggle close-popup" style="position:absolute;right:25px;top:20px;border-radius:50%; background: #F1F1F1;padding: 13px 9px 8px 12px !important;">
		<i class="fa fa-times" style="margin-right:0px;"></i>
	</button>
	<div class="vc_row wpb_row vc_row-fluid">
		<h1> Sitemap </h1>
		<?php
			$sitemap_count = 0;
				for( $i = 1; $i <= 4; $i++ ){
					if ( is_active_sidebar( 'sidebar-sitemap-%23'. $i )) {
						echo '<div class="wpb_column vc_column_container vc_col-sm-3 vc_col-xs-12 col-centered">';
							dynamic_sidebar( 'sidebar-sitemap-%23'. $i );
						echo '</div>';
					}
				}
			?>
		<button class="ubermenu-responsive-toggle ubermenu-responsive-toggle-open other_toggle hide_toggle close-popup" style="position:absolute;right:25px;bottom:20px;border-radius:50%; background: #F1F1F1;padding: 13px 9px 8px 12px !important;">
			<i class="fa fa-times" style="margin-right:0px;"></i>
		</button>
	</div>
</div>
<!-- -->

<footer id="Footer" class="clearfix">
				<div class="copyright">

					<?php
		                $sidebars_count = 0;
		                for( $i = 1; $i <= 4; $i++ ){
			                 if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
		                }

		                if( $sidebars_count > 0 ){

			            $footer_style = '';

			            if( mfn_opts_get( 'footer-padding' ) ){
				            $footer_style .= 'padding:'. mfn_opts_get( 'footer-padding' ) .';';
			            }

							echo '<div class="widgets_wrapper" style="'. $footer_style .'">';
								echo '<div class="container">';

									if( $footer_layout = mfn_opts_get( 'footer-layout' ) ){
									// Theme Options

									$footer_layout 	= explode( ';', $footer_layout );
									$footer_cols 	= $footer_layout[0];

									for( $i = 1; $i <= $footer_cols; $i++ ){
										if ( is_active_sidebar( 'footer-area-'. $i ) ){
											echo '<div class="column '. $footer_layout[$i] .'">';
												dynamic_sidebar( 'footer-area-'. $i );
											echo '</div>';
										}
									}

								} else {
								// Default - Equal Width

									$sidebar_class = '';
									switch( $sidebars_count ){
										case 2: $sidebar_class = 'one-second'; break;
										case 3: $sidebar_class = 'one-third'; break;
										case 4: $sidebar_class = 'one-fourth'; break;
										default: $sidebar_class = 'one';
									}

									for( $i = 1; $i <= 4; $i++ ){
										if ( is_active_sidebar( 'footer-area-'. $i ) ){
											echo '<div class="column '. $sidebar_class .'">';
												echo do_shortcode( mfn_opts_get('footer-copy') );
												// dynamic_sidebar( 'footer-area-'. $i );
												?>
												<aside id="nav_menu-2" class="widget widget_nav_menu">
													<div class="menu-footer-container">
														<ul id="menu-footer" class="menu">
															<li id="menu-item-1427" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1427">
																<a href="#sitemap-modal" data-effect="”mfp-zoom-in”" class="popup-modal">Sitemap</a>
															</li>
															<li id="menu-item-1428" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1428">
																<a class="popup-modal" data-effect="”mfp-zoom-in”" href="#wufoo-modal" onclick="replaceName('Us')">Contact</a>
															</li>
														</ul>
													</div>
												</aside>
												<?php
											echo '</div>';
										}
									}

								}

							echo '</div>';
						echo '</div>';
						}
					?>

					</div>

				</div>
			</div>
		</div>


	<?php
		if( $back_to_top_position == 'footer' ){
			echo '<a id="back_to_top" class="button button_left button_js in_footer" href=""><span class="button_icon"><i class="icon-up-open-big"></i></span></a>';
		}
	?>

</footer>


</div><!-- #Wrapper -->

<?php
	if( $back_to_top_position == 'body' ){
		echo '<a id="back_to_top" class="button button_left button_js '. $back_to_top_class .'" href=""><span class="button_icon"><i class="icon-up-open-big"></i></span></a>';
	}
?>

<?php do_action( 'mfn_hook_bottom' ); ?>

<!-- wp_footer() -->
<?php wp_footer(); ?>

<script>


jQuery(window).bind( "load", function (e) {
	var anchor = window.location.hash.substring(1);
	var height = (window.innerWidth < 1155) ? 127 : 127;
	if (anchor.search("#") === 0) {
		e.preventDefault();
		jQuery('html, body').animate({
			'scrollTop':   jQuery(anchor).offset().top - height
		}, 2000);
		return false;
	}
});

jQuery(".other_toggle").bind( "click", function (e) {
	jQuery(".ubermenu-responsive-toggle.ubermenu-responsive-toggle-main.ubermenu-skin-vanilla.ubermenu-loc-main-menu.ubermenu-responsive-toggle-content-align-center.ubermenu-responsive-toggle-align-full.ubermenu-responsive-toggle-icon-only.ubermenu-responsive-toggle-open").toggleClass("ubermenu-responsive-toggle-open");
});

jQuery(document).on('click', '.close-popup', function (e) {
	e.preventDefault();
	jQuery('.close-popup').magnificPopup('close');
});

</script>

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-34354133-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '2113593852198400');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=2113593852198400&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

</body>
</html>
