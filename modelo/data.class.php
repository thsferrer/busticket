<?php
	class data
	{
		private $iddata;
		private $datap;
		private $idrota;
		
		function __construct($iddata, $datap, $idrota)
		{
			$this->iddata = $iddata;
			$this->datap = $datap;
			$this->idrota = $idrota;
		}
		function getId()
		{
			return $this->iddata;
		}
		function getDatap()
		{
			return $this->datap;
		}
		function getIdrota()
		{
			return $this->idrota;
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