<?php
session_start();
require_once 'database_book.php';

if(in_array('', $_POST))
{
    header("location: index.php");
    exit();
}

$databaseBook = new Book();
$update = new stdClass;
$update -> id_book = $_POST['id_book'];
$update -> id_user = $_SESSION['id'];
$update -> title = $_POST['title'];
$update -> author = $_POST['author'];
$update -> pages = $_POST['pages'];
$update -> genre = implode(",", $_POST['genre']);
$update -> publi = $_POST['publi'];
$update -> cover = imgUpload($_FILES['cover']);
$update -> company = $_POST['company'];
$update -> describe = $_POST['describe'];
function imgUpload($file)
{
    $verify = $_FILES['cover']['name'];
    $book = new Book();

    if(!in_array('', $_POST) and $verify != null)
    {
        $uploaddir = '../../files/cover/';
        $imgdir = '../../files/cover/';
        $img_name = $file['tmp_name'];
        $img_new_name = uniqid();
        $img_type = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        move_uploaded_file($img_name, $uploaddir . $img_new_name . "." . $img_type);
        return $imgdir . $img_new_name . "." . $img_type;
    }
    else
    {
        $id_book = $_POST['id_book'];
        $update = $book->getBookUpdate($id_book);
        return $update['cape'];
    }

}

$databaseBook -> updateBook($update);
header("location: index.php");

?>