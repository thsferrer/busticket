<?php 
	require_once "mpdf60/mpdf.php"; // incluir a biblioteca do mpdf
		if(count($ret > 0))
		{
			$html = "
				<h1 id='passagem1'>Busticket</h1>
				<br/><h2 id='passagem2'>Dados da passagem</h2>
				<table border='1' id='tabela'>
				<tr>
				<td>Cidade de origem/destino</td>
				<td>Data</td>
				<td>Horário</td>
				<td>Quantidade</td>
				<td>Passageiro(a)</td>
				</tr>";
					$html= $html ."<tr><th>{$ret[0]->origem_destino}</th>
					<th>{$ret[0]->datap}</th>
					<th>{$ret[0]->horario}</th>
					<th>{$ret[0]->quantidade}</th>
					<th>{$ret[0]->nome}</th></tr>";
					$html = $html . "</table><br/>";
				// QR Code
				$html = $html . "<img src='https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl={$ret[0]->idpassagem}' id='qrcode'>";
				$mpdf=new mPDF(); // instancia a classe mpdf (parâmetros: qual tipo da folha, margem...)
				$mpdf->SetDisplayMode('fullpage'); // página completa
				$css = file_get_contents("css/css.css"); // pegando o conteúdo de css 
				$mpdf->WriteHTML($css,1); // passa o css				
				$mpdf->WriteHTML($html); // dá write no html
				$mpdf->Output(); // igual do fpdf, dessa forma ele já abre direto no navegador o pdf
				// se quiser que salve: $mpdf->Output('../relatorios/itens.pdf', 'F');
		}
				
      
?>