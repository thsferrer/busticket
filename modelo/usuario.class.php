<?php
	class usuario
	{
		private $idUsuario;
		private $nome;
		private $email;
		private $senha;
		private $cidade;
		private $logradouro;
		private $celular;
		
		function __construct($id, $nome, $email, $senha, $cidade, $logradouro, $cel)
		{
			$this->idUsuario = $id;
			$this->nome = $nome;
			$this->email = $email;
			$this->senha = $senha;
			$this->cidade = $cidade;
			$this->logradouro = $logradouro;
			$this->celular = $cel;
		}
		function getId()
		{
			return $this->idUsuario;
		}
		function getNome()
		{
			return $this->nome;
		}
		function getEmail()
		{
			return $this->email;
		}
		function getSenha()
		{
			return $this->senha;
		}
		function getCidade()
		{
			return $this->cidade;
		}
		function getLogradouro()
		{
			return $this->logradouro;
		}
		function getCelular()
		{
			return $this->celular;
		}
		function setEmail($email)
		{
			$this->email=$email;
		}
		function setSenha($senha)
		{
			$this->senha=$senha;
		}
	}
?>