<?php

/* ---------------------------------------------------------------------------
 * Child Theme URI | DO NOT CHANGE
 * --------------------------------------------------------------------------- */
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );


/* ---------------------------------------------------------------------------
 * Define | YOU CAN CHANGE THESE
 * --------------------------------------------------------------------------- */

// White Label --------------------------------------------
define( 'WHITE_LABEL', false );

// Static CSS is placed in Child Theme directory ----------
define( 'STATIC_IN_CHILD', false );


/* ---------------------------------------------------------------------------
 * Enqueue Style
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'mfnch_enqueue_styles', 101 );
function mfnch_enqueue_styles() {

	// Enqueue the parent stylesheet
	// wp_enqueue_style( 'parent-style', get_template_directory_uri() .'/style.css' );
	// we don't need this if it's empty

	// Enqueue the parent rtl stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'mfn-rtl', get_template_directory_uri() . '/rtl.css' );
	}

	// Enqueue the child stylesheet
	wp_dequeue_style( 'style' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/style.css' );

}


/* ---------------------------------------------------------------------------
 * Load Textdomain
 * --------------------------------------------------------------------------- */
add_action( 'after_setup_theme', 'mfnch_textdomain' );
function mfnch_textdomain() {
    load_child_theme_textdomain( 'betheme',  get_stylesheet_directory() . '/languages' );
    load_child_theme_textdomain( 'mfn-opts', get_stylesheet_directory() . '/languages' );
}

/* ---------------------------------------------------------------------------
 * Change Wordpress "From" email and sender name
 * --------------------------------------------------------------------------- */
function ec_mail_name( $email ){
  return 'Marketing'; // new email name from sender.
}
add_filter( 'wp_mail_from_name', 'ec_mail_name' );

function ec_mail_from ($email ){
  return 'marketing@choosenj.com'; // new email address from sender.
}
add_filter( 'wp_mail_from', 'ec_mail_from' );

