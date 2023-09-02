<?php

require_once APPPATH . 'libraries/database_objects/Project.php';
require_once APPPATH . 'libraries/database_objects/Project_region.php';
require_once APPPATH . 'libraries/database_objects/Project_category.php';
require_once APPPATH . 'libraries/database_objects/Project_image.php';
require_once APPPATH . 'libraries/database_objects/Project_video.php';
require_once APPPATH . 'libraries/database_objects/Project_status.php';

class Projects_model extends CI_Model
{

	public $include_deleted = false;

	/**
	 * @return Project_region[]
	 */
	public function all_regions()
	{
		return $this->db->from('project_regions')
						->get()->result('Project_region');
	}

	/**
	 * @return Project_category[]
	 */
	public function all_categories()
	{
		return $this->db->from('project_categories')
						->get()->result('Project_category');
	}

	public function all_status()
	{
		return $this->db->from('project_status')
						->get()->result('Project_status');
	}

	/**
	 * @param Project $project
	 * @return Project_category[]
	 */
	public function get_project_categories( Project $project )
	{
		$this->build_project_category_relations_query();

		return $this->db->where('relation.project_id', $project->id)
						->get()->result('Project_category');
	}

	public function clear_project_category_relations( $project_id )
	{
		return $this->db->where('project_id', $project_id)
						->delete('project_category_relations');
	}

	public function save_project_category_relations( $categories, $project_id )
	{
		$batch = [];
		foreach ( $categories as $category )
		{
			$batch[] = [
				'project_id'          => $project_id,
				'project_category_id' => $category
			];
		}

		return $this->db->insert_batch('project_category_relations', $batch);
	}

	/**
	 * @param null $key
	 * @param null $value
	 * @param null $options ['region', 'search', 'categories']
	 * @return Project[]
	 */
	public function get_projects( $key = null, $value = null, $options = null )
	{
		$this->build_projects_query();

		if ( $key && $value ) $this->db->where('project.' . $key, $value);
		if ( is_array($options) )
		{
			if ( !empty($options['region']) )
			{
				$this->db->where('region_id', $options['region']);
			}

			if ( !empty($options['search']) )
			{
				$this->db->group_start();
				$this->db->like('project.name', $options['search'], 'both');
				$this->db->or_like('project.description', $options['search'], 'both');
				$this->db->or_like('region.name', $options['search'], 'both');
				$this->db->group_end();
			}

			if ( !empty($options['order']) )
			{
				$this->db->order_by($options['order']['order'], $options['order']['direction']);
			}

			if ( !empty($options['user_id']) )
			{
				$this->db->where('project.created_by_id', $options['user_id']);
			}
		}

		$projects = $this->db->get()->result('Project');
		foreach ( $projects as $index => $project )
		{
			/** @var Project $project */
			$project->categories = $this->get_project_categories($project);

			if ( !empty($options['categories']) )
			{
				$category_found = false;
				foreach ( $project->categories as $category )
				{
					foreach ( $options['categories'] as $category_id )
					{
						if ( $category->id == $category_id ) $category_found = true;
					}
				}

				if ( !$category_found )
				{
					unset($projects[ $index ]);
					continue;
				}
			}
		}

		return $projects;
	}

	/**
	 * @param int $project_id
	 * @param $categories
	 * @param null $limit
	 * @return Project[]
	 */
	public function get_related_projects( $project_id, $categories, $limit = null )
	{
		$this->build_project_category_relations_query();

		$this->db->where_in('relation.project_category_id', $categories)
				 ->where('relation.project_id != ' . $project_id);

		$project_categories = $this->db->get()->result();

		$related_projects = [];
		foreach ( $project_categories as $category_relation )
		{
			$projects = $this->get_projects('id', $category_relation->project_id);
			foreach ( $projects as $project )
			{
				$related_projects[] = $project;
				if ( $limit && count($related_projects) == $limit ) return $related_projects;
			}
		}

		return $related_projects;
	}

