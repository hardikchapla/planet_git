<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $nft_info_name = addslashes($_REQUEST['nft_info_name']);
        $nft_info_price = addslashes($_REQUEST['nft_info_price']);
        $nft_info_description = addslashes($_REQUEST['nft_info_description']);
        $selectCategory = $_REQUEST['selectCategory'];
        $selectCollections = $_REQUEST['selectCollections'];
        $nft_info_sale_id = addslashes($_REQUEST['nft_info_sale_id']);
        $nft_info_assets_name = addslashes($_REQUEST['nft_info_assets_name']);
        $nft_info_assets_id = addslashes($_REQUEST['nft_info_assets_id']);
        $nft_info_meant_no = addslashes($_REQUEST['nft_info_meant_no']);
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
        if(!empty($_FILES['nft_info_image']['name']))
        {
            $file = $_FILES['nft_info_image']['name'];
            $tmp = $_FILES['nft_info_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/nft_info_image/'.$photo;
            move_uploaded_file($tmp,$path);
            
            $statement = $db->query("INSERT INTO phtv_nft_info SET `collection_id` = '$selectCollections',`category_id` = '$selectCategory', `name` = '$nft_info_name', `price` = '$nft_info_price', `description` = '$nft_info_description', `sale_id` = '$nft_info_sale_id', `assets_name` = '$nft_info_assets_name', `assets_id` = '$nft_info_assets_id', `meant_no` = '$nft_info_meant_no', `image` = '$photo', `duration` = '$nft_info_duration', `attribute_name` = '$nft_info_attribute_name', `attribute_image` = '$nft_info_attribute_image', `attribute_bg_image` = '$nft_info_attribute_bg_image', `attribute_object` = '$nft_info_attribute_object', `attribute_object_collection` = '$nft_info_attribute_object_collection', `attribute_object_no` = '$nft_info_attribute_object_no', `attribute_border_color` = '$nft_info_attribute_border_color', `attribute_border_type` = '$nft_info_attribute_border_type', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'NFT Info added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'NFT Info not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select NFT Info Image';
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
        $nft_info_sale_id = addslashes($_REQUEST['nft_info_sale_id']);
        $nft_info_assets_name = addslashes($_REQUEST['nft_info_assets_name']);
        $nft_info_assets_id = addslashes($_REQUEST['nft_info_assets_id']);
        $nft_info_meant_no = addslashes($_REQUEST['nft_info_meant_no']);
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
        else
        {
            $photo = $_REQUEST['old_nft_listing_thumbnail'];
        }
        $statement = $db->query("UPDATE phtv_nft_info SET `collection_id` = '$selectCollections',`category_id` = '$selectCategory', `name` = '$nft_info_name', `price` = '$nft_info_price', `description` = '$nft_info_description', `sale_id` = '$nft_info_sale_id', `assets_name` = '$nft_info_assets_name', `assets_id` = '$nft_info_assets_id', `meant_no` = '$nft_info_meant_no', `image` = '$photo', `duration` = '$nft_info_duration', `attribute_name` = '$nft_info_attribute_name', `attribute_image` = '$nft_info_attribute_image', `attribute_bg_image` = '$nft_info_attribute_bg_image', `attribute_object` = '$nft_info_attribute_object', `attribute_object_collection` = '$nft_info_attribute_object_collection', `attribute_object_no` = '$nft_info_attribute_object_no', `attribute_border_color` = '$nft_info_attribute_border_color', `attribute_border_type` = '$nft_info_attribute_border_type' WHERE id = '$nft_info_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'NFT Info updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'NFT Info not updated';
        }
        echo json_encode($reoutput);
    }
?>