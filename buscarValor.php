<?php
	if($_GET)
	{	
		$id = $_GET["idrota"];
		//buscar no banco de dados
		include "modelo/conexao.class.php";
		include "modelo/rotaDAO.class.php";
		$valorDAO = new rotaDAO();
		$dados = $valorDAO->buscaValor($id);
		echo json_encode($dados);
	}
?>