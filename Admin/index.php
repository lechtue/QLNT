<?php
session_start();

if (!isset($_SESSION['Login'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>

    <!-- Favicon -->
    <link rel="icon" href="..\Webcontent\img\core-img\icon.ico">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style media="screen">
        /*body { padding-top: 70px; }*/
        #connectLogo {
            height: 60px;
            padding: 15px 0 5px 0;
        }

        #logo {
            height: 60px;
            padding: 5px 0 5px 20px;
        }

        .share-link {
            line-height: 60px;
            padding: 0 1em;
            font-size: 2em;
        }

        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-left: 250px;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: fixed;
            left: 250px;
            width: 0;
            height: 100%;
            margin-left: -250px;
            overflow-y: auto;
            background: #000;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }

        #page-content-wrapper {
            width: 100%;
            position: absolute;
            padding: 15px;
        }

        #wrapper.toggled #page-content-wrapper {
            position: absolute;
            margin-right: -250px;
        }

        /* Sidebar Styles */

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 250px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #999999;
        }

        .sidebar-nav li a:hover {
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
            text-decoration: none;
        }

        .sidebar-nav>.sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
        }

        .sidebar-nav>.sidebar-brand a {
            color: #999999;
        }

        .sidebar-nav>.sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        @media(min-width:768px) {
            #wrapper {
                padding-left: 250px;
            }

            #wrapper.toggled {
                padding-left: 0;
            }

            #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled #sidebar-wrapper {
                width: 0;
            }

            #page-content-wrapper {
                padding: 20px;
                position: relative;
            }

            #wrapper.toggled #page-content-wrapper {
                position: relative;
                margin-right: 0;
            }
        }
    </style>


    <!-- Menu Toggle Script -->
    <script>
        $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</head>

