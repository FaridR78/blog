<?php


include 'autoload.php';


	$id =$_GET['id'];

	$posted = new Model_Post();

	$posted ->deletePost($id);

	
header('Location: index.php');
