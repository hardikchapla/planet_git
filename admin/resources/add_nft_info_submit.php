<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';
    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $nft_info_name = addslashes($_REQUEST['nft_info_name']);
        $nft_info_price = addslashes($_REQUEST['nft_info_price']);
        $selectPriceType = $_REQUEST['selectPriceType'];
        $nft_info_description = addslashes($_REQUEST['nft_info_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectCollections = $_REQUEST['selectCollections'];
        $nft_info_sale_id = addslashes($_REQUEST['nft_info_sale_id']);
        $nft_info_assets_name = addslashes($_REQUEST['nft_info_assets_name']);
        $nft_info_assets_id = addslashes($_REQUEST['nft_info_assets_id']);
        $nft_info_meant_no = addslashes($_REQUEST['nft_info_meant_no']);
        $nft_info_mint = $_REQUEST['nft_info_mint'];
        $nft_info_duration = addslashes($_REQUEST['nft_info_duration']);
        $nft_info_attribute_name = addslashes($_REQUEST['nft_info_attribute_name']);
        $nft_info_attribute_image = addslashes($_REQUEST['nft_info_attribute_image']);
        $nft_info_attribute_bg_image = addslashes($_REQUEST['nft_info_attribute_bg_image']);
        $nft_info_attribute_object = addslashes($_REQUEST['nft_info_attribute_object']);
        $nft_info_attribute_object_collection = addslashes($_REQUEST['nft_info_attribute_object_collection']);
        $nft_info_attribute_object_no = addslashes($_REQUEST['nft_info_attribute_object_no']);
        $nft_info_attribute_border_color = addslashes($_REQUEST['nft_info_attribute_border_color']);
        $nft_info_attribute_border_type = addslashes($_REQUEST['nft_info_attribute_border_type']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['nft_info_image']['name']) && !empty($_FILES['nft_info_thumbnail']['name']))
        {
            $mime = $_FILES['nft_info_image']['type'];
            $image_type = '';
            if(strstr($mime, "video/")){
                $image_type = 'video';
            } else if (strstr($mime, "image/gif")) {
                $image_type = 'gif';
            } else if(strstr($mime, "image/")){
                $image_type = 'image';
            } else if(strstr($mime, "audio/")){
                $image_type = 'audio';
            }
            if(!empty($image_type)){
                $file = $_FILES['nft_info_image']['name'];
                $tmp = $_FILES['nft_info_image']['tmp_name'];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $photo = rand(1000,1000000).$file; 
                $path = '../../images/nft_info_image/'.$photo;
                move_uploaded_file($tmp,$path);

                $file1 = $_FILES['nft_info_thumbnail']['name'];
                $tmp1 = $_FILES['nft_info_thumbnail']['tmp_name'];
                $ext1 = pathinfo($file1, PATHINFO_EXTENSION);
                $photo1 = rand(1000,1000000).$file1; 
                $path1 = '../../images/nft_info_image/'.$photo1;
                move_uploaded_file($tmp1,$path1);
                
                $statement = $db->query("INSERT INTO phtv_nft_info SET `collection_id` = '$selectCollections',`category_id` = '$selectCategory', `name` = '$nft_info_name', `price` = '$nft_info_price',`price_type` = '$selectPriceType', `description` = '$nft_info_description', `sale_id` = '$nft_info_sale_id', `assets_name` = '$nft_info_assets_name', `assets_id` = '$nft_info_assets_id', `meant_no` = '$nft_info_meant_no', `mint` = '$nft_info_mint', `image` = '$photo', `thumbnail` = '$photo1', `image_type` = '$image_type', `duration` = '$nft_info_duration', `attribute_name` = '$nft_info_attribute_name', `attribute_image` = '$nft_info_attribute_image', `attribute_bg_image` = '$nft_info_attribute_bg_image', `attribute_object` = '$nft_info_attribute_object', `attribute_object_collection` = '$nft_info_attribute_object_collection', `attribute_object_no` = '$nft_info_attribute_object_no', `attribute_border_color` = '$nft_info_attribute_border_color', `attribute_border_type` = '$nft_info_attribute_border_type', `created_at` = '$created'");
                if(!empty($statement))
                {
                    $reoutput['success'] = 'success';
                    $reoutput['message'] = 'Asset Listing added successfully';
                } else {
                    $reoutput['success'] = 'fail';
                    $reoutput['message'] = 'Asset Listing not added';
                }
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Please select valid file';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select Asset Listing file';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $nft_info_id = $_REQUEST['nft_info_id'];
        $nft_info_name = addslashes($_REQUEST['nft_info_name']);
        $nft_info_price = addslashes($_REQUEST['nft_info_price']);
        $nft_info_description = addslashes($_REQUEST['nft_info_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectCollections = $_REQUEST['selectCollections'];
        $selectPriceType = $_REQUEST['selectPriceType'];
        $nft_info_sale_id = addslashes($_REQUEST['nft_info_sale_id']);
        $nft_info_assets_name = addslashes($_REQUEST['nft_info_assets_name']);
        $nft_info_assets_id = addslashes($_REQUEST['nft_info_assets_id']);
        $nft_info_meant_no = addslashes($_REQUEST['nft_info_meant_no']);
        $nft_info_mint = $_REQUEST['nft_info_mint'];
        $nft_info_duration = addslashes($_REQUEST['nft_info_duration']);
        $nft_info_attribute_name = addslashes($_REQUEST['nft_info_attribute_name']);
        $nft_info_attribute_image = addslashes($_REQUEST['nft_info_attribute_image']);
        $nft_info_attribute_bg_image = addslashes($_REQUEST['nft_info_attribute_bg_image']);
        $nft_info_attribute_object = addslashes($_REQUEST['nft_info_attribute_object']);
        $nft_info_attribute_object_collection = addslashes($_REQUEST['nft_info_attribute_object_collection']);
        $nft_info_attribute_object_no = addslashes($_REQUEST['nft_info_attribute_object_no']);
        $nft_info_attribute_border_color = addslashes($_REQUEST['nft_info_attribute_border_color']);
        $nft_info_attribute_border_type = addslashes($_REQUEST['nft_info_attribute_border_type']);
        if(!empty($_FILES['nft_info_image']['name']))
        {
            $mime = $_FILES['nft_info_image']['type'];
            $image_type = '';
            if(strstr($mime, "video/")){
                $image_type = 'video';
            } else if (strstr($mime, "image/gif")) {
                $image_type = 'gif';
            } else if(strstr($mime, "image/")){
                $image_type = 'image';
            } else if(strstr($mime, "audio/")){
                $image_type = 'audio';
            }
            if(!empty($image_type)){
                $file = $_FILES['nft_info_image']['name'];
                $tmp = $_FILES['nft_info_image']['tmp_name'];
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $photo = rand(1000,1000000).$file; 
                $path = '../../images/nft_info_image/'.$photo;
                move_uploaded_file($tmp,$path);

                if(file_exists('../../images/nft_info_image/'.$_REQUEST['old_nft_info_image'])){
                    unlink('../../images/nft_info_image/'.$_REQUEST['old_nft_info_image']);
                }
            }
        }
        else
        {
            $photo = $_REQUEST['old_nft_info_image'];
            $image_type = $_REQUEST['old_nft_info_image_type'];
        }
        if(!empty($_FILES['nft_info_thumbnail']['name']))
        {
            $file1 = $_FILES['nft_info_thumbnail']['name'];
            $tmp1 = $_FILES['nft_info_thumbnail']['tmp_name'];
            $ext1 = pathinfo($file1, PATHINFO_EXTENSION);
            $photo1 = rand(1000,1000000).$file1; 
            $path1 = '../../images/nft_info_image/'.$photo1;
            move_uploaded_file($tmp1,$path1);

            if(file_exists('../../images/nft_info_image/'.$_REQUEST['old_nft_info_thumbnail'])){
                @unlink('../../images/nft_info_image/'.$_REQUEST['old_nft_info_thumbnail']);
            }
        }
        else
        {
            $photo1 = $_REQUEST['old_nft_info_thumbnail'];
        }

        if (!empty($image_type)) {
            $statement = $db->query("UPDATE phtv_nft_info SET `collection_id` = '$selectCollections',`category_id` = '$selectCategory', `name` = '$nft_info_name', `price` = '$nft_info_price',`price_type` = '$selectPriceType', `description` = '$nft_info_description', `sale_id` = '$nft_info_sale_id', `assets_name` = '$nft_info_assets_name', `assets_id` = '$nft_info_assets_id', `meant_no` = '$nft_info_meant_no', `mint` = '$nft_info_mint', `image` = '$photo', `thumbnail` = '$photo1',`image_type` = '$image_type', `duration` = '$nft_info_duration', `attribute_name` = '$nft_info_attribute_name', `attribute_image` = '$nft_info_attribute_image', `attribute_bg_image` = '$nft_info_attribute_bg_image', `attribute_object` = '$nft_info_attribute_object', `attribute_object_collection` = '$nft_info_attribute_object_collection', `attribute_object_no` = '$nft_info_attribute_object_no', `attribute_border_color` = '$nft_info_attribute_border_color', `attribute_border_type` = '$nft_info_attribute_border_type' WHERE id = '$nft_info_id'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Asset Listing updated successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Asset Listing not updated';
            }
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select valid file';
        }
        echo json_encode($reoutput);
    }
?>