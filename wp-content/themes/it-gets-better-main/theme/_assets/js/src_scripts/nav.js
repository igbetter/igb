jQuery(document).ready(function($) {

	$( 'li.current_page_parent' ).addClass( 'sub_menu_open' );


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

});
