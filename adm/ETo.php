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

    <div class="container mt-5">
        <form action="ETo.php" method="GET">
            <h3 class="text-center">Preencha os dados abaixo:</h3>
            <div class=" form-row col-md-10 mx-auto">
                <div class="form-group col-md-4">
                    <label for="tempMin">Temperatura mínima (C°):</label>
                    <input type="number" class="form-control" name="tempMin" id="tempMin">

                </div>
                <div class="form-group col-md-4">
                    <label for="tempMax">Temperatura máxima (C°):</label>
                    <input type="number" class="form-control" name="tempMax" id="tempMax">
                </div>
                <div class=" form-group col-md-4">
                    <label for="lat">Latitude:</label>
                    <input type="float" name="lat" id="lat" class="form-control">
                </div>
                <div class=" form-group col-md-4">
                    <label for="data">data:</label>
                    <input type="date" name="data" id="data" class="form-control">
                </div>

            </div>

            <div class="form-row col-md-10 mx-auto">
                <div class=" form-group col-md-4">
                    <input type="submit" class=" btn btn-success" name="botao">

                </div>
            </div>

        </form>
    </div>
</body>


</html>

<?php
if (isset($_GET['botao'])) {
    $tempMin = $_GET['tempMin'];
    $tempMax = $_GET['tempMax'];
    $lat = $_GET['lat'];
    $deltat = $tempMax - $tempMin;
    $tmed = ($tempMax + $tempMin) / 2;
    $data1 =  new DateTime($_GET['data']); // criando objt com a data informada
    // echo juliantojd($data1->format('m'),$data1->format('d'),$data1->format('y'));
    $jd = gregoriantojd($data1->format('d'), $data1->format('m'), $data1->format('y'));
    $ano = date('Y');
    $data = new DateTime('01-01-' . $ano);
    // Resgata diferença entre as datas
    $dateInterval = $data1->diff($data);
    $diaJuliano = $dateInterval->days + 1;
    $dr = 1 + 0.033 * cos((2 * pi() / 365 * $diaJuliano));
    $ds = 0.409 * sin((2 * pi() * $diaJuliano / 365) - 1.39);
    $hn = acos(-TAN($lat * pi() / 180) * TAN($ds));

    $Qo = (24 * 60 / pi() * (0.082 * $dr) * (($hn * sin($lat * pi() / 180)) * sin($ds) + ((COS($lat * pi() / 180) * (COS($ds)) * sin($hn)))));
    $resul = (0.0023 * 0.408 * $Qo * (pow($deltat, 0.5)) * ($tmed + 17.8));
    ?>
    <div class="form-row col-md-10 mx-auto ">
        <div class=" form-group col-md-4">
            <label for="resul">Resultado:</label>
            <input type="text" name="resul" id="resul" class="form-control bg-info" disabled value="<?php echo $resul; ?>">
        </div>
    </div>



<?php
    echo " <b> resul:</b> \n" . $resul;
    echo " <b> Qo:</b>    \n" . $Qo;
    echo " <b> DR:</b>    \n" . $dr;
    echo " <b> ds:</b>    \n" . $ds;
    echo " <b> dj:</b>    \n" . $diaJuliano;
    echo " <b> hn:</b>    \n" . $hn;
} else { }

?>