-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2022 lúc 01:30 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mobile_shop_prj1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_type`
--

CREATE TABLE `category_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category_type`
--

INSERT INTO `category_type` (`type_id`, `type`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'OPPO'),
(4, 'Vivo'),
(5, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `person_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `person_phonenb` varchar(12) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `person_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`person_name`, `person_phonenb`, `person_address`, `order_id`) VALUES
('Dũng Đức', '0391234567', 'Đống Đa', 1),
('Nguyễn Đức Dũng', '0123456789', 'Lào Cai', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`product_name`, `amount`, `order_id`, `price`) VALUES
('Iphone 13 pro max', 2, 1, 65980000),
('Samsung Galaxy Z Fold2 5G', 1, 1, 30000000),
('Samsung Galaxy S21 Ultra 5G', 1, 2, 25990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `img` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `promotions` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `type_id`, `img`, `status`, `price`, `promotions`, `name`) VALUES
(1, 1, 'product-1.jpg', 1, 32990000, 'Giảm đến 1,500,000đ khi tham gia thu cũ đổi mới (Không áp dụng kèm giảm giá qua VNPay, Moca)', 'Iphone 13 pro max'),
(2, 1, 'product-2.jpg', 0, 32990000, '', 'Iphone 11'),
(3, 1, 'product-3.jpg', 1, 30590000, 'Giảm 50% giá gói cước 1 năm (Vina350/Vina500) cho Sim VinaPhone trả sau (Trị giá đến 3 triệu) ', 'Iphone 12 pro max'),
(4, 2, 'product-4.jpg', 1, 25990000, 'Ưu đãi Voucher trị giá đến 6,000,000đ', 'Samsung Galaxy S21 Ultra 5G'),
(5, 2, 'product-5.jpg', 0, 30000000, 'Giảm thêm 5% khi mua cùng sản phẩm bất kỳ có giá cao hơn', 'Samsung Galaxy Z Fold2 5G'),
(6, 2, 'product-6.jpg', 1, 41990000, 'Giảm giá 4,000,000đ cho khách hàng đang sở hữu Galaxy Note, S, A chính hãng (Áp dụng tùy model, không áp dụng kèm Thu cũ Đổi mới và khuyến mãi Giảm giá khác)', 'Samsung Galaxy Z Fold3 5G'),
(7, 3, 'product-7.jpg', 1, 12990000, 'Sạc dự phòng giảm 40% khi mua kèm điện thoại (không áp dụng SDP hãng)', 'OPPO Reno6 5G'),
(8, 4, 'product-8.jpg', 1, 8190000, 'Tặng suất mua xe đạp Giảm đến 20% (không kèm KM khác) ', 'Vivo V23e'),
(9, 5, 'product-9.jpg', 0, 13990000, 'Giảm thêm 5% khi mua cùng sản phẩm bất kỳ có giá cao hơn', 'Xiaomi 11T Pro 5G 8GB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin', 'admin'),
(2, 'dzung', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_type`
--
ALTER TABLE `category_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
