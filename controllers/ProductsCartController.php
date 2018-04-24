<?php

class ProductsCartController
{

	function __construct($config)
	{
		$this->config = $config;
		$this->view = new View($config);
		$this->booksModel = new Books(new QueryBuilder(Connection::make($config['database'])));
	}

	// Show the products in the cart
	public function index()
	{
		$books = isset($_SESSION['cart'])? $_SESSION['cart'] : [];
		echo $this->view->render('/views/cart/index.php', ['books' => $books]);
	}

	// Adds a product to the cart
	public function store()
	{
		$book = $this->booksModel->find($_GET["id"]);
		$_SESSION['cart'][] = $book;
		header('Location: /cart');
	}

	// Deletes a product from the cart
	public function delete()
	{
		array_splice($_SESSION['cart'], $_POST['id'], 1);
		echo json_encode(['success' => true]);
	}
}