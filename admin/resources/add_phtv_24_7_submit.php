<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $phtv_24_7_title = addslashes($_REQUEST['phtv_24_7_title']);
        $phtv_24_7_description = addslashes($_REQUEST['phtv_24_7_description']);
        $phtv_24_7_youtube_link = addslashes($_REQUEST['phtv_24_7_youtube_link']);
        $phtv_24_7_length = $_REQUEST['phtv_24_7_length'];
        $selectCategory = $_REQUEST['selectCategory'];
        $is_recomended = $_REQUEST['is_recomended'];
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['phtv_24_7_thumbnail']['name']))
        {
            $file = $_FILES['phtv_24_7_thumbnail']['name'];
            $tmp = $_FILES['phtv_24_7_thumbnail']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/phtv_24_7/'.$photo;
            move_uploaded_file($tmp,$path);
            $statement = $db->query("INSERT INTO phtv_live_tv_24_7_page SET `title` = '$phtv_24_7_title',`description` = '$phtv_24_7_description', `thumbnail` = '$photo', `youtube_link` = '$phtv_24_7_youtube_link', `is_recomended` = '$is_recomended', `length` = '$phtv_24_7_length',`category_id` = '$selectCategory', `created_at` = '$created'");
            
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'PHTV 24/7 added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'PHTV 24/7 not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select PHTV thumbnail';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $phtv_24_7_id = $_REQUEST['phtv_24_7_id'];
        $phtv_24_7_title = addslashes($_REQUEST['phtv_24_7_title']);
        $phtv_24_7_description = addslashes($_REQUEST['phtv_24_7_description']);
        $phtv_24_7_youtube_link = addslashes($_REQUEST['phtv_24_7_youtube_link']);
        $phtv_24_7_length = $_REQUEST['phtv_24_7_length'];
        $selectCategory = $_REQUEST['selectCategory'];
        $is_recomended = $_REQUEST['is_recomended'];
        if(!empty($_FILES['phtv_24_7_thumbnail']['name']))
        {
            $file = $_FILES['phtv_24_7_thumbnail']['name'];
            $tmp = $_FILES['phtv_24_7_thumbnail']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/phtv_24_7/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/phtv_24_7/'.$_REQUEST['old_phtv_24_7_thumbnail'])){
                unlink('../../images/phtv_24_7/'.$_REQUEST['old_phtv_24_7_thumbnail']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_phtv_24_7_thumbnail'];
        }
        $statement = $db->query("UPDATE phtv_live_tv_24_7_page SET `title` = '$phtv_24_7_title',`description` = '$phtv_24_7_description', `thumbnail` = '$photo',`category_id` = '$selectCategory', `youtube_link` = '$phtv_24_7_youtube_link', `is_recomended` = '$is_recomended', `length` = '$phtv_24_7_length' WHERE id = '$phtv_24_7_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'PHTV 24/7 updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'PHTV 24/7 not updated';
        }
        echo json_encode($reoutput);
    }
?>