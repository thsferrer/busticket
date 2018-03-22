<?php
	class passagem
	{
		private $idpassagem;
		private $idusuario;
		private $idrota;
		private $iddata;
		private $idhora;
		private $quantidade;
		private $valor_unitario;
		
		function __construct($idpassagem, $idusuario, $idrota, $iddata, $idhora,$quantidade, $valor_unitario)
		{
			$this->idpassagem = $idpassagem;
			$this->idusuario = $idusuario;
			$this->idrota = $idrota;
			$this->iddata = $iddata;
			$this->idhora = $idhora;
			$this->quantidade = $quantidade;
			$this->valor_unitario = $valor_unitario;
		}
		function getIdpassagem()
		{
			return $this->idpassagem;
		}
		function getIdusuario()
		{
			return $this->idusuario;
		}
		function getIdrota()
		{
			return $this->idrota;
		}
		function getIddata()
		{
			return $this->iddata;
		}
		function getIdhora()
		{
			return $this->idhora;
		}
		function getQuantidade()
		{
			return $this->quantidade;
		}
		function getValor_unitario()
		{
			return $this->valor_unitario;
		}
	}
?>