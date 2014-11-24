<?php 

// Possibilité de ne pas avoir accès à ce lien en direct 

// $_SESSION["ID"]
// $_SESSION["NAME"]
// $_SESSION["ISADMIN"]

// UPDATE `post` SET `author_id`=3

include 'autoload.php';

if(!isset($_SESSION["ID"]))
{

	header('Location: index.php');
	exit();

}

$author_id = $_SESSION["ID"];

$content = $_POST["content"];

$id_post = $_POST["id"];

$cat_id = "0" ; // a revoir

$post_manager = new Model_Post();

$id = $post_manager ->postComment($author_id,$content,$id_post);


header('Location: post.php?id='.$id_post);