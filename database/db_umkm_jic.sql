-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 08:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umkm_jic`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageCtg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `imageCtg`) VALUES
(1, 'catalog/cg9kYbp5d6VAsQH4UNcrUlbVSG78aoxRVuzrbDAw.jpg'),
(2, 'catalog/uTJ82cbqSbx6LaExUZ9pgWBMkhvkF14hT7JwBHGI.jpg'),
(3, 'catalog/RIjTQPn7e8jHtWxVcgGzGZA8B0zg6zKNuyR12mzv.jpg'),
(4, 'catalog/32Sv7Co7hoxKav3GQB5kLMEg30dmg6JOkmeS3qDl.jpg'),
(5, 'catalog/lw6otCngp0c1I3I4vF1uPV9mkLBjPuPPiCRgtmvb.jpg'),
(6, 'catalog/9yuQUMuaOR9pIUdCqRouUggUiq7UeklnxonoddaD.jpg'),
(7, 'catalog/9zk0gpKllov2ElFI5t7W5uBjqAbL2rg75P9CYvwB.jpg'),
(8, 'catalog/uEYzHhWwnFMIJhcASHqvEIr9uVYonqkNkWdm2NrL.jpg'),
(9, 'catalog/U7tYqAV3KVvx94lBVS5ylpkyVORK3isS4aCcaH8z.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_img_1` text NOT NULL,
  `color_img_2` text NOT NULL,
  `color_img_3` text NOT NULL,
  `detail_img_1` varchar(255) DEFAULT NULL,
  `detail_img_2` text NOT NULL,
  `detail_img_3` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `product_id`, `color_img_1`, `color_img_2`, `color_img_3`, `detail_img_1`, `detail_img_2`, `detail_img_3`, `created_at`, `updated_at`) VALUES
