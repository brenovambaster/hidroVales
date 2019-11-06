<?php include('segurancaAdm.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="imagem/png" href="../imagens/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Administração dos aplicativos </title>
    <!-- Bootstrap core CSS -->
</head>

<body>
    <?php include('nav.php'); ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-5"><b> <p> <?php echo $_SESSION['nomeUser']; ?> </p> </b>
            <p>Seja bem vindo ao aplicativo que ainda se encontra em fase de testes desenvolvido pelo grupo de pesquisa HidroVales.</p>
            <p><a class="btn btn-primary " href="https://hidrovales.com.br/sobre" role="button" target="blank">Saiba Mais &raquo;</a></p>
        </div>

    </div>
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Irrigação</h2>
                <p><justify>A irrigação constitui um conjunto de operações que é necessário ao atendimento das necessidades de água para as plantas-solo.Os sistemas de irrigação são um conjunto de elementos que se integram e que atuam em conjunto visando um objetivo geral. Antes do início do programa de manejo da irrigação, é importante que se conheça a fisiologia da planta, ou seja, saber quais os períodos críticos de consumo de água e seus reflexos na produtividade.. </p></justify
                <p><a class="btn btn-secondary" href="http://www.revistaagropecuaria.com.br/2015/03/26/importancia-do-manejo-de-sistemas-de-irrigacao/" role="button" target="blank">Saiba mais &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>HidroVales</h2>
                <p>O GRUPO DE PESQUISA EM RECURSOS HÍDRICOS E AMBIENTAIS DO NORTE DE MINAS (HIDROVALES) surgiu em virtude da elevada demanda de alunos do ensino médio e superior para a orientação em projetos de pesquisa, extensão e estágios. Também serviu como estímulo, à criação, a carência por tecnologias e pesquisas aplicadas às condições dos vales do Jequitinhonha, Rio Pardo, Mucuri e São Francisco, áreas de abrangência do IFNMG.</p>
                <p><a class="btn btn-secondary " href="https://hidrovales.com.br/sobre" role="button" target="blank">Saiba Mais &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Deseja Entrar em contato ? </h2>
                <p>Para conhecer nossas condições e serviços entre em contato pelo telefone (38) 3871-7000, ou pelo e-mail hidrovales@hidrovales.com. </p>
                 <p><a class="btn btn-secondary " href="https://hidrovales.com.br/contato" role="button" target="blank">Entrar em Contato &raquo;</a></p>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>

</html>