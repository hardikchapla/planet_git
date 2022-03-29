<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT a.*, b.name as blog_auther FROM phtv_podcast a LEFT JOIN phtv_blog_auther b ON a.auther_id = b.id";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['image'])){
			$image = '<img src="../images/podcast_image/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/podcast_image/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["title"];
		$sub_array[] = $row["blog_auther"];
		$sub_array[] = $row["description"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updatePodcast" data-toggle="modal" data-target="#updatePodcast" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deletePodcast" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>