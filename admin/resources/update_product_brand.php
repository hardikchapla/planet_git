<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["product_brand_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_product_brand 
			WHERE id = '".$_POST["product_brand_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["product_brand_name"] = $row["name"];
			$reoutput["product_brand_image"] = $row["logo"];
		}
		echo json_encode($reoutput);
	}
?>