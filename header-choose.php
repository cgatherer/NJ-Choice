<?php
/**
 * The Header for our theme.
 *
 * @package ChooseNJ
 * @author Princeton Partners
 * @link http://princetonpartners.com
 */

header('Access-Control-Allow-Origin: http://www.choosenj.com');
header('Access-Control-Allow-Credentials: true');

?>
<!DOCTYPE html>

<?php
	if( $_GET && key_exists('mfn-rtl', $_GET) ):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:
?>
<html class="no-js" <?php language_attributes(); ?><?php mfn_tag_schema(); ?>>
<?php endif; ?>

<!-- head -->
<head>

<!-- meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php
	if( mfn_opts_get('responsive') ){
		if( mfn_opts_get('responsive-zoom') ){
			echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
		} else {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
		}

	}
?>

<title itemprop="name">

<?php
	if( mfn_title() ){
		echo mfn_title();
	} else {
		global $page, $paged;
		echo get_the_title()." | Choose New Jersey";
		//wp_title( '|', true, 'right' );
		//bloginfo( 'name' );
		//if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'betheme' ), max( $paged, $page ) );
	}
?>

</title>

<?php do_action('wp_seo'); ?>

<link rel="shortcut icon" href="<?php mfn_opts_show( 'favicon-img', THEME_URI .'/images/favicon.ico' ); ?>" />
<?php if( mfn_opts_get('apple-touch-icon') ): ?>
<link rel="apple-touch-icon" href="<?php mfn_opts_show( 'apple-touch-icon' ); ?>" />
<?php endif; ?>

<!-- Custom CSS -->
<link rel="stylesheet" href="http://www.choosenj.com/wp-content/themes/ChooseNJ/css/magnific-popup.css">
<link rel="stylesheet" href="http://www.choosenj.com/wp-content/plugins/js_composer/assets/css/js_composer.min.css">

<!-- wp_head() -->
<?php wp_head(); ?>

<!-- FlexSlider -->
<script src="http://www.choosenj.com/wp-content/themes/ChooseNJ/js/jquery.flexslider.js"></script>

<!-- Isotope -->
<script src="http://www.choosenj.com/wp-content/themes/ChooseNJ/js/isotope.pkgd.min.js"></script>

<!-- Magnific Popup -->
<script src="http://www.choosenj.com/wp-content/themes/ChooseNJ/js/jquery.magnific-popup.js"></script>

<!-- Share -->
<script src="http://www.choosenj.com/wp-content/themes/ChooseNJ/js/share.js"></script>

<!-- Chart -->
<script src="http://www.choosenj.com/wp-content/themes/ChooseNJ/js/Chart.min.js"></script>

</head>

