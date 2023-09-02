<?php

class Aviso_de_privacidad extends Syasa_Controller {

    public function index() {
        $view_data = [
            'view' => 'privacy_statement'
        ];
        load_template($view_data);
    }

}