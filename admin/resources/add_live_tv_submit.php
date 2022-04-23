<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $live_tv_title = addslashes($_REQUEST['live_tv_title']);
        $live_tv_description = addslashes($_REQUEST['live_tv_description']);
        $live_tv_youtube_link = addslashes($_REQUEST['live_tv_youtube_link']);
        $live_tv_length = $_REQUEST['live_tv_length'];
        $is_recomended = $_REQUEST['is_recomended'];
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['live_tv_thumbnail']['name']))
        {
            $file = $_FILES['live_tv_thumbnail']['name'];
            $tmp = $_FILES['live_tv_thumbnail']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/live_tv/'.$photo;
            move_uploaded_file($tmp,$path);
            $statement = $db->query("INSERT INTO phtv_live_tv_page SET `title` = '$live_tv_title',`description` = '$live_tv_description', `thumbnail` = '$photo', `youtube_link` = '$live_tv_youtube_link', `is_recomended` = '$is_recomended', `length` = '$live_tv_length', `created_at` = '$created'");
            
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Live TV added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Live TV not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select Live Tv thumbnail';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $live_tv_id = $_REQUEST['live_tv_id'];
        $live_tv_title = addslashes($_REQUEST['live_tv_title']);
        $live_tv_description = addslashes($_REQUEST['live_tv_description']);
        $live_tv_youtube_link = addslashes($_REQUEST['live_tv_youtube_link']);
        $live_tv_length = $_REQUEST['live_tv_length'];
        $is_recomended = $_REQUEST['is_recomended'];
        if(!empty($_FILES['live_tv_thumbnail']['name']))
        {
            $file = $_FILES['live_tv_thumbnail']['name'];
            $tmp = $_FILES['live_tv_thumbnail']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/live_tv/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/live_tv/'.$_REQUEST['old_live_tv_thumbnail'])){
                unlink('../../images/live_tv/'.$_REQUEST['old_live_tv_thumbnail']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_live_tv_thumbnail'];
        }
        $statement = $db->query("UPDATE phtv_live_tv_page SET `title` = '$live_tv_title',`description` = '$live_tv_description', `thumbnail` = '$photo', `youtube_link` = '$live_tv_youtube_link', `is_recomended` = '$is_recomended', `length` = '$live_tv_length' WHERE id = '$live_tv_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Live TV updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Live TV not updated';
        }
        echo json_encode($reoutput);
    }
?>