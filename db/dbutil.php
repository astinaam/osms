<?php

class DBUtil {
    private static $s_instance;
    private $_host;
    private $_username;
    private $_password;
    private $_database;

    protected $_connection;
    protected $_result;
    protected $_numRows;

    public static function getInstance() {
        if(!self::$s_instance) {
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

    private function __construct() {

        $this->readDBConfig();
        $this->setConnection();
    }

    private function readDBConfig(){
        $this->_host = 'localhost';
        $this->_username = 'root';
        $this->_password = '1234';
        $this->_database = 'osms';
    }

    private function setConnection(){
        $this->_connection = new mysqli($this->_host, $this->_username,
            $this->_password, $this->_database);


        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }

    }


    private function __clone() { }


    public function getConnection() {
        return $this->_connection;
    }

    public function doQuery($sql) {

        $this->_result = $this->_connection->query($sql) or die(mysqli_error($this->_connection));
        return $this->_result;
    }

    public function noQuery($sql) {

        $this->_result = $this->_connection->query($sql) or die(mysqli_error($this->_connection));
//        var_dump(mysqli_error($this->_connection));
        return $this->_result;
    }

    public function getNumRows() {
        $this->_numRows = mysqli_num_rows($this->_result);
        return $this->_numRows;
    }

    public function getAllRows() {
        $rows = array();

        for($x = 0; $x < $this->getNumRows(); $x++) {
            $rows[] = mysqli_fetch_assoc($this->_result);
        }
        return $rows;
    }

    public function getTopRow() {
        return $this->_result->fetch_array();
    }

    public function secureInput($value) {
        $value=trim($value);
        return mysqli_real_escape_string($this->_connection, $value);
    }
}