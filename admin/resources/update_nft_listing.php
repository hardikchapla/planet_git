<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["nft_listing_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_nft_listing 
			WHERE id = '".$_POST["nft_listing_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["nft_listing_id"] = $row["nft_listing_id"];
			$reoutput["nft_listing_title"] = $row["title"];
			$reoutput["nft_listing_description"] = $row["description"];
			$reoutput["nft_listing_thumbnail"] = $row["thumbnail"];
		}
		echo json_encode($reoutput);
	}
?>