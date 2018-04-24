<?php

class SessionsController
{
	
	function __construct($config)
	{
		$this->config = $config;
		$this->view = new View($config);
		$this->usersModel = new Users(new QueryBuilder(Connection::make($config['database'])));
	}

	public function create()
	{
		echo $this->view->render('/views/login.php');
	}

	public function store()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$users = $this->usersModel->get(1, ['username', '=', $username]);
		$user = reset($users);

		// Check password
		if (!password_verify($password, $user['password'])) {
			echo json_encode(['success' => false, 'errorMessage' => 'Wrong password or username']);
			exit;
		}

    	$_SESSION['user'] = $user;
    	unset($_SESSION['user']['password']);
		echo json_encode(['success' => true]);
	}

	public function delete()
	{
		session_unset();
		session_destroy();
		header('Location: /');
	}

}