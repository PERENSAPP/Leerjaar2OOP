<?php

$username_db = "root";
$password_db = "";

try {
    $conn = new PDO(dsn: "mysql:host=localhost; dbname=");
} catch (PDOException $error) {
    echo $error->getMessage();
}

?>