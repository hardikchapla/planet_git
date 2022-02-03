<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT * FROM phtv_product_category";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['category_image'])){
			$image = '<img src="../images/product_category/default.png" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/product_category/'.$row["category_image"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["category_name"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateProductCategory" data-toggle="modal" data-target="#updateProductCategory" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteProductCategory" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>