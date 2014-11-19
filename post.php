<?php

	spl_autoload_register("my_autoload");


	function my_autoload($class)
	{

		$filepath = str_replace("_","/", $class);

		$filepath.='.php';

		if (file_exists($filepath)) 
		{
   			 require_once($filepath);
		} 
		else 
		{
  			  echo "Le fichier ".$filepath." n'existe pas.";
  			  die;
		}
		
	}


	if (array_key_exists("id",$_GET)== true)

	{

			$posted = new Model_Post();

			$post = $posted ->getPost($_GET["id"]);
		
			
		
	}



	include "post.phtml";

