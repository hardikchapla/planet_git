<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['podcast_episode_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $podcast_episode_id = intval($_POST['podcast_episode_id']);
        $podcast = $db->query("SELECT * FROM phtv_podcast_episode WHERE id = '$podcast_episode_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_podcast_episode WHERE id= :podcast_episode_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':podcast_episode_id'=>$podcast_episode_id));
		if ($stmt) 
		{
            unlink('../../images/podcast_mp3/'.$fepodcast['mp3_file']);
			$response['success']  = 'success';
			$response['message'] = 'Podcast deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>