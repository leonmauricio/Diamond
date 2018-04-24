<?php

class ContactFormController
{
	
	function __construct($config)
	{
		$this->config = $config;
		$this->mailer = new Mailer($config);
		$this->view = new View($config);
	}

	public function create()
	{
		echo $this->view->render('/views/contact-form/create.php');
	}

	public function store()
	{
		$this->validate(trim($_POST['name']), trim($_POST['email']), trim($_POST['phone']), trim($_POST['comment']));

		$html = $this->view->render('/views/emails/contact.php', ['contactInfo' => $_POST]);

		$subject = 'Nueva contacto desde Diamond';
		$recipients = ['mauriciomunoz011@gmail.com'];

		if (!$this->mailer->send($subject, $recipients, $html)) {
		    $errors['server'] = 'Email not sent';
		    echo json_encode(['success' => false, 'errors' => $errors]);
		} else {
		    echo json_encode(['success' => true]);
		}
	}

	private function validate($name, $email, $phone, $comment)
	{

		$errors = [];

		if (!$name) {
			$errors['name'] = 'Please complete your name';
		}

		if (!$email) {
			$errors['email'] = 'Please complete your email';
		} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)  {
			$errors['email'] = 'Please complete with a valid email adress';
		}

		if (!$phone) {
			$errors['phone'] = 'Please complete your phone';
		} else if (filter_var($phone, FILTER_VALIDATE_INT) === false)  {
			$errors['phone'] = 'Please complete with a valid phone number';
		}

		if (!$comment) {
			$errors['comment']= 'Please complete your comment';
		} else if (strlen($comment) < 50 || strlen($comment) > 150)  {
			$errors['comment'] = 'The comment has to have at least 50 characters, and less than 150';
		}

		if ($errors) {
			echo json_encode(['success' => false, 'errors' => $errors]);
			exit;
		}
	}
}