<?php
$id = $_GET['id'];
?>


<h1> Sửa quận huyện</h1>
<form action="models/SuaQuanHuyen.php">
  <input name="maQH" type="text" class="form-control" value="<?php echo $id; ?>" aria-describedby="basic-addon2" readonly>
  <input name="tenQH" type="text" class="form-control" placeholder="Nhập tên quận/huyện" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit">Submit</button>
  </div>
</form>