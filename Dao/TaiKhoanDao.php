<?php

require_once '../Model/TaiKhoan.php';
require_once '../Model/ThongTinTaiKhoan.php';

class TaiKhoanDao
{
    //put your code here
    function AddTaiKhoan($TenTaiKhoan, $MatKhau, $MaLoaiTaiKhoan, $HoTen, $Sdt, $GioiTinh)
    {
        $connection = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connection, 'utf8');
        if ($connection->connect_error) {
            die('kết nối không thành công ' . $connection->connect_error);
            return;
        }
        //them tai khoan
        $query = "INSERT INTO `TaiKhoan`(`TenTaiKhoan`, `MatKhau`, `MaLoaiTaiKhoan`, `TrangThai`) VALUES (?,?,?,1)";
        $stmt = $connection->prepare($query);
        //Gan tham so
        $stmt->bind_param("ssi", $TenTaiKhoan, $MatKhau, $MaLoaiTaiKhoan);
        // Thuc thi
        $stmt->execute();
        // Dong ket noi
        $stmt->close();
        //them thong tin tai khoan
        $query = "INSERT INTO `ThongTinTaiKhoan`(`TenTaiKhoan`, `HoTen`,`SoDienThoai`, `GioiTinh`) VALUES ('{$TenTaiKhoan}','{$HoTen}','{$Sdt}',{$GioiTinh})";
        $stmt = $connection->prepare($query);

        $stmt->execute();
        $stmt->close();
        $connection->close();
    }

    function UpdateTaiKhoan($TenTaiKhoan, $HoTen, $Sdt, $GioiTinh)
    {
        $connection = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connection, 'utf8');
        if ($connection->connect_error) {
            die('kết nối không thành công ' . $connection->connect_error);
            return;
        }
        //Sua thong tin tai khoan
        $query = "UPDATE `thongtintaikhoan` SET `HoTen` = '{$HoTen}', `GioiTinh` = '{$GioiTinh}', `SoDienThoai` = '{$Sdt}' WHERE `thongtintaikhoan`.`TenTaiKhoan` = '{$TenTaiKhoan}';";
        $stmt = $connection->prepare($query);

        $stmt->execute();
        $stmt->close();
        $connection->close();
    }

    
    function ChangePassword($TenTaiKhoan, $Password, $Newpass)
    {
        $connection = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connection, 'utf8');
        if ($connection->connect_error) {
            die('kết nối không thành công ' . $connection->connect_error);
            return;
        }
        //Sua thong tin tai khoan
        $query = "UPDATE `taikhoan` SET `MatKhau` = '{$Newpass}' WHERE `TenTaiKhoan` = '{$TenTaiKhoan}' AND `MatKhau` = '{$Password}';";
        $stmt = $connection->prepare($query);

        $stmt->execute();
        $stmt->close();
        $connection->close();
    }

    function GetTaiKhoan($TenTaiKhoan, $MatKhau, $MaLoaiTaiKhoan)
    {
        $connection = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connection, 'utf8');
        if ($connection->connect_error) {
            die('Kết nối không thành công: ' . $connection->connect_error);
            return;
        }
        $sql = "SELECT * FROM `TaiKhoan` WHERE TenTaiKhoan = ? AND MatKhau = ? AND MaLoaiTaiKhoan = ?";

        /*@var $stmt mysqli_stmt*/
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssi", $TenTaiKhoan, $MatKhau, $MaLoaiTaiKhoan);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            $taiKhoan = new TaiKhoan($row[0], $row[1], $row[3], $row[2]);
            return $taiKhoan;
        }
        $stmt->close();
        $connection->close();
        return null;
    }
    function GetThongTin($TenTaiKhoan)
    {
        $connection = mysqli_connect('localhost', 'root', '', 'PhongTroSinhVien');
        mysqli_set_charset($connection, 'utf8');
        if ($connection->connect_error) {
            die('Kết nối không thành công: ' . $connection->connect_error);
            return;
        }
        $sql = "SELECT * FROM `thongtintaikhoan` WHERE TenTaiKhoan = '{$TenTaiKhoan}'";

        /*@var $stmt mysqli_stmt*/
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                return new ThongTinTaiKhoan($row['TenTaiKhoan'], $row['HoTen'], $row['SoDienThoai'], $row['GioiTinh']);;
            }
            $result->close();
        }
        return null;
    }
}
