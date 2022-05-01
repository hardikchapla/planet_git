<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT a.*, b.name FROM phtv_live_tv_24_7_page a,phtv_live_tv_24_7_category b WHERE a.category_id = b.id";
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
			$image = '<img src="../images/phtv_24_7/'.$row["thumbnail"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
        $sub_array[] = $row["title"];
        $sub_array[] = $row["name"];
        $sub_array[] = $row["youtube_link"];
		if($row['is_recomended'] == 1){
			$sub_array[] = "Yes";
		} else {
			$sub_array[] = "No";
		}
		$sub_array[] = $row["length"];
		$sub_array[] = '<button class="btn btn-primary viewPHTV_24_7_DescriptionModel" data-toggle="modal" data-target="#viewPHTV_24_7_DescriptionModel" type="button" id="'.base64_encode($row["description"]).'">View</button>';
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updatePHTV_24_7" data-toggle="modal" data-target="#updatePHTV_24_7" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deletePHTV_24_7" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>