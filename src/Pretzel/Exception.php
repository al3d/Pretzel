<?php if (!defined('PRETZEL')) exit('No Pretzel');



define('PRETZEL_EXCEPTION', PRETZEL . '/Pretzel/Exception');



class Pretzel_Exception extends Exception
{



    public function __construct(Exception $e)
    {
        $this->message = $e->getMessage();
        $this->code    = $e->getCode();
    }



    static public function raise(PDOException $e)
    {
        switch((int) substr($e->errorInfo[1], 0, 1)) {
            case 1:
                require_once PRETZEL_EXCEPTION . '/Server.php';
                Pretzel_Exception_Server::raise($e);
                break;
            case 2:
                require_once PRETZEL_EXCEPTION . '/Client.php';
                Pretzel_Exception_Client::raise($e);
                break;
            default:
                break;
        }
        throw new self($e);
    }



    public function __toString()
    {
        return get_class($this);
    }



}