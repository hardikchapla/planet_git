<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['blog_category_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $blog_category_id = intval($_POST['blog_category_id']);
		$query = "DELETE FROM phtv_blog_category WHERE id= :blog_category_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':blog_category_id'=>$blog_category_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'Blog category deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>