<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["phtv_24_7_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_live_tv_24_7_page 
			WHERE id = '".$_POST["phtv_24_7_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["phtv_24_7_id"] = $row["id"];
			$reoutput["phtv_24_7_title"] = $row["title"];
			$reoutput["phtv_24_7_description"] = $row["description"];
			$reoutput["phtv_24_7_thumbnail"] = $row["thumbnail"];
			$reoutput["phtv_24_7_youtube_link"] = $row["youtube_link"];
			$reoutput["phtv_24_7_is_recomended"] = $row["is_recomended"];
			$reoutput["phtv_24_7_length"] = $row["length"];
		}
		echo json_encode($reoutput);
	}
?>