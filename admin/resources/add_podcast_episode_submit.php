<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
    include 'mp3file.class.php';
    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $podcast_episode_title = addslashes($_REQUEST['podcast_episode_title']);
        $selectPodcast = $_REQUEST['selectPodcast'];
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['podcast_episode_mp3_file']['name']))
        {
            $file = $_FILES['podcast_episode_mp3_file']['name'];
            $tmp = $_FILES['podcast_episode_mp3_file']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/podcast_mp3/'.$photo;
            move_uploaded_file($tmp,$path);
            
            $mp3file = new MP3File($path);
            $duration1 = $mp3file->getDurationEstimate();
            $duration2 = $mp3file->getDuration();
            $length = MP3File::formatTime($duration2);
            
            $statement = $db->query("INSERT INTO phtv_podcast_episode SET `podcast_id` = '$selectPodcast',`title` = '$podcast_episode_title', `mp3_file` = '$photo', `length` = '$length', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Podcast episode added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Podcast episode not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select podcast mp3 file';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $podcast_episode_id = $_REQUEST['podcast_episode_id'];
        $podcast_episode_title = addslashes($_REQUEST['podcast_episode_title']);
        $selectPodcast = $_REQUEST['selectPodcast'];
        if(!empty($_FILES['podcast_episode_mp3_file']['name']))
        {
            $file = $_FILES['podcast_episode_mp3_file']['name'];
            $tmp = $_FILES['podcast_episode_mp3_file']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/podcast_mp3/'.$photo;
            move_uploaded_file($tmp,$path);
            
            $mp3file = new MP3File($path);
            $duration1 = $mp3file->getDurationEstimate();
            $duration2 = $mp3file->getDuration();
            $length = MP3File::formatTime($duration2);

            if(file_exists('../../images/podcast_mp3/'.$_REQUEST['old_podcast_episode_mp3_file'])){
                unlink('../../images/podcast_mp3/'.$_REQUEST['old_podcast_episode_mp3_file']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_podcast_episode_mp3_file'];
            $mp3file = new MP3File('../../images/podcast_mp3/'.$photo);
            $duration1 = $mp3file->getDurationEstimate();
            $duration2 = $mp3file->getDuration();
            $length = MP3File::formatTime($duration2);
        }
        $statement = $db->query("UPDATE phtv_podcast_episode SET `podcast_id` = '$selectPodcast',`title` = '$podcast_episode_title', `mp3_file` = '$photo', `length` = '$length' WHERE id = '$podcast_episode_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Podcast episode updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'podcast episode not updated';
        }
        echo json_encode($reoutput);
    }
?>