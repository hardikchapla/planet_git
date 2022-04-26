<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT a.*,b.name,c.category_name FROM phtv_voltage_episode a, phtv_voltage_title b, phtv_voltage_category c WHERE a.category_id = b.id AND a.voltage_title_id = c.id";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['image'])){
			$image = '<img src="../images/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/episode_image/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		if($row['video_type'] == 1){
			$sub_array[] = "Video";
		} else {
			$sub_array[] = "Link";
		}
		$sub_array[] = $row["title"];
		$sub_array[] = $row["name"];
		$sub_array[] = $row["category_name"];
		$sub_array[] = '<button class="btn btn-primary viewHighVoltageEpisodeDescriptionModel" data-toggle="modal" data-target="#viewHighVoltageEpisodeDescriptionModel" type="button" id="'.base64_encode($row["description"]).'">View</button>';
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateHighVoltageEpisode" data-toggle="modal" data-target="#updateHighVoltageEpisode" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteHighVoltageEpisode" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>