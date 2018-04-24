<?php

class BooksController
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
		$books = $this->booksModel->get();
		$books = array_chunk($books, 4);
		echo $this->view->render('/views/books/index.php', ['books' => $books]);
	}

	public function admin()
	{
		if (!isset($_SESSION['user']) || (int) $_SESSION['user']['admin'] === 0) {
			header('Location: /');
		} else {
			$books = $this->booksModel->get(12);
			echo $this->view->render('/views/books/admin.php', ['books' => $books]);
		};
	}

	public function create()
	{
		$authors = $this->authorsModel->get();
		$categories = $this->categoriesModel->get();

		$found = false;
		echo $this->view->render('/views/books/form.php', ['found' => $found, 'authors' => $authors, 'categories' => $categories]);
	}

	public function delete()
	{
		$deleted = $this->booksModel->destroy($_POST['id']);
		echo json_encode(['success' => $deleted]);
	}

	public function edit()
	{
		$found = $this->booksModel->find($_GET["id"]);
		$authors = $this->authorsModel->get();
		$categories = $this->categoriesModel->get();

		$config = $this->config;
		echo $this->view->render('/views/books/form.php', ['found' => $found, 'authors' => $authors, 'categories' => $categories]);
	}

	public function show()
	{
		$book = $this->booksModel->find($_GET["id"]);
		echo $this->view->render('/views/books/show.php', ['book' => $book]);
	}

	public function store()
	{
		$created = $this->booksModel->create($_POST);
		echo json_encode(['success' => $created]);
	}

	public function update()
	{
		$id = $_POST['id'];
		unset($_POST['id']);
		$updated = $this->booksModel->edit($id, $_POST);

		echo json_encode(['success' => $updated]);
	}

}