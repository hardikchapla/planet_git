<?php
    // session_start(); 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';

    $email = $_REQUEST['email'];
    $password = md5($_REQUEST['password']);
    $check = $db->prepare("SELECT * FROM phtv_users WHERE email = '$email' AND password = '$password'");
    $check->execute();
    if($check->rowCount() > 0){
        $user = $check->fetch(PDO::FETCH_ASSOC);
        if($user['is_active'] == 1 && $user['is_verified'] == 1){
            $_SESSION['userid'] = $user['id'];
            $output['success'] = "success";
            $output['message'] = "Login Successfully";
        } elseif($user['is_active'] == 0 && $user['is_verified'] == 0){
            $output['success'] = "fail";
            $output['message'] = "Your account not is not verified. please first verified";
        } elseif($user['is_active'] == 0){
            $output['success'] = "fail";
            $output['message'] = "Your account is not active. please contact administator";
        } elseif ($user['is_verified'] == 1) {
            $output['success'] = "fail";
            $output['message'] = "Your account not is not verified. please first verified";
        }
    } else {
        $output['success'] = "fail";
        $output['message'] = "Email or password is wrong!";
    }  
    echo json_encode($output);
 ?>