<?php


/**
 * Marius
 */

 class DB_Connect {
    private $conn;

    public function connect() {
       // require_once 'Config.php';
        
        
$this->conn = new mysqli("localhost", "root", "","usmajngk_product");        

        return $this->conn;
    }
}


?>
