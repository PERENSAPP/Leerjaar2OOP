<?php
session_start();
require_once "conn.php";

class BookLoopLogic
{
    private $conn;
    private $name;
    private $surname;
    private $title;
    private $isbn;
    private $time;


    public function __construct($conn, $name, $surname, $title, $isbn, $time)
    {
        $this->conn = $conn;
        $this->name = $name;
        $this->surname = $surname;
        $this->title = $title;
        $this->isbn = $isbn;
        $this->time = $time;

    }
    public function reserve()
    {
        $query = "INSERT INTO reserveer (bookName, ISBN, name, surname, time) VALUES (:bookName, :ISBN, :name, :surname, :time)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":bookName", $this->title);
        $stmt->bindParam(":ISBN", $this->isbn);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":surname", $this->surname);
        $stmt->bindParam(":time", $this->time);
        $stmt->execute();


    }

}


class updateStock
{
    private $conn;
    private $id;
    private $stock;
    public function __construct($conn, $id, $stock)
    {
        $this->conn = $conn;
        $this->id = $id;
        $this->stock = $stock;
    }

    public function update()
    {
        if ($this->stock == 0) {
            echo "Dit boek is niet op voorraad";
            return;
        }
        $updateStock = $this->stock - 1;



        $query = "UPDATE books SET stock = :stock WHERE idbooks = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
    }
}


if (isset($_POST['reserve'])) {
    $name = $_SESSION['name'];
    $surname = $_SESSION['surname'];
    $title = strip_tags($_POST['title']);
    $isbn = strip_tags($_POST['isbn']);
    $id = strip_tags($_POST['submit']);
    $stock = strip_tags($_POST['stock']);
    $time = date("Y-m-d H:i:s");

    echo $id;

    $query = 'SELECT bookName, ISBN, stock FROM books WHERE idbooks = :id';
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($book) {
        $title = $book['bookName'];
        $isbn = $book['ISBN'];
        $stock = $book['stock'];
    }

    $bookLoopLogic = new BookLoopLogic($conn, $name, $surname, $title, $isbn, $time);
    $bookLoopLogic->reserve();

    $updateStock = new updateStock($conn, $id, $stock);
    $updateStock->update();
    // header("Location: bookArchive.php");
}