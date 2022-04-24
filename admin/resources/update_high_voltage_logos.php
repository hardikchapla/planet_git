<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["high_voltage_logos_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_voltage_logo 
			WHERE id = '".$_POST["high_voltage_logos_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["high_voltage_logos_id"] = $row["id"];
			$reoutput["high_voltage_logos_name"] = $row["name"];
			$reoutput["high_voltage_logos_image"] = $row["image"];
		}
		echo json_encode($reoutput);
	}
?>