<?php
session_start();
require_once 'connection.php';
require_once 'methods.php';

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
$conn = connectdb();

function imgUpload($file)
{
    if(!in_array('', $_POST))
    {
        $uploaddir = '../img/';
        $imgdir = '../img/';
        $img_name = $file['tmp_name'];
        $img_new_name = uniqid();
        $img_type = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        move_uploaded_file($img_name, $uploaddir . $img_new_name . "." . $img_type);
        return $imgdir . $img_new_name . "." . $img_type;
    }
    else return false;
}

if(in_array('', $_POST))
{
    $_SESSION['message'] = "*Preencha todos os campos do formulário*";
    header("location: ../registration-book.php");
}

else
{
    Book::setConn($conn);
    Book::addBook($book);
    header("location: ../home.php");
}

?>