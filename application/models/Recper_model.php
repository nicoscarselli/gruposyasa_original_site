<?php

require_once DB_OBJECTS_PATH . 'Idioma.php';
require_once DB_OBJECTS_PATH . 'Traduccion.php';
require_once DB_OBJECTS_PATH . 'Gender.php';
require_once DB_OBJECTS_PATH . 'Country.php';
require_once DB_OBJECTS_PATH . 'State.php';
require_once DB_OBJECTS_PATH . 'Title.php';
require_once DB_OBJECTS_PATH . 'Job_area.php';
require_once DB_OBJECTS_PATH . 'Currency.php';

class Recper_model extends CI_Model {

    public function save_job_opp($data) {
        return $this->db->insert('recper_recepcionpersonal', $data);
    }

    /**
     * @return Idioma[]|Idioma|false
     */
    public function get_languages($options = []) {
        $defaults = [
            'key' => null,
            'value' => null,
            'single' => false
        ];

        $options = array_merge($defaults, $options);

        $this->db->from('idioma');
        if ($options['key'] && $options['value']) $this->db->where($options['key'], $options['value']);
        if ($options['single']) return $this->db->get()->row(0, 'Idioma');

        return $this->db->get()->result('Idioma');
    }

    /**
     * @return Traduccion[]
     */
    public function get_traducciones() {
        return $this->db->from('traduccion')
            ->get()->result('Traduccion');
    }

    /**
     * @return Gender[]
     */
    public function get_genders() {
        return $this->db->from('recper_sexo')
            ->get()->result('Gender');
    }

    /**
     * @return Country[]
     */
    public function get_countries() {
        return $this->db->from('recper_pais')
            ->get()->result('Country');
    }

    /**
     * @return State[]
     */
    public function get_states() {
        return $this->db->from('recper_provincia')
            ->get()->result('State');
    }

    /**
     * @return Title[]
     */
    public function get_titles() {
        return $this->db->from('recper_titulo')
            ->get()->result('Title');
    }

    /**
     * @return Job_area[]
     */
    public function get_job_areas() {
        return $this->db->from('recper_areatrabajo')
            ->get()->result('Job_area');
    }

    /**
     * @return Currency[]
     */
    public function get_currencies() {
        return $this->db->from('recper_moneda')
            ->get()->result('Currency');
    }

}