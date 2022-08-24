<?php
$connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
mysqli_set_charset($connect, 'utf8');
$sql = "SELECT * from taikhoan where MaLoaiTaiKhoan = 1";
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
                <h2>Quản lý tài khoản chủ trọ </h2>

            </div>
            <div class="title-r" style="width:10% ;">
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo '<tbody>
                <tr>
                    <td>' . $row['TenTaiKhoan'] . '</td>
                    <td>' . $row['MatKhau'] . '</td>';
                if ($row['TrangThai'] == 1) {
                    echo '
                    <td>Hoạt động</td>
                    <td>
                    <a type="button" class="btn btn-danger" href="./index.php?action=khoachutro&id=' . $row['TenTaiKhoan'] . '">Khóa</a>
                    </td>
                </tr>
            </tbody>';
                } else {
                    echo '
            <td>Tạm khoá</td>
            <td>
            <a type="button" class="btn btn-success" href="./index.php?action=mochutro&id=' . $row['TenTaiKhoan'] . '">Mở</a>
            </td>
        </tr>
    </tbody>';
                }
            }
            ?>

        </table>
    </div>
</body>

</html>