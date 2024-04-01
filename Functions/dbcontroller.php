<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "usmajngk_product";
    private $conn;

    function __construct() {
        $this->conn = $this->connectDB();
    }

    function connectDB() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn, $query);
        $resultset = array();
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }
        } else {
            die("Error executing query: " . mysqli_error($this->conn));
        }
        return $resultset;
    }

    function numRows($query) {
        $result  = mysqli_query($this->conn, $query);
        if ($result) {
            $rowcount = mysqli_num_rows($result);
            return $rowcount;
        } else {
            die("Error executing query: " . mysqli_error($this->conn));
        }
    }

    function insertQuery($query) {
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return $result;
        } else {
            die("Error executing query: " . mysqli_error($this->conn));
        }
    }
}
?>
