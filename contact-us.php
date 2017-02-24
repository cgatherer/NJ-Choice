<!-- Contact Us -->
<div style="background: #EEE; width: 100%; border-top:solid #fff 6px;">
	<div style="max-width: 1150px; margin: 0px auto;" class="basic-panel2 clearfix">
		<div class="contact-headline"><h2>what can choose New Jersey do for you?</h2></div>
			<div class="vc_column_container page-id-<?php the_ID(); ?>" style="padding-bottom: 0px;">
				<!-- Text Side -->
				<div class="vc_col-xs-12 vc_block-center vc_col-sm-12 vc_col-md-offset-0 vc_col-md-6">
					<div class="contact-content">
						<?php
							if ( is_active_sidebar( 'sidebar-contact-section' )) {
								echo '<div class="wpb_column">';
									dynamic_sidebar( 'sidebar-contact-section' );
								echo '</div>';
							}
						?>
					</div>
				</div>
				<!-- Contact Side -->
				<div class="contact-staff clearfix">

					<?php 
						if( has_tag('68')) { 
							display_contacts_post(); //Refer to functions.php 
						} else { 
							display_contacts(); //Refer to functions.php
					} ?>

				</div>
			</div>
	</div>
</div>

<!-- News Letter -->
<div class="basic-panel3">
	<div class="basic-panel-inne2" style="max-width: 1350px;">

		<!-- Text Side -->
		<div id="footer-logo">
		<?php
			if ( is_active_sidebar( 'sidebar-logo-bottom' )) {
				echo '<div class="wpb_column vc_column_container vc_col-sm-6 footer-logo">';
						dynamic_sidebar( 'sidebar-logo-bottom' );
				echo '</div>';
			}
		?>
		</div>

		<!-- Contact Side -->
		<div id="newsletter">
		<div class="wpb_column vc_column_container vc_col-sm-6 footer-newsletter">
			<?php
				echo "<span class='newletter-label'>e-newsletter sign-up</span>";
				echo "<br>";
				echo "<br>";
				echo do_shortcode('[yikes-mailchimp form="1"]');
			?>
			<div class="contact-social vc_col-sm-2 vc_col-xs-5">
				<a href="https://www.facebook.com/ChooseNewJersey" target="_blank"><div class="contact-fb"></div></a>
				<a href="https://twitter.com/choosenj" target="_blank"><div class="contact-tw"></div></a>
				<a href="https://www.linkedin.com/company/choose-new-jersey-inc-" target="_blank"><div class="contact-li"></div></a>
				<a href="https://vimeo.com/choosenewjersey" target="_blank"><div class="contact-vm"></div></a>
			</div>

			<?php
				if ( is_active_sidebar( 'sidebar-address-section' )) {
					echo '<div class="vc_col-sm-7 vc_col-xs-7" style="margin:10px 0 0 12px">';
							dynamic_sidebar( 'sidebar-address-section' );
					echo '</div>';
				}
			?>
		</div>
		</div>

	</div>
</div>

<div id="wufoo-modal" class="zoom-anim-dialog mfp-hide">
	<!-- <button class="mfp-close" title="Close (Esc)" type="button">×</button> -->
	<button class="ubermenu-responsive-toggle ubermenu-responsive-toggle-open other_toggle close-popup" style="position:absolute;right:25px;top:20px;border-radius:50%; background: #F1F1F1;padding: 13px 9px 8px 12px !important;">
		<i class="fa fa-times" style="margin-right:0px;"></i>
	</button>
	<h2 id="wufoo-header" class="wufoo-header">Contact <span id="wufoo-contact-name">Us</span></h2>
	<iframe id="WuFoo-Rx" height="505" allowTransparency="true" frameborder="0" scrolling="yes" style="width:100%;border:none" src="http://choosenj.wufoo.com/embed/m12w3pmz0zgrjxl/"><a href="http://choosenj.wufoo.com/forms/m12w3pmz0zgrjxl/">Fill out my Wufoo form!</a></iframe>
</div>
