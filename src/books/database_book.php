<?php

include '../config/database.php';

class Book
{
    public $conn;

    public function __construct()
    {
        $this->conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function addBook($book)
    {
        $sql = "INSERT INTO book (id_user, title, author, pages, genre, publi, cape, company, description) values
        (
            '{$book->id_user}',
            '{$book->title}',
            '{$book->author}',
            '{$book->pages}',
            '{$book->genre}',
            '{$book->publi}',
            '{$book->cover}',
            '{$book->company}',
            '{$book->describe}'
        )";

        return $this->conn->exec($sql);
    }

    public function updateBook($book)
    {
        $sql = "UPDATE book SET
        title = '{$book->title}',
        author = '{$book->author}',
        pages = '{$book->pages}',
        genre = '{$book->genre}',
        publi = '{$book->publi}',
        cape = '{$book->cover}',
        company = '{$book->company}',
        description = '{$book->describe}'
        where id_user = '{$book->id_user}' and id_book = '{$book->id_book}';";
        return $this->conn->exec($sql);
    }

    public function deleteBook($book)
    {
        $sql = "DELETE FROM book where id_book in ({$book});";
        return $this->conn->exec($sql);
    }

    public function getBooks($page)
    {
        $offset = (5 * $page) - 5;

        $query = $this->conn->prepare("SELECT * FROM book where id_user = ? LIMIT $offset, 5");
        $query->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }

    public function getTotalOfBooks($user_id)
    {
        $query = $this->conn->prepare("SELECT COUNT(*) AS total FROM book where id_user = ? ");
        $query->bindParam(1, $user_id, PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetchAll();
        $total = (int) $data[0]['total'];
        return $total;
    }

    public function getBookUpdate($id_book)
    {
        $query = $this->conn->prepare("SELECT * FROM book where id_book = ? ");
        $query->bindParam(1, $id_book, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

?>