var CarouselController = jQuery.inherit({
    __constructor:function() {
        this.initContainer();
        this.initCarousel();
    },

    initContainer: function () {
        this.$partners = jQuery('.carousel');
    },

    initCarousel: function () {
        this.$partners.slick({
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            infinite: true,
            speed: 500,
            cssEase: 'linear',
            prevArrow: '<button type="button" class="slick-prev"><span class="fa fa-angle-left"></span></button>',
            nextArrow: '<button type="button" class="slick-next"><span class="fa fa-angle-right"></span></button>'

        });
    }
});