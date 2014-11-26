<?php

class Helper_Database
{

		private $db;
		

		public function __construct($filename)
		{

			$config = new Helper_Config($filename);


			$user = $config->get("user","database") ;
			$password = $config->get("password","database");
			$name = $config->get("name","database");
			
			
			$this->db = new PDO('mysql:host=localhost;dbname='.$name, $user, $password);
			$this->db->exec("SET NAMES UTF8");
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
		}


		public function query($queryString,$data=array())
		{

			$query = $this->db ->prepare($queryString);
			$query->execute($data);

			$result = $query->fetchAll(PDO::FETCH_ASSOC); //FETCH_NUM
			return $result ;
		}


		public function queryOne($queryString,$data=array())
		{

			$query = $this->db ->prepare($queryString);
			$query->execute($data);

			$result = $query->fetch(PDO::FETCH_ASSOC); 
			return $result ;
		}

		public function execute($queryString,$data=array())
		{

			$query = $this->db ->prepare($queryString);
			$query->execute($data);

			return $this->db->lastInsertId() ;

		}


}