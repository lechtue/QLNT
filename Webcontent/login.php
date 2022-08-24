<!DOCTYPE html>
<?php session_start(); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Đăng nhập</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/icon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once './header.php'; ?>

    <div class="card ml-auto mr-auto mb-100 mt-50 w-75" style="max-width: 450px">
        <form class="form" action="../Controller/TaiKhoanController.php" method="POST">
            <input type="hidden" name="command" value="login">
            <div class="form-group card-header">
                <?php if (isset($_SESSION['yeuCauDangBai']) && $_SESSION['yeuCauDangBai'] == true) { ?>
                    <h4 class="text-center">Đăng nhập để đăng tin</h4>
                <?php
                    $_SESSION['yeuCauDangBai'] = false;
                } else { ?>
                    <h4 class="text-center">Đăng nhập</h4>
                <?php } ?>
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
                <div class="form-group mb-0">
                    <label for="loaiTaiKhoan">Loại tài khoản:</label>
                    <select class="form-control" name="loaiTaiKhoan">
                        <option value="1">Chủ trọ</option>
                        <option value="2">Người dùng</option>
                    </select>
                    <?php if (isset($_SESSION['LoginFail']) && $_SESSION['LoginFail'] == 1) { ?>
                        <label class="text-danger mt-3">Tên tài khoản hoặc mật khẩu không đúng!</label>
                    <?php } else if (isset($_SESSION['LoginFail']) && $_SESSION['LoginFail'] == 2) { ?>
                        <label class="text-danger mt-3">Tài khoản bị tạm khoá!</label>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-danger text-light w-100 mb-15" value="Đăng nhập">
            </div>
        </form>
        <div class="card-footer text-center">
            <a href="sign-up.php"> Đăng ký ngay</a>
        </div>
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