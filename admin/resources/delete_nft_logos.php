<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['nft_logos_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $nft_logos_id = intval($_POST['nft_logos_id']);
        $podcast = $db->query("SELECT * FROM phtv_nft_logos WHERE id = '$nft_logos_id'");
        $fepodcast = $podcast->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_nft_logos WHERE id= :nft_logos_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':nft_logos_id'=>$nft_logos_id));
		if ($stmt) 
		{
            @unlink('../../images/nft_logos/'.$fepodcast['image']);
			$response['success']  = 'success';
			$response['message'] = 'NFT Logos deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>