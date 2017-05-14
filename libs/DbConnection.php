<?php
class DbConnection {
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "lms";
    public $connection;
    
    function __construct() {
        $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_error($this->connection)) {
            trigger_error("Failed to conenct to MySQL: " . mysqli_connect_error($this->connection), E_USER_ERROR);
        }
    }
    public function setData($query) {
        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));
        if ($result)
        {
            return mysqli_insert_id($this->connection);
        }
        else
        {
            return false;
        }
    }
    public function setDataAndReturnLastInsertId($query) {
        $result = mysqli_query($this->connection, $query) or die(mysqli_error($this->connection));
        $lastinsertid = mysqli_insert_id($this->connection);
        if ($result){
            return array('1',$lastinsertid);
          }
        else{
            return false;
        }
    }
    public function getData($query) {
        $result = $this->connection->query($query) or die(mysqli_error($this->connection));
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}