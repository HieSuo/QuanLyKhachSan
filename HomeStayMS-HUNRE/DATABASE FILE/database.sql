-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2023 lúc 10:41 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `homestayms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_online`
--

CREATE TABLE `booking_online` (
  `id` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `orderId` varchar(20) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cccd` varchar(20) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `sotien` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `trangthai` varchar(20) NOT NULL,
  `id_tk_online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_online`
--

INSERT INTO `booking_online` (`id`, `id_phong`, `orderId`, `id_khachhang`, `hoten`, `email`, `cccd`, `sdt`, `diachi`, `checkin`, `checkout`, `sotien`, `ngaytao`, `trangthai`, `id_tk_online`) VALUES
(18, 1, '1701597911', 49, 'Than Manh Hieu', 'thanhieureal2509@gmail.com', '001203045314', '0975881903', 'Ngõ 46 Xuân Phương-Phương Canh-Nam Từ Liêm-Hà Nội', '2023-12-04 12:00:00', '2023-12-06 12:00:00', 26000, '2023-12-03 17:05:52', 'Dat thanh cong', 2),
(19, 1, '1701940765', 50, 'Than Manh Hieu', 'thanhieureal2509@gmail.com', '001203045314', '0975881903', 'Ngõ 46 Xuân Phương-Phương Canh-Nam Từ Liêm-Hà Nội', '2023-12-08 12:00:00', '2023-12-09 12:00:00', 13000, '2023-12-07 16:20:44', 'Da checkin', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id_dichvu` int(11) NOT NULL,
  `tendichvu` varchar(40) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `giaban` int(11) NOT NULL,
  `mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id_dichvu`, `tendichvu`, `gianhap`, `giaban`, `mota`) VALUES
