<?php

class Nuestros_servicios extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->lang->load('our_services');
    }

    public function index() {
        $view_data = [
            'view' => 'our_services',
            'title' => localized('our_services') . ' - ' . localized('main_title'),
            'js' => [

            ]
        ];

        load_template($view_data);
    }

}