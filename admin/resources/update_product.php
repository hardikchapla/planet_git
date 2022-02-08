<?php
include '../../inc/connection/connection.php';
require_once '../../inc/helper/constant.php';
require_once '../../inc/helper/core_function.php';
if (isset($_POST["product_id"])) {
    $reoutput = array();
    $statement = $db->prepare(
        "SELECT * FROM phtv_product 
			WHERE id = '" . $_POST["product_id"] . "' LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $reoutput["product_brand_id"] = $row["product_brand_id"];
        $reoutput["product_category_id"] = $row["product_category_id"];
        $reoutput["name"] = $row["name"];
        $reoutput["description"] = $row["description"];
        $reoutput["price"] = $row["price"];
        $reoutput["coin_price"] = $row["coin_price"];
        $reoutput["stock"] = $row["stock"];
        $reoutput["additional_info"] = $row["additional_info"];
        $reoutput["is_preorder"] = $row["is_preorder"];
        $aa = array();
        $a = 0;
        $image = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '" . $row['id'] . "'");
        while ($feimage = $image->fetch(PDO::FETCH_ASSOC)) {
            $aa[$a]['id'] = $feimage['id'];
            $aa[$a]['image'] = $feimage['image'];
            $a++;
        }
        $bb = array();
        $b = 0;
        $color = $db->query("SELECT * FROM phtv_product_multi_color WHERE product_id = '" . $row['id'] . "'");
        while ($fecolor = $color->fetch(PDO::FETCH_ASSOC)) {
            $bb[$b] = $fecolor['color_id'];
            $b++;
        }
        $cc = array();
        $c = 0;
        $size = $db->query("SELECT * FROM phtv_product_multi_size WHERE product_id = '" . $row['id'] . "'");
        while ($fesize = $size->fetch(PDO::FETCH_ASSOC)) {
            $cc[$c] = $fesize['size_id'];
            $c++;
        }
        $reoutput['images'] = $aa;
        $reoutput['color'] = $bb;
        $reoutput['size'] = $cc;
    }
    echo json_encode($reoutput);
}