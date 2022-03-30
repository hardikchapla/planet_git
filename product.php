<?php
include('header.php');
$brand = $db->query("SELECT * FROM phtv_product_brand");
$category = $db->query("SELECT * FROM phtv_product_category");
$product = $db->query("SELECT a.*, b.* FROM phtv_product a LEFT JOIN phtv_product_images b ON a.id=b.product_id GROUP BY a.id LIMIT 0,3");
?>

<div class="container-fluid  ">
    <div class="owl-carousel owl-theme" id="ss_products_banner">
        <div class="item">
            <div class="ss_product_banner">
                <img src="images/products_banner.jpg" alt="images" />
                <div class="ss_position_products_ab">
                    <div class="ss_position_products">
                        <div class="verticle_middle ss_products_owerlay">
                            <div class="ss_start_ouputmksams">
                                <img src="images/StarOutpost_logo_3x.png" alt="images" />
                            </div>
                            <div class="ss_start_ouputmksams">
                                <img src="images/star_outpost.png" alt="images" />
                            </div>
                            <h2>Home essentials | Star Output Brands</h2>
                            <div class="liness"></div>
                            <p> For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang
                                and
                                Romy
                                Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.
                            </p>
                            <div class="button_products">
                                <a href="#">Collection</a>
                                <a href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ss_product_banner">
                <img src="images/products_banner.jpg" alt="images" />
                <div class="ss_position_products_ab">
                    <div class="ss_position_products">
                        <div class="verticle_middle ss_products_owerlay">
                            <div class="ss_start_ouputmksams">
                                <img src="images/StarOutpost_logo_3x.png" alt="images" />
                            </div>
                            <h2>Home essentials | Star Output Brands</h2>
                            <div class="liness"></div>
                            <p> For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang
                                and
                                Romy
                                Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.
                            </p>
                            <div class="button_products">
                                <a href="#">Collection</a>
                                <a href="#">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ss_best_products">
    <div class="container">
        <div class="owl-carousel owl-theme" id="ss_products_main">
            <?php while ($feproduct = $product->fetch()) { ?>
            <div class="item">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="ss_best_products_des">
                            <h2> <?= $feproduct['name'] ?> </h2>
                            <p><?= $feproduct['description'] ?></p>
                            <div class="button_products">
                                <a href="#">Discover Now</a>
                                <a href="#"> Buy Now - $<?= $feproduct['price'] ?> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="ss_best_products_images">
                            <img src="images/product/<?= $feproduct['image'] ?>" alt="best_products" />
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="item">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="ss_best_products_des">
                            <h2> ASIAN Men's Bouncer-01 Sports Latest Stylish Casual Sneakers </h2>
                            <p> For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang
                                and Romy
                                Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.
                            </p>
                            <div class="button_products">
                                <a href="#">Discover Now</a>
                                <a href="#"> Buy Now - $39.99 </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="ss_best_products_images">
                            <img src="images/banner_pro.png" alt="best_products" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="ss_best_products_des">
                            <h2> ASIAN Men's Bouncer-01 Sports Latest Stylish Casual Sneakers </h2>
                            <p> For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang
                                and Romy
                                Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.
                            </p>
                            <div class="button_products">
                                <a href="#">Discover Now</a>
                                <a href="#"> Buy Now - $39.99 </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="ss_best_products_images">
                            <img src="images/banner_pro.png" alt="best_products" />
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="container-fluid new_listings_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="nss_new_listings">
                    <h2> Shop By <span> Brand </span></h2>
                </div>
            </div>
        </div>
        <div class=" pt-4">
            <div class="owl-carousel owl-theme" id="ss_brand">
                <?php while ($febrand = $brand->fetch()) { ?>
                <div class="item">
                    <a href="#" class="ss_experiences_brand">
                        <div class="ss_heght_center">
                            <div class="ss_brand_logo">
                                <img src="images/shop_by_brand/adidas.svg" alt="nike-logo" />
                            </div>
                            <h2> <?= $febrand['name'] ?> </h2>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <!-- <div class="item">
                    <a href="#" class="ss_experiences_brand">
                        <div class="ss_heght_center">
                            <img src="images/nike.svg" alt="nike-logo" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_brand">
                        <div class="ss_heght_center">
                            <h2>Gap</h2>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_brand">
                        <div class="ss_heght_center">
                            <img src="images/holiister.svg" alt="nike-logo" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_brand">
                        <div class="ss_heght_center">
                            <img src="images/vitta.svg" alt="nike-logo" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_brand">
                        <div class="ss_heght_center">
                            <h2> Adidas </h2>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_brand">
                        <div class="ss_heght_center">
                            <h2> Adidas </h2>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="container-fluid new_listings_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="nss_new_listings">
                    <h2> Shop By <span> Category </span></h2>
                </div>
            </div>
        </div>
        <div class=" pt-4">
            <div class="owl-carousel owl-theme" id="ss_category">
                <?php while ($fecategory = $category->fetch()) { ?>
                <div class="item">
                    <a href="#" class="ss_experiences_category">
                        <div class="images">
                            <img src="images/product_category/<?= $fecategory['category_image'] ?>" alt="images" />
                        </div>
                        <h2> <?= $fecategory['category_name'] ?> </h2>
                    </a>
                </div>
                <?php } ?>
                <!-- <div class="item">
                    <a href="#" class="ss_experiences_category">
                        <div class="images">
                            <img src="images/ss_experiences_categoryB.png" alt="images" />
                        </div>
                        <h2> Art Gallery </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_category">
                        <div class="images">
                            <img src="images/noun_t-shirt_2237575.svg" alt="images" />
                        </div>
                        <h2> T Shirts </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_category">
                        <div class="images">
                            <img src="images/ss_experiences_categoryE.png" alt="images" />
                        </div>
                        <h2> Hoodies </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_category">
                        <div class="images">
                            <img src="images/556_3x.png" alt="images" />
                        </div>
                        <h2> Star Outpost Brand </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_category">
                        <div class="images">ss_experiences_brand
                            <img src="images/noun_hat_2790985.svg" alt="images" />
                        </div>
                        <h2> Hats </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences_category">
                        <div class="images">
                            <img src="images/pin.svg" alt="images" />
                        </div>
                        <h2> Pins </h2>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_products_box_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3 justify-content-center ss_products_box_tabs " id="pills-tab"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">New Products </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Preorder </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-12 ss_product_pa_top">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row" id="featured_products">
                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesA.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesB.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesC.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesD.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesA.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesE.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesB.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesF.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-5 text-center">
                                <div class="episode_button">
                                    <button type="button" id="load_more_featured_products"> Load More </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row" id="new_products">
                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesA.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesB.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesC.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesD.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesA.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesE.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesB.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Product Info </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-5 text-center">
                                <div class="episode_button">
                                    <button type="button" id="load_more_new_product"> Load More </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row" id="preorder_products">
                            <!-- <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesA.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesB.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesC.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesD.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesA.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesE.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesB.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="ss_products_boxi">
                                    <div class="images">
                                        <img src="images/product-imagesF.png" alt="images" />
                                        <div class="ss_button">
                                            <a href="#"> Preorder </a>
                                        </div>
                                    </div>
                                    <div class="_ss_product_des">
                                        <h3>Cuffed Beanie Planet Hopper TV</h3>
                                        <p> $ 42.00 </p>

                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 pt-5 text-center">
                                <div class="episode_button">
                                    <button type="button" id="load_more_preorder_products"> Load More </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_hot_deal_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ss_hotdeal">
                    <div class="images">
                        <img src="images/hot_deal.png" alt="image" />
                    </div>
                    <div class="ss_hot_deal_ab">
                        <div class="ss_heght_center">
                            <h4> FOR WOMEN'S </h4>
                            <h2> HOT DEAL </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ss_hotdeal">
                    <div class="images">
                        <img src="images/hot_deal_B.png" alt="image" />
                    </div>
                    <div class="ss_hot_deal_ab">
                        <div class="ss_heght_center">
                            <div class="big_sales"> Big Sale!</div>
                            <h3> Discount Code All <br />
                                Sports Gears </h3>
                            <a href="#"> Learn More </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ss_hotdeal">
                    <div class="images">
                        <img src="images/deal_sec.png" alt="image" />
                    </div>
                    <div class="ss_hot_deal_ab">
                        <div class="ss_heght_center">
                            <h4> FOR MEN'S </h4>
                            <h2> COLLECTION </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid new_listings_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="nss_new_listingsab">
                    <h2> Blog & New </h2>
                    <div class="line"></div>
                    <p> For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and
                        Romy
                        selection of women’s, men’s, and unisex sneakers from the Complex SHOP. </p>
                </div>
            </div>
        </div>
        <div class=" row pt-5">
            <div class="col-lg-6">
                <div class="ss_blog_post">
                    <div class="imagesB">
                        <img src="images/blogA.jpg" alt="images" />
                    </div>
                    <div class="blog_des">
                        <h2>Ethics Men's Sports Latest Stylish Casual Sneakers/Lace up Lightweight</h2>
                        <p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang
                            and
                            Romy selection of women’s, men’s.</p>
                        <span> <strong> Posted by : </strong> Tash Ingeram on April 3, 2020 </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ss_blog_post">
                            <div class="images">
                                <img src="images/blogB.jpg" alt="images" />
                            </div>
                            <div class="blog_desB">
                                <h2>Ethics Men's Sports Latest Stylish Casual Sneakers/Lace up Lightweight</h2>
                                <span> <strong> Posted by : </strong> Tash Ingeram on April 3, 2020 </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ss_blog_post">
                            <div class="images">
                                <img src="images/blogC.jpg" alt="images" />
                            </div>
                            <div class="blog_desB">
                                <h2>Ethics Men's Sports Latest Stylish Casual Sneakers/Lace up Lightweight</h2>
                                <span> <strong> Posted by : </strong> Tash Ingeram on April 3, 2020 </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ss_blog_post">
                            <div class="images">
                                <img src="images/blogD.jpg" alt="images" />
                            </div>
                            <div class="blog_desB">
                                <h2>Ethics Men's Sports Latest Stylish Casual Sneakers/Lace up Lightweight</h2>
                                <span> <strong> Posted by : </strong> Tash Ingeram on April 3, 2020 </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ss_blog_post">
                            <div class="images">
                                <img src="images/blogE.jpg" alt="images" />
                            </div>
                            <div class="blog_desB">
                                <h2>Ethics Men's Sports Latest Stylish Casual Sneakers/Lace up Lightweight</h2>
                                <span> <strong> Posted by : </strong> Tash Ingeram on April 3, 2020 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <div class="episode_button">
                <a href="#"> View All </a>
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
$(document).ready(function() {
    var start = 0;
    var limit = 8;
    var start1 = 0;
    var limit1 = 8;
    var start2 = 0;
    var limit2 = 8;
    $.ajax({
        url: "resources/get_new_product",
        method: "POST",
        data: {
            start: start,
            limit: limit
        },
        success: function(data) {
            $('#new_products').html(data);
            start = start + limit;
            limit = limit;
        }
    })
    $.ajax({
        url: "resources/get_preorder_product",
        method: "POST",
        data: {
            start: start1,
            limit: limit1
        },
        success: function(data) {
            $('#preorder_products').html(data);
            start1 = start1 + limit1;
            limit1 = limit1;
        }
    })
    $.ajax({
        url: "resources/get_featured_products",
        method: "POST",
        data: {
            start: start2,
            limit: limit2
        },
        success: function(data) {
            $('#featured_products').html(data);
            start2 = start2 + limit2;
            limit2 = limit2;
        }
    })
    $('#load_more_new_product').on('click', function() {
        $.ajax({
            url: "resources/get_new_product",
            method: "POST",
            data: {
                start: start,
                limit: limit
            },
            success: function(data) {
                if (data) {
                    $('#new_products').append(data);
                    start = start + limit;
                    limit = limit;
                } else {
                    toastr.warning("No Product Available").delay(1000).fadeOut(1000);
                }
            }
        })
    });
    $('#load_more_preorder_products').on('click', function() {
        $.ajax({
            url: "resources/get_preorder_product",
            method: "POST",
            data: {
                start: start1,
                limit: limit1
            },
            success: function(data) {
                if (data) {
                    $('#preorder_products').append(data);
                    start1 = start1 + limit1;
                    limit1 = limit1;
                } else {
                    toastr.warning("No Product Available").delay(1000).fadeOut(1000);
                }

            }
        })
    });
    $('#load_more_featured_products').on('click', function() {
        $.ajax({
            url: "resources/get_featured_products",
            method: "POST",
            data: {
                start: start2,
                limit: limit2
            },
            success: function(data) {
                if (data) {
                    $('#featured_products').append(data);
                    start2 = start2 + limit2;
                    limit2 = limit2;
                } else {
                    toastr.warning("No Product Available").delay(1000).fadeOut(1000);
                }

            }
        })
    });
});
</script>

</body>

</html>