<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $product_size_name = addslashes($_REQUEST['product_size_name']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_product_size SET `size_name` = '$product_size_name'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Size added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Size not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $product_size_id = $_REQUEST['product_size_id'];
        $product_size_name = addslashes($_REQUEST['product_size_name']);
        $statement = $db->query("UPDATE phtv_product_size SET `size_name` = '$product_size_name' WHERE id = '$product_size_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Size updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Size not updated';
        }
        echo json_encode($reoutput);
    }
?>