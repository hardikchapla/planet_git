<?php
include('../../inc/connection/connection.php');
$reoutput = array();
$query = "SELECT * FROM phtv_product";
$statement = $db->query($query);
$result = $statement->fetchAll();
$data = array();
$i = 1;
foreach ($result as $row) {
    $product_image = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '" . $row['id'] . "' LIMIT 1");
    $feproduct_image = $product_image->fetch(PDO::FETCH_ASSOC);

    $product_category = $db->query("SELECT * FROM phtv_product_category WHERE id = '" . $row['product_category_id'] . "'");
    $feproduct_category = $product_category->fetch(PDO::FETCH_ASSOC);

    $product_brand = $db->query("SELECT * FROM phtv_product_brand WHERE id = '" . $row['product_brand_id'] . "'");
    $feproduct_brand = $product_brand->fetch(PDO::FETCH_ASSOC);

    $image = "";
    if (empty($feproduct_image['image'])) {
        $image = '<img src="../images/product/default.png" style = "border-radius: 40px" width="40" height="40" />';
    } else {
        $image = '<img src="../images/product/' . $feproduct_image["image"] . '" style = "border-radius: 40px" width="40" height="40" />';
    }
    $sub_array = array();
    $sub_array[] = $i;
    $sub_array[] = $image;
    $sub_array[] = $row["name"];
    $sub_array[] = $feproduct_brand["name"];
    $sub_array[] = $feproduct_category["category_name"];
    $sub_array[] = $row["price"];
    $sub_array[] = $row["stock"];
    if ($row["is_preorder"] == 1) {
        $sub_array[] = "Yes";
    } else {
        $sub_array[] = "No";
    }
    $sub_array[] = '<button class="btn btn-primary fa fa-pencil updateProduct" data-toggle="modal" data-target="#updateProduct" type="button" id="' . $row["id"] . '"></button>';
    $sub_array[] = '<button class="btn btn-danger fa fa-trash deleteProduct" type="button" id="' . $row["id"] . '" ></button>';
    $data[] = $sub_array;
    $i++;
}
$reoutput = array(
    "data" => $data
);
echo json_encode($reoutput);