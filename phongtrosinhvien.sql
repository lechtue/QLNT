-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2022 lúc 07:14 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phongtrosinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `MaBaiDang` int(11) NOT NULL,
  `TieuDe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ThoiGianDang` date NOT NULL,
  `MoTa` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `LuotXem` int(11) NOT NULL DEFAULT 0,
  `TrangThai` tinyint(4) NOT NULL,
  `TenTaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachmoitruong`
--

CREATE TABLE `danhsachmoitruong` (
  `MaMoiTruong` int(11) NOT NULL,
  `MaPhong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachtiennghi`
--

CREATE TABLE `danhsachtiennghi` (
  `MaTienNghi` int(11) NOT NULL,
  `MaPhong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `MaHinhAnh` int(11) NOT NULL,
  `DuongDan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MaBaiDang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuvuc`
--

CREATE TABLE `khuvuc` (
  `MaKhuVuc` int(11) NOT NULL,
  `TenKhuVuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaQuanHuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuvuc`
--

INSERT INTO `khuvuc` (`MaKhuVuc`, `TenKhuVuc`, `MaQuanHuyen`) VALUES
(1, 'Phường 1', 1),
(3, 'Phường 2', 1),
(4, 'Phường 3', 1),
(5, 'Phường 4', 1),
(6, 'Phường 5', 1),
(7, 'Phường 6', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `MaLoaiPhong` int(11) NOT NULL,
  `TenLoaiPhong` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`MaLoaiPhong`, `TenLoaiPhong`) VALUES
(1, 'Căn hộ'),
(3, 'Cư xá'),
(4, 'Ký túc xá'),
(2, 'Phòng trọ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  `TenLoaiTaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(3, 'Admin'),
(1, 'Chủ trọ'),
(2, 'Người tìm trọ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `moitruong`
--

CREATE TABLE `moitruong` (
  `MaMoiTruong` int(11) NOT NULL,
  `TenMoiTruong` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `moitruong`
--

INSERT INTO `moitruong` (`MaMoiTruong`, `TenMoiTruong`) VALUES
(8, 'Bến xe Bus'),
(4, 'Bệnh viện'),
(1, 'Chợ'),
(5, 'Công viên'),
(7, 'Khu giải trí'),
(2, 'Siêu thị'),
(6, 'Sông hồ'),
(9, 'Trung tâm thể dục thể thao'),
(3, 'Trường học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongtro`
--

CREATE TABLE `phongtro` (
  `MaPhong` int(11) NOT NULL,
  `SoLuongPhong` int(11) NOT NULL,
  `SoPhongTrong` int(11) NOT NULL,
  `SoNguoiToiDa` int(11) NOT NULL,
  `GiaPhong` bigint(20) NOT NULL,
  `DienTich` double NOT NULL,
  `ChoTuQuan` tinyint(1) NOT NULL,
  `MaLoaiPhong` int(11) NOT NULL,
  `MaKhuVuc` int(11) NOT NULL,
  `MaBaiDang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `MaQuanHuyen` int(11) NOT NULL,
  `TenQuanHuyen` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`MaQuanHuyen`, `TenQuanHuyen`) VALUES
(2, 'Bảo Lộc'),
(3, 'Di Linh'),
(1, 'Đà Lạt'),
(5, 'Đức Trọng'),
(4, 'Lâm Hà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TenTaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL,
  `MaLoaiTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtintaikhoan`
--

CREATE TABLE `thongtintaikhoan` (
  `TenTaiKhoan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SoDienThoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiennghi`
--

CREATE TABLE `tiennghi` (
  `MaTienNghi` int(11) NOT NULL,
  `TenTienNghi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiennghi`
--

INSERT INTO `tiennghi` (`MaTienNghi`, `TenTienNghi`) VALUES
(9, 'Bãi đỗ xe riêng'),
(7, 'Ban công/sân thượng'),
(8, 'Camera an ninh'),
(3, 'Điều hòa'),
(5, 'Gác lửng'),
(4, 'Giường nệm'),
(6, 'Kệ bếp'),
(10, 'Sân vườn'),
(2, 'Vệ sinh trong'),
(1, 'Wifi');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `viewbaidang`
-- (See below for the actual view)
--
CREATE TABLE `viewbaidang` (
`HoTen` varchar(50)
,`TieuDe` varchar(50)
,`ThoiGianDang` date
,`GiaPhong` bigint(20)
,`MaPhong` int(11)
,`MaBaiDang` int(11)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `viewbaidang`
--
DROP TABLE IF EXISTS `viewbaidang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewbaidang`  AS SELECT `thongtintaikhoan`.`HoTen` AS `HoTen`, `baidang`.`TieuDe` AS `TieuDe`, `baidang`.`ThoiGianDang` AS `ThoiGianDang`, `phongtro`.`GiaPhong` AS `GiaPhong`, `phongtro`.`MaPhong` AS `MaPhong`, `baidang`.`MaBaiDang` AS `MaBaiDang` FROM (((`phongtro` join `baidang` on(`phongtro`.`MaBaiDang` = `baidang`.`MaBaiDang`)) join `taikhoan` on(`baidang`.`TenTaiKhoan` = `taikhoan`.`TenTaiKhoan`)) join `thongtintaikhoan` on(`taikhoan`.`TenTaiKhoan` = `thongtintaikhoan`.`TenTaiKhoan`)) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`MaBaiDang`),
  ADD KEY `FOREIGN` (`TenTaiKhoan`);

--
-- Chỉ mục cho bảng `danhsachmoitruong`
--
ALTER TABLE `danhsachmoitruong`
  ADD KEY `FOREIGN` (`MaMoiTruong`,`MaPhong`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Chỉ mục cho bảng `danhsachtiennghi`
--
ALTER TABLE `danhsachtiennghi`
  ADD KEY `FOREIGN` (`MaTienNghi`,`MaPhong`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`MaHinhAnh`),
  ADD KEY `FOREIGN` (`MaBaiDang`);

--
-- Chỉ mục cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD PRIMARY KEY (`MaKhuVuc`),
  ADD KEY `MaQuanHuyen` (`MaQuanHuyen`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`MaLoaiPhong`),
  ADD UNIQUE KEY `TenLoaiPhong` (`TenLoaiPhong`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoaiTaiKhoan`),
  ADD UNIQUE KEY `TenLoaiTaiKhoan` (`TenLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `moitruong`
--
ALTER TABLE `moitruong`
  ADD PRIMARY KEY (`MaMoiTruong`),
  ADD UNIQUE KEY `TenMoiTruong` (`TenMoiTruong`);

--
-- Chỉ mục cho bảng `phongtro`
--
ALTER TABLE `phongtro`
  ADD PRIMARY KEY (`MaPhong`),
  ADD KEY `FOREIGN` (`MaLoaiPhong`,`MaKhuVuc`,`MaBaiDang`),
  ADD KEY `MaKhuVuc` (`MaKhuVuc`),
  ADD KEY `MaBaiDang` (`MaBaiDang`) USING BTREE,
  ADD KEY `MaBaiDang_2` (`MaBaiDang`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`MaQuanHuyen`),
  ADD UNIQUE KEY `TenQuanHuyen` (`TenQuanHuyen`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenTaiKhoan`),
  ADD KEY `FOREIGN` (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `thongtintaikhoan`
--
ALTER TABLE `thongtintaikhoan`
  ADD PRIMARY KEY (`TenTaiKhoan`),
  ADD KEY `FOREIGN` (`TenTaiKhoan`);

--
-- Chỉ mục cho bảng `tiennghi`
--
ALTER TABLE `tiennghi`
  ADD PRIMARY KEY (`MaTienNghi`),
  ADD UNIQUE KEY `TenTienNghi` (`TenTienNghi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baidang`
--
ALTER TABLE `baidang`
  MODIFY `MaBaiDang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `MaHinhAnh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  MODIFY `MaKhuVuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `MaLoaiPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `moitruong`
--
ALTER TABLE `moitruong`
  MODIFY `MaMoiTruong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `phongtro`
--
ALTER TABLE `phongtro`
  MODIFY `MaPhong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `MaQuanHuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tiennghi`
--
ALTER TABLE `tiennghi`
  MODIFY `MaTienNghi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD CONSTRAINT `BaiDang_ibfk_1` FOREIGN KEY (`TenTaiKhoan`) REFERENCES `taikhoan` (`TenTaiKhoan`);

--
-- Các ràng buộc cho bảng `danhsachmoitruong`
--
ALTER TABLE `danhsachmoitruong`
  ADD CONSTRAINT `DanhSachMoiTruong_ibfk_1` FOREIGN KEY (`MaMoiTruong`) REFERENCES `moitruong` (`MaMoiTruong`),
  ADD CONSTRAINT `DanhSachMoiTruong_ibfk_2` FOREIGN KEY (`MaPhong`) REFERENCES `phongtro` (`MaPhong`);

--
-- Các ràng buộc cho bảng `danhsachtiennghi`
--
ALTER TABLE `danhsachtiennghi`
  ADD CONSTRAINT `DanhSachTienNghi_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phongtro` (`MaPhong`),
  ADD CONSTRAINT `DanhSachTienNghi_ibfk_2` FOREIGN KEY (`MaTienNghi`) REFERENCES `tiennghi` (`MaTienNghi`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `HinhAnh_ibfk_1` FOREIGN KEY (`MaBaiDang`) REFERENCES `baidang` (`MaBaiDang`);

--
-- Các ràng buộc cho bảng `khuvuc`
--
ALTER TABLE `khuvuc`
  ADD CONSTRAINT `khuvuc_ibfk_1` FOREIGN KEY (`MaQuanHuyen`) REFERENCES `quanhuyen` (`MaQuanHuyen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phongtro`
--
ALTER TABLE `phongtro`
  ADD CONSTRAINT `PhongTro_ibfk_2` FOREIGN KEY (`MaKhuVuc`) REFERENCES `khuvuc` (`MaKhuVuc`),
  ADD CONSTRAINT `PhongTro_ibfk_3` FOREIGN KEY (`MaLoaiPhong`) REFERENCES `loaiphong` (`MaLoaiPhong`),
  ADD CONSTRAINT `PhongTro_ibfk_5` FOREIGN KEY (`MaBaiDang`) REFERENCES `baidang` (`MaBaiDang`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `TaiKhoan_ibfk_1` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`);

--
-- Các ràng buộc cho bảng `thongtintaikhoan`
--
ALTER TABLE `thongtintaikhoan`
  ADD CONSTRAINT `ThongTinTaiKhoan_ibfk_1` FOREIGN KEY (`TenTaiKhoan`) REFERENCES `taikhoan` (`TenTaiKhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
