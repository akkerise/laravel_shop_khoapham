-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 03:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `name`, `alias`, `order`, `parent_id`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quần', 'Quần', 100000, 1, 'quan-xuat-khau', 'Quần Áo Xuất Khẩu Bền Đẹp Giá Rẻ', NULL, '2016-11-26 22:06:19'),
(2, 'Áo', 'Áo', 200000, 1, 'ao-xuat-khau', 'Áo Xuất Khẩu Bền Đẹp Giá Rẻ', NULL, '2016-11-26 22:06:57'),
(3, 'Nước Hoa', 'Nước Hoa', 300000, 1, 'nuoc-hoa', 'Nước Hoa Xuất Khẩu', NULL, '2016-11-26 22:59:59'),
(4, 'Tất', 'Tất', 20000, 1, 'tat-xuat-khau', 'Tất Xuất Khẩu Bền Đẹp Giá Rẻ', NULL, '2016-11-26 23:00:45'),
(5, 'Giầy', 'Giầy', 10000, 1, 'giay-xuat-khau', 'Giầy Xuất Khẩu ', '2016-11-26 22:05:45', '2016-11-26 22:05:45'),
(6, 'Dép', 'Dép', 10000, 1, 'dep-xuat-khau', 'Dép Xuất Khẩu', '2016-11-26 22:59:14', '2016-11-26 22:59:14'),
(7, 'Đồ Điện Tử', 'Đồ Điện Tử', 100000, 1, 'do-dien-tu', 'Đồ Điện Tử', '2016-11-26 23:01:16', '2016-11-26 23:01:16'),
(8, 'Quạt', 'Quạt', 1000000, 1, 'quat', 'Quạt xuất khẩu', '2016-11-26 23:02:06', '2016-11-26 23:02:06'),
(9, 'Desktop', 'Desktop', 1900000, 1, 'desktop', 'Desktop', '2016-11-26 23:02:50', '2016-11-26 23:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_10_26_154542_create_cates_table', 1),
(4, '2016_10_26_155146_create_products_table', 1),
(5, '2016_10_26_160050_create_product_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `intro`, `content`, `image`, `keywords`, `description`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(13, 'Áo Măng tô', 'Áo Măng tô', 88888888, 'Áo Măng tô giẻ rách\r\n', '<p>&Aacute;o Măng t&ocirc; giẻ r&aacute;ch</p>\r\n', 'ao-so-mi-hollister-mau-den.png', 'ao-mang-to', '                áo măng tô hiệu giẻ rách\r\n                ', 7, 2, '2016-11-14 00:27:06', '2016-11-27 01:22:34'),
(15, 'Quần Bóng', 'Quần Bóng', 99999999, '<p>Quần B&oacute;ng</p>\r\n', 'Quần Bóng', '2016-China-Supplier-8-Colors-Long-Style.jpg', 'quan-bong', 'Quần Bóng', 1, 1, '2016-11-15 19:49:05', '2016-11-15 19:49:05'),
(16, 'Quần Vải', 'Quần Vải', 989898, '<p>Quần Vải Osen</p>\r\n', 'Quần Vải Osen', 'ao-thun-nam-anti-x-mau-xanh-nhat--co-co-ipxi4907e0w0h0.jpg', 'quan-vai-osen', 'Quần Vải Osen', 7, 1, '2016-11-20 21:49:22', '2016-11-20 21:49:22'),
(17, 'Quần Jean', 'Quần Jean', 1000000, '<p>Quần Jean</p>\r\n', 'Quần Jean Xuất Khẩu', 'enbac.jpg', 'quan-jean', 'Quần Jean Xuất Khẩu', 7, 1, '2016-11-26 23:06:07', '2016-11-26 23:06:07'),
(18, 'Áo Sơ Mi Nữ', 'Áo Sơ Mi Nữ', 10999999, '<p>&Aacute;o Sơ Mi Nữ</p>\r\n', 'Áo Sơ Mi Nữ', 'ao-so-mi-nu.jpg', 'ao-so-mi-nu', 'Áo Sơ Mi Nữ', 7, 2, '2016-11-26 23:09:25', '2016-11-26 23:09:25'),
(19, 'Tất Ý', 'Tất Ý', 10998982, '<p>Tất nhập khẩu từ &Yacute;</p>\r\n', 'Tất nhập khẩu từ Ý', 'tat1.jpg', 'tat-nhap-khau', 'Tất nhập khẩu từ Ý', 7, 4, '2016-11-26 23:11:22', '2016-11-26 23:11:22'),
(20, 'Giầy Ý', 'Giầy Ý', 198000, '<p>Giầy Nhập Khẩu Từ &Yacute;</p>\r\n', 'Giầy Nhập Khẩu Từ Ý', 'giay1.jpg', 'giay-nhap-khau-tu-y', 'Giầy Nhập Khẩu Từ Ý', 7, 5, '2016-11-26 23:13:47', '2016-11-26 23:13:47'),
(21, 'Tủ Lạnh', 'Tủ Lạnh', 8888888, '<p>Tủ lạnh nhập khẩu</p>\r\n', 'Tủ lạnh nhập khẩu', 'tu-lanh1.jpg', 'tu-lanh', 'Tủ lạnh nhập khẩu', 7, 7, '2016-11-27 00:19:23', '2016-11-27 00:19:23'),
(22, 'Quạt Điện Cơ', 'Quạt Điện Cơ', 1313131, '<p>Quạt Điện Cơ</p>\r\n', 'Quạt Điện Cơ', 'quat1.jpg', 'quat-dien-co', 'Quạt Điện Cơ', 7, 8, '2016-11-27 00:21:48', '2016-11-27 00:21:48'),
(23, 'Quần Kaki Nam', 'Quần Kaki Nam', 250000, 'Quần Kaki', 'Quần Kaki', 'quan-kaki-nam.jpg', 'quan-kaki-nam', 'Quần Kaki', 7, 1, '2016-11-27 19:44:34', '2016-11-27 19:44:34'),
(24, 'Desktop Setup One', 'Desktop Setup One', 12000000, 'Desktop Setup One', 'Desktop Setup One', 'desktop1.jpg', 'desktop-setup-one', 'Desktop Setup One', 7, 9, '2016-11-27 20:13:26', '2016-11-27 20:13:26'),
(36, 'Apple', 'Apple', 84574857, '<p>Apple</p>\r\n', 'Apple', '107105253-apple-tech-xlarge_trans++bFoXn4d1uVNGRa1pDHVYNFbFJiGQSGUwQFXFdwSXZiw.jpg', 'apple', 'apple', 7, 3, '2016-11-28 01:08:44', '2016-11-28 01:08:44'),
(37, 'ewfewfềw', 'ewfewfềw', 3434, '<p>wềw</p>\r\n', 'ưefwef', '2016-China-Supplier-8-Colors-Long-Style.jpg', 'regre', 'egreẻger', 7, 4, '2016-11-28 01:21:30', '2016-11-28 01:21:30'),
(38, 'ihkjhdsfed', 'ihkjhdsfed', 232323, '<p>ihkjhdsfe</p>\r\n', 'ưefwef', '2016-China-Supplier-8-Colors-Long-Style.jpg', 'regref', 'ưefwefef', 7, 4, '2016-11-28 01:25:17', '2016-11-28 01:25:17'),
(39, 'ihkjhdsfedưd', 'ihkjhdsfedưd', 232323, '<p>qưd</p>\r\n', 'qưd', 'dep3.jpg', 'regref', 'qưd', 7, 6, '2016-11-28 01:26:00', '2016-11-28 01:26:00'),
(40, 'qưdihkjhdsfedưdưddsf', 'qưdihkjhdsfedưdưddsf', 234234, '<p>ưdqưd</p>\r\n', 'qđưqưd', 'ao-so-mi-nu-2.jpg', 'ưerwer', 'qưdqwd', 7, 6, '2016-11-28 01:29:50', '2016-11-28 01:29:50'),
(41, 'qưdihkjhdsfedưdưddsfewf', 'qưdihkjhdsfedưdưddsfewf', 234234, '<p>ewfưefewf</p>\r\n', 'ưefewfưefwef', '2016-China-Supplier-8-Colors-Long-Style.jpg', 'ưerwerưef', 'ưefwefè', 7, 3, '2016-11-28 01:33:48', '2016-11-28 01:33:48'),
(42, 'qưdihkjhdsfedưdưddsfewfqưd', 'qưdihkjhdsfedưdưddsfewfqưd', 234234, '<p>ưef</p>\r\n', 'ưefưef', 'chuyen-si-le-quan-kaki-nam-facioshop-qa164.jpg', 'ưerwerưefưef', 'ưefưef', 7, 2, '2016-11-28 01:34:25', '2016-11-28 01:34:25'),
(43, 'qưdihkjhdsfedưdưddsfewfqưdwef', 'qưdihkjhdsfedưdưddsfewfqưdwef', 234234, '<p>ưef</p>\r\n', 'ưefưef', 'ao-so-mi-nu-1.jpg', 'ưerwerưefưefưef', 'ưefưef', 7, 2, '2016-11-28 01:35:22', '2016-11-28 01:35:22'),
(44, 'qưdihkjhdsfedưdưddsfewfqưdwefưef', 'qưdihkjhdsfedưdưddsfewfqưdwefưef', 2342343, '<p>ưef</p>\r\n', 'ưefưefewf', 'dep1.jpg', 'ưerwerưefưefưefưefew', 'ưefwef', 7, 3, '2016-11-28 01:36:19', '2016-11-28 01:36:19'),
(45, 'excite', 'excite', 45473525, '<p>asdasdaksldj</p>\r\n', 'jdashfjdshfkj', 'ao-so-mi-nu-2.jpg', 'asdiasudiaus', 'asuaifuioaufia', 7, 3, '2016-11-28 01:52:42', '2016-11-28 01:52:42'),
(46, 'Nước Hồn', 'Nước Hồn', 47534823, '<p>nước hồn</p>\r\n', 'nước hồn', 'ao-so-mi-nu-2.jpg', 'nuoc-hon', 'Nước Hồn', 7, 3, '2016-11-28 02:17:59', '2016-11-28 02:17:59'),
(47, 'Quần Lin', 'Quần Lin', 42342342, '<p>Quần Lin</p>\r\n', 'Quần Lin', '2016-China-Supplier-8-Colors-Long-Style.jpg', 'quan-lin', 'Quần Lin', 7, 1, '2016-11-28 02:59:27', '2016-11-28 02:59:27'),
(48, 'Nồi Cơm Điện', 'Nồi Cơm Điện', 83439483, '<p>Nồi Cơm Điện</p>\r\n', 'Nồi Cơm Điện', '103733_noi-com-dien-panasonic-sr-tr184sra-3.jpg', 'noi-com-dien', 'Nồi Cơm Điện', 7, 7, '2016-11-28 03:11:38', '2016-11-28 03:11:38'),
(49, 'Nồi Cơm Điện Cooku', 'Nồi Cơm Điện Cooku', 38473287, '<p>Nồi Cơm Điện Cooku</p>\r\n', 'Nồi Cơm Điện Cooku', 'noi-com-dien-cuckoo-cr_1713r_3.jpg', 'noi-com-dien-cooku', 'Nồi Cơm Điện Cooku', 7, 7, '2016-11-28 03:22:25', '2016-11-28 03:22:25'),
(50, 'TV 32inch', 'TV 32inch', 352820598, '<p>Tivi 32 inch</p>\r\n', 'Tivi 32 inch', 'tv1.jpg', 'Tivi 32 inch', 'Tivi 32 inch', 7, 7, '2016-11-28 03:29:25', '2016-11-28 03:29:25'),
(51, 'Quần Vẩy', 'Quần Vẩy', 48548875, '<p>Quần Vẩy</p>\r\n', 'Quần Vẩy', 'quanvay1.jpg', 'Quần Vẩy', 'Quần Vẩy', 7, 1, '2016-11-28 03:58:55', '2016-11-28 03:58:55'),
(52, 'Quần Lởm', 'Quần Lởm', 32752358, '<p><span style="color:rgb(17, 17, 17); font-family:ubuntu,arial,libra sans,sans-serif; font-size:15px">Quần Lởm</span></p>\r\n', 'Quần Lởm', 'quanvay1.jpg', 'quan-lom', 'Quần Lởm', 7, 1, '2016-11-29 19:37:41', '2016-11-29 19:37:41'),
(53, 'Quần Jogger', 'Quần Jogger', 4854348, '<p>Quần Jogger</p>\r\n', 'Quần Jogger', 'quan-jogger1.jpg', 'quan-jooger', 'Quần Jogger', 7, 1, '2016-11-29 20:27:44', '2016-11-29 20:27:44'),
(54, 'Quần Culottes', 'Quần Culottes', 58457, '<p>Quần Culottes</p>\r\n', 'Quần Culottes', '9192aeb89a4f1de8f1764ffe3d85edb9.jpg', 'Quần Culottes', 'Quần Culottes', 7, 1, '2016-11-30 00:13:10', '2016-11-30 00:13:10'),
(55, 'Bugatti', 'Bugatti', 182534683, '<p>Bugatti</p>\r\n', 'Bugatti', 'bugatti1.jpg', 'bugatti', 'Bugatti', 7, 7, '2016-11-30 00:36:42', '2016-11-30 00:36:42'),
(56, 'Bugatti 2', 'Bugatti 2', 18253432, '<p>Bugatti 2</p>\r\n', 'Bugatti 2', 'bugatti2.jpg', 'bugatti 2', 'Bugatti 2', 7, 7, '2016-11-30 01:01:37', '2016-11-30 01:01:37'),
(57, 'Bugatti 3', 'Bugatti 3', 18253432, '<p>Bugatti 3</p>\r\n', 'Bugatti 3', 'bugatti3.jpg', 'bugatti 3', 'Bugatti 3', 7, 7, '2016-11-30 01:06:12', '2016-11-30 01:06:12'),
(58, 'Bugatti 4', 'Bugatti 4', 182534322, '<p>Bugatti 4</p>\r\n', 'Bugatti 4', 'bugatti4.jpg', 'bugatti 3', 'Bugatti 4', 7, 7, '2016-11-30 01:27:47', '2016-11-30 01:27:47'),
(59, 'Bugatti 6', 'Bugatti 6', 45343636, '<p>Bugatti 6</p>\r\n', 'Bugatti 6', 'bugatti6.jpg', 'Bugatti 6', 'Bugatti 6', 7, 7, '2016-11-30 01:58:38', '2016-11-30 01:58:38'),
(60, 'Bugatti 7', 'Bugatti 7', 453436326, '<p>Bugatti 7</p>\r\n', 'Bugatti 7', 'bugatti7.jpg', 'Bugatti 7', 'Bugatti 7', 7, 7, '2016-11-30 02:01:23', '2016-11-30 02:01:23'),
(61, 'Bugatti 8', 'Bugatti 8', 82357285, '<p>Bugatti 8</p>\r\n', 'Bugatti 8', 'bugatti8.jpg', 'Bugatti 8', 'Bugatti 8', 7, 7, '2016-11-30 02:04:09', '2016-11-30 02:04:09'),
(62, 'Iphone 6', 'Iphone 6', 34538843, '<p>Iphone 6</p>\r\n', 'Iphone 6', 'apple_iphone6_hero_cc003.jpg', 'Iphone 6', 'Iphone 6', 7, 7, '2016-11-30 02:29:11', '2016-11-30 02:29:11'),
(63, 'Iphone 6S', 'Iphone 6S', 342423423, '<p>Iphone 6S</p>\r\n', 'Iphone 6S', 'apple_iphone6_hero_cc003.jpg', 'Iphone 6', 'Iphone 6S', 7, 7, '2016-11-30 02:35:10', '2016-11-30 02:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(42, '2016-China-Supplier-8-Colors-Long-Style.jpg', 15, NULL, NULL),
(43, '2016-China-Supplier-8-Colors-Long-Style.jpg', 15, NULL, NULL),
(44, '2016-China-Supplier-8-Colors-Long-Style.jpg', 15, NULL, NULL),
(49, 'quan-jean-1.jpg', 17, NULL, NULL),
(50, 'quan-jean-2.jpeg', 17, NULL, NULL),
(51, 'ao-so-mi-nu-1.jpg', 18, NULL, NULL),
(52, 'ao-so-mi-nu-2.jpg', 18, NULL, NULL),
(53, 'ao-so-mi-nu.jpg', 18, NULL, NULL),
(54, 'tat1.jpg', 19, NULL, NULL),
(55, 'tat2.jpg', 19, NULL, NULL),
(56, 'tat3.JPG', 19, NULL, NULL),
(57, 'giay1.jpg', 20, NULL, NULL),
(58, 'giay2.jpg', 20, NULL, NULL),
(59, 'giay3.JPG', 20, NULL, NULL),
(60, 'tu-lanh3.jpg', 21, NULL, NULL),
(61, 'tu-lanh1.jpg', 21, NULL, NULL),
(62, 'tu-lanh-2.jpg', 21, NULL, NULL),
(63, 'quat1.jpg', 22, NULL, NULL),
(64, 'quat2.jpg', 22, NULL, NULL),
(65, 'quat3.jpg', 22, NULL, NULL),
(66, 'apple-iphone-6-1.jpg', 62, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'akkerise', '12345678', 'nguyenthanh.rise.88@gmail.com', 2, NULL, NULL, NULL),
(3, 'akinhdinh', '$2y$10$p0WVkAoRy1huxARlVmZRyeYf/1NUZH/60RuPfZOeiBsH1jf10fr2a', 'nguyneasda@gmail.com', 2, '1Wv7JtsqZ6jUU9f1vHG8eSLfLhe8tdWEDzAg7I9E', '2016-11-17 04:04:31', '2016-11-17 04:04:31'),
(5, 'doidepzai', '$2y$10$uDgw5EVnmqNLSXyXYrz9OO3ttfLE6Gv9uON/hLCnoOiY9kYNazs.a', 'quingu@gmail.com', 2, 'sLAjGhbTA6HDtY9K663EohE9u3t1A2dKDt8anyFk', '2016-11-17 04:38:43', '2016-11-17 04:38:43'),
(7, 'nguyenthanh88', '$2y$10$0eaTDgCHfP01kqYLxfOikOic6GNqvtBQ2crH4J/1hkl.32UdJToCy', 'nguyenthanhabc@gmail.com', 1, '329ZyVsEF3X9iZGmvCLwFP9FpgHUlSDPxqT4Si5bAakWMZEYcLFjN6DoyDjB', '2016-11-17 20:39:01', '2016-11-24 04:03:17'),
(8, 'nguyenabc', '$2y$10$viMdlHvGEpxxXkbYzZlPeuz6.n6yVSseknkysTpJbIly6Pn6a2iMW', 'nguyentha@ajsd.cc', 3, 'RpUTznJVme89eVW5PNUyYYjpsbfCCCDblxPyQ8Vs', '2016-11-21 01:31:34', '2016-11-21 01:31:34'),
(9, 'saikodo', '$2y$10$7Ua76dVekOAbgYtjw.5.auDe3PnaPcJ8iyKakhDzJ9PBULNajWoCW', 'saikodo@gmail.com', 2, 'RpUTznJVme89eVW5PNUyYYjpsbfCCCDblxPyQ8Vs', '2016-11-21 01:31:59', '2016-11-24 03:23:46'),
(10, 'member', '$2y$10$xgVVBQD8.XwcovvFKTeaqe1z0Qk/7zdlJkXW2GYWTytxEjyUiee0G', 'asfdskfk@fsjdjf.com', 3, 'RpUTznJVme89eVW5PNUyYYjpsbfCCCDblxPyQ8Vs', '2016-11-21 01:36:31', '2016-11-21 01:36:31'),
(11, 'akkesorrybaby', '$2y$10$VUSOv2S3KwFzv.We2Yq1/OrOOOv/YOSxyn9p2lciVnwIgQp4EfM.S', 'akkesorry@gmail.com', 2, 'RpUTznJVme89eVW5PNUyYYjpsbfCCCDblxPyQ8Vs', '2016-11-21 03:34:56', '2016-11-24 04:03:07'),
(12, 'akkesorry88', '$2y$10$QzSgvaad5nSWJ01yXl.UuOVqndM.BuqlvIVodmJVFYWw2tFh.eYqG', 'nguyenthanh.rise.88@gmail.com', 2, 'RpUTznJVme89eVW5PNUyYYjpsbfCCCDblxPyQ8Vs', '2016-11-21 03:51:11', '2016-11-21 03:51:11'),
(13, 'withlove', '$2y$10$LJZ/CqbuL4e.mIUiHDY5cOr.mVUjeWQ.1rEnZzu4cr1kFp/imr5qS', 'withlove@gmail.com', 2, 'MhuEKS2nu51Wvtx829bmf4YGXBZW1meVcB2A1epG39f8NVBLrRIyFkwUJT2O', '2016-11-21 20:30:57', '2016-11-22 00:53:06'),
(16, 'thanhkinh', '$2y$10$ALlg9Sj1mX23IRLKNKRW5e6B3HhVKmbfHWO4cv78QcLAyzUIeQLOa', 'thanhkinh@gmail.com', 3, 'VjyS2STMON2zFP6IEwf099HCI25135Qm1KYMopY0', '2016-11-22 01:03:02', '2016-11-22 01:03:02'),
(17, 'sorrybaby', '$2y$10$bU1rZAO5fb.FA6x33nQ9zeo5SytMwzTV9rFNkOcpA06QScQaEzJBW', 'sorrybaby@gmail.com', 1, 'VjyS2STMON2zFP6IEwf099HCI25135Qm1KYMopY0', '2016-11-22 03:25:31', '2016-11-24 02:38:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
