<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['high_voltage_episode_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $high_voltage_episode_id = intval($_POST['high_voltage_episode_id']);
        $podcast = $db->query("SELECT * FROM phtv_voltage_episode WHERE id = '$high_voltage_episode_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_voltage_episode WHERE id= :high_voltage_episode_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':high_voltage_episode_id'=>$high_voltage_episode_id));
		if ($stmt) 
		{
            @unlink('../../images/episode_image/'.$fepodcast['image']);
            @unlink('../../images/episode_image/'.$fepodcast['video']);
			$response['success']  = 'success';
			$response['message'] = 'High Voltage Episode deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>