/* -----------------------------------------
** Displays Staff Members based on page ID's
** ----------------------------------------- */
function display_contacts() {

	// Defines parameters based on if it's a page
	if( is_page() ):
		$params = array(
			'limit'	=> 3,
	        'where' => array(
	            array(
	                'key' => 'related_page.id',
	                'value' => get_the_ID()
	            )
	        )
	    );
	else:
		$cat_IDs = get_term_IDs( get_the_category() );
		$params = array(
			'limit' => 3,
			'where' => array(
				array(
					'key' => 'category.term_id',
					'value' => implode( ',', $cat_IDs )
				)
			)
		);
	endif;

	$staff_pod 	= pods( 'staff', $params ); 	//Retrieve all Staff objects matching set parameters
	$total 		= $staff_pod->total();			//Store total found matching $params
	$columns 	= ( $total < 3 ? 3 : 2 );		//Stores columns based on total

	//Begin looping through staff
	while( $staff_pod->fetch() ):

		$id					= esc_html( $staff_pod->id() );
		$headshot_url		= esc_url( $staff_pod->display( 'headshot._src.medium' ) );
		$first_name			= esc_html( $staff_pod->display( 'first_name' ) );
		$full_name 			= esc_html( $staff_pod->display( 'first_name' ) . ' ' . $staff_pod->display( 'last_name' ) );
		$position			= $staff_pod->display( 'position' );
		$phone				= esc_html( $staff_pod->display( 'phone' ) );
		$email				= esc_html( $staff_pod->display( 'email' ) );
		$related_term_IDs	= $staff_pod->field( 'category' );
		$related_pgs		= $staff_pod->field( 'related_page' ); //Retrieves the values for the relationship field

		//Check if Staff Member has a related page assigned
		if( !empty( $related_pgs ) && is_page() ):

			//Loop through each Staff Member's related page(s)
			foreach ( $related_pgs as $related_pg ):

				//Check to see if Staff is assigned to current page ID and output contact info
				if( get_the_ID() == $related_pg[ 'ID' ] ):
				?>
					<div class="contact-wrapper vc_col-xs-12 vc_col-sm-<?php echo $columns * 2; ?> vc_col-md-<?php echo $columns; ?> contact-id-<?php echo $id; ?>" style="text-align: center;">
						<img class="contact-headshot" src="<?php echo $headshot_url; ?>" width="170" height="170" alt="<?php echo $full_name; ?> headshot">
						<p style="margin-bottom:3px;font-size: 10pt;">
							<span class="contact-person full-name"><?php echo $full_name; ?></span>
							<span class="position"><?php echo $position; ?></span>
						</p>
						<div class="contact-buttons">
							<a href="#wufoo-modal" class="popup-modal" onclick="populate_wufoo_hidden_fields(this)" data-contact-name="<?php echo $full_name; ?>"><div class="contact-email" title="Email <?php echo $first_name; ?>"></div></a>
							<a id="<?php echo strtolower( $first_name ) . '-' . $id; ?>" href="tel:+1<?php echo preg_replace( '/\D+/', '', $phone ); ?>" title="Call <?php echo $first_name; ?>" class="contact-phone"><div class="tooltip-bottom"><?php echo $phone; ?></div></a>
						</div>
					</div>
				<?php
				break; // Once Staff Memeber's related page ID matches current page ID break out of loop

				endif;

			endforeach;

		endif;

		// Check if current post and current staff have term/category ID's assigned
		if( !empty( $related_term_IDs ) && !empty( $cat_IDs ) ):

			// Loop through current post term ID's
			foreach ( $cat_IDs as $cat_ID ):

				// Loop through current staff member related term ID's
				foreach ( $related_term_IDs as $related_term_ID ):

					// If post type term ID matches current staff related term ID output the following
					if( $cat_ID == $related_term_ID[ 'term_id' ] ):
					?>
						<div class="contact-wrapper vc_col-xs-12 vc_col-sm-<?php echo $columns * 2; ?> vc_col-md-<?php echo $columns; ?> contact-id-<?php echo $id; ?>" style="text-align: center;">
							<img class="contact-headshot" src="<?php echo $headshot_url; ?>" width="170" height="170" alt="<?php echo $full_name; ?> headshot">
							<p style="margin-bottom:3px;font-size: 10pt;">
								<span class="contact-person full-name"><?php echo $full_name; ?></span>
								<span class="position"><?php echo $position; ?></span>
							</p>
							<div class="contact-buttons">
								<a href="#wufoo-modal" class="popup-modal" onclick="populate_wufoo_hidden_fields(this)" data-contact-name="<?php echo $full_name; ?>"><div class="contact-email popup-modal" title="Email <?php echo $first_name; ?>"></div></a>
								<a id="<?php echo strtolower( $first_name ) . '-' . $id; ?>" href="tel:+1<?php echo preg_replace( '/\D+/', '', $phone ); ?>" title="Call <?php echo $first_name; ?>" class="contact-phone"><div class="tooltip-bottom"><?php echo $phone; ?></div></a>
							</div>
						</div>
					<?php

					break 2; // Once Staff Member's related term ID matches current term ID break out of both loops

					endif;

				endforeach;

			endforeach;

		endif;

	endwhile;
	?>
	<script type="text/javascript">
		jQuery('.contact-phone').on('click', function(e){
			jQuery(this).addClass('active');
			e.stopPropagation();
		});
		jQuery(document).on('click', function(e) {
			if ( !jQuery(e.target).is('.contact-phone.active') )
				jQuery('.contact-phone.active').removeClass('active');
		});
	</script>
	<script type="text/javascript" src="<? echo str_replace('betheme', 'ChooseNJ', get_bloginfo( 'template_url' ) ); ?>/js/wufoo-defaultvalue-generator.js"></script>
	<?php
}

/* -----------------------------------------
** Displays Staff Members based on Post ID's
** ----------------------------------------- */

