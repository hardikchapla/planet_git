<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["blog_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_blog 
			WHERE id = '".$_POST["blog_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["blog_type"] = $row["type"];
			$reoutput["blog_title"] = $row["title"];
			$reoutput["blog_sub_title"] = $row["sub_title"];
			$reoutput["blog_description"] = $row["description"];
			$reoutput["blog_image"] = $row["image"];
			$reoutput["auther_id"] = $row["auther_id"];
			$reoutput["category_id"] = $row["category_id"];
		}
		echo json_encode($reoutput);
	}
?>