<?php
session_start();
if ($_SESSION['tipo'] != 2) { // se o tipo do user for diferente de 2 nao entra nas paginas de colabordor;
    header("Location:../index.php?restritoCol");
}
