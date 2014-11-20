<?php

/*

Page d’accueil
Url : monsite.com/index.php
Affichage des 5 derniers articles postés : Titre + date + 500 premiers caractères + Miniature si une image est définie + tags + nombre de commentaires
Pagination (possibilité de voir les 5 articles suivant sur l’url monsite.com/index.php?page=2)

*/

	include 'autoload.php';

	$posted = new Model_Post();

	$posts = $posted ->getLatestPosts(5);


	
	// var_dump($posts);

	include "template.phtml";
