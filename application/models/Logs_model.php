<?php

class Logs_model extends CI_Model {

    /**
     * @param $data
     * @return bool
     */
    public function save_log($data) {
        if (isset($data['id'])) {
            return $this->db->where('id', $data['id'])
                ->update('logs', $data);
        } else {
            return $this->db->insert('logs', $data);
        }
    }

    /**
     * @param $options
     * @return array|stdClass|bool
     */
    public function get_log($options) {
        $defaults = [
            'key' => null,
            'value' => null,
            'single' => false,
            'object_type' => null,
            'order' => [
                'by' => 'log.date',
                'direction' => 'DESC'
            ]
        ];
        $options = array_merge($defaults, $options);

        $this->db->select('log.*, user.email as user_email')
            ->from('logs as log');

        if ($options['key'] && $options['value']) $this->db->where($options['key'], $options['value']);
        if ($options['object_type']) $this->db->where('log.object_type', $options['object_type']);
        if ($options['order']) {
            $this->db->order_by($options['order']['by'], $options['order']['direction']);
        }

        $this->db->join('users as user', 'user.id = log.user_id');

        if ($options['single']) return $this->db->get()->row(0);

        return $this->db->get()->result();
    }

}