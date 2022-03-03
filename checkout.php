<?php
    include('header.php');
    $apply_coin = "false";
    if(isset($_REQUEST['applycoin']) && !empty($_REQUEST['applycoin'])){
        $apply_coin = $_REQUEST['applycoin'];
    }
    $feuser = array();
    $coin_balance = 0;
    if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
        $system_user_id = $_SESSION['system_user_id'];
        $cart = $db->query("SELECT sum(total_amount) as cart_total_amount, sum(total_coin_amount) as total_coin_amount, sum(qty) as total_qty FROM phtv_product_cart WHERE system_user_id = '$system_user_id'");
        $fecart = $cart->fetch(PDO::FETCH_ASSOC);
    } else {
        $user_id = $_SESSION['userid'];
        $cart = $db->query("SELECT sum(total_amount) as cart_total_amount, sum(total_coin_amount) as total_coin_amount, sum(qty) as total_qty FROM phtv_product_cart WHERE user_id = '$user_id'");
        $fecart = $cart->fetch(PDO::FETCH_ASSOC);
        $user = $db->query("SELECT * FROM `phtv_users` WHERE id = '$user_id'");
        $feuser = $user->fetch();
        $coin_balance = $feuser['coin_balance'];
    }
    $total_amount = $fecart['cart_total_amount'];
    $total_coin_amount = $fecart['total_coin_amount'];
    $total_main = $total_amount - $total_coin_amount;
    $total_paid_amount = $fecart['cart_total_amount'];
    $total_coin_used = 0;
    if($coin_balance >= $total_main && $apply_coin == 'true'){
        $total_paid_amount = $total_paid_amount - $total_main;
        $total_coin_used = $total_main;
    } elseif ($coin_balance > 0 && $apply_coin == 'true') {
        $total_paid_amount = $total_paid_amount - $coin_balance;
        $total_coin_used = $coin_balance;
    }
    $total_paid_amount = number_format($total_paid_amount, 2);
    $total_coin_used = number_format($total_coin_used,2);
    $_SESSION['total_coin_used'] = $total_coin_used;
?>

