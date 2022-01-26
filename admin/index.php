<?php
    include('../inc/helper/constant.php');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
   <!-- BEGIN: Head-->
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Login</title>
      <link rel="shortcut icon" type="image/x-icon" href="<?= FAVICON ?>">
      <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
      <!-- BEGIN: Vendor CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
      <!-- END: Vendor CSS-->
      <!-- BEGIN: Theme CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
      <!-- END: Theme CSS-->
      <!-- BEGIN: Page CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
      <!-- END: Page CSS-->
      <!-- BEGIN: Custom CSS-->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <!-- END: Custom CSS-->
      <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.css">
      <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/toastr.min.css">
   </head>
   <!-- END: Head-->
   <!-- BEGIN: Body-->
   <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
      <!-- BEGIN: Content-->
      <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <!-- login page start -->
               <section id="auth-login" class="row flexbox-container">
                  <div class="col-xl-8 col-11">
                     <div class="card bg-authentication mb-0">
                        <div class="row m-0">
                           <!-- left section-login -->
                           <div class="col-md-6 col-12 px-0">
                              <div class="page-loader" id="page-loader">
                                 <img id='loading' src='../images/loader.gif'>
                              </div>
                              <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                 <div class="card-header pb-1">
                                    <div class="card-title ss_login_titles">
                                       <h4 class="text-center mb-2"><span>Login</span> To Your Account</h4>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <form method="post" name="login-form" id="login-form">
                                       <div class="form-group mb-50">
                                          <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                          <input type="email" class="form-control" id="admin_emailid"
                                             placeholder="Email address" name="admin_emailid" required>
                                       </div>
                                       <div class="form-group">
                                          <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                          <input type="password" class="form-control" id="admin_password"
                                             placeholder="Password" required name="admin_password">
                                       </div>
                                       <div class="form-group justify-content-between align-items-center">
                                            <div class="text-right">
                                              <a href="forgot-password" class="card-link"><small>Forgot Password?</small></a>
                                            </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary glow w-100 position-relative">Login
                                           <i id="icon-arrow" class="bx bx-right-arrow-alt"></i>
                                        </button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <!-- right section image -->
                           <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                              <img class="img-fluid" src="app-assets/images/login.png" alt="branding logo">
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- login page ends -->
            </div>
         </div>
      </div>
      <!-- END: Content-->
      <!-- BEGIN: Vendor JS-->
      <script src="app-assets/vendors/js/vendors.min.js"></script>
      <!-- BEGIN: Theme JS-->
      <script src="app-assets/js/scripts/configs/vertical-menu-light.min.js"></script>
      <script src="app-assets/js/core/app-menu.min.js"></script>
      <script src="app-assets/js/scripts/components.min.js"></script>
      <script src="app-assets/js/scripts/footer.min.js"></script>
      <!-- END: Theme JS-->
      <script src="assets/js/custom.js"></script>
      <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
      <script src="app-assets/js/scripts/extensions/toastr.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
   </body>
   <!-- END: Body-->
</html>