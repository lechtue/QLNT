<?php 
if (isset($_GET['tenQuanHuyen'])){
    $ten = $_GET['tenQuanHuyen'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "insert into quanhuyen (TenQuanHuyen) values ('$ten')";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachquanhuyen');
}
?>