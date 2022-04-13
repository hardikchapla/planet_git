<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $page_name = addslashes($_REQUEST['page_name']);
        $page_slug = addslashes($_REQUEST['page_slug']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_pages SET `page_name` = '$page_name',`slug` = '$page_slug'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Page added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Page not added';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $page_id = $_REQUEST['page_id'];
        $page_name = addslashes($_REQUEST['page_name']);
        $page_slug = addslashes($_REQUEST['page_slug']);
        $statement = $db->query("UPDATE phtv_pages SET `page_name` = '$page_name',`slug` = '$page_slug' WHERE id = '$page_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Page updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Page not updated';
        }
        echo json_encode($reoutput);
    }