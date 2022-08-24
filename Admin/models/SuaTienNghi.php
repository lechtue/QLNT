<?php 
if (isset($_GET['tenTienNghi']) && isset($_GET['id'])){
    $tenTienNghi = $_GET['tenTienNghi'];
    $id = $_GET['id'];
    $connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
    mysqli_set_charset($connect, 'utf8');
    $sql = "update tiennghi set TenTienNghi = '$tenTienNghi' where MaTienNghi = $id;";
    $result = mysqli_query($connect, $sql);
    header('location: ../index.php?action=danhsachtiennghi');
}
?>