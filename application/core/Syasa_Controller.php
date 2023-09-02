<?php

class Syasa_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->lang->load('menu');
        $this->lang->load('general');
        $this->lang->load('errors');

        $this->lang->load('obj_project');
        $this->lang->load('obj_news');
    }

}