jQuery(document).ready(function($) {

	$('li.current_page_parent').addClass('sub_menu_open');



/*
	$( '.dropdown_toggle' ).on( 'click', function(e) {
	e.preventDefault();

	if( $(this).hasClass( 'closed' ) ) {
		$( 'li.menu-item-has-children' ).removeClass( 'sub_menu_open' );
		$( '.dropdown_toggle').removeClass( 'open' ).addClass( 'closed' );
		$(this).removeClass( 'closed' ).addClass( 'open' );
		$(this).parent( 'li.menu-item-has-children' ).addClass( 'sub_menu_open' );
		$(this).find( '.sub-menu' ).show().animate( {
                width: "toggle"
            });
	}
	else {
		$(this).removeClass( 'open' ).addClass( 'closed' );
		$(this).parent( 'li.menu-item-has-children' ).removeClass( 'sub_menu_open' );
	}
	});

	$( '.back_button' ).on( 'click' , function(e) {
		$(this).parents( 'li.menu-item-has-children' ).removeClass( 'sub_menu_open' );
		$(this).parent( '.sub-menu' ).hide().animate( {
					width: "toggle"
				});
	});

	if( $( 'li' ).hasClass( 'current_page_parent' ) ) {
		$(this).addClass( 'sub_menu_open' );
		$(this).find( '.dropdown_toggle' ).removeClass( 'closed' ).addClass( 'open' );
		$(this).find( 'sub-menu' ).show();
	}
 */



/* 	 $('.dropdown_toggle').on('click', function(e) {
		 e.preventDefault();

		 if ($(this).hasClass('closed')) {
			 $('li.menu-item-has-children').removeClass('sub_menu_open');
			 $('.dropdown_toggle').removeClass('open').addClass('closed');
			 $(this).removeClass('closed').addClass('open');
			 $(this).parent('li.menu-item-has-children').addClass('sub_menu_open');
		 } else {
			$(this).removeClass( 'open' ).addClass( 'closed' );
			$(this).parent( 'li.menu-item-has-children' ).removeClass( 'sub_menu_open' );
		 }

      var $subMenu = $(this).siblings('.sub-menu');

      // Close any open sub-menus
      $('.sub-menu.active').not($subMenu).removeClass('active');

      // Toggle the current sub-menu
      $subMenu.toggleClass('active');

      if ($subMenu.hasClass('active')) {
        // Append the active sub-menu to the right column
        $('.right-column').html($subMenu.clone().addClass('active'));

        // Animate the sliding effect
        $('.right-column .sub-menu.active').animate({ marginLeft: 0 }, 300);
      } else {
        // Animate the sliding effect before removing the sub-menu
        $('.right-column .sub-menu.active').animate({ marginLeft: '100%' }, 300, function() {
          $(this).remove();
        });
      }
    }); */

    // Close the sub-menu if clicked outside
 /*    $(document).on('click', function(e) {
      if (!$(e.target).closest('.right-column').length && !$(e.target).closest('.menu-item-has-children').length) {
        $('.sub-menu.active').removeClass('active');
        $('.right-column .sub-menu.active').animate({ marginLeft: '100%' }, 300, function() {
          $(this).remove();
        });
      }
    }); */
});


