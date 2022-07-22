<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT * FROM phtv_cinema_categories";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $row["name"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateCinemaCategories" data-toggle="modal" data-target="#updateCinemaCategories" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteCinemaCategories" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>