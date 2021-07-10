-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 02:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datawed`
--

-- --------------------------------------------------------

--
-- Table structure for table `danhsachhang`
--

CREATE TABLE `danhsachhang` (
  `danhsach_id` int(10) NOT NULL,
  `danhsach_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `muanhieu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhsachhang`
--

INSERT INTO `danhsachhang` (`danhsach_id`, `danhsach_name`, `image`, `muanhieu`) VALUES
(1, 'Hutao', 'hutao.jpg', 'true'),
(2, 'Xiao', 'xiao.jpg', 'true'),
(3, 'Ganyu', 'ganyu.jpg', 'true'),
(4, 'Zhongli', 'zhongli.jpg', 'true'),
(5, 'Childe', 'childe.jpg', ''),
(6, 'Albedo', 'albedo.jpg', ''),
(7, 'Klee', 'klee.jpg', ''),
(8, 'Venti', 'venti.jpg', ''),
(9, 'Diluc', 'diluc.jpg', ''),
(10, 'Keqing', 'keqing.jpg', ''),
(11, 'Jean', 'jean.jpg', ''),
(12, 'Mona', 'mona.jpg', ''),
(13, 'Qiqi', 'qiqi.jpg', ''),
(14, 'Reroll', 'Item_Intertwined_Fate.jpg', 'dacbiet');

-- --------------------------------------------------------

--
-- Table structure for table `khohang`
--

CREATE TABLE `khohang` (
  `khohang_id` int(10) NOT NULL,
  `khohang_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(50) NOT NULL,
  `capdo` int(20) NOT NULL,
  `mota` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taikhoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danhsach_id` int(50) DEFAULT NULL,
  `taikhoan_id` int(50) NOT NULL,
  `Ngaycapnhat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khohang`
--

INSERT INTO `khohang` (`khohang_id`, `khohang_name`, `image`, `image_2`, `image_3`, `image_4`, `gia`, `capdo`, `mota`, `taikhoan`, `matkhau`, `danhsach_id`, `taikhoan_id`, `Ngaycapnhat`) VALUES
(1, 'Tài khoản Xiao', 'xiao.jpg', 'xiao_2.jpg', 'xiao_3.jpg', 'xiao_4.jpg', 220000, 1, 'Tài khoản Xiao 5*', 'xiao01', '123456', 2, 0, NULL),
(2, 'Tài khoản Hutao', 'hutao.jpg', '', '', '', 220000, 1, 'Tài khoản Hutao 5*', 'hutao02', '123456', 1, 0, NULL),
(3, 'Tài khoản Ganyu', 'ganyu.jpg', '', '', '', 220000, 1, 'Tài khoản Ganyu 5*', 'ganyu03', '123456', 3, 0, NULL),
(4, 'Tài khoản Zhongli', 'zhongli.jpg', '', '', '', 220000, 1, 'Tài khoản Zhongli 5*', 'zhongli04', '123456', 4, 0, NULL),
(7, 'Tài khoản Xiao', 'xiao.jpg', 'xiao_2.jpg', 'xiao_3.jpg', 'xiao_4.jpg', 220000, 1, 'Tài khoản Xiao 5*', 'xiao07', '123456', 2, 1, NULL),
(9, 'Tài khoản Childe', 'childe.jpg', '', '', '', 200000, 1, 'Tài khoản Childe 5*', 'childe09', '123456', 5, 0, NULL),
(54658, 'hihihi22222 gfhgfh ', 'diluc.jpg', '', 'diluc.jpg', 'jean.jpg', 2147483647, 0, 'hihihi22222 gfhgfh ', '123456', '8975632102', NULL, 0, '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `napthecao`
--

CREATE TABLE `napthecao` (
  `loaithe` int(11) NOT NULL,
  `seri` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mathe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pcoin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `napthecao`
--

INSERT INTO `napthecao` (`loaithe`, `seri`, `mathe`, `Pcoin`) VALUES
(1000000, 'thecao1tr', 'thecao1tr', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan_id` int(10) NOT NULL,
  `taikhoan_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taikhoan_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coin` int(30) NOT NULL,
  `taikhoan_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan_id`, `taikhoan_user`, `taikhoan_pass`, `coin`, `taikhoan_img`) VALUES
(1, 'admin', 'admin', 560000, 'user.jpg'),
(5, 'DeathEV3', '30122001', 12780000, 'klee.jpg'),
(9, 'DeathEV5', '30122001', 0, 'user.jpg'),
(11, 'DeathEV', '123456', 0, 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danhsachhang`
--
ALTER TABLE `danhsachhang`
  ADD PRIMARY KEY (`danhsach_id`);

--
-- Indexes for table `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`khohang_id`),
  ADD KEY `danhsach_id` (`danhsach_id`);

--
-- Indexes for table `napthecao`
--
ALTER TABLE `napthecao`
  ADD PRIMARY KEY (`mathe`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`taikhoan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhsachhang`
--
ALTER TABLE `danhsachhang`
  MODIFY `danhsach_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `khohang`
--
ALTER TABLE `khohang`
  MODIFY `khohang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54659;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `taikhoan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khohang`
--
ALTER TABLE `khohang`
  ADD CONSTRAINT `khohang_ibfk_1` FOREIGN KEY (`danhsach_id`) REFERENCES `danhsachhang` (`danhsach_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
