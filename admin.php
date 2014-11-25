<?php 

// Possibilité de ne pas avoir accès à ce lien en direct 

// $_SESSION["ID"]
// $_SESSION["NAME"]
// $_SESSION["ISADMIN"]

// UPDATE `post` SET `author_id`=3

include 'autoload.php';

$post_manager = new Model_Post();

if(!isset($_SESSION["ID"]))
{

	header('Location: index.php');

}

include 'admin.phtml' ;


