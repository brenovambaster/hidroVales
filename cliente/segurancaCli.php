<?php
session_start();
if ($_SESSION['tipo'] != 3) { // se o tipo de user for diferente de 3 nao entra na pagina de cliente; 
    header("Location:../index.php?restritoCli");
}
