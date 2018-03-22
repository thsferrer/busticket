<?php
	if(!isset($_SESSION))
		session_start();
	
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/normalize.css" type="text/css"/>
		<link rel="stylesheet" href="css/reset.css" type="text/css"/>
		<link rel="stylesheet" href="css/grid.css" type="text/css"/>
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<link rel="stylesheet" href="css/home.css" type="text/css">
		<link rel="stylesheet" href="css/cadastro.css" type="text/css"/>
		<link rel="stylesheet" href="css/compra.css" type="text/css"/>
		<link rel="stylesheet" href="css/login.css" type="text/css"/>
		<link rel="stylesheet" href="css/passagens.css" type="text/css"/>	
		<link rel="stylesheet" href="css/botao.css" type="text/css"/>
		<link rel="stylesheet" href="css/responsivo.css" type="text/css"/>

		<title>Busticket</title>
	</head>
	<body>
		<header class="header">
			<div class="container">
				<a href="index.php?controle=relatorioControle&metodo=inicio" class="grid-6">
					<img src="css/logo.png" alt="Logotipo do Busticket" title="Logotipo Busticket" id="logo"/>
				</a>

			<nav class="grid-10 header_menu">
				<?php		
					if(isset($_SESSION["login"])) // ver se é interno ou pelo face
					{
							echo"<div>";
							echo "<ul class='topnav'>";
							echo "<li><a href='index.php?controle=relatorioControle&metodo=inicio'>Página inicial</a></li>&nbsp";
							echo "<li><a href='index.php?controle=relatorioControle&metodo=achaPassagem'>Minhas passagens</a></li>&nbsp";
							echo"<li><a href='index.php?controle=relatorioControle&metodo=compra'>Comprar<a/></li>&nbsp";
						
						if($_SESSION["login"] == "interno")
						{
							echo "<li><a href='index.php?controle=relatorioControle&metodo=logout'>Sair</a></li>&nbsp";
						}
							echo "</ul>";
							echo "</div>";		
					}
					if(!isset($_SESSION) ||  @$_SESSION["login"]!= "interno")
					{
							echo"<div>";
							echo "<ul class='topnav'>";
							echo "<li><a href='index.php?controle=relatorioControle&metodo=inicio'>Página inicial</a></li>&nbsp";
							echo"<li><a href='index.php?controle=relatorioControle&metodo=inserirUsuario'>Cadatrar-se<a/></li>&nbsp";
							echo"<li><a href='index.php?controle=relatorioControle&metodo=autenticaru'>Entrar<a/></li>&nbsp";
							echo "</ul>";
							echo"</div>";				
					}		
				?>
			</nav>
		</div>
	</header>	