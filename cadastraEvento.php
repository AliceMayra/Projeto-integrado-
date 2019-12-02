<?php

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, "estudio_bd");

if (!$conn) {
    die("Não foi possivel conectar ao banco de dados; " . mysqli_connect_error($conn));
} else {
    echo " ";
}


$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
$tipo_evento = isset($_POST['tipo_evento']) ? $_POST['tipo_evento'] : '';
$data_evento = isset($_POST['data_evento']) ? $_POST['data_evento'] : '';
$prof_eventos = isset($_POST['prof_eventos']) ? $_POST['prof_eventos'] : '';
$descricao_evento = isset($_POST['descricao_evento']) ? $_POST['descricao_evento'] : '';



$sql = "INSERT INTO  tb_eventos  (id_cliente ,tipo_evento, data_evento, prof_eventos,descricao_evento) VALUES ('$id_cliente','$tipo_evento', '$data_evento', '$prof_eventos', '$descricao_evento')";




















if ($conn->query($sql) === TRUE) {
    echo "<script>window.location='novoEvento.php';alert(' Evento adicionado com sucesso!!');</script>";

//    echo "<script type='text/javascript'>window.alert('Usuário incluído com sucesso');</script>";
//        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL="../cadastrar.php">';
//        exit;
} else {
	echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>
