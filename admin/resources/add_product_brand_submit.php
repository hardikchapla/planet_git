<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $product_brand_name = addslashes($_REQUEST['product_brand_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['product_brand_image']['name']))
        {
            $file = $_FILES['product_brand_image']['name'];
            $tmp = $_FILES['product_brand_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/product_brand/'.$photo;
            move_uploaded_file($tmp,$path);

            $statement = $db->query("INSERT INTO phtv_product_brand SET `name` = '$product_brand_name',`logo` = '$photo'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Brand added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Brand not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select product brand logo';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $product_brand_id = $_REQUEST['product_brand_id'];
        $product_brand_name = addslashes($_REQUEST['product_brand_name']);
        if(!empty($_FILES['product_brand_image']['name']))
        {
            $file = $_FILES['product_brand_image']['name'];
            $tmp = $_FILES['product_brand_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/product_brand/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/product_brand/'.$_REQUEST['old_product_brand_image'])){
                unlink('../../images/product_brand/'.$_REQUEST['old_product_brand_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_product_brand_image'];
        }
        $statement = $db->query("UPDATE phtv_product_brand SET `name` = '$product_brand_name',`logo` = '$photo' WHERE id = '$product_brand_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Brand updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Brand not updated';
        }
        echo json_encode($reoutput);
    }
?>