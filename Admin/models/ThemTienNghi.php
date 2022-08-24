<?php 
if (isset($_GET['tenTienNghi'])){
    $tenTienNghi = $_GET['tenTienNghi'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "insert into tiennghi (TenTienNghi) values ('$tenTienNghi')";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachtiennghi');
}
?>