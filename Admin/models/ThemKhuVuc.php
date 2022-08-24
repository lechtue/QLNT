<?php 
if (isset($_GET['tenKhuVuc'])){
    $ten = $_GET['tenKhuVuc'];
    $maQH = $_GET['quanHuyen'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "insert into khuvuc (TenKhuVuc, MaQuanHuyen) values ('$ten', $maQH)";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachkhuvuc');
}
?>