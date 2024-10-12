<?php


class Author
{
    public string $name;
    public $books = [];

    // TODO Generate getters and setters of properties
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBooks(): array
    {
        return $this->books;
    }

    public function setBooks(array $books): void
    {
        $this->books = $books;
    }
    // TODO Generate constructor for all attributes. $books argument of the constructor can be optional
    public function __construct(string $name, array $books = [])
    {
        $this->name = $name;
        $this->books = $books;
    }

    /**
     * @param string $title
     * @param float  $price
     * @return \Book
     */
    public function addBook(string $title, float $price): Book
    {
        // TODO Create instance of the book. Add into $books array and return it
        $book = new Book($title, $price);
        $book->setAuthor($this);
        array_push($this->books, $book);
        return $book;
    }
    public function __toString()
    {
        return $this->name;
    }
}