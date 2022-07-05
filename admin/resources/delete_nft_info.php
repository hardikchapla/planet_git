<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['nft_info_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $nft_info_id = intval($_POST['nft_info_id']);
        $podcast = $db->query("SELECT * FROM phtv_nft_info WHERE id = '$nft_info_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_nft_info WHERE id= :nft_info_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':nft_info_id'=>$nft_info_id));
		if ($stmt) 
		{
            @unlink('../../images/nft_info_image/'.$fepodcast['image']);
			$response['success']  = 'success';
			$response['message'] = 'Asset Listing deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>