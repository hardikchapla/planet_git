<?php
	include('../../inc/connection/connection.php');
	$reoutput = array();
	$query = "SELECT a.*, b.page_name FROM phtv_banner a, phtv_pages b WHERE a.page_id = b.id";
	$statement = $db->query($query);
	$result = $statement->fetchAll();
	$data = array();
	$i = 1;
	foreach($result as $row)
	{
		$image = "";	
		if(empty($row['image'])){
			$image = '<img src="../images/default.svg" style = "border-radius: 40px" width="40" height="40" />';
		} else {
			$image = '<img src="../images/banner_image/'.$row["image"].'" style = "border-radius: 40px" width="40" height="40" />';
		}
		$sub_array = array();
		$sub_array[] = $i;
		$sub_array[] = $image;
		$sub_array[] = $row["page_name"];
		$sub_array[] = $row["title"];
		$sub_array[] = $row["description"];
		$sub_array[] = $row["link"];
        if($row['link_type'] == 1){
            $sub_array[] = "Image";
        } elseif ($row['link_type'] == 2) {
            $sub_array[] = "Video";
        } elseif ($row['link_type'] == 3) {
            $sub_array[] = "PDF";
        } else {
            $sub_array[] = "URL";
        }
        if($row['banner_type'] == 1){
            $sub_array[] = "Header";
        } else {
            $sub_array[] = "Footer";
        }
		$sub_array[] = '<button class="btn btn-primary fa fa-pencil updateBanner" data-toggle="modal" data-target="#updateBanner" type="button" id="'.$row["id"].'"></button>';
		$sub_array[] = '<button class="btn btn-danger fa fa-trash deleteBanner" type="button" id="'.$row["id"].'" ></button>';
		$data[] = $sub_array;
		$i++;
	}
	$reoutput = array(
		"data"=>$data
	);
	echo json_encode($reoutput);
?>