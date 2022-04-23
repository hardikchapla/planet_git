<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['phtv_24_7_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $phtv_24_7_id = intval($_POST['phtv_24_7_id']);
        $podcast = $db->query("SELECT * FROM phtv_live_tv_24_7_page WHERE id = '$phtv_24_7_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_live_tv_24_7_page WHERE id= :phtv_24_7_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':phtv_24_7_id'=>$phtv_24_7_id));
		if ($stmt) 
		{
            unlink('../../images/phtv_24_7/'.$fepodcast['thumbnail']);
			$response['success']  = 'success';
			$response['message'] = 'PHTV 24/7 Link deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>