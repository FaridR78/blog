<?php

class Model_Member
{

	
	public function verifyUser($name,$password)
	{

			$db = new Helper_Database("config.ini");

			// $query =' SELECT * FROM user WHERE firstname ="'.$name.'" ' ;
			// $query .=' AND password = "'.$password.'"' ;


			$query =' SELECT * FROM user WHERE firstname = ?';
			$query .=' AND password = ?' ;


			$result =	$db -> queryOne($query,array($name,$password));

			echo $query.'<br>' ;

			// echo json_encode($result);
		
			return $result ;

	}







}