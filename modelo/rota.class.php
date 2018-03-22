<?php
	class rota
	{
		private $idrota;
		private $od;
		private $valor;
		
		function __construct($idrota, $od, $valor)
		{
			$this->idrota = $idrota;
			$this->od = $od;
			$this->valor = $valor;
		}
		function getId()
		{
			return $this->idrota;
		}
		function getOd()
		{
			return $this->od;
		}
		function getValor()
		{
			return $this->valor;
		}
		/*function setEmail($email)
		{
			$this->email=$email;
		}
		function setSenha($senha)
		{
			$this->senha=$senha;
		}*/
	}
?>