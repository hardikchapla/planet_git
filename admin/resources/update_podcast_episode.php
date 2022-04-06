<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["podcast_episode_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_podcast_episode 
			WHERE id = '".$_POST["podcast_episode_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["podcast_id"] = $row["podcast_id"];
			$reoutput["podcast_episode_title"] = $row["title"];
			$reoutput["podcast_episode_file"] = $row["mp3_file"];
		}
		echo json_encode($reoutput);
	}
?>