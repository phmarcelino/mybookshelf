<?php
session_start();
require_once 'connection.php';
require_once 'methods.php';

$delete = new stdClass;
$delete -> id_book = implode(", ",$_POST['book']);
$conn = connectdb();

if(!empty($delete -> id_book))
{
    Book::setConn($conn);
    Book::deleteBook($delete);
    header('location: /mybookshelfproject/home.php');
}
else
{
header('location: /mybookshelfproject/home.php');
}

?>