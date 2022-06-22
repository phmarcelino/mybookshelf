<?php
session_start();
$book = $_GET;
var_dump($_GET);
var_dump($_POST);
if(empty($book) || count($book) > 1)
{
   #unset($_POST['book']);
   #header('location: ../home.php');
}
else
{
   #$_SESSION['id_book'] = implode($book);
   #header('location: ../update-book.php');
}

?>
