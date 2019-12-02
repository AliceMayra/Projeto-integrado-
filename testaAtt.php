<?php

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, "estudio_bd");

if (!$conn) {
    die("Não foi possivel conectar ao banco de dados; " . mysqli_connect_error($conn));
} else {
    echo " ";
}
 
// resgata os valores do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : NULL;
$dataNasc = isset($_POST['data_Nasc']) ? $_POST['data_Nasc'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$rua = isset($_POST['rua']) ? $_POST['rua'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : NULL;
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : NULL;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : NULL;
$estado = isset($_POST['estado']) ? $_POST['estado'] : NULL;
$pais = isset($_POST['pais']) ? $_POST['pais'] : '';
$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : NULL;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$telefone1= isset($_POST['telefone1']) ? $_POST['telefone1'] : NULL;
$telefone2= isset($_POST['telefone2']) ? $_POST['telefone2'] : NULL;
$id = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : NULL;


$sql = mysql_query("UPDATE dados SET nome='$nome',sexo='$sexo',cpf='$cpf', data_Nasc ='$dataNasc',"
        . "email='$email', rua='$rua', numero='$numero', cep='$cep', cidade='$cidade',"
        . "bairro='$bairro', estado='$estado', pais='$pais', referencia='$referencia',"
        . "tipo='$tipo', telefone1='$telefone1', telefone2='$telefone2' WHERE id_cliente='$id'")or die(mysql_error());
 
($sql) ? print 'Dados alterados com sucesso' : die('Falha ao alterar dados');



if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>window.alert('Usuário incluído com sucesso');</script>";
        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL="../estudio/cadastrar.php">';
        exit;
} else {
	echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>