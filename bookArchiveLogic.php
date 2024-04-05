<?php
session_start();
require_once "conn.php";

class BookArchiveLogic {
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getBooks()
    {
        $query = "SELECT * FROM books";
        $get_books = $this->conn->prepare($query);
        $get_books->execute();
        return $get_books->fetchAll();
    }
}

$bookArchiveLogic = new BookArchiveLogic($conn);
$books = $bookArchiveLogic->getBooks();

// Check if $books is defined and not empty before using it
if (isset($books) && !empty($books)) {
    foreach ($books as $book) { 
        echo "
        <div class='card text-bg-dark' style='max-width: 19rem;'>
            <div class='card-header'> Titel:
            " . $book['bookName'] . "
            </div>
            <ul class='list-group list-group-flush text-bg-dark'>
                <li class='list-group-item text-bg-dark'> ISBN: " . $book['ISBN'] . "</li>
                <li class='list-group-item text-bg-dark'> Auteur: " . $book['nameAuthor'] . "</li>
                <li class='list-group-item text-bg-dark'> Voorraad: " . $book['stock'] . "</li>
                
                
            </ul>
            <a href='#' class='btn btn-primary'>Reserveer nu</a>
            <div class='span4 text-dark'>...</div>
        </div>";
                
    }
} else {
    echo "No books found.";
}



