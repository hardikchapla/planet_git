<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['nft_listing_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $nft_listing_id = intval($_POST['nft_listing_id']);
        $podcast = $db->query("SELECT * FROM phtv_nft_listing WHERE id = '$nft_listing_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_nft_listing WHERE id= :nft_listing_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':nft_listing_id'=>$nft_listing_id));
		if ($stmt) 
		{
            @unlink('../../images/nft_listing_thumbnail/'.$fepodcast['thumbnail']);
			$response['success']  = 'success';
			$response['message'] = 'Asset Banner deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>