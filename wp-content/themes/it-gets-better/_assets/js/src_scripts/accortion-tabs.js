jQuery ( '.tab' ).click (  function  ( ) {
  if ( jQuery ( this ).hasClass ( 'collapsed' ) ) {
    jQuery ( this ).removeClass ( 'collapsed' );
    jQuery ( this ).siblings ( ).removeClass ( 'expanded' );
    jQuery ( this ).addClass ( 'expanded' );
    jQuery ( this ).siblings ( ).addClass ( 'collapsed' );
  }
  else {
    jQuery ( this ).toggleClass ( 'expanded' );
    jQuery ( this ).siblings ( ).toggleClass ( 'collapsed' );
  }
} );