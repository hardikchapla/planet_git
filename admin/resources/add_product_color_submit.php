<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $product_color_code = addslashes($_REQUEST['product_color_code']);
        $product_color_name = addslashes($_REQUEST['product_color_name']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_product_color SET `color_code` = '$product_color_code',`color_name` = '$product_color_name'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Color added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Color not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $product_color_id = $_REQUEST['product_color_id'];
        $product_color_code = addslashes($_REQUEST['product_color_code']);
        $product_color_name = addslashes($_REQUEST['product_color_name']);
        $statement = $db->query("UPDATE phtv_product_color SET `color_code` = '$product_color_code',`color_name` = '$product_color_name' WHERE id = '$product_color_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Color updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Color not updated';
        }
        echo json_encode($reoutput);
    }
?>