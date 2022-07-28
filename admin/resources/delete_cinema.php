<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['cinema_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $cinema_id = intval($_POST['cinema_id']);
        $cinema = $db->query("SELECT * FROM phtv_cinema WHERE id = '$cinema_id'");
        $fecinema = $cinema->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_cinema WHERE id= :cinema_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':cinema_id'=>$cinema_id));
		if ($stmt) 
		{
            unlink('../../images/poster/'.$fecinema['poster']);
			$response['success']  = 'success';
			$response['message'] = 'Cinema deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>