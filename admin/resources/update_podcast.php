<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["podcast_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_podcast 
			WHERE id = '".$_POST["podcast_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["podcast_title"] = $row["title"];
			$reoutput["podcast_image"] = $row["image"];
			$reoutput["auther_id"] = $row["hosts_id"];
			$reoutput["created_by_id"] = $row["created_by_id"];
			$reoutput["sponsored_by_id"] = $row["sponsored_by_id"];
			$reoutput["podcast_description"] = $row["description"];
			$reoutput["podcast_fb_link"] = $row["fb_link"];
			$reoutput["podcast_twiter_link"] = $row["twiter_link"];
			$reoutput["podcast_google_link"] = $row["google_link"];
			$reoutput["podcast_insta_link"] = $row["insta_link"];
		}
		echo json_encode($reoutput);
	}
?>