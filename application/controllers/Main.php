<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Syasa_Controller {

	public function __construct() {
		parent::__construct();

		$this->lang->load('home');
	}

	public function index() {
		$view_data = [
			'view' => 'home',
			'title' => localized('main_title'),
			'js' => [
				'home.js'
			]
		];

		load_template($view_data);
	}
}