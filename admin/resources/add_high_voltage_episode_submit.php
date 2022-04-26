<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $high_voltage_episode_title = addslashes($_REQUEST['high_voltage_episode_title']);
        $high_voltage_episode_description = addslashes($_REQUEST['high_voltage_episode_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectTitle = $_REQUEST['selectTitle'];
        $high_voltage_episode_video_type = $_REQUEST['high_voltage_episode_video_type'];
        $created = date("Y-m-d H:i:s");
        if(empty($_FILES['high_voltage_episode_image']['name']))
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select episode image';
        }
        elseif ($high_voltage_episode_video_type == 1 && empty($_FILES['high_voltage_episode_video']['name'])) {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select episode video';
        }
        else
        {
            $file = $_FILES['high_voltage_episode_image']['name'];
            $tmp = $_FILES['high_voltage_episode_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/episode_image/'.$photo;
            move_uploaded_file($tmp,$path);

            if ($high_voltage_episode_video_type == 1) {
                $file1 = $_FILES['high_voltage_episode_video']['name'];
                $tmp1 = $_FILES['high_voltage_episode_video']['tmp_name'];
                $ext1 = pathinfo($file1, PATHINFO_EXTENSION);
                $video = rand(1000,1000000).$file1; 
                $path1 = '../../images/episode_image/'.$video;
                move_uploaded_file($tmp1,$path1);
            } else {
                $video = $_REQUEST['high_voltage_episode_video'];
            }
            

            $statement = $db->query("INSERT INTO phtv_voltage_episode SET `title` = '$high_voltage_episode_title',`image` = '$photo', `video` = '$video', `video_type` = '$high_voltage_episode_video_type', `description` = '$high_voltage_episode_description', `category_id` = '$selectCategory', `voltage_title_id` = '$selectTitle', `created_at` = '$created'");
            
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Hight voltage episode added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Hight voltage episode not added';
            }
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $high_voltage_episode_id = $_REQUEST['high_voltage_episode_id'];
        $high_voltage_episode_title = addslashes($_REQUEST['high_voltage_episode_title']);
        $high_voltage_episode_description = addslashes($_REQUEST['high_voltage_episode_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectTitle = $_REQUEST['selectTitle'];
        $high_voltage_episode_video_type = $_REQUEST['high_voltage_episode_video_type'];
        if(!empty($_FILES['high_voltage_episode_image']['name']))
        {
            $file = $_FILES['high_voltage_episode_image']['name'];
            $tmp = $_FILES['high_voltage_episode_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/episode_image/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/episode_image/'.$_REQUEST['old_high_voltage_episode_image'])){
                unlink('../../images/episode_image/'.$_REQUEST['old_high_voltage_episode_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_high_voltage_episode_image'];
        }
        if($high_voltage_episode_video_type == 1)
        {
            if(!empty($_FILES['high_voltage_episode_video']['name'])){
                $file1 = $_FILES['high_voltage_episode_video']['name'];
                $tmp1 = $_FILES['high_voltage_episode_video']['tmp_name'];
                $ext1 = pathinfo($file1, PATHINFO_EXTENSION);
                $video = rand(1000,1000000).$file1; 
                $path1 = '../../images/episode_image/'.$video;
                move_uploaded_file($tmp1,$path1);
                
                if(file_exists('../../images/episode_image/'.$_REQUEST['old_high_voltage_episode_video'])){
                    unlink('../../images/episode_image/'.$_REQUEST['old_high_voltage_episode_video']);
                }
            } else {
                $video = $_REQUEST['old_high_voltage_episode_video'];
            }
        } else {
            $video = $_REQUEST['high_voltage_episode_video'];
        }
        $statement = $db->query("UPDATE phtv_voltage_episode SET `title` = '$high_voltage_episode_title',`image` = '$photo', `video` = '$video', `video_type` = '$high_voltage_episode_video_type', `description` = '$high_voltage_episode_description', `category_id` = '$selectCategory', `voltage_title_id` = '$selectTitle' WHERE id = '$high_voltage_episode_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Hight voltage episode updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Hight voltage episode not updated';
        }
        echo json_encode($reoutput);
    }
?>