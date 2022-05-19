<?php
    include '../../inc/connection/connection.php';
    require_once '../../inc/helper/constant.php';
    require_once '../../inc/helper/core_function.php';

    if($_REQUEST['action'] == 'Edit'){
        $reoutput = array();
        $earn_rewards_id = $_REQUEST['earn_rewards_id'];
        $earn_rewards_description = addslashes($_REQUEST['earn_rewards_description']);
        $statement = $db->query("UPDATE phtv_earn_rewards SET `description` = '$earn_rewards_description' WHERE id = '$earn_rewards_id'");
        if(!empty($statement))
        {
            $reoutput['success'] = 'success';
            $reoutput['message'] = 'Earn rewards updated successfully';
        } else {
            $reoutput['success'] = 'fail';
            $reoutput['message'] = 'Earn rewards not updated';
        }
        echo json_encode($reoutput);
    }