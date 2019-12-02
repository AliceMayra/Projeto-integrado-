<?php

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, "estudio_bd");

if (!$conn) {
    die("Não foi possivel conectar ao banco de dados; " . mysqli_connect_error($conn));
} else {
    echo " ";
}


$id = filter_input(INPUT_POST, 'id_eventos', FILTER_SANITIZE_NUMBER_INT);
$tipo_evento = filter_input(INPUT_POST, 'tipo_evento', FILTER_SANITIZE_STRING);
$data_evento = filter_input(INPUT_POST, 'data_evento',FILTER_SANITIZE_NUMBER_INT);
$prof_eventos = filter_input(INPUT_POST, 'prof_eventos');
$descricao_evento = filter_input(INPUT_POST, 'descricao_evento', FILTER_SANITIZE_STRING);


$result_usuario = "UPDATE tb_eventos SET tipo_evento='$tipo_evento', data_evento = '$data_evento', prof_eventos = '$prof_eventos', descricao_evento = '$descricao_evento' "
        . " WHERE id_eventos='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	echo "<script type='text/javascript'>  

    alert('Dados alterados com sucesso!');
    
    history.back()


   </script>";

}else{
	echo "<script type='text/javascript'>  

    alert('ERRO AO ALTERAR!');
    
    history.back()


   </script>";
}




$conn->close();

?>