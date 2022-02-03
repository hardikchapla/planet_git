<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["product_color_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_product_color 
			WHERE id = '".$_POST["product_color_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["color_code"] = $row["color_code"];
			$reoutput["color_name"] = $row["color_name"];
		}
		echo json_encode($reoutput);
	}
?>