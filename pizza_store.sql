-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 06, 2021 lúc 07:30 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pizza_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(1000) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `id_permission`, `firstName`, `lastName`, `userName`, `password`, `email`, `phone`) VALUES
(1, 2, 'Ha', 'To', 'NVBH51800822', 'chivi234', 'a@b.com', '0123456780'),
(2, 1, 'Quynh', 'Thanh', 'NVQL51800822', 'chivi234', 'a@b.com', '0123456781'),
(4, 3, 'Quy', 'Ho', 'NVB51800822', 'chivi234', 'a@b.com', '0123456780');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_permission`
--

CREATE TABLE `account_permission` (
  `id` int(11) NOT NULL,
  `permission` int(1) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account_permission`
--

INSERT INTO `account_permission` (`id`, `permission`, `role`) VALUES
(1, 1, 'Nhan vien quan ly'),
(2, 2, 'Nhan vien ban hang'),
(3, 3, 'Nhan vien bep');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cash_method`
--

CREATE TABLE `cash_method` (
  `id` int(11) NOT NULL,
  `id_trans_method` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `receive_money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `credit_card_method`
--

CREATE TABLE `credit_card_method` (
  `id` int(11) NOT NULL,
  `id_trans_method` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_credit_card` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `allow` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`fullname`, `phone`, `email`, `allow`) VALUES
('khách vãng lai', '0', '0', 0),
('Nguyễn Văn', '123456789', 'diecluchivi2701@gmail.com', 1),
('Nguyễn Thanh', '9090909', 'camphu480@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order`
--

CREATE TABLE `detail_order` (
  `id_order` int(11) NOT NULL,
  `id_product` varchar(12) NOT NULL,
  `quanlity` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goods_warehouse`
--

CREATE TABLE `goods_warehouse` (
  `id` int(11) NOT NULL,
  `goods_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `goods_warehouse`
--

INSERT INTO `goods_warehouse` (`id`, `goods_name`, `quantity`) VALUES
(1, 'tôm', 100000),
(2, 'cua', 100000),
(3, 'cá', 100000),
(4, 'mực', 100000),
(5, 'Coca Cola', 1000),
(6, 'Sting', 1000),
(9, 'thịt heo', 100000),
(10, 'nấm', 100000),
(11, 'trứng', 100000),
(12, 'phô mai', 100000),
(13, 'xúc xích', 100000),
(14, 'thịt bò', 100000),
(15, 'hành tây', 100000),
(16, 'bột', 10000000),
(17, 'Nước suối', 1000),
(18, '7 up', 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `total` int(11) NOT NULL,
  `notes` varchar(1000) NOT NULL,
  `time` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prepare_material`
--

CREATE TABLE `prepare_material` (
  `id` int(11) NOT NULL,
  `id_product` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `prepare_material`
--

INSERT INTO `prepare_material` (`id`, `id_product`, `name`, `quantity`) VALUES
(1, 'pizza1', 'tôm', 100),
(2, 'pizza1', 'cua', 100),
(3, 'pizza1', 'mực', 100),
(4, 'pizza2', 'cá', 100),
(5, 'pizza2', 'thịt heo', 100),
(6, 'pizza2', 'nấm', 100),
(7, 'pizza3', 'trứng', 100),
(8, 'pizza3', 'phô mai', 100),
(9, 'pizza4', 'xúc xích', 100),
(10, 'pizza5', 'thịt bò', 100),
(11, 'pizza5', 'hành tây', 100),
(12, 'pizza1', 'bột', 150),
(13, 'pizza2', 'bột', 150),
(14, 'pizza3', 'bột', 150),
(15, 'pizza4', 'bột', 150),
(16, 'pizza5', 'bột', 150);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(7) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image_url`) VALUES
('drink1', 'Coca Cola', '10000', 'Nước giải khát', 'public/imgs/coca.jpg'),
('drink2', 'Sting', '15000', 'Nước giải khát', 'public/imgs/sting.jpg'),
('drink3', 'Nước suối', '10000', 'Nước giải khát', 'public/imgs/nuoc_suoi.png'),
('drink4', '7 up', '17000', 'Nước giải khát', 'public/imgs/7up.jpg'),
('pizza1', 'Pizza hải sản', '45000', 'Pizza siêu ngon', 'public/imgs/pizza.jpg'),
('pizza2', 'Pizza thập cẩm', '50000', 'Pizza siêu ngon, siêu to', 'public/imgs/pizza.jpg'),
('pizza3', 'Pizza trứng phô mai', '45000', 'Pizza siêu ngon', 'public/imgs/pizza.jpg'),
('pizza4', 'Pizza xúc xích', '35000', 'Pizza bán chạy nhất', 'public/imgs/pizza.jpg'),
('pizza5', 'Pizza thịt bò', '75000', 'Pizza siêu ngon', 'public/imgs/pizza.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction_method`
--

CREATE TABLE `transaction_method` (
  `id` int(1) NOT NULL,
  `method` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `transaction_method`
--

INSERT INTO `transaction_method` (`id`, `method`) VALUES
(1, 'Tiền mặt'),
(2, 'Thẻ tín dụng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_permission` (`id_permission`);

--
-- Chỉ mục cho bảng `account_permission`
--
ALTER TABLE `account_permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cash_method`
--
ALTER TABLE `cash_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_trans_method` (`id_trans_method`);

--
-- Chỉ mục cho bảng `credit_card_method`
--
ALTER TABLE `credit_card_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_trans_method` (`id_trans_method`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`phone`),
  ADD UNIQUE KEY `u_email` (`email`);

--
-- Chỉ mục cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `goods_warehouse`
--
ALTER TABLE `goods_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prepare_material`
--
ALTER TABLE `prepare_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction_method`
--
ALTER TABLE `transaction_method`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `account_permission`
--
ALTER TABLE `account_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cash_method`
--
ALTER TABLE `cash_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `credit_card_method`
--
ALTER TABLE `credit_card_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `goods_warehouse`
--
ALTER TABLE `goods_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `prepare_material`
--
ALTER TABLE `prepare_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `transaction_method`
--
ALTER TABLE `transaction_method`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_permission`) REFERENCES `account_permission` (`id`);

--
-- Các ràng buộc cho bảng `cash_method`
--
ALTER TABLE `cash_method`
  ADD CONSTRAINT `cash_method_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `cash_method_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `cash_method_ibfk_4` FOREIGN KEY (`id_trans_method`) REFERENCES `transaction_method` (`id`);

--
-- Các ràng buộc cho bảng `credit_card_method`
--
ALTER TABLE `credit_card_method`
  ADD CONSTRAINT `credit_card_method_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `credit_card_method_ibfk_2` FOREIGN KEY (`id_trans_method`) REFERENCES `transaction_method` (`id`);

--
-- Các ràng buộc cho bảng `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`phone`) REFERENCES `customer` (`phone`);

--
-- Các ràng buộc cho bảng `prepare_material`
--
ALTER TABLE `prepare_material`
  ADD CONSTRAINT `prepare_material_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
