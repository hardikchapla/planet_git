<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $nft_logos_name = addslashes($_REQUEST['nft_logos_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['nft_logos_image']['name']))
        {
            $file = $_FILES['nft_logos_image']['name'];
            $tmp = $_FILES['nft_logos_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/nft_logos/'.$photo;
            move_uploaded_file($tmp,$path);
            
            $statement = $db->query("INSERT INTO phtv_nft_logos SET `name` = '$nft_logos_name',`image` = '$photo', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'NFT Logos added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'NFT Logos not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select NFT Logos Image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $nft_logos_id = $_REQUEST['nft_logos_id'];
        $nft_logos_name = addslashes($_REQUEST['nft_logos_name']);
        if(!empty($_FILES['old_nft_logos_image']['name']))
        {
            $file = $_FILES['old_nft_logos_image']['name'];
            $tmp = $_FILES['old_nft_logos_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/nft_logos/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/nft_logos/'.$_REQUEST['old_nft_logos_image'])){
                unlink('../../images/nft_logos/'.$_REQUEST['old_nft_logos_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_nft_logos_image'];
        }
        $statement = $db->query("UPDATE phtv_nft_logos SET `name` = '$nft_logos_name',`image` = '$photo' WHERE id = '$nft_logos_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'NFT Logos updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'NFT Logos not updated';
        }
        echo json_encode($reoutput);
    }
?>