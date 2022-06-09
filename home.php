<?php
session_start();
if(!isset($_SESSION['user'])){
  header('location: /mybookshelfproject/index.php');
}
require_once "PHP/methods.php";
require_once "PHP/connection.php";
$conn = connectdb();
$registers = 5;
$user = $_SESSION['user'];
$page = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$first_pg = ($registers * $page) - $registers;
$consulta = Book::getBook($conn, $first_pg, $registers);
?>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
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
            <a href="cadastro.php" id="cadaster-menu">
                Cadastrar livro
            </a>
        </div>

        <table class="table">
            <thead class="thead-dark">
              <tr>
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
            <?php 
              while($colunas = $consulta->fetch(PDO::FETCH_ASSOC)){
                $id = $colunas['id_book'];
                $cover = $colunas['cape'];
            ?>
            <tbody>
              <tr>
                
                  <?php echo "<td><input type='checkbox' id='check'name='book[$id]' value='$id'></td>";?>
                  <?php echo "<td scope='row'><img src='$cover' alt='capa do livro' style='max-width: 100px; max-height: 100px;'></td>";?>
                  <td><?php echo $colunas['title']; ?></td>
                  <td><?php echo $colunas['author']; ?></td>
                  <td><?php echo $colunas['genre']; ?></td>
                  <td><?php echo $colunas['company']; ?></td>
                  <td><?php echo $colunas['pages']; ?></td>
                  <td><?php echo $colunas['publi']; ?></td>
                  <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $colunas['description'] ;?></td>
                  <td><input type="submit" id="submit-button" value="Editar" formaction="/mybookshelfproject/PHP/update-redirect.php"> <input type="submit" id="submit_button" value="Excluir" formaction="/mybookshelfproject/PHP/delete-action.php"></td>
              </tr>
            </tbody>
            <?php } ?>
            </form>
          </table>
    </div>

    <!--Paginação-->
    <?php 
      $row = Book::getRow($conn);
      $row_count = $row->fetchColumn();
      $tot_Pages = $row_count / $registers;
      $prev_Page= $page - 1;
      $after_Page = $page + 1;
    ?>
    <nav aria-label="Navegação de página exemplo">
        <ul class="pagination">
          <li class="page-item">
            <?php if ($prev_Page !=0) {?>
            <a class="page-link" href="home.php?pagina=<?php echo $prev_Page ?>" aria-label="Anterior">
              <span aria-hidden="true"><i class="fa-solid fa-arrow-left"></i></span>
              <span class="sr-only">Anterior</span>
            </a>
            <?php } ?>
          </li>
          <?php for($i = 1; $i < $tot_Pages + 1; $i++)
          {
            echo "<li class='page-item'><a class='page-link' href=\"home.php?pagina=$i\"> $i <span class='sr-only'>(atual)</span></a></li>";
          } ?>
          <li class="page-item">
          <?php if ($after_Page <= $tot_Pages+1) { ?>
            <a class="page-link" href="home.php?pagina=<?php echo $after_Page?>" aria-label="Próximo">
              <span aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
              <span class="sr-only">Próximo</span>
            </a>
            <?php }?>  
          </li>
        </ul>
      </nav>
    </body>
</html>