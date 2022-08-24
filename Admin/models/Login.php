<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "select * from taikhoan where MaLoaiTaiKhoan = 3";
    $result = mysqli_query($connect, $sql);
    $check = FALSE;
    while ($row = mysqli_fetch_array($result)) {
        if ($_POST['username'] == $row['TenTaiKhoan'] && $_POST['password'] == $row['MatKhau']) {                      
            $_SESSION['Login'] = 1;
            header('location: ../index.php');
        }
        else {
            header('location: ../login.php');
        }
    }
} else {
    header('location: ../login.php');
}
