<?php
session_start();
if ($_SESSION['tipo'] != 1) { // se o tipo de user for diferente de 1 nao entra  nas paginas de adm;
    header("Location:../index.php?restritoAdm");
}
