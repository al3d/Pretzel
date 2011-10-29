<?php if (!defined('PRETZEL')) exit('No Pretzel');



class Pretzel_Util
{



    protected $_connection,
              $_current_db;



    public function __construct(Pretzel_Connection $connection)
    {
        $this->_connection = $connection;
        $this->_current_db = $this->_connection->getDatabase();
    }



    public function setDB($db_name)
    {
        $this->_current_db = $db_name;
        try {
            return $this->_connection->get()->exec(sprintf(
                'USE %s;',
                $db_name
            ));
        } catch (PDOException $e) {
            Pretzel_Exception::raise($e);
        }
    }



    public function getColumns($table, $db = null)
    {
        $old_db = $this->_current_db;
        if (is_string($db)) {
            $this->setDB($db);
        }
        try {
            $statement = $this->_connection->get()->query(sprintf(
                'SHOW COLUMNS FROM %s',
                $table
                ));
            $columns   = array();
            foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $columns[] = $row['Field'];
            }
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            return $columns;
        } catch (PDOException $e) {
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            Pretzel_Exception::raise($e);
        }
    }



    public function getTables($db = null)
    {
        $old_db = $this->_current_db;
        if (is_string($db)) {
            $this->setDB($db);
        }
        try {
            $statement = $this->_connection->get()->query('SHOW TABLES');
            $tables    = array();
            foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $tables[] = $row[sprintf('Tables_in_%s', $this->_current_db)];
            }
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            return $tables;
        } catch (PDOException $e) {
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            Pretzel_Exception::raise($e);
        }
    }



    public function getSchema($table, $db = null)
    {
        $old_db = $this->_current_db;
        if (is_string($db)) {
            $this->setDB($db);
        }
        try {
            $statement = $this->_connection->get()->query(sprintf(
                'SHOW CREATE TABLE %s',
                $table
            ));
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            return $row['Create Table'];
        } catch (PDOException $e) {
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            Pretzel_Exception::raise($e);
        }
    }



    public function getDescription($table, $db = null)
    {
        $old_db = $this->_current_db;
        if (is_string($db)) {
            $this->setDB($db);
        }
        try {
            $statement = $this->_connection->get()->query(sprintf(
                'DESCRIBE %s',
                $table
            ));
            $columns   = array();
            foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $columns[$row['Field']] = array(
                    'field'   => $row['Field'],
                    'type'    => $row['Type'],
                    'null'    => strtolower($row['Null']) === 'yes' ? 1 : 0,
                    'key'     => empty($row['Key']) ? null : $row['Key'],
                    'default' => $row['Default'],
                    'extra'   => $row['Extra']
                );
            }
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            return $columns;
        } catch (PDOException $e) {
            if ($old_db !== $this->_current_db) {
                $this->setDB($old_db);
            }
            Pretzel_Exception::raise($e);
        }
    }



}
