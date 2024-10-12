<?php
require_once "AbstractLibrary.php";

class Library extends AbstractLibrary
{
    // TODO Implement all the methods declared in AbstractLibrary class
    public function addAuthor(string $authorName): Author
    {
        $author = new Author($authorName);
        $authors = $this->getAuthors();
        $authors[$authorName] = $author;
        $this->setAuthors($authors);
        return $author;
    }

    public function addBookForAuthor($authorName, Book $book)
    {
        $authors = $this->getAuthors();
        if (isset($authors[$authorName])) {
            $author = $authors[$authorName];
            $book->setAuthor($author);
            $authors[$authorName]->addBook($book->getTitle(), $book->getPrice());
        }
        $this->setAuthors($authors);
    }

    public function getBooksForAuthor($authorName)
    {
        $authors = $this->getAuthors();
        if (isset($authors[$authorName])) {
            return $authors[$authorName]->getBooks();
        }
        return [];
    }

    public function search(string $bookName): Book
    {
        $authors = $this->getAuthors();
        
        foreach ($authors as $author) {
            foreach ($author->getBooks() as $book) {
                if ($book->getTitle() === $bookName) {
                    return $book;
                }
            }
        }
        throw new Exception("The book '$bookName' was not found in the library.");
    }
    
    

    public function print()
    {
        $authors = $this->getAuthors();
        foreach ($authors as $author) {
            echo $author->getName() . "<br>";
            echo "----------------------<br>";
            foreach ($author->getBooks() as $book) {
                echo $book->getTitle() . " - " . $book->getPrice() . "<br>";
            }
            echo "\n";
        }
    }
}