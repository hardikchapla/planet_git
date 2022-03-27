<?php 
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';

    $blog_id = base64_decode($_REQUEST['id']);
    $blog = $db->query("SELECT * FROM phtv_blog WHERE id = '$blog_id'");
    $feblog = $blog->fetch(PDO::FETCH_ASSOC);
    $likes = $feblog['likes'] + 1;

    $update = $db->query("UPDATE phtv_blog SET likes = '$likes' WHERE id = '$blog_id'");

    header("location:../blog-details?id=".$_REQUEST['id']);
?>