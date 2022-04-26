<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["high_voltage_episode_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_voltage_episode 
			WHERE id = '".$_POST["high_voltage_episode_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["high_voltage_episode_title"] = $row["title"];
			$reoutput["high_voltage_episode_image"] = $row["image"];
			$reoutput["high_voltage_episode_video"] = $row["video"];
			$reoutput["high_voltage_episode_video_type"] = $row["video_type"];
			$reoutput["high_voltage_episode_description"] = $row["description"];
			$reoutput["selectCategory"] = $row["category_id"];
			$reoutput["selectTitle"] = $row["voltage_title_id"];
		}
		echo json_encode($reoutput);
	}
?>