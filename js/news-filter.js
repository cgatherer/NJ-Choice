jQuery(document).ready(function(jQuery){
	//open/close mega-navigation
	jQuery('.new-filter-dropdown-trigger').on('click', function(event){
		event.preventDefault();
		toggleNav();
	});

	//close meganavigation
	jQuery('.new-filter-dropdown .cd-close').on('click', function(event){
		event.preventDefault();
		toggleNav();
	});

	//on mobile - open submenu
	jQuery('.has-children').children('a').on('click', function(event){
		//prevent default clicking on direct children of .has-children 
		event.preventDefault();
		var selected = jQuery(this);
		selected.next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('move-out');
	});

	//on desktop - differentiate between a user trying to hover over a dropdown item vs trying to navigate into a submenu's contents
	var submenuDirection = ( !jQuery('.new-filter-dropdown-wrapper').hasClass('open-to-left') ) ? 'right' : 'left';
	jQuery('.new-filter-dropdown-content').menuAim({
        activate: function(row) {
        	jQuery(row).children().addClass('is-active').removeClass('fade-out');
        	if( jQuery('.new-filter-dropdown-content .fade-in').length == 0 ) jQuery(row).children('ul').addClass('fade-in');
        },
        deactivate: function(row) {
        	jQuery(row).children().removeClass('is-active');
        	if( jQuery('li.has-children:hover').length == 0 || jQuery('li.has-children:hover').is(jQuery(row)) ) {
        		jQuery('.new-filter-dropdown-content').find('.fade-in').removeClass('fade-in');
        		jQuery(row).children('ul').addClass('fade-out')
        	}
        },
        exitMenu: function() {
        	jQuery('.new-filter-dropdown-content').find('.is-active').removeClass('is-active');
        	return true;
        },
        submenuDirection: submenuDirection,
    });

	//submenu items - go back link
	jQuery('.go-back').on('click', function(){
		var selected = jQuery(this),
			visibleNav = jQuery(this).parent('ul').parent('.has-children').parent('ul');
		selected.parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('move-out');
	}); 

	function toggleNav(){
		var navIsVisible = ( !jQuery('.new-filter-dropdown').hasClass('dropdown-is-active') ) ? true : false;
		jQuery('.new-filter-dropdown').toggleClass('dropdown-is-active', navIsVisible);
		jQuery('.new-filter-dropdown-trigger').toggleClass('dropdown-is-active', navIsVisible);
		if( !navIsVisible ) {
			jQuery('.new-filter-dropdown').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				jQuery('.has-children ul').addClass('is-hidden');
				jQuery('.move-out').removeClass('move-out');
				jQuery('.is-active').removeClass('is-active');
			});	
		}
	}

	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if(!Modernizr.input.placeholder){
		jQuery('[placeholder]').focus(function() {
			var input = jQuery(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = jQuery(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		jQuery('[placeholder]').parents('form').submit(function() {
		  	jQuery(this).find('[placeholder]').each(function() {
				var input = jQuery(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	}
});