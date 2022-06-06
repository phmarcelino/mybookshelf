<?php
class Book
{
    public static $conn;

    public static function setConn( PDO $conn){
        self::$conn = $conn;
    }
    
    public static function addLivro($book)
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
            '{$book->describe}')";
        
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
        cape = '{$book->cape}',
        company = '{$book->company}',
        descrvie = '{$book->describe}'
        where id_user = '{$book->id_user}', and id_book = '';";

        return self::$conn->exec($sql);
    }

    public static function deleteBook($book)
    {
        $sql = "DELETE FROM book where id_user = '{$book->id_user} and id_book = '{$book->id}'";
        return self::$conn->exec($sql);
    }

    public static function getBook($conn)
    {
        $consulta = $conn->prepare("SELECT * FROM book where id_user = {$_SESSION['id']}");
        $consulta->execute();
        return $consulta;
    }
}

?>