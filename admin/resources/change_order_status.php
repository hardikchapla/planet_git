<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    $order_id = $_REQUEST['order_id'];
    $status = $_REQUEST['status'];

    $update = $db->query("UPDATE phtv_product_order SET status = '$status' WHERE id = '$order_id'");	
    if($update){
        $success['success'] = "success";
        $success['message'] = "Order status changed successfully";
    }else{
        $success['success'] = "fail";
        $success['message'] = "Order status has been not change";
    }
    echo json_encode($success);

?>