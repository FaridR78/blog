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



$title = $_POST["subject"];

$content = $_POST["content"];

$author_id = $_SESSION["ID"];

$tags = $_POST["tags"];

$cat_id = "0" ; // a revoir

$picture = $_FILES["picture"];



$create = new Model_Post();

$id = $create ->createPost($author_id,$cat_id,$content,$title,$picture["name"]);


/* creation des tags en fonction du numero du post */

$create ->createTags($id,$tags);

/* upload fichier image */

$dir = "images/".$picture["name"];

move_uploaded_file($picture["tmp_name"], $dir); 


//header('Location: post.php?id='.$id);

