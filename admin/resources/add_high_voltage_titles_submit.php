<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $high_voltage_titles_name = addslashes($_REQUEST['high_voltage_titles_name']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_voltage_title SET `name` = '$high_voltage_titles_name'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Title added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Title not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $high_voltage_titles_id = $_REQUEST['high_voltage_titles_id'];
        $high_voltage_titles_name = addslashes($_REQUEST['high_voltage_titles_name']);
        $statement = $db->query("UPDATE phtv_voltage_title SET `name` = '$high_voltage_titles_name' WHERE id = '$high_voltage_titles_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Title updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Title not updated';
        }
        echo json_encode($reoutput);
    }
?>