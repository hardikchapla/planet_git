<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['page_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $page_id = intval($_POST['page_id']);
		$query = "DELETE FROM phtv_pages WHERE id= :page_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':page_id'=>$page_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'Page deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>