$(function() {
    $('.photos-gallery').owlCarousel({
        loop:true,
        margin:8,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:8,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
});