$(function() {
    $('.projects-table').DataTable({
        order: [
            [3, 'DESC']
        ],
        columns: [
            null,
            null,
            null,
            null,
            null,
            { orderable: false }
        ]
    });

    $('.projects-table').on('click', '.btn .btn-danger', function(e) {
        e.preventDefault();
        var project_id = $(this).data('id');

        swal({
            title: 'Borrar',
            icon: 'warning',
            text: '¿Seguro que desea borrar este proyecto?',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = admin_urls.delete_project + '/' + project_id;
            }
        });
    });
});