// Magnific Popup
window.onload = function(){
	jQuery('.popup-modal').magnificPopup({
        type: 'inline',

  		fixedContentPos: false,
  		fixedBgPos: true,

  		overflowY: 'auto',

  		closeBtnInside: true,
  		preloader: false,

  		midClick: true,
  		removalDelay: 300,
  		mainClass: 'my-mfp-zoom-in'
	});
} // Close - window.onload

// Retrieves contact name and current page url to populate hidden WuFoo form fields
function populate_wufoo_hidden_fields( contactObj ){

	defaultValue 		= '';
	var count 			= 0;
	var contact 		= jQuery( contactObj ).attr( 'data-contact-name' ).split( ' ', 2 );
	var firstName 		= contact[0];
	var lastName		= contact[1];
	var url 			= ( '' ===  encodeURI( window.location.pathname ) ? 'Homepage' : encodeURI( window.location.pathname ) ); 
	var defaultValues	= { // Field keys needed populate hidden fields from WuFoo API
		'Field21'	: firstName,
		'Field22'	: lastName,
		'Field24'	: url 
	};

	// Replaces WuFoo header text w/ contact name
	replaceName( firstName + ' ' + lastName );
	
	// Gets defaultValues object size
	var objSize 	= Object.keys( defaultValues ).length;
	
	// Concatenates defaultValues properties into single string
	for( var key in defaultValues ) {
		defaultValue += ( count < objSize - 1 ? key + '=' + defaultValues[key] + '&' : key + '=' + defaultValues[key] );
		count++;
	}

	//console.log( defaultValue );

	// Check if element exists
	if( document.querySelector( '#WuFoo-Rx' ) !== '' ) {
		jQuery( '#WuFoo-Rx' ).attr( 'src', 'http://choosenj.wufoo.com/embed/m12w3pmz0zgrjxl/def/' + defaultValue );
		jQuery( '#WuFoo-Rx' ).attr( 'href', 'http://choosenj.wufoo.com/embed/m12w3pmz0zgrjxl/def/' + defaultValue );
	}
	
} // Close - populate_wufoo_hidden_fields()

// Replaces WuFoo header text w/ contact name
function replaceName( contactName ) {

	jQuery( '#wufoo-contact-name' ).html( contactName );

}