<?php
if(session_status() !== PHP_SESSION_DISABLED)
{
    session_start();
    unset($_SESSION);
    session_destroy();
}
    header('location: ../index.php');
