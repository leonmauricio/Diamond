<?php 

class Connection
{
	static function make($config)
	{
		try {
			$pdo = new PDO(
					$config['connection'] . ';dbname=' . $config['name'],
					$config['username'],
					$config['password'],
					$config['options']
				);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}