<?php

$username_db = "root";
$password_db = "";

try {
    $conn = new PDO("mysql:host=localhost; dbname=evke_books", $username_db, $password_db );
} catch (PDOException $error) {
    echo $error->getMessage();
}

?>