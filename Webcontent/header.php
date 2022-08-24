<?php
require_once '../Model/TaiKhoan.php';

$taiKhoan = NULL;
$loaiTaiKhoan = -1;

if (isset($_SESSION['TenTaiKhoan'])) {
    $tenTaiKhoan = $_SESSION['TenTaiKhoan'];
    $loaiTaiKhoan = $_SESSION['LoaiTaiKhoan'];
}
?>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="newsbox-main-menu" style="height: 75px;">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="newsboxNav" style="height: 75px">

                    <!-- Nav brand -->
                    <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <!-- Chua dang nhap -->
                                <?php if ($loaiTaiKhoan == -1) { ?>
                                    <li>
                                        <a href="../Controller/BaiDangController.php?command=post">Đăng tin</a>
                                    </li>
                                    <li>
                                        <a href="sign-up.php">Đăng ký</a>
                                    </li>
                                    <li>
                                        <a href="login.php">Đăng nhập</a>
                                    </li>

                                    <!-- Danh nhap voi vai tro chu tro -->
                                <?php } else if ($loaiTaiKhoan == 1) { ?>
                                    <li>
                                        <a href="../Controller/BaiDangController.php?command=post">Đăng tin</a>
                                    </li>

                                    <li>
                                        <a href="list-post.php">Quản lý bản tin</a>
                                    </li>
                                    <li>
                                        <a href="account.php?tenTaiKhoan=<?php echo $tenTaiKhoan; ?>">Tài khoản</a>
                                    </li>
                                    <li>
                                        <a href="../Controller/TaiKhoanController.php?command=logout">Đăng xuất</a>
                                    </li>

                                    <!-- Dang nhap voi vai tro nguoi tim tro -->
                                <?php } else if ($loaiTaiKhoan == 2) { ?>
                                    <li>
                                        <a href="account.php?tenTaiKhoan=<?php echo $tenTaiKhoan; ?>">Tài khoản</a>
                                    </li>
                                    <li>
                                        <a href="../Controller/TaiKhoanController.php?command=logout">Đăng xuất</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->