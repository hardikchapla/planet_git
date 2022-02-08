<?php
header('Content-type: application/json; charset=UTF-8');
$response = array();
if ($_POST['product_id']) {
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    $product_id = intval($_POST['product_id']);
    $images = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '$product_id'");
    while ($feimages = $images->fetch(PDO::FETCH_ASSOC)) {
        if (file_exists('../../images/product/' . $feimages['image'])) {
            unlink('../../images/product/' . $feimages['image']);
        }
    }
    $delete_image = $db->query("DELETE FROM phtv_product_images WHERE product_id = '$product_id'");
    $delete_color = $db->query("DELETE FROM phtv_product_multi_color WHERE product_id = '$product_id'");
    $delete_size = $db->query("DELETE FROM phtv_product_multi_size WHERE product_id = '$product_id'");
    $query = "DELETE FROM phtv_product WHERE id= :product_id";
    $stmt = $db->prepare($query);
    $stmt->execute(array(':product_id' => $product_id));
    if ($stmt) {
        $response['success']  = 'success';
        $response['message'] = 'Product deleted successfully';
    } else {
        $response['success']  = 'fail';
        $response['message'] = 'Oops! Something went wrong';
    }
    echo json_encode($response);
}