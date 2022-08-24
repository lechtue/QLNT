<?php

require_once '../Model/MoiTruong.php';

class MoiTruongDao
{
    public function __construct()
    {
    }

    public function getMoiTruong()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = array();
        $i = 0;
        $sql = "select * from MoiTruong";

        $query = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($query);
        if ($num_row > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $rs[$i] = new MoiTruong($row['MaMoiTruong'], $row['TenMoiTruong']);
                $i++;
            }
        }
        mysqli_close($connect);
        return $rs;
    }

    function getDanhSachTheoPhong($maPhong)
    {
        $sql = "SELECT MoiTruong.* FROM DanhSachMoiTruong "
            . "JOIN MoiTruong ON DanhSachMoiTruong.MaMoiTruong = MoiTruong.MaMoiTruong "
            . "WHERE DanhSachMoiTruong.MaPhong = {$maPhong}";

        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = array();
        $i = 0;

        $querry = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($querry);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($querry)) {
                $rs[$i] = new MoiTruong($row['MaMoiTruong'], $row['TenMoiTruong']);
                $i++;
            }
        }
        $querry->close();
        return $rs;
    }

    public function luuMoiTruong($MaPhong, $MaMoiTruong)
    {
        $link = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($link, 'utf8');

        $sql = "INSERT INTO `DanhSachMoiTruong`(`MaMoiTruong`, `MaPhong`) "
            . "VALUES ({$MaMoiTruong}, {$MaPhong})";
        $stmt = $link->prepare($sql);
        $result = $stmt->execute();
        $stmt->close();
        $link->close();
        return $result;
    }
}
