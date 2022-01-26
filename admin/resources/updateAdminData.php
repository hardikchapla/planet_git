<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
    // error_reporting(0);
    if(!empty($_FILES['admin_avatar']['name'])){
        $file = $_FILES['admin_avatar']['name'];
        $tmp = $_FILES['admin_avatar']['tmp_name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $admin_avatar = rand(1000,1000000).$file; 
        $path = '../../images/'.$admin_avatar;
        move_uploaded_file($tmp,$path);
        if(!empty($_REQUEST['old_admin_avatar'])){
            unlink('../../images/'.$_REQUEST['old_admin_avatar']);
        }
    } else {
        $admin_avatar = $_REQUEST['old_admin_avatar'];
    }
	$admin_name = $_REQUEST['admin_name'];
    $admin_email = $_REQUEST['admin_email'];
    $admin_phone_number = $_REQUEST['admin_phone_number'];
    $update = $db->query("UPDATE phtv_admin SET admin_avatar = '$admin_avatar',admin_name = '$admin_name',admin_email = '$admin_email',admin_phone_number = '$admin_phone_number' WHERE id = 1");	
    if($update){
        $success['success'] = "success";
        $success['message'] = "Admin data updated successfully";
    }else{
        $success['success'] = "fail";
        $success['message'] = "Admin data not updated";
    }
    echo json_encode($success);
?>