<?php

require_once '../Model/KhuVuc.php';

class KhuVucDao
{
    public function __construct()
    {
    }

    public function getKhuVuc()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = array();
        $i = 0;
        $sql = "select khuvuc.*, TenQuanHuyen from KhuVuc, QuanHuyen where khuvuc.MaQuanHuyen = quanhuyen.MaQuanHuyen";

        $query = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($query);
        if ($num_row > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $rs[$i] = new KhuVuc($row['MaKhuVuc'], $row['TenKhuVuc'], $row['TenQuanHuyen']);
                $i++;
            }
        }
        mysqli_close($connect);
        return $rs;
    }

    public function getTenKhuVuc($MaKhuVuc)
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = '';
        $i = 0;
        $sql = "select khuvuc.TenKhuVuc, TenQuanHuyen from KhuVuc, QuanHuyen where khuvuc.MaQuanHuyen = quanhuyen.MaQuanHuyen and khuvuc.MaKhuVuc = {$MaKhuVuc}";

        $query = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($query);
        if ($num_row > 0) {
            $row = mysqli_fetch_row($query);
            $rs = "$row[0] - $row[1]";
        }
        mysqli_close($connect);
        return $rs;
    }
}
