<?php
session_start();
require_once 'connection.php';
require_once 'methods.php';

if(empty($_POST['book']))
{
    $delete = $_GET;
}

else
{
    $delete = new stdClass;
    $delete -> id_book = implode(", ",$_POST['book']);
}

$conn = connectdb();

Book::setConn($conn);
Book::deleteBook($delete);
header('location: ../home.php');



?>