<?php

class Book {
    private $title;
    private $author;
    private $ISBN;
    private $stock;

    public function __construct($title, $author, $ISBN, $stock) {
        $this->title = $title;
        $this->author = $author;
        $this->ISBN = $ISBN;
        $this->stock = $stock;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function getStock() {
        return $this->stock;
    }
}

class BookArchive {
    private $books;

    public function __construct() {
        $this->books = [];
    }

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function displayBooks() {
        foreach ($this->books as $book) {
            echo "Title: " . $book->getTitle() . "<br>";
            echo "Author: " . $book->getAuthor() . "<br>";
            echo "ISBN: " . $book->getISBN() . "<br>";
            echo "Stock: " . $book->getStock() . "<br>";

        }
    }
}

// Usage example
$archive = new BookArchive();

$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", "1", "5");
$archive->addBook($book1);

$book2 = new Book("To Kill a Mockingbird", "Harper Lee", "2", "3");
$archive->addBook($book2);

$book3 = new Book("1984", "George Orwell", "3", "2");
$archive->addBook($book3);

$archive->displayBooks();

?>