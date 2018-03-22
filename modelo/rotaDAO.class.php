<?php
	class rotaDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscarTodas()
		{
			$sql = "SELECT * FROM rota";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos as rotas");
				}
				else
				{
					$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		}
		
		function buscaValor($id)
		{
			$sql = "SELECT idrota, valor FROM rota WHERE idrota = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $id);
				$ret = $stmt->execute();
				if(!$ret)
				{
					die("Erro ao buscar esta passagem.");
				}
				else
				{
					$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}			
		}
	}
?>