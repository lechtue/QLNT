<?php
$connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
mysqli_set_charset($connect, 'utf8');
$sql = "SELECT * from tiennghi";
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
                <h2>Quản lý tiện nghi </h2>

            </div>
            <div class="title-r" style="width:10% ;">
                <a type="button" class="btn btn-success" href="./index.php?action=themtiennghi">Thêm mới</a>
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
                    <td>' . $row['MaTienNghi'] . '</td>
                    <td>' . $row['TenTienNghi'] . '</td>
                    <td>
                    <a type="button" class="btn btn-warning" href="./index.php?action=suatiennghi&id=' . $row['MaTienNghi'] . '">Sửa</a>
                    <a type="button" class="btn btn-danger" href="./index.php?action=xoatiennghi&id=' . $row['MaTienNghi'] . '">Xóa</a>
                    </td>
                </tr>
            </tbody>';
            }
            ?>

        </table>
    </div>
</body>

</html>