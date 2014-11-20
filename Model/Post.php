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

	public function getLatestPosts($number)
	{

			$db = new Helper_Database("config.ini");

			// $query ='SELECT * FROM post limit '.$number;

			if (!is_int($number))
			{

				$number = 5 ;
			}

			$query ='SELECT *, SUBSTR(content, 1, 500) as content FROM post order by id desc limit '.$number;
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


}