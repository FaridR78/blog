<?php

session_start();

	include 'autoload.php';

	$name=$_POST["name"] ;
	$password=$_POST["pass"] ;
	$pass = md5($password) ;

	echo $pass.'<br>';

	$member = new Model_Member();

	$identify = $member ->verifyUser($name,$pass);

/* $identify */

/*
array (size=6)
  'id' => string '1' (length=1)
  'firstname' => string 'bob' (length=3)
  'lastname' => string 'blogee' (length=6)
  'email' => string 'test@yahoo.fr' (length=13)
  'password' => string '9f9d51bc70ef21ca5c14f307980a29d8' (length=32)
  'admin' => string '0' (length=1)
*/


	if ($identify!=false)
	{

		$_SESSION["ID"]=$identify["id"];
		$_SESSION["NAME"]=$identify["firstname"];
		$_SESSION["ISADMIN"]=$identify["admin"];

		// if ($identify["admin"])
		// {
		
		// 	header('Location: admin.php');

		// }


	}
	else
	{

		// include "subscribe.phtml";

	}

	

header('Location: index.php');
