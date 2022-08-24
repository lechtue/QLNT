<?php
$id = $_GET['id'];
?>


<h1> Sửa tiện nghi </h1>
<form action="models/SuaTienNghi.php">
  <input name="id" type="text" class="form-control" value="<?php echo $id; ?>" aria-describedby="basic-addon2" readonly>
  <input name="tenTienNghi" type="text" class="form-control" placeholder="Nhập tên tiện nghi" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit">Submit</button>
  </div>
</form>