<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $price_type = addslashes($_REQUEST['price_type']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_price_type SET `price_type` = '$price_type'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Asset type added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Asset type not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $price_type_id = $_REQUEST['price_type_id'];
        $price_type = addslashes($_REQUEST['price_type']);
        $statement = $db->query("UPDATE phtv_price_type SET `price_type` = '$price_type' WHERE id = '$price_type_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Asset type updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Asset type not updated';
        }
        echo json_encode($reoutput);
    }
?>