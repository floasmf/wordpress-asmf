var TeamController = jQuery.inherit({
    __constructor:function() {
        this.initContainer();
        this.initCarousel();
    },

    initContainer: function () {
        this.$teamCarousel = jQuery('#carousel-thumbnail-team > div');
    },

    initCarousel: function () {
        this.$teamCarousel.slick({
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 1,
            infinite: true,
            speed: 500,
            cssEase: 'linear',
            arrows: false
        });
    }
});