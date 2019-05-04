var MenuCategories = jQuery.inherit({
    __constructor:function() {
        this.initContainer();
        this.initCarousel();
    },

    initContainer: function () {
        this.$menuCategories = jQuery('.menu-categories > ul');
    },

    initCarousel: function () {
        this.$menuCategories.slick({
            variableWidth: true,
            infinite: false,
            speed: 500,
            cssEase: 'linear',
            arrows: false,
            dots: true,
            slidesToShow: 6,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        });
    }
});