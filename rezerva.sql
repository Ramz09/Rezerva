-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2022 pada 16.19
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rezerva`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 'admin', NULL, '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(2, 'eko', 'eko@gmail.com', NULL, 'eko', NULL, '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(3, 'budi', 'budi@gmail.com', NULL, 'budi', NULL, '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(4, 'joko', 'joko@gmail.com', NULL, 'joko', NULL, '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(5, 'edi', 'edi@gmail.com', NULL, 'edi', NULL, '2022-01-03 09:03:17', '2022-01-03 09:03:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Menu Andalan', 'sate-ayam.jpg', 'menu-andalan', '2021-12-23 18:11:44', '2021-12-23 18:11:44'),
(2, 'Menu Terbaru', 'lontong-opor-ayam.jpg', 'menu-terbaru', '2021-12-23 18:11:56', '2022-01-01 08:01:00'),
(3, 'Makanan Ringan', 'kentang-goreng.jpg', 'makanan-ringan', '2021-12-25 05:24:17', '2021-12-25 05:24:17'),
(4, 'Makanan Pembuka ', 'pangsit.jpg', 'makanan-pembuka', '2021-12-25 05:24:34', '2021-12-25 05:24:34'),
(5, 'Makanan Utama', 'nasi-goreng-telor.jpg', 'makanan-utama', '2021-12-25 05:25:07', '2021-12-25 05:25:07'),
(6, 'Makanan Penutup', 'mie-goreng.jpg', 'makanan-penutup', '2021-12-25 05:25:43', '2021-12-25 05:25:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aufa', 'admin@gmail.com', NULL, '2022-04-06 14:43:14', '2022-04-06 14:43:14'),
(2, 'Ihsan ', 'admin@gmail.com', NULL, '2022-04-06 14:47:35', '2022-04-06 14:47:35'),
(3, 'asdvasdv', 'admin@gmail.com', NULL, '2022-04-06 15:03:21', '2022-04-06 15:03:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `status_pembayaran` enum('pending','success','expired','failed') COLLATE utf8_unicode_ci NOT NULL,
  `status_pesanan` enum('dikonfirmasi','diantar','diterima','ditolak') COLLATE utf8_unicode_ci NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `snap_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `invoice`, `customer_id`, `table_id`, `status_pembayaran`, `status_pesanan`, `grand_total`, `snap_token`, `created_at`, `updated_at`) VALUES
(1, 'INV-195D4TU8RO', 1, 2, 'success', 'diterima', 99000, 'f38cdbe8-00a2-456d-85b6-f7d141dc137e', '2022-04-06 14:43:14', '2022-04-06 14:44:52'),
(2, 'INV-V6CURH1XO1', 2, 1, 'success', 'diterima', 13500, 'a9e567b5-fe4b-4daf-b076-a9eaa101ae8f', '2022-04-06 14:47:35', '2022-04-06 14:48:18'),
(3, 'INV-XB1DT9OK2X', 3, 3, 'success', 'diterima', 85500, 'd72e9577-4a49-4d4c-8407-d401cd9e9612', '2022-04-06 15:03:21', '2022-04-06 15:07:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `final_price` bigint(20) NOT NULL,
  `stock` enum('tersedia','habis') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'tersedia',
  `discount` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `rating` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `image`, `title`, `slug`, `category_id`, `description`, `price`, `final_price`, `stock`, `discount`, `sold`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'sate-ayam.jpg', 'Sate Ayam', 'sate-ayam', 1, 'Sate ayam Madura', 20000, 18000, 'tersedia', 10, 8, 4.50, '2021-12-23 18:14:20', '2022-04-06 15:07:28'),
