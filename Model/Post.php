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

	
	public function createPost($author_id,$cat_id,$content,$title,$picture)
	{

		$db = new Helper_Database("config.ini");


		$query = "INSERT INTO post (author_id,cat_id,content,title,photo)
			      VALUES (?,?,?,?,?)";

	    $result =	$db -> execute($query,array($author_id,$cat_id,$content,$title,$picture));



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

	

	public function getComments($id)
	{

		$db = new Helper_Database("config.ini");

		$query = "SELECT * FROM `comment` WHERE id_post = ?" ;

		$result =	$db -> query($query,array($id));

		// var_dump($result);
		
		return $result;

	}

	public function gettotalComments($id)
	{

		$db = new Helper_Database("config.ini");

		$query = "SELECT COUNT(*) AS nbcomments FROM `comment` WHERE id_post = ?" ;

		$result =	$db -> queryOne($query,array($id));

		return $result["nbcomments"];

	}

	public function postComment($author_id,$comment,$id_post)
	{

		$db = new Helper_Database("config.ini");

		$query = "INSERT INTO comment (author_id,comment,id_post)
			      VALUES (?,?,?)";

		$result =	$db -> execute($query,array($author_id,$comment,$id_post));

	}


	public function UpdatePost($id_post,$content,$title,$pic_name,$dir_name,$delpic)


	{


		$db = new Helper_Database("config.ini");

		if (($pic_name=="") && (!$delpic))
		{


		$query = "UPDATE post SET content=? , title=? , date_update=CURRENT_TIMESTAMP WHERE id =? limit 1";
		
	    $result =	$db -> execute($query,array($content,$title,$id_post));

		}


		if (strlen($pic_name)!=0)
		{

		$query = "UPDATE post SET content=? , title=? , photo=? , date_update=CURRENT_TIMESTAMP WHERE id =? limit 1";
		
	    $result =	$db -> execute($query,array($content,$title,$pic_name,$id_post));

	    $dir = "images/".$pic_name;

		move_uploaded_file($dir_name, $dir); 

		}

		if ($delpic)
		{

		$pic_name="";
		$query = "UPDATE post SET content=? , title=? , photo=? , date_update=CURRENT_TIMESTAMP WHERE id =? limit 1";
	    $result =	$db -> execute($query,array($content,$title,$pic_name,$id_post));

		}


	    return ;

	}


	public function getTags($id_post)
	{

		$db = new Helper_Database("config.ini");

		$query = "SELECT * FROM `tags` WHERE id_post = ?" ;

		$result =	$db -> query($query,array($id_post));

		return $result ;
	
	}


	public function UpdateTags($id_post,$tags)
	{

		$db = new Helper_Database("config.ini");



		$query = "UPDATE tags SET tag=?  WHERE id_post =? limit 1";
	    $result =	$db -> execute($query,array($tags,$id_post));

	}

	public function createTags($id_post,$tags)
	{


		$db = new Helper_Database("config.ini");

		$tag = explode(",", $tags);

		$nbelem = sizeof($tag);


		for ($i=0; $i<$nbelem; $i++) {

			$tabi = $tag[$i];

			echo 'tag '.$tabi.' ajouté '.'<br>' ;

    		$query = "INSERT INTO tags (id_post,tag) VALUES (?,?)";

			$result =	$db -> execute($query,array($id_post,$tabi));
    				
		}

		

	}

	public function delTags($id_post)
	{

		$db = new Helper_Database("config.ini");
		$query = "DELETE FROM tags WHERE id_post =? ";
	    $result =	$db -> execute($query,array($id_post));

	}

	public function getCategory()
	{

		$db = new Helper_Database("config.ini");
		$query = "SELECT name,id FROM category order by id";
	    $result =	$db -> query($query);
		return $result;

	}




}