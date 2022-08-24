<?php

require_once '../Model/LoaiPhong.php';

class LoaiPhongDao
{
    public function __construct()
    {
    }

    public function getLoaiPhong()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = array();
        $i = 0;
        $sql = "select * from LoaiPhong";

        $query = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($query);
        if ($num_row > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $rs[$i] = new LoaiPhong($row['MaLoaiPhong'], $row['TenLoaiPhong']);
                $i++;
            }
        }
        mysqli_close($connect);
        return $rs;
    }

    public function getTenLoaiPhong($MaLoaiPhong)
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = '';
        $i = 0;
        $sql = "select TenLoaiPhong from LoaiPhong where MaLoaiPhong = {$MaLoaiPhong}";

        $query = mysqli_query($connect, $sql);
        $num_row = mysqli_num_rows($query);
        if ($num_row > 0) {
            $row = mysqli_fetch_row($query);
            $rs = $row[0];
        }
        mysqli_close($connect);
        return $rs;
    }
}
