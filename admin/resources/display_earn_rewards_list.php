<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT * FROM phtv_earn_rewards";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $row["slug"];
		$sub_array[] = $row["description"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateEarnRewards" data-toggle="modal" data-target="#updateEarnRewards" type="button" id="'.$row["id"].'"></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>