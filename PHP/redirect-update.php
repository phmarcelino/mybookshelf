<?php
session_start();
$book = $_POST['book'];

if(count($book) > 1)
{
   unset($_POST['book']);
   header('location: /mybookshelfproject/home.php');
}
else
{
   $_SESSION['id_book'] = implode($book);
   header('location: /mybookshelfproject/update-book.php');
};

?>
