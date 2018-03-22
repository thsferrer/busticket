<?php
	class hora
	{
		private $idhora;
		private $horario;
		private $iddata;
		
		function __construct($idhora, $horario, $iddata)
		{
			$this->idhora = $idhora;
			$this->horario = $horario;
			$this->iddata = $iddata;
		}
		function getId()
		{
			return $this->idhora;
		}
		function getHorario()
		{
			return $this->horario;
		}
		function getIddata()
		{
			return $this->iddata;
		}
	}
?>