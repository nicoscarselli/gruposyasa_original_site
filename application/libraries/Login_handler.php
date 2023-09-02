<?php

class Login_handler {

    private $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function do_login(User $user) {
        $this->CI->session->set_userdata([
            'email' => $user->email,
            'logged' => 'syasa_logged',
            'user_id' => $user->id,
            'user_type' => $user->user_type
        ]);
    }

    public function do_logout() {
        session_destroy();
    }

}