<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
    error_reporting(0);
	$admin_forgot_email = $_REQUEST['admin_forgot_email'];
	$admin_forgot_emails = $db->query("SELECT * FROM phtv_admin WHERE admin_email = '$admin_forgot_email'");
	if($admin_forgot_emails->rowCount() > 0){
        $femaile = $admin_forgot_emails->fetch();
        $Password = $femaile['admin_password'];

        $sendMail = forgotPassword($admin_forgot_email,$Password);

        if($sendMail){
			$success['success'] = "success";
            $success['message'] = "Your Reset Password Link Sent To Your Email";
		}else{
			$success['success'] = "fail";
            $success['message'] = "Please Enter Valid Email";
		}
    } else{
    	$success['success'] = "fail";
        $success['message'] = "Please Enter Valid Email";
    }		
    echo json_encode($success);
?>