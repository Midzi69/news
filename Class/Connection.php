<?php

namespace app;

class DatabaseConnection {
    public $conn;
    public $database;

    public function __construct($host, $username, $password, $database) {
        $this->conn = mysqli_connect($host, $username, $password, $database);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}




?>
