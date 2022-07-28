<?php
	include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
	if(isset($_POST["cinema_id"]))
	{
		$reoutput = array();
		$statement = $db->prepare(
			"SELECT * FROM phtv_cinema 
			WHERE id = '".$_POST["cinema_id"]."' LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$reoutput["cinema_poster_file"] = $row["poster"];
			$reoutput["cinema_description"] = $row["description"];
			$reoutput["selectCategory"] = $row["category_id"];
			$reoutput["selectTypes"] = explode(',',$row["cinema_types"]);
			$reoutput["cinema_year"] = $row["year"];
			$reoutput["cinema_age"] = $row["age"];  
			$reoutput["cinema_trailer_link"] = $row["trailer_link"];  
			$reoutput["cinema_total_season"] = $row["total_season"];  
		}
		echo json_encode($reoutput);
	}
?>