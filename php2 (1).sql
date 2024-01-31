-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 31, 2024 lúc 05:19 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(9) NOT NULL,
  `madh` varchar(50) NOT NULL,
  `iduser` int(6) NOT NULL,
  `nguoidat_ten` varchar(50) NOT NULL,
  `nguoidat_email` varchar(50) NOT NULL,
  `nguoidat_tel` varchar(20) NOT NULL,
  `nguoidat_diachi` varchar(100) NOT NULL,
  `nguoinhan_ten` varchar(50) DEFAULT NULL,
  `nguoinhan_diachi` varchar(100) DEFAULT NULL,
  `nguoinhan_tel` varchar(20) DEFAULT NULL,
  `total` int(9) NOT NULL,
  `ship` int(6) NOT NULL DEFAULT 0,
  `voucher` int(6) NOT NULL DEFAULT 0,
  `tongthanhtoan` int(9) NOT NULL,
  `pttt` tinyint(1) NOT NULL COMMENT '0: COD; 1: ck; 2: ví điện tử'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `madh`, `iduser`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tel`, `nguoidat_diachi`, `nguoinhan_ten`, `nguoinhan_diachi`, `nguoinhan_tel`, `total`, `ship`, `voucher`, `tongthanhtoan`, `pttt`) VALUES
(1, 'Zhope11-064753-08102023', 11, 'fsdfsd', 'fsdfdsfds', 'fsdfdsfds', 'fsdfdsfds', '', '', '', 1200, 0, 0, 1200, 1),
(2, 'Zhope12-064936-08102023', 12, 'fdgdgfd', 'gfdgfdg', 'fgdfgfđ', 'gfdgdfgfd', '', '', '', 400, 0, 0, 400, 1),
(3, 'Zhope13-065000-08102023', 13, 'fdgdgfd', 'gfdgfdg', 'fgdfgfđ', 'gfdgdfgfd', '', '', '', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(6) NOT NULL,
  `idpro` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(6) NOT NULL,
  `idbill` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `idpro`, `price`, `name`, `img`, `soluong`, `thanhtien`, `idbill`) VALUES
(1, 4, 400, 'Sản phẩm 4', 'sp4.webp', 1, 400, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `stt` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `home`, `stt`) VALUES
(1, 'Trà', 1, 1),
(2, 'Phụ kiện, Quà tặng', 0, 0),
(3, 'Cà phê', 1, 2),
(4, 'Cà phê Việt Nam', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `price` int(6) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `dacbiet` tinyint(1) NOT NULL DEFAULT 0,
  `view` int(9) NOT NULL DEFAULT 0,
  `bestseller` tinyint(1) NOT NULL DEFAULT 0,
  `iddm` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `price`, `hide`, `dacbiet`, `view`, `bestseller`, `iddm`) VALUES
(2, 'Sản phẩm 1', 'hinh1.webp', 200, 1, 1, 235, 1, 1),
(3, 'Sản phẩm 2', 'hinh2.webp', 300, 0, 1, 33, 0, 3),
(4, 'Sản phẩm 3', 'hinh3.webp', 4000, 0, 0, 44, 1, 3),
(5, 'Sản phẩm 4', 'hinh4.webp', 23000, 0, 1, 0, 0, 2),
(6, 'Sản phẩm 5', 'hinh5.webp', 50000, 0, 0, 0, 1, 2),
(7, 'Sản phẩm 16', 'hinh6.webp', 36000, 0, 0, 0, 0, 2),
(8, 'Sản phẩm 7', 'hinh1.webp', 45000, 0, 0, 0, 0, 2),
(9, 'Sản phẩm 8', 'hinh2.webp', 55000, 0, 0, 0, 0, 2),
(52, 'thong', 'hinh2.webp', 1, 0, 0, 0, 0, 1),
(53, 'thongrwww', 'hinh6.webp', 222, 0, 0, 0, 0, 1),
(54, 'thong2', 'hinh6.webp', 11, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_token_ex` datetime DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `ten`, `diachi`, `email`, `dienthoai`, `reset_token`, `reset_token_ex`, `role`) VALUES
(1, 'hotb', '123', 'hello ho', 'QTSC 9, CVPM QUang Trung', 'hotb2@fe.edu.vn', '012345678', NULL, NULL, 1),
(2, 'hotb', '123', NULL, NULL, 'hotb2@fe.edu.vn', NULL, NULL, NULL, 0),
(3, 'HO', '123', NULL, NULL, 'hotb@fpt.edu.vn', NULL, NULL, NULL, 0),
(4, 'tranbaho', '1234567', NULL, NULL, 'tranbaho@gmail.com', NULL, NULL, NULL, 0),
(5, 'guest667', '123456', 'dsfsdf', 'fsdfsdf', 'fsdfsdf', 'fsdfsdfds', NULL, NULL, 0),
(6, 'guest941', '123456', 'dsfsdf', 'fsdfsdf', 'fsdfsdf', 'fsdfsdfds', NULL, NULL, 0),
(7, 'guest759', '123456', 'tuong', '123 Q8', 'tuong@gmail.com', '0-989078089', NULL, NULL, 0),
(8, 'guest896', '123456', 'tran', 'quan 8', 'tranbaho@gmail.com', '98070987098', NULL, NULL, 0),
(9, 'guest661', '123456', 'tuongtuong', 'tuong @', 'tuopng@123', '5435 534534', NULL, NULL, 0),
(10, 'guest905', '123456', 'tuongtuong', 'tuong @', 'tuopng@123', '5435 534534', NULL, NULL, 0),
(11, 'guest736', '123456', 'fsdfsd', 'fsdfdsfds', 'fsdfdsfds', 'fsdfdsfds', NULL, NULL, 0),
(12, 'guest556', '123456', 'fdgdgfd', 'gfdgdfgfd', 'gfdgfdg', 'fgdfgfđ', NULL, NULL, 0),
(13, 'guest120', '123456', 'fdgdgfd', 'gfdgdfgfd', 'gfdgfdg', 'fgdfgfđ', NULL, NULL, 0),
(29, 'Nguyễn Hoàng Thông ', '$2y$10$2lFfjCjdnyx.Z4r6cY4EoOFez48V.n2FbvFePMg3.fH', NULL, NULL, 'ht01252004@gmail.com', NULL, NULL, NULL, 0),
(34, 'thongnh', '$2y$10$OTi224Fq2fKTNGPkMXG7fu13j/Lz3F21XyabdNUcr4e', NULL, NULL, 'sanxinhdep123@gmail.com', NULL, NULL, NULL, 0),
(35, 'ssssss', '123', NULL, NULL, 'vietnamtour0@gmail.com', NULL, 'b79347dc5816623c85a24d51b57950a9ae48f759de018752e1c46dc5ece13a5b', '2024-01-27 16:39:48', 0),
(36, 'sss', '$2y$10$sWvru.qdp2zRZIe8Nn1Nn.FPBwPAAUeWYUUZIRrlEbd', NULL, NULL, 'abc@gmail.com', NULL, 'ad3845248286b8e3c09c25cdf5eb9bbea0800eee18176d845d98ae0fb80ff275', '2024-01-27 16:48:42', 0),
(37, 'www', '$2y$10$UtvNuDRqyE21bhiExEUA5ulyuWrRAI5zkiNDv9BZmZu', NULL, NULL, 'tt@gmail.com', NULL, NULL, NULL, 0),
(38, 'thongne', '$2y$10$5PCSYz7UriPjSmlJWbq6NO0jrvuiQzR7JphpCvmEwO/', NULL, NULL, 'thongs2501@gmail.com', NULL, '8f3b720be55ad72b2517a8a14d57d3c09ad86af3783dc5c391d370143549958f', '2024-01-29 04:28:09', 0),
(39, 'sssssss', '$2y$10$fS7LQD9L/xwSl/bNbXaRyusFXsPpne3QC/d/SC2XZDA', NULL, NULL, 'tb2@fe.edu.vn', NULL, NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_bill` (`idbill`),
  ADD KEY `fk_cart_sp` (`idpro`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_dm` (`iddm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token` (`reset_token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_cart_sp` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
