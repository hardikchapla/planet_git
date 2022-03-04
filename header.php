<?php
    include('inc/connection/connection.php');
    include('inc/helper/constant.php');
    
    $cur_page = (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']));
    $weAreLive = 0;
    if($cur_page == 'planet_git' || $cur_page == 'index'){
        $titleName = 'Home | Planet Hopper TV';
        $active_home = "active";
    }
    if($cur_page == 'blog-details'){
        $titleName = 'Blog | Details';
    }
    if($cur_page == 'blog'){
        $titleName = 'Blog | Planet Hopper TV';
        $active_blog = "active";
    }
    if($cur_page == 'change-password'){
        $titleName = 'Profile | Change Password';
    }
    if($cur_page == 'checkout'){
        $titleName = 'Checkout';
    }
    if($cur_page == 'cinematics'){
        $titleName = 'Cinematics';
        $active_cinematics = "active";
    }
    if($cur_page == 'completed'){
        $titleName = 'Completed shopping';
    }
    if($cur_page == 'high-voltage-show'){
        $titleName = 'High Voltage Show';
        $active_highVoltageShow = "active";
    }
    if($cur_page == 'high-voltage-show-details'){
        $titleName = 'High Voltage Details';
        $active_highVoltageShow = "active";
    }
    if($cur_page == 'live-chat'){
        $titleName = 'Live Stream';
        $active_liveChat = "active";
        $weAreLive = 1;
    }
    if($cur_page == 'liveTV'){
        $titleName = 'Live TV';
        $active_liveTv = "active";
    }
    if($cur_page == 'login'){
        $titleName = 'Login';
    }
    if($cur_page == 'message'){
        $titleName = 'Messages';
    }
    if($cur_page == 'my-order'){
        $titleName = 'Order list';
    }
    if($cur_page == 'nft-marketplace-details'){
        $titleName = 'NFT Marketplace details';
        $active_NFTMarketplace = "active";
    }
    if($cur_page == 'nft-marketplace'){
        $titleName = 'NFT Marketplace';
        $active_NFTMarketplace = "active";
    }
    if($cur_page == 'order-tracking'){
        $titleName = 'Order tracking';
    }
    if($cur_page == 'podcasts'){
        $titleName = 'Podcasts';
        $active_podcasts = "active";
    }
    if($cur_page == 'product-detail'){
        $titleName = 'Product detail';
        $active_product = "active";
    }
    if($cur_page == 'product'){
        $titleName = 'Product';
        $active_product = "active";
    }
    if($cur_page == 'profile'){
        $titleName = 'Profile';
    }
    if($cur_page == 'register'){
        $titleName = 'Register';
    }
    if($cur_page == 'shopping-cart'){
        $titleName = 'Shopping Cart';
    }
    if($cur_page == 'supercoin-balance'){
        $titleName = 'Supercoin Balance';
    }
    if($cur_page == 'forgot-password'){
        $titleName = 'Forgot Password';
    }
    if($cur_page == 'activate'){
        $titleName = 'Verify Account';
    }
    if($cur_page == 'live-events'){
        $titleName = 'Live Events';
    }

      

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?= FAVICON ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="slider-plugin/owl.carousel.css" type="text/css" />
    <link rel="stylesheet" href="slider-plugin/owl.theme.default.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/toastr.css" type="text/css">
    <link rel="stylesheet" href="css/media_query.css" type="text/css">
    <title> <?= $titleName ?> </title>
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div class="container-fluid header_ss">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex bd-highlight ss_display_desk">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <div class="ss_logo">
                                <img src="images/planethopper-TV-logo.png" alt="logo">
                                <?php
                                if($weAreLive == 1){ ?>
                                <div class="werelive_ss">
                                    <img src="images/Werelive.png" alt="images" />
                                </div>
                                <?php
                                }
                            ?>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight">
                            <div class="search_box">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text ss_search_btn" id="basic-addon2">Search</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight ">
                            <div class="ss_social_media">
                                <a href="#"> <img src="images/instagram.svg" alt="youtube"> </a>
                                <a href="#"> <img src="images/soundcloud.svg" alt="youtube"> </a>
                                <a href="#"> <img src="images/tik-tok.svg" alt="youtube"> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 aa_main_header">
                    <nav class="navbar navbar-expand-lg navbar-light px-0">
                        <a class="navbar-brand ss_logo_mobile" href="#">
                            <img src="images/planethopper-TV-logo.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <div class="" onclick="myFunction(this)">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </button>
                        <div class="collapse navbar-collapse ss_navbar_menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item <?= $active_home ?>">
                                    <a class="nav-link" href="index">Home </a>
                                </li>
                                <li class="nav-item <?= $active_highVoltageShow ?>"><a class="nav-link"
                                        href="high-voltage-show">High Voltage</a></li>
                                <li class="nav-item <?= $active_cinematics ?>"><a class="nav-link" href="cinematics">
                                        Stellar Streams</a></li>
                                <li class="nav-item <?= $active_blog ?>"><a class="nav-link" href="blog">Paraverse</a>
                                </li>
                                <li class="nav-item <?= $active_NFTMarketplace ?>"><a class="nav-link"
                                        href="nft-marketplace"> The Payload </a></li>
                                <li class="nav-item <?= $active_liveTv ?>"><a class="nav-link" href="liveTV"> PHTV 24/7
                                    </a></li>
                                <li class="nav-item <?= $active_liveChat ?>"><a class="nav-link" href="live-chat">PHTV
                                        Live</a></li>
                                <li class="nav-item <?= $active_podcasts ?>"><a class="nav-link" href="podcasts">P.H.
                                        One</a></li>
                                <li class="nav-item <?= $active_product ?>"><a class="nav-link" href="product"> Star
                                        Outpost </a></li>
                                <li class="nav-item"><a class="nav-link" href="http://www.emotionpicturefactory.com/"
                                        target="_blank">eMPF Studios</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="ss_mobiles_menuss">
                    <div class="header">
                        <a class="ss_plannet_mobiles_logo" href="#">
                            <img src="images/planethopper-TV-logo.png" alt="logo">
                        </a>
                    </div>
                    <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
                    <label for="openSidebarMenu" class="sidebarIconToggle">
                        <div class="spinner diagonal part-1"></div>
                        <div class="spinner horizontal"></div>
                        <div class="spinner diagonal part-2"></div>
                    </label>
                    <div id="sidebarMenu">
                        <ul class="sidebarMenuInner">
                            <li class="active">
                                <a class="" href="index"> Home </a>
                            </li>
                            <li class=""><a class="" href="high_voltage_show">High Voltage</a></li>
                            <li class=""><a class="" href="cinematics"> Stellar Streams</a></li>
                            <li class=""><a class="" href="blog">Paraverse</a></li>
                            <li class=""><a class="" href="NFT_marketplace"> The Payload </a></li>
                            <li class=""><a class="" href="liveTV"> PHTV 24/7 </a></li>
                            <li class=""><a class="" href="live_chat">PHTV Live</a></li>
                            <li class=""><a class="" href="podcasts">P.H. One</a></li>
                            <li class=""><a class="" href="Products_Page_New"> Star Outpost </a></li>
                            <li class=""><a class="" href="http://www.emotionpicturefactory.com/" target="_blank">eMPF
                                    Studios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>