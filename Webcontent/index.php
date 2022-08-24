<?php
session_start();

require_once '../Dao/BaiDangDao.php';
require_once '../Dao/TienNghiDao.php';
require_once '../Dao/MoiTruongDao.php';


$baiDangDao = new BaiDangDao();
$listMoiNhat = $baiDangDao->topMoiNhat();
$listReNhat = $baiDangDao->topGiaReNhat();
$listTrongThang = $baiDangDao->tinTrongThang();
$listXemNhieuNhat = $baiDangDao->topXemNhieuNhat();

setlocale(LC_MONETARY, "vie");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Phòng trọ sinh viên</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/icon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/my-style.css">
</head>

<body>
    <?php include_once './header.php'; ?>

    <?php include_once './search.php'; ?>

    <!-- ##### Intro News Area Start ##### -->
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="intro-news-tab">

                        <!-- Intro News Filter -->
                        <div class="intro-news-filter d-flex justify-content-between" style="height: 45px; padding: 5px 10px;">
                            <h3 class="text-danger text-choice">Các lựa chọn</h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="choice-link nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Mới nhất</a>
                                    <a class="choice-link nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Phổ biến</a>
                                    <a class="choice-link nav-item nav-link" id="nav3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Giá rẻ</a>
                                </div>
                            </nav>
                        </div>

                        <div class="tab-content" id="nav-tabContent">

                            <?php include_once './newest-post.php'; ?>

                            <?php include_once './popular-post.php'; ?>

                            <?php include_once './cheappest-post.php'; ?>

                        </div>
                    </div>
                </div>

                <!-- Danh ky -->
                <div class='col-12 col-sm-9 col-md-6 col-lg-4'>
                    <div class='sidebar-area'>
                        <!-- Newsletter Widget -->
                        <div class='single-widget-area newsletter-widget mb-30'>
                            <h4>Chưa có tài khoản ?</h4>
                            <a href='sign-up.php' class='btn newsbox-btn w-100'>Đăng ký ngay</a>
                            <p class='mt-30'>Đăng ký để đăng bài và xem nhiều hơn</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!-- ##### Intro News Area End ##### -->

    <?php include_once './post-this-month.php'; ?>

    <?php include_once './footer.php'; ?>

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- My js 
        <script src="js/my-script.js"></script>-->
</body>

</html>