<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $created_by_name = addslashes($_REQUEST['created_by_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['created_by_image']['name']))
        {
            $file = $_FILES['created_by_image']['name'];
            $tmp = $_FILES['created_by_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/created_by/'.$photo;
            move_uploaded_file($tmp,$path);

            $statement = $db->query("INSERT INTO phtv_created_by SET `name` = '$created_by_name',`image` = '$photo'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Created by added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Created by not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select created by profile image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $created_by_id = $_REQUEST['created_by_id'];
        $created_by_name = addslashes($_REQUEST['created_by_name']);
        if(!empty($_FILES['created_by_image']['name']))
        {
            $file = $_FILES['created_by_image']['name'];
            $tmp = $_FILES['created_by_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/created_by/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/created_by/'.$_REQUEST['old_created_by_image'])){
                unlink('../../images/created_by/'.$_REQUEST['old_created_by_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_created_by_image'];
        }
        $statement = $db->query("UPDATE phtv_created_by SET `name` = '$created_by_name',`image` = '$photo' WHERE id = '$created_by_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Created by updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Created by not updated';
        }
        echo json_encode($reoutput);
    }
?>