function display_contacts_post() {
	if( is_single() ):
		$params = array(
			'limit'	=> 3,
	        'where' => array(
	            array(
	                'key' => 'related_post.id',
	                'value' => get_the_ID()
	            )
	        )
	    );
	endif;

	$staff_pod2 	= pods( 'staff', $params ); 	//Retrieve all Staff objects matching set parameters
	$total2 		= $staff_pod2->total();			//Store total found matching $params
	$columns2 	    = ( $total2 < 3 ? 3 : 2 );		//Stores columns based on total

	//Begin looping through staff
	while( $staff_pod2->fetch() ):

		$id2				= esc_html( $staff_pod2->id() );
		$headshot_url2		= esc_url( $staff_pod2->display( 'headshot._src.medium' ) );
		$first_name2		= esc_html( $staff_pod2->display( 'first_name' ) );
		$full_name2 		= esc_html( $staff_pod2->display( 'first_name' ) . ' ' . $staff_pod2->display( 'last_name' ) );
		$position2			= $staff_pod2->display( 'position' );
		$phone2				= esc_html( $staff_pod2->display( 'phone' ) );
		$email2				= esc_html( $staff_pod2->display( 'email' ) );
		$related_pts		= $staff_pod2->field( 'related_post' ); //Retrieves the values for the post relationship field

		//Check if Staff Member has a related post assigned
		if( !empty( $related_pts ) && is_single() ):

			//Loop through each Staff Member's related post(s)
			foreach ( $related_pts as $related_pt ):

				//Check to see if Staff is assigned to current post ID and output contact info
				if( get_the_ID() == $related_pt[ 'ID' ] ):
				?>
				<?php
				if ($total2 > 1) {
					?>					<div class="contact-wrapper vc_col-xs-12 vc_col-sm-<?php echo $columns2 * 2; ?> vc_col-md-<?php echo $columns2; ?> contact-id-<?php echo $id; ?>" style="text-align: center;">
<?php
				}else{
					?>					<div class="contact-wrapper vc_col-xs-12 vc_col-sm-12 vc_col-md-3 contact-id-<?php echo $id2; ?>" style="text-align: center;">
<?php
				}
				?>
						<img class="contact-headshot" src="<?php echo $headshot_url2; ?>" width="170" height="170" alt="<?php echo $full_name2; ?> headshot">
						<p style="margin-bottom:3px;font-size: 10pt;">
							<span class="contact-person full-name"><?php echo $full_name2; ?></span>
							<span class="position"><?php echo $position2; ?></span>
						</p>
						<div class="contact-buttons">
							<a href="#wufoo-modal" class="popup-modal" onclick="populate_wufoo_hidden_fields(this)" data-contact-name="<?php echo $full_name2; ?>"><div class="contact-email" title="Email <?php echo $first_name2; ?>"></div></a>
							<a id="<?php echo strtolower( $first_name ) . '-' . $id; ?>" href="tel:+1<?php echo preg_replace( '/\D+/', '', $phone ); ?>" title="Call <?php echo $first_name2; ?>" class="contact-phone"><div class="tooltip-bottom"><?php echo $phone2; ?></div></a>
						</div>
					</div>
				<?php
				break; // Once Staff Memeber's related page ID matches current page ID break out of loop

				endif;
			endforeach;
		endif;
	endwhile;
	?>
	<script type="text/javascript">
		jQuery('.contact-phone').on('click', function(e){
			jQuery(this).addClass('active');
			e.stopPropagation();
		});
		jQuery(document).on('click', function(e) {
			if ( !jQuery(e.target).is('.contact-phone.active') )
				jQuery('.contact-phone.active').removeClass('active');
		});
	</script>
	<script type="text/javascript" src="<? echo str_replace('betheme', 'ChooseNJ', get_bloginfo( 'template_url' ) ); ?>/js/wufoo-defaultvalue-generator.js"></script>
	<?php
}


// Returns term ID's found on post types
function get_term_IDs( $term_objs ){

	$cat_IDs = array(); // Will store page category term ID's

	foreach ( (array)$term_objs as $term_obj ):
		array_push( $cat_IDs, $term_obj->term_id );
	endforeach;

	return $cat_IDs;
}
?>
