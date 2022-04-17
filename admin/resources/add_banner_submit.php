<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $banner_title = addslashes($_REQUEST['banner_title']);
        $banner_description = addslashes($_REQUEST['banner_description']);
        $banner_link = addslashes($_REQUEST['banner_link']);
        $link_type = $_REQUEST['link_type'];
        $banner_type = $_REQUEST['banner_type'];
        $selectPage = $_REQUEST['selectPage'];
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['banner_image']['name']))
        {
            $file = $_FILES['banner_image']['name'];
            $tmp = $_FILES['banner_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/banner_image/'.$photo;
            move_uploaded_file($tmp,$path);
                
            $statement = $db->query("INSERT INTO phtv_banner SET `page_id` = '$selectPage',`title` = '$banner_title', `description` = '$banner_description', `image` = '$photo', `link` = '$banner_link', `link_type` = '$link_type', `banner_type` = '$banner_type', `created_at` = '$created'");
            
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Banner added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Banner not added';
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
        $banner_id = $_REQUEST['banner_id'];
        $banner_title = addslashes($_REQUEST['banner_title']);
        $banner_description = addslashes($_REQUEST['banner_description']);
        $banner_link = addslashes($_REQUEST['banner_link']);
        $link_type = $_REQUEST['link_type'];
        $banner_type = $_REQUEST['banner_type'];
        $selectPage = $_REQUEST['selectPage'];
        if(!empty($_FILES['banner_image']['name']))
        {
            $file = $_FILES['banner_image']['name'];
            $tmp = $_FILES['banner_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/banner_image/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/banner_image/'.$_REQUEST['old_banner_image'])){
                unlink('../../images/banner_image/'.$_REQUEST['old_banner_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_banner_image'];
        }
        $statement = $db->query("UPDATE phtv_banner SET `page_id` = '$selectPage',`title` = '$banner_title', `description` = '$banner_description', `image` = '$photo', `link` = '$banner_link', `link_type` = '$link_type', `banner_type` = '$banner_type' WHERE id = '$banner_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Banner updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Banner not updated';
        }
        echo json_encode($reoutput);
    }
?>