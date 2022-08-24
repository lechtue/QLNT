<!DOCTYPE html>
<?php
require_once '../Dao/BaiDangDao.php';
require_once '../Dao/TienNghiDao.php';
require_once '../Dao/MoiTruongDao.php';
require_once '../Dao/LoaiPhongDao.php';
require_once '../Dao/KhuVucDao.php';

$baiDangDao = new BaiDangDao();
$listTrongThang = $baiDangDao->tinTrongThang();

$tuKhoa = '';
$tenKhuVuc = '';
$tenLoaiPhong = '';
$choTuQuan = '';

$TuKhoa = $_REQUEST['tuKhoa'];
$MaLoaiPhong = $_REQUEST['loaiPhong'];       #var_dump($MaLoaiPhong);        echo '<br>';
$ChoTuQuan = $_REQUEST['choTuQuan'];        #var_dump($ChoTuQuan);        echo '<br>';
$MaKhuVuc = $_REQUEST['khuVuc'];        #var_dump($MaKhuVuc);    echo '<br>';

if (isset($TuKhoa)) {
    $tuKhoa = $TuKhoa;
}
if (isset($MaKhuVuc) && $MaKhuVuc != -1) {
    $khuVucDao = new KhuVucDao();
    $tenKhuVuc = $khuVucDao->getTenKhuVuc($MaKhuVuc);
}
if (isset($MaLoaiPhong) && $MaLoaiPhong != -1) {
    $loaiPhongDao = new LoaiPhongDao();
    $tenLoaiPhong = $loaiPhongDao->getTenLoaiPhong($MaLoaiPhong);
}
if (isset($ChoTuQuan) && $ChoTuQuan != -1) {
    $choTuQuan = $ChoTuQuan == '1' ? 'Cho tự quản' : 'Không tự quản';
}

$searchResult = $baiDangDao->TimKiem($MaLoaiPhong, $ChoTuQuan, $MaKhuVuc, $tuKhoa);
?>
<html>

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
</head>

<body>
    <?php include_once './header.php'; ?>

    <?php include_once './search.php'; ?>

    <div class="news-area section-padding-100-70">
        <div class="container">
            <div class="row">

                <!-- ##### Search Result Start ##### -->
                <?php if ($searchResult == NULL) { ?>
                    <div class="col-12 col-md-8 col-lg-9">
                        <h3 class="text-danger">Không có bài viết nào cho '<?php echo ($tuKhoa); ?>'.</h3>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-12 col-md-8 col-lg-9">

                        <h3 class="text-danger">
                            Kết quả tìm kiếm
                            <?php if (isset($TuKhoa) && $tuKhoa != '') {
                                echo "cho '" . $tuKhoa . "'";
                            } ?>
                        </h3>
                        <div class="">
                            <?php if ($MaKhuVuc != -1) { ?>
                                <span class="badge badge-dark">
                                    Khu vực <?php echo ($tenKhuVuc); ?>
                                </span>
                            <?php } ?>

                            <?php if ($MaLoaiPhong != -1) { ?>
                                <span class="badge badge-dark">
                                    <?php echo ($tenLoaiPhong); ?>
                                </span>
                            <?php } ?>

                            <?php if ($ChoTuQuan != -1) { ?>
                                <span class="badge badge-dark">
                                    <?php echo ($choTuQuan); ?>
                                </span>
                            <?php } ?>
                        </div>
                        <br>
                        <?php foreach ($searchResult as $baiDang) { ?>

                            <!-- Single News Area -->
                            <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>">
                                        <img src="<?php echo ($baiDang->HinhAnh); ?>" alt="<?php echo ($baiDang->TieuDe); ?>">
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
                                    <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>" class="post-title">
                                        <?php echo ($baiDang->TieuDe); ?>
                                    </a>
                                    <span class="post-date">
                                        <b><?php echo number_format($baiDang->GiaPhong); ?> </b>
                                        / tháng
                                    </span> <br>
                                    <span class="post-author">Đăng bởi: <?php echo ($baiDang->HoTen); ?></span>
                                    <div>
                                        <?php $moTa = preg_split('/\r\n|\r|\n/', $baiDang->MoTa); ?>
                                        <label class="text-dark">
                                            <?php echo ($moTa[0]); ?>
                                        </label><br>
                                        <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>" class="show-more-link">
                                            ...xem thêm
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                <?php } ?>
                <!-- ##### Search result End ##### -->
                <!-- Post this month -->
                <div class="col-12 col-md-4 col-lg-3">
                    <h3 class="text-danger mb-4">Tin tháng này</h3>

                    <?php
                    $i = 0;
                    /* @var $baiDang BaiDang */
                    foreach ($listTrongThang as $key => $baiDang) {
                    ?>

                        <!-- Single News Area -->
                        <div class="single-blog-post style-6 mb-30">
                            <!-- Blog Thumbnail -->
                            <div class="blog-thumbnail">
                                <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>">
                                    <img src="<?php echo ($baiDang->HinhAnh); ?>" alt="<?php echo ($baiDang->TieuDe); ?>">
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
                                <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>" class="post-title">
                                    <?php echo ($baiDang->TieuDe); ?>
                                </a>
                                <span class="post-date">
                                    <b><?php echo number_format($baiDang->GiaPhong); ?> </b>
                                    / tháng
                                </span> <br>
                                <span class="post-author">Đăng bởi: <?php echo ($baiDang->HoTen); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
    <!-- Auto scroll -->
    <script>
        $(document).ready(function() {
            if ($('html, body').scrollTop() < 10) {
                $('html, body').delay(100).animate({
                    scrollTop: 540
                }, 1000);
            }
        });
    </script>
</body>

</html>