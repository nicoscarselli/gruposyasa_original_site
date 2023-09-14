<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Syasa_Controller {

	public function __construct() {
		parent::__construct();

		$this->lang->load('home');
		$this->load->model('news_model');
        $this->lang->load('news');
		$this->lang->load('job_opportunities');
        $this->load->model('recper_model');
        $this->load->library('form_validation');
	}

	public function index() {
        $language = $this->recper_model->get_languages([
            'key' => 'codigo',
            'value' => user_language(true),
            'single' => true
        ]);

		$view_data = [
			'view' => 'home', 'news', 'job_opportunities',
			'title' => localized('main_title'),
			'news' => $this->news_model->get_news(),
            'language' => $language,
            'translations' => $this->recper_model->get_traducciones(),
            'genders' => $this->recper_model->get_genders(),
            'countries' => $this->recper_model->get_countries(),
            'states' => $this->recper_model->get_states(),
            'titles' => $this->recper_model->get_titles(),
            'job_areas' => $this->recper_model->get_job_areas(),
            'currencies' => $this->recper_model->get_currencies(),
			'js' => [
				'home.js'
			]
		];
		
		/* FORM */
        
        $this->form_validation->set_rules($this->validation_rules());
        if ($this->form_validation->run() === FALSE) {
            load_template($view_data);
            return;
        }

        $now = new DateTime();
        $birth = new DateTime(post('fechanacimiento'));

        $insert_data = [
            'fecha' => $now->format('Y-m-d H:i:s'),
            'apellido' => post('apellido'),
            'nombre' => post('nombre'),
            'email' => post('email'),
            'fechanacimiento' => $birth->format('Y-m-d'),
            'id_recper_sexo' => post('id_recper_sexo'),
            'id_recper_pais' => post('id_recper_pais'),
            'id_recper_provincia' => post('id_recper_provincia'),
            'telefono' => post('telefono'),
            'id_recper_titulo' => post('id_recper_titulo'),
            'id_recper_areatrabajo' => post('id_recper_areatrabajo'),
            'id_recper_moneda' => post('id_recper_moneda'),
            'monto' => post('monto'),
            'dispext' => (post('dispext')) ? 1 : 0,
            'curriculum' => '',
            'referencia' => '',
        ];

        $upload_config = [
            'upload_path' => './reclutamientopersonal/curriculums/',
            'allowed_types' => 'pdf|odt|ott|docx|doc',
            'max_size' => '4096',
            'file_name' => post('nombre') . '_' . post('apellido') . '_' . $now->format('YmdHis')
        ];

        $this->load->library('upload', $upload_config);

        if (!$this->upload->do_upload('cv')) {
            $view_data['error'] = $this->upload->display_errors();
            load_template($view_data);
            return;
        }

        $upload_data = $this->upload->data();
        $insert_data['curriculum'] = $upload_data['file_name'];

        if (!$this->recper_model->save_job_opp($insert_data)) {
            $view_data['error'] = 'Database error';
            load_template($view_data);
            return;
        }

        $view_data['thank_you'] = 1;

        load_template($view_data);
        return;
		/* FORM */
	}

	private function validation_rules() {
        return [
            [
                'field' => 'apellido',
                'label' => localized('job_opps_last_name'),
                'rules' => 'trim|required'
            ],
            [
                'field' => 'nombre',
                'label' => localized('job_opps_first_name'),
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => localized('job_opps_email'),
                'rules' => 'trim|valid_email'
            ],
            [
                'field' => 'fechanacimiento',
                'label' => localized('job_opps_birthday'),
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_recper_sexo',
                'label' => localized('job_opps_gender'),
                'rules' => 'required'
            ],
            [
                'field' => 'id_recper_pais',
                'label' => localized('job_opps_country'),
                'rules' => 'required'
            ],
            [
                'field' => 'id_recper_provincia',
                'label' => localized('job_opps_state'),
                'rules' => 'required'
            ],
            [
                'field' => 'id_recper_titulo',
                'label' => localized('job_opps_job_title'),
                'rules' => 'required'
            ],
            [
                'field' => 'id_recper_areatrabajo',
                'label' => localized('job_opps_job_area'),
                'rules' => 'required'
            ],
            [
                'field' => 'id_recper_moneda',
                'label' => localized('job_opps_salary'),
                'rules' => 'required'
            ],
            [
                'field' => 'monto',
                'label' => localized('job_opps_salary'),
                'rules' => 'required|numeric'
            ]
        ];
    }
}