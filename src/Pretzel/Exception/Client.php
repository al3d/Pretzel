<?php if (!defined('PRETZEL_EXCEPTION')) exit('No Pretzel No Exception');



define('PRETZEL_EXCEPTION_CLIENT', PRETZEL_EXCEPTION . '/Client');



class Pretzel_Exception_Client extends Pretzel_Exception
{



    static public function raise(PDOException $e)
    {
        switch($e->errorInfo[1]) {
            case 2000:
                $class = 'UnknownError';
                break;
            case 2001:
                $class = 'SocketCreateError';
                break;
            case 2002:
                $class = 'ConnectionError';
                break;
            case 2003:
                $class = 'ConnHostError';
                break;
            case 2004:
                $class = 'IpsockError';
                break;
            case 2005:
                $class = 'UnknownHost';
                break;
            case 2006:
                $class = 'ServerGoneError';
                break;
            case 2007:
                $class = 'VersionError';
                break;
            case 2008:
                $class = 'OutOfMemory';
                break;
            case 2009:
                $class = 'WrongHostInfo';
                break;
            case 2010:
                $class = 'LocalhostConnection';
                break;
            case 2011:
                $class = 'TcpConnection';
                break;
            case 2012:
                $class = 'ServerHandshakeErr';
                break;
            case 2013:
                $class = 'ServerLost';
                break;
            case 2014:
                $class = 'CommandsOutOfSync';
                break;
            case 2015:
                $class = 'NamedpipeConnection';
                break;
            case 2016:
                $class = 'NamedpipewaitError';
                break;
            case 2017:
                $class = 'NamedpipeopenError';
                break;
            case 2018:
                $class = 'NamedpipesetstateError';
                break;
            case 2019:
                $class = 'CantReadCharset';
                break;
            case 2020:
                $class = 'NetPacketTooLarge';
                break;
            case 2021:
                $class = 'EmbeddedConnection';
                break;
            case 2022:
                $class = 'ProbeSlaveStatus';
                break;
            case 2023:
                $class = 'ProbeSlaveHosts';
                break;
            case 2024:
                $class = 'ProbeSlaveConnect';
                break;
            case 2025:
                $class = 'ProbeMasterConnect';
                break;
            case 2026:
                $class = 'SslConnectionError';
                break;
            case 2027:
                $class = 'MalformedPacket';
                break;
            case 2028:
                $class = 'WrongLicense';
                break;
            case 2029:
                $class = 'NullPointer';
                break;
            case 2030:
                $class = 'NoPrepareStmt';
                break;
            case 2031:
                $class = 'ParamsNotBound';
                break;
            case 2032:
                $class = 'DataTruncated';
                break;
            case 2033:
                $class = 'NoParametersExists';
                break;
            case 2034:
                $class = 'InvalidParameterNo';
                break;
            case 2035:
                $class = 'InvalidBufferUse';
                break;
            case 2036:
                $class = 'UnsupportedParamType';
                break;
            case 2037:
                $class = 'SharedMemoryConnection';
                break;
            case 2038:
                $class = 'SharedMemoryConnectRequestError';
                break;
            case 2039:
                $class = 'SharedMemoryConnectAnswerError';
                break;
            case 2040:
                $class = 'SharedMemoryConnectFileMapError';
                break;
            case 2041:
                $class = 'SharedMemoryConnectMapError';
                break;
            case 2042:
                $class = 'SharedMemoryFileMapError';
                break;
            case 2043:
                $class = 'SharedMemoryMapError';
                break;
            case 2044:
                $class = 'SharedMemoryEventError';
                break;
            case 2045:
                $class = 'SharedMemoryConnectAbandonedError';
                break;
            case 2046:
                $class = 'SharedMemoryConnectSetError';
                break;
            case 2047:
                $class = 'ConnUnknownProtocol';
                break;
            case 2048:
                $class = 'InvalidConnHandle';
                break;
            case 2049:
                $class = 'SecureAuth';
                break;
            case 2050:
                $class = 'FetchCanceled';
                break;
            case 2051:
                $class = 'NoData';
                break;
            default:
                throw new self($e);
        }
        require_once PRETZEL_EXCEPTION_CLIENT . '/' . $class . '.php';
        $class = 'Pretzel_Exception_Client_' . $class;
        throw new $class($e);
    }



}