<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["user_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_users 
			WHERE id = '".$_POST["user_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["full_name"] = $row["full_name"];
			$reoutput["email"] = $row["email"];
			$reoutput["image"] = $row["image"];
			$reoutput["mobile"] = $row["mobile"];
		}
		echo json_encode($reoutput);
	}
?>