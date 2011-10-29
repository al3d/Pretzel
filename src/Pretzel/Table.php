<?php if (!defined('PRETZEL')) exit('No Pretzel');



class Pretzel_Table
{



	const PRIMARY_KEY = 'id';



	protected $_connection  = null,
	          $_table       = null,
	          $_primary_key = self::PRIMARY_KEY;



	public function __construct(Pretzel_Connection $connection)
	{
		$this->_connection = $connection;
	}



	public function setTable($table)
	{
		$this->_table = $table;
		return $this;
	}



	public function setPrimaryKey($pk)
	{
		$this->_primary_key = $pk;
		return $this;
	}



	public function insert(array $data)
	{
		$data = $this->_cleanArray($data);
		$sql  = sprintf(
			'INSERT INTO %s (%s) VALUES(%s)',
			$this->_table,
			implode(', ', array_keys($data)),
			':' . implode(', :', array_keys($data))
		);
		$statement = new Pretzel_Statement($this->_connection, $sql);
		foreach($data as $key => $value) {
			$statement->bind(':' . $key, $value);
		}
		return $statement->getInsertedID();
	}



	public function update(array $data, $where, $pk = null)
	{
		$data   = $this->_cleanArray($data);
		$params = array();
		foreach($data as $key => $value) {
			$params[] = sprintf(
				'%s = :%s',
				$key,
				$key
			);
		}
		if (!is_string($pk)) {
			$pk = $this->_primary_key;
		}
		$pkk = md5($pk);
		$sql = sprintf(
			'UPDATE %s SET %s WHERE %s = :%s LIMIT 1',
			$this->_table,
			implode(', ', $params),
			$pk,
			$pkk
		);
		$statement = new Pretzel_Statement($this->_connection, $sql);
		foreach($data as $key => $value) {
			$statement->bind(':' . $key, $value);
		}
		$statement->bind(':' . $pkk, $where);
		return $statement->getAffectedRows();
	}



	public function delete($where, $pk = null)
	{
		if (!is_string($pk)) {
			$pk = $this->_primary_key;
		}
		$pkk = md5($pk);
		$sql = sprintf(
			'DELETE FROM %s WHERE %s = :%s LIMIT 1',
			$this->_table,
			$pk,
			$pkk
		);
		$statement = new Pretzel_Statement($this->_connection, $sql);
		$statement->bind(':' . $pkk, $where);
		return $statement->getAffectedRows();
	}



	protected function _cleanArray(array $data)
	{
		$data = unserialize(serialize($data)); // Break references within array
		$rv = array();
		foreach($data as $key => $value) {
			if (is_string($key)) {
				$rv[$key] = $value;
			}
		}
		return $rv;
	}



}