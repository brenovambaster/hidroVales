<?php
session_start(); // iniciando sessao
//include('seguranca.php');
require_once("00 - BD/bd_conexao.php");
$email = $_POST['email_login'];
$password = $_POST['senha_login'];

$sql = " SELECT * FROM usuarios where email = '$email' and senha = '$password' ";
$result = $con->query($sql) or die("Erro ao se conectar com o Banco.");
$infoUsu = mysqli_fetch_object($result);
if (empty($infoUsu)) {
    echo "Usuário não encontrado. Por favor, verifique o email ou senha.";
    header("Location:index.php?errorLogin");
} else {
    $_SESSION['nomeUser'] = $infoUsu->nome;
    $_SESSION['idUser'] = $infoUsu->idUsuario;
    $_SESSION['tipo'] = $infoUsu->niveis_acesso_id;

    if ($infoUsu->niveis_acesso_id == 1) {
        echo "Usuário administrador logado.";
        header("location: adm/index.php");
        // criar sessao variáveis de sessão aqui; 
    } else if ($infoUsu->niveis_acesso_id == 2) {
        echo "Usuário colaborador logado";
        header("location: colaborador/index.php");
    } else {
        header("location: cliente/index.php");
        echo (" Usuário cliente logado");
    }
}
fecharConexao($con);
