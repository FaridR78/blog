<?php

class Model_Post
{

	public function getPost($id)
	{
		

			$db = new Helper_Database("config.ini");

			
			$query ='select * from post where id =?';


			$result =	$db -> queryOne($query,array($id));

			// echo json_encode($result);

			return $result ;
		
	}

	public function getLatestPosts($offset,$count)
	{

			$db = new Helper_Database("config.ini");

			// $query ='SELECT * FROM post limit '.$number;

			if (!is_int($count))
			{

				$count = 5 ;


			}

			if (!is_int($offset))
			{

				$offset = 0 ;

			
			}

			$query ='SELECT *, SUBSTR(content, 1, 500) as content FROM post order by id desc limit '.$offset.', '.$count;
			$result =	$db -> query($query);

			// echo json_encode($result);
		
			return $result ;

	}

	public function getAuthor($id)
	{
		

			$db = new Helper_Database("config.ini");

			$query ='SELECT firstname,lastname FROM user INNER JOIN post WHERE user.id = author_id AND author_id = ?';
	
			$result =	$db -> queryOne($query,array($id));

			// echo json_encode($result);

			return $result ;
		
	}

	
	public function createPost($author_id,$cat_id,$content,$title)
	{

		$db = new Helper_Database("config.ini");

		$query = "INSERT INTO post (author_id,cat_id,content,title)
			      VALUES (?,?,?,?)";

	    $result =	$db -> execute($query,array($author_id,$cat_id,$content,$title));

	    return $result;

	}

	public function totalPost()
	{

		$db = new Helper_Database("config.ini");

		$query ='SELECT COUNT(*) AS nbpost FROM post  ';
		
		$result = $db -> queryOne($query);

		return $result["nbpost"];
	
	}

	public function deletePost($id)
	{

		
		$db = new Helper_Database("config.ini");
		$query ='DELETE from post where id = ? limit 1';

		$result =	$db -> execute($query,array($id));


	}

	public function postComment($id)
	{

		$db = new Helper_Database("config.ini");

		$query = "INSERT INTO comment (author_id,comment,id,id_post)
			      VALUES (?,?,?,?)";

		$result =	$db -> execute($query,array($author_id,$comment,$id,$id_post));




	}

	public function getComments($id)
	{

		$db = new Helper_Database("config.ini");

		$query = "SELECT * FROM `comment` WHERE id_post = ?" ;

		$result =	$db -> query($query,array($id));

		//var_dump($result);
		
		return $result;

	}

	public function gettotalComments($id)
	{

		$db = new Helper_Database("config.ini");

		$query = "SELECT COUNT(*) AS nbcomments FROM `comment` WHERE id_post = ?" ;

		$result =	$db -> queryOne($query,array($id));

		return $result["nbcomments"];

	}





}