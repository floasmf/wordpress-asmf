var EventsWidgetController = jQuery.inherit({
    __constructor:function() {
        this.initContainer();
        this.initCarousel();
    },

    initContainer: function () {
        this.$partners = jQuery('#events-carousel');
    },

    initCarousel: function () {
        this.$partners.slick({
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            infinite: true,
            speed: 500,
            cssEase: 'linear',
            arrows: false
        });
    }
});