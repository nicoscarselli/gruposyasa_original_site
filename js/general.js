$(function() {
    $('.header-banner-owl').owlCarousel({
        items: 1,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true
    });

    $('#logs-table').DataTable();
});

function no_conection_error() {
    swal({
        title: 'Error',
        icon: 'error',
        text: 'Parece que no hay conexión a internet'
    });
}