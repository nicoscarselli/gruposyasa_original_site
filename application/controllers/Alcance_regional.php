<?php

class Alcance_regional extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->lang->load('regional_reach');
    }

    public function index() {
        $view_data = [
            'view' => 'regional_reach',
            'title' => localized('regional_reach') . ' - ' . localized('main_title'),
            'js' => [
                'regional_reach.js'
            ]
        ];

        load_template($view_data);
    }

}