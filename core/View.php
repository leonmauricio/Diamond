<?php

class View
{
	
	function __construct($config)
	{
		$this->config = $config;
	}

	public function render($view, $data = [])
	{
		// Start and extract variables
		ob_start();
		extract($data);

		// Include common variables
		$config = $this->config;
		$session = isset($_SESSION['user'])? $_SESSION['user'] : false;
		$cart = isset($_SESSION['cart'])? $_SESSION['cart'] : [];

		// Render
		include $config['path'] . $view;
		$html = ob_get_contents(); 
		ob_end_clean();

		// Return rendered content
		return $html;
	}
}