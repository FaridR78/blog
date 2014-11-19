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

			$query ='SELECT *, SUBSTR(content, 1, 500) as content FROM post limit '.$number;
			$result =	$db -> query($query);

			// echo json_encode($result);
		

			return $result ;



	}
	
	


}