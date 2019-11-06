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

    <div class="container mt-5">
        <form action="manejo.php" method="GET">
            <h3 class="text-center">Preencha os dados abaixo:</h3>
            <div class=" form-row col-md-10 mx-auto">
                <div class="form-group col-md-4">
                    <label for="tempMin">Temperatura mínima (C°):</label>
                    <input type="number" class="form-control" name="tempMin" id="tempMin" required>

                </div>
                <div class="form-group col-md-4">
                    <label for="tempMax">Temperatura máxima (C°):</label>
                    <input type="number" class="form-control" name="tempMax" id="tempMax">
                </div>
                <div class=" form-group col-md-4">
                    <label for="lat">Latitude em graus:</label>
                    <input type="float" name="lat" id="lat" class="form-control">
                </div>
                <div class=" form-group col-md-4">
                    <label for="data">Data:</label>
                    <input type="date" name="data" id="data" class="form-control">
                </div>

                <div class=" form-group col-md-4">
                    <label for="vazão">Vazão do Aspersor m³/h:</label>
                    <input type="float" name="vazão" id="vazão" class="form-control" >
                </div>
                <div class=" form-group col-md-4">
                    <label for="espasp">Esp. Entre Aspersores:</label>
                    <input type="float" name="espasp" id="espasp" class="form-control" >
                </div>
                <div class=" form-group col-md-4">
                    <label for="espll">Esp. Entre Linhas Laterais:</label>
                    <input type="float" name="espll" id="espll" class="form-control" >
                </div>
                <div class=" form-group col-md-4">
                    <label for="efirri">Eficiência de Irrigação em %:</label>
                    <input type="float" name="efirri" id="efirri" class="form-control" > 
                </div>
                <div class=" form-group col-md-3">
                    <label for="Cult.">Cultura:</label>
                    <input type="text" name="Cult." id="Cult." class="form-control" > 
                </div>
                <div class=" form-group col-md-1">
                    <label for="Kc">Kc:</label>
                    <input type="float" name="Kc" id="Kc" class="form-control" > 
                </div>
                <div class=" form-group col-md-1">
                    <label for="Ks">Ks:</label>
                    <input type="float" name="Ks" id="Ks" class="form-control" >
                </div>
                <div class=" form-group col-md-1">
                    <label for="Kl">Kl:</label>
                    <input type="float" name="Kl" id="Kl" class="form-control" value="1" > 
                </div>
            </div>
            <div class="form-row col-md-10 mx-auto">
                <div class=" form-group col-md-4">
                    <input type="submit" class=" btn btn-primary" name="enviar" value="Enviar">

                </div>
            </div>

        </form>
    </div>
</body>


</html>

<?php
if (!isset($_GET['enviar'])) {

}else{
    $tempMin = $_GET['tempMin'];
    $tempMax = $_GET['tempMax'];
    $lat = $_GET['lat'];
    $kc = $_GET['Kc'];
    $ks = $_GET['Ks'];
    $kl = $_GET['Kl'];
    $espasp = $_GET['espasp'];
    $espll = $_GET['espll'];
    $efir = $_GET['efirri'];
    $efirri = ($efir/100);
    $deltat = $tempMax - $tempMin;
    $vazão = $_GET['vazão'];
    $ia = 1000*$vazão/($espasp*$espll);
    $tmed = ($tempMax + $tempMin)/2;
    $data1 =  new DateTime($_GET['data']); // criando objt com a data informada
    // echo juliantojd($data1->format('m'),$data1->format('d'),$data1->format('y'));
    $jd = gregoriantojd($data1->format('d'), $data1->format('m'), $data1->format('y'));
    $ano = date('Y');
    $data = new DateTime('01-01-' . $ano);
    // Resgata diferença entre as datas
    $dateInterval = $data1->diff($data);
    $diaJuliano = $dateInterval->days + 1;
    $dr = 1 + 0.033 * cos((2 * pi() / 365 * $diaJuliano));
    $ds = 0.409*sin((2*pi()*$diaJuliano/365) -1.39);
    $hn = acos(-TAN($lat * pi() / 180) * TAN($ds));

    $Qo = (24 * 60 / pi() * (0.082 * $dr) * (($hn * sin($lat * pi() / 180)) * sin($ds) + ((COS($lat * pi() / 180) * (COS($ds)) * sin($hn)))));
    $resul = (0.0023 * 0.408 * $Qo * (pow($deltat, 0.5)) * ($tmed + 17.8));
    // lamina bruta
    $etc = ($resul*$kc*$ks*$kl/$efirri);
    // tempo de irrigação
    $tempap = ($etc/$ia);

    ?>
    <div class="form-row col-md-10 mx-auto ">
        <div class=" form-group col-md-4">
            <label for="resul">ETc:</label>
            <input type="text" name="etc" id="etc" class="form-control bg-info" disabled value="<?php echo $etc; ?>">
        </div>
    </div>
    <div class="form-row col-md-10 mx-auto ">
        <div class=" form-group col-md-4">
            <label for="resul">Tempo de Aplicação Em Horas:</label>
            <input type="text" name="tempap" id="tempap" class="form-control bg-info" disabled value="<?php echo $tempap; ?>">
        </div>
    </div>
    <?php  }?>