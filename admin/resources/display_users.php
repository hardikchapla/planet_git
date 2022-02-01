<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT * FROM phtv_users";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['image'])){
			$image = '<img src="../images/users/default.png" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/users/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["full_name"];
		$sub_array[] = $row["email"];
		$sub_array[] = $row["mobile"];
		$sub_array[] = $row["coin_balance"];
		if($row['is_active'] == 1){
			$sub_array[] = '<select class="form-control changeUserStatus" id="'.$row['id'].'"><option value="1" selected>Active</option><option value="0">De-active</option></select>';
		} else {
			$sub_array[] = '<select class="form-control changeUserStatus" id="'.$row['id'].'"><option value="1">Active</option><option value="0" selected>De-active</option></select>';
		}
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateUser" data-toggle="modal" data-target="#updateUser" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteUser" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>