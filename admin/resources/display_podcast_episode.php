<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT a.*, b.title as podcast_title FROM phtv_podcast_episode a LEFT JOIN phtv_podcast b ON a.podcast_id = b.id";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['mp3_file'])){
			$image = '<img src="../images/podcast_image/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<audio controls style = "border-radius: 40px" width="40" height="40"><source src="horse.ogg" type="audio/ogg"><source src="../images/podcast_mp3/'.$row["mp3_file"].'" type="audio/mpeg"></audio>';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["podcast_title"];
		$sub_array[] = $row["title"];
		$sub_array[] = $row["length"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updatePodcastEpisode" data-toggle="modal" data-target="#updatePodcastEpisode" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deletePodcastEpisode" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>