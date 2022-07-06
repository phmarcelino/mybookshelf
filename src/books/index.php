<?php

require_once "database_book.php";
require_once "../paginate.php";

session_start();
if(!isset($_SESSION['user'])){
  header('location: ../login/index.php');
}
$user = $_SESSION['user'];

$page = (int) ($_GET['pagina'] ?? 1);

$databaseBook = new Book();
$totalOfBooks = $databaseBook->getTotalOfBooks($_SESSION['id']);

$pagination = paginate($totalOfBooks, $page);

$books = $databaseBook->getBooks($pagination['current_page']);

?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/home.css">
    <script src="https://kit.fontawesome.com/cfd199cf55.js" crossorigin="anonymous"></script>
    <title>Mybookshelf Home</title>
  </head>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <body>
    <header>
      <div class="container" id="nav">
        <nav class="navbar fixed-top" id="navbar">
          <img src="../../img/Camada 1.png" id="logomarca" alt="Mybookshelf">
          <div class="navbar-nav">
            <a href="../login/logout.php" id="logout-menu">
              Logout
              <i class="fa-solid fa-arrow-right-from-bracket" id="logout-ar\row"></i>
            </a>
          </div>
        </nav>
      </div>
    </header>
    <div class="container">
        <h1>
          Seja bem-vindo(a) <?= $user ?>
        </h1>
    </div>
    <!--Table-->
    <div class="container" id="table">
      <div class="navbar" id="table-head">
        <h2>
            Meus Livros
        </h2>
        <a href="create.php" id="cadaster-menu">
            Cadastrar livro
        </a>
      </div>
      <table align="center" class="table">
        <thead class="thead-dark">
          <tr align="center">
            <th></th>
            <th scope="col">Capa</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Gênero</th>
            <th scope="col">Editora</th>
            <th scope="col">Páginas</th>
            <th scope="col">Publicação</th>
            <th scope="col">Descrição</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <form method="POST">
          <?php foreach ($books as $book): ?>
            <tbody align="center">
              <tr>
                <td><input type='checkbox' id='check' name='book[]' value='<?= $book['id_book'];?>'></td>
                <td scope='row'><img src='<?= $book['cape'] ?>' alt='capa do livro' style='max-width: 100px; max-height: 100px;'></td>
                <td id="table"><?=$book['title']; ?></td>
                <td id="table"><?=$book['author']; ?></td>
                <td id="table"><?=$book['genre']; ?></td>
                <td id="table"><?=$book['company']; ?></td>
                <td id="table"><?=$book['pages']; ?></td>
                <td id="table"><?=$book['publi']; ?></td>
                <td id="describe"><p><?=$book['description']; ?></p></td>
                <td><a id="submit-button" href="edit.php?id=<?= $book['id_book']; ?>">Editar</a><input type="submit" id="submit-button" value="Excluir" formaction="delete.php?id=<?= $book['id_book']; ?>"></td>
              </tr>
            </tbody>
          <?php endforeach; ?>
        </form>
      </table>
    </div>
    <!--Paginação-->
    <nav aria-label="Navegação de página exemplo">
      <ul class="pagination">
        <li class="page-item">
          <?php if ($pagination['previous_page'] !== null): ?>
            <a class="page-link" href="index.php?pagina=<?=$pagination['previous_page']; ?>" aria-label="Anterior">
              <span aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
              <span class="sr-only">Anterior</span>
            </a>
          <?php endif ?>

        </li>
        <?php foreach($pagination['pages'] as $page): ?>
          <li class='page-item'><a class='page-link' href="index.php?pagina=<?= $page ?>"><?= $page ?><span class='sr-only'>(atual)</span></a></li>
        <?php endforeach; ?>

        <li class="page-item">
          <?php if ($pagination['next_page'] !== null): ?>
            <a class="page-link" href="index.php?pagina=<?= $pagination['next_page']; ?>" aria-label="Próximo">
              <span aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
              <span class="sr-only">Próximo</span>
            </a>
          <?php endif; ?>
        </li>
      </ul>
    </nav>
  </body>
</html>