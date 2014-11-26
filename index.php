<?php

/*

Page d’accueil
Url : monsite.com/index.php
Affichage des 5 derniers articles postés : Titre + date + 500 premiers caractères + Miniature si une image est définie + tags + nombre de commentaires
Pagination (possibilité de voir les 5 articles suivant sur l’url monsite.com/index.php?page=2)

*/

	include 'autoload.php';

	if(isset($_GET['page']))
	{
		
		$page = $_GET["page"] ;

	}
	else
	{

		$page = 1;

	}


	$nbpost_page = 5;

	$offset = ($page-1)*$nbpost_page;

	$posted = new Model_Post();

	$posts = $posted ->getLatestPosts($offset,$nbpost_page);

	$total_post = $posted ->totalPost();

	$nbpage = ceil($total_post/$nbpost_page);


	include "template.phtml";
