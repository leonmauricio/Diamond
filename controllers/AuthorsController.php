<?php

class AuthorsController
{
	
	function __construct($config)
	{
		$this->config = $config;
		$this->view = new View($config);
		$this->authorsModel = new Authors(new QueryBuilder(Connection::make($config['database'])));
		$this->categoriesModel = new Categories(new QueryBuilder(Connection::make($config['database'])));
		$this->booksModel = new Books(new QueryBuilder(Connection::make($config['database'])));
	}

	public function index()
	{
		$authors = $this->authorsModel->get();
		echo $this->view->render('/views/authors/index.php', ['authors' => $authors]);
	}

		public function admin()
	{
		if (!isset($_SESSION['user']) || $_SESSION['user']['admin'] === (int) 0) {
			header('Location: /');
		} else {
			$authors = $this->authorsModel->get(12);
			echo $this->view->render('/views/authors/admin.php',['authors' => $authors]);
		};
	}

	public function create()
	{
		$found = false;
		echo $this->view->render('/views/authors/form.php', ['found' => $found]);
	}
	
	public function delete()
	{
		$deleted = $this->authorsModel->destroy($_POST['id']);
		echo json_encode(['success' => $deleted]);
	}

	public function edit()
	{
		$found = $this->authorsModel->find($_GET["id"]);
		echo $this->view->render('/views/authors/form.php', ['found' => $found]);
	}

	public function show()
	{
		$authorId = (int) $_GET["id"];

		$author = $this->authorsModel->find($authorId);

		$books = $this->booksModel->get(10, ['author_id', '=', $authorId]);
		$books = array_chunk($books, 4);

		$config = $this->config;
		echo $this->view->render('/views/authors/show.php', ['author' => $author, 'books' => $books]);
	}

	public function store()
	{
		$created = $this->authorsModel->create($_POST);
		echo json_encode(['success' => $created]);
	}

	public function update()
	{
		$id = $_POST['id'];
		unset($_POST['id']);
		$updated = $this->authorsModel->edit($id, $_POST);

		echo json_encode(['success' => $updated]);
	}
}