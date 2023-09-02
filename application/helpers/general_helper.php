<?php

//Shorthands
function load_view($view, $vars = [], $return = FALSE) {
    $CI =& get_instance();
    $CI->load->view($view, $vars, $return);
}

function load_template($vars = [], $return = FALSE) {
    load_view('template', $vars, $return);
}

function post($value) {
    return get_instance()->input->post($value);
}

//Routes
function images_folder($path) {
    return base_url() . 'images/' . $path;
}

function project_files_image($project_id, $file_name) {
    return base_url() . 'project_files/' . $project_id . '/' . $file_name;
}

//Utilities
function print_rpre($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function require_login() {
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'syasa_logged') {
        return true;
    }

    redirect('login');
}

function delete_directory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}

//Logging
function log_error($message, $sender = NULL) {
    $CI =& get_instance();

    $error = [
        'controller' => $CI->uri->segment(1, 'NA'),
        'path' => $CI->uri->uri_string(),
        'server' => $_SERVER,
        'session' => $_SESSION,
        'request' => $_REQUEST,
        'message' => $message
    ];

    //papertrail('error', print_r($error, true), (($sender) ? $sender : $error['controller']) );
    log_message('error', print_r($error, true));
}

function log_not_found($message) {
    log_error($message);
    redirect('admin');
}