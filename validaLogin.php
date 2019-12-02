<?php 
$usuario = $_POST['usuario'];
$entrar = $_POST['btnAcessar'];
$senha = $_POST['senha'];
$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('estudio_bd');
  if (isset($entrar)) {
           
    $verifica = mysql_query("SELECT * FROM tb_adm WHERE usuario = 
    '$usuario' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysql_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.php';</script>";
        die();
      }else{
        setcookie("usuario",$usuario);
        header("Location:agenda.php");
      }
  }
?>