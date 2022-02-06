<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['product_size_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $product_size_id = intval($_POST['product_size_id']);
		$query = "DELETE FROM phtv_product_size WHERE id= :product_size_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':product_size_id'=>$product_size_id));
		if ($stmt) 
		{
			$response['success']  = 'success';
			$response['message'] = 'Product size deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>