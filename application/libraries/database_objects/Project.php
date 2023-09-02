<?php

require_once APPPATH . 'libraries/database_objects/Localizable.php';

class Project extends Localizable {

    public $id, $name, $region_id, $code, $location, $client;
    public $surface, $date_period, $service_reach, $status_id;
    public $timeframe, $contracting_system, $description;
    public $created_date, $last_modified_date, $is_deleted, $created_by_id;
    public $cost, $address;
    public $main_image;

    public $region_name;
    public $status_name;

    /**
     * @var Project_image[] $project_images
     */
    public $project_images;

	/**
	 * @var Project_video[] $project_videos
	 */
    public $project_videos;

    /**
     * @var Project_category[] $categories
     */
    public $categories = [];

    public function has_category($category_id) {
        foreach ($this->categories as $category) {
            if ($category->id == $category_id) return true;
        }

        return false;
    }

    public function image_url() {
        return self::file_path($this->id) . '/' . $this->main_image;
    }

    static public function file_path($project_id) {
        return './project_files/' . $project_id;
    }

	public function combined_media(  )
	{
		$project_media = array_merge($this->project_images, $this->project_videos);
		usort($project_media, function ( $a, $b ) {
			if ( $a->order == $b->order ) return 0;

			return ( $a->order < $b->order ) ? -1 : 1;
		});

		return $project_media;
    }
}