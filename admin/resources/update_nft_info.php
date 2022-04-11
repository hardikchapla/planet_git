<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["nft_info_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_nft_info 
			WHERE id = '".$_POST["nft_info_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["nft_info_id"] = $row["id"];
			$reoutput["nft_info_image"] = $row["image"];
			$reoutput["selectCollections"] = $row["collection_id"];
			$reoutput["selectCategory"] = $row["category_id"];
			$reoutput["nft_info_name"] = $row["name"];
			$reoutput["nft_info_price"] = $row["price"];
			$reoutput["nft_info_description"] = $row["description"];
			$reoutput["nft_info_sale_id"] = $row["sale_id"];
			$reoutput["nft_info_assets_name"] = $row["assets_name"];
			$reoutput["nft_info_assets_id"] = $row["assets_id"];
			$reoutput["nft_info_meant_no"] = $row["meant_no"];
			$reoutput["nft_info_duration"] = $row["duration"];
			$reoutput["nft_info_attribute_name"] = $row["attribute_name"];
			$reoutput["nft_info_attribute_image"] = $row["attribute_image"];
			$reoutput["nft_info_attribute_bg_image"] = $row["attribute_bg_image"];
			$reoutput["nft_info_attribute_object"] = $row["attribute_object"];
			$reoutput["nft_info_attribute_object_collection"] = $row["attribute_object_collection"];
			$reoutput["nft_info_attribute_object_no"] = $row["attribute_object_no"];
			$reoutput["nft_info_attribute_border_color"] = $row["attribute_border_color"];
			$reoutput["nft_info_attribute_border_type"] = $row["attribute_border_type"];
		}
		echo json_encode($reoutput);
	}
?>