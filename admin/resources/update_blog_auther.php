<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["blog_auther_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_blog_auther 
			WHERE id = '".$_POST["blog_auther_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["blog_auther_name"] = $row["name"];
			$reoutput["blog_auther_image"] = $row["image"];
		}
		echo json_encode($reoutput);
	}
?>