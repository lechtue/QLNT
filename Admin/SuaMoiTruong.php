<?php
$id = $_GET['id'];
?>


<h1> Sửa môi trường </h1>
<form action="models/SuaMoiTruong.php">
  <input name="maMT" type="text" class="form-control" value="<?php echo $id; ?>" aria-describedby="basic-addon2" readonly>
  <input name="tenMoiTruong" type="text" class="form-control" placeholder="Nhập tên môi trường" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit">Submit</button>
  </div>
</form>