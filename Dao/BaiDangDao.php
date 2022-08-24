<?php

include_once '../Model/BaiDang.php';
include_once '../Dao/HinhAnhDao.php';

class BaiDangDao
{

    function __construct()
    {
    }

    function danhSachBaiDang($tenTaiKhoan)
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');
        $rs = array();
        $i = 0;
        $sql = "SELECT ViewBaiDang.*, BaiDang.LuotXem, BaiDang.TrangThai FROM ViewBaiDang JOIN BaiDang ON ViewBaiDang.MaBaiDang = BaiDang.MaBaiDang and BaiDang.TenTaiKhoan = '{$tenTaiKhoan}' ORDER BY ViewBaiDang.ThoiGianDang;";
        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);
        $hinhAnh = new HinhAnhDao();

        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $rs[$i] = new BaiDang($row['HoTen'], $row['TieuDe'], $row['ThoiGianDang']);
                $rs[$i]->MaBaiDang = $row['MaBaiDang'];
                $rs[$i]->MaPhong = $row['MaPhong'];
                $rs[$i]->HinhAnh = $hinhAnh->getAnhDaiDien($row['MaBaiDang']);
                $rs[$i]->GiaPhong = $row['GiaPhong'];
                $rs[$i]->LuotXem = $row['LuotXem'];
                $rs[$i]->TrangThai = $row['TrangThai'];
                $i++;
            }
        }
        $result->close();
        mysqli_close($connect);
        return $rs;
    }

    function topMoiNhat()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');
        $rs = array();
        $i = 0;
        $sql = "SELECT ViewBaiDang.*, BaiDang.LuotXem FROM ViewBaiDang JOIN BaiDang ON ViewBaiDang.MaBaiDang = BaiDang.MaBaiDang and BaiDang.TrangThai = 1 ORDER BY ViewBaiDang.ThoiGianDang DESC LIMIT 10;";
        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);
        $hinhAnh = new HinhAnhDao();

        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $rs[$i] = new BaiDang($row['HoTen'], $row['TieuDe'], $row['ThoiGianDang']);
                $rs[$i]->MaBaiDang = $row['MaBaiDang'];
                $rs[$i]->MaPhong = $row['MaPhong'];
                $rs[$i]->HinhAnh = $hinhAnh->getAnhDaiDien($row['MaBaiDang']);
                $rs[$i]->GiaPhong = $row['GiaPhong'];
                $rs[$i]->LuotXem = $row['LuotXem'];
                $i++;
            }
        }
        $result->close();
        mysqli_close($connect);
        return $rs;
    }

    function topGiaReNhat()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');
        $list = array();
        $i = 0;
        $hinhAnhDao = new HinhAnhDao();
        $sql = "SELECT ViewBaiDang.MaPhong, ViewBaiDang.MaBaiDang, ViewBaiDang.HoTen,
                ViewBaiDang.TieuDe, ViewBaiDang.ThoiGianDang, ViewBaiDang.GiaPhong, BaiDang.LuotXem
                FROM ViewBaiDang JOIN BaiDang ON ViewBaiDang.MaBaiDang = BaiDang.MaBaiDang and BaiDang.TrangThai = 1
                ORDER BY ViewBaiDang.GiaPhong LIMIT 10";
        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $list[$i] = new BaiDang($row['HoTen'], $row['TieuDe'], $row['ThoiGianDang']);
                $list[$i]->GiaPhong = $row['GiaPhong'];
                $list[$i]->MaBaiDang = $row['MaBaiDang'];
                $list[$i]->MaPhong = $row['MaPhong'];
                $list[$i]->HinhAnh = $hinhAnhDao->getAnhDaiDien($row['MaBaiDang']);
                $list[$i]->LuotXem = $row['LuotXem'];
                $i++;
            }
        }
        $result->close();
        mysqli_close($connect);
        return $list;
    }

    function topXemNhieuNhat()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');
        $list = array();
        $i = 0;
        $hinhAnhDao = new HinhAnhDao();
        $sql = "  SELECT ViewBaiDang.*, BaiDang.LuotXem "
            . "FROM ViewBaiDang JOIN BaiDang ON BaiDang.MaBaiDang = ViewBaiDang.MaBaiDang and BaiDang.TrangThai = 1 "
            . "ORDER BY BaiDang.LuotXem DESC LIMIT 10";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $list[$i] = new BaiDang($row['HoTen'], $row['TieuDe'], $row['ThoiGianDang']);
                $list[$i]->GiaPhong = $row['GiaPhong'];
                $list[$i]->MaBaiDang = $row['MaBaiDang'];
                $list[$i]->MaPhong = $row['MaPhong'];
                $list[$i]->HinhAnh = $hinhAnhDao->getAnhDaiDien($row['MaBaiDang']);
                $list[$i]->LuotXem = $row['LuotXem'];
                $i++;
            }
        }
        $result->close();
        mysqli_close($connect);
        return $list;
    }

    function tinTrongThang()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $rs = array();
        $i = 0;
        $hinhAnh = new HinhAnhDao();
        $sql = "  SELECT ViewBaiDang.*, BaiDang.LuotXem "
            . "FROM ViewBaiDang JOIN BaiDang ON BaiDang.MaBaiDang = ViewBaiDang.MaBaiDang and BaiDang.TrangThai = 1 "
            . "WHERE MONTH(ViewBaiDang.ThoiGianDang) = MONTH(CURRENT_DATE) LIMIT 12";
        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $rs[$i] = new BaiDang($row['HoTen'], $row['TieuDe'], $row['ThoiGianDang']);
                $rs[$i]->GiaPhong = $row['GiaPhong'];
                $rs[$i]->MaBaiDang = $row['MaBaiDang'];
                $rs[$i]->MaPhong = $row['MaPhong'];
                $rs[$i]->HinhAnh = $hinhAnh->getAnhDaiDien($row['MaBaiDang']);
                $rs[$i]->LuotXem = $row['LuotXem'];
                $i++;
            }
        }
        $result->close();
        mysqli_close($connect);
        return $rs;
    }

    function capNhatLuotXem($maBaiDang)
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $sql = "UPDATE BaiDang SET LuotXem = LuotXem + 1 WHERE MaBaiDang = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $maBaiDang);
        $stmt->execute();
        $stmt->close();
        mysqli_close($connect);
    }

    function getThongTin($maBaiDang)
    {
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');
        $hinhAnh = new HinhAnhDao();
        $sql = "SELECT ViewBaiDang.*, BaiDang.MoTa "
            . "FROM ViewBaiDang JOIN BaiDang ON ViewBaiDang.MaBaiDang = BaiDang.MaBaiDang "
            . "WHERE ViewBaiDang.MaBaiDang = {$maBaiDang}";

        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $rs = new BaiDang($row['HoTen'], $row['TieuDe'], $row['ThoiGianDang']);
                $rs->MaBaiDang = $row['MaBaiDang'];
                $rs->MaPhong = $row['MaPhong'];
                $rs->HinhAnh = $hinhAnh->getAnhDaiDien($row['MaBaiDang']);
                $rs->MoTa = $row['MoTa'];
                return $rs;
            }
            $result->close();
        }
        mysqli_close($connect);
        return null;
    }

    function luuBaiDang($TieuDe, $ThoiGianDang, $MoTa, $TenTaiKhoan)
    {
        $link = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($link, 'utf8');

        $sql = "INSERT INTO `BaiDang`(`TieuDe`, `ThoiGianDang`, `MoTa`, `LuotXem`, `TenTaiKhoan`, `TrangThai`) "
            . "VALUES (?, '{$ThoiGianDang}', ?, 0, '{$TenTaiKhoan}', 0)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("ss", $TieuDe, $MoTa);
        $result = $stmt->execute();

        $stmt->close();
        mysqli_close($link);
        return $result;
    }

    function getMaxMaBaiDang($TenTaiKhoan)
    {
        /* @var $stmt mysqli_stmt */
        /* @var $result mysqli_result */
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');

        $sql = "SELECT MAX(BaiDang.MaBaiDang) FROM BaiDang WHERE TenTaiKhoan = '{$TenTaiKhoan}'";
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

    public function TimKiem($MaLoaiPhong, $ChoTuQuan, $MaKhuVuc, $TuKhoa)
    {
        $rs = array();
        $connect = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connect, 'utf8');
        $sql = "SELECT ViewBaiDang.*, BaiDang.LuotXem, BaiDang.MoTa FROM ViewBaiDang
            JOIN PhongTro ON ViewBaiDang.MaBaiDang = PhongTro.MaBaiDang
            JOIN BaiDang ON ViewBaiDang.MaBaiDang = BaiDang.MaBaiDang and BaiDang.TrangThai = 1
            WHERE ViewBaiDang.TieuDe LIKE '%{$TuKhoa}%'";
        if (isset($MaLoaiPhong) && $MaLoaiPhong != -1) {
            $sql = $sql . " AND PhongTro.MaLoaiPhong = {$MaLoaiPhong}";
        }
        if (isset($MaKhuVuc) && $MaKhuVuc != -1) {
            $sql = $sql . " AND PhongTro.MaKhuVuc = {$MaKhuVuc}";
        }
        if (isset($ChoTuQuan) && $ChoTuQuan != -1) {
            $sql = $sql . " AND PhongTro.ChoTuQuan = {$ChoTuQuan}";
        }
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            $hinhAnh = new HinhAnhDao();
            while ($row = mysqli_fetch_array($result)) {
                $rs[$i] = new BaiDang($row['HoTen'], $row['TieuDe'], $row['ThoiGianDang']);
                $rs[$i]->HinhAnh = $hinhAnh->getAnhDaiDien($row['MaBaiDang']);
                $rs[$i]->GiaPhong = $row['GiaPhong'];
                $rs[$i]->MaBaiDang = $row['MaBaiDang'];
                $rs[$i]->MaPhong = $row['MaPhong'];
                $rs[$i]->LuotXem = $row['LuotXem'];
                $rs[$i]->MoTa = $row['MoTa'];
                $i++;
            }
            $result->close();
            return $rs;
        }
        return null;
    }
}
