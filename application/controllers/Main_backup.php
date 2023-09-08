<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Syasa_Controller {

	public function __construct() {
		parent::__construct();

		$this->lang->load('home');
		$this->load->model('news_model');
        $this->lang->load('news');
	}

	public function index() {
		$view_data = [
			'view' => 'home', 'news',
			'title' => localized('main_title'),
			'news' => $this->news_model->get_news(),
			'js' => [
				'home.js'
			]
		];

		load_template($view_data);
	}
}