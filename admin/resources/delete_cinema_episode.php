<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['cinema_episode_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $cinema_episode_id = intval($_POST['cinema_episode_id']);
        $cinema = $db->query("SELECT * FROM phtv_cinema_episode WHERE id = '$cinema_episode_id'");
        $fecinema = $cinema->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_cinema_episode WHERE id= :cinema_episode_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':cinema_episode_id'=>$cinema_episode_id));
		if ($stmt) 
		{
            unlink('../../images/poster/'.$fecinema['poster']);
			$response['success']  = 'success';
			$response['message'] = 'Cinema episode deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>