(1, 'Nướng BBQ', 100, 2000, 'Nướng bbq tuyệt vời, sang trọng vô cùng'),
(3, 'Massage', 50, 500, 'chăm sóc cơ thể tuyệt vờii'),
(5, 'Buffet Sáng', 500, 1000, 'Buffet bữa sáng ngon vô cùng '),
(7, 'Test Moi', 100, 2000, 'Mô tả dịch vụ test moi, test moi dịch vụ mô tả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(11) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `cccd` varchar(15) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `hoten`, `cccd`, `sdt`, `trangthai`, `diachi`, `email`) VALUES
(42, 'Cẩm Hoàng Long', '001203045314', '0975881903', 0, 'Số 1 ngõ 3 Inferno', NULL),
(43, 'Than Manh Hieu', '001203045314', '0975881903', 0, 'Thạch Thất Hà Nội', NULL),
(44, 'Than Manh Hieu', '001203045314', '0975881903', 0, 'Số 1 ngõ 3 Inferno', NULL),
(45, 'Cẩm Hoàng Long', '001203045314', '0975881903', 0, 'Thạch Thất Hà Nội', NULL),
(46, 'Cẩm Hoàng Long', '001203045314', '0975881903', 0, 'A902', NULL),
(47, 'Than Manh Hieu', '001203045314', '0975881903', 0, 'Số 1 ngõ 3 Inferno', NULL),
(48, 'Lê văn a', '001203045314', '0975881903', 0, 'Thạch Thất Hà Nội', NULL),
(49, 'Than Manh Hieu', '001203045314', '0975881903', 0, 'Ngõ 46 Xuân Phương-Phương Canh-Nam Từ Liêm-Hà Nội', NULL),
(50, 'Than Manh Hieu', '001203045314', '0975881903', 0, 'Ngõ 46 Xuân Phương-Phương Canh-Nam Từ Liêm-Hà Nội', NULL),
(51, 'Nguyễn Anh Long', '09998881902', '0070007770', 0, 'Tuyên Quang', NULL),
(52, 'Cẩm Hoàng Long', '001203045314', '0975881903', 0, 'Số 1 ngõ 3 Inferno', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `id_loaiphong` int(11) NOT NULL,
  `loaiphong` varchar(30) NOT NULL,
  `giaphong` int(11) NOT NULL,
  `songuoi` int(11) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`id_loaiphong`, `loaiphong`, `giaphong`, `songuoi`, `mota`) VALUES
(1, 'Phòng Đôi', 20000, 2, 'Số giường 1 <br>\nLoại giường: đôi<br>\nTiện nghi: wifi, nóng lạnh, điều hòa'),
(2, 'Phòng Đơn', 13000, 1, 'Số giường 1 <br>\nLoại giường: đơn <br>\nTiện nghi: wifi, nóng lạnh, điều hòa '),
(3, 'Phòng gia đình', 30000, 4, 'Số giường 2 <br>\nLoại giường: đôi <br>\nTiện nghi: wifi, nóng lạnh, điều hòa '),
(4, 'Phòng Vua', 100000, 1, 'Số giường: 1 <br>\nLoại giường: Bigsize <br>\nTiện nghi: wifi, nóng lạnh, điều hòa'),
(6, 'Phòng Luxury', 50000, 4, 'Số giường 1 <br>\nLoại giường: đôi <br>\nTiện nghi: wifi, nóng lạnh, điều hòa, đèn bar'),
(16, 'Phòng lớn', 19000, 2, 'Số giường 1 <br>\nLoại giường: đôi <br>\nTiện nghi: wifi, nóng lạnh, điều hòa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` int(11) NOT NULL,
  `taikhoan` varchar(20) NOT NULL,
  `matkhau` varchar(20) NOT NULL,
  `hoten` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `taikhoan`, `matkhau`, `hoten`, `email`, `sdt`, `role`) VALUES
(1, 'admin', '1', 'Than Manh Hieu', 'thanhieu@gmail.com', '0975881903', 1),
(2, 'hieuabc', '1', 'Nguyen van a', 'ngvana@gmail.com', '09755881905', 2),
(3, 'hieutest', '123', 'Hieu khong lap trinh', 'thanhieureal2509@gmail.com', '0975881903', 2),
(4, 'hieubbb', '1', 'Hieu', 'thanhieureal25@gmail.com', '0975881903', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudichvu`
--

CREATE TABLE `phieudichvu` (
  `id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `id_dichvu` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudichvu`
--

INSERT INTO `phieudichvu` (`id`, `id_khachhang`, `id_dichvu`, `soluong`) VALUES
(16, 44, 1, 2),
(19, 42, 1, 1),
(20, 45, 3, 1),
(21, 51, 1, 1),
(22, 52, 3, 1),
(24, 51, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieukhachhang`
--

CREATE TABLE `phieukhachhang` (
  `id_pkh` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `tinhtrang` varchar(20) NOT NULL,
  `ghichu` text DEFAULT NULL,
  `dathanhtoan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieukhachhang`
--

INSERT INTO `phieukhachhang` (`id_pkh`, `id_kh`, `id_nguoidung`, `ngaytao`, `tinhtrang`, `ghichu`, `dathanhtoan`) VALUES
(25, 42, 1, '2023-11-27 03:03:36', '0', '', NULL),
(26, 43, 1, '2023-11-27 03:08:06', '0', '', NULL),
(27, 44, 1, '2023-11-27 12:44:58', '0', '', NULL),
(28, 45, 1, '2023-11-27 13:22:38', '0', '', NULL),
(29, 46, 1, '2023-12-03 16:50:34', '0', '', NULL),
(30, 47, 1, '2023-12-03 16:56:17', '0', '', NULL),
(31, 48, 1, '2023-12-03 16:56:45', '0', '', NULL),
(32, 51, 1, '2023-12-08 00:56:31', '1', '', NULL),
(33, 50, 1, '2023-12-08 13:33:19', '0', 'from online', 13000),
(34, 52, 1, '2023-12-15 15:46:32', '1', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuthu`
--

CREATE TABLE `phieuthu` (
  `id_phieuthu` int(11) NOT NULL,
  `id_nguoidung` int(11) NOT NULL,
  `sotien` int(11) NOT NULL,
  `ghichu` text DEFAULT NULL,
  `ngaytao` datetime NOT NULL,
  `ngay` date DEFAULT NULL,
  `id_pkh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuthu`
--

INSERT INTO `phieuthu` (`id_phieuthu`, `id_nguoidung`, `sotien`, `ghichu`, `ngaytao`, `ngay`, `id_pkh`) VALUES
(38, 1, 20000, 'Thanh toán hóa đơn Cẩm Hoàng Long Tổng số tiền: 20000', '2023-11-27 03:03:40', '2023-11-27', 25),
(39, 1, 60000, 'Thanh toán hóa đơn Than Manh Hieu Tổng số tiền: 60000', '2023-11-25 03:08:09', '2023-11-25', 26),
(40, 1, 60400, 'Thanh toán hóa đơn Than Manh Hieu Tổng số tiền: 60400', '2023-11-27 12:46:02', '2023-11-27', 27),
(67, 1, 20000, 'Thanh toán hóa đơn Cẩm Hoàng Long Tổng số tiền: 20000', '2023-12-07 15:14:51', '2023-12-07', 25),
(68, 1, 60000, 'Thanh toán hóa đơn Than Manh Hieu Tổng số tiền: 60000', '2023-12-07 15:23:58', '2023-12-07', 30),
(69, 1, 60000, 'Thanh toán hóa đơn Than Manh Hieu Tổng số tiền: 60000', '2023-12-05 15:24:03', '2023-12-05', 30),
(70, 1, 60000, 'Thanh toán hóa đơn Than Manh Hieu Tổng số tiền: 60000', '2023-12-04 15:24:50', '2023-12-04', 30),
(71, 1, 60000, 'Thanh toán hóa đơn Cẩm Hoàng Long Tổng số tiền: 60000', '2023-12-07 15:24:54', '2023-12-07', 29),
(72, 1, 20200, 'Thanh toán hóa đơn Cẩm Hoàng Long Tổng số tiền: 20200', '2023-12-08 00:38:30', '2023-12-08', 25),
(73, 1, 60400, 'Thanh toán hóa đơn Than Manh Hieu Tổng số tiền: 60400', '2023-12-08 00:42:17', '2023-12-08', 27),
(74, 1, 60000, 'Thanh toán hóa đơn Than Manh Hieu Tổng số tiền: 60000', '2023-12-08 00:57:47', '2023-12-08', 26),
(75, 1, 13500, 'Thanh toán hóa đơn Cẩm Hoàng Long Tổng số tiền: 13500', '2023-12-08 13:34:15', '2023-12-08', 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuthuephong`
--

CREATE TABLE `phieuthuephong` (
  `id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuthuephong`
--

INSERT INTO `phieuthuephong` (`id`, `id_khachhang`, `id_phong`, `checkin`, `checkout`) VALUES
(36, 42, 2, '2023-11-27 12:00:00', '2023-11-28 12:00:00'),
(37, 43, 7, '2023-11-29 12:00:00', '2023-12-01 12:00:00'),
(38, 44, 5, '2023-11-27 12:00:00', '2023-11-30 12:00:00'),
(39, 45, 1, '2023-11-28 13:22:00', '2023-11-29 13:22:00'),
(40, 46, 2, '2023-12-03 12:00:00', '2023-12-06 12:00:00'),
(41, 47, 2, '2023-12-04 12:00:00', '2023-12-07 12:00:00'),
(42, 48, 1, '2023-12-11 12:00:00', '2023-12-14 12:00:00'),
(43, 49, 1, '2023-12-04 12:00:00', '2023-12-06 12:00:00'),
(44, 50, 1, '2023-12-08 12:00:00', '2023-12-09 12:00:00'),
(45, 51, 7, '2023-12-07 12:00:00', '2023-12-12 12:00:00'),
(46, 52, 5, '2023-12-15 12:00:00', '2023-12-18 12:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id_phong` int(11) NOT NULL,
  `id_loaiphong` int(11) NOT NULL,
  `anh` varchar(50) DEFAULT NULL,
  `sophong` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id_phong`, `id_loaiphong`, `anh`, `sophong`) VALUES
(1, 2, '658155b77a7bf.png', 'A204'),
(2, 1, '6555b03757f51.jpg', 'A102'),
(3, 2, '6550eefdb9c83.jpg', 'B103'),
(4, 16, '654fba4c2b3a6.jpg', 'B101'),
(5, 1, '654fbb3c92a7c.jpg', 'B102'),
(6, 4, '6555b05428d4d.jpg', 'V101'),
(7, 3, '6554b68b70074.jpg', 'C202'),
(8, 6, '6554b6ae1bd84.jpg', 'D101'),
(9, 1, '6554bcefc7647.jpg', 'A104'),
(10, 3, '655a3e51a874e.png', 'G101');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinhethong`
--

CREATE TABLE `thongtinhethong` (
  `id` int(11) NOT NULL,
  `tencongty` varchar(30) NOT NULL,
  `mota` text NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinhethong`
--

INSERT INTO `thongtinhethong` (`id`, `tencongty`, `mota`, `sdt`, `email`) VALUES
(1, 'HUNRE RESORT', 'Luxury homestay tọa lạc tại khu vục trung tâm thủ đô Hà Nội, Quầy tiếp tân 24 giờ luôn sẵn sàng phục vụ quý khách từ thủ thức nhận phòng đến trả phòng', '0975881903', 'thanhieureal2509@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_kh_online`
--

CREATE TABLE `tk_kh_online` (
  `id_tk_online` int(11) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `sdt` varchar(12) DEFAULT NULL,
  `cccd` varchar(15) DEFAULT NULL,
  `hoten` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tk_kh_online`
--

INSERT INTO `tk_kh_online` (`id_tk_online`, `matkhau`, `email`, `diachi`, `sdt`, `cccd`, `hoten`) VALUES
(2, 'thanhieureal2509@gmail.com', 'thanhieureal2509@gmail.com', 'Ngõ 46 Xuân Phương-Phương Canh-Nam Từ Liêm-Hà Nội', '0975881903', '001203045314', 'Than Manh Hieu'),
(3, 'Manhhieu', 'tmh49000@gmail.com', 'Thạch Thất Hà Nội', '0975881903', '001102036262', 'Cam Hoang Hieu'),
(8, 'Manhhieu', 'tmh48000@gmail.com', NULL, NULL, NULL, NULL),
(9, 'Manhhieu', 'viettelhoalac26@gmail.com', 'Thạch Thất Hà Nội', '0912775221', '001100112200', 'Nguyễn Hòa Lạc');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking_online`
--
ALTER TABLE `booking_online`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id_dichvu`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`id_loaiphong`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Chỉ mục cho bảng `phieudichvu`
--
ALTER TABLE `phieudichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dichvu` (`id_dichvu`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `phieukhachhang`
--
ALTER TABLE `phieukhachhang`
  ADD PRIMARY KEY (`id_pkh`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD PRIMARY KEY (`id_phieuthu`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `phieuthuephong`
--
ALTER TABLE `phieuthuephong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_phong` (`id_phong`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id_phong`),
  ADD KEY `id_loaiphong` (`id_loaiphong`);

--
-- Chỉ mục cho bảng `thongtinhethong`
--
ALTER TABLE `thongtinhethong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tk_kh_online`
--
ALTER TABLE `tk_kh_online`
  ADD PRIMARY KEY (`id_tk_online`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking_online`
--
ALTER TABLE `booking_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id_dichvu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  MODIFY `id_loaiphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieudichvu`
--
ALTER TABLE `phieudichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `phieukhachhang`
--
ALTER TABLE `phieukhachhang`
  MODIFY `id_pkh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `phieuthu`
--
ALTER TABLE `phieuthu`
  MODIFY `id_phieuthu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `phieuthuephong`
--
ALTER TABLE `phieuthuephong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thongtinhethong`
--
ALTER TABLE `thongtinhethong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tk_kh_online`
--
ALTER TABLE `tk_kh_online`
  MODIFY `id_tk_online` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phieudichvu`
--
ALTER TABLE `phieudichvu`
  ADD CONSTRAINT `phieudichvu_ibfk_1` FOREIGN KEY (`id_dichvu`) REFERENCES `dichvu` (`id_dichvu`),
  ADD CONSTRAINT `phieudichvu_ibfk_2` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`);

--
-- Các ràng buộc cho bảng `phieukhachhang`
--
ALTER TABLE `phieukhachhang`
  ADD CONSTRAINT `phieukhachhang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khachhang` (`id_khachhang`),
  ADD CONSTRAINT `phieukhachhang_ibfk_2` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD CONSTRAINT `phieuthu_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `phieuthuephong`
--
ALTER TABLE `phieuthuephong`
  ADD CONSTRAINT `phieuthuephong_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`),
  ADD CONSTRAINT `phieuthuephong_ibfk_2` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id_phong`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`id_loaiphong`) REFERENCES `loaiphong` (`id_loaiphong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
