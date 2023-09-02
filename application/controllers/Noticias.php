<?php

class Noticias extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('news_model');
        $this->lang->load('news');
    }

    public function index() {
        $view_data = [
            'view' => 'news',
            'title' => localized('news') . ' - ' . localized('main_title'),
            'news' => $this->news_model->get_news(),
            'js' => [
                'news.js'
            ]
        ];

        load_template($view_data);
    }
}