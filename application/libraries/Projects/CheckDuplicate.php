<?php

class CheckDuplicate
{
	/**
	 * @var Projects_model
	 */
	private $projects_model;

	public function __construct( Projects_model $projects_model )
	{
		$this->projects_model = $projects_model;
	}

	public function isDuplicate( $code, $exceptions = [] )
	{
		$duplicates = $this->projects_model->get_projects('code', $code);

		if ($exceptions)
		{
			$duplicates = array_filter($duplicates, function($item) use ($exceptions) {
				return !in_array($item->id, $exceptions);
			});
		}

		return (count($duplicates) > 0);
	}
}