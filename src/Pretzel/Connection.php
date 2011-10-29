<?php if (!defined('PRETZEL')) exit('No Pretzel');



class Pretzel_Connection
{



	protected $_instance,
	          $_host,
	          $_port,
	          $_username,
	          $_password,
	          $_database,
	          $_attributes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"');



	public function __construct($host, $port, $username, $password, $database, $persistent = true)
	{
		$this->_host     = $host;
		$this->_port     = $port;
		$this->_username = $username;
		$this->_password = $password;
		$this->_database = $database;
		if ((bool) $persistent === true) {
			$this->_attributes[PDO::ATTR_PERSISTENT] = true;
		}
	}



	public function get()
	{
		if (!$this->_instance) {
			$dsn = sprintf(
				'mysql:host=%s;port=%s;',
				$this->_host,
				$this->_port
			);
			if (is_string($this->_database)) {
				$dsn .= sprintf(
					'dbname=%s',
					$this->_database
				);
			}
			try {
				$this->_instance = new PDO($dsn, $this->_username, $this->_password, $this->_attributes);
				$this->_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				Pretzel_Exception::raise($e);
			}
		}
		return $this->_instance;
	}



	public function getHost()
	{
		return $this->_host;
	}



	public function getPort()
	{
		return $this->_port;
	}



	public function getUsername()
	{
		return $this->_username;
	}



	public function getPassword()
	{
		return $this->_password;
	}



	public function getDatabase()
	{
		return $this->_database;
	}



}