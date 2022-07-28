<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $cinema_episode_title = addslashes($_REQUEST['cinema_episode_title']);
        $cinema_episode_descriptions = addslashes($_REQUEST['cinema_episode_descriptions']);
        $selectCinema = $_REQUEST['selectCinema'];
        $cinema_episode_season = $_REQUEST['cinema_episode_season'];
        $cinema_episode_time = $_REQUEST['cinema_episode_time'];
        $cinema_episode_video_link = $_REQUEST['cinema_episode_video_link'];
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['cinema_episode_poster_file']['name']))
        {
            $file = $_FILES['cinema_episode_poster_file']['name'];
            $tmp = $_FILES['cinema_episode_poster_file']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/poster/'.$photo;
            move_uploaded_file($tmp,$path);
            $statement = $db->query("INSERT INTO phtv_cinema_episode SET `cinema_id` = '$selectCinema',`season` = '$cinema_episode_season',`video_link` = '$cinema_episode_video_link', `poster` = '$photo', `title` = '$cinema_episode_title', `description` = '$cinema_episode_descriptions', `time` = '$cinema_episode_time', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Cinema episode added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Cinema episode not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select cinema episode poster';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $cinema_episode_id = $_REQUEST['cinema_episode_id'];
        $cinema_episode_title = addslashes($_REQUEST['cinema_episode_title']);
        $cinema_episode_descriptions = addslashes($_REQUEST['cinema_episode_descriptions']);
        $selectCinema = $_REQUEST['selectCinema'];
        $cinema_episode_season = $_REQUEST['cinema_episode_season'];
        $cinema_episode_time = $_REQUEST['cinema_episode_time'];
        $cinema_episode_video_link = $_REQUEST['cinema_episode_video_link'];
        if(!empty($_FILES['cinema_poster_file']['name']))
        {
            $file = $_FILES['cinema_episode_poster_file']['name'];
            $tmp = $_FILES['cinema_episode_poster_file']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/poster/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/poster/'.$_REQUEST['old_cinema_episode_poster_file'])){
                unlink('../../images/poster/'.$_REQUEST['old_cinema_episode_poster_file']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_cinema_episode_poster_file'];
        }
        $statement = $db->query("UPDATE phtv_cinema_episode SET `cinema_id` = '$selectCinema',`season` = '$cinema_episode_season',`video_link` = '$cinema_episode_video_link', `poster` = '$photo', `title` = '$cinema_episode_title', `description` = '$cinema_episode_descriptions', `time` = '$cinema_episode_time' WHERE id = '$cinema_episode_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Cinema episode updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Cinema episode not updated';
        }
        echo json_encode($reoutput);
    }
?>