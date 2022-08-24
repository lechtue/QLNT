<?php ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Đăng ký</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/icon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include_once './header.php'; ?>

    <div class="card w-75 ml-auto mr-auto mb-100 mt-50" style="max-width: 450px">
        <form class="form" action="../Controller/TaiKhoanController.php" method="POST">
            <input type="hidden" name="command" value="sign-up">
            <div class="form-group card-header">
                <h3>Thông tin tài khoản</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="tenTaiKhoan">Tên tài khoản:</label>
                    <input type="text" class="form-control" id="tenTaiKhoan" name="tenTaiKhoan" required>
                </div>
                <div class="form-group">
                    <label for="matKhau">Mật khẩu:</label>
                    <input type="password" class="form-control" id="matKhau" name="matKhau" required>
                </div>
                <div class="form-group">
                    <label for="xacNhanMatKhau">Nhập lại mật khẩu:</label>
                    <input type="password" class="form-control" id="xacNhanMatKhau" name="xacNhanMatKhau" required>
                </div>
                <div class="form-group">
                    <label for="loaiTaiKhoan">Bạn là:</label>
                    <select class="form-control" name="loaiTaiKhoan">
                        <option value="1">Chủ trọ</option>
                        <option value="2">Người tìm trọ</option>
                    </select>
                </div>
                <div class="form-group">
                    <h3>Thông tin cá nhân</h3>
                </div>

                <div class="form-group">
                    <label for="hoTen">Họ tên:</label>
                    <input type="text" class="form-control" id="hoTen" name="hoTen" required>
                </div>
                <div class="form-group ">
                    <label for="gioiTinh">Giới tính:</label>
                    <select class="form-control" name="gioiTinh">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="sdt">Số điện thoại:</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" required>

                </div>
            </div>
            <div class="form-group text-center card-footer">
                <input type="submit" class="btn btn-danger text-light w-100" value="Đăng ký">
            </div>
            <div class="clearfix"></div>
        </form>
    </div>

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

</body>

</html>