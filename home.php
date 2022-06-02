<?php
session_start();
if(!isset($_SESSION['user'])){
  header('location: mybookshelfproject/index.php');
}
$user = $_SESSION['user'];

?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <script src="https://kit.fontawesome.com/cfd199cf55.js" crossorigin="anonymous"></script>
    <title>Mybookshelf Login</title>
  </head>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <body>
        <header>
            <div class="container" id="nav">
                <nav class="navbar fixed-top" id="navbar"> 
                    <img src="img/Camada 1.png" id="logomarca" alt="Mybookshelf">  
                    <div class="navbar-nav">
                        <a href="/mybookshelfproject/PHP/session.php" id="logout-menu">
                            Logout
                            <i class="fa-solid fa-arrow-right-from-bracket" id="logout-ar\row"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </header>
    <div class="container">
        <h1>
          <?php
          echo "Seja bem-vindo(a) $user";
          ?>
        </h1>
    </div>

<!--Table-->
    <div class="container" id="table">
        <div class="navbar" id="table-head">
            <h2>
                Meus Livros
            </h2>
            <a href="cadastro.html" id="cadaster-menu">
                Cadastrar livro
            </a>
        </div>
        <table class="table">
            <thead class="thead-dark">
              <tr>
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
            <tbody>
              <tr>
                <th scope="row"><img href="#" alt="capa do livro"></th>
                <td>Título do livro</td>
                <td>Nome do Autor</td>
                <td>Gênero do Livro</td>
                <td>Nome da Editora</td>
                <td>Número das Páginas</td>
                <td>Nacional</td>
                <td>Lorem Impsum</td>
                <td><a href="#">Editar</a> <a href="#">Remover</a></td>
              </tr>
              <tr>
                <th scope="row"><img href="#" alt="capa do livro"></th>
                <td>Título do livro</td>
                <td>Nome do Autor</td>
                <td>Gênero do Livro</td>
                <td>Nome da Editora</td>
                <td>Número das Páginas</td>
                <td>Nacional</td>
                <td>Lorem Impsum</td>
                <td><a href="#">Editar</a> <a href="#">Remover</a></td>
              </tr>
              <tr>
                <th scope="row"><img href="#" alt="capa do livro"></th>
                <td>Título do livro</td>
                <td>Nome do Autor</td>
                <td>Gênero do Livro</td>
                <td>Nome da Editora</td>
                <td>Número das Páginas</td>
                <td>Nacional</td>
                <td>Lorem Impsum</td>
                <td><a href="#">Editar</a> <a href="#">Remover</a></td>
              </tr>
            </tbody>
          </table>
    </div>

    <!--Paginação-->
    <nav aria-label="Navegação de página exemplo">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Anterior">
              <span aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1<span class="sr-only">(atual)</span></a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Próximo">
              <span aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
              <span class="sr-only">Próximo</span>
            </a>
          </li>
        </ul>
      </nav>
    </body>
</html>