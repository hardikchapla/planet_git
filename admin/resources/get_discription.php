<?php
    $discription = (isset($_REQUEST['description']) && !empty($_REQUEST['description'])) ? base64_decode($_REQUEST['description']):'';
    echo $discription;
?>