<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['live_24_7_category_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $live_24_7_category_id = intval($_POST['live_24_7_category_id']);
		$query = "DELETE FROM phtv_live_tv_24_7_category WHERE id= :live_24_7_category_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':live_24_7_category_id'=>$live_24_7_category_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'Live 24/7 category deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>