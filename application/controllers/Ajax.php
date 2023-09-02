<?php

class Ajax extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('projects_model');
    }

    public function get_projects() {
        header('Content-type:application/json;charset=utf-8');

        $projects = $this->projects_model->get_projects(NULL, NULL, [
            'search' => $this->input->post('search'),
            'region' => $this->input->post('region'),
            'categories' => $this->input->post('categories'),
            'order' => [
                'order' => 'created_date',
                'direction' => 'DESC'
            ]
        ]);

        echo json_encode(['status' => 'success', 'projects' => $projects]);
    }

}