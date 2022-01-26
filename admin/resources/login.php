<?php
	// session_start();	
	include '../../inc/connection/connection.php';
 	$admin_emailid = $_REQUEST['admin_emailid'];
 	$admin_password = md5($_REQUEST['admin_password']);
	$seladmin = $db->prepare("SELECT * FROM phtv_admin WHERE admin_email ='$admin_emailid' AND admin_password ='$admin_password'");
	$seladmin->execute();
	if($seladmin->rowCount() > 0){
		$fetadmin = $seladmin->fetch(PDO::FETCH_ASSOC);
		$_SESSION['adminId']= $fetadmin['id'];
		$output['success'] = "success";
		$output['message'] = "Login Successfully";
	}else{
	  $output['success'] = "fail";
	  $output['message'] = "email or password is wrong!";
	}
	echo json_encode($output);
 ?>