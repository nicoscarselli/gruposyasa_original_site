<?php

class Proyectos extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('projects_model');

        $this->lang->load('projects');
    }

    public function index() {
        $view_data = [
            'view' => 'projects',
            'title' => localized('projects_title'),
            'regions' => $this->projects_model->all_regions(),
            'categories' => $this->projects_model->all_categories(),
            'projects' => $this->projects_model->get_projects(),
            'js' => [
                'projects.js'
            ]
        ];

        load_template($view_data);
    }

    public function proyecto($project_id) {
        $project = $this->projects_model->get_projects('id', $project_id);
        if (empty($project)) redirect('proyectos');

        $project = $project[0];
        $project->categories = $this->projects_model->get_project_categories($project);

        $project_categories = [];
        foreach ($project->categories as $index => $project_category) {
            $project_categories[] = $project_category->id;
        }

        //Categories were passed?
        if (!empty($_GET['c'])) $project_categories = explode(',', $this->input->get('c'));

        $related_projects = (!empty($project_categories)) ? $this->projects_model->get_related_projects($project->id, $project_categories, 20) : [];
        foreach ($related_projects as $related_project) {
            $related_project->categories = $this->projects_model->get_project_categories($related_project);
        }

        $project->project_images = $this->projects_model->get_project_images('project_id', $project->id);
        $project->project_videos = $this->projects_model->get_project_videos('project_id', $project->id);

        $project_media = $project->combined_media();

        $view_data = [
            'view' => 'single_project',
            'title' => $project->name,
            'project' => $project,
            'related_projects' => $related_projects,
			'project_media' => $project_media,
            'js' => [
                'single_project.js'
            ]
        ];

        load_template($view_data);
    }

}