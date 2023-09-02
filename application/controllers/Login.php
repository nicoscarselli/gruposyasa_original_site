<?php

class Login extends Syasa_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('users_model');
    }

    public function index() {
        $view_data = [
            'view' => 'admin/login',
            'title' => 'Login',
            'menu' => true,
            'banner' => false,
            'js' => []
        ];

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $user = $this->users_model->get_user('email', $this->input->post('email'));
            if (!$user) {
                $view_data['error'] = 'Email o contraseña invalidos';
            } else {
                $user = $user[0];
                if (!$this->users_model->verify_password($this->input->post('password'), $user->password)) {
                    $view_data['error'] = 'Email o contraseña invalidos';
                } else {
                    $this->login_handler->do_login($user);
                    redirect('admin');
                }
            }
        }

        load_template($view_data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}