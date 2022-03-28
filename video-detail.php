<?php
include('inc/connection/connection.php');
include('inc/helper/constant.php');
ob_start();
session_start();
include('page-title.php');
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
<div class="container-fluid ss_padding_live_events">
    <div class="ss_live_video">
        <div class="video_images">
            <!-- <img src="images/slider_img.jpg" alt="video"> -->
            <video id="my-video" class="video-js vjs-theme-fantasy" controls preload="auto" width="100%" height="100%"
                poster="https://wallpapercave.com/wp/wp3305861.jpg" data-setup="{}">
                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                    type="video/mp4" />

            </video>


            <div class="ss_button_play_puch">
                <div class="ss_play_button">
                    <a href="#"><i class="fa fa-backward" aria-hidden="true"></i> </a>
                    <a href="#"> <i class="fa fa-forward" aria-hidden="true"></i> </a>
                </div>
            </div>


            <div class="ss_video_back_info">

                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">

                        <a href="#" class="ss_back_arrow">
                            <img src="images/left_arrow.svg" alt="images" />
                        </a>

                    </div>
                    <div class="p-2 bd-highlight">

                        <a href=" #" class="ss_info_icons" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-info" aria-hidden="true"></i>
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ss_model_close_model">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="images/close.svg" alt="images" />
                </button>
            </div>
            <div class="modal-body">


                <div class="ss_video_des ss_button_right ss_padding_lives_model_padd ">
                    <div class="d-flex bd-highlight ss_mobiles_block">
                        <div class="p-2 flex-fill bd-highlight align-self-center">
                            <div class="model_title_images_store">
                                <img src="images/cosmic_comedy.png" alt="images">
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight align-self-center">
                            <div class="modal_des">
                                <div class="match">
                                    <h5><span>2020</span></h5>
                                    <h6>16+</h6>
                                    <h5><span>2 Seasons</span></h5>
                                </div>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                    praesentium
                                    voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                    occaecati cupiditate non provident Years after they rose to fame as young
                                    crime-fighting superheroes, the estranged Hargreeves sibling .com together to
                                    make their father’s death </p>
                            </div>
                        </div>
                        <div class="p-2 flex-fill bd-highlight align-self-center">
                            <div class="tool_epi mb-4 mt-0">
                                <div class="epi_t_box">
                                    <div class="epi_tool_box">
                                        <a href="#"> <img src="images/StashS_2x.png" alt="">
                                        </a>
                                    </div>
                                    <a href="#">
                                    </a>
                                    <div class="epi_tool_box"><a href="#">
                                        </a><a href="#"><img class="img-fluid" src="images/like.png"></a>
                                    </div>
                                    <div class="epi_tool_box">
                                        <a href="#"><img class="img-fluid" src="images/dislike.png"></a>
                                    </div>
                                    <div class="epi_tool_box">
                                        <a href="#"><i class="fa fa-volume-up" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="js/float-panel.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/custom.js"></script>
<script>
function myFunction(x) {
    x.classList.toggle("change");
}
</script>

</body>

</html>