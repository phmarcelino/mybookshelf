<?php
session_start();
$book = $_POST['book'];

if(empty($book) || count($book) > 1)
{
   unset($_POST['book']);
   header('location: ../home.php');
}
else
{
   $_SESSION['id_book'] = implode($book);
   header('location: ../update-book.php');
}

?>
