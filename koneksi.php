<?php 

class Connection {
    private $host = "127.0.0.1:8111";
    private $username = "root";
    private $password = "";
    private $database = "db_xpplg";
    protected $conn;

    public function __construct() {
        $this->conn = $this->connectDB();
    }

    public function connectDB() {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        
        if (mysqli_connect_errno()) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }

        return $conn;
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>