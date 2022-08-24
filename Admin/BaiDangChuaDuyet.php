<?php
$connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
mysqli_set_charset($connect, 'utf8');
$sql = "SELECT * from baidang where TrangThai = 0";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page </title>
</head>

<body>
    <div class="container">
        <div class="title" style="display: flex;">
            <div class="title-l" style="width:90% ;">
                <h2>Bài đăng chưa duyệt</h2>

            </div>
            <div class="title-r" style="width:10% ;">
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã bài đăng</th>
                    <th>Tiêu đề</th>
                    <th>Thời gian đăng</th>
                    <th>Mô tả</th>
                    <th>Số lượt xem</th>
                    <th>Người đăng</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo '<tbody>
                <tr>
                    <td>' . $row['MaBaiDang'] . '</td>
                    <td>' . $row['TieuDe'] . '</td>
                    <td>' . $row['ThoiGianDang'] . '</td>
                    <td>' . $row['MoTa'] . '</td>
                    <td>' . $row['LuotXem'] . '</td>
                    <td>' . $row['TenTaiKhoan'] . '</td>
                    <td>
                    <a type="button" class="btn btn-success" href="./index.php?action=duyetbaidang&id=' . $row['MaBaiDang'] . '">Duyệt</a>
                    <a type="button" class="btn btn-danger" href="./index.php?action=khoabaidang&id=' . $row['MaBaiDang'] . '">Khoá</a>
                    </td>
                </tr>
            </tbody>';
            }
            ?>

        </table>
    </div>
</body>

</html>