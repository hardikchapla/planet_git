<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['user_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $user_id = intval($_POST['user_id']);
		$query = "DELETE FROM phtv_users WHERE id= :user_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':user_id'=>$user_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'User deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>