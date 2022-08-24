<?php

require_once '../Model/TienNghi.php';

class TienNghiDao
{

    function __construct()
    {
    }

    function getTienNghi()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = array();
        $i = 0;
        $sql = "select * from TienNghi";

        $querry = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($querry);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($querry)) {
                $rs[$i] = new TienNghi($row['MaTienNghi'], $row['TenTienNghi']);
                $i++;
            }
        }
        mysqli_close($connect);
        return $rs;
    }

    function getDanhSachTheoPhong($maPhong)
    {
        $sql = "SELECT TienNghi.* FROM DanhSachTienNghi\n"

            . "                JOIN TienNghi ON DanhSachTienNghi.MaTienNghi = TienNghi.MaTienNghi\n"

            . "                WHERE DanhSachTienNghi.MaPhong = {$maPhong}";

        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = array();
        $i = 0;

        $querry = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($querry);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($querry)) {
                $rs[$i] = new TienNghi($row['MaTienNghi'], $row['TenTienNghi']);
                $i++;
            }
        }
        $querry->close();
        return $rs;
    }

    public function luuTienNghi($MaPhong, $MaTienNghi)
    {
        $link = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($link, 'utf8');

        $sql = "INSERT INTO `DanhSachTienNghi`(`MaTienNghi`, `MaPhong`) "
            . "VALUES ({$MaTienNghi}, {$MaPhong})";
        $stmt = $link->prepare($sql);
        $result = $stmt->execute();
        $stmt->close();
        $link->close();
        return $result;
    }
}