<body>

    <nav class="navbar navbar-default NOnavbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed menu-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <a class="NOnavbar-brand" href="#">
                    <img id="logo" src="..\Webcontent\img\core-img\logo.png" alt="Talk Fusion">
                </a>

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <a href="models/Logout.php">
                    <span class="glyphicon glyphicon-share hidden-xs pull-right share-link" aria-hidden="true"></span>
                </a>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!--           <img class="center-block" id="connectLogo" src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg" alt=""> -->
                <!-- <div id="btnShare" style="display: none;"><img src="share.svg" width="22" alt="share"></div> -->
            </div>


            <!--
        <button type="button" class="share-link hidden-xs pull-right">
          <span class="sr-only">Share link</span>
          <span class="glyphicon glyphicon-link"></span>
        </button> -->

        </div>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li style="color: white; font-size: 16px"> Quản lý tài khoản
                    <ul>
                        <li><a href="index.php?action=taikhoankhach">Tài khoản khách hàng</a></li>
                        <li><a href="index.php?action=taikhoanchu">Tài khoản chủ trọ</a></li>
                    </ul>
                </li>
                <li style="color: white; font-size: 16px">Quản lý môi trường
                    <ul>
                        <li><a href="index.php?action=danhsachmoitruong">Danh sách môi trường</a></li>
                        <li><a href="index.php?action=themmoitruong">Thêm mới</a></li>
                    </ul>
                </li>
                <li style="color: white; font-size: 16px">Quản lý tiện nghi
                    <ul>
                        <li><a href="index.php?action=danhsachtiennghi">Danh sách tiện nghi</a></li>
                        <li><a href="index.php?action=themtiennghi">Thêm mới</a></li>
                    </ul>
                </li>
                <li style="color: white; font-size: 16px">Quản lý địa chỉ
                    <ul>
                        <li><a href="index.php?action=danhsachkhuvuc">Quản lý khu vực</a></li>
                        <li><a href="index.php?action=danhsachquanhuyen">Quản lý quận huyện</a></li>

                    </ul>
                </li>
                <li style="color: white; font-size: 16px">Quản lý bài đăng
                    <ul>
                        <li><a href="index.php?action=baidangdaduyet">Bài đăng đã duyệt</a></li>
                        <li><a href="index.php?action=baidangchuaduyet">Bài đăng chưa duyệt</a></li>
                        <li><a href="index.php?action=baidangdakhoa">Bài đăng đã khoá</a></li>
                    </ul>

                <li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        if (isset($_GET['action'])) {
                            switch ($_GET['action']) {
                                case "danhsachtiennghi":
                                    require_once 'DanhSachTienNghi.php';
                                    break;
                                case "themtiennghi":
                                    require_once 'ThemTienNghi.php';
                                    break;
                                case "suatiennghi":
                                    require_once 'SuaTienNghi.php';
                                    break;
                                case "xoatiennghi":
                                    require_once 'models/XoaTienNghi.php';
                                    require_once 'DanhSachTienNghi.php';
                                    break;

                                case "danhsachmoitruong":
                                    require_once 'DanhSachMoiTruong.php';
                                    break;
                                case "themmoitruong":
                                    require_once 'ThemMoiTruong.php';
                                    break;
                                case "suamoitruong":
                                    require_once 'SuaMoiTruong.php';
                                    break;
                                case "xoamoitruong":
                                    require_once 'models/XoaMoiTruong.php';
                                    require_once 'DanhSachMoiTruong.php';
                                    break;

                                case "danhsachkhuvuc":
                                    require_once 'DanhSachKhuVuc.php';
                                    break;
                                case "themkhuvuc":
                                    require_once 'ThemKhuVuc.php';
                                    break;
                                case "suakhuvuc":
                                    require_once 'SuaKhuVuc.php';
                                    break;
                                case "xoakhuvuc":
                                    require_once 'models/XoaKhuVuc.php';
                                    require_once 'DanhSachKhuVuc.php';
                                    break;

                                case "danhsachquanhuyen":
                                    require_once 'DanhSachQuanHuyen.php';
                                    break;
                                case "themquanhuyen":
                                    require_once 'ThemQuanHuyen.php';
                                    break;
                                case "suaquanhuyen":
                                    require_once 'SuaQuanHuyen.php';
                                    break;
                                case "xoaquanhuyen":
                                    require_once 'models/XoaQuanHuyen.php';
                                    require_once 'DanhSachQuanHuyen.php';
                                    break;

                                case "taikhoankhach":
                                    require_once 'DanhSachTKKhach.php';
                                    break;
                                case "khoakhach":
                                    require_once 'models/KhoaTK.php';
                                    require_once 'DanhSachTKKhach.php';
                                    break;
                                case "mokhach":
                                    require_once 'models/MoTK.php';
                                    require_once 'DanhSachTKKhach.php';
                                    break;

                                case "taikhoanchu":
                                    require_once 'DanhSachTKChu.php';
                                    break;
                                case "khoachutro":
                                    require_once 'models/KhoaTK.php';
                                    require_once 'DanhSachTKChu.php';
                                    break;
                                case "mochutro":
                                    require_once 'models/MoTK.php';
                                    require_once 'DanhSachTKChu.php';
                                    break;

                                case "baidangdaduyet":
                                    require_once 'DanhSachBaiDang.php';
                                    break;
                                case "baidangchuaduyet":
                                    require_once 'BaiDangChuaDuyet.php';
                                    break;
                                case "baidangdakhoa":
                                    require_once 'BaiDangDaKhoa.php';
                                    break;
                                case "duyetbaidang":
                                    require_once 'models/DuyetBaiDang.php';
                                    require_once 'BaiDangChuaDuyet.php';
                                    break;
                                case "khoabaidang":
                                    require_once 'models/KhoaBaiDang.php';
                                    require_once 'DanhSachBaiDang.php';
                                    break;
                                case "mobaidang":
                                    require_once 'models/DuyetBaiDang.php';
                                    require_once 'BaiDangDaKhoa.php';
                                    break;
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>