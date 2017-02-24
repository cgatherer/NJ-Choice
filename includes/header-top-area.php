<?php $translate['wpml-no'] = mfn_opts_get('translate') ? mfn_opts_get('translate-wpml-no','No translations available for this page') : __('No translations available for this page','betheme'); ?>

<?php if( mfn_opts_get('action-bar')): ?>
	<div id="Action_bar">
		<div class="container">
			<div class="column one">

				<ul class="contact_details">
					<?php
						$my_query = new WP_Query( 'category_name=News Alerts&posts_per_page=1' ); ?>
							<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>">
									<?php echo '<li class="slogan">'; ?>
										<?php echo the_title();?>
									<?php echo '</li>'; ?>
								</a>
							<?php endwhile;
					wp_reset_postdata();?>
				</ul>

			</div>
		</div>
	</div>
<?php endif; ?>

<!-- .header_placeholder 4sticky  -->
<div class="header_placeholder"></div>

<div id="Top_bar" class="loading">

	<div class="container">
		<div class="column one">

			<div class="top_bar_left clearfix">

				<!-- .logo -->

			<div class="logo<?php if( $textlogo = mfn_opts_get('logo-text') ) echo ' text-logo'; ?>">
					<?php
						// Logo | Options
						$logo_options = mfn_opts_get( 'logo-link' ) ? mfn_opts_get( 'logo-link' ) : false;
						$logo_before = $logo_after = '';

						// Logo | Link
						if( isset( $logo_options['link'] ) ){
							$logo_before 	= '<a id="logo" href="'. get_home_url() .'" title="'. get_bloginfo( 'name' ) .'">';
							$logo_after 	= '</a>';
						} else {
							$logo_before 	= '<span id="logo">';
							$logo_after 	= '</span>';
						}

						// Logo | H1
						if( is_front_page() ){
							if( is_array( $logo_options ) && isset( $logo_options['h1-home'] )){
								$logo_before = '<h1>'. $logo_before;
								$logo_after .= '</h1>';
							}
						} else {
							if( is_array( $logo_options ) && isset( $logo_options['h1-all'] )){
								$logo_before = '<h1>'. $logo_before;
								$logo_after .= '</h1>';
							}
						}

						// Logo | Source
						if( $layoutID = mfn_layout_ID() ){

							$logo_src 		= get_post_meta( $layoutID, 'mfn-post-logo-img', true );
							$logo_sticky 	= get_post_meta( $layoutID, 'mfn-post-sticky-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-sticky-logo-img', true ) : $logo_src;
							$logo_mobile 	= get_post_meta( $layoutID, 'mfn-post-responsive-logo-img', true ) ? get_post_meta( $layoutID, 'mfn-post-responsive-logo-img', true ) : $logo_src;

						} else {

							$logo_src 		= mfn_opts_get( 'logo-img', THEME_URI .'/images/logo/logo.png' );
							$logo_sticky 	= mfn_opts_get( 'sticky-logo-img' ) ? mfn_opts_get( 'sticky-logo-img' ) : $logo_src;
							$logo_mobile 	= mfn_opts_get( 'responsive-logo-img' ) ? mfn_opts_get( 'responsive-logo-img' ) : $logo_src;

						}

						// Logo | SVG width
						if( $width = mfn_opts_get( 'logo-width' ) ){
							$width = 'width="'. $width .'"';
							$class = ' svg';
						} else {
							$width = false;
							$class = false;
						}

						// Logo | Print
						echo $logo_before;

							if( $textlogo ){

								echo $textlogo;

							} else {

								echo '<img class="logo-main scale-with-grid'. $class .'" src="'. $logo_src .'" alt="'. mfn_get_attachment_data( $logo_src, 'alt' ) .'" '. $width .'/>';
								echo '<img class="logo-sticky scale-with-grid'. $class .'" src="'. $logo_sticky .'" alt="'. mfn_get_attachment_data( $logo_sticky, 'alt' ) .'" '. $width .'/>';
								echo '<img class="logo-mobile scale-with-grid'. $class .'" src="'. $logo_mobile .'" alt="'. mfn_get_attachment_data( $logo_mobile, 'alt' ) .'" '. $width .'/>';

							}

						echo $logo_after;
					?>
				</div>

				<div class="menu_wrapper">
					<?php
						if( ( mfn_header_style( true ) != 'header-overlay' ) && ( mfn_opts_get( 'menu-style' ) != 'hide' ) ){

							// TODO: modify the mfn_header_style() function to be able to find the text 'header-split' in headers array

							// #menu --------------------------
							if( in_array( mfn_header_style(), array( 'header-split', 'header-split header-semi', 'header-below header-split' ) ) ){
								// split -------
								mfn_wp_split_menu();
							} else {
								// default -----
								ubermenu( 'main' , array( 'theme_location' => 'main-menu' )); ?>

								<!-- Mobile Menu -->
								<div class="mobile_menu" style="display:none;">
									<div id="sitemap-modal_mobile" style="position:relative;">
										<div class="vc_row wpb_row vc_row-fluid">
											<?php
												$sitemap_count = 0;
													for( $i = 1; $i <= 4; $i++ ){
														if ( is_active_sidebar( 'sidebar-sitemap-%23'. $i )) {
															echo '<div class="wpb_column vc_column_container vc_col-sm-3 vc_col-xs-12">';
																dynamic_sidebar( 'sidebar-sitemap-%23'. $i );
															echo '</div>';
														}
													}
												?>
										</div>
										<button class="ubermenu-responsive-toggle ubermenu-responsive-toggle-open other_toggle hide_toggle" style="position:absolute;right:10px;bottom:10px;border-radius:50%; background: #F1F1F1;padding: 13px 9px 8px 12px !important;">
											<i class="fa fa-times" style="margin-right:0px;"></i>
										</button>
										<div class="mobile_extra">
											<a class="popup-modal" data-effect="”mfp-zoom-in”" href="#wufoo-modal" onclick="replaceName('Us')">Contact</a>
											<a id="search_button" href="#" style="margin: 0 !important;">Search <i class="icon-search"></i></a>
										</div>
									</div>
								</div>
								<?php

									// echo '<a id="search_button" href="#"><i class="icon-search"></i></a>';
							}

							// responsive menu button ---------

							// echo '</a>';

						}
					?>
				</div>


				<div class="banner_wrapper">
					<?php mfn_opts_show( 'header-banner' ); ?>
				</div>

				<!-- #searchform -->
				<div class="search_wrapper">
					<?php get_search_form( true ); ?>

				</div>

			</div>

		</div>
	</div>
</div>
