<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "update baidang set TrangThai = 2 where MaBaiDang = '$id';";
    $result = mysqli_query($connect, $sql);
}
?>