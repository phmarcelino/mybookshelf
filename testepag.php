<?php
require_once 'PHP/connection.php';
$conn = connectdb();
$register = 5;

//A quantidade de valor a ser exibida
$quantidade = 3;
//a pagina atual
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
//Calcula a pagina de qual valor será exibido
$inicio = ($quantidade * $pagina) - $quantidade;

//Monta o SQL com LIMIT para exibição dos dados  
function limit($conn, $inicio, $quantidade)
{
    $sql = $conn->prepare("SELECT * FROM book LIMIT $inicio, $quantidade");
    $sql -> execute();
    return $sql;
}

$resultado = limit($conn, $inicio, $quantidade);
var_dump($resultado);


// function Teste($conn)
// {
//     $busca = $conn->prepare("SELECT * FROM book LIMIT ");
//     $busca -> execute();
//     return $busca;
// }
?>