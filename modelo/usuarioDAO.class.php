<?php
	class usuarioDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscarTodos()
		{
			$sql = "SELECT * FROM usuario";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos os usuários");
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
		
		function inserir($usuario)
		{
			$sql = "INSERT INTO usuario(idusuario, nome, email, senha, cidade, logradouro, celular) VALUES(?,?,?,?,?,?,?)";			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $usuario->getId());
				$stmt->bindValue(2, $usuario->getNome());
				$stmt->bindValue(3, $usuario->getEmail());
				$stmt->bindValue(4, $usuario->getSenha());
				$stmt->bindValue(5, $usuario->getCidade());
				$stmt->bindValue(6, $usuario->getLogradouro());
				$stmt->bindValue(7, $usuario->getCelular());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao Inserir Usuário");
				}
				
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
		
		function autenticar($usuario)
		{
			$sql = "SELECT idusuario,nome FROM usuario WHERE email = ? AND senha = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $usuario->getEmail());
				$stmt->bindValue(2, $usuario->getSenha());
				$stmt->execute();			
				$this->db = null;
				$ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
					return $ret;
	
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
	}
?>