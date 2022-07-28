<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $cinema_description = addslashes($_REQUEST['cinema_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectTypes = implode(',',$_REQUEST['selectTypes']);
        $cinema_year = $_REQUEST['cinema_year'];
        $cinema_age = $_REQUEST['cinema_age'];
        $cinema_total_season = $_REQUEST['cinema_total_season'];
        $cinema_trailer_link = $_REQUEST['cinema_trailer_link'];
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['cinema_poster_file']['name']))
        {
            $file = $_FILES['cinema_poster_file']['name'];
            $tmp = $_FILES['cinema_poster_file']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/poster/'.$photo;
            move_uploaded_file($tmp,$path);
            $statement = $db->query("INSERT INTO phtv_cinema SET `category_id` = '$selectCategory',`cinema_types` = '$selectTypes', `year` = '$cinema_year', `age` = '$cinema_age', `total_season` = '$cinema_total_season', `poster` = '$photo', `trailer_link` = '$cinema_trailer_link', `description` = '$cinema_description', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Cinema added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Cinema not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select cinema poster';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $cinema_id = $_REQUEST['cinema_id'];
        $cinema_description = addslashes($_REQUEST['cinema_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectTypes = implode(',',$_REQUEST['selectTypes']);
        $cinema_year = $_REQUEST['cinema_year'];
        $cinema_age = $_REQUEST['cinema_age'];
        $cinema_total_season = $_REQUEST['cinema_total_season'];
        $cinema_trailer_link = $_REQUEST['cinema_trailer_link'];
        if(!empty($_FILES['cinema_poster_file']['name']))
        {
            $file = $_FILES['cinema_poster_file']['name'];
            $tmp = $_FILES['cinema_poster_file']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/poster/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/poster/'.$_REQUEST['old_cinema_poster_file'])){
                unlink('../../images/poster/'.$_REQUEST['old_cinema_poster_file']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_cinema_poster_file'];
        }
        $statement = $db->query("UPDATE phtv_cinema SET `category_id` = '$selectCategory',`cinema_types` = '$selectTypes', `year` = '$cinema_year', `age` = '$cinema_age', `total_season` = '$cinema_total_season', `poster` = '$photo', `trailer_link` = '$cinema_trailer_link', `description` = '$cinema_description' WHERE id = '$cinema_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Cinema updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Cinema not updated';
        }
        echo json_encode($reoutput);
    }
?>