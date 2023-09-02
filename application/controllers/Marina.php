<?php
require_once APPPATH . 'libraries/Projects/CheckDuplicate.php';

class Marina extends Syasa_Controller
{
	public function duplicates(  )
	{
		$this->load->model('projects_model');
		$check = new CheckDuplicate($this->projects_model);

		var_dump($check->isDuplicate('T-1226', [12]));
	}
}