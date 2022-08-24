<?php
require_once '../Dao/KhuVucDao.php';
require_once '../Dao/LoaiPhongDao.php';

$tienNghiDao = new TienNghiDao();
$listTienNghi = $tienNghiDao->getTienNghi();

$khuVucDao = new KhuVucDao();
$listKhuVuc = $khuVucDao->getKhuVuc();

$moiTruongDao = new MoiTruongDao();
$listMoiTruong = $moiTruongDao->getMoiTruong();

$loaiPhongDao = new LoaiPhongDao();
$listLoaiPhong = $loaiPhongDao->getLoaiPhong();
?>
<div id="bg-search">
    <div id="menu-search">
        <form id="form-search" method="post" action="../Webcontent/search-page.php">
            <input type="hidden" name="command" value="search">
            <div id="accordion" class="w-100">
                <div class="card w-100 shadow">

                    <!-- Tìm kiếm -->
                    <div class="card-header">
                        <div class="w-100">
                            <div class="row">
                                <div class="col-md-10 col-sm-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Từ khóa..." name="tuKhoa">
                                        <div class="input-group-append">
                                            <input class="btn btn-outline-primary" type="submit" value="Tìm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4 d-flex align-items-center mt-1">
                                    <div class="">
                                        <a href="#collapse1" data-toggle="collapse" style="font-weight: normal; font-size: 11px;">
                                            Tìm nâng cao &nabla;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tìm nâng cao -->
                    <div id="collapse1" class="collapse" data-parent="#accordion">
                        <div class="card-body">

                            <!-- Loại phòng -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="loaiPhong">Loại phòng</label>
                                        <select name="loaiPhong" class="form-control">
                                            <option value="-1" selected>
                                                Chọn loại phòng...
                                            </option>
                                            <?php foreach ($listLoaiPhong as $loaiPhong) /* @var $loaiPhong LoaiPhong */ { ?>
                                                <option value="<?php echo ($loaiPhong->MaLoaiPhong); ?>">
                                                    <?php echo ($loaiPhong->TenLoaiPhong); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tự quản -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="choTuQuan">Tự quản</label>
                                        <select name="choTuQuan" class="form-control">
                                            <option value="-1" selected>
                                                Cho tự quản không ?
                                            </option>
                                            <option value="1">Có</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <!-- Khu vực -->
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="khuVuc">Khu vực</label>
                                        <select name="khuVuc" class="form-control">
                                            <option value="-1" selected>
                                                Chọn khu vực...
                                            </option>
                                            <?php foreach ($listKhuVuc as $khuVuc) /* @var $khuVuc KhuVuc */ { ?>
                                                <option value="<?php echo ($khuVuc->MaKhuVuc); ?>">
                                                    <?php echo "$khuVuc->TenKhuVuc - $khuVuc->TenQuanHuyen"; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tien nghi -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tienNghi">Tiện nghi</label>
                                        <div class="card card-body">
                                            <div class="row">
                                                <?php
                                                $listTienNghiCount = count($listTienNghi);
                                                for ($i_TienNghi = 0; $i_TienNghi < $listTienNghiCount;) {
                                                ?>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <?php if ($i_TienNghi < $listTienNghiCount) { ?>
                                                            <label class="my-container">
                                                                <input type="checkbox" value="<?php echo ($listTienNghi[$i_TienNghi]->MaTienNghi); ?>" name="<?php echo ($listTienNghi[$i_TienNghi]->TenTienNghi); ?>">
                                                                <span class="my-checkmark"></span><?php
                                                                                                    echo ($listTienNghi[$i_TienNghi]->TenTienNghi);
                                                                                                    $i_TienNghi++;
                                                                                                    ?>

                                                            </label>
                                                        <?php } else break; ?>

                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Môi trương xung quanh -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="moiTruong">Môi trường xung quanh</label>
                                        <div class="card card-body">
                                            <div class="row">
                                                <?php
                                                $listMoiTruongCount = count($listMoiTruong);
                                                for ($i_MoiTruong = 0; $i_MoiTruong < $listMoiTruongCount;) {
                                                ?>
                                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                                        <?php if ($i_MoiTruong < $listMoiTruongCount) { ?>
                                                            <label class="my-container">
                                                                <input type="checkbox" value="<?php echo ($listMoiTruong[$i_MoiTruong]->MaMoiTruong); ?>" name="<?php echo ($listMoiTruong[$i_MoiTruong]->TenMoiTruong); ?>">
                                                                <span class="my-checkmark"></span><?php
                                                                                                    echo ($listMoiTruong[$i_MoiTruong]->TenMoiTruong);
                                                                                                    $i_MoiTruong++;
                                                                                                    ?>

                                                            </label>
                                                        <?php } else break; ?>

                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Đóng -->
                            <div class="row">
                                <div class="col-10">
                                    <input class="btn btn-outline-primary float-right" type="submit" value="Tìm">
                                </div>
                                <div class="col-2">
                                    <a class="btn btn-outline-secondary float-right" data-toggle="collapse" href="#collapse1" style="font-weight: normal">
                                        Đóng &#x21E7;
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>