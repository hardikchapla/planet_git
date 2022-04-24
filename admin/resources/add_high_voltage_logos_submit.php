<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Add'){
        $reoutput = array();
        $high_voltage_logos_name = addslashes($_REQUEST['high_voltage_logos_name']);
        $created = date("Y-m-d H:i:s");
        if(!empty($_FILES['high_voltage_logos_image']['name']))
        {
            $file = $_FILES['high_voltage_logos_image']['name'];
            $tmp = $_FILES['high_voltage_logos_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/high_voltage_logos/'.$photo;
            move_uploaded_file($tmp,$path);
            
            $statement = $db->query("INSERT INTO phtv_voltage_logo SET `name` = '$high_voltage_logos_name',`image` = '$photo', `created_at` = '$created'");
            if(!empty($statement))
            {
                $reoutput['success'] = 'success';
                $reoutput['message'] = 'High Voltage Logos added successfully';
            } else {
                $reoutput['success'] = 'fail';
                $reoutput['message'] = 'High Voltage Logos not added';
            }
        }
        else
        {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Please select High Voltage Logos Image';
        }
        echo json_encode($reoutput);
    }
    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $high_voltage_logos_id = $_REQUEST['high_voltage_logos_id'];
        $high_voltage_logos_name = addslashes($_REQUEST['high_voltage_logos_name']);
        if(!empty($_FILES['high_voltage_logos_image']['name']))
        {
            $file = $_FILES['high_voltage_logos_image']['name'];
            $tmp = $_FILES['high_voltage_logos_image']['tmp_name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $photo = rand(1000,1000000).$file; 
            $path = '../../images/high_voltage_logos/'.$photo;
            move_uploaded_file($tmp,$path);

            if(file_exists('../../images/high_voltage_logos/'.$_REQUEST['old_high_voltage_logos_image'])){
                @unlink('../../images/high_voltage_logos/'.$_REQUEST['old_high_voltage_logos_image']);
            }
        }
        else
        {
            $photo = $_REQUEST['old_high_voltage_logos_image'];
        }
        $statement = $db->query("UPDATE phtv_voltage_logo SET `name` = '$high_voltage_logos_name',`image` = '$photo' WHERE id = '$high_voltage_logos_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'High Voltage Logos updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'High Voltage Logos not updated';
        }
        echo json_encode($reoutput);
    }
?>