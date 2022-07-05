<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $created = date("Y-m-d H:i:s");
        $nft_collection_name = addslashes($_REQUEST['nft_collection_name']);
        if(!empty($_FILES['nft_collection_image']['name']))
        {
            $file = $_FILES['nft_collection_image']['name'];
            $tmp = $_FILES['nft_collection_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/nft_collection/'.$photo;
            move_uploaded_file($tmp,$path);

            $statement = $db->query("INSERT INTO phtv_nft_collection SET `name` = '$nft_collection_name', `logo` = '$photo'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'Asset Collection added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'Asset Collection not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select Asset collection logo';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $nft_collection_id = $_REQUEST['nft_collection_id'];
        $nft_collection_name = addslashes($_REQUEST['nft_collection_name']);
        if(!empty($_FILES['nft_collection_image']['name']))
        {
            $file = $_FILES['nft_collection_image']['name'];
            $tmp = $_FILES['nft_collection_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/nft_collection/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/nft_collection/'.$_REQUEST['old_nft_collection_image'])){
                unlink('../../images/nft_collection/'.$_REQUEST['old_nft_collection_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_nft_collection_image'];
        }
        $statement = $db->query("UPDATE phtv_nft_collection SET `name` = '$nft_collection_name',`logo` = '$photo' WHERE id = '$nft_collection_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Asset Collection updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Asset Collection not updated';
        }
        echo json_encode($reoutput);
    }
?>