<?php
session_start();
require_once '../Dao/BaiDangDao.php';
$TenTaiKhoan = $_SESSION['TenTaiKhoan'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title -->
  <title>Phòng trọ sinh viên</title>

  <!-- Favicon -->
  <link rel="icon" href="img/core-img/icon.ico">

  <!-- Stylesheet -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/my-style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <?php include_once './header.php'; ?>
  <div id="bg-search">
  </div>
  <div class="top-news-area section-padding-100" style="padding-top: 30px">
    <div class="container">
      <h3 class="text-danger" style="background-color: #f0f4f8; padding: 3px 9px;">Danh sách bài đăng</h3>
      <div class="row">
        <?php
        $baiDangDao = new BaiDangDao();
        $listBaiDang = $baiDangDao->danhSachBaiDang($TenTaiKhoan);
        $i = 0;
        /* @var $baiDang BaiDang */
        foreach ($listBaiDang as $key => $baiDang) {
        ?>
          <!-- Single News Area -->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-blog-post style-2 mb-5">
              <!-- Blog Thumbnail -->
              <div class="blog-thumbnail">
                <a href="update-post.php?post=<?php echo ($baiDang->MaBaiDang); ?>&room=<?php echo ($baiDang->MaPhong); ?>">
                  <img src="<?php echo ($baiDang->HinhAnh); ?>" accesskey="" alt="<?php echo ($baiDang->TieuDe); ?>">
                </a>
              </div>

              <!-- Blog Content -->
              <div class="blog-content">
                <span class="post-date">
                  <?php echo ($baiDang->ThoiGiagDang); ?>
                </span>
                <span class="post-view-rate">
                  <?php echo ($baiDang->LuotXem); ?> lượt xem
                </span>
                <a href="update-post.php?post=<?php echo ($baiDang->MaBaiDang); ?>&room=<?php echo ($baiDang->MaPhong); ?>" class="post-title">
                  <?php echo ($baiDang->TieuDe); ?>
                </a>
                <span class="post-date">
                  <b><?php echo number_format($baiDang->GiaPhong); ?> </b>
                  / tháng
                </span>
              </div>
              <?php
              if ($baiDang->TrangThai == 0)
                echo "<div style='color: orange;'> <b>Chờ duyệt</b></div>";
              else if ($baiDang->TrangThai == 1)
                echo "<div style='color: green;'> <b>Đã duyệt</b></div>";
              else if ($baiDang->TrangThai == 2)
                echo "<div style='color: red;'> <b>Bị khoá</b></div>";
              ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>


  <?php include_once './footer.php'; ?>

  <!-- ##### All Javascript Script ##### -->
  <!-- jQuery-2.2.4 js -->
  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="js/bootstrap/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <!-- All Plugins js -->
  <script src="js/plugins/plugins.js"></script>
  <!-- Active js -->
  <script src="js/active.js"></script>
  <!-- My js 
        <script src="js/my-script.js"></script>-->
</body>

</html>