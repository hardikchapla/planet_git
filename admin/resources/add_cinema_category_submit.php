<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $cinema_category = addslashes($_REQUEST['cinema_category']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_cinema_categories SET `name` = '$cinema_category'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Cinema category added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Cinema category not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $cinema_category_id = $_REQUEST['cinema_category_id'];
        $cinema_category = addslashes($_REQUEST['cinema_category']);
        $statement = $db->query("UPDATE phtv_cinema_categories SET `name` = '$cinema_category' WHERE id = '$cinema_category_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Cinema category updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Cinema category not updated';
        }
        echo json_encode($reoutput);
    }
?>