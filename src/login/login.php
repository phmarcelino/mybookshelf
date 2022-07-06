<?php
session_start();
require_once 'database_login.php';

$login_email = $_POST['email'];
$login_pass = $_POST['password'];

if (empty($login_email && $login_pass))
{
    $_SESSION['message'] = "*Preencha todos os campos*";
    header('location: index.php');
}
else
{
    $credentials = new Verify();
    $query = $credentials->authentication($login_email, $login_pass);
    if($query)
    {
        $_SESSION = get_object_vars($query);
        header('location: ../books/index.php');
    }
    else
    {
        $_SESSION['message'] = "*Usuário ou senha inválidos*";
        unset($_SESSION);
        header('location: index.php');
    }
}

?>