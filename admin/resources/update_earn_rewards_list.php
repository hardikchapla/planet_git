<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["earn_rewards_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_earn_rewards 
			WHERE id = '".$_POST["earn_rewards_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["earn_rewards_slug"] = $row["slug"];
			$reoutput["earn_rewards_description"] = $row["description"];
		}
		echo json_encode($reoutput);
	}
?>