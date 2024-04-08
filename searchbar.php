<?php
session_start();
require_once "conn.php";

class SearchBar
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
}





?>