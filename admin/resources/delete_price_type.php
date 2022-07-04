<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['price_type_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $price_type_id = intval($_POST['price_type_id']);
		$query = "DELETE FROM phtv_price_type WHERE id= :price_type_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':price_type_id'=>$price_type_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'Asset type deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>