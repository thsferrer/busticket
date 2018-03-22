<?php
  include_once "funcao.php";
  class relatorioControle // criar uma classe
  {				
		function inicio()
		{
			require_once "visao/home.php";
		}
		function inserirUsuario() // função para inserir o usuário no BD
		{
			require_once "visao/cadastrarUsuario.php";
			if($_POST)
			{
				$usuario = new usuario(null,$_POST["nome"],$_POST["email"],$_POST["senha"],$_POST["cidade"],$_POST["logradouro"],$_POST["celular"]); 
				$usuarioDAO = new usuarioDAO();
				$usuarioDAO->inserir($usuario); 
				header("location:index.php"); 
			}
		}
		function autenticaru() // função para autenticar o usuário
		{
			 require_once "visao/identificacao.php";					
			 if($_POST)
			 {
				$_SESSION ["login"] = "interno";				
				$usuario = new usuario(null, null, $_POST["email"], $_POST["senha"], null, null, null);
			    $usuarioDAO = new usuarioDAO();
				$ret=$usuarioDAO->autenticar($usuario);
				if(count($ret)>0)
				{					
					$_SESSION["idusuario"]=$ret[0]["idusuario"];
					$_SESSION["nome"]=$ret[0]["nome"];
					$_SESSION["login"] = "interno";
					echo "<script>location.href='index.php?controle=relatorioControle&metodo=compra';</script>";
					//header("location:index.php?controle=relatorioControle&metodo=compra");
				}
				else
				{
					echo "<script>alert('E-mail/senha inválido!')</script>";
					session_destroy();					
				}		  
			}	  
		}
		function logout() // função para fazer logout
		{
			session_start();
			unset($_SESSION["id"]);
			$_SESSION = array();
			session_destroy();
			header('location:index.php?controle=relatorioControle&metodo=inicio');
		}
		function compra() // função que mostra a tela de compra
		{
					$oDAO = new rotaDAO();
					$retorno = $oDAO->buscarTodas();
					$hDAO = new horaDAO();
					$rett = $hDAO->buscarTodas();
					$dataDAO = new dataDAO();
					$ret = $dataDAO->buscarTodas();
					require_once "comprar.php";
		}
		function inserirpassagem() // insere a passagem no BD e chama o botão de compra
		{
			if($_POST)
			{							
				session_start();
				$passagem = new passagem(null,$_SESSION["idusuario"],$_POST["rota"],$_POST["data"],$_POST["horario"],$_POST["quantidade"],$_POST["valor1"]); 
				$passDAO = new passagemDAO();
				$passDAO->inserir($passagem); 
				require_once "botaopaypal.php";	
			}			 
		}
		function achaPassagem()
		{
			session_start();			
			$id = $_SESSION["idusuario"];
			$pDAO = new passagemDAO();
			$ret = $pDAO-> buscar($id); 
			//$ret = $pDAO-> buscarTodas(); 
			require_once"minhaspassagens.php";
		}
		
		function passagem()
		{	
			$id = $_GET["id"];
			$pDAO = new passagemDAO();
			$ret = $pDAO-> buscarPorPassagem($id); 
			require_once "passagem.php"; // página do mPDF
		}
  }
?>