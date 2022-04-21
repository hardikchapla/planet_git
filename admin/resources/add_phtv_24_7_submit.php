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
            $statement = $db->query("INSERT INTO phtv_live_tv_24_7_page SET `title` = '$phtv_24_7_title',`description` = '$phtv_24_7_description', `thumbnail` = '$photo', `youtube_link` = '$phtv_24_7_youtube_link', `is_recomended` = '$is_recomended', `length` = '$phtv_24_7_length', `created_at` = '$created'");
            
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
        $blog_id = $_REQUEST['blog_id'];
        $blog_title = addslashes($_REQUEST['blog_title']);
        $blog_sub_title = addslashes($_REQUEST['blog_sub_title']);
        $blog_description = addslashes($_REQUEST['blog_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectAuter = $_REQUEST['selectAuter'];
        $blog_type = $_REQUEST['blog_type'];
        if(!empty($_FILES['blog_image']['name']))
        {
            $file = $_FILES['blog_image']['name'];
            $tmp = $_FILES['blog_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/blog/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/blog/'.$_REQUEST['old_blog_image'])){
                unlink('../../images/blog/'.$_REQUEST['old_blog_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_blog_image'];
        }
        if(!empty($_FILES['blog_video']['name']))
            {
                $file1 = $_FILES['blog_video']['name'];
                $tmp1 = $_FILES['blog_video']['tmp_name'];
                $ext1 = pathinfo($file1, PATHINFO_EXTENSION);
                $video = rand(1000,1000000).$file1; 
                $path1 = '../../images/blog/'.$video;
                move_uploaded_file($tmp1,$path1);
                
                if(file_exists('../../images/blog/'.$_REQUEST['old_blog_video'])){
                    unlink('../../images/blog/'.$_REQUEST['old_blog_video']);
                }
                
            } else {
                $video = $_REQUEST['old_blog_video'];
            }
        $statement = $db->query("UPDATE phtv_blog SET `title` = '$blog_title',`sub_title` = '$blog_sub_title', `description` = '$blog_description', `image` = '$photo',`video` = '$video', `auther_id` = '$selectAuter', `category_id` = '$selectCategory' WHERE id = '$blog_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Blog updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Blog not updated';
        }
        echo json_encode($reoutput);
    }
?>