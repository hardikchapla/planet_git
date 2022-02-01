<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    $reoutput = array();
    $user_id = $_REQUEST['user_id'];
    $full_name = addslashes($_REQUEST['full_name']);
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $created = date("Y-m-d H:i:s");
    $check_email = $db->query("SELECT * FROM phtv_users WHERE email = '$email' AND id != '$user_id'");
    $check_mobile = $db->query("SELECT * FROM phtv_users WHERE mobile = '$mobile' AND id != '$user_id'");
    if($check_email->rowCount() > 0 && $check_mobile->rowCount() > 0){
        $reoutput['success'] = 'fail';
        $reoutput['message'] = 'Email and mobile number are already exist';
    } elseif ($check_email->rowCount() > 0) {
        $reoutput['success'] = 'fail';
        $reoutput['message'] = 'Email id already exist';
    } elseif ($check_mobile->rowCount() > 0) {
        $reoutput['success'] = 'fail';
        $reoutput['message'] = 'Mobile number already exist';
    } else {
        if(!empty($_FILES['profile_pic']['name']))
        {
            $file = $_FILES['profile_pic']['name'];
            $tmp = $_FILES['profile_pic']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/users/'.$photo;
            move_uploaded_file($tmp,$path);
        }
        else
        {
            $photo = $_REQUEST['old_image'];
        }
        $statement = $db->query("UPDATE phtv_users SET `full_name` = '$full_name',`email` = '$email',`mobile` = '$mobile',`image` = '$photo' WHERE  id = '$user_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'User profile updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'User profile not updated';
        }
    }
    echo json_encode($reoutput);
?>