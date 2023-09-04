<!-- Variables -->
<script>
    var localized = {
        'error_title': "<?= localized('js_error_title'); ?>",
        'connection_error': "<?= localized('js_connection_error'); ?>",
        'view_details': "<?= localized('view_details') ?>",

        'project_location': "<?= localized('project_location'); ?>",
        'project_surface': "<?= localized('project_surface'); ?>",
        'project_client': "<?= localized('project_client'); ?>"
    };

    var language = 'es';

    var urls = {
        'ajax_projects': "<?= site_url('ajax/get_projects'); ?>",
        'project_images': "<?= base_url('project_files'); ?>",
        'images': "<?= base_url('images'); ?>",
        'base_url': "<?= base_url(); ?>"
    };

    <?php if (!empty($admin_scripts) && $admin_scripts == true): ?>
        var admin_urls = {
            'delete_project': "<?= site_url('admin/delete_project'); ?>",
            'delete_news': "<?= site_url('admin/delete_news'); ?>",
            'delete_user': "<?= site_url('admin/delete_user'); ?>",
            'upload_project_image': "<?= site_url('admin/upload_project_image'); ?>",
            'delete_project_image': "<?= site_url('admin/delete_project_image'); ?>",
            'change_project_image_order': "<?= site_url('admin/change_project_image_order'); ?>",
            'set_main_project_image': "<?= site_url('admin/set_main_project_image'); ?>"
        };
    <?php endif; ?>
</script>


<!-- Bootstrap -->
<script type="text/javascript" src="<?= base_url(); ?>components/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="<?= base_url(); ?>components/owlcarousel2-2.2.1/dist/owl.carousel.min.js"></script>

<!-- SWAL -->
<script type="text/javascript" src="<?= base_url(); ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>

<!-- jQuery Validation -->
<script type="text/javascript" src="<?= base_url(); ?>node_modules/jquery-validation/dist/jquery.validate.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>node_modules/jquery-validation/dist/additional-methods.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>node_modules/jquery-validation/dist/localization/messages_es.js"></script>

<!-- DataTables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.4.2/b-html5-1.4.2/cr-1.4.1/fc-3.2.3/fh-3.1.3/r-2.2.0/datatables.min.js"></script>

<!-- Dropzone -->
<script type="text/javascript" src="<?= base_url(); ?>components/dropzone/dropzone.js"></script>

<!-- Summernote -->
<script type="text/javascript" src="<?= base_url(); ?>node_modules/summernote/dist/summernote-bs4.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>node_modules/summernote/dist/lang/summernote-es-ES.js"></script>

<!-- Lightbox 2 -->
<script type="text/javascript" src="<?= base_url(); ?>node_modules/lightbox2/dist/js/lightbox.min.js"></script>

<!-- Select2 -->
<script type="text/javascript" src="<?= base_url(); ?>node_modules/select2/dist/js/select2.min.js"></script>

<!-- Bootstrap datepicker -->
<script type="text/javascript" src="<?= base_url(); ?>node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Custom -->
<script type="text/javascript" src="<?= base_url(); ?>js/general.js"></script>

<?php if (!empty($js)): ?>
    <!-- Page scripts -->
    <?php foreach ($js as $script): ?>
        <script type="text/javascript" src="<?= base_url(); ?>js/<?= $script; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
