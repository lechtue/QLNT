<?php
$connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
mysqli_set_charset($connect, 'utf8');
$sql = "SELECT * from moitruong";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="title" style="display: flex;">
            <div class="title-l" style="width:90% ;">
                <h2>Quản lý Môi Trường </h2>

            </div>
            <div class="title-r" style="width:10% ;">
                <a type="button" class="btn btn-success" href="./index.php?action=themmoitruong">Thêm mới</a>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã tiện nghi</th>
                    <th>Tên tiện nghi</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo '<tbody>
                <tr>
                    <td>' . $row['MaMoiTruong'] . '</td>
                    <td>' . $row['TenMoiTruong'] . '</td>
                    <td>
                    <a type="button" class="btn btn-warning" href="./index.php?action=suamoitruong&id=' . $row['MaMoiTruong'] . '">Sửa</a>
                    <a type="button" class="btn btn-danger" href="./index.php?action=xoamoitruong&id=' . $row['MaMoiTruong'] . '">Xóa</a>
                    </td>
                </tr>
            </tbody>';
            }
            ?>

        </table>
    </div>
</body>

</html>