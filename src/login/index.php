<?php
  session_set_cookie_params(0);
  session_start();
  if(isset($_SESSION['message']))
  {
    $message = $_SESSION['message'];
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Mybookshelf Login</title>
  </head>
  <!-- Sripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <body>
      <header>
        <div class="container">
          <img src="../../img/Retângulo 1.png" id="design" alt="FakeNavbar">
        </div>
      </header>
        <div class="jumbotron" id="form-area">
          <div class="container">
            <div id="form">
              <img src="../../img/Camada 1.png" id="logomarca" alt="">
                <?php if(isset($message)): ?>
                  <div id="error">
                    <p><?= $message ?></p>
                  </div>
                <?php endif; ?>
              <form action="login.php" method="post">
                <div class="form-group">
                  <label for="email-input">E-mail</label>
                  <input type="email" class="form-control" id="email-input" name="email" placeholder="Insira seu e-mail" required>
                </div>
                <div class="form-group">
                  <label for="password-input">Senha</label>
                  <input type="password" class="form-control" id="password-input" name="password" placeholder="Insira sua senha">
                </div>
                <div class="form-group">
                  <a href="#" class="badge" id="recupera">Esqueci minha senha</a>
                </div>
                <button id="login" type="submit" class="btn btn-primary">Fazer Login</button>
                <div id="division">
                  <hr> <p>ou</p> <hr>
                </div>
                <a href="#" id="register">Cadastre-se !</a>
              </form>
            </div>
          </div>
        </div>
    </body>
</html>