<?php

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, "estudio_bd");

if (!$conn) {
    die("Não foi possivel conectar ao banco de dados; " . mysqli_connect_error($conn));
} else {
    echo " ";
}



$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$dataNasc = isset($_POST['data_Nasc']) ? $_POST['data_Nasc'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$rua = isset($_POST['rua']) ? $_POST['rua'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$pais = isset($_POST['pais']) ? $_POST['pais'] : '';
$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : '';
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$telefone1= isset($_POST['telefone1']) ? $_POST['telefone1'] : '';
$telefone2= isset($_POST['telefone2']) ? $_POST['telefone2'] : '';

$sql = "INSERT INTO  tb_cliente  (nome, sexo, cpf, data_Nasc, email, rua, numero, cep, cidade, bairro, estado, pais, referencia, tipo, telefone1,telefone2) VALUES ('$nome', '$sexo', '$cpf', '$dataNasc', '$email', '$rua', 
'$numero', '$cep', '$cidade', '$bairro', '$estado', '$pais', '$referencia', '$tipo', '$telefone1', '$telefone2')";


















if ($conn->query($sql) === TRUE) {
    echo "<script>window.location='cadastrar.php';alert(' Cliente cadastrado com sucesso!!');</script>";

//    echo "<script type='text/javascript'>window.alert('Usuário incluído com sucesso');</script>";
//        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL="../cadastrar.php">';
//        exit;
} else {
	echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();






?>
