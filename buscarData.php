<?php
	if($_GET)
	{	
		$id = $_GET["idrota"];
		//buscar no banco de dados
		include "modelo/conexao.class.php";
		include "modelo/dataDAO.class.php";
		$dataDAO = new dataDAO();
		$dados = $dataDAO->buscarFiltrado($id);
		echo json_encode($dados);
	}
?>