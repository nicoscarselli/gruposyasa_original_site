<?php

class Logger {

    private $CI;
    private $logs_model;

    const ACTION_UPDATE = 'UPDATE';
    const ACTION_DELETE = 'DELETE';
    const ACTION_CREATE = 'CREATE';

    public function __construct() {
        $this->CI =& get_instance();

        $this->CI->load->model('logs_model');
        $this->logs_model = $this->CI->logs_model;
    }

    /**
     * @param string $action
     * @param array $options
     * @return bool
     */
    public function log($action, $options) {
        $defaults = [
            'user_id' => $this->CI->session->userdata('user_id')
        ];
        $options = array_merge($defaults, $options);

        $now = new DateTime();

        $log_data = [
            'object_id' => $options['object_id'],
            'object_type' => $options['object_type'],
            'user_id' => $options['user_id'],
            'date' => $now->format('Y-m-d H:i:s'),
            'action' => $action
        ];

        return $this->logs_model->save_log($log_data);
    }

    public function create($options) {
        return $this->log(self::ACTION_CREATE, $options);
    }

    public function delete($options) {
        return $this->log(self::ACTION_DELETE, $options);
    }

    public function update($options) {
        return $this->log(self::ACTION_UPDATE, $options);
    }
}