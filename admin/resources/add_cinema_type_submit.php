<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $cinema_type = addslashes($_REQUEST['cinema_type']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_cinema_types SET `name` = '$cinema_type'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Cinema type added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Cinema type not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $cinema_type_id = $_REQUEST['cinema_type_id'];
        $cinema_type = addslashes($_REQUEST['cinema_type']);
        $statement = $db->query("UPDATE phtv_cinema_types SET `name` = '$cinema_type' WHERE id = '$cinema_type_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Cinema type updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Cinema type not updated';
        }
        echo json_encode($reoutput);
    }
?>