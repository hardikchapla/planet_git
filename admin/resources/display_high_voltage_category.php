<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT * FROM phtv_voltage_category";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $row["category_name"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateHighVoltageCategory" data-toggle="modal" data-target="#updateHighVoltageCategory" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteHighVoltageCategory" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>