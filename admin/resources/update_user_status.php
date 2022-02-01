<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

	$user_id = $_REQUEST['user_id'];
    $status = $_REQUEST['status'];
    $check = $db->query("UPDATE phtv_users SET is_active = '$status' WHERE id = '$user_id'");
    if($check){
        $success['success'] = "success";
        $success['message'] = "Status change successfully";
    } else {
        $success['success'] = "fail";
        $success['message'] = "Status not change. please try again later";
    }
    echo json_encode($success);
?>