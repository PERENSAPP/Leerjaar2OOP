<?php
session_start();
require_once "conn.php";

class CreateBooksLogic
{
    private $conn;
    private $bookName;
    private $ISBN;
    private $nameAuthor;
    private $stock;

    public function __construct($conn, $bookName, $ISBN, $nameAuthor, $stock)
    {
        $this->conn = $conn;
        $this->bookName = $bookName;
        $this->ISBN = $ISBN;
        $this->nameAuthor = $nameAuthor;
        $this->stock = $stock;
    }

    public function checkRoleId()
    {
        $query = "SELECT role_idrole FROM account WHERE email = :un";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(["un" => $_SESSION['email']]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        $roleId = $data ? $data->role_idrole : null;

        if (!$roleId || $roleId != 1) {
            // User is not found or role ID is not 1
            header("location: retry_login.php"); ///////////////////////////// headerlocation fixen///             
            exit;
        }
    }
    public function createBook()
    {
        $query = "INSERT INTO books(bookName, ISBN, nameAuthor, stock) VALUES(:bookName, :ISBN, :nameAuthor, :stock)";

        $insert_books = $this->conn->prepare($query);
        $insert_books->bindParam(":bookName", $this->bookName);
        $insert_books->bindParam(":ISBN", $this->ISBN);
        $insert_books->bindParam(":nameAuthor", $this->nameAuthor);
        $insert_books->bindParam(":stock", $this->stock);

        $insert_books->execute();
    }
}

if (isset($_POST['submited'])) {
    $bookName = strip_tags($_POST["bookName"]);
    $ISBN = strip_tags($_POST["ISBN"]);
    $nameAuthor = strip_tags($_POST["nameAuthor"]);
    $stock = strip_tags($_POST["stock"]);

    // Create instance of CreateBooksLogic and check role ID
    $createBooksLogic = new CreateBooksLogic($conn, $bookName, $ISBN, $nameAuthor, $stock);
    $createBooksLogic->checkRoleId();

    // If role ID is correct, create the book
    $createBooksLogic->createBook();

    header("location: bookArchive.php");
    exit();
}
?>