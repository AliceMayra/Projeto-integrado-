<?php

include_once 'conexao.php';

//// pega o ID da URL
//$id = isset($_GET['id_cliente']) ? (int) $_GET['id_cliente'] : null;
// 
//// valida o ID
//if (empty($id))
//{
//    echo "ID para alteração não definido";
//    exit;
//}



	$html = '<table class="table" width="100%" border=1';	
	$html .= '<thead class="thead-dark">';
	$html .= '<tr>';
	$html .= '<th>Código do Cliente</th>';
	$html .= '<th>Nome do cliente</th>';
	$html .= '<th>CPF </th>';
	$html .= '<th>Rua</th>';
	$html .= '<th>Número</th>';
	$html .= '<th>Cidade</th>';
	$html .= '<th>Bairro</th>';
	$html .= '<th>Telefone para contato</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';
	
	$result_transacoes = "SELECT  id_cliente, nome, cpf, rua, numero,cidade, bairro, telefone1 FROM  tb_cliente";
	$resultado_trasacoes = mysqli_query($conn, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.$row_transacoes['id_cliente'] . "</td>";
		$html .= '<td>'.$row_transacoes['nome'] . "</td>";
		$html .= '<td>'.$row_transacoes['cpf'] . "</td>";
		$html .= '<td>'.$row_transacoes['rua'] . "</td>";
		$html .= '<td>'.$row_transacoes['numero'] . "</td>";
		$html .= '<td>'.$row_transacoes['cidade'] . "</td>";
		$html .= '<td>'.$row_transacoes['bairro'] . "</td>";
		$html .= '<td>'.$row_transacoes['telefone1']. "</td></tr>";		
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
			<h1 style="text-align: center;"> Ficha do Cliente</h1>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_Cliente.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

 






?>