<!-- body -->
<body <?php body_class(); ?>>

	<!-- #Wrapper -->
	<div id="Wrapper">

		<?php
			// Header Featured Image ----------

			$attachmentID = 5120;
      		$imageSizeName = "full";
      		$img = wp_get_attachment_image_src($attachmentID, $imageSizeName);

			$header_style = '';

			// Image -----
			if( mfn_ID() && ! is_search() ){

				if( ( ( mfn_ID() == get_option( 'page_for_posts' ) ) || ( get_post_type( mfn_ID() ) == 'page' ) )  && has_post_thumbnail( mfn_ID() ) ){

					// Pages & Blog Page ---
					$subheader_image = wp_get_attachment_image_src( get_post_thumbnail_id( mfn_ID() ), 'full' );
					$header_style .= ' style="background-image:url('. $subheader_image[0] .'); background-size: cover;"';

				} elseif( ( ( mfn_ID() == get_option( 'page_for_posts' ) ) || ( get_post_type( mfn_ID() ) == 'post' ) )  && has_post_thumbnail( mfn_ID() ) ){

					// Single Post ---
					$subheader_image = wp_get_attachment_image_src( get_post_thumbnail_id( mfn_ID() ), 'full' );
					$header_style .= ' style="background-image:url('. $subheader_image[0] .'); background-size: cover;"';

				} elseif( ( ( mfn_ID() == get_option( 'page_for_posts' ) ) || ( get_post_type( mfn_ID() ) == 'post' ) )  && !has_post_thumbnail( mfn_ID() ) ){

					// Single Post ---
					//$header_style .= ' style="background-image:url(\'http://www.choosenj.com/wp-content/themes/ChooseNJ/images/iStock_000071781771_News_Default.jpg\'); background-size: cover;"';
					$header_style .= ' style="background-image:url('. $img[0] .'); background-size: cover;"';

				}
			} elseif (is_search() ) {
					$header_style .= ' style="background-image:url(\'http://www.choosenj.com/wp-content/themes/ChooseNJ/images/iStock_000071781771_News_Default.jpg\'); background-size: cover;"';
			}

			// Attachment -----
			if( mfn_opts_get('img-subheader-attachment') == 'fixed' ){

				$header_style .= ' class="bg-fixed"';

			} elseif( mfn_opts_get('img-subheader-attachment') == 'parallax' ){

				if( mfn_opts_get( 'parallax' ) == 'stellar' ){
					$header_style .= ' class="bg-parallax" data-stellar-background-ratio="0.5"';
				} else {
					$header_style .= ' class="bg-parallax" data-enllax-ratio="0.3"';
				}

			}
		?>

		<?php if( mfn_header_style( true ) == 'header-below' ) echo mfn_slider(); ?>

		<!-- #Header_bg -->
		<div id="Header_wrapper" <?php echo $header_style; ?>>

			<!-- #Header -->
			<header id="Header">
				<?php if( mfn_header_style( true ) != 'header-creative' ) get_template_part( 'includes/header', 'top-area' ); ?>
				<!-- Slider -->
				<?php
					if( is_search() ){
						echo '<h1>';
							echo '<span>Search</span>';
						echo '</h1>';
					} elseif( mfn_header_style( true ) != 'header-below' ){
						echo '<h1>';
							// echo substr(the_title($before = '', $after = '', FALSE), 0, 75) . '';
							echo the_title($before = '', $after = '', FALSE);
						echo '</h1>';
					}
				?>
			</header>

			<?php
				if( ( mfn_opts_get('subheader') != 'all' ) &&
					( ! get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ) &&
					( get_post_meta( mfn_ID(), 'mfn-post-template', true ) != 'intro' )	){


					$subheader_advanced = mfn_opts_get( 'subheader-advanced' );

					$subheader_style = '';

					if( mfn_opts_get( 'subheader-padding' ) ){
						$subheader_style .= 'padding:'. mfn_opts_get( 'subheader-padding' ) .';';
					}


					if( is_search() ){
						echo '<div id="Subheader" style="'. $subheader_style .'">';
							echo '<div class="container">';
								echo '<div class="column one">';

									// Breadcrumbs
									global $wp_query;
									$total_results = $wp_query->found_posts;

									$translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results','results found for:') : __('results found for:','betheme');
									echo '<span class="title">'. ""/*$total_results*/ .' '. $translate['search-results'] .' '. esc_html( $_GET['s'] ) .'</span>';

								echo '</div>';
							echo '</div>';
						echo '</div>';


					} elseif( ! mfn_slider() || ( is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) ) ){
						// Page title -------------------------

						// Subheader | Options
						$subheader_options = mfn_opts_get( 'subheader' );


						if( is_home() && ! get_option( 'page_for_posts' ) && ! mfn_opts_get( 'blog-page' ) ){
							$subheader_show = false;
						} elseif( is_array( $subheader_options ) && isset( $subheader_options['hide-subheader'] ) ){
							$subheader_show = false;
						} elseif( get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ){
							$subheader_show = false;
						} else {
							$subheader_show = true;
						}

						if( is_array( $subheader_options ) && isset( $subheader_options['hide-breadcrumbs'] ) ){
							$breadcrumbs_show = false;
						} else {
							$breadcrumbs_show = true;
						}


						if( is_array( $subheader_advanced ) && isset( $subheader_advanced['breadcrumbs-link'] ) ){
							$breadcrumbs_link = 'has-link';
						} else {
							$breadcrumbs_link = 'no-link';
						}

						// Subheader | Print
						if( $subheader_show ){
							echo '<div id="Subheader" style="'. $subheader_style .'">';
								echo '<div class="container">';
									echo '<div class="column one">';

										// Breadcrumbs
										/* === OPTIONS === */
    									$text['home']            = 'Home';
    									$text['news']            = 'News'; 
    									$text['events']          = 'Events'; 
    									$text['press releases']  = 'Press Releases'; 
     									$text['media']           = 'Media';
     									$text['success stories'] = 'Success Stories';
     									$text['nj buzz']         = 'NJ Buzz Blog';
     									$text['photos']          = 'Photos';
     									$text['videos']          = 'Videos';
     									$show_current            =  get_the_title();
     									$short_title             =  wp_trim_words( $show_current, 5, '...' );
     									
     									/* === Links === */
    									$home_link           = home_url('/');
    									$news_link           = home_url('/media/news');
   									    $events_link         = home_url('/media/events');
    									$press_releases_link = home_url('/media/press-releases');
    									$success_stories     = home_url('/media/success-stories');
    									$nj_buzz             = home_url('/media/nj-buzz');
    									$photos              = home_url('/media/photos');
    									$videos              = home_url('/media/videos');
    									$media_link          = home_url('/media');
    									
										$cats = wp_get_post_categories($posts[0]->ID);
										
										if ( in_category($cats[1] == '6') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $news_link . '">' . $text['news'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} elseif ( in_category($cats[0] == '6') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $news_link . '">' . $text['news'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} elseif ( in_category($cats[0] == '18') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $press_releases_link . '">' . $text['press releases'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} elseif ( in_category($cats[0] == '1') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $events_link . '">' . $text['events'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} elseif ( in_category($cats[0] == '19') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $success_stories . '">' . $text['success stories'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} elseif ( in_category($cats[1] == '20') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $nj_buzz . '">' . $text['nj buzz'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} elseif ( in_category($cats[0] == '65') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $photos . '">' . $text['photos'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} elseif ( in_category($cats[0] == '66') ) {
  											// Custom Breadcrumb
  											echo '<ul class="breadcrumbs no-link"><li><a href="' . $home_link . '">' . $text['home'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $media_link . '">' . $text['media'] . '</a><span><i class="icon-right-open"></i></span></li><li><a href="' . $videos . '">' . $text['videos'] . '</a><span><i class="icon-right-open"></i></span></li><li>' . $short_title . '</li></ul>';
										} else {
  											// Standard Breadcrumb
  											if( $breadcrumbs_show ) mfn_breadcrumbs( $breadcrumbs_link );
										}

									echo '</div>';
								echo '</div>';
							echo '</div>';
						}

					}

				}
			?>

		</div>

		<?php
			// Single Post | Template: Intro
			if( get_post_meta( mfn_ID(), 'mfn-post-template', true ) == 'intro' ){
				get_template_part( 'includes/header', 'single-intro' );
			}
		?>

		<?php do_action( 'mfn_hook_content_before' ); ?>
