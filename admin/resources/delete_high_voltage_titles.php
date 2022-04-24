<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['high_voltage_titles_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $high_voltage_titles_id = intval($_POST['high_voltage_titles_id']);
		$query = "DELETE FROM phtv_voltage_title WHERE id= :high_voltage_titles_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':high_voltage_titles_id'=>$high_voltage_titles_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'High voltage title deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>