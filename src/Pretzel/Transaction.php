<?php if (!defined('PRETZEL')) exit('No Pretzel');



class Pretzel_Transaction
{



    protected $_connection;



    public function __construct(Pretzel_Connection $connection)
    {
        $this->_connection = $connection;
    }



    public function start()
    {
        try {
            return $this->_connection->get()->beginTransaction();
        } catch (PDOException $e) {
            Pretzel_Exception::raise($e);
        }
    }



    public function rollback()
    {
        try {
            return $this->_connection->get()->rollBack();
        } catch (PDOException $e) {
            Pretzel_Exception::raise($e);
        }
    }



    public function commit()
    {
        try {
            return $this->_connection->get()->commit();
        } catch (PDOException $e) {
            Pretzel_Exception::raise($e);
        }
    }



}