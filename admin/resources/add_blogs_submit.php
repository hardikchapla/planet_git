<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $blog_title = addslashes($_REQUEST['blog_title']);
        $blog_sub_title = addslashes($_REQUEST['blog_sub_title']);
        $blog_description = addslashes($_REQUEST['blog_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectAuter = $_REQUEST['selectAuter'];
        $blog_type = $_REQUEST['blog_type'];
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['blog_image']['name']))
        {
            $file = $_FILES['blog_image']['name'];
            $tmp = $_FILES['blog_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/blog/'.$photo;
            move_uploaded_file($tmp,$path);
            if(!empty($_FILES['blog_video']['name']))
            {
                $file1 = $_FILES['blog_video']['name'];
                $tmp1 = $_FILES['blog_video']['tmp_name'];
                $ext1 = pathinfo($file1, PATHINFO_EXTENSION);
                $video = rand(1000,1000000).$file1; 
                $path1 = '../../images/blog/'.$video;
                move_uploaded_file($tmp1,$path1);
                
                $statement = $db->query("INSERT INTO phtv_blog SET `title` = '$blog_title',`sub_title` = '$blog_sub_title', `description` = '$blog_description', `image` = '$photo', `video` = '$video', `auther_id` = '$selectAuter', `category_id` = '$selectCategory', `created_at` = '$created'");
            } else {
                $statement = $db->query("INSERT INTO phtv_blog SET `title` = '$blog_title',`sub_title` = '$blog_sub_title', `description` = '$blog_description', `image` = '$photo', `auther_id` = '$selectAuter', `category_id` = '$selectCategory', `created_at` = '$created'");
            }
            
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Blog added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Blog not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select blog image';
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