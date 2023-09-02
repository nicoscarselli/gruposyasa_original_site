<?php

class nosotros extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->lang->load('what_we_do');
    }

    public function index() {
        $view_data = [
            'view' => 'what_we_do',
            'title' => localized('what_we_do_page_title') . ' - ' . localized('main_title'),
            'js' => [

            ]
        ];

        load_template($view_data);
    }

}