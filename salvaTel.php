<?php



$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$telefone1= isset($_POST['telefone1']) ? $_POST['telefone1'] : '';
$telefone2= isset($_POST['telefone2']) ? $_POST['telefone2'] : '';

$sql = "INSERT INTO  tb_telefone  (tipo, telefone1,telefone2) VALUES ('$tipo', '$telefone1', '$telefone2')";


?>
