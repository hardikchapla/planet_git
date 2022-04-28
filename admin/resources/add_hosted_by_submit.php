<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $hosted_by_name = addslashes($_REQUEST['hosted_by_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['hosted_by_image']['name']))
        {
            $file = $_FILES['hosted_by_image']['name'];
            $tmp = $_FILES['hosted_by_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/hosted_by/'.$photo;
            move_uploaded_file($tmp,$path);

            $statement = $db->query("INSERT INTO phtv_hosted_by SET `name` = '$hosted_by_name',`image` = '$photo'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Hosted by added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Hosted by not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select Hosted by profile image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $hosted_by_id = $_REQUEST['hosted_by_id'];
        $hosted_by_name = addslashes($_REQUEST['hosted_by_name']);
        if(!empty($_FILES['hosted_by_image']['name']))
        {
            $file = $_FILES['hosted_by_image']['name'];
            $tmp = $_FILES['hosted_by_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/hosted_by/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/hosted_by/'.$_REQUEST['old_hosted_by_image'])){
                unlink('../../images/hosted_by/'.$_REQUEST['old_hosted_by_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_hosted_by_image'];
        }
        $statement = $db->query("UPDATE phtv_hosted_by SET `name` = '$hosted_by_name',`image` = '$photo' WHERE id = '$hosted_by_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Hosted by updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Hosted by not updated';
        }
        echo json_encode($reoutput);
    }
?>