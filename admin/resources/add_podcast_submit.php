<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $podcast_title = addslashes($_REQUEST['podcast_title']);
        $podcast_description = addslashes($_REQUEST['podcast_description']);
        $selectAuter = $_REQUEST['selectAuter'];
        $selectCreatedBy = $_REQUEST['selectCreatedBy'];
        $selectSponsoredBy = $_REQUEST['selectSponsoredBy'];
        $podcast_fb_link = addslashes($_REQUEST['podcast_fb_link']);
        $podcast_twiter_link = addslashes($_REQUEST['podcast_twiter_link']);
        $podcast_google_link = addslashes($_REQUEST['podcast_google_link']);
        $podcast_insta_link = addslashes($_REQUEST['podcast_insta_link']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['podcast_image']['name']))
        {
            $file = $_FILES['podcast_image']['name'];
            $tmp = $_FILES['podcast_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/podcast_image/'.$photo;
            move_uploaded_file($tmp,$path);
            
            $statement = $db->query("INSERT INTO phtv_podcast SET `title` = '$podcast_title',`image` = '$photo', `hosts_id` = '$selectAuter', `created_by_id` = '$selectCreatedBy', `sponsored_by_id` = '$selectSponsoredBy', `description` = '$podcast_description', `fb_link` = '$podcast_fb_link', `twiter_link` = '$podcast_twiter_link', `google_link` = '$podcast_google_link', `insta_link` = '$podcast_insta_link', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Podcast added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Podcast not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select podcast image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $podcast_id = $_REQUEST['podcast_id'];
        $podcast_title = addslashes($_REQUEST['podcast_title']);
        $podcast_description = addslashes($_REQUEST['podcast_description']);
        $selectAuter = $_REQUEST['selectAuter'];
        $selectCreatedBy = $_REQUEST['selectCreatedBy'];
        $selectSponsoredBy = $_REQUEST['selectSponsoredBy'];
        $podcast_fb_link = addslashes($_REQUEST['podcast_fb_link']);
        $podcast_twiter_link = addslashes($_REQUEST['podcast_twiter_link']);
        $podcast_google_link = addslashes($_REQUEST['podcast_google_link']);
        $podcast_insta_link = addslashes($_REQUEST['podcast_insta_link']);
        if(!empty($_FILES['podcast_image']['name']))
        {
            $file = $_FILES['podcast_image']['name'];
            $tmp = $_FILES['podcast_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/podcast_image/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/podcast_image/'.$_REQUEST['old_podcast_image'])){
                unlink('../../images/podcast_image/'.$_REQUEST['old_podcast_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_podcast_image'];
        }
        $statement = $db->query("UPDATE phtv_podcast SET `title` = '$podcast_title',`image` = '$photo', `hosts_id` = '$selectAuter', `created_by_id` = '$selectCreatedBy', `sponsored_by_id` = '$selectSponsoredBy', `description` = '$podcast_description', `fb_link` = '$podcast_fb_link', `twiter_link` = '$podcast_twiter_link', `google_link` = '$podcast_google_link', `insta_link` = '$podcast_insta_link' WHERE id = '$podcast_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Podcast updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'podcast not updated';
        }
        echo json_encode($reoutput);
    }
?>