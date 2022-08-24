<!--  Tin trong thang  -->
<div class="top-news-area section-padding-100" style="padding-top: 30px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-danger" style="background-color: #f0f4f8; padding: 3px 9px;">Tin tháng này</h3>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 0;
            /* @var $baiDang BaiDang */
            foreach ($listTrongThang as $key => $baiDang) {
            ?>
                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>">
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
                            <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>" class="post-title">
                                <?php echo ($baiDang->TieuDe); ?>
                            </a>
                            <span class="post-author">Đăng bởi: <?php echo ($baiDang->HoTen); ?></span>
                            <span class="post-date">
                                <b><?php echo number_format($baiDang->GiaPhong); ?> </b>
                                / tháng
                            </span>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- ##### Top News Area End ##### -->