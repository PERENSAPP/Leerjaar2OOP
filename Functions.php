<?php
require "conn.php";
class Database
{
    public $connection;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=testdb;user=root;";
        $this->connection = new PDO($dsn);
    }
    public function query($query)
    {
        $statement = $$this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

$newDB = new Database();
$result = $newDB->query("SELECT * FROM books WHERE id = 1"); 

print_r($result);
?>