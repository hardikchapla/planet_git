<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['banner_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $banner_id = intval($_POST['banner_id']);
        $banner = $db->query("SELECT * FROM phtv_banner WHERE id = '$banner_id'");
        $febanner = $banner->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_banner WHERE id= :banner_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':banner_id'=>$banner_id));
		if ($stmt) 
		{
            unlink('../../images/banner_image/'.$febanner['image']);
			$response['success']  = 'success';
			$response['message'] = 'Banner deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>