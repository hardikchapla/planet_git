<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $sponsored_by_name = addslashes($_REQUEST['sponsored_by_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['sponsored_by_image']['name']))
        {
            $file = $_FILES['sponsored_by_image']['name'];
            $tmp = $_FILES['sponsored_by_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/sponsored_by/'.$photo;
            move_uploaded_file($tmp,$path);

            $statement = $db->query("INSERT INTO phtv_sponsored_by SET `name` = '$sponsored_by_name',`image` = '$photo'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Sponsored by added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Sponsored by not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select Sponsored by profile image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $sponsored_by_id = $_REQUEST['sponsored_by_id'];
        $sponsored_by_name = addslashes($_REQUEST['sponsored_by_name']);
        if(!empty($_FILES['sponsored_by_image']['name']))
        {
            $file = $_FILES['sponsored_by_image']['name'];
            $tmp = $_FILES['sponsored_by_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/sponsored_by/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/sponsored_by/'.$_REQUEST['old_sponsored_by_image'])){
                unlink('../../images/sponsored_by/'.$_REQUEST['old_sponsored_by_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_sponsored_by_image'];
        }
        $statement = $db->query("UPDATE phtv_sponsored_by SET `name` = '$sponsored_by_name',`image` = '$photo' WHERE id = '$sponsored_by_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Sponsored by updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Sponsored by not updated';
        }
        echo json_encode($reoutput);
    }
?>