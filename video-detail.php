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
    <link rel="stylesheet" href="slider-plugin/owl.carousel.css" type="text/css"/>
    <link rel="stylesheet" href="slider-plugin/owl.theme.default.css" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/toastr.css" type="text/css">
    <link rel="stylesheet" href="css/media_query.css" type="text/css">
    <title> <?= $titleName ?> </title>
</head>
<div class="container-fluid ss_padding_live_events">
    <div class="row">
        <div class="col-lg-12 ss_mobile_padd_0">
            <div class="ss_live_video">
                <div class="video_images">
                    <img src="images/slider_img.jpg" alt="video">
                    <div class="ss_video_player">
                        <div class="rSlider">
                            <span class="slide"></span>
                            <input id="range" type="range" min="0" max="50000">
                        </div>
                        <div class="d-flex bd-highlight justify-content-center">
                            <div class="p-2 flex-fill bd-highlight">
                                <div class="d-flex bd-highlight ss_volume ">
                                    <div class=" bd-highlight ss_volume_icons align-self-center"><a href="#"><i
                                                    class="fa fa-volume-up" aria-hidden="true"></i></a></div>
                                    <div class=" bd-highlight align-self-center">
                                        <div class="rSlider ss_rslider">
                                            <span class="Vslide"></span>
                                            <input id="volume" type="range" min="0" max="50000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 flex-fill bd-highlight text-center">
                                <div class="ss_play_button">
                                    <a href="#"><i class="fa fa-backward" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-pause" aria-hidden="true"></i> </a>
                                    <a href="#"> <i class="fa fa-forward" aria-hidden="true"></i> </a>
                                </div>
                            </div>
                            <div class="p-2 flex-fill bd-highlight text-right">
                                <p>12.45/28.32</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- <div class="ss_evenst_live_bg">
    <div class="container-fluid ss_episodes_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 align-self-center">
                    <div class="main_title">
                        <h1> Season 1 </h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme episodes_sections" id="ss_livechatings">
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/me1.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/me2.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/me3.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/me4.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/me5.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/me2.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/like1.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ss_episodes_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 align-self-center">
                    <div class="main_title">
                        <h1> Season 2
                        </h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme episodes_sections ss_live_slider " id="ss_events_live_slider_B">
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/4everFitA.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/4everFitD.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/album_2.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ss_episodes_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 align-self-center">
                    <div class="main_title">
                        <h1> Season 3
                        </h1>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme episodes_sections ss_live_slider " id="ss_events_live_slider_C">
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/album_3.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/album_4.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/album_5.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/album_10.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/album_12.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/album_15.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ss_sesson_box">
                        <div class="ss_sesson_images">
                            <img src="images/like1.jpg" alt="images" />
                            <a href="#" class="ss_video_play_button_sesson"> <i class="fa fa-play"
                                    aria-hidden="true"></i> </a>
                        </div>
                        <div class="ss_sesson_des">
                            <h3> We Only See Each Other at Wedding and Funerals </h3>
                            <p> Years after they rose to fame as young crime-fighting superheroes, the estranged
                                Hargreeves sibling .com together to make their father’s death. </p>
                            <h4>05 : 59 m</h4>
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
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="modal_about">
                            <h3>About John Wick</h3>
                            <p><span>Director:</span> Chad Stahelski</p>
                            <p><span>Cast:</span>Keanu Reeves, Michael Nyqvist, Bridget Moynahan, Action Thrillers
                            </p>
                            <p><span>Genres:</span>Crime Movies, Action Thrillers, Crime Action &amp; Adventure</p>
                            <p><span>This movie is:</span>Violent, Gritty, Dark</p>
                            <p><span>Maturity rating :</span>Violence, language, Recommended for ages 16 and up</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="slider-plugin/owl.carousel.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/float-panel.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/custom.js"></script>
<script>
    function myFunction(x) {
        x.classList.toggle("change");
    }
</script>
<script>
    $(window).on("load", function () {
        var range = $("#range").attr("value");
        $("#demo")(range);
        $(".slide").css("width", "50%");
        $(document).on('input change', '#range', function () {
            $('#demo')($(this).val());
            var slideWidth = $(this).val() * 100 / 50000;
            $(".slide").css("width", slideWidth + "%");
        });
    });
</script>
<script>
    $(window).on("load", function () {
        var range = $("#volume").attr("value");
        $("#demo")(range);
        $(".Vslide").css("width", "50%");
        $(document).on('input change', '#volume', function () {
            $('#demo')($(this).val());
            var slideWidth = $(this).val() * 100 / 50000;
            $(".Vslide").css("width", slideWidth + "%");
        });
    });
</script>
</body>
</html>