<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["sponsored_by_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_sponsored_by 
			WHERE id = '".$_POST["sponsored_by_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["sponsored_by_name"] = $row["name"];
			$reoutput["sponsored_by_image"] = $row["image"];
		}
		echo json_encode($reoutput);
	}
?>