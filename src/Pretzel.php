<?php



define('PRETZEL', dirname(__FILE__));



require_once PRETZEL . '/Pretzel/Connection.php';
require_once PRETZEL . '/Pretzel/Exception.php';
require_once PRETZEL . '/Pretzel/Statement.php';
require_once PRETZEL . '/Pretzel/Recordset.php';



class Pretzel
{



    const FETCH_ARRAY  = PDO::FETCH_ASSOC,
          FETCH_OBJECT = PDO::FETCH_OBJ;



    protected $_connection  = null,
              $_util        = null,
              $_transaction = null,
              $_table       = null,
              $_config      = array(
                  'host'       => 'localhost',
                  'port'       => 3306,
                  'username'   => 'root',
                  'password'   => '',
                  'database'   => null,
                  'persistent' => true
              );



    public function __construct(array $config = array())
    {
        foreach ($config as $key => $value) {
            if (array_key_exists($key, $this->_config)) {
                $this->_config[$key] = $value;
            }
        }
        $this->_connection = new Pretzel_Connection(
            $this->_config['host'],
            $this->_config['port'],
            $this->_config['username'],
            $this->_config['password'],
            $this->_config['database'],
            $this->_config['persistent']
        );
    }



    public function getConnection()
    {
        return $this->_connection;
    }



    public function query($sql)
    {
        $args = func_get_args();
        array_shift($args);
        return new Pretzel_Statement($this->getConnection(), $sql, $args);
    }



    public function execute($sql)
    {
        $statement = call_user_func_array(array($this, 'query'), func_get_args());
        return $statement->getAffectedRows();
    }



    public function transaction()
    {
        if (!$this->_transaction) {
            require_once PRETZEL . '/Pretzel/Transaction.php';
            $this->_transaction = new Pretzel_Transaction($this->getConnection());
        }
        return $this->_transaction;
    }



    public function table($table = null)
    {
        if (!$this->_table) {
            if (!is_string($table)) {
                throw new Pretzel_Exception(new Exception(
                    'Table must be set the first time it\'s called.'
                ));
            }
            require_once PRETZEL . '/Pretzel/Table.php';
            $this->_table = new Pretzel_Table($this->getConnection());
        }
        if (is_string($table)) {
            $this->_table->setTable($table);
        }
        return $this->_table;
    }



    public function util()
    {
        if (!$this->_util) {
            require_once PRETZEL . '/Pretzel/Util.php';
            $this->_util = new Pretzel_Util($this->getConnection());
        }
        return $this->_util;
    }



}