(1, 1, 'detail_product/Ng6mSSqWBzDykErzGrYAgOaTZO7D3CCptYebjJge.jpg', 'detail_product/KmvTaO3DPS9W0Jto54nsWMe5UJFs4ZnK6P8HKWlG.jpg', 'detail_product/ENwX1Rs5ZsR21A3x11VHdYfc3L6jPmpf6Mg9LxW5.jpg', 'detail_product/kaQuoifBLH7iGbLiDbKKg54flRTDFDkKdRIyOZib.jpg', 'detail_product/bNzhECzlAVEuA3nI8Jy1sGkAIQSJNVu2D3SRaYQa.jpg', 'detail_product/WuzJewZTe1aH6UWD72eZS7L55xnzYav1JnwzrVZw.jpg', '2024-06-04 11:10:25', '2024-06-04 11:10:25'),
(2, 2, 'detail_product/nZTXWjAGGiT81cOp45lqs4PCa9aMVuQkMPe27zg0.jpg', 'detail_product/QqGJKhrO7cWqcx19LakVHkpZiGkU2DbXmPjrZkZL.jpg', 'detail_product/Cak9ZNLApzIGauaXYWZIbAwnegipci2y7PdbFZew.jpg', 'detail_product/z9FZFAEdgz316IIOlPZRfHOIOSvEhVsWR247knda.jpg', 'detail_product/zdfR3yeeAfG9QrOev2DMUOeSsKrBFf4Dc9wD5GXE.jpg', 'detail_product/Xv7SLmMChExpsap0W7oMBGxpg9rP3lSVUuVN4O2P.jpg', '2024-06-04 11:11:03', '2024-06-04 11:11:03'),
(3, 3, 'detail_product/4MEh45EyL4I3q1Fsqusu1T9aP53jchgj9SkqDxjr.jpg', 'detail_product/JfVwgVDyRxLGt6RlspeELzFEtJtFlSvT3GGdoSqs.jpg', 'detail_product/8lEbgcAGCUUVFyP4xmBtI4eHN2Rv8UO3BnpSBlIg.jpg', 'detail_product/PcK3qPYOnhDQ5hhDe5zjnamWf9r0qaKC3aoWCioO.jpg', 'detail_product/HQ47rukVw5WNLsaCNLkaiWvY6eaZqEFci4QHmCRC.jpg', 'detail_product/aLRo7HeIhvqpTx4lB8NekMgRKV7dMXAf8bWtgi2V.jpg', '2024-06-04 11:11:38', '2024-06-04 11:11:38'),
(4, 4, 'detail_product/WVJpiqbsTGdYxMy7FyZWsQ6sOaio5gIVBmTYggr2.jpg', 'detail_product/Uapy8byujUiDiru9gfn6Vs73X79MZQrE6To6fYZH.jpg', 'detail_product/ZNDoSq2OiRIfclJAy6xsFofSq8gTENWFztEnYGHB.jpg', 'detail_product/IMmGjT1HW6JjNsWB90okb0OEkkV8yAFhdvIXiqI0.jpg', 'detail_product/A9pNVo2q7SaYSeyFUdIk3r2EOH3XdabOlqBe0LqK.jpg', 'detail_product/iggoxY89jbABr9iSi3oCNP3h1bUIA64oBSbIJYcu.jpg', '2024-06-04 11:12:40', '2024-06-04 11:12:40'),
(5, 5, 'detail_product/ZGfmSPZYtgQKGd9CVlI1MC0yJTwxfaB8tzNKEQQJ.jpg', 'detail_product/ejoye9AM6TDtmQBXueySCOOsuw3MS11mFdU7dyAn.jpg', 'detail_product/b1EYvXSQTxEQsXQsff09g89Worv9kEhqLIAmNqr2.jpg', 'detail_product/xOfkd04LTkKz03eLkQbaD2mhG7xsr2stWICNsH2S.jpg', 'detail_product/vc8uSNDmnnmMV3nNaojf5OfJUivMzt5xonP58KYf.jpg', 'detail_product/3uYnUUAzI4RBeHIlPGO7PRjqaIjhBIPNnbtza9eY.jpg', '2024-06-04 11:13:15', '2024-06-04 11:13:15'),
(6, 6, 'detail_product/X2MFRwxIe7EO0VrlRcvG8CURL8nZppxRnLuxKUK3.jpg', 'detail_product/SyqvOeLVZxb2iINRHUU2daZiV9d96YzYHNOGc6wx.jpg', 'detail_product/Uupumh97k7eIZ6ttvD5EeaACLS2rNN0q5i91OEe8.jpg', 'detail_product/8dr8PZTaBTQk8HLpD8tUQPBB8ZWGsUMl7sk4dxRb.jpg', 'detail_product/b54wSedO4GebuJveobiAHcu5fqlqYexJV4YtcWPs.jpg', 'detail_product/7rVEOFyJGjZ5bTMcrHYw3cA1haUcKQceNjGl9bvX.jpg', '2024-06-04 11:14:21', '2024-06-04 11:14:21'),
(7, 7, 'detail_product/7zBx8T3fm76frpuUfuZa8RtVuBqyOoHnw70lwfGs.jpg', 'detail_product/Sb1hq8qDszxSlkVAeKoHET6PpoCV3rsw3SwFRpVq.jpg', 'detail_product/B4UDvnyhZVmYYmotpHIc3exYI1Hjs1mTjGBSmxd3.jpg', 'detail_product/CowmCda2qmvtAJodTmsNBTIkK4lcjKFwR07km57y.jpg', 'detail_product/tjxdUTShYDxIAHRlW7ZmdEqWeu9lopuxvFTUSuNe.jpg', 'detail_product/B572cqIrDaDV6SIqsqvQ3lnmcXSPOsP58d4xleId.jpg', '2024-06-04 11:15:47', '2024-06-04 11:15:47'),
(8, 8, 'detail_product/lDb8yFf1liaZfAtt7GTJqPFOze0Oe7tzcAjywrM2.jpg', 'detail_product/lDhFZLZmcQ1kqg7uY3HaF2Ly9ZgjoZMz5iHj0R1s.jpg', 'detail_product/nECR0NyeH2wEmkYLTBTVhK13rVwvIDZq0B1Qn4Fx.jpg', 'detail_product/B2a79fKQgMBZVpyoTQf8t2gKJ8kubevATUsHhzyl.jpg', 'detail_product/O9n2ezUrHt3TGVRZRFF5CT0N9K1t7rWrUJZyXGVP.jpg', 'detail_product/eppJP0USdbIyDVXQ6D8bwcuEq7Ymv3Wha8HJXgGc.jpg', '2024-06-04 11:17:47', '2024-06-04 11:17:47'),
(9, 9, 'detail_product/HphBoOMhzW0jz0T1GsIcuXQ6zVQykoAt1Fm0xm0k.jpg', 'detail_product/bpbyGrU2IQsHHO7ss1YtSLDEdZJJNIujb88OwBHw.jpg', 'detail_product/WmRo7VZ8cij0qF18ITNnj1IjrT4oAZl21CX6IC3Z.jpg', 'detail_product/6to2kc3aCJYuo9eym91rJ3VRUf8HrvFws2AN7IaO.jpg', 'detail_product/RdzuivWLpH2abCX6ccYEgEVyetTDFVLu08ukhR3V.jpg', 'detail_product/HAjA0w1sUvmIN1kM4bRfDY93ypodp4gRRMixRBQm.jpg', '2024-06-04 11:18:22', '2024-06-04 11:18:22'),
(10, 10, 'detail_product/DbPkoXRTn7VNDmp8mTQEFsPg3vwaJht7fhuisR9r.jpg', 'detail_product/KWgXbXfeOQo9bkjU7EcHE6CJiTLsXcw2JtItMMZ6.jpg', 'detail_product/7QiXV0AE1x82QFlvbKj5DRDoYJpu4TNteYPfDbnh.jpg', 'detail_product/mBM9ow58pkb6pMjkR5pDfZwgLoChCcJ5RQfEOGsP.jpg', 'detail_product/dIu5NpZX6Fs8XswUlnrEKdQZfaCQp2xQ9kxENROe.jpg', 'detail_product/paSEd7w5T3PaUS1O7PuYI7QVC5ZZWviQHSFeyH40.jpg', '2024-06-04 14:22:24', '2024-06-04 14:22:24'),
(11, 11, 'detail_product/Tjam8DXDJs5yTUGa5IJKApDvlbol6o4zl9gw1Z2I.jpg', 'detail_product/c2Y0E62k5fGLm1xPr276MsCnPjtUQi3CpKrzOAYW.jpg', 'detail_product/i75K2PqtPVKwtZuwbNOO5hh847HHOGTTKT0a7vXJ.jpg', 'detail_product/vtvL50Qr7sA7E5XWpcJyS77co2zXzAo58xrHmGka.jpg', 'detail_product/xfzaVeDM3aUK3TbVSRkcxGNX2yQQhJIc7EbTL44B.jpg', 'detail_product/qnHZG0SssSFvcT6SP4tMoeYHYUD627qg6VMrJVB6.jpg', '2024-06-04 14:22:57', '2024-06-04 14:22:57'),
(12, 12, 'detail_product/anAUxHjc2j9PT9kPC4Svv4a36NC0j1cnJ4w9FC0x.jpg', 'detail_product/zmq6tDcGbw8wYeR2zDj3o0y0JK1Unz2jyG1eunrw.jpg', 'detail_product/mc07kfbEcdfIA0Nyh9RbRgbgmteawAJU9WRtfwum.jpg', 'detail_product/qLsEDmT34MEkQJL63TiY3xC0wuvatX1yH66bfoI5.jpg', 'detail_product/CPYTxI1xppM21TiAhuhf2vMaln1TLm4OTIx9OnlA.jpg', 'detail_product/pLxBQJ9xXRdb0tZU7ht8Vfdw73f4NAdW4pmBGWJC.jpg', '2024-06-04 14:23:25', '2024-06-04 14:23:25'),
(13, 13, 'detail_product/64iQ5rF6NAG8cOJpjPjNDpAxTjFx2BRYbFwPnASc.jpg', 'detail_product/3URRRuwJJAp6x7QwvJJvR6LHrG7tJiQLgZeaZJov.jpg', 'detail_product/6Yx8asr35B0PoGEUxL6ZYuunsbVI7wQd5TGFz7Pd.jpg', 'detail_product/dMy6yRiaFFwzPk1XQdxmufFx4f4FJSGWFVNJSoOY.jpg', 'detail_product/wBFmNZgSrDM2GXdWE2DUFvmEf6jBHBtnAFIcwLn7.jpg', 'detail_product/OJ6NcMeA9EGQtlskO08g7kJtWQ2fIpT0WKr0KjDv.jpg', '2024-06-04 14:30:06', '2024-06-04 14:30:06'),
(14, 14, 'detail_product/SUhgmVrjRKmOgfLt501eERdUcSo20Fi8qXesvsgp.jpg', 'detail_product/2sT7Ro6SinK2xQmOzYHEugt0WEkckMWb4q4ycLDK.jpg', 'detail_product/bMnzkgQ7v2U35Ge2kGtJZI9N8nwUSSis5z8wzVWH.jpg', 'detail_product/STvS4JvRlFUHhSiAERsdG4cnt335oYWopYcD0w20.jpg', 'detail_product/poTHQKx7ob1TRYmL0A5Sh0DJLSa8VaVUHzpzUsJj.jpg', 'detail_product/PuTm5vNYbIw3RhGKEzqwIunu9S06ZxY1joUUCZuj.jpg', '2024-06-04 14:30:46', '2024-06-04 14:30:46'),
(15, 15, 'detail_product/cKV24TjT9wN40xVSMoapIcXb31V8ccAjkzrvF02x.jpg', 'detail_product/fDnYeh32MqpFweT3lpYDS63PWieYregETPUCFj17.jpg', 'detail_product/H05ZnWwzcdk0A2YKCAWIGOGEGJKVw2rTsqK6kc2G.jpg', 'detail_product/EbDkV2SIvcGPaWen98G8vauY7INKYyxToM5DMh4A.jpg', 'detail_product/K9KzvMy7JKTrVUxM9M3vPTlkEUjWmFHEaXE2KyNU.jpg', 'detail_product/i1iwjTOsxUTX5jBaVxJinnqUEXwJJD4H9RsP3WcW.jpg', '2024-06-04 14:31:14', '2024-06-04 14:31:14'),
(16, 16, 'detail_product/L9KhjEXsowceWiPzbzEqVESr3XcTKEmGwbhUjHe6.jpg', 'detail_product/qyIIMgABokbXTx2puc9ylTJDdSG5GTpFVSJoKgwl.jpg', 'detail_product/x4oTqCv6VxEQQaAI8WOFZ4mT0mAvfhXUIHsDytTv.jpg', 'detail_product/hlKfOpqAXMyGvaChVZRUAd9Sb8mSulQrCId1WyyI.jpg', 'detail_product/qC2zx1RAYu41ZrsZDw9DATr2VgQeYLWJ381E90kJ.jpg', 'detail_product/i8IjtDh6oJezk3Du4VzXzJAW9Vi2JnO5tSGu9Ubn.jpg', '2024-06-04 14:31:43', '2024-06-04 14:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_23_155210_create_products_table', 2),
(5, '2024_05_23_160249_create_products_table', 3),
(6, '2024_05_23_160438_create_products_table', 4),
(7, '2024_05_27_170148_create_catalogs_table', 5),
(8, '2024_05_27_170855_create_catalogs_table', 6),
(9, '2024_06_03_181914_create_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Alice', '131900', 'product/LcsDgVOSFVhuo258x4rurCFNbJ3WgAqoQrvVEWjH.jpg', 'Alice diambil dari bahasa Jerman yang keindahan. Alice dibuat dari bahan PU Leather (yang tahan air), terdapat magnetic button, Strap yang bisa dilepas pasang, emboss logo pada bagian depan dompet serta terdapat emboss pada bagian resleting dompet. Alice memiliki 2 slot untuk cash, 8 slot untuk kartu dan 1 slot zipper bag. Dompet ini dapat memberikan kesan indah dan elegan bagi para penggunanya.'),
(2, 'Bohemian', '113200', 'product/qzO8YlieLobkbPwmplbtI4HpXxGycZ8aKIbuIsnw.jpg', 'Bohemian memiliki arti nama Seni yang di gambarkan dalam sebuah dompet. Bohemian dibuat dari bahan PU Leather (yang tahan air), dilengkapi dengan magnetic button, emboss pada bagian logo, serta terdapat emboss pada bagian resleting dompet. Bohemian memiliki 5 slot untuk cash, 16 slot untuk kartu dan 1 slot zipper bag. Dompet ini dapat memberikan kesan tegas bagi para penggunanya.'),
(3, 'Daisy', '119900', 'product/cJky6cEdSddzrS1gs3HKV4hvHVB5rmfw623odMh0.jpg', 'Dompet ini adalah bukti bahwa keajaiban sering kali ditemukan dalam hal sederhana. Daisy sendiri terbuat dari bahan PU Leather (yang tahan air) serta terdapat emboss pada logo dan pada bagian resleting dompet, memiliki 2 sekat yang mana sekat utamanya terdapat 2 ruang, di sekat lainnya dilengkapi dengan magnetic button. Di dalam dompet daisy juga terdapat 8 slot untuk menyimpan kartu.'),
(4, 'Irish', '173200', 'product/2FZadzXMGZAjpGSCFtjSpGPCR8ONn9wcfuWi1qrc.jpg', 'Irish diambil dari filsofi pelangi, dapat diringkas sebagai simbol keindahan dan keberagaman. . Irish dibuat dari bahan PU Leather (yang tahan air), terdapat Chain yang unik dan special karena membuat dompet Irish dapat digunakan menjadi 2 type yaitu Sling bag ataupun dompet tanpa tali. Dilengkapi dengan emboss pada bagian resleting dompet dan emboss logo pada bagian depan dompet. Irish memiliki 2 slot untuk cash, 2 main pocket (slot HP) ,8 slot untuk kartu dan 1 slot zipper bag. Warna warni pelangi juga mencerminkan keberagaman manusia dan kesatuan yang dihasilkan dari perbedaan.'),
(5, 'Ivy', '86600', 'product/REhTczWZhCd9NNP4H6GAHx5XWDhlLPKPoBvCQmSH.jpg', 'IVY diambil dari bahasa Yunani yang berarti perhiasan. Dompet ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat emboss pada logo dan dilengkapi dengan magnetic button. Ivy memiliki desain yang elegan dan memiliki 7 slot untuk kartu, 1 slot untuk cash .'),
(6, 'Jasmine', '113200', 'product/umJ91wiXHHBwmwVsbrGYyy9XKQQzgGoshOvh5AqE.jpg', 'Jasmine diambil dari arti nama bunga melati yaitu kemewahan dan keanggunan. Dompet ini dibuat dari bahan PU Leather (yang tahan air), terdapat Logo’s chain yang unik dan jarang ditemui dipasaran, dilengkapi dengan magnetic button, serta terdapat emboss pada bagian resleting dompet. Jasmine memiliki 8 slot untuk kartu, 1 slot cash, dan 1 slot zipper bag.'),
(7, 'Mahen', '93200', 'product/bMZ8sqqjV4h1rhNlZiBORtiPpUr0ncGoofuAD8wn.jpg', 'Mahen diambil dari bahasa Persia yang artinya terbaik. Dompet ini dibuat dari bahan PU Leather (yang tahan air), dilengkapi dengan magnetic button, serta terdapat emboss pada logo dan pada bagian resleting dompet. Mahen memiliki 17 slot untuk kartu, 1 slot cash, dan 1 slot zipper bag.'),
(8, 'Seira', '126600', 'product/0YVL0Sh3I7VG5rek7uqlW6q1yhLl9aYHtNBenUbT.jpg', 'Seira diambil dari bahasa Jepang yang berarti suci dan berkharisma. Seira dibuat dari bahan PU Leather (yang tahan air), terdapat Logo’s chain yang unik dan jarang ditemui dipasaran, dilengkapi dengan magnetic button, serta terdapat emboss pada bagian resleting dompet. Seira memiliki 6 slot untuk cash, 12 slot untuk kartu dan 1 slot zipper bag. Dompet ini dapat memberikan kesan tegas bagi para penggunanya.'),
(9, 'Sora', '73200', 'product/83AEYZ5a84SXtE8WZ20OaBhJSFf9qgH5kLACI1BT.jpg', 'Sora diambil dari bahasa Jepang yaitu langit yang menggambarkan pesona yang glamour sesuai dengan tampilannya. Terbuat dari bahan PU Leather (yang tahan air) serta terdapat emboss pada logo dan pada bagian resleting dompet. Terdapat 4 slot kartu dan 1 slot koin/ cash dengan zipper.'),
(10, 'Adora', '276000', 'product/lzRDrgl1yOVl22U8wARP8cta7TA6j4LUFUNy2Rkc.jpg', 'Adora diambil dari bahasa bahasa Latin yang berarti banyak di sukai. Tas ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat emboss pada logo dan dilengkapi dengan emboss pada zipper. Adora memiliki desain yang elegan dan memiliki 2 mini pocket, 1 zipper pocket dan pada bagian belakang terdapat 1 zipper pocket.'),
(11, 'Aika', '229900', 'product/PwiMScDbXSMcYYxy6CRQxuju9eRwcD2a8zPpX9Au.jpg', 'Aika diambil dari bahasa Yunani yang berarti cinta dan indah. Tas ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat metalic lock berbentuk love dan terdapat emboss logo pada zipper bagian dalam. Aika memiliki desain yang elegan dan terdapat 1 ruang di dalamnya terdapat 1 mini pocket  dan 1 zipper pocket.'),
(12, 'Alina', '215000', 'product/Hzsl62LWu96k2qOrO7ozeYjTZvEbeDcYHoxk5vWh.jpg', 'Alina diambil dari bahasa Arab yang berarti cerah. Tas ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat emboss pada logo dan dilengkapi dengan metal lock. Alina memiliki desain yang elegan dan memiliki . 1 ruang yang di dalmnya terdapat mini pocket dan zipper pocket.'),
(13, 'Chayla', '292000', 'product/5ieNghnK9NXNRDTZevWeQIqIbpw9nNRyfnY5dmQ7.jpg', 'Chalya diambil dari bahasa Yunani yang berarti peri. Tas ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat emboss pada logo dan zipper. Chalya memiliki desain yang elegan dan memiliki 3 ruang tedapat mini pocket dan zipper pocket.'),
(14, 'Ellie', '193000', 'product/W8oZ0kljVm0qoZ9nKTbMtgFX5BRdUaD1tV4cGGWx.jpg', 'Ellie diambil dari bahasa Yunani yang berarti bersinar terang. Tas ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat emboss pada logo dan dilengkapi dengan metal lock. Ellie memiliki desain yang elegan dan memiliki 1 ruang yang di dalamnya terdapat 1 mini pocket dan zipper pocket.'),
(15, 'Hazel', '215000', 'product/8DuL1AH65AHJhn11dPoDQy7zUgCYNFLG0Bc9BMXC.jpg', 'Hazel diambil dari bahasa Inggris yang berarti kelembutan. Tas ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat emboss pada logo dan zipper. hazel memiliki desain yang elegan dan memiliki 1 ruang dan di dalamnya terdapat 1 mini pocket dan 1 zipper pocket.'),
(16, 'Viona', '276000', 'product/Z2exyNt4kBf3UmiX7pAmFmM0QStTIdASwvfyEq9U.jpg', 'Viona diambil dari variasi nama yang berarti murni. Tas ini didesain menggunakan bahan PU Leather (yang tahan air), terdapat emboss pada logo dan zipper. viona memiliki desain yang elegan dan memiliki 1 ruang dan di dalamnya terdapat 1 mini pocket dan zipper pocket.');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2YU1vxrhOQxRG0blqyLxNTe8ICD1PLsEK6hLTb1b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianpkb3J0anBaSW1mU21QS2IxNTBLSlA3SEV0RlJPVExrUXNwSzlGVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718044781);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'caa', 'erclutvian004@gmail.com', NULL, '$2y$12$ktPD6NctmeblN.MC/8ObaOtPSWsmxyeosYa32U80.EAndCN6p/NBu', NULL, '2024-05-05 10:26:50', '2024-05-05 10:26:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