	/**
	 * @param $user_id
	 * @return Project[]
	 */
	public function get_assigned_projects( $user_id )
	{
		$relations = $this->db->select('*')
			->from('user_projects')
			->where('user_id', $user_id)
			->get()->result();

		$projects = [];
		foreach ($relations as $relation)
		{
			$projects[] = $this->get_projects('id', $relation->project_id)[0];
		}

		return $projects;
	}

	public function assign_project( $user_id, $project_id )
	{
		return $this->db->insert('user_projects', [
			'user_id' => $user_id,
			'project_id' => $project_id
		]);
	}

	public function unassign_project( $user_id, $project_id )
	{
		return $this->db->where('user_id', $user_id)
			->where('project_id', $project_id)
			->delete('user_projects');
	}

	public function delete_project( $project_id )
	{
		return $this->db->where('id', $project_id)
						->update('projects', [
							'is_deleted' => 1
						]);
	}

	public function save_project( $data )
	{
		if ( !empty($data['id']) )
		{
			return $this->db->where('id', $data['id'])
							->update('projects', $data);
		} else
		{
			return $this->db->insert('projects', $data);
		}
	}

	/**
	 * @param null $key
	 * @param null $value
	 * @param array $options
	 * @return Project_image[]
	 */
	public function get_project_images( $key = null, $value = null, $options = [] )
	{
		$defaults = [
			'key'   => null,
			'value' => null,
			'order' => [
				'by'        => 'image.order',
				'direction' => 'ASC'
			]
		];
		$options = array_merge($defaults, $options);

		$this->build_project_images_query();

		if ( $key && $value ) $this->db->where('image.' . $key, $value);
		if ( !empty($options['project_id']) ) $this->db->where('image.project_id', $options['project_id']);
		if ( is_array($options['order']) )
		{
			$this->db->order_by($options['order']['by'], $options['order']['direction']);
		}

		return $this->db->get()->result('Project_image');
	}

	public function save_project_image( $data )
	{
		if ( !empty($data['id']) )
		{
			return $this->db->where('id', $data['id'])
							->update('project_images', $data);
		} else
		{
			return $this->db->insert('project_images', $data);
		}
	}

	public function delete_project_image( $image_id )
	{
		$image = $this->get_project_images('id', $image_id);
		$image = $image[0];
		unlink($image->image_url());

		$this->db->where('id', $image->id)
				 ->delete('project_images');
	}

	public function delete_project_video( $video_id )
	{
		$video = $this->get_project_videos('id', $video_id);
		$video = $video[0];
		unlink($video->video_url());

		$this->db->where('id', $video->id)
			->delete('project_videos');
	}

	public function get_project_videos( $key = null, $value = null, $options = [] )
	{
		$defaults = [
			'key'   => null,
			'value' => null,
			'order' => [
				'by'        => 'video.order',
				'direction' => 'ASC'
			]
		];
		$options = array_merge($defaults, $options);

		$this->build_project_videos_query();

		if ( $key && $value ) $this->db->where('video.' . $key, $value);
		if ( !empty($options['project_id']) ) $this->db->where('video.project_id', $options['project_id']);
		if ( is_array($options['order']) )
		{
			$this->db->order_by($options['order']['by'], $options['order']['direction']);
		}

		return $this->db->get()->result('Project_video');
	}

	public function save_project_video( $data )
	{
		if ( !empty($data['id']) )
		{
			return $this->db->where('id', $data['id'])
				->update('project_videos', $data);
		} else
		{
			return $this->db->insert('project_videos', $data);
		}
	}

	private function build_projects_query()
	{
		$this->db->select('project.*, region.name as region_name, status.name as status_name')
				 ->from('projects as project')
				 ->join('project_regions as region', 'region.id = project.region_id')
				 ->join('project_status as status', 'status.id = project.status_id');

		if ( !$this->include_deleted ) $this->db->where('project.is_deleted', 0);
	}

	private function build_project_category_relations_query()
	{
		$this->db->select('category.*, relation.project_id')
				 ->from('project_category_relations as relation')
				 ->join('project_categories as category', 'category.id = relation.project_category_id');
	}

	private function build_project_images_query()
	{
		$this->db->select('image.*')
				 ->from('project_images as image');
	}

	private function build_project_videos_query()
	{
		$this->db->select('video.*')
			->from('project_videos as video');
	}

}