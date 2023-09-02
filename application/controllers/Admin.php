<?php

require_once APPPATH . 'third_party/htmlpurifier/library/HTMLPurifier.auto.php';
require_once APPPATH . 'libraries/Projects/CheckDuplicate.php';
require_once APPPATH . 'libraries/Projects/CanEdit.php';

class Admin extends Syasa_Controller
{

	public function __construct()
	{
		parent::__construct();

		require_login();
		$this->load->model('users_model');
		$this->load->model('projects_model');
		$this->load->model('news_model');
	}

	public function index()
	{
		$view_data = [
			'view'          => 'admin/index',
			'title'         => 'Admin',
			'menu'          => false,
			'banner'        => false,
			'admin_menu'    => true,
			'admin_scripts' => true,
			'js'            => []
		];

		load_template($view_data);
	}

	public function proyectos()
	{
		$options = [
			'order' => [
				'order'     => 'created_date',
				'direction' => 'DESC'
			]
		];

		if ( $this->session->userdata('user_type') == User::USER_TYPE_ADMIN )
		{
			$options['user_id'] = $this->session->userdata('user_id');
		}

		$projects = $this->projects_model->get_projects(null, null, $options);
		$user_projects = $this->projects_model->get_assigned_projects($this->session->userdata('user_id'));

		$projects = array_merge($projects, $user_projects);

		$view_data = [
			'view'          => 'admin/proyectos',
			'title'         => 'Proyectos',
			'menu'          => false,
			'banner'        => false,
			'admin_menu'    => true,
			'admin_scripts' => true,
			'projects'      => $projects,
			'js'            => [
				'admin/proyectos.js'
			]
		];

		load_template($view_data);
	}

