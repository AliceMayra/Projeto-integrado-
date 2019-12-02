<?php 

include 'conexaoCalendario.php';


$query_events = "SELECT tipo_evento, data_evento, prof_eventos, id_cliente FROM tb_eventos";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $tipo_evento = $row_events['tipo_evento'];
    $data_evento = $row_events['data_evento'];
    $prof_eventos = $row_events['prof_eventos'];
    $id_cliente = $row_events['id_cliente'];
    
    $eventos[] = [
        'tipo_evento' => $tipo_evento, 
        'data_evento' => $data_evento, 
        'prof_eventos' => $prof_eventos, 
        'id_cliente' => $id_cliente, 
        
        ];
}

echo json_encode($eventos);

