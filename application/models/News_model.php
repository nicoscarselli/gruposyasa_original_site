<?php

require_once APPPATH . 'libraries/database_objects/News.php';

class News_model extends CI_Model {

    public function get_news($key = null, $value = null, $options = []) {
        $this->db->select('*')
            ->from('news');

        if ($key && $value) $this->db->where($key, $value);
        if (!empty($options['order'])) {
            $this->db->order_by($options['order']['by'], $options['order']['direction']);
        }

        return $this->db->get()->result('News');
    }

    public function save_news($data) {
        if (!empty($data['id'])) {
            return $this->db->where('id', $data['id'])
                ->update('news', $data);
        } else {
            return $this->db->insert('news', $data);
        }
    }

    public function delete_news($news_id) {
        if ($this->db->where('id', $news_id)
            ->delete('news')) {
            return delete_directory(News::upload_path($news_id));
        }

        return false;
    }

}