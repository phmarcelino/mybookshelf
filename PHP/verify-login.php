<?php
session_start();
require_once 'connection.php';
require_once 'verify-methods.php';

$login_email = $_POST['email'];
$login_pass = $_POST['password'];
$conn = connectdb();
Verify::setConn($conn);

if (empty($login_email && $login_pass))
{
    $_SESSION['message'] = "*Preencha todos os campos*";
    header('location: ../index.php');
}
else
{   

    $querry = Verify::authentication($login_email, $login_pass);
    if($querry) 
    {
        $_SESSION = get_object_vars($querry);
        header('location: ../home.php');
    }
    else
    {
        $_SESSION['message'] = "*Usuário ou senha inválidos*";
        unset($_SESSION);
        header('location: ../index.php');
    
    }
}

?>