<!-- Top pho bien nhat -->
<div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
    <div class="row">
        <?php
        $i = 0;
        /* @var $baiDang BaiDang */
        foreach ($listXemNhieuNhat as $baiDang) {
            $i++;
            if ($i <= 2) { ?>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6">
                    <div class="single-blog-post style-2 mb-5">
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
                                <b><?php echo number_format($baiDang->GiaPhong); ?></b>
                                / tháng
                            </span><br>
                            <span class="post-author">Đăng bởi: <?php echo ($baiDang->HoTen); ?></span>
                        </div>
                    </div>
                </div>
            <?php } else { ?>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6">
                    <div class="single-blog-post d-flex style-4 mb-30">
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
                            <a href="../Controller/BaiDangController.php?single-post=<?php echo ($baiDang->MaBaiDang); ?>&phong-tro=<?php echo ($baiDang->MaPhong); ?>" class="post-title">
                                <?php echo ($baiDang->TieuDe); ?>
                            </a>
                            <span class="post-date">
                                <b><?php echo number_format($baiDang->GiaPhong); ?></b>
                                / tháng
                            </span> <br>
                            <span class="post-view-rate">
                                <?php echo ($baiDang->LuotXem); ?> lượt xem
                            </span>
                            <br>
                            <span class="post-author">Đăng bởi: <?php echo ($baiDang->HoTen); ?></span>
                        </div>
                    </div>
                </div>

        <?php }
        }
        ?>

    </div>
</div>