<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT * FROM phtv_nft_info";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(!empty($row['image']) && $row['image_type'] == 'image'){
			$image = '<img src="../images/nft_info_image/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		} elseif (!empty($row['image']) && $row['image_type'] == 'gif') {
			$image = '<img src="../images/nft_info_image/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		} elseif (!empty($row['image']) && $row['image_type'] == 'video') {
			$image = '<video width="100" height="100" controls><source src="../images/nft_info_image/'.$row['image'].'" type="video/mp4"></video>';
		} elseif (!empty($row['image']) && $row['image_type'] == 'audio') {
			$image = '<audio controls poster="../images/planethopper-TV-logo.png"><source src="../images/nft_info_image/'.$row['image'].'" type="audio/mpeg"></audio>';
		} else {
			$image = '<img src="../images/planethopper-TV-logo.png" style="border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row['name'];
		$sub_array[] = $row['price'];
		$sub_array[] = $row['image_type'];
		$sub_array[] = $row['sale_id'];
		$sub_array[] = $row['assets_name'];
		$sub_array[] = $row['assets_id'];
		$sub_array[] = $row['meant_no'];
		$sub_array[] = $row['duration'];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateNFTInfo" data-toggle="modal"
			data-target="#updateNFTInfo" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteNFTInfo" type="button" id="'.$row["id"].'"></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>