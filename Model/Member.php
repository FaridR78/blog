<?php

class Model_Member
{

	
	public function verifyUser($email,$password)
	{

			$db = new Helper_Database("config.ini");

			// $query =' SELECT * FROM user WHERE firstname ="'.$name.'" ' ;
			// $query .=' AND password = "'.$password.'"' ;


			$query =' SELECT * FROM user WHERE email = ?';
			$query .=' AND password = ?' ;


			$result =	$db -> queryOne($query,array($email,$password));

			// echo $query.'<br>' ;

			// echo json_encode($result);
		
			return $result ;

	}


	public function createMember($firstname,$lastname,$email,$password,$admin)
	{

		$db = new Helper_Database("config.ini");
		$query = "INSERT INTO user (firstname,lastname,email,password,admin) VALUES (?,?,?,?,?)";
	    $result =	$db -> execute($query,array($firstname,$lastname,$email,$password,$admin));
		return $result;

	}


	public function testMember($email) 
	{

		$db = new Helper_Database("config.ini");
		$query =' SELECT * FROM user WHERE email = ?';
	    $result =	$db -> queryOne($query,array($email));

		return $result;

	}
	

// $query = mysql_query(“SELECT * FROM `users` WHERE ‘$name’ IN (username, email) AND `password` = ‘$pass'”);

// 	SELECT * FROM user
// 	WHERE password = "?"
// 	AND 
// 	( username = ? or email = ?)

}