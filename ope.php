
<?php
session_start();
include('conexao.php');
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: login.php');
    exit();
}
 
$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
 
$query = "select usuario from tb_adm where usuario = '{$usuario}' and senha = '{$senha}'";
 
$result = mysqli_query($conn, $query);
 
$row = mysqli_num_rows($result);
 
if($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: agenda.php');
    exit();

} else {
    $_SESSION['usuario'] = true;
    echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.php';</script>";
   
    exit();
}