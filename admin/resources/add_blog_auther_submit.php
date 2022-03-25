<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $blog_auther_name = addslashes($_REQUEST['blog_auther_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['blog_auther_image']['name']))
        {
            $file = $_FILES['blog_auther_image']['name'];
            $tmp = $_FILES['blog_auther_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/blog_auther/'.$photo;
            move_uploaded_file($tmp,$path);

            $statement = $db->query("INSERT INTO phtv_blog_auther SET `name` = '$blog_auther_name',`image` = '$photo'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Auther added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Auther not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select auther profile image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $blog_auther_id = $_REQUEST['blog_auther_id'];
        $blog_auther_name = addslashes($_REQUEST['blog_auther_name']);
        if(!empty($_FILES['blog_auther_image']['name']))
        {
            $file = $_FILES['blog_auther_image']['name'];
            $tmp = $_FILES['blog_auther_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/blog_auther/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/blog_auther/'.$_REQUEST['old_blog_auther_image'])){
                unlink('../../images/blog_auther/'.$_REQUEST['old_blog_auther_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_blog_auther_image'];
        }
        $statement = $db->query("UPDATE phtv_blog_auther SET `name` = '$blog_auther_name',`image` = '$photo' WHERE id = '$blog_auther_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Auther updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Auther not updated';
        }
        echo json_encode($reoutput);
    }
?>