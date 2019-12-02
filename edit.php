<?php


// 
//require_once 'init.php';
//require_once 'conexao.php';
// resgata os valores do formulário
//
//$nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
//$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
//$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : NULL;
//$dataNasc = isset($_POST['data_Nasc']) ? $_POST['data_Nasc'] : NULL;
//$email = isset($_POST['email']) ? $_POST['email'] : NULL;
//$rua = isset($_POST['rua']) ? $_POST['rua'] : '';
//$numero = isset($_POST['numero']) ? $_POST['numero'] : NULL;
//$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
//$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : NULL;
//$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : NULL;
//$estado = isset($_POST['estado']) ? $_POST['estado'] : NULL;
//$pais = isset($_POST['pais']) ? $_POST['pais'] : '';
//$referencia = isset($_POST['referencia']) ? $_POST['referencia'] : NULL;
//$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
//$telefone1= isset($_POST['telefone1']) ? $_POST['telefone1'] : NULL;
//$telefone2= isset($_POST['telefone2']) ? $_POST['telefone2'] : NULL;
//$id = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : NULL;


 
// validação (bem simples, mais uma vez)



 
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
//$isoDate = dateConvert($dataNasc);
 
// atualiza o banco
//$PDO = db_connect();

//$sql = "UPDATE tb_cliente SET nome = :nome, sexo = :sexo, cpf = :cpf, data_Nasc = :data_Nasc, email = :email, rua = :rua, numero = :numero, cep = :cep, cidade = :cidade, bairro = :bairro, estado = :estado, pais = :pais, referencia = :referencia, tipo = :tipo, telefone1 = :telefone1 ,telefone2 = :telefone2  WHERE id_cliente = :id_cliente";
//$stmt = $PDO->prepare($sql);
//$stmt->bindParam(':nome', $nome);
//$stmt->bindParam(':sexo', $sexo);
//$stmt->bindParam(':cpf', $cpf);
//$stmt->bindParam(':data_Nasc', $isoDate);
//$stmt->bindParam(':email', $email);
//$stmt->bindParam(':rua', $rua);
//$stmt->bindParam(':numero', $numero);
//$stmt->bindParam(':cep', $cep);
//$stmt->bindParam(':cidade', $cidade);
//$stmt->bindParam(':bairro', $bairro);
//$stmt->bindParam(':estado', $estado);
//$stmt->bindParam(':pais', $pais);
//$stmt->bindParam(':referencia', $referencia);
//$stmt->bindParam(':tipo', $tipo);
//$stmt->bindParam(':telefone1', $telefone1);
//$stmt->bindParam(':telefone2', $telefone2);
//$stmt->bindParam(':id_cliente', $id, PDO::PARAM_INT);
//
//
//
//
// 
//if ($stmt->execute())
//{
//  
//     echo "<script type='text/javascript'>window.alert('Alterado com sucesso!');</script>";
//        //echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL="../estudio/cadastrar.php">';
//        exit;
//    header('Location: buscarCadastro.php');
//}
//else
//{
//    echo "Erro ao alterar";
//    print_r($stmt->errorInfo());
//}


$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, "estudio_bd");

if (!$conn) {
    die("Não foi possivel conectar ao banco de dados; " . mysqli_connect_error($conn));
} else {
    echo " ";
}


$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo');
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$dataNasc = filter_input(INPUT_POST, 'data_Nasc',FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING);
$referencia = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$telefone1= filter_input(INPUT_POST, 'telefone1', FILTER_SANITIZE_STRING);
$telefone2= filter_input(INPUT_POST, 'telefone2', FILTER_SANITIZE_STRING);



$result_usuario = "UPDATE tb_cliente SET nome='$nome', sexo = '$sexo', cpf = '$cep', data_Nasc = '$dataNasc', email = '$email', rua = '$rua', numero = '$numero', cep = '$cep', cidade = '$cidade', bairro = '$bairro', estado = '$estado', pais = '$pais' , referencia = '$referencia', tipo = '$tipo', telefone1 = '$telefone1' ,telefone2 = '$telefone2' "
        . " WHERE id_cliente='$id'";
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