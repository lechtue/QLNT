<?php
if (isset($_GET['tenKhuVuc']) && isset($_GET['maKV'])){
    $ten = $_GET['tenKhuVuc'];
    $id = $_GET['maKV'];
    $idQH = $_GET['quanHuyen'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "update khuvuc set TenKhuVuc = '$ten', MaQuanHuyen = $idQH where MaKhuVuc = $id;";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachkhuvuc');
}
?>