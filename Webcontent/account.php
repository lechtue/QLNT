<?php
session_start();
require_once '../Dao/TaiKhoanDao.php';
$tenTaiKhoan = $_GET['tenTaiKhoan'];
$taiKhoanDao = new TaiKhoanDao();
$thongTin = $taiKhoanDao->GetThongTin($tenTaiKhoan);
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
    <div id="bg-search">
    </div>
    <div class="card w-75 ml-auto mr-auto mb-100 mt-50" style="max-width: 450px">
        <form class="form" action="../Controller/TaiKhoanController.php" method="POST">
            <input type="hidden" name="command" value="update">
            <div class="form-group card-header">
                <h3>Thông tin tài khoản</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="tenTaiKhoan">Tên tài khoản:</label>
                    <input value="<?php echo $thongTin->TenTaiKhoan; ?>" type="text" class="form-control" id="tenTaiKhoan" name="tenTaiKhoan" required readonly>
                </div>
                <div class="form-group">
                    <h3>Thông tin cá nhân</h3>
                </div>

                <div class="form-group">
                    <label for="hoTen">Họ tên:</label>
                    <input value="<?php echo $thongTin->HoTen; ?>" type="text" class="form-control" id="hoTen" name="hoTen" required>
                </div>
                <div class="form-group ">
                    <label for="gioiTinh">Giới tính:</label>
                    <select class="form-control" name="gioiTinh">
                        <option <?php if ($thongTin->GioiTinh == 1) echo 'selected' ?> value="1">Nam</option>
                        <option <?php if ($thongTin->GioiTinh == 0) echo 'selected' ?> value="0">Nữ</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="sdt">Số điện thoại:</label>
                    <input value="<?php echo $thongTin->Sdt ?>" type="text" class="form-control" id="sdt" name="sdt" required>

                </div>
                <div class="form-group">
                    <h3>Đổi mật khẩu</h3>
                </div>
                <div class="form-group ">
                    <label for="sdt">Mật khẩu hiện tại:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group ">
                    <label for="sdt">Mật khẩu mới:</label>
                    <input type="password" class="form-control" id="newpass" name="newpass">
                </div>
                <div class="form-group text-center card-footer">
                    <input type="submit" class="btn btn-danger text-light w-100" value="Update">
                </div>
                <div class="clearfix"></div>
        </form>
    </div>

</body>