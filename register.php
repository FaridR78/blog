<?php 

// Possibilité de ne pas avoir accès à ce lien en direct 

// $_SESSION["ID"]
// $_SESSION["NAME"]
// $_SESSION["ISADMIN"]

// UPDATE `post` SET `author_id`=3

include 'autoload.php';



if(isset($_SESSION["ID"]))
{

	header('Location: index.php');

}

include 'register.phtml' ;

if(isset($_POST["email"]))
{
	
	$firstname = $_POST["firstname"] ;
	$lastname  = $_POST["lastname"];
	$email     = $_POST["email"];
	$password  = $_POST["password"] ;
	$admin     = 0;
	
	$pass = md5($password) ;

	$post_manager = new Model_Member();

	$results = $post_manager -> testMember($email) ;

	if(isset($results))
	{

		echo '<br>'."email existant dans la database ".'<br>' ;
		echo "merçi de re saisir le formulaire ! ".'<br>' ;

		//header('Location: index.php');

	}
	else
	{

		$post_manager -> createMember($firstname,$lastname,$email,$pass,$admin);

		header('Location: index.php');

	}


}






