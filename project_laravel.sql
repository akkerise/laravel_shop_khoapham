-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2016 at 07:34 AM
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
(1, 'Quần', 'Quần Xuất Khẩu Bán Chạy', 1, 1, 'quan-xuat-khau', 'Quần Áo Xuất Khẩu Bền Đẹp Giá Rẻ', NULL, NULL),
(2, 'Áo', 'Áo Xuất Khẩu Bán Chạy', 2, 2, 'ao-xuat-khau', 'Áo Xuất Khẩu Bền Đẹp Giá Rẻ', NULL, NULL),
(3, 'Quần Jean', 'Quần Jean Xuất Khẩu Bán Chạy', 3, 3, 'quan', 'Áo Sơmi Xuất Khẩu Bền Đẹp Giá Rẻ', NULL, NULL),
(4, 'Áo Sơmi', 'Áo Xuất Khẩu Bán Chạy', 4, 4, 'ao-xuat-khau', 'Áo Xuất Khẩu Bền Đẹp Giá Rẻ', NULL, NULL);

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
(8, 'Quần Jean Đập Đá', 'Quần Jean Đập Đá', 900000000, '<p>Quần Jean Đập Đ&aacute;</p>\r\n', 'Quần Jean Đập Đá', 'Moda-pantalon-homme-Hombres-de-Bolsillo-Pantalones-Casuales-Pantalones-Deportivos-Danza-Hip-Hop-Tiro-Caído-Hombres.jpg', 'quan-jean-dap-da', 'Quần Jean Đập Đá', 1, 3, '2016-11-10 02:59:56', '2016-11-10 02:59:56'),
(10, 'Quần Định Mệnh', 'Quần Định Mệnh', 999999999, '<p>Quần Định Mệnh&nbsp;</p>\r\n', 'Quần Định Mệnh', 'quan-dinh-m.png', 'quan-dinh-menh', 'Quần Định Mệnh', 1, 1, '2016-11-10 03:05:58', '2016-11-10 03:05:58'),
(11, 'dasdas', 'dasdas', 5343534, '<p>dfdsfsdsdf</p>\r\n', 'sfsdfds', '2016-China-Supplier-8-Colors-Long-Style.jpg', 'sdfsdf', 'sdfsdfsd', 1, 2, '2016-11-13 20:16:00', '2016-11-13 20:16:00'),
(12, 'asdsadsad', 'asdsadsad', 3252525, '<p>sadasdsad</p>\r\n', 'asdsadsa', '2016-China-Supplier-8-Colors-Long-Style.jpg', 'asdsadsad', 'sdasdsad', 1, 2, '2016-11-13 20:22:42', '2016-11-13 20:22:42');

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
(17, 'Moda-pantalon-homme-Hombres-de-Bolsillo-Pantalones-Casuales-Pantalones-Deportivos-Danza-Hip-Hop-Tiro-Caído-Hombres.jpg', 8, NULL, NULL),
(18, 'Moda-pantalon-homme-Hombres-de-Bolsillo-Pantalones-Casuales-Pantalones-Deportivos-Danza-Hip-Hop-Tiro-Caído-Hombres.jpg', 8, NULL, NULL),
(19, 'Moda-pantalon-homme-Hombres-de-Bolsillo-Pantalones-Casuales-Pantalones-Deportivos-Danza-Hip-Hop-Tiro-Caído-Hombres.jpg', 8, NULL, NULL),
(20, 'Moda-pantalon-homme-Hombres-de-Bolsillo-Pantalones-Casuales-Pantalones-Deportivos-Danza-Hip-Hop-Tiro-Caído-Hombres.jpg', 8, NULL, NULL),
(21, 'Moda-pantalon-homme-Hombres-de-Bolsillo-Pantalones-Casuales-Pantalones-Deportivos-Danza-Hip-Hop-Tiro-Caído-Hombres.jpg', 8, NULL, NULL),
(27, 'quan-dinh-m.png', 10, NULL, NULL),
(28, 'quan-dinh-m.png', 10, NULL, NULL),
(29, 'quan-dinh-m.png', 10, NULL, NULL),
(30, 'quan-dinh-m.png', 10, NULL, NULL),
(31, 'quan-dinh-m.png', 10, NULL, NULL);

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
(1, 'akkerise', '12345678', 'nguyenthanh.rise.88@gmail.com', 1, NULL, NULL, NULL),
(2, 'nguyenthanh', '12345678', 'nguyenthanh.rise@gmail.com', 2, NULL, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
