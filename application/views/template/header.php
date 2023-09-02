<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?= (!empty($title)) ? $title . ' - ' : ''; ?> <?= config_item('site_name'); ?></title>

    <?php load_view('template/css'); ?>

    <script type="text/javascript" src="<?= base_url(); ?>components/jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
    <?php if (!isset($menu) || $menu == true) load_view('template/menu'); ?>

    <?php if (isset($admin_menu) && $admin_menu == true) load_view('template/admin_menu'); ?>
