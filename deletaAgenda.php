<?php


require_once 'init.php';
 
// pega o ID da URL
$id = isset($_GET['id_eventos']) ? $_GET['id_eventos'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID não informado";
    exit;
}
 
// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM tb_eventos WHERE id_eventos = :id_eventos";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_eventos', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: agenda.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}

?>