<?php
	class passagemDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscar($id)
		{
			$sql = "SELECT p.idpassagem, r.origem_destino, DATE_FORMAT(d.datap,'%d/%m/%Y') 'data', h.horario, p.quantidade, u.nome  
					FROM passagem p 
					INNER JOIN rota r ON (p.idrota=r.idrota) 
					INNER JOIN usuario u ON (p.idusuario=u.idusuario)
					INNER JOIN datap d ON (p.iddata=d.iddata)
					INNER JOIN hora h ON (p.idhora=h.idhora)
					WHERE p.idusuario = ?
					ORDER BY p.idpassagem DESC";
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
		
		function buscarPorPassagem($id)
		{
			$sql = "SELECT p.idpassagem, r.origem_destino, DATE_FORMAT(d.datap,'%d/%m/%Y') 'datap', h.horario, p.quantidade, u.nome 
					FROM passagem p ,usuario u ,rota r,datap d,hora h
					WHERE p.idpassagem=? AND p.idusuario = u.idusuario AND p.iddata = d.iddata AND p.idhora = h.idhora AND p.idrota = r.idrota";
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
		
		function inserir($passagem)
		{
			$sql = "INSERT INTO passagem(idpassagem, idusuario, idrota, iddata, idhora, quantidade, valor_unitario) VALUES(?,?,?,?,?,?,?)";			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $passagem->getIdpassagem());
				$stmt->bindValue(2, $passagem->getIdusuario());
				$stmt->bindValue(3, $passagem->getIdrota());
				$stmt->bindValue(4, $passagem->getIddata());
				$stmt->bindValue(5, $passagem->getIdrota());
				$stmt->bindValue(6, $passagem->getQuantidade());
				$stmt->bindValue(7, $passagem->getValor_unitario());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao Inserir Passagem");
				}
				
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
		function buscaValor($id)
		{
			$sql = "SELECT p.idpassagem, p.idusuario, p.idrota, p.iddata, p.idhora, p.quantidade, r.valor FROM passagem p INNER JOIN rota r ON (p.idrota=r.idrota) WHERE p.idrota=?";
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
		function buscarTodas()
		{
			$sql = "SELECT p.idpassagem, r.origem_destino, DATE_FORMAT(d.datap,'%d/%m/%Y') 'data', h.horario, p.quantidade, u.nome  
					FROM passagem p 
					INNER JOIN rota r ON (p.idrota=r.idrota) 
					INNER JOIN usuario u ON (p.idusuario=u.idusuario)
					INNER JOIN datap d ON (p.iddata=d.iddata)
					INNER JOIN hora h ON (p.idhora=h.idhora)";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos as passagens");
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