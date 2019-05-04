jQuery(document).ready(function() {
    new PartnersWidgetController();
    new CarouselController();
    new MenuCategories();

    if (typeof TeamController === 'function') {
        new TeamController();
    }

    setTimeout(function() {
        // Replace Custom icon
        jQuery( '#sidr [class*="sidr-class-custom-icon"]' ).attr( 'class', function( i, c ) {
            c = c.replace('sidr-class-custom-icon', 'custom-icon');
            return c;
        } );
    }, 0);
    jQuery('#menu-classements li a').attr('target', '_blank');
});
