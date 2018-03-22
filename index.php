<?php
    if($_GET)//verificar se recebeu alguma coisa via get - quando clica no link
	{		// demais vezes - Tudo variável para pegar os parâmetros passados
		$controle = $_GET["controle"]; // nome entre aspas é o que está lá no cabec, no link
		$metodo = $_GET["metodo"];
		require_once "controle/".$controle.".class.php"; // deixar variável para abrir qualquer parâmetro que seja passado
		$obj = new $controle(); // cria um objeto de qualquer classe
		$obj->$metodo(); // chamar o método
	}
	else
	{		// primeira vez que está rodando - executa o index mas não passa nenhum parâmetro
	  require_once "controle/inicioControle.class.php"; // chama o início controle com os comandos necessários para começar
	  $ini = new inicioControle(); // objeto
	  $ini->inicio(); // chama a function
	}
?>