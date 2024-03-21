<?php
class Database
{
    public $connection; 
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=testdb;";
        $this->connection = new PDO($dsn);
    }
    
    ////// Only for retriving specific data
    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

 
}


// $newDB = new Database();
// $result = $newDB->query("SELECT * FROM books"); 

// print_r($result);


class Signup extends Database { 
    public function __construct()
    {
        parent::__construct(); // Call the parent class constructor
    }
    

    
}