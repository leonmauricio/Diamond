<?php

class PagesController
{
	
	function __construct($config)
	{
		$this->config = $config;
		$this->view = new View($config);
		$this->booksModel = new Books(new QueryBuilder(Connection::make($config['database'])));
	}

	public function index()
	{
		$books = $this->booksModel->get();
		$books = array_chunk($books, 4);
		echo $this->view->render('/views/pages/home.php', compact('books'));
	}

	public function notFound()
	{
		echo $this->view->render('/views/pages/404.php');
	}

}