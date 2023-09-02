<?php

require_once APPPATH . 'libraries/database_objects/Localizable.php';

class Project_status extends Localizable {

    public $id, $name;

    public function localized_name() {
        return $this->localize('name');
    }
}