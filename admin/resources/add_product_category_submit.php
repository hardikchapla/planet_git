<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $product_category_name = addslashes($_REQUEST['product_category_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['product_category_image']['name']))
        {
            $file = $_FILES['product_category_image']['name'];
            $tmp = $_FILES['product_category_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/product_category/'.$photo;
            move_uploaded_file($tmp,$path);

            $statement = $db->query("INSERT INTO phtv_product_category SET `category_name` = '$product_category_name',`category_image` = '$photo'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Category added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Category not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select product category image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $product_category_id = $_REQUEST['product_category_id'];
        $product_category_name = addslashes($_REQUEST['product_category_name']);
        if(!empty($_FILES['product_category_image']['name']))
        {
            $file = $_FILES['product_category_image']['name'];
            $tmp = $_FILES['product_category_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/product_category/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/product_category/'.$_REQUEST['old_product_category_image'])){
                unlink('../../images/product_category/'.$_REQUEST['old_product_category_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_product_category_image'];
        }
        $statement = $db->query("UPDATE phtv_product_category SET `category_name` = '$product_category_name',`category_image` = '$photo' WHERE id = '$product_category_id'");
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