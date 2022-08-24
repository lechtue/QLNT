<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "update taikhoan set TrangThai = 1 where TenTaiKhoan = '$id';";
    $result = mysqli_query($connect, $sql);
}
?>