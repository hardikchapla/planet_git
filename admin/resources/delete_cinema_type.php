<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['cinema_type_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $cinema_type_id = intval($_POST['cinema_type_id']);
		$query = "DELETE FROM phtv_cinema_types WHERE id= :cinema_type_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':cinema_type_id'=>$cinema_type_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'Cinema type deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>