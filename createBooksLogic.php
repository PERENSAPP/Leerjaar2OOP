<?php
session_start();
require_once "conn.php";

class CreateBooksLogic
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function createBook($bookName, $ISBN, $nameAuthor, $stock, $img)
    {
        $insert_books = $this->conn->prepare("INSERT INTO books(bookName, ISBN, nameAuthor, stock, img) VALUES(:bookName, :ISBN, :nameAuthor, :stock, :img)");
        $insert_books->bindParam(":bookName", $bookName);
        $insert_books->bindParam(":ISBN", $ISBN);
        $insert_books->bindParam(":nameAuthor", $nameAuthor);
        $insert_books->bindParam(":stock", $stock);
        $insert_books->bindParam(":img", $img); ///// Error: kan een colom niet vinden wat ook zo is. 
        $insert_books->execute();
    }
}

if (isset ($_POST['submited'])) {
    $bookName = strip_tags($_POST["bookName"]);
    $ISBN = strip_tags($_POST["ISBN"]);
    $nameAuthor = strip_tags($_POST["nameAuthor"]);
    $stock = strip_tags($_POST["stock"]);
    $img = strip_tags($_POST["img"]);

    $createBooksLogic = new CreateBooksLogic($conn);
    $createBooksLogic->createBook($bookName, $ISBN, $nameAuthor, $stock, $img);

    header("location: bookArchive.php");
    exit();
}
?>