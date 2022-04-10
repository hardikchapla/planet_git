<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["nft_collection_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_nft_collection 
			WHERE id = '".$_POST["nft_collection_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["nft_collection_logo"] = $row["logo"];
			$reoutput["nft_collection_name"] = $row["name"];
		}
		echo json_encode($reoutput);
	}
?>