<?php
	if($_GET)
	{	
		$id = $_GET["iddata"];
		//buscar no banco de dados
		include "modelo/conexao.class.php";
		include "modelo/horaDAO.class.php";
		$horaDAO = new horaDAO();
		$dados = $horaDAO->buscarFiltrado($id);
		echo json_encode($dados);
	}
?>