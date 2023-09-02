<?php

class Localizable {

    public function localize($property) {
        $value = json_decode($this->$property);
        $lang = 'es';

        return $value->$lang;
    }

}