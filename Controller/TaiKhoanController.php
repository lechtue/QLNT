<?php
session_start();
require_once '../Dao/TaiKhoanDao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    doPost();
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    doGet();
}

function doPost()
{
    doGet();
}

function doGet()
{
    $command = $_REQUEST['command'];


    if ($command == 'sign-up') {
        $TenTaiKhoan = $_REQUEST['tenTaiKhoan'];
        $MatKhau = $_REQUEST['matKhau'];
        $MaLoaiTaiKhoan = $_REQUEST['loaiTaiKhoan'];
        $HoTen = $_REQUEST['hoTen'];
        $GioiTinh = $_REQUEST['gioiTinh'];
        $Sdt = $_REQUEST['sdt'];
        $taiKhoanDao = new TaiKhoanDao();
        $taiKhoanDao->AddTaiKhoan($TenTaiKhoan, $MatKhau, $MaLoaiTaiKhoan, $HoTen, $Sdt, $GioiTinh);
    } else if ($command == 'login') {
        $TenTaiKhoan = $_REQUEST['tenTaiKhoan'];
        $MatKhau = $_REQUEST['matKhau'];
        $MaLoaiTaiKhoan = $_REQUEST['loaiTaiKhoan'];

        $taiKhoanDao = new TaiKhoanDao();
        $taiKhoan = $taiKhoanDao->GetTaiKhoan($TenTaiKhoan, $MatKhau, $MaLoaiTaiKhoan);
        if ($taiKhoan == null) {
            $_SESSION['LoginFail'] = 1;
            header("Location: ../Webcontent/login.php");
            return;
        } else if ($taiKhoan->TrangThai == 0) {
            $_SESSION['LoginFail'] = 2;
            header("Location: ../Webcontent/login.php");
            return;
        }
        $_SESSION['TenTaiKhoan'] = $taiKhoan->TenTaiKhoan;
        $_SESSION['LoaiTaiKhoan'] = $taiKhoan->LoaiTaiKhoan;
        if (isset($_SESSION['prevCommand'])) {
            dieuHuong();
            return;
        }
    } else if ($command == 'logout') {
        $_SESSION = [];

    } else if ($command == 'update') {
        $TenTaiKhoan = $_REQUEST['tenTaiKhoan'];
        $HoTen = $_REQUEST['hoTen'];
        $GioiTinh = $_REQUEST['gioiTinh'];
        $Sdt = $_REQUEST['sdt'];
        $Password = $_REQUEST['password'];
        $Newpass = $_REQUEST['newpass'];
        $taiKhoanDao = new TaiKhoanDao();
        $taiKhoanDao->UpdateTaiKhoan($TenTaiKhoan, $HoTen, $Sdt, $GioiTinh);
        if($Password != '' && $Newpass != ''){
            $taiKhoanDao->ChangePassword($TenTaiKhoan,$Password, $Newpass);
        }
    }
    header("Location: ../Webcontent/index.php");
}

function dieuHuong()
{
    switch ($_SESSION['prevCommand']) {
        case 'post':
            header("Location: ../Webcontent/index.php");
            break;
        default:
            break;
    }
}
