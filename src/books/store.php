<?php
session_start();
require_once 'database_book.php';

if(in_array('', $_POST) or empty($_FILES['cover']))
{
    $_SESSION['book'] = $_POST;
    $_SESSION['message'] = "*Preencha todos os campos do formulário*";
    header("location: create.php");
    exit();
}

$databaseBook = new Book();

$book = new stdClass;
$book -> id_user = $_SESSION['id'];
$book -> title = $_POST['title'];
$book -> author = $_POST['author'];
$book -> pages = $_POST['pages'];
$book -> genre = implode(",", $_POST['genre']);
$book -> publi = $_POST['publi'];
$book -> cover = imgUpload($_FILES['cover']);
$book -> company = $_POST['company'];
$book -> describe = $_POST['describe'];

function imgUpload($file)
{
    if(!in_array('', $_POST))
    {
        $uploaddir = '../../files/cover/';
        $img_name = $file['tmp_name'];
        $img_new_name = uniqid();
        $img_type = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        move_uploaded_file($img_name, $uploaddir . $img_new_name . "." . $img_type);
        return $uploaddir . $img_new_name . "." . $img_type;
    }
}
$databaseBook->addBook($book);
header("location: index.php");

?>