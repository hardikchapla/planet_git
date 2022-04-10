<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["nft_logos_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_nft_logos 
			WHERE id = '".$_POST["nft_logos_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["nft_logos_id"] = $row["id"];
			$reoutput["nft_logos_name"] = $row["name"];
			$reoutput["nft_logos_image"] = $row["image"];
		}
		echo json_encode($reoutput);
	}
?>