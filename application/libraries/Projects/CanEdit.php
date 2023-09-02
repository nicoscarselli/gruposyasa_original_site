<?php

class CanEdit
{
	/**
	 * @var Project
	 */
	private $project;
	/**
	 * @var Projects_model
	 */
	private $projects_model;

	public function __construct( Project $project, Projects_model $projects_model )
	{
		$this->project = $project;
		$this->projects_model = $projects_model;
	}

	public function user( User $user )
	{
		if ( $user->user_type == User::USER_TYPE_SUPERADMIN ) return true;

		$user_projects = $this->projects_model->get_assigned_projects($user->id);
		foreach ( $user_projects as $user_project )
		{
			if ( $this->project->id === $user_project->id ) return true;
		}

		if ( $this->project->created_by_id !== $user->id ) return false;

		return false;
	}
}