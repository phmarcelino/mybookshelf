<?php
function connectdb()
{
    $host = '127.0.0.1';
    $port = '3308';
    $dbname = 'bookshelf';
    $user = 'root';
    $password = '';
    
    try
    {
    $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
    return $conn;
    }catch(Exception $e){

    }
}
?>