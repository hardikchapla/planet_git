<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['podcast_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $podcast_id = intval($_POST['podcast_id']);
        $podcast = $db->query("SELECT * FROM phtv_podcast WHERE id = '$podcast_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_podcast WHERE id= :podcast_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':podcast_id'=>$podcast_id));
		if ($stmt) 
		{
            unlink('../../images/podcast_image/'.$fepodcast['image']);
			$response['success']  = 'success';
			$response['message'] = 'Podcast deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>