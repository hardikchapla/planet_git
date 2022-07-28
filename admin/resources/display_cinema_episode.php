<?php
	include('../../inc/connection/connection.php');
error_reporting(0);
	$reoutput = array();
	$query = "SELECT a.*,b.name as cinema_name FROM phtv_cinema_episode a, phtv_cinema b WHERE a.cinema_id = b.id";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['poster'])){
			$image = '<img src="../images/poster/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/poster/'.$row["poster"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["cinema_name"];
		$sub_array[] = $row["title"];
		$sub_array[] = $row["season"];
		$sub_array[] = $row["time"];
		$sub_array[] = '<button class="btn btn-primary viewCinemaEpisodeDescriptionModel" data-toggle="modal" data-target="#viewCinemaEpisodeDescriptionModel" type="button" id="'.$row["description"].'">View</button>';
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateCinemaEpisode" data-toggle="modal" data-target="#updateCinemaEpisode" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteCinemaEpisode" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>