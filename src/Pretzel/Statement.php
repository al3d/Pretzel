<?php if (!defined('PRETZEL')) exit('No Pretzel');



class Pretzel_Statement
{



	protected $_connection = null,
	          $_statement  = null,
	          $_executed   = false,
	          $_position   = 0;



	public function __construct(Pretzel_Connection $connection, $sql, array $parameters = array())
	{
		$this->_connection = $connection;
		$this->_statement  = $this->_connection->get()->prepare($sql);
		foreach($parameters as $value) {
			$this->param($value);
		}
	}



	public function param($value)
	{
		$this->_statement->bindValue(++$this->_position, $value, $this->_getType($value));
		return $this;
	}



	public function bind($key, $value)
	{
		$this->_statement->bindValue($key, $value, $this->_getType($value));
		return $this;
	}



	public function execute()
	{
		if (!$this->_executed) {
			try {
				$this->_statement->execute();
				$this->_executed = true;
			} catch (PDOException $e) {
				Pretzel_Exception::raise($e);
			}
		}
		return $this;
	}



	public function getAll($type = Pretzel::FETCH_ARRAY)
	{
		$this->execute();
		return new Pretzel_Recordset($this->_statement, $type);
	}



	public function getOne($type = Pretzel::FETCH_ARRAY)
	{
		$this->execute();
		return $this->_statement->fetch($type);
	}



	public function getAffectedRows()
	{
		$this->execute();
		return $this->_statement->rowCount();
	}



	public function getInsertedID()
	{
		$this->execute();
		try {
			return $this->_connection->get()->lastInsertId();
		} catch (PDOException $e) {
			Pretzel_Exception::raise($e);
		}
	}



	public function getRecordCount()
	{
		return $this->getAffectedRows();
	}



	protected function _getType($value)
	{
		if (is_bool($value)) {
			return PDO::PARAM_BOOL;
		} else if (is_null($value)) {
			return PDO::PARAM_NULL;
		} else if (is_integer($value)) {
			return PDO::PARAM_INT;
		}
		return PDO::PARAM_STR;
	}



}