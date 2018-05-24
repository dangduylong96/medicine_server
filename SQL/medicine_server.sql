-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 07:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`id`, `name`, `img`, `phone`, `dob`, `created_at`, `updated_at`) VALUES
(1, 'Trần Minh Thức', 'txJTyDLH1L29792908_1370473833099446_7834995472983916544_n.jpg', '01652048001', '1996-01-15 00:00:00', '2018-04-17 15:10:56', '2018-04-17 15:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Đông Y', 1, '2018-04-17 16:39:28', '2018-04-17 16:47:27'),
(3, 'Tây Y', 1, '2018-04-18 08:25:10', '2018-04-18 08:25:10'),
(4, 'Cảm Sốt', 1, '2018-04-18 08:25:32', '2018-05-24 06:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_17_123845_create_admin_details_table', 1),
(4, '2018_04_17_123909_create_user_details_table', 1),
(5, '2018_04_17_124720_create_categories_table', 1),
(6, '2018_04_17_124737_create_products_table', 1),
(7, '2018_04_30_072415_change_type_tax_code_table_user_detail', 2),
(11, '2018_05_22_215537_create_orders_table', 3),
(12, '2018_05_23_205540_create_order_details_table', 3),
(13, '2018_05_24_230025_add_colum_new_product_in_table_product', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 0, '2018-05-23 14:11:59', '2018-05-23 14:11:59'),
(2, 2, 0, '2018-05-23 14:12:43', '2018-05-23 17:29:42'),
(3, 3, 1, '2018-05-23 14:25:00', '2018-05-23 17:41:11'),
(4, 4, 0, '2018-05-23 14:25:59', '2018-05-23 17:35:00'),
(5, 4, 0, '2018-05-23 14:26:21', '2018-05-23 17:36:11'),
(6, 2, 1, '2018-05-23 16:40:36', '2018-05-23 17:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `sales` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `id_product`, `name`, `qty`, `sales`, `price`, `img`) VALUES
(1, 1, 11, 'LIVERTIS - DANAPHA', 200, 100000.00, 215000.00, '2sf5Q7tryKlivertis.jpg'),
(2, 1, 10, 'Potenciator', 100, 0.00, 160000.00, 'Vo8IAMuindpotenciator.jpg'),
(3, 1, 9, 'Fudteno', 50, 0.00, 770000.00, '1FYnw63PRMfudteno_1.jpg'),
(4, 2, 4, 'Cefazolin Actavis 2g', 50, 0.00, 462000.00, 'ivAhJeVTtxcefazolin_actavis_2g_injectable.png'),
(5, 2, 5, 'ELOMET', 50, 10000.00, 35000.00, 'r2bOpQtJvOelomet-cream.png'),
(6, 3, 8, 'Nexium 40mg', 32, 0.00, 176000.00, 'ZB2TEYkuabnexium_40mg.jpg'),
(7, 3, 9, 'Fudteno', 10, 0.00, 770000.00, '1FYnw63PRMfudteno_1.jpg'),
(8, 3, 7, 'LIBRAX 5MG/ 2.5MG', 15, 0.00, 320000.00, '25WotFVaYmlibrax_1.jpg'),
(9, 4, 2, 'Thông Xoang Tán', 9, 1000.00, 40000.00, 'bEa35STTTG618944376037.jpg'),
(10, 4, 3, 'Viên An Phương', 8, 0.00, 300000.00, 'hdXkjSG2UjVSX_AnPhuong_02.jpg'),
(11, 4, 4, 'Cefazolin Actavis 2g', 6, 0.00, 462000.00, 'ivAhJeVTtxcefazolin_actavis_2g_injectable.png'),
(12, 5, 7, 'LIBRAX 5MG/ 2.5MG', 17, 0.00, 320000.00, '25WotFVaYmlibrax_1.jpg'),
(13, 5, 8, 'Nexium 40mg', 10, 0.00, 176000.00, 'ZB2TEYkuabnexium_40mg.jpg'),
(14, 6, 11, 'LIVERTIS - DANAPHA', 1, 100000.00, 215000.00, '2sf5Q7tryKlivertis.jpg'),
(15, 6, 10, 'Potenciator', 2, 0.00, 160000.00, 'Vo8IAMuindpotenciator.jpg'),
(16, 6, 3, 'Viên An Phương', 1, 0.00, 300000.00, 'hdXkjSG2UjVSX_AnPhuong_02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `price` float(8,2) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales` float(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `check_new` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `id_category`, `price`, `img`, `desc`, `sales`, `status`, `created_at`, `updated_at`, `check_new`) VALUES
(2, 'Thông Xoang Tán', 4, 40000.00, 'bEa35STTTG618944376037.jpg', '<p>-Đ&acirc;y l&agrave; sản phẩm th&ocirc;ng xoang t&aacute;n</p>', 1000.00, 1, '2018-04-24 04:20:31', '2018-05-24 06:38:25', 0),
(3, 'Viên An Phương', 3, 300000.00, 'hdXkjSG2UjVSX_AnPhuong_02.jpg', '<p>-Đ&acirc;y l&agrave; vi&ecirc;n an phương</p>', 0.00, 1, '2018-04-24 04:51:51', '2018-05-24 06:31:15', 0),
(4, 'Cefazolin Actavis 2g', 2, 462000.00, 'ivAhJeVTtxcefazolin_actavis_2g_injectable.png', '<p><strong>Th&agrave;nh phần:</strong>&nbsp;Cefazolin Sodium.</p>\r\n\r\n<p><strong>Dạng b&agrave;o chế:</strong>&nbsp;Thuốc bột pha ti&ecirc;m.</p>\r\n\r\n<p><strong>Đ&oacute;ng g&oacute;i:</strong>&nbsp;Hộp 10 lọ.</p>\r\n\r\n<p><strong>Chỉ định:</strong>&nbsp;Nhiễm tr&ugrave;ng do c&aacute;c chủng nhạy cảm ở miệng, tai-mũi-họng, phế quản-phổi, tiết niệu-sinh dục, nhiễm tr&ugrave;ng m&aacute;u, vi&ecirc;m nội t&acirc;m mạc, ngo&agrave;i da, thanh mạc, xương khớp.</p>\r\n\r\n<p><strong>Chống chỉ định:</strong>&nbsp;Qu&aacute; mẫn với cephalosporin.</p>\r\n\r\n<p><strong>Thận trọng:</strong></p>\r\n\r\n<p>Mẫn cảm với penicillin, penicillamin, griseofulvin. Suy thận: chỉnh liều. Vi&ecirc;m đại tr&agrave;ng giả mạc, tiền căn bệnh đường ti&ecirc;u h&oacute;a. Trẻ sinh non v&agrave; dưới 1 th&aacute;ng. Phụ nữ c&oacute; thai/cho con b&uacute;. Kh&ocirc;ng ti&ecirc;m v&agrave;o tủy sống.</p>\r\n\r\n<p><strong>Liều d&ugrave;ng:</strong></p>\r\n\r\n<p>Dự ph&ograve;ng nhiễm tr&ugrave;ng phẫu thuật 1 g, IM/IV 30 ph&uacute;t-1giờ trước khi phẫu thuật, sau đ&oacute; 0.5-1 g IM/IV mỗi 6-8 giờ/24 giờ sau phẫu thuật. Phẫu thuật k&eacute;o d&agrave;i tr&ecirc;n 2 giờ: IM/IV 0.5-1 g trong l&uacute;c phẫu thuật. Ngưng điều trị dự ph&ograve;ng sau 24 giờ. Người lớn Nhiễm tr&ugrave;ng do phế cầu 500 mg mỗi 12 giờ, Nhiễm tr&ugrave;ng nhẹ cầu tr&ugrave;ng Gr (+) nhạy cảm 250-500 mg mỗi 8 giờ, Nhiễm tr&ugrave;ng đường tiểu cấp kh&ocirc;ng biến chứng 1 g mỗi 12 giờ; Nhiễm tr&ugrave;ng vừa-nặng 0.5-1 g mỗi 6- 8 giờ, Nhiễm tr&ugrave;ng huyết, vi&ecirc;m nội t&acirc;m mạc 1-1.5 g mỗi 6 giờ. C&oacute; thể tăng 12 g/ng&agrave;y. Trẻ em 25-50 mg/kg/ng&agrave;y chia 3-4 lần, nặng: c&oacute; thể 100 mg/kg/ng&agrave;y, chia 3-4 lần.</p>\r\n\r\n<p><strong>Phản ứng phụ:</strong></p>\r\n\r\n<p>C&aacute;c phản ứng dị ứng: ngứa ,ban da, m&agrave;y đay... nặng hơn l&agrave; shock phản vệ, ph&ugrave; Quink, hội chứng Stevens- Johnson nhưng tần suất &iacute;t hơn c&aacute;c penicillin. Rối loạn ti&ecirc;u h&oacute;a như buồn n&ocirc;n, n&ocirc;n, đau bụng, ti&ecirc;u chảy. Bội nhiễm nấm ở miệng,vi&ecirc;m ruột kết m&agrave;ng giả, tăng men gan. Thay đổi huyết học, c&oacute; thể tăng bạch cầu ưa eosin. Tăng ur&ecirc; &amp; creatinin huyết. Bệnh n&atilde;o. &ETH;au, vi&ecirc;m tại nơi ti&ecirc;m, vi&ecirc;m tĩnh mạch.</p>\r\n\r\n<p><strong>Tương t&aacute;c thuốc:</strong>&nbsp;Thuốc nh&oacute;m aminoglicosides.</p>\r\n\r\n<p><strong>Nh&agrave; sản xuất: Balkanpharma- Razgrad AD.</strong></p>', 0.00, 1, '2018-05-01 04:48:41', '2018-05-01 04:48:41', 0),
(5, 'ELOMET', 3, 35000.00, 'r2bOpQtJvOelomet-cream.png', '<p>Lotion b&ocirc;i ngo&agrave;i da 0,1% Cream 5mg</p>\r\n\r\n<p>Mometasone furoate<br />\r\n<br />\r\nT&aacute;c dụng<br />\r\nMometasone furoate l&agrave; một corticosteroid c&oacute; đặc t&iacute;nh kh&aacute;ng vi&ecirc;m, chống ngứa v&agrave; co mạch.<br />\r\n<br />\r\nChỉ định<br />\r\nThuốc được chỉ định l&agrave;m giảm biểu hiện vi&ecirc;m v&agrave; ngứa trong c&aacute;c bệnh da đ&aacute;p ứng với corticosteroid như bệnh vẩy nến v&agrave; vi&ecirc;m da dị ứng. Dạng lotion của thuốc c&oacute; thể b&ocirc;i được cho c&aacute;c sang thương tr&ecirc;n da đầu.<br />\r\n<br />\r\nThận trọng<br />\r\nNếu c&oacute; k&iacute;ch ứng hay nhạy cảm khi sử dụng Elomet, n&ecirc;n ngưng điều trị v&agrave; thay thế bằng liệu ph&aacute;p th&iacute;ch hợp.<br />\r\n<br />\r\nKhi c&oacute; nhiễm tr&ugrave;ng, n&ecirc;n phối hợp th&ecirc;m với thuốc kh&aacute;ng nấm hay kh&aacute;ng khuẩn th&iacute;ch hợp. Nếu kh&ocirc;ng c&oacute; đ&aacute;p ứng tốt tức th&igrave;, n&ecirc;n ngưng d&ugrave;ng corticosteroid cho đến khi nhiễm tr&ugrave;ng được trị khỏi.<br />\r\n<br />\r\nBất kỳ t&aacute;c dụng ngoại &yacute; n&agrave;o xảy ra khi d&ugrave;ng đường to&agrave;n th&acirc;n, kể cả suy thượng thận, cũng c&oacute; thể xuất hiện với c&aacute;c corticosteroid d&ugrave;ng tại chỗ, đặc biệt ở trẻ em v&agrave; trẻ sơ sinh. Sự hấp thu to&agrave;n th&acirc;n của corticosteroid d&ugrave;ng tại chỗ sẽ gia tăng nếu điều trị tr&ecirc;n một diện t&iacute;ch cơ thể rộng hay băng k&iacute;n sau khi b&ocirc;i thuốc. N&ecirc;n thận trọng trong những trường hợp n&agrave;y hay khi d&ugrave;ng thuốc l&acirc;u ng&agrave;y, đặc biệt ở bệnh nh&acirc;n nhi. Bệnh nh&acirc;n nhi c&oacute; thể biểu hiện khả năng nhạy cảm cao hơn với sự suy yếu trục hạ đồi - tuyến y&ecirc;n - thượng thận v&agrave; hội chứng Cushing hơn người trưởng th&agrave;nh do tỷ lệ giữa diện t&iacute;ch bề mặt da lớn hơn so với trọng lượng cơ thể. N&ecirc;n giới hạn sử dụng corticosteroid tại chỗ cho trẻ em ở liều thấp nhất m&agrave; vẫn đảm bảo hiệu quả điều trị. Điều trị d&agrave;i hạn với corticosteroid c&oacute; thể l&agrave;m ảnh hưởng đến sự tăng trưởng v&agrave; ph&aacute;t triển của trẻ em.<br />\r\n<br />\r\nKh&ocirc;ng d&ugrave;ng Elomet trong nh&atilde;n khoa.<br />\r\n<br />\r\nC&oacute; thai v&agrave; cho con b&uacute;<br />\r\n<br />\r\nT&iacute;nh an to&agrave;n Elomet khi d&ugrave;ng cho phụ nữ c&oacute; thai chưa được x&aacute;c định. Do đ&oacute;, chỉ d&ugrave;ng corticosteroid tại chỗ trong thai kỳ khi lợi &iacute;ch mong đợi cao hơn nguy cơ c&oacute; thể xảy ra cho thai nhi. Kh&ocirc;ng n&ecirc;n sử dụng một lượng lớn hay d&ugrave;ng k&eacute;o d&agrave;i c&aacute;c thuốc thuộc nh&oacute;m n&agrave;y cho phụ nữ đang mang thai.<br />\r\n<br />\r\nHiện kh&ocirc;ng biết được l&agrave; lượng corticosteroid d&ugrave;ng tại chỗ được hấp thu v&agrave;o m&aacute;u đủ để c&oacute; thể t&igrave;m thấy trong sữa mẹ hay kh&ocirc;ng. C&aacute;c corticosteroid d&ugrave;ng to&agrave;n th&acirc;n được b&agrave;i tiết qua sữa mẹ với một lượng rất nhỏ kh&ocirc;ng c&oacute; khả năng g&acirc;y ảnh hưởng bất lợi cho trẻ. Tuy nhi&ecirc;n, khi quyết định tiếp tục d&ugrave;ng Elomet hay ngưng thuốc n&ecirc;n lưu &yacute; đến tầm quan trọng của thuốc với b&agrave; mẹ.<br />\r\n<br />\r\nT&aacute;c dụng phụ<br />\r\n<br />\r\nHiếm khi c&oacute; b&aacute;o c&aacute;o về t&aacute;c dụng ngoại &yacute; của dạng lotion Elomet gồm r&aacute;t bỏng, vi&ecirc;m nang, phản ứng dạng vi&ecirc;m nang b&atilde;, ngứa ng&aacute;y v&agrave; c&aacute;c dấu hiệu của teo da. T&aacute;c dụng ngoại &yacute; được b&aacute;o c&aacute;o với tỷ lệ &lt; 1% bệnh nh&acirc;n được điều trị bằng lotion Elomet bao gồm sần, mụn mủ v&agrave; nhức nhối. Hiếm khi c&oacute; b&aacute;o c&aacute;o về t&aacute;c dụng ngoại &yacute; của dạng kem Elomet gồm dị cảm, ngứa ng&aacute;y v&agrave; c&aacute;c dấu hiệu quả teo da. T&aacute;c dụng ngoại &yacute; được b&aacute;o c&aacute;o với tỷ lệ &lt; 1% bệnh nh&acirc;n được điều trị bằng kem Elomet bao gồm &aacute;p-xe, r&aacute;t bỏng, bệnh nặng l&ecirc;n, kh&ocirc; da, ban đỏ, nhọt v&agrave; mụn mủ. Hiếm khi c&oacute; b&aacute;o c&aacute;o về t&aacute;c dụng ngoại &yacute; của dạng thuốc mỡ Elomet gồm r&aacute;t bỏng, ngứa ng&aacute;y, đau nh&oacute;i v&agrave; / hay nhức nhối v&agrave; c&aacute;c dấu hiệu của teo da. T&aacute;c dụng ngoại &yacute; được b&aacute;o c&aacute;o với tỷ lệ &lt; 1% bệnh nh&acirc;n với thuốc mỡ Elomet bao gồm dị ứng tăng th&ecirc;m, vi&ecirc;m da, ban đỏ, nhọt, tăng k&iacute;ch thước sang thương, buồn n&ocirc;n (1 bệnh nh&acirc;n) v&agrave; huyết trắng (1 bệnh nh&acirc;n). C&aacute;c t&aacute;c dụng ngoại &yacute; được b&aacute;o c&aacute;o kh&ocirc;ng thường xuy&ecirc;n xảy ra khi d&ugrave;ng c&aacute;c thuốc corticosteroid tại chỗ kh&aacute;c như thuoc: K&iacute;ch ứng, rậm l&ocirc;ng, giảm sắc tố, vi&ecirc;m da quanh miệng, vi&ecirc;m da tiếp x&uacute;c dị ứng, bong da, nhiễm khuẩn thứ ph&aacute;t, v&acirc;n da v&agrave; ban hạt k&ecirc;.<br />\r\n<br />\r\nLiều lượng<br />\r\nN&ecirc;n b&ocirc;i một lớp mỏng kem hay thuốc mỡ 0,1% l&ecirc;n v&ugrave;ng da bị nhiễm mỗi ng&agrave;y một lần.<br />\r\n<br />\r\nBảo quản<br />\r\nBảo quản ở nhiệt độ từ 20C đến 30C.</p>', 10000.00, 1, '2018-05-01 04:49:43', '2018-05-01 04:49:43', 0),
(6, 'A DERMA EXOMEGA', 2, 550000.00, 'E8bXmbdPkIVSX_AnPhuong_02.jpg', '<p><strong>Kem b&ocirc;i ngo&agrave;i da thuoc:&nbsp;</strong>tu&yacute;p 200 ml</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Chiết xuất yến mạch Rhealba v&agrave; acid b&eacute;o thiết yếu Omega 6 từ c&acirc;y Anh thảo đ&ecirc;m &nbsp;3,6 %</p>\r\n\r\n<p>Vitamin E&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0,5 %</p>\r\n\r\n<p>Glycerin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5 %</p>\r\n\r\n<p>T&aacute; dược: Dầu parafin, PEG-12, cyclomethicon, glyceryl stearat, PEG-100 stearat, myreth-3 myristate, polyacrylamide, acid benzoic, chlorphenesin, laureth-7, phenoxyethanol, triethanolamine, trinatri EDTA.&nbsp;</p>\r\n\r\n<p><strong>Chỉ định</strong></p>\r\n\r\n<p>Điều trị bổ sung v&agrave; hỗ trợ cho da bị ch&agrave;m, da dị ứng, mẫn cảm, vi&ecirc;m da thể tạng. L&agrave;m dịu, l&agrave;m ẩm da, giảm vi&ecirc;m v&agrave; giảm ngứa, đem lại sự thoải m&aacute;i v&agrave; mềm mại cho da.</p>\r\n\r\n<p><strong>Liều lượng v&agrave; c&aacute;ch d&ugrave;ng</strong></p>\r\n\r\n<p>Thoa kem 2 lần/ng&agrave;y l&ecirc;n da mặt v&agrave; to&agrave;n th&acirc;n, xoa nhe cho kem thấm đều. Tr&aacute;nh d&ugrave;ng tr&ecirc;n vết vi&ecirc;m bị ướt.</p>\r\n\r\n<p><strong>Bảo quản</strong></p>\r\n\r\n<p>Ở nhiệt độ b&igrave;nh thường.</p>', 1000.00, 1, '2018-05-01 04:50:34', '2018-05-24 15:58:55', 0),
(7, 'LIBRAX 5MG/ 2.5MG', 2, 320000.00, '25WotFVaYmlibrax_1.jpg', '<p>Thuốc giảm đau vi&ecirc;m lo&eacute;t dạ d&agrave;y t&aacute; tr&agrave;ng, tăng tiết &amp; co thắt ống ti&ecirc;u h&oacute;a, rối loạn ti&ecirc;u h&oacute;a do thần kinh, rối loạn vận động b&agrave;i tiết mật<br />\r\nTh&agrave;nh phần thuoc: Clidinium Br 2.5 mg, Chlordiazepoxide 5 mg.<br />\r\nĐ&oacute;ng g&oacute;i: Hộp 100 vi&ecirc;n<br />\r\nChỉ định:&nbsp;<br />\r\nGiảm đau vi&ecirc;m lo&eacute;t dạ d&agrave;y t&aacute; tr&agrave;ng, tăng tiết &amp; co thắt ống ti&ecirc;u h&oacute;a, rối loạn ti&ecirc;u h&oacute;a do thần kinh, rối loạn vận động b&agrave;i tiết mật, h/c đại tr&agrave;ng k&iacute;ch th&iacute;ch hoặc co thắt vi&ecirc;m đại tr&agrave;ng, ti&ecirc;u chảy rối loạn vận động &amp; co thắt ni&ecirc;u quản, b&agrave;ng quang k&iacute;ch th&iacute;ch, đ&aacute;i dầm th&ocirc;ng kinh<br />\r\nLiều d&ugrave;ng: 2-4 vi&ecirc;n/ng&agrave;y, nuốt với &iacute;t nước, uống trong khi ăn, khi đi ngủ hay khi c&oacute; cơn đau. Giảm liều dần để ngưng thuốc. D&ugrave;ng ngắn hạn, tối đa 8-12 tuần<br />\r\nChống chỉ định:&nbsp;<br />\r\nGlaucom g&oacute;c đ&oacute;ng. B&iacute; tiểu do ph&igrave; đại tuyến tiền liệt. Qu&aacute; mẫn với benzodiazepine. Suy h&ocirc; hấp nặng. Trẻ &lt; 6 t. Hội chứng ngưng thở khi ngủ. Suy gan nặng. Phụ nữ c&oacute; thai &amp; cho con b&uacute;.<br />\r\nThận trọng:&nbsp;<br />\r\nPh&igrave; đại tuyến tiền liệt, suy thận &amp;/hay suy gan, suy mạch v&agrave;nh, loạn nhịp, tăng năng gi&aacute;p, vi&ecirc;m phế quản m&atilde;n, tắc ruột liệt, mất trương lực đường ti&ecirc;u h&oacute;a, ph&igrave;nh đại tr&agrave;ng do nhiễm độc. Bệnh t&acirc;m thần. Nguy cơ lệ thuộc thuốc.<br />\r\nPhản ứng c&oacute; hại: Kh&ocirc; miệng, qu&aacute;nh đ&agrave;m, giảm tiết nước mắt, nhịp nhanh, hồi hộp, t&aacute;o b&oacute;n, b&iacute; tiểu, k&iacute;ch động, l&uacute; lẫn. Mệt mỏi, loạng choạng, nhược cơ.<br />\r\nTương t&aacute;c thuốc: Thức uống c&oacute; cồn, cimetidine, atropine, c&aacute;c thuốc ức chế TKTW, clozapine.</p>', 0.00, 1, '2018-05-01 04:51:34', '2018-05-01 04:51:34', 0),
(8, 'Nexium 40mg', 3, 176000.00, 'ZB2TEYkuabnexium_40mg.jpg', '<p><strong>BỘT PHA TI&Ecirc;M NEXIUM 40MG - thuốc kh&aacute;ng acid, chống tr&agrave;o ngược v&agrave; chống lo&eacute;t</strong></p>\r\n\r\n<p><strong>Th&agrave;nh phần thuoc:&nbsp;</strong>Esomeprazole.</p>\r\n\r\n<p><strong>Đ&oacute;ng g&oacute;i:</strong>&nbsp;1 lọ/hộp</p>\r\n\r\n<p><strong>Chỉ định:</strong>&nbsp;xem phần Liều d&ugrave;ng</p>\r\n\r\n<p><strong>Liều d&ugrave;ng:</strong>&nbsp;<br />\r\nKh&aacute;ng tiết dịch vị khi liệu ph&aacute;p uống kh&ocirc;ng th&iacute;ch hợp: 20-40 mg, 1 lần/ng&agrave;y. Vi&ecirc;m thực quản tr&agrave;o ngược: 40 mg, 1 lần/ng&agrave;y. Triệu chứng bệnh tr&agrave;o ngược: 20 mg, 1 lần/ng&agrave;y. Lo&eacute;t dạ d&agrave;y do d&ugrave;ng NSAID: 20 mg, 1 lần/ng&agrave;y. Dự ph&ograve;ng lo&eacute;t dạ d&agrave;y &amp; t&aacute; tr&agrave;ng do d&ugrave;ng NSAID ở bệnh nh&acirc;n c&oacute; nguy cơ: 20 mg, 1 lần/ng&agrave;y. Ph&ograve;ng t&aacute;i xuất huyết do lo&eacute;t dạ d&agrave;y hay lo&eacute;t t&aacute; tr&agrave;ng: Sau điều trị nội soi, truyền liều cao 80 mg trong khoảng 30 ph&uacute;t, tiếp theo truyền tĩnh mạch li&ecirc;n tục 8 mg/giờ trong 3 ng&agrave;y (72 giờ). Thời gian điều trị qua đường tĩnh mạch thường ngắn &amp; n&ecirc;n chuyển sang đường uống ngay khi c&oacute; thể được. Trẻ em &amp; trẻ vị th&agrave;nh ni&ecirc;n 1-18t.: Kh&aacute;ng tiết dịch vị khi liệu ph&aacute;p uống kh&ocirc;ng th&iacute;ch hợp. Điều trị vi&ecirc;m xước thực quản do tr&agrave;o ngược: 1-11t.: c&acirc;n nặng &lt; 20kg: 10 mg 1 lần mỗi ng&agrave;y, c&acirc;n nặng &ge; 20kg: 10 mg hoặc 20 mg 1 lần mỗi ng&agrave;y; 12-18t.: 40 mg 1 lần mỗi ng&agrave;y. Điều trị triệu chứng của GERD: 1-11t.: 10 mg 1 lần mỗi ng&agrave;y; 12-18t.: 20 mg 1 lần mỗi ng&agrave;y. Người cao tuổi, người suy thận, suy gan nhẹ đến trung b&igrave;nh: kh&ocirc;ng chỉnh liều. Người suy gan nặng: GERD: tối đa 20 mg/ng&agrave;y, lo&eacute;t xuất huyết: khởi đầu truyền liều cao 80 mg, tiếp theo truyền tĩnh mạch li&ecirc;n tục 4 mg/giờ trong 71.5 giờ.</p>\r\n\r\n<p><strong>Chống chỉ định:</strong>&nbsp;Tiền sử qu&aacute; mẫn với esomeprazole hoặc nh&oacute;m benzimidazoles hoặc th&agrave;nh phần thuốc. Kh&ocirc;ng n&ecirc;n d&ugrave;ng đồng thời với nelfinavir.</p>\r\n\r\n<p><strong>Thận trọng:</strong>&nbsp;<br />\r\nN&ecirc;n loại trừ khả năng &aacute;c t&iacute;nh trước khi d&ugrave;ng thuốc. Phối hợp với atazanavir, clopidogel. Tạm ngừng điều trị bằng esomeprazole &iacute;t nhất 5 ng&agrave;y trước khi định lượng CgA. Khi d&ugrave;ng thuốc c&oacute; thể l&agrave;m tăng nhẹ nguy cơ nhiễm khuẩn đường ti&ecirc;u h&oacute;a do Salmonella v&agrave; Campylobacter. Khi d&ugrave;ng c&aacute;c thuốc chuyển h&oacute;a qua CYP2C19. Phụ nữ c&oacute; thai: thận trọng. Phụ nữ cho con b&uacute;: kh&ocirc;ng n&ecirc;n d&ugrave;ng.</p>\r\n\r\n<p><strong>Phản ứng c&oacute; hại:</strong>&nbsp;<br />\r\nNhức đầu, đau bụng, t&aacute;o b&oacute;n, ti&ecirc;u chảy, đầy bụng, buồn n&ocirc;n/n&ocirc;n, phản ứng tại chỗ ti&ecirc;m/ti&ecirc;m truyền. &Iacute;t gặp: ph&ugrave; ngoại bi&ecirc;n, mất ngủ, cho&aacute;ng v&aacute;ng, dị cảm, ngủ g&agrave;, ch&oacute;ng mặt, kh&ocirc; miệng, tăng men gan, vi&ecirc;m da, ngứa, nổi mẩn, mề đay. Hiếm gặp: giảm bạch cầu, giảm tiểu cầu, phản ứng qu&aacute; mẫn, k&iacute;ch động, l&uacute; lẫn, trầm cảm, rối loạn vị gi&aacute;c, nh&igrave;n mờ, co thắt phế quản, vi&ecirc;m miệng, nhiễm Candida đường ti&ecirc;u h&oacute;a, vi&ecirc;m gan c&oacute; hoặc kh&ocirc;ng v&agrave;ng da, h&oacute;i đầu, nhạy cảm với &aacute;nh s&aacute;ng, đau khớp, đau cơ, kh&oacute; ở, tăng tiết mồ h&ocirc;i. Rất hiếm gặp: mất bạch cầu hạt, giảm to&agrave;n thể huyết cầu, giảm magnesi huyết, n&oacute;ng nảy, ảo gi&aacute;c, suy gan, bệnh n&atilde;o ở bệnh nh&acirc;n đ&atilde; c&oacute; bệnh gan, hồng ban đa dạng, hội chứng Stevens-Johnson, hoại tử biểu b&igrave; g&acirc;y độc, yếu cơ, vi&ecirc;m thận kẽ, nữ h&oacute;a tuyến v&uacute;.</p>\r\n\r\n<p><strong>Tương t&aacute;c thuốc:</strong>&nbsp;<br />\r\nKetoconazole, itraconazole, digoxin, nelfinavir, atazanavir, atazanavir+rinotavir, saquinavir+rinotavir, diazepam, citalopram, imipramine, clomipramine, phenytoin, voriconazole, warfarin v&agrave; dẫn xuất kh&aacute;c của coumarin, cisapride, clopidogrel, clarithromycin, rifampicin, St. John&#39;s. Thuốc hấp thu phụ thuộc pH, thuốc chuyển h&oacute;a qua men CYP2C19.</p>', 0.00, 1, '2018-05-01 04:52:16', '2018-05-24 16:19:12', 1),
(9, 'Fudteno', 2, 770000.00, '1FYnw63PRMfudteno_1.jpg', '<p>C&ocirc;ng thức thuoc: Mỗi vi&ecirc;n chứa&nbsp;Tenofovir disoproxil fumarat 30mg</p>\r\n\r\n<p>T&aacute; dược: &nbsp;Lactose, Povidon, Primellose, Magnesi stearat, Hydroxypropyl methylcellulose, Polyethylen glycol</p>\r\n\r\n<p>Tr&igrave;nh b&agrave;y:&nbsp;Vỉ 10 vi&ecirc;n, hộp 3 vỉ.</p>\r\n\r\n<p>Dược động học: Dược động học của Tenofovir dissoproxil fumarat được nghi&ecirc;n cứu tr&ecirc;n nh&oacute;m người t&igrave;nh nguyện vi&ecirc;n khỏe mạnh v&agrave; bệnh nh&acirc;n nhiễm HIV &ndash; 1. Dược động học của Tenofovir giống nhau ở những nh&oacute;m người n&agrave;y.</p>\r\n\r\n<p>Hấp thu:<br />\r\nTeonfovir disoproxil fumarat l&agrave; một dạng diester tan trong nước của Tenofovir.<br />\r\nSinh khả dụng đường uống khoảng 25%.Ở người nhiễm HIV &ndash; 1, sau khi uống liều Tenofovir disoproxil fumarat 300mg, nồng độ tối đa trong huyết tương của Tenofovir (Cmax) đạt được sau 1,0 + 0,4 giờ. Nồng độ tối ta trong huyết tương (Cmax), diện t&iacute;ch dưới đường cong ( AUC) của Tenofovir lần lượt l&agrave; 296 + 685&nbsp;<a href=\"http://ng.hr/ml\">ng.hr/ml</a>. Thức ăn c&oacute; ảnh hưởng đến Cmax của Tenofovir khoảng 1 giờ.</p>\r\n\r\n<p>Chuyển h&oacute;a v&agrave; thải trừ:<br />\r\nSau khi ti&ecirc;m tĩnh mạch tenofovir, khoảng 70 &ndash; 80 % liều d&ugrave;ng được t&aacute;i hấp thu từ cực niệu v&agrave;o huyết tương dưới dạng kh&ocirc;ng đổi tenofovir trong v&ograve;ng 72 giờ. Sau khi uống liều đơn th&ocirc;ng thường, nửa đồi thải trừ của Tenofovir khoảng 17 giờ. Tenofovir được b&agrave;i tiết qua thận nhờ sụ kết hợp của lọc cầu thận v&agrave; b&agrave;i tiết chủ động qua ống thận.</p>\r\n\r\n<p>Dược lực học:<br />\r\nTenofovir disoproxil fumarat l&agrave; một chất tượng tụ acyclic nucleoside phosphonatediester của adenosine monophosphat. Tenofovir disoproxil fumarat thủy ph&acirc;n gốc diester tạo th&agrave;nh tenofovir. Sau đ&oacute;, tenofovir được c&aacute;c enzyme của tế b&agrave;o biến đổi th&agrave;nh Tenofovir diphosphat. Tenofovir diphosphat ức chế hoạt t&iacute;nh của HIV &ndash; 1 bằng c&aacute;ch cạnh tranh li&ecirc;n kết trực tiếp với chất nền tự nhi&ecirc;n doexyadenosin 5&rsquo; &ndash; triphosphat, v&agrave; sau đ&oacute;, s&aacute;t nhập v&agrave;o AND của virus g&acirc;y kết th&uacute;c chuỗi AND. Tenofovir diphosphat ức chế polymerase AND a, b v&agrave; polymerase AND mitochondrial c</p>\r\n\r\n<p>Chỉ định:&nbsp;Thuốc được chỉ định cho người bệnh vi&ecirc;m gan B v&agrave; nhiễm HIV.</p>\r\n\r\n<p>Chống chỉ định:<br />\r\nTrẻ em dưới 18 tuổi.<br />\r\nBệnh nh&acirc;n mẫn cảm với c&aacute;c th&agrave;nh phần của thuốc.<br />\r\nBệnh thận nặng.<br />\r\nBệnh nh&acirc;n c&oacute; bạch cầu đa nh&acirc;n trung t&iacute;nh thấp bất thường (&lt; 0,75 x 109/l&iacute;t) hay nồng độ hemoglobin bất thường (&lt; 75g/l&iacute;t)<br />\r\nLiều lượng v&agrave; c&aacute;ch d&ugrave;ng:<br />\r\nUống 1 vi&ecirc;n/ng&agrave;y<br />\r\nUống thuốc trong bữa ăn hoặc khi ăn nhẹ<br />\r\nCơ thể hấp thu thuốc tốt nhất khi uống thuốc l&uacute;c no.<br />\r\nKhi uống thuốc FUDTENO ăn thức ăn c&oacute; nhiều chất b&eacute;o để tăng khả năng hấp thụ thuốc</p>\r\n\r\n<p>T&aacute;c dụng phụ:<br />\r\nC&aacute;c t&aacute;c dụng phụ thường gặp: ỉa chảy, đau bụng, n&ocirc;n, ch&aacute;n ăn.C&aacute;c t&aacute;c dụng phụ sẽ hết sau v&agrave;i ng&agrave;y hoặc v&agrave;i tuần. Kh&ocirc;ng được tụ &yacute; giảm số vi&ecirc;n thuốc hoặc dừng uống thuốc. C&aacute;c t&aacute;c dụng phụ nghi&ecirc;m trọng ( hiếm gặp, nhưng nếu gặp sẽ ảnh hưởng rất xấu đến to&agrave;n than, phải đến ph&ograve;ng kh&aacute;m hoặc bệnh viện ngay)<br />\r\nTh&ocirc;ng b&aacute;o cho b&aacute;c sĩ những t&aacute;c dụng kh&ocirc;ng mong muốn gặp phải khi sử dụng thuốc</p>\r\n\r\n<p>Thận trong khi d&ugrave;ng:<br />\r\nĐể thuốc c&oacute; c&ocirc;ng hiệu, người nhiễm HIV cần phải lu&ocirc;n duy tr&igrave; một nồng độ thuốc cao trong m&aacute;u, tức l&agrave; phải uống thuốc thường xuy&ecirc;n, nếu v&igrave; l&yacute; do n&agrave;o đ&oacute; nồng độ thuốc giảm xuống thấp ( do uống thuốc kh&ocirc;ng đều hoặc chữa trị nửa vời) sẽ tạo điều kiện cho việc sản sinh những virus kh&aacute;ng thuốc. FUDTENO kh&ocirc;ng thể ti&ecirc;u diệt được HIV m&agrave; chỉ ngăn chặn sự ph&aacute;t triển của ch&uacute;ng, do vậy, bệnh nh&acirc;n cần uống thuốc li&ecirc;n tục suốt đời.Đối với tất cả bệnh nh&acirc;n, n&ecirc;n thận trọng khi d&ugrave;ng FUDTENO.</p>\r\n\r\n<p>Tương t&aacute;c thuốc :<br />\r\nCần kiểm so&aacute;t chức năng thận khi d&ugrave;ng FUDTENO với ganciclovir, valganciclovir. Tương t&aacute;c thuốc kh&ocirc;ng đ&aacute;ng kể với Methadone.<br />\r\nBảo quản : Nơi kh&ocirc; m&aacute;t (dưới 25&deg;C), tr&aacute;nh &aacute;nh s&aacute;ng.<br />\r\nHạn d&ugrave;ng: 36 th&aacute;ng kể từ ng&agrave;y sản xuất.</p>', 0.00, 1, '2018-05-01 04:53:20', '2018-05-01 04:53:20', 0),
(10, 'Potenciator', 2, 160000.00, 'Vo8IAMuindpotenciator.jpg', '<p>Hộp 20 ống &nbsp;- thuốc bổ gan d&agrave;nh cho bệnh gan A, B, C</p>\r\n\r\n<p>Th&agrave;nh phần thuoc: Mỗi ống 10mL: Arginine aspartate 5g.<br />\r\n- Chỉ định : Ngăn ngừa t&igrave;nh trạng thiếu hụt acid amin g&acirc;y ra bởi chế độ ăn thiếu protein do ăn ki&ecirc;ng, ăn kh&ocirc;ng c&oacute; cảm gi&aacute;c ngon miệng, thời kỳ dưỡng bệnh,tăng cường sinh lực.<br />\r\n- Liều d&ugrave;ng :</p>\r\n\r\n<p>Người lớn: Liều th&ocirc;ng thường 1-2 ống POTENCIATOR mỗi ng&agrave;y.<br />\r\nTrẻ em: Liều khuyến c&aacute;o l&agrave; 1 ống mỗi ng&agrave;y.<br />\r\nN&ecirc;n h&ograve;a dung dịch thuốc trong ống với một &iacute;t nước hay nước hoa quả v&agrave; uống sau những bữa ăn ch&iacute;nh trong ng&agrave;y.</p>\r\n\r\n<p>Chỉ dẫn c&aacute;ch d&ugrave;ng:<br />\r\n+ T&aacute;ch ống ra.<br />\r\n+ X&eacute; tai tr&ecirc;n đầu ống thuốc bằng c&aacute;ch vặn xoắn.<br />\r\n+ Sau khi quay ống thuốc xuống, b&oacute;p v&agrave;o ống để đổ thuốc v&agrave;o trong cốc.</p>\r\n\r\n<p>Thận trọng:<br />\r\nBệnh nh&acirc;n tiểu đường, kh&ocirc;ng dung nạp fructose di truyền (kh&ocirc;ng n&ecirc;n d&ugrave;ng), đang chế độ ăn hạn chế kali, c&oacute; thai, cho con b&uacute; (kh&ocirc;ng d&ugrave;ng). Thuốc chứa sorbitol c&oacute; thể g&acirc;y rối loạn ti&ecirc;u h&oacute;a. Thuốc chứa arginin aspartate c&oacute; thể l&agrave; nguy&ecirc;n nh&acirc;n g&acirc;y b&iacute; tiểu một số trường hợp.</p>', 0.00, 1, '2018-05-01 04:54:07', '2018-05-01 04:54:07', 0),
(11, 'LIVERTIS - DANAPHA', 2, 215000.00, '2sf5Q7tryKlivertis.jpg', '<p>Th&agrave;nh phần thuoc: Biphenyl dimethyl dicarboxylat.......25mg&nbsp;<br />\r\nT&aacute; dược vừa đủ một vi&ecirc;n.</p>\r\n\r\n<p>Chỉ định: Thuốc được d&ugrave;ng trong c&aacute;c trường hợp: vi&ecirc;m gan do si&ecirc;u vi, vi&ecirc;m gan do rượu, vi&ecirc;m gan do d&ugrave;ng thuốc, gan nhiễm mỡ, rối loạn chức năng gan.<br />\r\nChống chỉ định:</p>\r\n\r\n<p>- Bệnh nh&acirc;n dị ứng với th&agrave;nh phần của thuốc.</p>\r\n\r\n<p>C&aacute;ch d&ugrave;ng: D&ugrave;ng theo sự chỉ định của b&aacute;c sĩ hoặc d&ugrave;ng liều trung b&igrave;nh l&agrave;:</p>\r\n\r\n<p>* Người lớn v&agrave; trẻ em tr&ecirc;n 12 tuổi: 1- 2 vi&ecirc;n/ lần x 3 lần/ ng&agrave;y, uống sau bữa ăn.</p>\r\n\r\n<p>* Trẻ em: 2 - 6 tuổi: 1 - 2 vi&ecirc;n /ng&agrave;y.&nbsp;<br />\r\n6 - 12 tuổi: 2 - 3 vi&ecirc;n/ng&agrave;y.<br />\r\nTrẻ em dưới 2 tuổi: Cần tham khảo &yacute; kiến B&aacute;c sĩ.&nbsp;<br />\r\nSau khi men ALT trở về b&igrave;nh thường, n&ecirc;n duy tr&igrave; trị liệu bằng Biphenyl dimethyl dicarboxylate trong v&ograve;ng 6 th&aacute;ng đến 1 năm.</p>\r\n\r\n<p>Quy c&aacute;ch đ&oacute;ng g&oacute;i: Hộp/100 vi&ecirc;n</p>\r\n\r\n<p>Nh&agrave; sản xuất: C&ocirc;ng ty cổ phần dược DANAPHA<br />\r\nBảo quản</p>\r\n\r\n<p>- Thuốc &eacute;p trong vỉ bấm 10 vi&ecirc;n , hộp 10 vỉ c&oacute; k&egrave;m tờ hướng dẫn sử dụng.<br />\r\n- Để thuốc nơi kh&ocirc;, tho&aacute;ng, tr&aacute;nh &aacute;nh s&aacute;ng. ĐỂ XA TẦM TAY TRẺ EM.<br />\r\n- Hạn d&ugrave;ng : 36 th&aacute;ng kể từ ng&agrave;y sản xuất&nbsp;<br />\r\nTi&ecirc;u chuẩn &aacute;p dụng : TCCS</p>\r\n\r\n<p>&nbsp;</p>', 100000.00, 1, '2018-05-01 04:54:53', '2018-05-02 04:05:07', 0),
(12, 'ULTRACET', 3, 260000.00, 'T8DUHydJY4ultracet.jpg', '<p><strong>thuốc ULTRACET điều trị c&aacute;c cơn đau trung b&igrave;nh, nặng</strong></p>\r\n\r\n<p><strong>Th&agrave;nh phần thuoc:&nbsp;</strong>&nbsp;Mỗi vi&ecirc;n: Tramadol HCl 37,5 mg, paracetamol 325 mg.</p>\r\n\r\n<p><strong>Đ&oacute;ng g&oacute;i:</strong>&nbsp;30 vi&ecirc;n/hộp</p>\r\n\r\n<p><strong>Chỉ định:</strong>&nbsp;C&aacute;c cơn đau trung b&igrave;nh-nặng.</p>\r\n\r\n<p><strong>Liều d&ugrave;ng:</strong>&nbsp;<br />\r\nNgười lớn, người gi&agrave; &amp; trẻ &gt; 12t.: tối đa 1-2 vi&ecirc;n mỗi 4-6 giờ, c&oacute; thể đến 8 vi&ecirc;n/ng&agrave;y. Trẻ &lt; 12t.: kh&ocirc;ng khuyến c&aacute;o d&ugrave;ng. Suy thận (ClCr &lt; 30mL/ph&uacute;t): kh&ocirc;ng qu&aacute; 2 vi&ecirc;n trong 12 giờ. Suy gan nặng: kh&ocirc;ng d&ugrave;ng.</p>\r\n\r\n<p><strong>C&aacute;ch d&ugrave;ng:</strong>&nbsp;C&oacute; thể d&ugrave;ng l&uacute;c đ&oacute;i hoặc no.</p>\r\n\r\n<p><strong>Chống chỉ định:</strong>&nbsp;<br />\r\nNhạy cảm với th&agrave;nh phần thuốc/opioid. Ngộ độc cấp do rượu, thuốc ngủ, chất ma t&uacute;y, thuốc giảm đau trung ương, thuốc hướng thần. Phụ nữ c&oacute; thai/cho con b&uacute;.</p>\r\n\r\n<p><strong>Thận trọng:</strong>&nbsp;<br />\r\nĐộng kinh, tiền sử co giật, tổn thương ở đầu, rối loạn chuyển h&oacute;a, cai rượu/thuốc, nhiễm tr&ugrave;ng TKTW. Bệnh nh&acirc;n c&oacute; nguy cơ suy h&ocirc; hấp. Kh&ocirc;ng d&ugrave;ng cho bệnh nh&acirc;n nghiện thuốc phiện, nghiện rượu mạn t&iacute;nh. L&aacute;i xe/vận h&agrave;nh m&aacute;y. Nguy cơ co giật: d&ugrave;ng c&ugrave;ng thuốc chống trầm cảm, thuốc giảm cảm gi&aacute;c th&egrave;m ăn loại SSRI, thuốc chống trầm cảm ba v&ograve;ng, chất ba v&ograve;ng kh&aacute;c (cyclobenzaprine, promethazine) hoặc opioid kh&aacute;c; đang d&ugrave;ng IMAO, thuốc an thần, thuốc l&agrave;m giảm ngưỡng co giật kh&aacute;c, naloxone. Phản ứng tr&ecirc;n da nghi&ecirc;m trọng như hội chứng Steven-Johnson (SJS), hội chứng hoại tử da nhiễm độc (TEN) hay hội chứng Lyell, hội chứng ngoại ban mụn mủ to&agrave;n th&acirc;n cấp t&iacute;nh (AGEP).</p>\r\n\r\n<p><strong>Phản ứng c&oacute; hại:</strong>&nbsp;Buồn n&ocirc;n, hoa mắt, ch&oacute;ng mặt, buồn ngủ.</p>\r\n\r\n<p><strong>Tương t&aacute;c thuốc:</strong>&nbsp;IMAO, carbamazepine, warfarin, fluoxetine, paroxetine, amitriptyline.</p>', 0.00, 1, '2018-05-24 16:08:59', '2018-05-24 16:19:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'minhthuc1997', 1, '$2y$10$.X7ZzQEh4KwXi69cRTvbmuvM4mcheAtUGzlTUB/rIZeLV2qIuntU2', 'ul7UNJn7rYQ6NeVUEKmCxMtoJZwmmJLtpLnzMD6OsriLDxwACxKpbdgmVHJI', '2018-04-16 17:00:00', '2018-04-16 17:00:00'),
(2, 'long02', 2, '$2y$10$nmIw.ZxEeuVpa2MhswOQZuoFCLR7l9UpWBkXz8vco6Pr6GRdYXxQW', NULL, '2018-04-30 00:40:24', '2018-04-30 00:40:24'),
(3, 'long03', 2, '$2y$10$sqUSW/8J7XquwT7nbwIGFe2tFIYqrNpYs65vGGdXnfHZF4V2WBIh.', NULL, '2018-04-30 00:48:32', '2018-04-30 00:48:32'),
(4, 'long04', 2, '$2y$10$rd.uPbAaE4wzVsato8aEaOQxhfp2FXjDXba/plUBrt1sYtU.m5WIO', NULL, '2018-04-30 00:50:43', '2018-04-30 00:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_shop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `id_user`, `name`, `dob`, `phone`, `name_shop`, `address`, `age`, `tax_code`, `created_at`, `updated_at`) VALUES
(1, 2, 'Đặng Duy Long', '1996-01-25 00:00:00', '0988936354', 'Long Medicine', '54 Nguyễn Văn Linh, TP Tuy Hòa, Phú Yên', '1', '0123456789', '2018-04-30 00:40:24', '2018-05-21 17:41:25'),
(2, 3, 'Đặng Long', '1996-01-15 00:00:00', '0988936354', 'long 213', '54 nguyễn văn lnh', '1', '1234567891', '2018-04-30 00:48:32', '2018-04-30 00:48:32'),
(3, 4, 'sdasdasd', '2010-01-01 00:00:00', '3123123123', 'adsdsadad', 'đâsdadasd', '1', '3123', '2018-04-30 00:50:43', '2018-04-30 00:50:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_id_product_foreign` (`id_product`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_category_foreign` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_detail_id_user_foreign` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_detail`
--
ALTER TABLE `admin_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