(2, 'nasi-rames.jpg', 'Nasi Rames', 'nasi-rames', 1, 'Nasi Rames Dengan Lauk Lengkap', 15000, 13500, 'habis', 10, 3, 4.00, '2021-12-23 18:14:46', '2022-04-06 15:02:34'),
(3, 'nasi-goreng-telor.jpg', 'Nasi Goreng', 'nasi-goreng', 1, 'Nasi Goreng Telur', 20000, 20000, 'habis', 0, 0, 0.00, '2021-12-23 18:15:15', '2021-12-25 05:17:35'),
(4, 'nasi-ayam-geprek.jpg', 'Ayam Geprek', 'ayam-geprek', 1, 'Ayam Geprek Dengan Nasi', 15000, 13500, 'tersedia', 10, 1, 5.00, '2021-12-23 18:16:04', '2022-04-06 15:07:32'),
(5, 'mie-goreng.jpg', 'Mie Goreng', 'mie-goreng', 2, 'Mie Goreng Sedap Malam', 20000, 17000, 'tersedia', 15, 0, 0.00, '2021-12-23 18:16:37', '2021-12-25 05:36:33'),
(6, 'mie-ayam-bakso.jpg', 'Mie Ayam Bakso', 'mie-ayam-bakso', 2, 'Mie Ayam Dengan Bakso Porsi Jumbo', 15000, 15000, 'habis', 0, 0, 0.00, '2021-12-23 18:17:22', '2021-12-25 05:17:37'),
(7, 'bakso.jpg', 'Bakso', 'bakso', 2, 'Bakso', 15000, 12000, 'tersedia', 20, 0, 0.00, '2021-12-23 18:18:11', '2021-12-31 21:51:01'),
(8, 'lontong-opor-ayam.jpg', 'Lontong Opor', 'lontong-opor', 2, 'Lontog Opor ', 15000, 15000, 'tersedia', 0, 0, 0.00, '2021-12-23 18:18:38', '2021-12-23 18:18:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `table_id`, `menu_id`, `description`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'pedas', 4, 72000, '2022-04-06 14:43:14', '2022-04-06 14:43:14'),
(2, 1, 2, 2, 'pedas', 2, 27000, '2022-04-06 14:43:14', '2022-04-06 14:43:14'),
(3, 2, 1, 2, 'pedas', 1, 13500, '2022-04-06 14:47:35', '2022-04-06 14:47:35'),
(4, 3, 3, 1, 'asdvasdv', 4, 72000, '2022-04-06 15:03:21', '2022-04-06 15:03:21'),
(5, 3, 3, 4, 'asdvasdv', 1, 13500, '2022-04-06 15:03:21', '2022-04-06 15:03:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`menu_id`, `customer_id`, `rate`, `review`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'harga terjangkau', '2022-04-06 14:45:06', '2022-04-06 14:45:06'),
(2, 1, 4, 'rasa sesuai harganya', '2022-04-06 14:45:27', '2022-04-06 14:45:27'),
(1, 3, 4, 'acxc', '2022-04-06 15:07:28', '2022-04-06 15:07:28'),
(4, 3, 5, 'ZXCZXC', '2022-04-06 15:07:32', '2022-04-06 15:07:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tables`
--

INSERT INTO `tables` (`id`, `table`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(2, '2', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(3, '3', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(4, '4', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(5, '5', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(6, '6', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(7, '7', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(8, '8', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(9, '9', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(10, '10', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(11, '11', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(12, '12', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(13, '13', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(14, '14', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(15, '15', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(16, '16', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(17, '17', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(18, '18', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(19, '19', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(20, '20', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(21, '21', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(22, '22', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(23, '23', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(24, '24', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(25, '25', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(26, '26', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(27, '27', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(28, '28', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(29, '29', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(30, '30', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(31, '31', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(32, '32', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(33, '33', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(34, '34', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(35, '35', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(36, '36', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(37, '37', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(38, '38', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(39, '39', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(40, '40', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(41, '41', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(42, '42', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(43, '43', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(44, '44', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(45, '45', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(46, '46', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(47, '47', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(48, '48', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(49, '49', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(50, '50', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(51, '51', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(52, '52', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(53, '53', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(54, '54', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(55, '55', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(56, '56', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(57, '57', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(58, '58', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(59, '59', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(60, '60', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(61, '61', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(62, '62', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(63, '63', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(64, '64', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(65, '65', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(66, '66', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(67, '67', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(68, '68', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(69, '69', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(70, '70', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(71, '71', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(72, '72', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(73, '73', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(74, '74', '2022-01-03 09:03:16', '2022-01-03 09:03:16'),
(75, '75', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(76, '76', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(77, '77', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(78, '78', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(79, '79', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(80, '80', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(81, '81', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(82, '82', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(83, '83', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(84, '84', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(85, '85', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(86, '86', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(87, '87', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(88, '88', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(89, '89', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(90, '90', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(91, '91', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(92, '92', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(93, '93', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(94, '94', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(95, '95', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(96, '96', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(97, '97', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(98, '98', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(99, '99', '2022-01-03 09:03:17', '2022-01-03 09:03:17'),
(100, '100', '2022-01-03 09:03:17', '2022-01-03 09:03:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`),
  ADD KEY `invoices_table_id_foreign` (`table_id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_menu_id_foreign` (`menu_id`),
  ADD KEY `orders_table_id_foreign` (`table_id`),
  ADD KEY `orders_invoice_id_foreign` (`invoice_id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `reviews_menu_id_foreign` (`menu_id`),
  ADD KEY `reviews_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Ketidakleluasaan untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`);

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `orders_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`);

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reviews_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
