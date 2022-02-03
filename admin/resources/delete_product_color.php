<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['product_color_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $product_color_id = intval($_POST['product_color_id']);
		$query = "DELETE FROM phtv_product_color WHERE id= :product_color_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':product_color_id'=>$product_color_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'Product color deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>