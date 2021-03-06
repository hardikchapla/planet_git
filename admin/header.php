<?php
    include '../inc/connection/connection.php';
    require_once '../inc/helper/constant.php';
    require_once '../inc/helper/core_function.php';
    if(empty($_SESSION['adminId'])){
      header("location:index");
    }
    // $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $cur_page = (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']));
    if($cur_page == 'dashboard'){
        $titleName = 'Dashboard';
    }
    if($cur_page == 'admin_profile'){
        $titleName = 'Profile';
    }
    if($cur_page == 'users'){
        $titleName = 'Users';
    }
    if($cur_page == 'product_category'){
        $titleName = 'Product Category';
    }
    if($cur_page == 'product_color'){
        $titleName = 'Product Color';
    }
    if($cur_page == 'product_brand'){
        $titleName = 'Product Brand';
    }
    if($cur_page == 'product_size'){
        $titleName = 'Product Size';
    }
    if($cur_page == 'product_list'){
        $titleName = 'Product List';
    }
    if($cur_page == 'orders'){
        $titleName = 'Orders List';
    }
    if($cur_page == 'order-invoice'){
        $titleName = 'Order Invoice';
    }
    if($cur_page == 'blog_auther'){
        $titleName = 'Auther';
    }
    if($cur_page == 'blog_category'){
        $titleName = 'Blog Category';
    }
    if($cur_page == 'blogs'){
        $titleName = 'Blogs';
    }
    if($cur_page == 'podcast'){
        $titleName = 'Audiocast';
    }
    if($cur_page == 'podcast_episode'){
        $titleName = 'Audiocast Episode';
    }
    if($cur_page == 'nft_category'){
        $titleName = 'Asset Category';
    }
    if($cur_page == 'nft_collection'){
        $titleName = 'Asset Collection';
    }
    if($cur_page == 'nft_listing'){
        $titleName = 'Asset Listing';
    }
    if($cur_page == 'nft_logos'){
        $titleName = 'Asset Logos';
    }
    if($cur_page == 'nft_info'){
        $titleName = 'Asset Info';
    }
    if($cur_page == 'pages'){
        $titleName = 'Pages';
    }
    if($cur_page == 'banner'){
        $titleName = 'Banner';
    }
    if($cur_page == 'price_type'){
        $titleName = 'Asset Type';
    }
    if($cur_page == 'live_24_7'){
        $titleName = 'Live TV';
    }
    if($cur_page == 'live_24_7_category'){
        $titleName = 'Live TV Category';
    }
    if($cur_page == 'live_tv'){
        $titleName = 'PHTV 24/7';
    }
    if($cur_page == 'created_by'){
        $titleName = 'Created By';
    }
    if($cur_page == 'sponsored_by'){
        $titleName = 'Sponsored By';
    }
    if($cur_page == 'high_voltage_category'){
        $titleName = 'High Voltage Category';
    }
    if($cur_page == 'high_voltage_logos'){
        $titleName = 'High Voltage Logos';
    }
    if($cur_page == 'high_voltage_titles'){
        $titleName = 'High Voltage Titles';
    }
    if($cur_page == 'high_voltage_episode'){
        $titleName = 'High Voltage Episode';
    }
    if($cur_page == 'hosts'){
        $titleName = 'Hosts';
    }
    if($cur_page == 'earn_rewards'){
        $titleName = 'Earn Rewards';
    }
    if($cur_page == 'p_h_cinema_type'){
        $titleName = 'P. H. Cinema Type';
    }
    if($cur_page == 'p_h_cinema_categories'){
        $titleName = 'P. H. Cinema Categories';
    }
    if($cur_page == 'p_h_cinema'){
        $titleName = 'P. H. Cinema';
    }
    if($cur_page == 'p_h_cinema_episode'){
        $titleName = 'P. H. Cinema Episode';
    }
   
    $admin = $db->query("SELECT * FROM phtv_admin WHERE id = 1");
    $feadmin = $admin->fetch();
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $titleName ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= FAVICON ?>">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700"
        rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/swiper.min.css">
    <!-- END: Theme CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-invoice.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">

    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <div class="page-loader" id="page-loader">
        <img id='loading' src='../images/loader.gif'>
    </div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);">
                                    <i class="ficon bx bx-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="javascript:void(0);" data-toggle="dropdown">
                                <i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i>
                                <span class="badge badge-pill badge-danger badge-up">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header px-1 py-75 d-flex justify-content-between">
                                        <span class="notification-title">7 new Notification</span>
                                        <span class="text-bold-400 cursor-pointer">Mark all as read</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    <a class="d-flex justify-content-between" href="javascript:void(0);">
                                        <div class="media d-flex align-items-center">
                                            <div class="media-left pr-0">
                                                <div class="avatar mr-1 m-0">
                                                    <img src="app-assets/images/portrait/small/avatar-s-11.jpg"
                                                        alt="avatar" height="39" width="39">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">
                                                    <span class="text-bold-500">Congratulate Socrates Itumay</span> for
                                                    work anniversaries
                                                </h6>
                                                <small class="notification-text">Mar 15 12:32pm</small>
                                            </div>
                                        </div>
                                    </a>
                                <li class="dropdown-menu-footer">
                                    <a class="dropdown-item p-50 text-primary justify-content-center"
                                        href="javascript:void(0)">Read all notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name"><?= $feadmin['admin_name'] ?></span>
                                </div>
                                <span>
                                    <img class="round"
                                        src="<?= ($feadmin['admin_avatar']) ? '../images/'.$feadmin['admin_avatar']:'app-assets/images/portrait/small/avatar-s-11.jpg' ?>"
                                        alt="avatar" height="40" width="40">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0">
                                <a class="dropdown-item" href="admin_profile">
                                    <i class="bx bx-user mr-50"></i> Edit Profile
                                </a>
                                <div class="dropdown-divider mb-0"></div>
                                <a class="dropdown-item" href="resources/logout">
                                    <i class="bx bx-power-off mr-50"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="dashboard">
                        <div class="brand-logo">
                            <img src="../images/planethopper-TV-logo.png">
                        </div>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                        <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary"
                            data-ticon="bx-disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content pt-2">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">
                <li class="nav-item <?php if($cur_page == 'dashboard') {echo 'active';} ?>">
                    <a href="dashboard">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="bxs-dashboard">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item <?php if($cur_page == 'users') {echo 'active';} ?>">
                    <a href="users">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="bxs-dashboard">Users</span>
                    </a>
                </li>

                <li class=" nav-item <?php if($cur_page_main == 'product') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">Star Outpost Store</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'product_category') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="product_category">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Product Category</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'product_color') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="product_color">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Product Color</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'product_brand') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="product_brand">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Product Brand</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'product_size') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="product_size">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Product Size</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'product_list') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="product_list">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Product List</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($cur_page == 'orders') {echo 'active';} ?>">
                    <a href="orders">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="bxs-dashboard">Orders</span>
                    </a>
                </li>
                <li class=" nav-item <?php if($cur_page_main == 'blog') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">Paraverse</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'blog_category') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="blog_category">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Categories</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'blogs') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="blogs">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Blog Entries</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item <?php if($cur_page_main == 'Podcast') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-microphone" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">Audiocasts</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'podcast') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="podcast">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Audiocast</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'podcast_episode') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="podcast_episode">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Audiocast Episode</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item <?php if($cur_page_main == 'NFT') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-diamond" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">DA Marketplace</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'nft_category') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="nft_category">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Asset Category</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'nft_collection') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="nft_collection">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Asset Collection</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'nft_listing') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="nft_listing">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Asset Banners</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'nft_logos') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="nft_logos">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Asset Logos</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'nft_info') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="nft_info">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Asset Listing</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'price_type') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="price_type">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Asset Type</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($cur_page == 'pages') {echo 'active';} ?>">
                    <a href="pages">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="bxs-dashboard">Pages</span>
                    </a>
                </li>
                <li class="nav-item <?php if($cur_page == 'earn_rewards') {echo 'active';} ?>">
                    <a href="earn_rewards">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="bxs-dashboard">Earn Rewards</span>
                    </a>
                </li>
                <li class=" nav-item <?php if($cur_page_main == 'phtv_24_7') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-low-vision" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">PHTV 24/7</span>
                    </a>
                    <ul class="menu-content">
                        <li class="nav-item <?php if($cur_page == 'live_24_7') {echo 'active';} ?>">
                            <a href="live_24_7">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-title text-truncate" data-i18n="bxs-dashboard">PHTV 24/7</span>
                            </a>
                        </li>
                        <li class="nav-item <?php if($cur_page == 'live_24_7_category') {echo 'active';} ?>">
                            <a href="live_24_7_category">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-title text-truncate" data-i18n="bxs-dashboard">PHTV 24/7
                                    Category</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if($cur_page == 'live_tv') {echo 'active';} ?>">
                    <a href="live_tv">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="bxs-dashboard">PHTV Live</span>
                    </a>
                </li>
                <li class="nav-item <?php if($cur_page == 'banner') {echo 'active';} ?>">
                    <a class="d-flex align-items-center" href="banner">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="bxs-dashboard">Banners</span>
                    </a>
                </li>
                <li class=" nav-item <?php if($cur_page_main == 'setting') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">B.T.S People</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'blog_auther') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="blog_auther">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Authors</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'created_by') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="created_by">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Creators</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'hosts') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="hosts">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Hosts</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class=" nav-item <?php if($cur_page_main == 'p_h_cinema_and_audiocast') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">P.H. Cinema & Podcasts</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'hosts') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="hosts">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Host/s</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'created_by') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="created_by">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Creator/s</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'sponsored_by') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="sponsored_by">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">Sponsor/s</span>
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li class=" nav-item <?php if($cur_page_main == 'high_voltage_show') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-bolt" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">High Voltage Show</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'high_voltage_category') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="high_voltage_category">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">High Voltage Category</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'high_voltage_logos') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="high_voltage_logos">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">High Voltage Logos</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'high_voltage_titles') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="high_voltage_titles">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">High Voltage Titles</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'high_voltage_episode') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="high_voltage_episode">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">High Voltage Episode</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item <?php if($cur_page_main == 'p_h_cinema') {echo 'active';} ?>">
                    <a href="#">
                        <i class="fa fa-film" aria-hidden="true"></i>
                        <span class="menu-title text-truncate" data-i18n="Starter kit">P. H. CInema</span>
                    </a>
                    <ul class="menu-content">
                        <li class="<?php if($cur_page == 'p_h_cinema_type') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="p_h_cinema_type">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">P. H. Cinema Types</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'p_h_cinema_categories') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="p_h_cinema_categories">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">P. H. Cinema
                                    Categories</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'p_h_cinema') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="p_h_cinema">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">P. H. Cinema</span>
                            </a>
                        </li>
                        <li class="<?php if($cur_page == 'p_h_cinema_episode') {echo 'active';} ?>">
                            <a class="d-flex align-items-center" href="p_h_cinema_episode">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate" data-i18n="1 column">P. H. Cinema Episode</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->