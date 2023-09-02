$(function() {
    $('.users-table').DataTable({
        columns: [
            null,
            null,
            { orderable: false, searchable: false }
        ]
    });

    $('.users-table').on('click', '.delete-btn', function(e) {
        e.preventDefault();
        let user_id = $(this).data('id');

        swal({
            title: 'Borrar',
            icon: 'warning',
            text: '¿Seguro que desea borrar este usuario?',
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = admin_urls.delete_user + '/' + user_id;
            }
        });
    });
});