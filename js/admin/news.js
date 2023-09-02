$(function() {
    $('.news-table').DataTable({

    });

    $('.news-table').on('click', '.delete-btn', function(e) {
        e.preventDefault();
        var news_id = $(this).data('id');

        swal({
            title: 'Borrar',
            icon: 'warning',
            text: '¿Seguro que deseas borrar esta noticia?',
            buttons: true,
            dangerMode: true
        }).then(willDelete => {
            if (willDelete) {
                window.location.href = admin_urls.delete_news + '/' + news_id
            }
        });
    });
});