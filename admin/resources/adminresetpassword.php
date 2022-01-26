<?php
	include '../../inc/connection/connection.php';
	require_once '../../inc/helper/constant.php';
	require_once '../../inc/helper/core_function.php';
 	$Email = $_REQUEST['Email'];
 	$Password = $_REQUEST['Password'];
 	$New_Password = md5($_REQUEST['New_Password']);
 	$confirm_password = md5($_REQUEST['confirm_password']);

 	if($New_Password != $confirm_password){
 		$output['success'] = "fail";
		$output['message'] = "New password and confirm password are not same";
 	} else{
		$seladmin = $db->query("SELECT * FROM phtv_admin WHERE admin_email = '$Email' AND admin_password = '$Password'");
		if($seladmin->rowCount() > 0){
			$update = $db->query("UPDATE phtv_admin SET admin_password = '$New_Password' WHERE admin_email = '$Email'");
			if($update){
				$output['success'] = "success";
				$output['message'] = "Password has been successfully changed";
			} else{
				$output['success'] = "fail";
				$output['message'] = "Something wonts to wrong";
			}
		} else{
		  $output['success'] = "fail";
		  $output['message'] = "Your Link has been expired";
		}
	}
echo json_encode($output);
 ?>