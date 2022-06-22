<?php
class Book
{
    public static $conn;

    public static function setConn(PDO $conn)
    {
        return self::$conn = $conn;
    }

    public static function addBook($book)
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
        return self::$conn->exec($sql);
    }

    public static function updateBook($book)
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
        return self::$conn->exec($sql);
    }

    public static function deleteBook($book)
    {
        $sql = "DELETE FROM book where id_book in ({$book->id_book});";
        return self::$conn->exec($sql);
    }

    public static function getRow($conn)
    {
        $query = $conn->prepare("SELECT count(*) FROM book where id_user = {$_SESSION['id']}");
        $query->execute();
        return $query;
    }

    public static function getBook($conn, $first_pg, $registers)
    {
            $query = $conn->prepare("SELECT * FROM book where id_user = {$_SESSION['id']} LIMIT $first_pg, $registers");
            $query->execute();
            return $query;
    }

    public static function getBookUpdate($conn)
    {
        $query = $conn->prepare("SELECT * FROM book where id_book = {$_SESSION['id_book']}");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

?>