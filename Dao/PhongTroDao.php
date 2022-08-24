<?php

require_once '../Model/PhongTro.php';

class PhongTroDao
{

    public function __construct()
    {
    }

    public function getThongTin($maPhong)
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');
        $sql = "SELECT PhongTro.*, KhuVuc.TenKhuVuc, QuanHuyen.TenQuanHuyen, LoaiPhong.TenLoaiPhong "
            . "FROM quanhuyen,PhongTro "
            . "JOIN KhuVuc ON PhongTro.MaKhuVuc = KhuVuc.MaKhuVuc "
            . "JOIN LoaiPhong ON LoaiPhong.MaLoaiPhong = PhongTro.MaLoaiPhong "
            . "WHERE PhongTro.MaPhong = {$maPhong} and QuanHuyen.MaQuanHuyen = KhuVuc.MaQuanHuyen";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $p = new PhongTro($row['MaPhong'], $row['SoLuongPhong'], $row['SoPhongTrong'], $row['SoNguoiToiDa'], $row['GiaPhong'], $row['DienTich'], $row['ChoTuQuan'], $row['TenLoaiPhong'], $row['TenKhuVuc'], $row['TenQuanHuyen'], $row['MaBaiDang']);
                return $p;
            }
            $result->close();
        }
        return null;
    }

    public function luuThongTin($SoLuongPhong, $SoPhongTrong, $SoNguoiToiDa, $GiaPhong, $DienTich, $ChoTuQuan, $MaLoaiPhong, $MaKhuVuc, $MaBaiDang)
    {

        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $sql = "INSERT INTO `PhongTro`"
            . "(`SoLuongPhong`, `SoPhongTrong`, "
            . "`SoNguoiToiDa`, `GiaPhong`, "
            . "`DienTich`, `ChoTuQuan`, "
            . "`MaLoaiPhong`, `MaKhuVuc`, "
            . " `MaBaiDang`) "
            . "VALUES("
            . "{$SoLuongPhong}, {$SoPhongTrong},"
            . "{$SoNguoiToiDa}, {$GiaPhong},"
            . "{$DienTich}, {$ChoTuQuan},"
            . "{$MaLoaiPhong}, {$MaKhuVuc},"
            . "'{$MaBaiDang}')";
        $stmt = $connect->prepare($sql);
        $result = $stmt->execute();
        $stmt->close();
        $connect->close();
        return $result;
    }

    public function getMaPhong($MaBaiDang)
    {
        /* @var $stmt mysqli_stmt */
        /* @var $result mysqli_result */
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $sql = "SELECT PhongTro.MaPhong FROM `PhongTro` WHERE MaBaiDang = {$MaBaiDang}";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_row()[0];
        }
        $stmt->close();
        $connect->close();
        return $result;
    }
}
