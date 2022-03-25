<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $blog_category_name = addslashes($_REQUEST['blog_category_name']);
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_blog_category SET `category_name` = '$blog_category_name'");
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
        $blog_category_id = $_REQUEST['blog_category_id'];
        $blog_category_name = addslashes($_REQUEST['blog_category_name']);
        $statement = $db->query("UPDATE phtv_blog_category SET `category_name` = '$blog_category_name' WHERE id = '$blog_category_id'");
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