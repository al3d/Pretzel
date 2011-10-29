<?php if (!defined('PRETZEL')) exit('No Pretzel');



class Pretzel_Recordset implements Iterator
{



	protected $_statement = null,
	          $_rows      = array(),
	          $_position  = 0;



	public function __construct(PDOStatement $statement, $fetch_type)
	{
		$this->_statement = $statement;
		$this->_rows      = $statement->fetchAll($fetch_type);
	}



	public function count()
	{
		return $this->_statement->rowCount();
	}



	public function columnCount()
	{
		return $this->_statement->columnCount();
	}



	public function rows()
	{
		return $this->_rows;
	}



	// Iterator functions



	public function rewind()
	{
		$this->_position = 0;
	}



	public function current()
	{
		return $this->_rows[$this->_position];
	}



	public function key()
	{
		return $this->_position;
	}



	public function next()
	{
		++$this->_position;
	}



	public function valid()
	{
		return isset($this->_rows[$this->_position]);
	}



}