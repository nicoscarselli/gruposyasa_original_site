$('.photos-gallery').owlCarousel({
    items:1,
    autoplay:true,
    autoplayTimeout:3000,
    loop:true,
    margin:30,
    dots: true,
    nav: true,
    navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
    autoHeight: true,
})

$('.proyectos-similares').owlCarousel({
    loop:true,
    margin:30,
    dots: true,
    nav: true,
    navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
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
})