<?php
session_start();
require_once 'connection.php';
require_once 'register-methods.php';

$book = new stdClass;
$book -> id_user = $_SESSION['id'];
$book -> title = $_POST['title'];
$book -> author = $_POST['author'];
$book -> pages = $_POST['pages'];
$book -> genre = implode(",", $_POST['genre']);
$book -> publi = $_POST['publi'];
$book -> cover = $_POST['cover'];
$book -> company = $_POST['company'];
$book -> describe = $_POST['describe'];

if(in_array('', $_POST))
{
    $_SESSION['message'] = "Preencha todos os campos do formulário";
    header("location: /mybookshelfproject/cadastro.php");
}
else
{
    Book::setConn($conn);
    Book::addLivro($book);
    header("location: /mybookshelfproject/home.php");
}

?>