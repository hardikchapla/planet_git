<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['sponsored_by_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $sponsored_by_id = intval($_POST['sponsored_by_id']);
        $blog = $db->query("SELECT * FROM phtv_sponsored_by WHERE id = '$sponsored_by_id'");
        $feblog = $blog->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_sponsored_by WHERE id= :sponsored_by_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':sponsored_by_id'=>$sponsored_by_id));
		if ($stmt) 
		{
            unlink('../../images/sponsored_by/'.$feblog['image']);
			$response['success']  = 'success';
			$response['message'] = 'Sponsored By deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>