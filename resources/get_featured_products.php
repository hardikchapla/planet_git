<?php
include '../inc/connection/connection.php';
require_once '../inc/helper/constant.php';
require_once '../inc/helper/core_function.php';
$start = $_REQUEST['start'];
$limit = $_REQUEST['limit'];
$product = $db->query("SELECT avg(a.rating) as review_rate, a.*, b.* FROM phtv_product_review a LEFT JOIN phtv_product b ON a.product_id = b.id GROUP BY a.product_id ORDER BY review_rate DESC LIMIT $start,$limit");
$response = '';
while ($feproduct = $product->fetch()) {
    $pimage = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '" . $feproduct['product_id'] . "' LIMIT 1");
    $fepimage = $pimage->fetch();
    $response .= '<div class="col-lg-3 col-sm-6">
                    <div class="ss_products_boxi">
                        <div class="images">
                            <img src="images/product/' . $fepimage['image'] . '" alt="images" />
                            <div class="ss_button">
                                <a href="product-detail.php?item=' . $feproduct['product_id'] . '"> Product Info </a>
                            </div>
                        </div>
                        <div class="_ss_product_des">
                            <h3>' . $feproduct['name'] . '</h3>
                            <p> $ ' . $feproduct['price'] . ' </p>

                        </div>
                    </div>
                </div>';
}
echo $response;