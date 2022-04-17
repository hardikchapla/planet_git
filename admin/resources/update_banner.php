<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["banner_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_banner 
			WHERE id = '".$_POST["banner_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["selectPage"] = $row["page_id"];
			$reoutput["banner_title"] = $row["title"];
			$reoutput["banner_description"] = $row["description"];
			$reoutput["old_banner_image"] = $row["image"];
			$reoutput["banner_link"] = $row["link"];
			$reoutput["link_type"] = $row["link_type"];
			$reoutput["banner_type"] = $row["banner_type"];
		}
		echo json_encode($reoutput);
	}
?>