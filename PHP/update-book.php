<?php
session_start();
require_once 'connection.php';
require_once 'methods.php';

$update = new stdClass;
$update -> id_book = $_SESSION['id_book'];
$update -> id_user = $_SESSION['id'];
$update -> title = $_POST['title'];
$update -> author = $_POST['author'];
$update -> pages = $_POST['pages'];
$update -> genre = implode(",", $_POST['genre']);
$update -> publi = $_POST['publi'];
$update -> cover = imgUpload($_FILES['cover']);
$update -> company = $_POST['company'];
$update -> describe = $_POST['describe'];
$conn = connectdb();

function imgUpload($file)
{
    if(!in_array('', $_POST))
    {
        $uploaddir = 'C:/wamp64/www/mybookshelfproject/img/';
        $imgdir = '/mybookshelfproject/img/';
        $img_name = $file['tmp_name'];
        $img_new_name = uniqid();
        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        move_uploaded_file($img_name, $uploaddir . $img_new_name . "." . $extensao);
        return $imgdir . $img_new_name . "." . $extensao;
    }
    else return false;
}

if(in_array('', $_POST))
{
    header("location: /mybookshelfproject/home.php");
}

else
{
    Book::setConn($conn);
    Book::updateBook($update);
    header("location: /mybookshelfproject/home.php");
}

?>