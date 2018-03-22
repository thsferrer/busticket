<?php
	class dataDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscarFiltrado($rota)
		{
			$sql = "SELECT * FROM datap WHERE idrota = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $rota);
				$ret = $stmt->execute();
				if(!$ret)
				{
					die("Erro ao buscar os dados.");
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
		function buscarTodas()
		{
			$sql = "SELECT * FROM datap";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos as datas");
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