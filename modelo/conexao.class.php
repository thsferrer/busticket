<?php
	/**
	 * Aчѕes de banco de dados (acesso, validaчуo, etc.)
	 * @autor Original: Janson Lengstorf
	 * @livro:Pro PHP e jQuery
	 * @arquivo modificado
	*/
	abstract class conexao {
		protected $db;
		
		protected function __construct()
		{
			$dsn="mysql:host=localhost;dbname=busticket";
			try
			{
				$this->db = new PDO($dsn, "root", "a7xforever");
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}
		}
	}
?>