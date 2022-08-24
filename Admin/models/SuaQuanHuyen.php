<?php
if (isset($_GET['tenQH']) && isset($_GET['maQH'])){
    $ten = $_GET['tenQH'];
    $id = $_GET['maQH'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "update quanhuyen set TenQuanHuyen = '$ten' where MaQuanHuyen = $id;";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachquanhuyen');
}
?>