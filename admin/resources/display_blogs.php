<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT a.*,b.name,c.category_name FROM phtv_blog a, phtv_blog_auther b, phtv_blog_category c WHERE a.auther_id = b.id AND a.category_id = c.id";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['image']) || $row['type'] == 1){
			$image = '<img src="../images/blog/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/blog/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		if($row['type'] == 1){
			$sub_array[] = "Video";
		} else {
			$sub_array[] = "Image";
		}
		$sub_array[] = $row["title"];
		$sub_array[] = $row["sub_title"];
		$sub_array[] = $row["description"];
		$sub_array[] = $row["name"];
		$sub_array[] = $row["category_name"];
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateBlog" data-toggle="modal" data-target="#updateBlog" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteBlog" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>