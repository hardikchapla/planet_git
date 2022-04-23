<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['live_tv_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $live_tv_id = intval($_POST['live_tv_id']);
        $podcast = $db->query("SELECT * FROM phtv_live_tv_page WHERE id = '$live_tv_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_live_tv_page WHERE id= :live_tv_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':live_tv_id'=>$live_tv_id));
		if ($stmt) 
		{
            unlink('../../images/live_tv/'.$fepodcast['thumbnail']);
			$response['success']  = 'success';
			$response['message'] = 'Live TV Link deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>