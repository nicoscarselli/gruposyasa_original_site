<?php

class nosotros extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->lang->load('about_us');
    }

    public function index() {
        $view_data = [
            'view' => 'about_us',
            'title' => localized('about_us_page_title') . ' - ' . localized('main_title'),
            'js' => [

            ]
        ];

        load_template($view_data);
    }

}
