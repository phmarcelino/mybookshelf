<?php
session_start();
if(!isset($_SESSION['user'])){
  header('location: /mybookshelfproject/index.php');
}
if(isset($_SESSION['message'])){
$error = $_SESSION['message'];
}
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/registration.css">
        <script src="https://kit.fontawesome.com/cfd199cf55.js" crossorigin="anonymous"></script>
        <title>Mybookshelf Cadastro</title>
    </head>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--Script Multiple-Select-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <body>
        <header>
            <div class="container" id="nav">
                <nav class="navbar fixed-top" id="navbar">
                    <a id="logo-image" href="home.php"> 
                        <img src="img/Camada 1.png" id="logomarca" alt="Mybookshelf">  
                    </a>
                    <div class="navbar-nav">
                        <a href="/mybookshelfproject/PHP/session.php" id="logout-menu">
                            Logout
                            <i class="fa-solid fa-arrow-right-from-bracket" id="logout-arrow"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">
            <h1>
                Cadastro de Livro
            </h1>
        </div>

        <form action="/mybookshelfproject/PHP/book-register.php" enctype="multipart/form-data" method="post" class="container">
            <div class="form-group col-md-8 offset-md-2">
                <div class="align-items-center d-flex">
                    <p id="text"> <?php if(isset($error)){echo $error;} ?> </p>
                </div>
                <label for="title-input">Título</label>
                <input type="text" class="form-control" id="title-input" name="title" placeholder="Título do Livro">
             
                <label for="author-input">Autor(es)</label>
                <input type="text" class="form-control" id="author-input" name="author" placeholder="Autor 1, Autor2, Autor3...">

                <label for="pages-input">Número de Páginas</label>
                <input type="number" class="form-control" id="pages-input" min="1" max="9999" name="pages" placeholder="">

                <label for="genre-input">Gênero</label>
                <select class="form-control selectpicker" id="genre-input" name="genre[]" title="Escolha o Gênero" multiple>
                    <option value="Romance">Romance</option>
                    <option value="Terror">Terror</option>
                    <option value="Ação">Ação</option>
                    <option value="Ficção">Ficção</option>
                    <option value="Distopia">Distopia</option>
                    <option value="Literatura">Literatura</option>
                </select>

                <label for="publi-input">Publicação</label>
                <select class="form-control" id="publi-input" name="publi">
                    <option selected disabled></option>
                    <option value="Nacional">Nacional</option>
                    <option value="Não-Nacional">Não-Nacional</option>
                </select>

                <label for="image-input">Capa</label>
                <input type="file" class="form-control-file" id="image-input" name="cover">

                <label for="company-input">Editora</label>
                <input type="text" class="form-control" id="company-input" name="company" placeholder="Editora">

                <label for="desc-input">Descrição</label>
                <textarea class="form-control" id="desc-input" name="describe" rows="3" maxlength="2000"></textarea>
                
                <input type="submit" id="submit-button" value="Cadastrar">

            </div>
    </body>
</html>