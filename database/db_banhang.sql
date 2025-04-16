-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2025 lúc 04:06 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'chua_duyet',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', 'chua_duyet', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', 'chua_duyet', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', 'chua_duyet', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 11, '2017-03-21', 420000, 'COD', 'không chú', 'chua_duyet', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(15, 15, '2017-03-24', 220000, 'COD', 'e', 'chua_duyet', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(16, 16, '2025-03-28', 320000, 'COD', 'cục cứt', 'chua_duyet', '2025-03-28 07:59:21', '2025-03-28 07:59:21'),
(17, 17, '2025-03-28', 120000, 'COD', 'sdfghj', 'chua_duyet', '2025-03-28 09:26:52', '2025-03-28 09:26:52'),
(18, 18, '2025-04-05', 120000, 'COD', 'cẩn thận giúp tôi', 'chua_duyet', '2025-04-04 18:46:09', '2025-04-04 18:46:09'),
(19, 19, '2025-04-05', 350000, 'COD', 'hhhh', 'chua_duyet', '2025-04-04 18:54:50', '2025-04-04 18:54:50'),
(20, 20, '2025-04-05', 120000, 'COD', 'zzzzzzzzzzz', 'chua_duyet', '2025-04-04 18:58:21', '2025-04-04 18:58:21'),
(21, 21, '2025-04-05', 120000, 'COD', 'zzzzzzzzzzz', 'chua_duyet', '2025-04-04 19:00:26', '2025-04-04 19:00:26'),
(22, 22, '2025-04-05', 120000, 'COD', 'cvvvvvvvvvvv', 'chua_duyet', '2025-04-04 19:03:22', '2025-04-04 19:03:22'),
(23, 23, '2025-04-11', 120000, 'COD', 'qq', 'chua_duyet', '2025-04-11 05:08:35', '2025-04-11 05:08:35'),
(24, 24, '2025-04-11', 120000, 'COD', 'aaaa', 'chua_duyet', '2025-04-11 05:29:10', '2025-04-11 05:29:10'),
(25, 25, '2025-04-11', 460000, 'COD', 'aaa', 'chua_duyet', '2025-04-11 08:42:43', '2025-04-11 08:42:43'),
(26, 26, '2025-04-11', 460000, 'COD', 'aaa', 'chua_duyet', '2025-04-11 08:45:31', '2025-04-11 08:45:31'),
(27, 27, '2025-04-11', 1200000, 'COD', 'aa', 'chua_duyet', '2025-04-11 08:46:47', '2025-04-11 08:46:47'),
(28, 29, '2025-04-11', 120000, 'COD', 'aa', 'chua_duyet', '2025-04-11 08:59:02', '2025-04-11 08:59:02'),
(29, 30, '2025-04-11', 120000, 'COD', 'zz', 'chua_duyet', '2025-04-11 08:59:49', '2025-04-11 08:59:49'),
(30, 31, '2025-04-11', 520000, 'COD', 'aa', 'chua_duyet', '2025-04-11 09:03:30', '2025-04-11 09:03:30'),
(31, 38, '2025-04-11', 280000, 'COD', 'aa', 'chua_duyet', '2025-04-11 09:14:53', '2025-04-11 09:14:53'),
(32, 39, '2025-04-11', 300000, 'COD', 'qq', 'chua_duyet', '2025-04-11 09:22:50', '2025-04-11 09:22:50'),
(33, 40, '2025-04-11', 280000, 'COD', 'aa', 'chua_duyet', '2025-04-11 09:28:57', '2025-04-11 09:28:57'),
(34, 41, '2025-04-11', 280000, 'COD', 'aaa', 'chua_duyet', '2025-04-11 09:30:46', '2025-04-11 09:30:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `order_id`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(19, 16, 2, 2, 80000, '2025-03-28 07:59:21', '2025-03-28 07:59:21'),
(20, 17, 1, 1, 120000, '2025-03-28 09:26:52', '2025-03-28 09:26:52'),
(21, 18, 1, 1, 120000, '2025-04-04 18:46:09', '2025-04-04 18:46:09'),
(22, 19, 8, 1, 350000, '2025-04-04 18:54:50', '2025-04-04 18:54:50'),
(23, 20, 1, 1, 120000, '2025-04-04 18:58:21', '2025-04-04 18:58:21'),
(24, 21, 1, 1, 120000, '2025-04-04 19:00:26', '2025-04-04 19:00:26'),
(25, 22, 1, 1, 120000, '2025-04-04 19:03:22', '2025-04-04 19:03:22'),
(26, 23, 1, 1, 120000, '2025-04-11 05:08:35', '2025-04-11 05:08:35'),
(27, 24, 1, 1, 120000, '2025-04-11 05:29:10', '2025-04-11 05:29:10'),
(28, 26, 1, 1, 120000, '2025-04-11 15:45:31', '2025-04-11 15:45:31'),
(29, 26, 2, 1, 160000, '2025-04-11 15:45:31', '2025-04-11 15:45:31'),
(30, 26, 23, 1, 180000, '2025-04-11 15:45:31', '2025-04-11 15:45:31'),
(31, 27, 1, 10, 12000, '2025-04-11 15:46:47', '2025-04-11 15:46:47'),
(32, 28, 1, 1, 120000, '2025-04-11 15:59:02', '2025-04-11 15:59:02'),
(33, 29, 1, 1, 120000, '2025-04-11 15:59:49', '2025-04-11 15:59:49'),
(34, 30, 1, 1, 120000, '2025-04-11 16:03:30', '2025-04-11 16:03:30'),
(35, 30, 5, 1, 280000, '2025-04-11 16:03:30', '2025-04-11 16:03:30'),
(36, 30, 12, 1, 120000, '2025-04-11 16:03:30', '2025-04-11 16:03:30'),
(37, 31, 5, 1, 280000, '2025-04-11 16:14:53', '2025-04-11 16:14:53'),
(38, 32, 10, 1, 300000, '2025-04-11 16:22:50', '2025-04-11 16:22:50'),
(39, 33, 13, 1, 280000, '2025-04-11 16:28:57', '2025-04-11 16:28:57'),
(40, 34, 5, 1, 280000, '2025-04-11 16:30:46', '2025-04-11 16:30:46'),
(41, 7, 18, 1, 160000, '2025-04-11 17:32:46', '2025-04-11 17:32:46'),
(42, 8, 9, 1, 250000, '2025-04-11 17:33:25', '2025-04-11 17:33:25'),
(43, 8, 5, 1, 280000, '2025-04-11 17:33:25', '2025-04-11 17:33:25'),
(44, 9, 22, 1, 380000, '2025-04-11 17:45:29', '2025-04-11 17:45:29'),
(45, 10, 34, 1, 350000, '2025-04-11 17:49:34', '2025-04-11 17:49:34'),
(46, 11, 13, 1, 280000, '2025-04-11 17:53:04', '2025-04-11 17:53:04'),
(47, 12, 15, 1, 320000, '2025-04-11 17:55:03', '2025-04-11 17:55:03'),
(48, 13, 17, 1, 120000, '2025-04-11 17:57:47', '2025-04-11 17:57:47'),
(49, 14, 1, 1, 120000, '2025-04-11 17:59:00', '2025-04-11 17:59:00'),
(50, 15, 1, 1, 120000, '2025-04-13 07:12:33', '2025-04-13 07:12:33'),
(51, 16, 1, 1, 120000, '2025-04-13 07:27:06', '2025-04-13 07:27:06'),
(52, 17, 14, 1, 150000, '2025-04-13 07:37:38', '2025-04-13 07:37:38'),
(53, 18, 1, 1, 120000, '2025-04-13 08:22:13', '2025-04-13 08:22:13'),
(54, 19, 1, 1, 120000, '2025-04-13 13:54:25', '2025-04-13 13:54:25'),
(55, 20, 1, 1, 120000, '2025-04-13 14:08:11', '2025-04-13 14:08:11'),
(56, 21, 1, 1, 120000, '2025-04-13 14:27:50', '2025-04-13 14:27:50'),
(57, 22, 2, 1, 160000, '2025-04-13 14:31:24', '2025-04-13 14:31:24'),
(58, 23, 22, 1, 380000, '2025-04-13 15:02:26', '2025-04-13 15:02:26'),
(59, 24, 10, 1, 300000, '2025-04-13 15:06:25', '2025-04-13 15:06:25'),
(60, 25, 1, 1, 120000, '2025-04-14 10:12:05', '2025-04-14 10:12:05'),
(61, 26, 1, 1, 120000, '2025-04-15 13:33:56', '2025-04-15 13:33:56'),
(62, 27, 1, 1, 120000, '2025-04-15 13:48:57', '2025-04-15 13:48:57'),
(63, 28, 1, 1, 120000, '2025-04-15 14:01:53', '2025-04-15 14:01:53'),
(64, 29, 2, 1, 160000, '2025-04-15 14:07:42', '2025-04-15 14:07:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(30) NOT NULL,
  `model` varchar(100) NOT NULL,
  `produced_on` date NOT NULL,
  `mf_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `message`, `created_at`, `updated_at`, `status`) VALUES
(1, 'hhangg1709@gmail.com', 'xin chào, bánh của tôi bị lỗi, sửa nó giúp tôi.', '2025-04-15 08:36:06', '2025-04-15 08:36:06', 0),
(2, 'hhangg1709@gmail.com', 'bánh dở', '2025-04-15 08:36:18', '2025-04-15 08:36:18', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(16, 'hùng chó điên', 'nam', 'hungchodien@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '9889786756756', 'cục cứt', '2025-03-28 07:59:21', '2025-03-28 07:59:21'),
(17, 'BƠ XANH', 'nữ', 'hang@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'sdfghj', '2025-03-28 09:26:52', '2025-03-28 09:26:52'),
(18, 'Hang', 'nam', 'hang@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'cẩn thận giúp tôi', '2025-04-04 18:46:09', '2025-04-04 18:46:09'),
(19, 'Hang', 'nam', 'hang@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'hhhh', '2025-04-04 18:54:50', '2025-04-04 18:54:50'),
(20, 'Hang', 'nam', 'hang@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'zzzzzzzzzzz', '2025-04-04 18:58:21', '2025-04-04 18:58:21'),
(21, 'Hang', 'nam', 'hang@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'zzzzzzzzzzz', '2025-04-04 19:00:26', '2025-04-04 19:00:26'),
(22, 'Hang', 'nam', 'hang@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'cvvvvvvvvvvv', '2025-04-04 19:03:22', '2025-04-04 19:03:22'),
(23, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'qq', '2025-04-11 05:08:35', '2025-04-11 05:08:35'),
(24, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'aaaa', '2025-04-11 05:29:10', '2025-04-11 05:29:10'),
(25, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'aaa', '2025-04-11 08:42:42', '2025-04-11 08:42:42'),
(26, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'aaa', '2025-04-11 08:45:31', '2025-04-11 08:45:31'),
(27, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'aa', '2025-04-11 08:46:47', '2025-04-11 08:46:47'),
(28, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 08:55:31', '2025-04-11 08:55:31'),
(29, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 08:59:02', '2025-04-11 08:59:02'),
(30, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'zz', '2025-04-11 08:59:49', '2025-04-11 08:59:49'),
(31, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:03:30', '2025-04-11 09:03:30'),
(32, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:05:56', '2025-04-11 09:05:56'),
(33, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:05:59', '2025-04-11 09:05:59'),
(34, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:06:00', '2025-04-11 09:06:00'),
(35, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:07:23', '2025-04-11 09:07:23'),
(36, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:09:09', '2025-04-11 09:09:09'),
(37, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:11:43', '2025-04-11 09:11:43'),
(38, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:14:53', '2025-04-11 09:14:53'),
(39, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'qq', '2025-04-11 09:22:50', '2025-04-11 09:22:50'),
(40, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:28:57', '2025-04-11 09:28:57'),
(41, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aaa', '2025-04-11 09:30:46', '2025-04-11 09:30:46'),
(42, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:39:20', '2025-04-11 09:39:20'),
(43, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:39:27', '2025-04-11 09:39:27'),
(44, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:39:34', '2025-04-11 09:39:34'),
(45, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:42:46', '2025-04-11 09:42:46'),
(46, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:52:09', '2025-04-11 09:52:09'),
(47, 'Hang', 'nam', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', '2025-04-11 09:52:14', '2025-04-11 09:52:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mfs`
--

CREATE TABLE `mfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_26_022556_create_mfs_table', 1),
(5, '2025_02_27_022532_create_cars_table', 1),
(6, '2025_03_05_012049_update_cars_table', 1),
(7, '2025_03_28_062343_create_slides_table', 2),
(8, '2025_03_28_063114_add_top_to_products_table', 3),
(9, '2025_04_08_010518_add_role_to_users_table', 4),
(10, '2025_04_04_131755_create_categories_table', 5),
(11, '2025_04_10_130037_create_orders_table', 5),
(12, '2025_04_11_090318_add_iduser_foreign_to_orders_table', 6),
(13, '2025_04_11_160629_add_status_to_bills_table', 7),
(14, '2025_04_11_162633_create_orders_table', 8),
(15, '2025_04_11_164838_rename_id_bill_to_order_id_in_bill_details_table', 9),
(16, '2025_04_11_175159_update_ship_default_in_orders_table', 10),
(17, '2025_04_11_175629_update_default_ship_in_orders_table', 11),
(18, '2025_04_14_124829_create_slide_table', 12),
(19, '2025_04_14_152717_create_slides_table', 13),
(20, '2025_04_15_143602_create_contacts_table', 14),
(21, '2025_04_15_153251_add_email_to_contacts_table', 15),
(22, '2025_04_15_153531_add_message_to_contacts_table', 16),
(23, '2025_04_15_162356_add_status_to_contacts_table', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `payment` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `ship` int(11) NOT NULL DEFAULT 20000,
  `status` varchar(255) NOT NULL DEFAULT 'chưa duyệt',
  `IDuser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `username`, `email`, `address`, `phone`, `note`, `payment`, `total`, `ship`, `status`, `IDuser`, `created_at`, `updated_at`) VALUES
(1, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 160000, 0, 'Đã giao', 9, NULL, NULL),
(2, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 160000, 0, 'Duyệt', 9, NULL, NULL),
(3, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 160000, 0, 'Duyệt', 9, NULL, NULL),
(4, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 160000, 0, 'Duyệt', 9, NULL, NULL),
(5, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 160000, 0, 'dang-giao', 9, NULL, NULL),
(6, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 160000, 0, 'Duyệt', 9, NULL, NULL),
(7, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 160000, 0, 'Duyệt', 9, NULL, NULL),
(8, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'xin chào', 'ATM', 530000, 0, 'Duyệt', 9, NULL, NULL),
(9, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'sss', 'COD', 380000, 0, 'Đang giao', 9, NULL, NULL),
(10, 'kim', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'nào', 'COD', 350000, 0, 'Duyệt', 9, NULL, NULL),
(11, 'hùng', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'mimi', 'ATM', 280000, 0, 'Hủy', 9, NULL, NULL),
(12, 'BƠ XANH', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'dddddddddddd', 'COD', 320000, 0, 'Đã giao', 9, NULL, NULL),
(13, 'chichi', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '23456789', 'aaaa', 'COD', 120000, 0, 'Đang giao', 9, NULL, NULL),
(14, 'XOÀI', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'mm', 'COD', 120000, 20000, 'Đã giao', 9, NULL, NULL),
(15, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aaaaaaaa', 'ATM', 120000, 20000, 'Duyệt', 9, NULL, NULL),
(16, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aaaaaaaa', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(17, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aaaaaaaaaaaaa', 'COD', 150000, 20000, 'chưa duyệt', 9, NULL, NULL),
(18, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aaaaaaaaaaa', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(19, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aaaa', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(20, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aaaaaa', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(21, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'aa', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(22, 'BƠ XANH', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'sss', 'COD', 160000, 20000, 'chưa duyệt', 9, NULL, NULL),
(23, 'TÁO MỸ', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'ss', 'COD', 380000, 20000, 'chưa duyệt', 9, NULL, NULL),
(24, 'TÁO MỸ', 'hang@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'tt', 'COD', 300000, 20000, 'Hủy', 9, NULL, NULL),
(25, 'Nguyen Thi Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'cẩn thận giúp tôi', 'ATM', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(26, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'zzzzzzzzzz', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(27, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'mmm', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(28, 'BƠ XANH', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'nn', 'COD', 120000, 20000, 'chưa duyệt', 9, NULL, NULL),
(29, 'Hang', 'hhangg1709@gmail.com', 'hòa sơn, hòa vang, đà nẵng', '0919564317', 'â', 'COD', 160000, 20000, 'chưa duyệt', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `top` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `top`, `created_at`, `updated_at`) VALUES
(1, 'BÁNH MIX 6 VỊ', 3, 'Bánh trái cây thơm ngon', 150000, 120000, 'banh6vi.png', 'hộp', 1, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'FRUIT CAKE 2', 1, 'Thành phần chính:\r\n\r\n- Gato\r\n\r\n- Kem tươi vị rượu rum\r\n\r\n- Hoa quả\r\n\r\n- Dừa khô.\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng hoa quả với dừa khô kết xung quanh.\r\n\r\n', 180000, 160000, 'gkt3.png', 'hộp', 1, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'BÁNH KEM DÂU TÂY', 4, 'NGON!', 150000, 120000, 'banhkem2.jpg', 'hộp', 0, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'RED VELVET CHOCO CAKE', 4, 'Thành phần chính:\r\n\r\n- Gato,\r\n\r\n- Kem tươi tiramisu vị coffee,\r\n\r\n- Socola,\r\n\r\n- Dâu tây.\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi tiramisu vị coffee. Bên trên trang trí bằng hoa quả, socola đen, phủ bột Red xung quanh bánh', 160000, 0, 'banhkem3.png', 'hộp', 0, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'BÁNH KEM 8.3', 4, ' đầy yêu thương', 280000, 0, 'b5.png', 'cái', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(6, 'BÁNH KEM BƠ SỮA ĐÀ LẠT', 5, 'Thành phần chính:\r\n\r\n- Gato,\r\n\r\n- Kem bơ vị coffee.\r\n\r\nBánh làm từ 3 lớp gato xen giữa 3 lớp kem. Phủ bên ngoài là 1 lớp kem bơ vị coffee với 1 lớp hạt dẻ xanh phía dưới. ', 200000, 180000, 'a2.png', 'hộp', 0, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'BÁNH KEM SI CU LA DÂU TƯƠI', 4, 'Thành phần chính:\r\n\r\n- Gato\r\n\r\n- Kem tươi vị rượu rum\r\n\r\n- Hoa quả\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp Kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng dâu tây tươi và chocolate đen xung quanh.', 160000, 0, 'b1.png', 'hộp', 1, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'BÁNH KEM 1/2 SOCOLA', 4, 'SIU NGON!!', 380000, 350000, 'b2.png', 'cái', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(9, 'BÁNH KEM BƠ', 4, 'Thành phần chính:\r\n\r\n- Gato,\r\n\r\n- Kem bơ vị coffee.\r\n\r\nBánh làm từ 3 lớp gato xen giữa 3 lớp kem. Phủ bên ngoài là 1 lớp kem bơ vị coffee với 1 lớp hạt dẻ xanh phía dưới. ', 280000, 250000, 'b3.png', 'cái', 1, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(10, 'PETIT 1\r\n', 5, '', 320000, 300000, 'a1.png', 'cái', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(11, 'PETIT 2', 5, '', 320000, 300000, 'a2.png', 'cái', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(12, 'PEPTIT 3', 5, '', 120000, 0, 'a3.png', 'cái', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(13, 'RED VELVET CHOCO CAKE', 4, 'Thành phần chính:\r\n\r\n- Gato,\r\n\r\n- Kem tươi tiramisu vị coffee,\r\n\r\n- Socola,\r\n\r\n- Dâu tây.\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi tiramisu vị coffee. Bên trên trang trí bằng hoa quả, socola đen, phủ bột Red xung quanh bánh', 300000, 280000, 'banhkem3.png', 'cái', 1, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'PETIT 4', 7, '', 150000, 0, 'a4.png', 'hộp', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(15, 'FRUIT CAKE', 1, 'Thành phần chính:\r\n\r\n- Gato\r\n\r\n- Kem tươi vị rượu rum\r\n\r\n- Hoa quả\r\n\r\n- Dừa khô.\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng hoa quả với dừa khô kết xung quanh.\r\n\r\n*Ghi chú: Bánh trang trí hoa quả có thể không giống mẫu 100% do hoa quả thay đổi theo mùa. Qúy Khách vui lòng liên hệ bộ phận hỗ trợ để được tư vấn chi tiết về sản phẩm. Anh Hòa Bakery xin cảm ơn!', 350000, 320000, 'gkt1.png', 'cái', 1, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'PETIT 5', 7, '', 150000, 0, 'a5.png', 'hộp', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(17, 'BÁNH VUÔNG', 6, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 150000, 120000, 'c1.png', 'cái', 1, 0, NULL, NULL),
(18, 'BÁNH KEM VUÔNG DÂU TÂY', 3, 'Thành phần chính:\r\n\r\n- Gato\r\n\r\n- Kem tươi vị rượu rum\r\n\r\n- Hoa quả\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp Kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng dâu tây tươi và chocolate đen xung quanh.', 160000, 0, 'c2.png', 'hộp', 1, 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(19, 'PETIT MATCHA', 5, '', 150000, 0, 'k2.png', 'hộp', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'BÁNH KEM MIX 4 LOẠI TRÁI CÂY', 3, 'Thành phần chính:\r\n\r\n- Gato\r\n\r\n- Kem tươi vị rượu rum\r\n\r\n- Hoa quả\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp Kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng hoa quả tươi theo mùa và chocolate đen xung quanh.\r\n\r\n \r\n\r\n*Ghi chú: Bánh trang trí hoa quả có thể không giống mẫu 100% do hoa quả thay đổi theo mùa. Qúy Khách vui lòng liên hệ bộ phận hỗ trợ để được tư vấn chi tiết về sản phẩm. Anh Hòa Bakery xin cảm ơn!', 150000, 0, 'banhkem1.png', 'hộp', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'BLUE BERRY MOUSSE', 7, '(*) KÍCH THƯỚC BÁNH: 21CM\r\n\r\nThành phần chính:\r\n\r\n- Blueberry\r\n\r\n- Kem cheese\r\n\r\n- Kem tươi.\r\n\r\nBánh làm từ kem tươi nhiều trứng và kem cheese với phần trên kem blueberry. Xung quanh được trang trí bằng 1 lớp gato mềm vị việt quất.\r\n\r\n \r\n\r\n(Ghi chú: Màu sắc trên ảnh có thể đậm/ nhạt hơn so với thực tế do hiệu ứng ánh sáng khi chụp, góc chụp và hiệu ứng hiển thị. Hoa quả trang trí trên bánh có thể thay đổi không giống y hệt mẫu vì hoa quả thay đổi theo mùa. Vui lòng liên hệ bộ phận hỗ trợ để được tư vấn chi tiết về sản phẩm. Anh Hòa xin cảm ơn!)', 160000, 150000, 'gm1.png', 'hộp', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'BÁNH KEM VANI DÂU TƯƠI ĐÀ LẠT', 1, 'Thành phần:\r\n- Gato\r\n- Kem tươi mặn vị coffee\r\nBánh làm từ 3 lớp gato trắng, kết hợp 3  lớp kem,  phủ bên ngoài 1 lớp kem tươi trắng.', 380000, 0, 'z4.png', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'BÁNH FRENCH TRỨNG NƯỚNG\r\n', 2, 'Thành phần:\r\n- Gato\r\n- Kem tươi mặn vị coffee\r\nBánh làm từ 3 lớp gato trắng, kết hợp 3  lớp kem,  phủ bên ngoài 1 lớp kem tươi trắng.', 180000, 0, 'z5.png', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'BÁNH AUSTRALIA\r\n', 7, 'Thành phần:\r\n- Gato\r\n- Kem tươi mặn vị coffee\r\nBánh làm từ 3 lớp gato trắng, kết hợp 3  lớp kem,  phủ bên ngoài 1 lớp kem tươi trắng.', 800000, 0, 'z6.png', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'BÁNH TRÀ BÁ TƯỚC CHANH', 6, '- Gato\r\n- Kem tươi\r\n- Trà xanh\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp kem tươi vị trà xanh và bột trà xanh rắc phía trên.', 200000, 0, 'z7.png', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'SHEESEKCAKE CAFE DỪA', 2, '- Gato\r\n- Kem tươi\r\n- Trà xanh\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp kem tươi vị trà xanh và bột trà xanh rắc phía trên.', 200000, 0, 'z8.png', 'hộp', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'BÁNH NƯỚNG DÂU TƯƠI', 2, 'Thành phần: Trứng, đường, bột mỳ, cream cheese, wipping cream, jalamtine. Bánh được làm từ 3 lớp bánh red velvet xe lẫn 3 lớp kem tươi pho mai. Bên ngoài phủ 1 lớp Jame đỏ vị Anh Đào, rắc bột socola trên bề mặt và trang trí Socola', 200000, 0, 'z1.png', 'cái', 0, 1, '2025-04-09 06:26:43', '2025-04-09 06:26:43'),
(28, 'WHITE CHOCOLATE AND COCONUT CAKE', 2, 'THÀNH PHẦN CHÍNH: \r\n- GATO \r\n- KEM BƠ VỊ RƯỢU RUM \r\n- SOCOLA BÀO TRẮNG , DỪA SẤY KHÔ  \r\nBÁNH ĐƯỢC LÀM TỪ 3 LỚP GATO TRẮNG XEN KẼ 3 LỚP KEM BƠ, VỊ RƯỢU RUM , PHỦ BÊN NGOÀI LÀ MỘT LỚP CHOCOLATE BÀO TRẮNG NGUYÊN CHẤT, DỪA SẤY KHÔ VÀ TRANG TRÍ HOA QUẢ.', 120000, 0, 'gkb1.png', 'hộp', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'BÁNH KEM TRÁI CÂY SẤY', 3, '- Gato\r\n- Kem tươi\r\n- Trà xanh\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp kem tươi vị trà xanh và bột trà xanh rắc phía trên.', 250000, 0, 'z14.png', 'hộp', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'BÁNH KEM FLOWER FRUIT\r\n', 4, 'Thành phần:\r\n- Gato\r\n- Kem tươi mặn vị coffee\r\nBánh làm từ 3 lớp gato trắng, kết hợp 3  lớp kem,  phủ bên ngoài 1 lớp kem tươi trắng.', 350000, 330000, 'z2.png', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'BÁNH KEM BƠ', 7, '- Gato\r\n- Kem tươi\r\n- Trà xanh\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp kem tươi vị trà xanh và bột trà xanh rắc phía trên.', 380000, 350000, 'z11.png', 'cái', 1, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'CHEESEKCAKE VIỆT QUỐC', 4, '- Gato\r\n- Kem tươi\r\n- Trà xanh\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp kem tươi vị trà xanh và bột trà xanh rắc phía trên.', 380000, 350000, 'z9.png', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'LEMON EARL GREY CAKE', 4, '- Gato\r\n- Kem tươi\r\n- Trà xanh\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp kem tươi vị trà xanh và bột trà xanh rắc phía trên.', 320000, 300000, 'z13.png', 'cái', 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'BÁNH KEM VIỆT QUỐC\r\n', 2, 'Thành phần:\r\n- Gato\r\n- Kem tươi mặn vị coffee\r\nBánh làm từ 3 lớp gato trắng, kết hợp 3  lớp kem,  phủ bên ngoài 1 lớp kem tươi trắng.', 350000, 0, 'z3.png', 'cái', 0, 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3K6AWDmqxP49zAQUMNr7N3YcAwEV2lGRAozDRsSo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDM2S0pndjNYZW9JVUJ0cFByZUN4TTYzQnY2aFROM2xjU1hmTncxcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90cmFuZ2NodSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744740639),
('uuXeg6QlyFHiJRW6YYhMADmu5Qj9RRrDCUGn79Y0', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicFF5UEJtNlZRbExGbDIxdWVxRDlvUXFWU1ljRmdXSm9UbUZES2c2TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMTt9', 1744768939);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(29, 'https://anhhoabakery.vn/', 'banner1.png', '2025-04-15 01:34:58', '2025-04-15 01:34:58'),
(30, 'https://anhhoabakery.vn/', 'banner2.jpg', '2025-04-15 01:35:52', '2025-04-15 01:35:52'),
(31, 'https://anhhoabakery.vn/', 'banner3.png', '2025-04-15 01:36:01', '2025-04-15 01:36:01'),
(33, 'https://anhhoabakery.vn/', 'banner4_1.png', '2025-04-15 18:19:30', '2025-04-15 18:19:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Gateaux Kem Tươi', 'Gateaux Kem Tươi là một loại bánh ngọt mềm mịn, được làm từ cốt bánh bông lan kết hợp với lớp kem tươi béo ngậy. Cốt bánh thường được chế biến từ bột mì, trứng, đường, bơ hoặc dầu ăn, giúp tạo độ mềm xốp và thơm ngon. Lớp kem phủ bên ngoài chủ yếu làm từ whipping cream hoặc heavy cream, đánh bông cùng với đường và hương vani để tạo vị ngọt dịu và mịn mượt. Ngoài ra, bánh còn có thể được trang trí với trái cây tươi, socola, hạnh nhân lát hoặc mứt để tăng thêm hương vị và độ hấp dẫn. Đây là món bánh lý tưởng cho các bữa tiệc sinh nhật, kỷ niệm hay những dịp đặc biệt.', 'muc1.png', '2025-03-01 07:20:58', '2025-03-28 07:20:58'),
(2, 'Gateaux Kem Bơ', 'Gateaux Kem Bơ là một loại bánh ngọt với cốt bánh bông lan mềm mịn kết hợp cùng lớp kem bơ béo ngậy, mịn màng. Cốt bánh thường được làm từ bột mì, trứng, đường, bơ hoặc dầu ăn, giúp bánh có độ xốp và hương vị thơm ngon. Điểm đặc trưng của bánh là lớp kem bơ được làm từ bơ lạt, đường và sữa hoặc lòng trắng trứng đánh bông, tạo nên kết cấu mịn mượt và vị béo ngọt đặc trưng. Bánh thường được trang trí với các hoa văn tinh tế, màu sắc đẹp mắt nhờ phẩm màu thực phẩm hoặc trái cây tươi. Với hương vị đậm đà và hình thức sang trọng, Gateaux Kem Bơ là lựa chọn hoàn hảo cho các bữa tiệc, đám cưới và những dịp đặc biệt.', 'muc2.png', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'banh6vi.png', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'banhkem1.png', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh Petit', 'Bánh Petit (Petit Four) là những chiếc bánh nhỏ nhắn, tinh tế, thường được dùng trong tiệc trà hoặc làm món tráng miệng. Chúng có nguồn gốc từ Pháp và được chia thành nhiều loại khác nhau, phổ biến nhất là **bánh nướng (dry petit four), bánh mềm (fresh petit four)** và **bánh phủ sô-cô-la hoặc đường (glacé petit four)**.  \r\n\r\nThành phần của bánh tùy thuộc vào loại bánh cụ thể, nhưng thường bao gồm **bột mì, trứng, bơ, đường, sữa** và có thể thêm **kem, sô-cô-la, mứt, trái cây hoặc hạnh nhân** để tạo hương vị đặc biệt. Petit Four không chỉ hấp dẫn bởi hương vị mà còn bởi vẻ ngoài nhỏ gọn, tinh tế, thường được trang trí đẹp mắt, phù hợp với các bữa tiệc sang trọng hoặc làm quà tặng.', 'k1.png', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Bánh Mousse', 'Bánh Mousse là một loại bánh ngọt mềm mịn, có kết cấu nhẹ và tan chảy trong miệng nhờ lớp mousse mịn mượt. Loại bánh này thường không cần nướng, mà được làm bằng cách kết hợp kem tươi đánh bông (whipping cream), gelatin hoặc bột rau câu để tạo độ đông, cùng với các nguyên liệu tạo hương vị như sô-cô-la, trái cây, trà xanh hoặc cà phê.  \r\n\r\nPhần đế bánh Mousse có thể làm từ cốt bánh bông lan mềm hoặc đế biscuit giòn, giúp cân bằng kết cấu và hương vị. Bánh thường được trang trí với lớp gương bóng, bột cacao, trái cây tươi hoặc sô-cô-la để tăng thêm sự hấp dẫn. Với vị ngọt nhẹ, béo mịn và cảm giác tan chảy trong miệng, bánh Mousse là lựa chọn hoàn hảo cho những ai yêu thích sự tinh tế và mềm mại trong từng miếng bánh.', 'muc3.png', '2016-10-25 17:19:00', '2025-03-29 07:30:49'),
(7, 'Gateaux Mousse', 'Gateaux Mousse là sự kết hợp hoàn hảo giữa cốt bánh bông lan mềm mịn và lớp mousse mượt mà, tạo nên kết cấu nhẹ nhàng, tan ngay trong miệng. Phần mousse được làm từ kem tươi đánh bông (whipping cream), gelatin hoặc bột rau câu để tạo độ đông, kết hợp với các nguyên liệu tạo hương vị như sô-cô-la, trái cây, trà xanh hoặc cà phê.  \r\n\r\nBánh thường có nhiều lớp, với phần đế là cốt bánh bông lan hoặc biscuit giòn, giúp cân bằng hương vị và kết cấu. Gateaux Mousse thường được phủ một lớp gương bóng (mirror glaze) hoặc trang trí bằng trái cây tươi, bột cacao hay sô-cô-la để tăng thêm sự hấp dẫn. Nhờ vào vị ngọt thanh, béo mịn và vẻ ngoài sang trọng, loại bánh này rất được ưa chuộng trong các bữa tiệc và những dịp đặc biệt.', 'gm.png', '2016-10-25 17:19:00', '2025-03-21 07:36:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` int(2) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Nguyen Thi Hang', 'hhangg1709@gmail.com', '$2y$12$g1J4banADYblPdvAkGclXOF2BRWYtna0OZAUeRum5UAs.SrImyViC', '0919564317', 'hòa sơn, hòa vang, đà nẵng', 3, NULL, '2025-04-02 20:30:44', '2025-04-02 20:30:44'),
(11, 'admin', 'admin123@gmail.com', '$2y$12$rV28zkysg8DcTxUS4fEXquOGJV1wWfb6OQ28s39wLzhg6akACJFTe', '0919564317', 'hòa sơn, hòa vang, đà nẵng', 1, NULL, '2025-04-08 19:27:05', '2025-04-08 19:27:05'),
(12, 'Bé Lu', 'lu@gmail.com', '$2y$12$1912KvbzGluo8Yj/POxNeuUwo9RiQsgIFpPvOneVJyAEdILqkYwDu', '0919564311', 'hòa ninh', 3, NULL, '2025-04-13 19:52:52', '2025-04-13 19:52:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_mf_id_foreign` (`mf_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mfs`
--
ALTER TABLE `mfs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mfs`
--
ALTER TABLE `mfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_mf_id_foreign` FOREIGN KEY (`mf_id`) REFERENCES `mfs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
