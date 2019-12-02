<?php




include_once 'conexao.php';


	$html = '<table border=1';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Código do evento</th>';
	$html .= '<th>Tipo do evento</th>';
	$html .= '<th>Data do evento</th>';
	$html .= '<th>Fotografos contratados</th>';
	$html .= '<th>Informações adcionais</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT * FROM tb_eventos";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.$row_transacoes['id_eventos'] . "</td>";
		$html .= '<td>'.$row_transacoes['tipo_evento'] . "</td>";
		$html .= '<td>'.$row_transacoes['data_evento'] . "</td>";
		$html .= '<td>'.$row_transacoes['prof_eventos'] . "</td>";
		$html .= '<td>'.$row_transacoes['descricao_evento'] . "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	
        require_once '../Estudio/dompdf/autoload.inc.php';

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1 style="text-align: center;">Alice - Relatório de Eventos agendados</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_Evento.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>

 