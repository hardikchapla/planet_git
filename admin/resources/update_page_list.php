<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["page_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_pages 
			WHERE id = '".$_POST["page_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["page_name"] = $row["page_name"];
			$reoutput["page_slug"] = $row["slug"];
		}
		echo json_encode($reoutput);
	}
?>