var PartnersWidgetController = jQuery.inherit({
    __constructor:function() {
        this.initContainer();
        this.initCarousel();
    },

    initContainer: function () {
        this.$partners = jQuery('#partners-carousel');
    },

    initCarousel: function () {
        this.$partners.slick({
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesPerRow: 2,
            infinite: true,
            speed: 500,
            cssEase: 'linear',
            arrows: false,
            rows: 2
        });
    }
});