<?php
	include('../../inc/connection/connection.php');
error_reporting(0);
	$reoutput = array();
	$query = "SELECT a.*,b.name as category_name FROM phtv_cinema a, phtv_cinema_categories b WHERE a.category_id = b.id";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
        $types = $db->query('SELECT GROUP_CONCAT(name) as types FROM phtv_cinema_types WHERE id IN ('.$row['cinema_types'].')');
        $fetypes = $types->fetch(PDO::FETCH_ASSOC);
		$image = "";	
		if(empty($row['poster'])){
			$image = '<img src="../images/poster/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/poster/'.$row["poster"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["name"];
		$sub_array[] = $row["category_name"];
		$sub_array[] = $fetypes["types"];
		$sub_array[] = $row["year"];
		$sub_array[] = $row["age"];
		$sub_array[] = $row["total_season"];
		$sub_array[] = '<button class="btn btn-primary viewCinemaDescriptionModel" data-toggle="modal" data-target="#viewCinemaDescriptionModel" type="button" id="'.$row["description"].'">View</button>';
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateCinema" data-toggle="modal" data-target="#updateCinema" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteCinema" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>