<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['high_voltage_logos_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $high_voltage_logos_id = intval($_POST['high_voltage_logos_id']);
        $podcast = $db->query("SELECT * FROM phtv_voltage_logo WHERE id = '$high_voltage_logos_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_voltage_logo WHERE id= :high_voltage_logos_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':high_voltage_logos_id'=>$high_voltage_logos_id));
		if ($stmt) 
		{
            @unlink('../../images/high_voltage_logos/'.$fepodcast['image']);
			$response['success']  = 'success';
			$response['message'] = 'High Voltage Logos deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>