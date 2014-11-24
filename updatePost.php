<?php

	

	include 'autoload.php';

	$post_manager = new Model_Post();



	if(isset($_POST['subject']) && isset($_POST['content']))
	{

		$content = $_POST['content'] ;
		$title   = $_POST['subject'] ;
		$id_post = $_POST['id'];
		
		$picture = $_FILES['picture'];
		
		if(isset($_POST['delpic']))
		{

			$delpic  = true;

		}
	    else
	    {
	    	$delpic = false;

	    }

		$pic_name = $picture["name"];
		$dir_name = $picture["tmp_name"];

		//var_dump($picture);

		$post_manager -> UpdatePost($id_post,$content,$title,$pic_name,$dir_name,$delpic) ;

		header('Location: post.php?id='.$id_post);

		// header('Location: index.php');

	}

	else
	{

		$id_post = $_GET['id'];
		$post = $post_manager ->getPost($id_post);

		//var_dump($post);

		include 'update.phtml';


	}

	
	

