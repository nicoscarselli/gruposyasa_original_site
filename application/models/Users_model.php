<?php

require_once APPPATH . 'libraries/database_objects/User.php';
require_once APPPATH . 'libraries/database_objects/User_type.php';

class Users_model extends CI_Model {

    public $include_deleted = false;

    /**
     * @param null $key
     * @param null $value
     * @return User[]
     */
    public function get_user($key = NULL, $value = NULL) {
        $this->build_user_query();

        if ($key && $value) $this->db->where($key, $value);

        return $this->db->get()->result('User');
    }

    public function save_user($data) {
        if (!empty($data['id'])) {
            return $this->db->where('id', $data['id'])
                ->update('users', $data);
        } else {
            return $this->db->insert('users', $data);
        }
    }

    public function delete_user($user_id) {
        return $this->db->where('id', $user_id)
            ->update('users', [
                'is_deleted' => 1
            ]);
    }

    /**
     * @return User_type[]
     */
    public function get_user_types() {
        $this->db->select('*')
            ->from('user_types as type');

        return $this->db->get()->result('User_type');
    }

    public function encrypt_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verify_password($password, $hash) {
        return password_verify($password, $hash);
    }

    private function build_user_query() {
        $this->db->select('user.*')
            ->from('users as user');

        if (!$this->include_deleted) $this->db->where('is_deleted', 0);
    }

}