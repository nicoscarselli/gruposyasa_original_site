Dropzone.autoDiscover = false;

$(function() {
    $('.summernote').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'hr']]
        ],
        popover: {
            link: [
                ['link', ['linkDialogShow', 'unlink']]
            ]
        }
    });

    $('#project-form').validate({
        rules: {
            name: 'required',
            region_id: 'required',
            code: 'required',
            location: 'required'
        },
        ignore: ":hidden:not(#summernote),.note-editable.card-block"
    });

    var dropzone = new Dropzone('.dropzone', {
        url: admin_urls.upload_project_image + '/' + project_id,
        acceptedFiles: '.jpg,.jpeg,.png,.gif,.bmp,.mp4,.webm,.ogg',
        addRemoveLinks: true
    });

    dropzone.on('removedfile', function(file) {
        var file_name = file.name;
        $.ajax({
            method: 'POST',
            url: admin_urls.delete_project_image + '/' + project_id,
            data: {
                file_name: file_name
            }
        }).done(function(response) {
            if (response.type === 'error') {
                swal({
                    title: 'Error',
                    icon: 'error',
                    text: response.message
                });
            }
        }).fail(function() {
            no_conection_error();
        });
    });

    $('.delete-image-button').click(function(e) {
        e.preventDefault();

        let file_name = $(this).data('image-name');
        let file_id = $(this).data('image-id');
		let type = $(this).data('type');

        $.ajax({
            method: 'POST',
            url: admin_urls.delete_project_image + '/' + project_id,
            data: {
                file_name: file_name,
				type: type,
            }
        }).done(function(response) {
            if (response.type === 'error') {
                swal({
                    title: 'Error',
                    icon: 'error',
                    text: response.message
                });
            } else if (response.type === 'success') {
                $('#image-' + file_id).remove();
            }
        }).fail(function() {
            no_conection_error();
        });
    });

    $('.project-form')
        .on('click', '.set-main-image-button', function(e) {
            e.preventDefault();

            const main_image_id = $(this).data('image-id');

            $.ajax({
                method: 'POST',
                url: admin_urls.set_main_project_image,
                data: {
                    image_id: main_image_id,
                    project_id: project_id
                }
            }).done(function(response) {
                if (response.type === 'success') {
                    location.reload();
                } else if (response.type === 'error') {
                    swal({
                        title: 'Error',
                        icon: 'error',
                        text: response.message
                    });
                }
            }).fail(function() {
                no_conection_error();
            });
        })
        .on('click', '.increase-priority-button', function(e) {
            e.preventDefault();
            $('.decrease-priority-button, .increase-priority-button').prop('disabled', true);

            const item_id = $(this).data('image-id');
            const type = $(this).data('type');
            $.ajax({
                method: 'POST',
                url: admin_urls.change_project_image_order,
                data: {
                    item_id: item_id,
                    project_id: project_id,
                    type: type,
                    direction: 'increase'
                }
            }).done(function(response) {
                const new_order = response.order;
                update_image_row(item_id, new_order);

                rebuild_images_list();
                $('.decrease-priority-button, .increase-priority-button').prop('disabled', false);
            }).fail(function() {
                no_conection_error();
            });
        })
        .on('click', '.decrease-priority-button', function(e) {
            e.preventDefault();
            $('.decrease-priority-button, .increase-priority-button').prop('disabled', true);

            const item_id = $(this).data('image-id');
			const type = $(this).data('type');
            $.ajax({
                method: 'POST',
                url: admin_urls.change_project_image_order,
                data: {
					item_id: item_id,
                    project_id: project_id,
					type: type,
                    direction: 'decrease'
                }
            }).done(function(response) {
                const new_order = response.order;
                update_image_row(item_id, new_order);

                rebuild_images_list();
                $('.decrease-priority-button, .increase-priority-button').prop('disabled', false);
            }).fail(function() {
                no_conection_error();
            });
        });

    function update_image_row(image_id, order) {
        console.log('Update image row', image_id, order);

        const el = $('#image-' + image_id);
        el.attr('data-order', order);
        el.find('.image-order-display').html(order);

        console.log('Element order set to ' + el.attr('data-order'));

        el.find('.decrease-priority-button').css('display', (order <= 1) ? 'none' : 'inline-block');
    }

    function rebuild_images_list() {
        console.log('Rebuild list');

        let sorted_rows = $('.image-row').sort(function(a, b) {
            const contentA = parseInt($(a).attr('data-order'));
            const contentB = parseInt($(b).attr('data-order'));

            return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
        });

        console.log('Sorted rows', sorted_rows);
        $('#project-images-list').html(sorted_rows);
    }
});