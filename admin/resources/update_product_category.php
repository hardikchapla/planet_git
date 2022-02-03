<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["product_category_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_product_category 
			WHERE id = '".$_POST["product_category_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["category_name"] = $row["category_name"];
			$reoutput["category_image"] = $row["category_image"];
		}
		echo json_encode($reoutput);
	}
?>