<?php

class News {

    const PATH = 'news_files/';

    public $id, $date, $title, $file, $image;

    public function file() {
        return base_url() . self::PATH . $this->id . '/' . $this->file;
    }

    public function image() {
        return base_url() . self::PATH . $this->id . '/' . $this->image;
    }

    public static function upload_path($news_id) {
        return './' . self::PATH . $news_id;
    }

}