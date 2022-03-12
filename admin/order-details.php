<?php
include('header.php');
$order_id = base64_decode($_REQUEST['id']);
$order = $db->query("SELECT * FROM phtv_product_order WHERE id = '$order_id'");
$feorder = $order->fetch(PDO::FETCH_ASSOC);

$order_item = $db->query("SELECT a.*,b.name  FROM phtv_product_order_items a, phtv_product b WHERE a.product_id = b.id AND a.order_id = '$order_id'");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- app invoice View Page -->
            <section class="invoice-view-wrapper">
                <div class="row">
                    <!-- invoice view page -->
                    <div class="col-xl-12 col-md-12 col-12">
                        <div class="card invoice-print-area">
                            <div class="card-body pb-0 mx-25">
                                <!-- header section -->
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <span class="invoice-number mr-50">Invoice#</span>
                                        <span><?= $feorder['invoice_no'] ?></span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                                            <div>
                                                <small class="text-muted">Date:</small>
                                                <span><?= date('d/m/Y',strtotime($feorder['created_at'])) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- logo and title -->
                                <div class="row my-2 my-sm-3">
                                    <div class="col-sm-12 col-12 text-center order-2 order-sm-1">
                                        <h4 class="text-primary">Order Details</h4>
                                    </div>
                                </div>
                                <hr>
                                <!-- invoice address and contact -->
                                <div class="row invoice-info">
                                    <div class="col-sm-6 col-12 mt-1">
                                        <h6 class="invoice-from">Bill From</h6>
                                        <div class="mb-1">
                                            <span>Clevision PVT. LTD.</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>9205 Whitemarsh Street New York, NY 10002</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>hello@clevision.net</span>
                                        </div>
                                        <div class="mb-1">
                                            <span>601-678-8022</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 mt-1">
                                        <h6 class="invoice-to">Bill To</h6>
                                        <div class="mb-1">
                                            <span><?= $feorder['full_name'] ?></span>
                                        </div>
                                        <div class="mb-1">
                                            <span><?= $feorder['address'] ?>, <?= $feorder['city'] ?>,
                                                <?= $feorder['state'] ?> - <?= $feorder['zip'] ?></span>
                                        </div>
                                        <div class="mb-1">
                                            <span><?= $feorder['email'] ?></span>
                                        </div>
                                        <div class="mb-1">
                                            <span><?= $feorder['mobile'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <!-- product details table-->
                            <div class="invoice-product-details table-responsive">
                                <table class="table table-borderless mb-0">
                                    <thead>
                                        <tr class="border-0">
                                            <th scope="col">Image</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Used Coin</th>
                                            <th scope="col" class="text-right">Final Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($feitems = $order_item->fetch(PDO::FETCH_ASSOC)) { 
                                            $product_id = $feitems['product_id'];
                                            $image = $db->query("SELECT * FROM phtv_product_images WHERE product_id = '$product_id' LIMIT 0,1");  
                                            $feimage = $image->fetch(PDO::FETCH_ASSOC);  
                                        ?>
                                        <tr>
                                            <td><img style="border-radius: 40px" width="40" height="40"
                                                    src="<?= IMGURL.'product/'.$feimage['image'] ?>"></td>
                                            <td><?= $feitems['name'] ?></td>
                                            <td><?= $feitems['amount'] ?></td>
                                            <td><?= $feitems['qty'] ?></td>
                                            <td><?= $feitems['total_amount'] ?></td>
                                            <td><?= $feitems['couns_used'] ?></td>
                                            <td class="text-primary text-right font-weight-bold">
                                                $<?= $feitems['total_amount'] - $feitems['couns_used'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- invoice subtotal -->
                            <div class="card-body pt-0 mx-25">
                                <hr>
                                <div class="row">
                                    <div class="col-4 col-sm-6 col-12 mt-75">
                                        <p>Payment Method: <b><?= $feorder['payment_type'] ?></b></p>
                                    </div>
                                    <div class="col-8 col-sm-6 col-12 d-flex justify-content-end mt-75">
                                        <div class="invoice-subtotal">
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title">Subtotal</span>
                                                <span class="invoice-value">$<?= $feorder['final_amount'] ?></span>
                                            </div>
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title">Discount</span>
                                                <span class="invoice-value">- $<?= $feorder['total_used_coin'] ?></span>
                                            </div>
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title">Tax</span>
                                                <span class="invoice-value">0%</span>
                                            </div>
                                            <hr>
                                            <div class="invoice-calc d-flex justify-content-between">
                                                <span class="invoice-title">Invoice Total</span>
                                                <span class="invoice-value">$<?= $feorder['total_amount'] ?></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

<?php
include('footer.php');
?>