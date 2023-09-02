$(function() {
    $('.photos-gallery').owlCarousel({
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

    $('.projects-gallery').owlCarousel({
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    });
});