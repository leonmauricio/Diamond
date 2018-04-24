<?php

class CategoriesController
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
		$categories = $this->categoriesModel->get();

		echo $this->view->render('/views/categories/index.php', ['categories' => $categories]);
	}

	public function admin()
	{
		if (!isset($_SESSION['user']) || $_SESSION['user']['admin'] === (int) 0) {
			header('Location: /');
		} else {
			$categories = $this->categoriesModel->get(12);
			echo $this->view->render('/views/categories/admin.php', ['categories' => $categories]);
		};
	}

	public function create()
	{
		$found = false;
		echo $this->view->render('/views/categories/form.php', ['found' => $found]);
	}
	
	public function delete()
	{
		$deleted = $this->categoriesModel->destroy($_POST['id']);
		echo json_encode(['success' => $deleted]);
	}

	public function edit()
	{
		$found = $this->categoriesModel->find($_GET["id"]);

		echo $this->view->render('/views/categories/form.php', ['found' => $found]);
	}

	public function show()
	{
		$categoryId = (int) $_GET["id"];

		$category = $this->categoriesModel->find($categoryId);

		$books = $this->booksModel->get(10, ['category_id', '=', $categoryId]);
		$books = array_chunk($books, 4);

		echo $this->view->render('/views/categories/show.php', ['category'=>$category, 'books'=>$books]);
	}

	public function store()
	{
		$created = $this->categoriesModel->create($_POST);
		echo json_encode(['success' => $created]);
	}

	public function update()
	{
		$id = $_POST['id'];
		unset($_POST['id']);
		$updated = $this->categoriesModel->edit($id, $_POST);

		echo json_encode(['success' => $updated]);
	}
}