<?php
include '../../inc/connection/connection.php';
require_once '../../inc/helper/constant.php';
require_once '../../inc/helper/core_function.php';

if ($_REQUEST['action'] == 'Add') {
    $reoutput = array();
    if (empty($_FILES['files']['name'][0])) {
        $reoutput['success'] = 'fail';
        $reoutput['message'] = 'Please select product images';
    } else {
        $selectCategory = $_REQUEST['selectCategory'];
        $selectBrand = $_REQUEST['selectBrand'];
        $productName = addslashes($_REQUEST['productName']);
        $productPrice = $_REQUEST['productPrice'];
        $productCoinPrice = $_REQUEST['productCoinPrice'];
        $productStocks = $_REQUEST['productStocks'];
        $editor = addslashes($_REQUEST['editor']);
        $editor1 = addslashes($_REQUEST['editor1']);
        $productPreOrder = (isset($_REQUEST['productPreOrder']) && $_REQUEST['productPreOrder'] == 'on') ? 1 : 0;
        $created = date("Y-m-d H:i:s");
        $statement = $db->query("INSERT INTO phtv_product SET `product_brand_id` = '$selectBrand',`product_category_id` = '$selectCategory',`name` = '$productName',`description` = '$editor',`price` = '$productPrice',`coin_price` = '$productCoinPrice',`stock` = '$productStocks',`additional_info` = '$editor1',`is_preorder` = '$productPreOrder'");
        if (!empty($statement)) {
            $product_id = $db->lastInsertId();
            $image_count = count($_FILES['files']['name']);
            for ($i = 0; $i < $image_count; $i++) {
                $file = $_FILES['files']['name'][$i];
                $tmp = $_FILES['files']['tmp_name'][$i];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $photo = rand(1000, 1000000) . $file;
                $path = '../../images/product/' . $photo;
                move_uploaded_file($tmp, $path);
                $statement = $db->query("INSERT INTO phtv_product_images SET `product_id` = '$product_id',`image` = '$photo'");
            }
            $selectColor = $_REQUEST['selectColor'];
            foreach ($selectColor as $key => $color) {
                $statement = $db->query("INSERT INTO phtv_product_multi_color SET `product_id` = '$product_id',`color_id` = '$color'");
            }

            $selectSize = $_REQUEST['selectSize'];
            foreach ($selectSize as $key => $size) {
                $statement = $db->query("INSERT INTO phtv_product_multi_size SET `product_id` = '$product_id',`size_id` = '$size'");
            }
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Product added successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Product not added';
        }
    }
    echo json_encode($reoutput);
}
if ($_REQUEST['action'] == 'Edit') {
    $reoutput = array();
    $product_id = $_REQUEST['product_id'];
    $selectCategory = $_REQUEST['selectCategory'];
    $selectBrand = $_REQUEST['selectBrand'];
    $productName = addslashes($_REQUEST['productName']);
    $productPrice = $_REQUEST['productPrice'];
    $productCoinPrice = $_REQUEST['productCoinPrice'];
    $productStocks = $_REQUEST['productStocks'];
    $editor = addslashes($_REQUEST['editor']);
    $editor1 = addslashes($_REQUEST['editor1']);
    $productPreOrder = (isset($_REQUEST['productPreOrder']) && $_REQUEST['productPreOrder'] == 'on') ? 1 : 0;
    $created = date("Y-m-d H:i:s");
    $statement = $db->query("UPDATE phtv_product SET `product_brand_id` = '$selectBrand',`product_category_id` = '$selectCategory',`name` = '$productName',`description` = '$editor',`price` = '$productPrice',`coin_price` = '$productCoinPrice',`stock` = '$productStocks',`additional_info` = '$editor1',`is_preorder` = '$productPreOrder' WHERE id = '$product_id'");
    if (!empty($statement)) {
        $image_count = count($_FILES['files']['name']);
        if (!empty($_FILES['files']['name'][0])) {
            for ($i = 0; $i < $image_count; $i++) {
                $file = $_FILES['files']['name'][$i];
                $tmp = $_FILES['files']['tmp_name'][$i];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $photo = rand(1000, 1000000) . $file;
                $path = '../../images/product/' . $photo;
                move_uploaded_file($tmp, $path);
                $statement = $db->query("INSERT INTO phtv_product_images SET `product_id` = '$product_id',`image` = '$photo'");
            }
        }
        $delete_color = $db->query("DELETE FROM phtv_product_multi_color WHERE product_id = '$product_id'");
        $selectColor = $_REQUEST['selectColor'];
        foreach ($selectColor as $key => $color) {
            $statement = $db->query("INSERT INTO phtv_product_multi_color SET `product_id` = '$product_id',`color_id` = '$color'");
        }
        $delete_size = $db->query("DELETE FROM phtv_product_multi_size WHERE product_id = '$product_id'");
        $selectSize = $_REQUEST['selectSize'];
        foreach ($selectSize as $key => $size) {
            $statement = $db->query("INSERT INTO phtv_product_multi_size SET `product_id` = '$product_id',`size_id` = '$size'");
        }
        $reoutput['success'] = 'success';
        $reoutput['message'] = 'Product updated successfully';
    } else {
        $reoutput['success'] = 'fail';
        $reoutput['message'] = 'Product not updated';
    }
    echo json_encode($reoutput);
}