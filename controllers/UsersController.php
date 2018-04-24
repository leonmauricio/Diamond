<?php

class UsersController
{
	
	function __construct($config)
	{
		$this->config = $config;
		$this->view = new View($config);
		$this->usersModel = new Users(new QueryBuilder(Connection::make($config['database'])));
	}

	public function index()
	{
		$users = $this->usersModel->get();
		echo $this->view->render('/views/users/index.php', ['users' => $users]);
	}


	public function admin()
	{
		if (!isset($_SESSION['user']) || $_SESSION['user']['admin'] === (int) 0) {
			header('Location: /');
		} else {
			$users = $this->usersModel->get(12);
			echo $this->view->render('/views/users/admin.php', ['users' => $users]);
		};
	}

	public function create()
	{
		$found = false;
		echo $this->view->render('/views/users/form.php', ['found' => $found]);
	}
	
	public function delete()
	{
		$deleted = $this->usersModel->destroy($_POST['id']);
		echo json_encode(['success' => $deleted]);
	}

	public function edit()
	{
		$found = $this->usersModel->find($_GET["id"]);
		echo $this->view->render('/views/users/form.php', ['found' => $found]);
	}

	public function show()
	{
		$userId = (int) $_GET["id"];

		$user = $this->usersModel->find($userId);
		echo $this->view->render('/views/users/show.php', ['user' => $user]);
	}

	public function store()
	{
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$created = $this->usersModel->create($_POST);
		echo json_encode(['success' => $created]);
	}

	public function update()
	{
		$id = $_POST['id'];
		unset($_POST['id']);
		$updated = $this->usersModel->edit($id, $_POST);

		echo json_encode(['success' => $updated]);
	}
}