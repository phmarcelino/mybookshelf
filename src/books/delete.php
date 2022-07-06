<?php
session_start();
require_once 'database_book.php';

$databaseBook = new Book();

if(empty($_POST['book']))
{
    $delete = implode("",$_GET);
}

else
{
    $delete = new stdClass;
    $delete = implode(", ",$_POST['book']);
}

$databaseBook->deleteBook($delete);
header('location: index.php');

?>