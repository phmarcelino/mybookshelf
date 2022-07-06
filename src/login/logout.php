<?php
if(session_status() !== PHP_SESSION_DISABLED)
{
    session_start();
    session_destroy();
}
header('location: index.php');
exit();