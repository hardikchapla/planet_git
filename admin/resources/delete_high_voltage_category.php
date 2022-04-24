<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['high_voltage_category_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $high_voltage_category_id = intval($_POST['high_voltage_category_id']);
		$query = "DELETE FROM phtv_voltage_category WHERE id= :high_voltage_category_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':high_voltage_category_id'=>$high_voltage_category_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'High voltage category deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>