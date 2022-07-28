<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["cinema_episode_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_cinema_episode 
			WHERE id = '".$_POST["cinema_episode_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["cinema_episode_poster_file"] = $row["poster"];
			$reoutput["cinema_episode_title"] = $row["title"];
			$reoutput["cinema_episode_descriptions"] = $row["description"];
			$reoutput["selectCinema"] = $row["cinema_id"];
			$reoutput["cinema_episode_season"] = $row["season"];
			$reoutput["cinema_episode_video_link"] = $row["video_link"];  
			$reoutput["cinema_episode_time"] = $row["time"];  
		}
		echo json_encode($reoutput);
	}
?>