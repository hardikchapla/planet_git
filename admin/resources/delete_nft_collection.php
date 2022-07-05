<?php
header('Content-type: application/json; charset=UTF-8');
$response = array();
if ($_POST['nft_collection_id']) {
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
    $nft_collection_id = intval($_POST['nft_collection_id']);
    $get = $db->query("SELECT * FROM phtv_nft_collection WHERE id = '$nft_collection_id'");
    $feget = $get->fetch(PDO::FETCH_ASSOC);
    if (file_exists('../../images/nft_collection/' . $feget['image'])) {
        unlink('../../images/nft_collection/' . $feget['image']);
    }
    $query = "DELETE FROM phtv_nft_collection WHERE id= :nft_collection_id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':nft_collection_id' => $nft_collection_id));
    if ($stmt) {
        $response['success']  = 'success';
        $response['message'] = 'Asset Collection deleted successfully';
    } else {
        $response['success']  = 'fail';
        $response['message'] = 'Oops! Something went wrong';
    }
    echo json_encode($response);
}