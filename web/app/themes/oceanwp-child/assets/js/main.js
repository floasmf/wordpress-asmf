jQuery(document).ready(function() {
    new PartnersWidgetController();
    new EventsWidgetController();

    setTimeout(function() {
        // Replace Custom icon
        jQuery( '#sidr [class*="sidr-class-custom-icon"]' ).attr( 'class', function( i, c ) {
            c = c.replace('sidr-class-custom-icon', 'custom-icon');
            return c;
        } );
    }, 0);
});
