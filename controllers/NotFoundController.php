<?php

class NotFoundController
{
	
	function __construct($config)
	{
		$this->config = $config;
		$this->view = new View($config);
	}

	public function index()
	{
		echo $this->view->render('/views/pages/404.php');
	}

}