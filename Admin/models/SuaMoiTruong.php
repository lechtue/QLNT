<?php
if (isset($_GET['tenMoiTruong']) && isset($_GET['maMT'])){
    $tenMoiTruong = $_GET['tenMoiTruong'];
    $id = $_GET['maMT'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "update moitruong set TenMoiTruong = '$tenMoiTruong' where MaMoiTruong = $id;";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachmoitruong');
}
?>