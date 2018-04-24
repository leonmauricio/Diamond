<?php

class Mailer
{
	
	function __construct($config)
	{
		$this->config = $config;
	}

	public function send($subject, $recipients, $html)
	{
		$mail = new PHPMailer;
		$mail->isSMTP();

		$mail->Host = 'smtp.nicolabs.com.ar';
		$mail->Username = 'mauricio@nicolabs.com.ar';
		$mail->Password = 'Pompeya45?!';
		$mail->Port = 25;
		$mail->setFrom('mauricio@nicolabs.com.ar', 'Diamond');
		$mail->SMTPAuth = true;

		foreach ($recipients as $recipient) {
			$mail->addAddress($recipient);
		}
		
		$mail->isHTML(true);

		$mail->Subject = $subject;
		$mail->Body = $html;

		return $mail->send();
	}

	public function render($view, $data)
	{
		ob_start();
		$config = $this->config;
		include $config['path'] . '/views/emails/contact.php';
		$html = ob_get_contents(); 
		ob_end_clean();
	}
}