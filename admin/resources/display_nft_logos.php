<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT * FROM phtv_nft_logos";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['thumbnail'])){
			$image = '<img src="../images/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/nft_logos/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["name"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateNFTLogos" data-toggle="modal" data-target="#updateNFTLogos" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteNFTLogos" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>