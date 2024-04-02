<?php
session_start();
require_once "conn.php";

class CreateBooksLogic {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createBook($titel, $isbn, $nameAuthor, $voorraad, $img) {
        $insert_books = $this->conn->prepare("INSERT INTO books(Titel, ISBN, nameAuthor, Voorraad, img) VALUES(:titel, :isbn, :nameAuthor, :voorraad, :img)");
        $insert_books->bindParam(":titel", $titel);
        $insert_books->bindParam(":isbn", $isbn);
        $insert_books->bindParam(":nameAuthor", $nameAuthor);
        $insert_books->bindParam(":voorraad", $voorraad);
        $insert_books->bindParam(":img", $img);
        $insert_books->execute();
    }
}

if (isset($_POST['submited'])) {
    $titel = strip_tags($_POST["titel"]);
    $isbn = strip_tags($_POST["isbn"]);
    $nameAuthor = strip_tags($_POST["nameAuthor"]);
    $voorraad = strip_tags($_POST["voorraad"]);
    $img = strip_tags($_POST["img"]);

    $createBooksLogic = new CreateBooksLogic($conn);
    $createBooksLogic->createBook($titel, $isbn, $nameAuthor, $voorraad, $img);

    header("location: bookArchive.php");
    exit();
}
?>
