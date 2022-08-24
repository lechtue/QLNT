<?php
$id = $_GET['id'];
$connect = mysqli_connect('localhost', 'root', '', 'phongtrosinhvien');
mysqli_set_charset($connect, 'utf8');
$sql = "SELECT * from quanhuyen";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
?>



<h1> Sửa khu vực</h1>
<form action="models/SuaKhuVuc.php">
  <input name="maKV" type="text" class="form-control" value="<?php echo $id; ?>" aria-describedby="basic-addon2" readonly>
  <input name="tenKhuVuc" type="text" class="form-control" placeholder="Nhập tên khu vực" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div>
    <select name="quanHuyen" class="form-control">
      <option value="-1" selected>
        Chọn quận / huyện...
      </option>
      <?php while ($row = mysqli_fetch_array($result)) { ?>
        <option value="<?php echo ($row['MaQuanHuyen']); ?>">
          <?php echo ($row['TenQuanHuyen']); ?>
        </option>
      <?php } ?>
    </select>
  </div>
  <div class="input-group-append">
    <button class="btn btn-success" type="submit">Lưu</button>
  </div>
</form>