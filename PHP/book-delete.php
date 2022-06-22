<?php
session_start();
require_once 'connection.php';
require_once 'methods.php';

if(empty($_POST['book']))
{
    $delete = new stdClass;
    $delete = implode($_GET);
    print_r($delete);
}

else
{
    $delete = new stdClass;
    $delete = implode(", ",$_POST['book']);
    print_r($delete);
}

$conn = connectdb();

Book::setConn($conn);
Book::deleteBook($delete);
header('location: ../home.php');



?>