<?php

session_start();
include('verifica_login.php');

include_once("conexao.php");
$result_events = "SELECT id_cliente,tipo_evento, data_evento, descricao_evento FROM tb_eventos";



$resultado_events = mysqli_query($conn, $result_events);

?>
<!DOCTYPE html>
<html lang="pt-br">



<head>

    <meta charset='utf-8' />
    <link href='css/fullcalendar.min.css' rel='stylesheet' />
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link href='css/personalizado.css' rel='stylesheet' />
    <script src='js/moment.min.js'></script>
    <script src='js/jquery.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='locale/pt-br.js'></script>
    <script>

        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: Date(),
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events

                    eventClick: function(event) {
                        
                    $('#visualizar #id').text(event.id);
                    $('#visualizar #title').text(event.title);
                    $('#visualizar #start').text(event.start.format('DD/MM/YYYY'));
                    $('#visualizar #color').text(event.color);
                    $('#visualizar').modal('show');
                     return false;

                    },

events: [
<?php
while($row_events = mysqli_fetch_array($resultado_events)){
    ?>
    {
        id: '<?php echo $row_events['id_cliente']; ?>',
        title: '<?php echo $row_events['tipo_evento']; ?>',
        start: '<?php echo $row_events['data_evento']; ?>',
        color: '<?php echo $row_events['descricao_evento']; ?>',


    },<?php
}
?>
],

});
        });

    </script>
</head>

<div class="card-footer">

   <a href="logout.php"><button type="Reset" class="zmdi zmdi-power"   name="btnCancelar">logout</button></a>
</div>

<body>


    <div id='calendar'></div>
    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title ">Dados do Evento</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <dl class="dl-horizontal">
                            <dt>ID DO CLIENTE</dt>
                            <dd id="id"></dd>
                            <dt>Tipo de evento</dt>
                            <dd id="title"></dd>
                            <dt>Data do evento</dt>
                            <dd id="start"></dd>
                            <dt>Descrição do evento</dt>
                            <dd id="color"></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>


    <div class="card-footer">
        <a href="agenda.php"><button type="Reset" class="btn btn-warning"   name="btnCancelar">< Voltar </button></a>

    </div>
    

</body>


</html>
