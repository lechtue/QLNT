<?php

session_start();

require_once '../Dao/BaiDangDao.php';
require_once '../Dao/PhongTroDao.php';
require_once '../Dao/TienNghiDao.php';
require_once '../Dao/MoiTruongDao.php';
require_once '../Dao/HinhAnhDao.php';

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

    if ($command == 'post') {
        if (isset($_SESSION['TenTaiKhoan'])) {
            header("Location: ../Webcontent/post.php");
        } else {
            $_SESSION['prevCommand'] = 'post';
            $_SESSION['yeuCauDangBai'] = true;
            header("Location: ../Webcontent/login.php");
        }
        return;
    } else if ($command == 'submitPost') {
        luuBaiDang();
        return;
    } else if ($command == 'updatePost') {
        header("Location: ../Webcontent/list-post.php");
    } else if (isset($_REQUEST["single-post"])) {
        xemBaiDang($_REQUEST["single-post"], $_REQUEST['phong-tro']);
        return;
    }
    //
    header("Location: ../Webcontent/index.php");
}

function xemBaiDang($maBaiDang, $maPhong)
{
    $baiDangDao = new BaiDangDao();
    $baiDangDao->capNhatLuotXem((int) $maBaiDang);

    $_SESSION['maBaiDang'] = $maBaiDang;
    $_SESSION['maPhong'] = $maPhong;
    header("Location: ../Webcontent/single-post.php");
}

/*
 * Luu bai
 */

function luuBaiDang()
{

    $TenTaiKhoan = $_SESSION['TenTaiKhoan'];
    $TieuDe = $_REQUEST['tieuDe'];
    $MoTa = $_REQUEST['moTa'];
    $ThoiGianDang = date("Y-m-d");

    $phongTroDao = new PhongTroDao();
    $baiDangDao = new BaiDangDao();

    $baiDangDao->luuBaiDang($TieuDe, $ThoiGianDang, $MoTa, $TenTaiKhoan);

    $MaBaiDang = $baiDangDao->getMaxMaBaiDang($TenTaiKhoan);
    luuPhongTro($MaBaiDang);

    uploadAnh($MaBaiDang);

    $MaPhong = $phongTroDao->getMaPhong($MaBaiDang);
    luuTienNghi($MaPhong);
    luuMoiTruong($MaPhong);
    xemBaiDang($MaBaiDang, $MaPhong);
}

function capNhatBaiDang()
{

    $TenTaiKhoan = $_SESSION['TenTaiKhoan'];
    $TieuDe = $_REQUEST['tieuDe'];
    $MoTa = $_REQUEST['moTa'];
    $ThoiGianDang = date("Y-m-d");

    $phongTroDao = new PhongTroDao();
    $baiDangDao = new BaiDangDao();

    $baiDangDao->luuBaiDang($TieuDe, $ThoiGianDang, $MoTa, $TenTaiKhoan);

    $MaBaiDang = $baiDangDao->getMaxMaBaiDang($TenTaiKhoan);
    luuPhongTro($MaBaiDang);

    uploadAnh($MaBaiDang);

    $MaPhong = $phongTroDao->getMaPhong($MaBaiDang);
    luuTienNghi($MaPhong);
    luuMoiTruong($MaPhong);
    xemBaiDang($MaBaiDang, $MaPhong);
}

function luuPhongTro($MaBaiDang)
{
    $SoLuongPhong = $_REQUEST['soLuongPhong'];
    $SoPhongTrong = $_REQUEST['soPhongTrong'];
    $SoNguoiToiDa = $_REQUEST['soNguoiToiDa'];
    $GiaPhong = $_REQUEST['giaPhong'];
    $DienTich = $_REQUEST['dienTich'];
    $ChoTuQuan = $_REQUEST['choTuQuan'];
    $MaLoaiPhong = $_REQUEST['loaiPhong'];
    $MaKhuVuc = $_REQUEST['khuVuc'];

    $phongTroDao = new PhongTroDao();
    return $phongTroDao->luuThongTin(
        $SoLuongPhong,
        $SoPhongTrong,
        $SoNguoiToiDa,
        $GiaPhong,
        $DienTich,
        $ChoTuQuan,
        $MaLoaiPhong,
        $MaKhuVuc,
        $MaBaiDang
    );
}

function luuTienNghi($MaPhong)
{
    $result = 0;
    if (isset($_POST['tienNghiList']) && is_array($_POST['tienNghiList'])) {
        $tienNghiDao = new TienNghiDao();
        $tienNghiList = $_POST['tienNghiList'];
        foreach ($tienNghiList as $maTienNghi) {
            $result = $tienNghiDao->luuTienNghi($MaPhong, $maTienNghi);
        }
    }
    return $result;
}

function luuMoiTruong($MaPhong)
{
    $result = 0;
    if (isset($_POST['moiTruongList']) && is_array($_POST['moiTruongList'])) {
        $moiTruongDao = new MoiTruongDao();
        $moiTruongList = $_POST['moiTruongList'];
        foreach ($moiTruongList as $maMoiTruong) {
            $result = $moiTruongDao->luuMoiTruong($MaPhong, $maMoiTruong);
        }
    }
    return $result;
}

function uploadAnh($MaBaiDang)
{
    $files = $_FILES['hinhAnh'];
    $soLuongAnh = count($files['name']);

    $attr = array('name', 'type', 'tmp_name', 'error', 'size');
    $attrCount = count($attr);

    $hinhAnh = array('');

    $i = 0;
    while ($i < $soLuongAnh) {
        for ($j = 0; $j < $attrCount; $j++) {
            $hinhAnh[$j] = $files[$attr[$j]][$i];
        }
        luuHinhAnh($hinhAnh, $MaBaiDang);
        $i++;
    }
}

function luuHinhAnh($hinhAnh, $MaBaiDang)
{

    if ($hinhAnh[3] > 0) {
        echo 'File loi';
    } else {
        $hinhAnhDao = new HinhAnhDao();

        $temp = explode(".", $hinhAnh[0]);
        $maHinhAnh = $hinhAnhDao->maxMaHinhAnh();
        $newfilename = ($maHinhAnh + 1) . '.' . end($temp);

        $result = move_uploaded_file($hinhAnh[2], '../Webcontent/img/phong-tro/' . $newfilename);
        if ($result) {
            $hinhAnhDao->luuHinhAnh('img/phong-tro/' . $newfilename, $MaBaiDang);
            echo 'Up thanh cong';
        }
    }
}
