<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <title>Login HidroVales</title>
  <link rel="icon" type="imagem/png" href="imagens/favicon.ico" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>

  <div class="container   col-sm-7 col-md-6 col-lg-4  mt-5 central">
    <div class="rounded quadro ">
      <div class="title">
        <h3 class="text-center"> <img src="imagens/hidrovales.png" alt="hidrovales" width="190px" height="100px" </h3> </div> <div class="">
      </div>
      <?php
      if (isset($_GET["errorLogin"])) { ?>

        <div class="alert alert-danger alert-dismissible fade show mx-auto " role="alert">
          Usuário inválido! Por favor, verifique o e-mail e a senha e tente novamente.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
      }

      ?>

      <form action="validarLogin.php" method="POST" class="form-group">
        <div class="ml-3">
          <label for="email_login"><b>Seu e-mail: </b></label>
          <input class="col-11 mt-2 rounded border-primary" id="email_login" name="email_login" required="required" type="email" placeholder="teste.ifnmg@gmail.com" />
        </div>

        <div class="ml-3">
          <label for="senha_login"><b> Senha: </b> </label>
          <input class=" col-11 mt-2 rounded border-primary" id="senha_login" name="senha_login" required="required" type="password" placeholder="******" />
          <input class=" col-11 mt-2 " name="butaoLogin" id="logColor" type="submit" value="Logar" style=" font-style: italic; size:12px " />
        </div>

      </form>
    </div>

  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>