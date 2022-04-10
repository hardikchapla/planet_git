<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $nft_listing_title = addslashes($_REQUEST['nft_listing_title']);
        $nft_listing_description = addslashes($_REQUEST['nft_listing_description']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['nft_listing_thumbnail']['name']))
        {
            $file = $_FILES['nft_listing_thumbnail']['name'];
            $tmp = $_FILES['nft_listing_thumbnail']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/nft_listing_thumbnail/'.$photo;
            move_uploaded_file($tmp,$path);
            
            $statement = $db->query("INSERT INTO phtv_nft_listing SET `title` = '$nft_listing_title',`thumbnail` = '$photo', `description` = '$nft_listing_description', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'NFT Listing added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'NFT Listing not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select NFT Listing Thumbnail';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $nft_listing_id = $_REQUEST['nft_listing_id'];
        $nft_listing_title = addslashes($_REQUEST['nft_listing_title']);
        $nft_listing_description = addslashes($_REQUEST['nft_listing_description']);
        if(!empty($_FILES['nft_listing_thumbnail']['name']))
        {
            $file = $_FILES['nft_listing_thumbnail']['name'];
            $tmp = $_FILES['nft_listing_thumbnail']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/nft_listing_thumbnail/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/nft_listing_thumbnail/'.$_REQUEST['old_nft_listing_thumbnail'])){
                unlink('../../images/nft_listing_thumbnail/'.$_REQUEST['old_nft_listing_thumbnail']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_nft_listing_thumbnail'];
        }
        $statement = $db->query("UPDATE phtv_nft_listing SET `title` = '$nft_listing_title',`thumbnail` = '$photo', `description` = '$nft_listing_description' WHERE id = '$nft_listing_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'NFT Listing updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'NFT Listing not updated';
        }
        echo json_encode($reoutput);
    }
?>