<div class="container-fluid ss_header_my_profies">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2> Checkout </h2>
                <div class="liness"></div>
                <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                    personal digital assistants.
                    Facebook and Microsoft announced major investments into conversational.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_shopping_cart_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ss_shopping_box">
                    <div class="ss_complated">
                        <a href="#"> <img src="images/shopping.svg" alt="images"> Completed </a>
                    </div>
                    <div class="ss_shopping_process">
                        <div class="d-flex bd-highlight justify-content-center">
                            <div class="p-2  bd-highlight align-self-center ">
                                <a href="shopping-cart" class="ss_Shopping_boxi">
                                    Shopping Cart
                                    <div class="boxiA">1</div>
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center ss_right_arrowss">
                                <a href="checkout" class="">
                                    <img src="images/right_arrow.svg" alt="images" />
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center active">
                                <a href="checkout" class="ss_Shopping_boxi">
                                    Checkout
                                    <div class="boxiA">2</div>
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center ss_right_arrowss">
                                <a href="completed" class="">
                                    <img src="images/right_arrow.svg" alt="images" />
                                </a>
                            </div>
                            <div class="p-2  bd-highlight align-self-center">
                                <a href="completed" class="ss_Shopping_boxi">
                                    Completed
                                    <div class="boxiA">3</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_checkout_sections">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="">
                    <div class="ss_checkoutss">
                        <div class=" d-flex bd-highlight ">
                            <div class=" mr-auto  bd-highlight ">
                                <h2>Information</h2>
                            </div>
                            <?php
                                if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
                            ?>
                            <div class=" bd-highlight ">
                                <h3>Returning User? <a href="login"> Log In here </a></h3>
                            </div>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> Full Name </label>
                                <input type="text" name="full_name" class="form-control"
                                    value="<?= isset($feuser['full_name']) ? $feuser['full_name'] :'' ?>"
                                    placeholder="Please Enter Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> Email </label>
                                <input type="email" name="email"
                                    value="<?= isset($feuser['email']) ? $feuser['email'] :'' ?>" class="form-control"
                                    placeholder="Please Enter email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> mobile number </label>
                                <input type="text" name="mobile"
                                    value="<?= isset($feuser['mobile']) ? $feuser['mobile'] :'' ?>" class="form-control"
                                    placeholder="Please Enter mobile number">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> address </label>
                                <input type="text" id="main_address" name="address" class="form-control"
                                    placeholder="Please Enter address" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> City </label>
                                <input type="text" id="main_city" name="city" class="form-control"
                                    placeholder="Please Enter City" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> State </label>
                                <input type="text" id="main_state" name="state" class="form-control"
                                    placeholder="Please Enter State" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> Zip Code </label>
                                <input type="text" id="main_zipcode" name="zipcode" class="form-control"
                                    placeholder="Please Enter Zip Code" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="">
                    <div class="ss_checkoutss">
                        <div class=" d-flex bd-highlight ">
                            <div class=" mr-auto  bd-highlight ">
                                <h2>Payment Method</h2>
                            </div>
                        </div>
                    </div>
                    <nav class="pt-4 ss_credit_card_tabs">
                        <div class="nav  " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">
                                <div class="d-flex bd-highlight">
                                    <div class="pr-2 bd-highlight align-self-center">
                                        <img src="images/Credit_Card.svg" alt="images" />
                                    </div>
                                    <div class="bd-highlight align-self-center">
                                        <h6> Credit Card </h6>
                                    </div>
                                </div>
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                role="tab" aria-controls="nav-profile" aria-selected="false">

                                <div class="d-flex bd-highlight">
                                    <div class="pr-2 bd-highlight align-self-center">
                                        <img src="images/icons8-paypal.svg" alt="images" />
                                    </div>
                                    <div class="bd-highlight align-self-center">
                                        <h6> Paypal </h6>
                                    </div>
                                </div>

                            </a>
                            <a class="nav-item nav-link" id="nav-stripe-tab" data-toggle="tab" href="#nav-stripe"
                                role="tab" aria-controls="nav-stripe" aria-selected="false">

                                <div class="d-flex bd-highlight">
                                    <div class="pr-2 bd-highlight align-self-center">
                                        <img src="images/icons8-cash-app.svg" alt="images" />
                                    </div>
                                    <div class="bd-highlight align-self-center">
                                        <h6> Stripe </h6>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="row py-4">
                                <div class="col-lg-12">
                                    <div class="form-group ss_informationss">
                                        <label> Card Number </label>
                                        <input type="text" class="form-control" value="2525 8565 8565"
                                            placeholder="Please Enter Card Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> CVV </label>
                                        <input type="password" class="form-control" value="526"
                                            placeholder="Please Enter CVV">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> expiry date </label>
                                        <input type="text" class="form-control" value="12-12-2021"
                                            placeholder="Please Enter expiry date">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ss_place_order"> Place Order</button>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <!-- <div class="row py-4">
                                <div class="col-lg-12">
                                    <div class="form-group ss_informationss">
                                        <label> Card Number </label>
                                        <input type="text" class="form-control" value="2525 8565 8565"
                                            placeholder="Please Enter Card Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> CVV </label>
                                        <input type="password" class="form-control" value="526"
                                            placeholder="Please Enter CVV">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ss_informationss">
                                        <label> expiry date </label>
                                        <input type="text" class="form-control" value="12-12-2021"
                                            placeholder="Please Enter expiry date">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ss_place_order"> Place Order</button> -->
                            <div class="row py-4">
                                <div class="col-lg-12 text-center">
                                    <form action="<?php echo PAYPAL_URL; ?>" method="post">
                                        <input type="hidden" name="first_name"
                                            value="<?= isset($feuser['full_name']) ? $feuser['full_name'] :'' ?>">
                                        <input type="hidden" name="last_name"
                                            value="<?= isset($feuser['full_name']) ? $feuser['full_name'] :'' ?>">
                                        <input type="hidden" name="email"
                                            value="<?= isset($feuser['email']) ? $feuser['email'] :'' ?>">
                                        <input type="hidden" name="night_phone_a"
                                            value="<?= isset($feuser['mobile']) ? $feuser['mobile'] :'' ?>">
                                        <input type="hidden" name="discount_amount_cart" id="discount_amount_cart"
                                            value="<?= $total_coin_used ?>">
                                        <input type="hidden" name="address1" id="paypal_address" value="">
                                        <input type="hidden" name="city" id="paypal_city" value="">
                                        <input type="hidden" name="state" id="paypal_state" value="">
                                        <input type="hidden" name="zip" id="paypal_zipcode" value="">
                                        <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" id="item_name" name="item_name" value="test">
                                        <input type="hidden" id="item_number" name="item_number"
                                            value="<?= $fecart['total_qty'] ?>">
                                        <input type="hidden" id="total_amount_paypal" name="amount"
                                            value="<?= $total_paid_amount ?>">
                                        <input type="hidden" name="rm" value="2">
                                        <input type="hidden" name="currency_code"
                                            value="<?php echo PAYPAL_CURRENCY; ?>">
                                        <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                                        <input type="hidden" name="cancel_return"
                                            value="<?php echo PAYPAL_CANCEL_URL; ?>">
                                        <button type="image" name="submit" class="btn btn-warning"><img
                                                src="images/download.svg"></button>
                                    </form>
                                    <!-- <div id="paypal-button"></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-stripe" role="tabpanel" aria-labelledby="nav-stripe-tab">
                            <form action="resources/stripesubmit.php" name="cardpayment" id="payment-form">
                                <div class="row py-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ss_informationss">
                                            <label> Card Number </label>
                                            <input type="text" name="cardnumber" id="card" maxlength="16"
                                                data-stripe="number" required class="form-input form-control"
                                                placeholder="Please Enter Card Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ss_informationss">
                                            <label> CVV </label>
                                            <input type="text" name="cvv" id="cvv" class="form-input2 form-control"
                                                placeholder="Please Enter CVV" data-stripe="cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ss_informationss">
                                            <label> expiry date </label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="text" class="form-input2 form-control" name="month"
                                                        id="month" data-stripe="exp_month" placeholder="MM">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" name="year" id="year"
                                                        class="form-input2 form-control" data-stripe="exp_year"
                                                        placeholder="YYYY" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="payment-errors"></div>
                                    </div>
                                </div>
                                <button type="submit" value="stripe" name="payment_type" class="ss_place_order"
                                    id="makePayment"> Place
                                    Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ss_advertise">
                    <h2>Add Banner</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>
<script>
$("#main_address").keyup(function() {
    var main_address = $(this).val();
    $('#paypal_address').val(main_address);
});
$("#main_city").keyup(function() {
    var main_city = $(this).val();
    $('#paypal_city').val(main_city);
});
$("#main_state").keyup(function() {
    var main_state = $(this).val();
    $('#paypal_state').val(main_state);
});
$("#main_zipcode").keyup(function() {
    var main_zipcode = $(this).val();
    $('#paypal_zipcode').val(main_zipcode);
});
</script>
</body>

</html>