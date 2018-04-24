<?php

class OrdersController
{

	function __construct($config)
	{
		$this->config = $config;
		$this->mailer = new Mailer($config);
		$this->view = new View($config);
		$this->ordersModel = new Orders(new QueryBuilder(Connection::make($config['database'])));
		$this->usersModel = new Users(new QueryBuilder(Connection::make($config['database'])));
		$this->booksModel = new Books(new QueryBuilder(Connection::make($config['database'])));
	}

	public function store()
	{		
		$_POST['products'] = implode(', ', $_POST['products']);
		$order = $this->ordersModel->create($_POST);
		$this->sendCheckoutMail();
		$_SESSION['cart'] = [];
		echo json_encode(['success' => $order]);
	}

	private function sendCheckoutMail()
	{
		$html = $this->view->render('/views/emails/checkout.php', ['user' => $_SESSION['user'], 'books' => $_SESSION['cart']]);

		$subject = 'Nueva compra';
		$recipients = ['mauriciomunoz011@gmail.com'];
		$this->mailer->send($subject, $recipients, $html);
	}
}