	public function project_form( $project_id = null )
	{
		if ( $project_id )
		{
			$project = $this->projects_model->get_projects('id', $project_id);
			if ( empty($project) ) log_error('Unable to find project with id: ' . $project_id);
			$project = $project[0];

			$user = $this->users_model->get_user('id', $this->session->userdata('user_id'))[0];

			if (!(new CanEdit($project, $this->projects_model))
				->user($user))
			{
				redirect('admin/proyectos');
			}

			$project->project_images = $this->projects_model->get_project_images('project_id', $project->id);
			$project->project_videos = $this->projects_model->get_project_videos('project_id', $project->id);

			$project_media = $project->combined_media();
		}

		$regions = $this->projects_model->all_regions();
		$status = $this->projects_model->all_status();
		$categories = $this->projects_model->all_categories();

		if ( isset($project) )
		{
			$logs = $this->logs_model->get_log([
				'key'         => 'object_id',
				'value'       => $project->id,
				'object_type' => 'project',
				'order'       => [
					'by'        => 'date',
					'direction' => 'DESC'
				]
			]);
		}

		$view_data = [
			'view'          => 'admin/project_form',
			'title'         => 'Proyecto',
			'menu'          => false,
			'banner'        => false,
			'admin_menu'    => true,
			'admin_scripts' => true,
			'project'       => ( isset($project) ) ? $project : null,
			'edit'          => ( isset($project) ) ? true : false,
			'regions'       => $regions,
			'status'        => $status,
			'logs'          => ( isset($logs) ) ? $logs : [],
			'categories'    => $categories,
			'project_media' => ( isset($project_media) ) ? $project_media : [],
			'js'            => [
				'admin/project_form.js'
			]
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->project_form_validation_rules());

		if ( $this->form_validation->run() === false )
		{
			load_template($view_data);

			return;
		}

		$duplicate = new CheckDuplicate($this->projects_model);

		$exceptions = isset($project) ? [$project->id] : [];
		if ( $duplicate->isDuplicate(post('code'), $exceptions) )
		{
			$view_data['error'] = 'Ya existe un proyecto con este código: ' . post('code');
			load_template($view_data);

			return;
		}

		$purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());
		$description = $purifier->purify(post('description'));
		$description = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $description); //Remove style="..."
		$description = preg_replace('/(<[^>]+) style=\'.*?\'/i', '$1', $description); //Remove style='...'

		$project_data = [
			'name'               => post('name'),
			'region_id'          => post('region_id'),
			'code'               => post('code'),
			'location'           => post('location'),
			'client'             => post('client'),
			'surface'            => post('surface'),
			'date_period'        => post('date_period'),
			'service_reach'      => post('service_reach'),
			'status_id'          => post('status'),
			'timeframe'          => post('timeframe'),
			'contracting_system' => post('contracting_system'),
			'description'        => $description,
			'cost'               => post('cost'),
			'address'            => post('address')
		];

		$this->db->trans_begin();

		if ( isset($project) )
		{
			$now = new DateTime();
			$project_data['id'] = $project->id;
			$project_data['last_modified_date'] = $now->format('Y-m-d H:i:s');

			$this->projects_model->clear_project_category_relations($project->id);
		} else
		{
			$project_data['created_by_id'] = $this->session->user_id;
		}

		$this->projects_model->save_project($project_data);
		$project_id = ( isset($project) ) ? $project->id : $this->db->insert_id();

		//Log the action
		$this->logger->log(( isset($project) ? Logger::ACTION_UPDATE : Logger::ACTION_CREATE ), [
			'object_id'   => $project_id,
			'object_type' => 'project',
			'user_id'     => $this->session->userdata('user_id'),
		]);

		//Now store the categories
		if ( !empty($_POST['project_categories']) )
		{
			$this->projects_model->save_project_category_relations($this->input->post('project_categories'), $project_id);
		}

		if ( $this->db->trans_status() === false )
		{
			$this->db->trans_rollback();
			$view_data['error'] = 'Database error.';
			load_template($view_data);

			return;
		} else
		{
			$this->db->trans_commit();
			redirect('admin/project_form/' . $project_id);
		}
	}

	/**
	 *
	 */
	public function change_project_image_order()
	{
		header('Content-type: application/json');

		if ( !post('item_id') || !post('project_id') || !post('direction') )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'Datos inválidos'
			]);

			return;
		}

		$project = $this->projects_model->get_projects('id', post('project_id'));
		if ( empty($project) )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'Proyecto inválido'
			]);

			return;
		}
		$project = $project[0];

		if ( post('type') == 'image' )
		{
			$item = $this->projects_model->get_project_images('id', post('item_id'));
		} else
		{
			$item = $this->projects_model->get_project_videos('id', post('item_id'));
		}

		if ( empty($item) )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'Imagen/Video inválido'
			]);

			return;
		}
		$item = $item[0];

		if ( $project->id !== $item->project_id )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'La imagen/video no corresponde al proyecto. Proyecto: ' . $project->id . ' Proyecto de Imagen/Video: ' . $item->project_id . ' Imagen/Video: ' . $item->id
			]);

			return;
		}

		$new_order = ( post('direction') == 'increase' ) ? $item->order + 1 : $item->order - 1;
		if ( $new_order < 1 ) $new_order = 1;

		$item_data = [
			'id'    => $item->id,
			'order' => $new_order
		];

		if ( post('type') == 'image' )
		{
			$this->projects_model->save_project_image($item_data);
		} else
		{
			$this->projects_model->save_project_video($item_data);
		}

		echo json_encode(['type' => 'success', 'order' => $new_order]);
	}

	/**
	 * Called from DropZone.js
	 * @param $project_id
	 */
	public function upload_project_image( $project_id )
	{
		$project = $this->projects_model->get_projects('id', $project_id);
		if ( empty($project) )
		{
			echo 'Proyecto invalido';

			return;
		}
		$project = $project[0];

		$upload_path = Project_image::file_path($project->id);
		if ( !is_dir($upload_path) )
		{
			mkdir($upload_path);
		}

		$config = [
			'upload_path'   => $upload_path,
			'allowed_types' => 'jpg|png|jpeg|gif|bmp|mp4|ogg|webm'
		];

		$this->load->library('upload', $config);
		if ( !$this->upload->do_upload('file') )
		{
			echo 'Error a subir el archivo: ' . $this->upload->display_errors();

			return;
		} else
		{
			$data = $this->upload->data();
			if ( $data['is_image'] )
			{
				$image_data = [
					'project_id' => $project->id,
					'file'       => $data['file_name'],
					'file_type'  => $data['file_type'],
					'full_path'  => $data['full_path']
				];

				$this->projects_model->save_project_image($image_data);
			} else
			{
				//Should be a video since we dont really accept any other types of types
				$video_data = [
					'project_id' => $project->id,
					'file'       => $data['file_name'],
					'file_type'  => $data['file_type'],
					'full_path'  => $data['full_path']
				];

				$this->projects_model->save_project_video($video_data);
			}

			$this->logger->update([
				'object_id'   => $project->id,
				'object_type' => 'project'
			]);
		}
	}

	public function set_main_project_image()
	{
		header('Content-type: application/json');

		$project = $this->projects_model->get_projects('id', post('project_id'));
		if ( empty($project) )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'Proyecto inválido'
			]);

			return;
		}
		$project = $project[0];

		$image = $this->projects_model->get_project_images('id', post('image_id'));
		if ( empty($image) )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'Imagen inválida'
			]);

			return;
		}
		$image = $image[0];

		if ( $project->id !== $image->project_id )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'La imagen no corresponde al proyecto. Proyecto: ' . $project->id . ' Proyecto de Imagen: ' . $image->project_id . ' Imagen: ' . $image->id
			]);

			return;
		}

		$project_data = [
			'id'         => $project->id,
			'main_image' => $image->file
		];
		if ( !$this->projects_model->save_project($project_data) )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'Database error'
			]);

			return;
		}

		$this->logger->update([
			'object_id'   => $project->id,
			'object_type' => 'project'
		]);

		echo json_encode([
			'type' => 'success'
		]);
	}

	public function delete_project_image( $project_id )
	{
		header('Content-type: application/json');

		$project = $this->projects_model->get_projects('id', $project_id);
		if ( empty($project) )
		{
			echo json_encode([
				'type'    => 'error',
				'message' => 'Proyecto inválido'
			]);

			return;
		}
		$project = $project[0];

		if ( isset($_POST['file_name']) && isset($_POST['type']) )
		{
			if ( post('type') == 'image' )
			{
				$item = $this->projects_model->get_project_images('file', $this->input->post('file_name'), [
					'project_id' => $project->id
				]);
			} else
			{
				$item = $this->projects_model->get_project_videos('file', $this->input->post('file_name'), [
					'project_id' => $project->id
				]);
			}

			if ( empty($item) )
			{
				echo json_encode([
					'type'    => 'error',
					'message' => 'Imagen inválida'
				]);

				return;
			}
			$item = $item[0];

			if ( post('type') == 'image' )
			{
				$this->projects_model->delete_project_image($item->id);
			} else
			{
				$this->projects_model->delete_project_video($item->id);
			}

			echo json_encode([
				'type' => 'success'
			]);

			return;
		}

		$this->logger->update([
			'object_id'   => $project->id,
			'object_type' => 'project'
		]);

		echo json_encode([
			'type'    => 'error',
			'message' => 'Parametros invalidos'
		]);
	}

	public function delete_project( $project_id )
	{
		$project = $this->projects_model->get_projects('id', $project_id);
		if ( !$project ) redirect('admin/proyectos');

		$project = $project[0];
		$this->projects_model->delete_project($project->id);

		$this->logger->delete([
			'object_id'   => $project->id,
			'object_type' => 'project'
		]);

		redirect('admin/proyectos');
	}

	public function usuarios()
	{
		if ( $this->session->user_type != User::USER_TYPE_SUPERADMIN ) redirect('admin/usuarios');

		$users = $this->users_model->get_user();
		$user_types = $this->users_model->get_user_types();

		$view_data = [
			'view'          => 'admin/usuarios',
			'title'         => 'Usuarios',
			'menu'          => false,
			'banner'        => false,
			'admin_menu'    => true,
			'admin_scripts' => true,
			'users'         => $users,
			'user_types'    => $user_types,
			'js'            => [
				'admin/usuarios.js'
			]
		];

		load_template($view_data);
	}

	public function user_form( $user_id = null )
	{
		if ( $this->session->user_type != User::USER_TYPE_SUPERADMIN ) redirect('admin/usuarios');

		if ( $user_id )
		{
			$user = $this->users_model->get_user('id', $user_id);
			if ( empty($user) ) redirect('admin/usuarios');
			$user = $user[0];
		}

		$user_types = $this->users_model->get_user_types();

		$view_data = [
			'view'          => 'admin/user_form',
			'title'         => 'Usuario',
			'menu'          => false,
			'banner'        => false,
			'admin_menu'    => true,
			'admin_scripts' => true,
			'user'          => ( isset($user) ) ? $user : null,
			'user_types'    => $user_types,
			'edit'          => ( isset($user) ),
			'js'            => [
				'admin/user_form.js'
			]
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->user_form_validation_rules());

		if ( $this->form_validation->run() === false )
		{
			load_template($view_data);

			return;
		}

		$user_data = [
			'email'     => post('email'),
			'user_type' => post('user_type')
		];

		if ( isset($user) )
		{
			//Editing an existing user
			$user_data['id'] = $user->id;

			if ( post('email') != $user->email )
			{
				//Trying to change email
				$email_check = $this->users_model->get_user('email', post('email'));
				if ( $email_check[0]->id != $user->id )
				{
					$view_data['error'] = 'Ese email ya esta en uso en otro usuario';
					load_template($view_data);

					return;
				}
			}

			if ( !empty(post('password')) )
			{
				$user_data['password'] = $this->users_model->encrypt_password(post('password'));
			}
		} else
		{
			//New user
			if ( empty(post('password')) )
			{
				$view_data['error'] = 'Por favor escriba una contraseña valida';
				load_template($view_data);

				return;
			}

			$user_data['password'] = $this->users_model->encrypt_password(post('password'));
		}

		$this->users_model->save_user($user_data);
		$user_id = ( isset($user) ) ? $user->id : $this->db->insert_id();

		redirect('admin/user_form/' . $user_id);
	}

	public function user_projects( $user_id )
	{
		if ( $this->session->user_type != User::USER_TYPE_SUPERADMIN ) redirect('admin/usuarios');

		$user = $this->users_model->get_user('id', $user_id)[0];
		$projects = $this->projects_model->get_projects();

		$user_projects = $this->projects_model->get_assigned_projects($user_id);

		$projects = array_filter($projects, function($project) use ($user_projects) {
			foreach ($user_projects as $user_project) {
				if ($project->id == $user_project->id) return false;
			}

			return true;
		});

		$view_data = [
			'view'          => 'admin/user_projects',
			'title'         => 'Asignar Proyectos',
			'menu'          => false,
			'banner'        => false,
			'admin_menu'    => true,
			'admin_scripts' => true,
			'user'          => $user,
			'projects'      => $projects,
			'user_projects' => $user_projects,
			'js' => [
				'admin/user_projects.js'
			]
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules([
			['field' => 'project_id', 'label' => 'Proyecto', 'rules' => 'required']
		]);

		if ( $this->form_validation->run() === false )
		{
			load_template($view_data);

			return;
		}

		$this->projects_model->assign_project($user->id, post('project_id'));

		redirect('/admin/user_projects/' . $user->id);
	}

	public function remove_user_project( $user_id, $project_id )
	{
		$this->projects_model->unassign_project($user_id, $project_id);

		redirect('/admin/user_projects/' . $user_id);
	}

	public function delete_user( $user_id )
	{
		if ( $this->session->user_type != User::USER_TYPE_SUPERADMIN ) redirect('admin/usuarios');

		$user = $this->users_model->get_user('id', $user_id);
		if ( !$user ) redirect('admin/usuarios');

		$user = $user[0];
		$this->users_model->delete_user($user->id);

		redirect('admin/usuarios');
	}

	public function noticias()
	{
		$news = $this->news_model->get_news(null, null, [
			'order' => [
				'by'        => 'date',
				'direction' => 'DESC'
			]
		]);

		$view_data = [
			'view'          => 'admin/noticias',
			'title'         => 'Noticias',
			'menu'          => false,
			'banner'        => false,
			'admin_menu'    => true,
			'admin_scripts' => true,
			'news'          => $news,
			'js'            => [
				'admin/news.js'
			]
		];

		load_template($view_data);
	}

	public function news_form( $news_id = null )
	{
		if ( $news_id )
		{
			$news = $this->news_model->get_news('id', $news_id);
			if ( empty($news) ) redirect('admin/news');

			$news = $news[0];

			$logs = $this->logs_model->get_log([
				'key'         => 'object_id',
				'value'       => $news->id,
				'object_type' => 'news'
			]);
		}

		$view_data = [
			'view'       => 'admin/news_form',
			'title'      => 'Noticia',
			'menu'       => false,
			'banner'     => false,
			'admin_menu' => true,
			'news'       => ( isset($news) ) ? $news : null,
			'edit'       => ( isset($news) ) ? true : false,
			'logs'       => ( isset($logs) ) ? $logs : [],
			'js'         => [
				'admin/news_form.js'
			]
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->news_form_validation_rules());

		if ( $this->form_validation->run() === false )
		{
			load_template($view_data);

			return;
		}

		$news_data = [
			'title' => post('title'),
			'date'  => post('date')
		];

		if ( isset($news) )
		{
			$news_data['id'] = $news->id;
		}

		if ( !$this->news_model->save_news($news_data) )
		{
			$view_data['error'] = 'Database error';
			load_template($view_data);

			return;
		}

		$news_id = ( isset($news) ) ? $news->id : $this->db->insert_id();

		$this->logger->log(( isset($news) ? Logger::ACTION_UPDATE : Logger::ACTION_CREATE ), [
			'object_id'   => $news_id,
			'object_type' => 'news'
		]);

		if ( !$this->process_news_files($news_id) )
		{
			$view_data['error'] = 'Error al subir los archivos';
			load_template($view_data);

			return;
		}

		redirect('admin/news_form/' . $news_id);
	}

	public function delete_news( $news_id )
	{
		$news = $this->news_model->get_news('id', $news_id);
		if ( !$news ) redirect('admin/noticias');

		$this->news_model->delete_news($news_id);
		$this->logger->delete([
			'object_id'   => $news->id,
			'object_type' => 'news'
		]);

		redirect('admin/noticias');
	}

	public function marina_pw( $password )
	{
		echo $this->users_model->encrypt_password($password);
	}

	public function user_data() {
		$user = $this->users_model->get_user('id', $this->session->userdata('user_id'))[0];
		
		print_r($user); 
		echo '<br/>';
		print_r($_SESSION);
	}

	private function process_news_files( $news_id )
	{
		$upload_path = News::upload_path($news_id);
		if ( !is_dir($upload_path) ) mkdir($upload_path);

		$config = [
			'upload_path'   => $upload_path,
			'allowed_types' => 'pdf|jpg|png|jpeg|gif|bmp'
		];

		$this->load->library('upload', $config);

		if ( !empty($_FILES['file']) && $_FILES['file']['error'] === 0 )
		{
			if ( !$this->upload->do_upload('file') )
			{
				return false;
			} else
			{
				$this->news_model->save_news([
					'id'   => $news_id,
					'file' => $this->upload->data('file_name')
				]);
			}
		}

		if ( !empty($_FILES['image']) && $_FILES['image']['error'] === 0 )
		{
			if ( !$this->upload->do_upload('image') )
			{
				return false;
			} else
			{
				$this->news_model->save_news([
					'id'    => $news_id,
					'image' => $this->upload->data('file_name')
				]);
			}
		}

		return true;
	}

	private function project_form_validation_rules()
	{
		return [
			[
				'field' => 'name',
				'label' => localized('project_name'),
				'rules' => 'trim|required'
			],
			[
				'field' => 'region_id',
				'label' => localized('project_region_id'),
				'rules' => 'required'
			],
			[
				'field' => 'code',
				'label' => localized('project_code'),
				'rules' => 'trim|required'
			],
			[
				'field' => 'location',
				'label' => localized('project_location'),
				'rules' => 'trim|required'
			]
		];
	}

	private function user_form_validation_rules()
	{
		return [
			['field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email'],
			['field' => 'user_type', 'label' => 'Tipo', 'rules' => 'required'],
			['field' => 'password', 'label' => 'Contraseña', 'rules' => 'trim|matches[repeat_password]'],
			['field' => 'repeat_password', 'label' => 'Repetir Contraseña', 'rules' => 'trim']
		];
	}

	private function news_form_validation_rules()
	{
		return [
			[
				'field' => 'title',
				'label' => localized('news_title'),
				'rules' => 'trim|required'
			],
			[
				'field' => 'date',
				'label' => localized('news_date'),
				'rules' => 'trim|required|min_length[10]'
			]
		];
	}

}