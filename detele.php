<?php


require_once 'init.php';
 
// pega o ID da URL
$id = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID não informado";
    exit;
}
 
// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM tb_cliente WHERE id_cliente = :id_cliente";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_cliente', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: buscarCadastro.php');
}
else
{
    echo "<script>alert('IMPOSSIVEL REMOVER O CLIENTE! O mesmo possui um evento criado')</script>";
    echo "<meta http-equiv='refresh' content = '0, url = buscarCadastro.php'>";
        //print_r($stmt->errorInfo());
   //header('Location: buscarCadastro.php');
}

?>