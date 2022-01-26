<?php
   include('header.php');
?>

<div class="container-fluid ss_login_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 ">
                <div class="ss_login_box">
                    <div class="login_logo">
                        <img src="images/planethopper-TV-logo.png" alt="login-logo"/>
                    </div>
                    <p>Already have an account? <a href="#"> Login Here </a></p>
                    <form>
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail1"> Username </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" placeholder="Username "
                                           value="Dharshani Arumugam">
                                </div>
                            </div>
                            <div class="col-lg-12 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail2"> E mail </label>
                                    <input type="text" class="form-control" id="exampleInputEmail2"
                                           aria-describedby="emailHelp" placeholder="E mail "
                                           value="dharshani@example.com">
                                </div>
                            </div>
                            <div class="col-lg-6 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail2"> Password </label>
                                    <input type="password" class="form-control" id="exampleInputEmail2"
                                           aria-describedby="emailHelp" placeholder=" Password ">
                                </div>
                            </div>
                            <div class="col-lg-6 text-left">
                                <div class="form-group ss_textbox">
                                    <label for="exampleInputEmail2"> Confirm Password </label>
                                    <input type="password" class="form-control" id="exampleInputEmail2"
                                           aria-describedby="emailHelp" placeholder=" Confirm Password ">
                                </div>
                            </div>
                            <div class="col-lg-12 text-left">
                                <div class="custom-control custom-checkbox mr-sm-2 ss_checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">I agree to the <a
                                            href="#"> Terms of service </a> and <a href="#"> Privacy policy. </a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 pt-4">
                                <button type="submit" class="button_register"> register now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>

<script>
    $('#planet_logo').owlCarousel({
        loop: false,
        margin: 10,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });
</script>
</body>
</html>