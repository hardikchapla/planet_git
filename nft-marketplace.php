<?php
   include('header.php');
   $category = $db->query("SELECT * FROM phtv_nft_categories");
   $collection = $db->query("SELECT * FROM phtv_nft_collection");
   $listing = $db->query("SELECT * FROM phtv_nft_listing");
   $logos = $db->query("SELECT * FROM phtv_nft_logos");
   $nft_info = $db->query("SELECT * FROM phtv_nft_info");
   $nft_info1 = $db->query("SELECT * FROM phtv_nft_info");
?>

<div class="container-fluid ss_header_sub ss_height100vh">
    <div class="verticle_middle">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="images_sspatload ss_playload">
                        <img src="images/Payload_logo_blue.png" alt="images">
                    </div>
                    <div class="images_sspatload">
                        <img src="images/The_Payload.png" alt="images">
                    </div>
                    <h2> NFT Marketplace </h2>
                    <div class="liness"></div>
                    <p> The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of
                        personal digital assistants.
                        Facebook and Microsoft announced major investments into conversational. </p>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid ss_drops_sectionsdescription">
    <div class="container">
        <div class="row">
            <?php while ($felogos = $logos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-lg-3">
                <div class="ss_drops_blogs">
                    <div class="d-flex bd-highlight align-self-center">
                        <div class="p-2 bd-highlight">
                            <div class="ss_drops_images">
                                <img src="images/nft_logos/<?= $felogos['image'] ?>" alt="images" />
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight align-self-center">
                            <h2><?= $felogos['name'] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="col-lg-3">
                <div class="ss_drops_blogs">
                    <div class="d-flex bd-highlight align-self-center">
                        <div class="p-2 bd-highlight">
                            <div class="ss_drops_images">
                                <img src="images/ss_drops_blogsB.png" alt="images" />
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight align-self-center">
                            <h2> 5 New Drops
                                this Week
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ss_drops_blogs">
                    <div class="d-flex bd-highlight align-self-center">
                        <div class="p-2 bd-highlight">
                            <div class="ss_drops_images">
                                <img src="images/ss_drops_blogsC.png" alt="images" />
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight align-self-center">
                            <h2> We've Purchased
                                10 NFTs
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ss_drops_blogs">
                    <div class="d-flex bd-highlight align-self-center">
                        <div class="p-2 bd-highlight">
                            <div class="ss_drops_images">
                                <img src="images/ss_drops_blogsD.png" alt="images" />
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight align-self-center">
                            <h2> 5 New Artists
                                this week
                            </h2>
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
                    <h2> New Listings </h2>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <?php while ($felisting = $listing->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-lg-6">
                <div class="nss_new_chinema"
                    style="background-image:url(images/nft_listing_thumbnail/<?= $felisting['thumbnail'] ?>)">
                    <div class="ss_des">
                        <h2> <?= $felisting['title'] ?> </h2>
                        <?= ($felisting['description'] != '') ? $felisting['description']:'' ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="col-lg-6">
                <div class="nss_new_chinemaB ">
                    <div class="ss_des">
                        <h2> The Payload Marketplace </h2>
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
                    <h2> Categories </h2>
                </div>
            </div>
        </div>
        <div class=" pt-4">
            <div class="owl-carousel owl-theme" id="ss_categories">
                <?php while ($fecategory = $category->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2><?= $fecategory['name'] ?></h2>
                    </a>
                </div>
                <?php } ?>
                <!-- <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2>Music</h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2>Street Art</h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2>Cards</h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2>Poems</h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2> Audio Clips </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2>Video Clips</h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2> Beats </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2> Photography </h2>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <h2> NFTP (Physical) </h2>
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
                    <h2> Collections </h2>
                </div>
            </div>
        </div>
        <div class=" pt-4">
            <div class="owl-carousel owl-theme" id="ss_collections">
                <?php while ($fecollecton = $collection->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/nft_collection/<?= $fecollecton['logo'] ?>" alt="images" />
                        </div>
                    </a>
                </div>
                <?php } ?>
                <!-- <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioA.svg" alt="images" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioB.svg" alt="images" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioC.svg" alt="images" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioD.svg" alt="images" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioE.svg" alt="images" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioF.svg" alt="images" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioG.svg" alt="images" />
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="ss_experiences">
                        <div class="verticle_middle">
                            <img src="images/logo-studioC.svg" alt="images" />
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ss_product_slider_section">
    <div class="container">
        <div class="owl-carousel owl-theme" id="ss_product_slider">
            <?php 
                while ($feinfo = $nft_info->fetch(PDO::FETCH_ASSOC)) {
                    $date1 = new DateTime(date('Y-m-d'));
                    $date2 = new DateTime(date('Y-m-d', strtotime($feinfo['created_at'])));
                    $interval = $date1->diff($date2);
            ?>
            <div class="item">
                <div class="ss_product">
                    <div class="images">
                        <?php if(empty($feinfo['image']) || $feinfo['image_type'] != 'image'){ ?>
                        <img src="images/planethopper-TV-logo.png" alt="images" />
                        <?php } else { ?>
                        <img src="images/nft_info_image/<?= $feinfo['image'] ?>" alt="images" />
                        <?php } ?>
                        <?php if($interval->days <= 10){ ?>
                        <div class="ss_tabgs ss_tabgs_green">
                            New Drop
                        </div>
                        <?php } elseif ($interval->days <= 60) { ?>
                        <div class="ss_tabgs ss_tabgs_orange">
                            <?= $interval->days ?> Days Left
                        </div>
                        <?php } elseif ($interval->days <= 90) { ?>
                        <div class="ss_tabgs ss_tabgs_yellow">
                            <?= $interval->days ?> Days Left
                        </div>
                        <?php } else { ?>
                        <div class="ss_tabgs ss_tabgs_red">
                            Ended
                        </div>
                        <?php } ?>
                    </div>
                    <div class="ss_main_des">
                        <h5><?= $feinfo['name'] ?></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> <?= $feinfo['price'] ?> PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details?id=<?= base64_encode($feinfo['id']) ?>"
                                    class="ss_details">
                                    Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <button type="button" class="ss_buy model_details" id="<?= $feinfo['id'] ?>"
                                    data-toggle="modal" data-target="#exampleModalCenter">
                                    Buy </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="item">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/episodesE.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_yellow">
                            90 Days Left
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/episodesC.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_red">
                            Ended
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/SAB.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_green">
                            New Drop
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/episodesA.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_red">
                            Ended
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="container-fluid ss_collections">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-5">
                <div class="nss_new_listings">
                    <h2> NFT Payload </h2>
                </div>
            </div>
            <?php 
                while ($feinfo1 = $nft_info1->fetch(PDO::FETCH_ASSOC)) {
                    $date1 = new DateTime(date('Y-m-d'));
                    $date2 = new DateTime(date('Y-m-d', strtotime($feinfo1['created_at'])));
                    $interval1 = $date1->diff($date2);
            ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss_product">
                    <div class="images">
                        <?php if(empty($feinfo1['image']) || $feinfo1['image_type'] != 'image'){ ?>
                        <img src="images/planethopper-TV-logo.png" alt="images" />
                        <?php } else { ?>
                        <img src="images/nft_info_image/<?= $feinfo1['image'] ?>" alt="images" />
                        <?php } ?>
                        <?php if($interval1->days <= 10){ ?>
                        <div class="ss_tabgs ss_tabgs_green">
                            New Drop
                        </div>
                        <?php } elseif ($interval1->days <= 60) { ?>
                        <div class="ss_tabgs ss_tabgs_orange">
                            <?= $interval1->days ?> Days Left
                        </div>
                        <?php } elseif ($interval1->days <= 90) { ?>
                        <div class="ss_tabgs ss_tabgs_yellow">
                            <?= $interval1->days ?> Days Left
                        </div>
                        <?php } else { ?>
                        <div class="ss_tabgs ss_tabgs_red">
                            Ended
                        </div>
                        <?php } ?>
                    </div>
                    <div class="ss_main_des">
                        <h5><?= $feinfo1['name'] ?></span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> <?= $feinfo1['price'] ?> PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details?id=<?= base64_encode($feinfo1['id']) ?>"
                                    class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <button type="button" class="ss_buy model_details" id="<?= $feinfo1['id'] ?>"
                                    data-toggle="modal" data-target="#exampleModalCenter"> Buy </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/episodesE.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_yellow">
                            90 Days Left
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/episodesC.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_red">
                            Ended
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/SAB.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_green">
                            New Drop
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/SAA.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_red">
                            Ended
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss_product">
                    <div class="images">
                        <img src="images/SAC.jpg" alt="images" />
                        <div class="ss_tabgs ss_tabgs_green">
                            New Drop
                        </div>
                    </div>
                    <div class="ss_main_des">
                        <h5>Mona Loser <span>|</span> <span> The Studio </span></h5>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-grow-1 bd-highlight">
                                <p> 200.00 PAY <span> ($58.64) </span></p>
                            </div>
                            <div class=" bd-highlight">
                                <p><span> M#154 | 200 </span></p>
                            </div>
                        </div>
                        <div class="d-flex bd-highlight ss_btn">
                            <div class=" flex-fill mr-4 bd-highlight">
                                <a href="nft-marketplace-details" class="ss_details"> Details </a>
                            </div>
                            <div class=" flex-fill bd-highlight">
                                <a href="#" class="ss_buy"> Buy </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content details_contents">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="images/cancel.svg" alt="images" />
                </button>
            </div>
            <div class="modal-body">
                <div class="ss_details_model">
                    <div class="row">
                        <div class="col-lg-5 align-self-center">
                            <div class="owl-carousel owl-theme" id="ss_slider_details">
                                <div class="item">
                                    <div class="ss_model_images">
                                        <img class="nft_marketing_image" src="images/details_model.jpg" alt="details" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ss_model_images">
                                        <img class="nft_marketing_image" src="images/details_model.jpg" alt="details" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="ss_model_images">
                                        <img class="nft_marketing_image" src="images/details_model.jpg" alt="details" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 align-self-center">
                            <div class="ss_blog_details_des">
                                <h2 id="nft_marketing_name"> Cuffed Beanie Planet Hopper TV </h2>
                                <h5 id="nft_marketing_price"> 200.00 WAX <span> ($58.64) </span></h5>
                                <p id="nft_marketing_description"></p>
                                <ul>
                                    <li>
                                        <span> Sale ID : </span>
                                        <span id="nft_marketing_sale_id"> #5395761 </span>
                                    </li>
                                    <li>
                                        <span> Collection : </span>
                                        <span id="nft_marketing_collection"> warclanstime </span>
                                    </li>
                                    <li>
                                        <span> Asset Name : </span>
                                        <span id="nft_marketing_asset_name"> Goldenbeard Bob </span>
                                    </li>
                                    <li>
                                        <span> Asset ID : </span>
                                        <span id="nft_marketing_asset_id" class="themcolor"> #1099517828729 </span>
                                    </li>
                                    <li>
                                        <span> Mint Number : </span>
                                        <span id="nft_marketing_mint_number"> 59of179 (max: 300) - 2 </span>
                                    </li>
                                </ul>
                                <div class="ss_model_button">
                                    <a id="model_buy_link" href="#"> Buy for 0.20 WAX </a>
                                </div>
                            </div>
                        </div>
                    </div>
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
    $(document).on('click', '.model_details', function() {
        var nft_id = $(this).attr('id');
        $.ajax({
            url: "resources/nft_model_details",
            method: "POST",
            data: {
                nft_id: nft_id
            },
            dataType: "json",
            success: function(data) {
                if (data.image_type == 'image') {
                    $('.nft_marketing_image').attr('src', 'images/nft_info_image/' + data
                        .image);
                } else {
                    $('.nft_marketing_image').attr('src',
                        'images/planethopper-TV-logo.png');
                }
                $('#nft_marketing_name').html(data.name);
                $('#nft_marketing_price').html(data.price + " WAX <span> ($58.64) </span>");
                $('#nft_marketing_description').html(data.description);
                $('#nft_marketing_sale_id').html(data.sale_id);
                $('#nft_marketing_collection').html(data.collection_name);
                $('#nft_marketing_asset_name').html(data.assets_name);
                $('#nft_marketing_asset_id').html(data.assets_id);
                $('#nft_marketing_mint_number').html(data.meant_no + " (max: 300) - 2");
                $('#model_buy_link').attr('href', 'nft-marketplace-details?id=' + data
                    .nft_id);
            }
        })
    });
});
</script>
</body>

</html>