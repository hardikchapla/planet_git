<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $nft_category_name = addslashes($_REQUEST['nft_category_name']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_nft_categories SET `name` = '$nft_category_name'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Category added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Category not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $nft_category_id = $_REQUEST['nft_category_id'];
        $nft_category_name = addslashes($_REQUEST['nft_category_name']);
        $statement = $db->query("UPDATE phtv_nft_categories SET `name` = '$nft_category_name' WHERE id = '$nft_category_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Category updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Category not updated';
        }
        echo json_encode($reoutput);
    }
?>