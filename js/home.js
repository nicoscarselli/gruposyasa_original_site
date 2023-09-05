$(function() {
    $('.news').owlCarousel({
        loop:true,
        autoHeight: true,
        margin:30,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });
});

