<?php 
if (isset($_GET['tenMoiTruong'])){
    $ten = $_GET['tenMoiTruong'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "insert into moitruong (TenMoiTruong) values ('$ten')";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachmoitruong');
}
?>