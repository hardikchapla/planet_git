<?php
header('Content-type: application/json; charset=UTF-8');
$response = array();
if ($_POST['product_image_id']) {
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
    $product_image_id = intval($_POST['product_image_id']);
    $get = $db->query("SELECT * FROM phtv_product_images WHERE id = '$product_image_id'");
    $feget = $get->fetch(PDO::FETCH_ASSOC);
    if (file_exists('../../images/product/' . $feget['image'])) {
        unlink('../../images/product/' . $feget['image']);
    }
    $query = "DELETE FROM phtv_product_images WHERE id= :product_image_id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':product_image_id' => $product_image_id));
    if ($stmt) {
        $response['success']  = 'success';
        $response['message'] = 'Product image deleted successfully';
    } else {
        $response['success']  = 'fail';
        $response['message'] = 'Oops! Something went wrong';
    }
    echo json_encode($response);
}