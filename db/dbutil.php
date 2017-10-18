<?php

class DBUtil {
    private static $s_instance; //The single instance
    private $_host;
    private $_username;
    private $_password;
    private $_database;

    protected $_connection;
    protected $_result;
    protected $_numRows;
    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance() {
        if(!self::$s_instance) { // If no instance then make one
            self::$s_instance = new self();
        }
        return self::$s_instance;
    }

// Constructor
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


// Creating the database connection using mysqli
    private function setConnection(){
        $this->_connection = new mysqli($this->_host, $this->_username,
            $this->_password, $this->_database);

// Error handling
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }

    }


// Magic method clone is empty to prevent duplication of connection
    private function __clone() { }

// Get mysqli connection
    public function getConnection() {
        return $this->_connection;
    }

// Sends the query to the connection
    public function doQuery($sql) {

        $this->_result = $this->_connection->query($sql) or die(mysqli_error($this->_connection));
        return $this->_result;

    }

// Return the number of rows
    public function getNumRows() {
        $this->_numRows = mysqli_num_rows($this->_result);
        return $this->_numRows;
    }

// Fetches all the rows and return them as one array(array())
    public function getAllRows() {
        $rows = array();

        for($x = 0; $x < $this->getNumRows(); $x++) {
            $rows[] = mysqli_fetch_assoc($this->_result);
        }
        return $rows;
    }

// fetch the top row from the result
    public function getTopRow() {
        return $this->_result->fetch_array();
    }

// Securing input data
    public function secureInput($value) {
        $value=trim($value);
        return mysqli_real_escape_string($this->_connection, $value);
    }
}