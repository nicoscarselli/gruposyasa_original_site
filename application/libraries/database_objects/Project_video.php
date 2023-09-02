<?php

class Project_video
{
	public $id, $project_id, $file, $file_type, $full_path, $created_date, $order;

	public function video_url()
	{
		return self::file_path($this->project_id) . '/' . $this->file;
	}

	static public function file_path( $project_id )
	{
		return './project_files/' . $project_id;
	}
}