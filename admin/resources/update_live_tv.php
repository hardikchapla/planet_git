<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["live_tv_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_live_tv_page 
			WHERE id = '".$_POST["live_tv_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["live_tv_id"] = $row["id"];
			$reoutput["live_tv_title"] = $row["title"];
			$reoutput["live_tv_description"] = $row["description"];
			$reoutput["live_tv_thumbnail"] = $row["thumbnail"];
			$reoutput["live_tv_youtube_link"] = $row["youtube_link"];
			$reoutput["live_tv_is_recomended"] = $row["is_recomended"];
			$reoutput["live_tv_length"] = $row["length"];
		}
		echo json_encode($reoutput);
	}
?>