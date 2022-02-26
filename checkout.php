<?php
    include('header.php');
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
                                $feuser = array();
                                if(!isset($_SESSION['userid']) && empty($_SESSION['userid'])){
                            ?>
                            <div class=" bd-highlight ">
                                <h3>Returning User? <a href="login"> Log In here </a></h3>
                            </div>
                            <?php
                                } else {
                                    $user_id = $_SESSION['userid'];
                                    $user = $db->query("SELECT * FROM `phtv_users` WHERE id = '$user_id'");
                                    $feuser = $user->fetch();
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
                                <input type="text" name="address" class="form-control"
                                    placeholder="Please Enter address" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> City </label>
                                <input type="text" name="city" class="form-control" placeholder="Please Enter City"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> State </label>
                                <input type="text" name="state" class="form-control" placeholder="Please Enter State"
                                    required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ss_informationss">
                                <label> Zip Code </label>
                                <input type="text" name="zipcode" class="form-control"
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
                                        <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" id="item_name" name="item_name" value="test">
                                        <input type="hidden" id="item_number" name="item_number" value="1">
                                        <input type="hidden" id="total_amount_paypal" name="amount" value="100">
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
Stripe.setPublishableKey("<?= STRIPE_PUBLISHABLE_KEY ?>");
$(function() {
    var $form = $('#payment-form');
    $form.submit(function(event) {
        // Disable the submit button to prevent repeated clicks:
        $form.find('.submit').prop('disabled', true);

        // Request a token from Stripe:
        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from being submitted:
        return false;
    });
});

function stripeResponseHandler(status, response) {
    // Grab the form:
    var $form = $('#payment-form');

    if (response.error) { // Problem!
        // Show the errors on the form:
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.submit').prop('disabled', false); // Re-enable submission
    } else { // Token was created!
        // Get the token ID:
        var token = response.id;

        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));
        // Submit the form:
        $form.get(0).submit();
    }
};
</script>
<!-- <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
        sandbox: 'Aao6G3UwmeqLLsNb3Pn1gTa5JSY2QGXgBm4wRyYKJGZMb8f1FiHQ6ZFFu0Jc9Zf8pFuqfaNcy3ZL1DIx',
        production: 'Aao6G3UwmeqLLsNb3Pn1gTa5JSY2QGXgBm4wRyYKJGZMb8f1FiHQ6ZFFu0Jc9Zf8pFuqfaNcy3ZL1DIx'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'small',
        color: 'gold',
        shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '0.01',
                    currency: 'USD'
                }
            }]
        });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            console.log(data);
            console.log("--------------------");
            console.log(actions);
            // Show a confirmation message to the buyer
            window.alert('Thank you for your purchase!');
        });
    }
}, '#paypal-button');
</script> -->
</body>

</html>