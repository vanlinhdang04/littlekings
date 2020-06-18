-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2020 lúc 03:29 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `littlekings_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `CatalogID` varchar(10) COLLATE utf8_bin NOT NULL,
  `CatalogName` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`CatalogID`, `CatalogName`) VALUES
('BG', 'Bag'),
('BL', 'Belt & Accessories'),
('WL', 'Wallet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_bin NOT NULL,
  `Email` varchar(100) COLLATE utf8_bin NOT NULL,
  `Subject` varchar(200) COLLATE utf8_bin NOT NULL,
  `Messenger` text COLLATE utf8_bin NOT NULL,
  `Status` int(11) NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`ContactID`, `Name`, `Email`, `Subject`, `Messenger`, `Status`, `Created`) VALUES
(1, 'Nhi', 'nhi@gmail.com', 'Gop y', 'Mong shop co the thanh toan bang the visa', 2, '2020-06-13'),
(2, 'Nam', 'nam@gmail.com', 'thank', 'Sản phẩm rất đẹp cám ơn shop nhiều.', 1, '2020-06-13'),
(3, 'Hoàng', 'hoangvodich@gmail.com', 'thank shop', 'Sản phẩm rất đẹp cám ơn shop nhiều.', 2, '2020-06-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email_notification`
--

CREATE TABLE `email_notification` (
  `ID` int(11) NOT NULL,
  `Email` varchar(200) COLLATE utf8_bin NOT NULL,
  `Status` int(11) NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `email_notification`
--

INSERT INTO `email_notification` (`ID`, `Email`, `Status`, `Created`) VALUES
(1, 'linhlinh@gmail.com', 1, '2020-06-13'),
(2, 'vanvan@gmail.com', 1, '2020-06-13'),
(3, 'nhok2k2@gmail.com', 1, '2020-06-13'),
(4, 'long@gmail.com', 1, '2020-06-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` varchar(50) COLLATE utf8_bin NOT NULL,
  `ProductID` varchar(255) COLLATE utf8_bin NOT NULL,
  `Price` varchar(255) COLLATE utf8_bin NOT NULL,
  `Amount` varchar(100) COLLATE utf8_bin NOT NULL,
  `Total` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `Price`, `Amount`, `Total`) VALUES
('OD_01', '17', '115', '1', '115'),
('OD_02', '18', '50', '1', '50'),
('OD_03', '18', '50', '1', '50'),
('OD_04', '18', '50', '1', '50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(50) COLLATE utf8_bin NOT NULL,
  `UserID` varchar(20) COLLATE utf8_bin NOT NULL,
  `Name` varchar(20) COLLATE utf8_bin NOT NULL,
  `City` varchar(50) COLLATE utf8_bin NOT NULL,
  `CompanyName` varchar(50) COLLATE utf8_bin NOT NULL,
  `Address` varchar(50) COLLATE utf8_bin NOT NULL,
  `Email` varchar(100) COLLATE utf8_bin NOT NULL,
  `Phone` varchar(50) COLLATE utf8_bin NOT NULL,
  `Notes` text COLLATE utf8_bin NOT NULL,
  `Total` varchar(50) COLLATE utf8_bin NOT NULL,
  `Status` varchar(10) COLLATE utf8_bin NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `Name`, `City`, `CompanyName`, `Address`, `Email`, `Phone`, `Notes`, `Total`, `Status`, `Created`) VALUES
('OD_01', '', 'Van Linh', 'Ho Chi Minh', 'đại học Sài Gòn', '273 An Dương Vương, Q.5', 'vanlinhdang1999@gmail.com', '0395482136', 'mua lan dau', '115', '2', '2020-06-15'),
('OD_02', '', 'Van Linh', 'Ho Chi Minh', 'đại học Sài Gòn', '273 An Dương Vương, Q.5', 'vanlinhdang1999@gmail.com', '0395482136', '', '50', '1', '2020-06-15'),
('OD_03', 'UR03', 'Linh', 'Ho Chi Minh', 'đại học Sài Gòn', '273 An Dương Vương, Q.5', 'van@gmail.com', '0395482130', '', '50', '3', '2020-06-15'),
('OD_04', 'UR03', 'Linh', 'Ho Chi Minh', 'đại học Sài Gòn', '273 An Dương Vương, Q.5', 'van@gmail.com', '0395482130', '', '50', '2', '2020-06-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` int(20) NOT NULL,
  `Name` varchar(255) COLLATE utf8_bin NOT NULL,
  `CatalogID` varchar(255) COLLATE utf8_bin NOT NULL,
  `Color` varchar(255) COLLATE utf8_bin NOT NULL,
  `Price` varchar(255) COLLATE utf8_bin NOT NULL,
  `Amount` int(255) NOT NULL,
  `AmountBuy` int(255) NOT NULL,
  `Image` varchar(255) COLLATE utf8_bin NOT NULL,
  `ImageList` varchar(255) COLLATE utf8_bin NOT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Description` varchar(1000) COLLATE utf8_bin NOT NULL,
  `Status` int(10) NOT NULL,
  `Created` date NOT NULL,
  `UpdateDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `Name`, `CatalogID`, `Color`, `Price`, `Amount`, `AmountBuy`, `Image`, `ImageList`, `Discount`, `Description`, `Status`, `Created`, `UpdateDay`) VALUES
(1, 'V1- Buck Brown', 'WL', 'BuckBrown', '65', 0, 0, 'V1BuckBrown.jpg', 'V1BuckBrown_01.jpg', NULL, 'The V1 is a minimalist wallet made with the finest of Wickett and Craig leathers. Handcrafted to fit your minimalist lifestyle and made to last.\r\n</br>\r\nFeatures:</br>  \r\n- Option of Machine Stitched or Hand Stitched with Japanese thread.</br>\r\n- Hand finished dyed edges</br>\r\n- Fair trade made </br>\r\n- 3 card slots which fits up to 2 cards each plus some bills </br>', 1, '2020-05-26', '2020-05-26'),
(2, 'V1 - Buck Brown & Olive', 'WL', 'BuckBrown Olive', '65', 30, 0, 'V1BuckBrownOlive.jpg', 'V1BuckBrownOlive_01.jpg', NULL, 'The V1 is a minimalist wallet made with the finest of Wickett and Craig leathers. Handcrafted to fit your minimalist lifestyle and made to last.\r\n</br>\r\nFeatures:</br>  \r\n- Option of Machine Stitched or Hand Stitched with Japanese thread.</br>\r\n- Hand finished dyed edges</br>\r\n- Fair trade made </br>\r\n- 3 card slots which fits up to 2 cards each plus some bills </br>', 1, '2020-05-26', '2020-05-26'),
(3, 'V1 - Black', 'WL', 'Black', '65', 30, 0, 'V1Black.jpg', 'V1Black_01.jpg', NULL, 'The V1 is a minimalist wallet made with the finest of Wickett and Craig leathers. Handcrafted to fit your minimalist lifestyle and made to last.\r\n</br>\r\nFeatures:</br>  \r\n- Option of Machine Stitched or Hand Stitched with Japanese thread.</br>\r\n- Hand finished dyed edges</br>\r\n- Fair trade made </br>\r\n- 3 card slots which fits up to 2 cards each plus some bills </br>', 1, '2020-05-26', '2020-05-26'),
(4, 'The V2 - Rugged Tan', 'WL', 'RuggedTan', '125', 30, 0, 'V2RuggedTan.jpg', 'V2RuggedTan_01.jpg,,V2RuggedTan_02.jpg,,V2RuggedTan_03.jpg', NULL, 'The V2 wallet is perfect for anyone who has a busy on-the-go lifestyle. It holds multiple cards and bills while still maintaining that minimalist wallet feel. It features 3 interior card slots, 1 folded cash slot, and 2 exterior card slots.\r\n</br>\r\nFeatures: </br>\r\n- 100% handcrafted </br>\r\n- Option for Machine Stitched or Hand Stitched</br>\r\n- Hand burnished edges </br>\r\n- Fair trade made </br>\r\n- 3 interior card slots which hold 2-3 cards each </br>\r\n- 2 exterior card slots which hold 1-2 cards </br>\r\n- 1 interior folded bill slot</br>\r\n- Dimensions when closed: 4.25 inches x 3.75 inches</br>', 1, '2020-05-26', '2020-05-26'),
(5, 'The V2 - Black', 'WL', 'Black', '125', 30, 0, 'V2Black.jpg', 'V2Black_01.jpg,,V2Black_02.jpg,,V2Black_03.jpg', NULL, 'The V2 wallet is perfect for anyone who has a busy on-the-go lifestyle. It holds multiple cards and bills while still maintaining that minimalist wallet feel. It features 3 interior card slots, 1 folded cash slot, and 2 exterior card slots.\r\n</br>\r\nFeatures: </br>\r\n- 100% handcrafted </br>\r\n- Option for Machine Stitched or Hand Stitched</br>\r\n- Hand burnished edges </br>\r\n- Fair trade made </br>\r\n- 3 interior card slots which hold 2-3 cards each </br>\r\n- 2 exterior card slots which hold 1-2 cards </br>\r\n- 1 interior folded bill slot</br>\r\n- Dimensions when closed: 4.25 inches x 3.75 inches</br>', 1, '2020-05-26', '2020-05-26'),
(6, 'The V2 - Olive & Buck Brown', 'WL', 'Olive BuckBrown', '125', 30, 0, 'V2OliveBuckBrown.jpg', 'V2OliveBuckBrown_01.jpg,,V2OliveBuckBrown_02.jpg,,V2OliveBuckBrown_03.jpg', NULL, 'The V2 wallet is perfect for anyone who has a busy on-the-go lifestyle. It holds multiple cards and bills while still maintaining that minimalist wallet feel. It features 3 interior card slots, 1 folded cash slot, and 2 exterior card slots.\r\n</br>\r\nFeatures: </br>\r\n- 100% handcrafted </br>\r\n- Option for Machine Stitched or Hand Stitched</br>\r\n- Hand burnished edges </br>\r\n- Fair trade made </br>\r\n- 3 interior card slots which hold 2-3 cards each </br>\r\n- 2 exterior card slots which hold 1-2 cards </br>\r\n- 1 interior folded bill slot</br>\r\n- Dimensions when closed: 4.25 inches x 3.75 inches</br>', 1, '2020-05-26', '2020-05-26'),
(7, 'The Royal V3 - Rugged Tan', 'WL', 'RuggedTan', '135', 30, 0, 'V3RuggedTan.jpg', 'V3RuggedTan_01.jpg,,V3RuggedTan_02.jpg,,V3RuggedTan_03.jpg', NULL, 'The Royal V3 is a reverse bifold wallet for the minimalist. It is made from 100% full grain leather which has a gorgeous rich pull up. This wallet will last you many years and is handcrafted to ensure maximum quality and durability. \r\n</br>\r\nFeatures:</br> \r\n- 100% handcrafted </br>\r\n- Option of Machine Stitched or Hand Stitched </br>\r\n- Fair trade made </br>\r\n- 4 interior card slots which hold 2 cards each </br>\r\n- 1 exterior bill slots which holds multiple bills</br>\r\n- Dimensions when closed: 4.25 inches x 3.75 inches</br>', 1, '2020-05-26', '2020-05-26'),
(8, 'The Royal V3 - Black', 'WL', 'Black', '135', 28, 0, 'V3Black.jpg', 'V3Black_01.jpg,,V3Black_02.jpg,,V3Black_03.jpg', NULL, 'The Royal V3 is a reverse bifold wallet for the minimalist. It is made from 100% full grain leather which has a gorgeous rich pull up. This wallet will last you many years and is handcrafted to ensure maximum quality and durability. \r\n</br>\r\nFeatures:</br> \r\n- 100% handcrafted </br>\r\n- Option of Machine Stitched or Hand Stitched </br>\r\n- Fair trade made </br>\r\n- 4 interior card slots which hold 2 cards each </br>\r\n- 1 exterior bill slots which holds multiple bills</br>\r\n- Dimensions when closed: 4.25 inches x 3.75 inches</br>', 1, '2020-05-26', '2020-05-26'),
(9, 'The Long Wallet - Olive & Buck Brown', 'WL', 'Olive BuckBrown', '205', 30, 0, 'LongWalletOliveBuckBrown.jpg', 'LongWalletOliveBuckBrown_01.jpg,,LongWalletOliveBuckBrown_02.jpg', NULL, 'The Long Wallet is a unisex leather wallet for the person who carries everything. Whether it’s cash, coins, cards, or receipts, the Long Wallet has got you covered. Made from the finest of vegetable tanned leathers and highest quality hardware, this wallet will age beautifully and only get better with time. Built for life.\r\n</br>\r\nFeatures:</br>\r\n\r\n- 100% handcrafted by a single craftsman </br>\r\n- Made with Wickett & Craig Veg-tanned </br>Harness Leather\r\n- Fairtrade made - Ethnically sourced materials </br>\r\n- 6 Card Pockets (holds 2-3 cards each) </br>\r\n- 3 Large bill/receipt pockets </br>\r\n- 1 Large zippered pocket for coins and other things </br>\r\n- Machine Stitched with bonded nylon thread </br>\r\n- Heavy Duty Brass 7” YKK zipper </br>', 1, '2020-05-26', '2020-05-26'),
(10, 'The Long Waller - Rugged Tan', 'WL', 'RuggedTan', '195', 30, 0, 'LongWalletRuggedTan.jpg', 'LongWalletRuggedTan_01.jpg,,LongWalletRuggedTan_02.jpg,,LongWalletRuggedTan_03.jpg', NULL, 'The Long Wallet is a unisex leather wallet for the person who carries everything. Whether it’s cash, coins, cards, or receipts, the Long Wallet has got you covered. Made from the finest of vegetable tanned leathers and highest quality hardware, this wallet will age beautifully and only get better with time. Built for life.\r\n</br>\r\nFeatures:</br>\r\n\r\n- 100% handcrafted by a single craftsman </br>\r\n- Made with Wickett & Craig Veg-tanned </br>Harness Leather\r\n- Fairtrade made - Ethnically sourced materials </br>\r\n- 6 Card Pockets (holds 2-3 cards each) </br>\r\n- 3 Large bill/receipt pockets </br>\r\n- 1 Large zippered pocket for coins and other things </br>\r\n- Machine Stitched with bonded nylon thread </br>\r\n- Heavy Duty Brass 7” YKK zipper </br>', 1, '2020-05-26', '2020-05-26'),
(11, 'The V2 - Buck Brown', 'WL', 'BuckBrown', '125', 30, 0, 'V2BuckBrown.jpg', 'V2BuckBrown_01.jpg,,V2BuckBrown_02.jpg,,V2BuckBrown_03.jpg', NULL, 'The V2 wallet is perfect for anyone who has a busy on-the-go lifestyle. It holds multiple cards and bills while still maintaining that minimalist wallet feel. It features 3 interior card slots, 1 folded cash slot, and 2 exterior card slots.\r\n</br>\r\nFeatures: </br>\r\n- 100% handcrafted </br>\r\n- Option for Machine Stitched or Hand Stitched</br>\r\n- Hand burnished edges </br>\r\n- Fair trade made </br>\r\n- 3 interior card slots which hold 2-3 cards each </br>\r\n- 2 exterior card slots which hold 1-2 cards </br>\r\n- 1 interior folded bill slot</br>\r\n- Dimensions when closed: 4.25 inches x 3.75 inches</br>', 1, '2020-05-26', '2020-05-26'),
(12, 'Special Edition Royal V1 - Black & Gold', 'WL', 'Black Gold', '125', 29, 0, 'RoyalV1BlackGold.jpg', 'RoyalV1BlackGold_01.jpg,,RoyalV1BlackGold_02.jpg', NULL, 'The Special Edition ROYAL V1 is hand-stitched and handcrafted from the finest of full grain leathers and embossed with Rose Gold foil with our LKG Swing Tag logo. Only 15 of these will be made, so when they are gone - they are gone!\r\n</br>\r\nJoin the Kingdom.</br>\r\n\r\nFeatures:</br>\r\n- Only 15 wallets will be crafted </br>\r\n- Embossed Swing Tag logo is Rose Gold Foil on front and back </br>\r\n- Individual serial numbers (01-15) embossed in Rose Gold Foil on the inside pocket </br>\r\n- Hand stitched with black Japanese thread </br>\r\n- 3 card slots which fits up to 2 cards each plus some bills (Total of 6-7 cards + cash) </br>', 1, '2020-05-26', '2020-05-26'),
(13, 'The Mountain Tote - Tan & Dark Brown', 'BG', 'Tan DarkBrown', '350', 30, 0, 'MountainToteTanDarkBrown.jpg', 'MarketToteOliveRuggedTan.jpg', NULL, 'The Mountain Tote is a rugged thing of beauty which will last you forever! Made from pull up leather it has a unique look when the leather is folded or bent. It is fully handcrafted right from the first cut. It features an inside pocket and a key chain hook so you don\'t loose your keys at the bottom. It\'s perfect for anyone who needs all of her things at their finger tips. It measures 18\" wide, 14\" tall, and 5\" deep at the base.\r\n</br>\r\nFeatures: </br>\r\n- 100% handcrafted </br>\r\n- 18\" wide x 14\" height x 5\" depth at base </br>\r\n- Two tone full grain veg tanned leather </br>\r\n- Interior pocket </br>\r\n- Fair trade made </br>\r\n- Hand Hammered Copper hardware </br>\r\n- Interior key chain hook </br>', 1, '2020-05-26', '2020-05-26'),
(14, 'The Market Tote - Rose Wood', 'BG', 'RoseWood', '265', 30, 0, 'MarketToteRoseWood.jpg', 'MountainToteTanDarkBrown.jpg', NULL, 'The Mountain Tote is a rugged thing of beauty which will last you forever! Made from pull up leather it has a unique look when the leather is folded or bent. It is fully handcrafted right from the first cut. It features an inside pocket and a key chain hook so you don\'t loose your keys at the bottom. It\'s perfect for anyone who needs all of her things at their finger tips. It measures 18\" wide, 14\" tall, and 5\" deep at the base.\r\n</br>\r\nFeatures: </br>\r\n- 100% handcrafted </br>\r\n- 18\" wide x 14\" height x 5\" depth at base </br>\r\n- Two tone full grain veg tanned leather </br>\r\n- Interior pocket </br>\r\n- Fair trade made </br>\r\n- Hand Hammered Copper hardware </br>\r\n- Interior key chain hook </br>', 1, '2020-05-26', '2020-05-26'),
(15, 'The Market Tote - Olive & Rugged Tan', 'BG', 'RuggedTan', '289', 27, 0, 'MarketToteOliveRuggedTan.jpg', 'MarketToteRosewood.jpg', NULL, 'The Mountain Tote is a rugged thing of beauty which will last you forever! Made from pull up leather it has a unique look when the leather is folded or bent. It is fully handcrafted right from the first cut. It features an inside pocket and a key chain hook so you don\'t loose your keys at the bottom. It\'s perfect for anyone who needs all of her things at their finger tips. It measures 18\" wide, 14\" tall, and 5\" deep at the base.\r\n</br>\r\nFeatures: </br>\r\n- 100% handcrafted </br>\r\n- 18\" wide x 14\" height x 5\" depth at base </br>\r\n- Two tone full grain veg tanned leather </br>\r\n- Interior pocket </br>\r\n- Fair trade made </br>\r\n- Hand Hammered Copper hardware </br>\r\n- Interior key chain hook </br>', 1, '2020-05-26', '2020-05-26'),
(16, 'Limited Edition Uncharted Satchel - English Tan', 'BG', 'BuckBrown', '899', 29, 0, 'UnchartedSatchel.jpg', 'UnchartedSatchel.jpg', NULL, 'The Uncharted Satchel is a rugged thing of beauty which will last you forever! Made from pull up leather it has a unique look when the leather is folded or bent. It is fully handcrafted right from the first cut. It features an inside laptop sleeve which fits a 15\" MacBook Air and pocket for your items.\r\n</br>\r\n** If you are local and wish to pick up your order, please type in \"PICKUP\" in the discount code dialogue box when checking out.\r\n</br>\r\nFeatures:</br> \r\n- 100% handcrafted </br> \r\n- 16\" wide x 10\" height x 5\" depth at base </br>\r\n- Full grain leather </br>\r\n- Interior pocket with pen loop and sleeve </br>\r\n- Adjustable Tuck locks for quick access to interior of bag </br>\r\n- Adjustable shoulder strap </br>\r\n- Pass Through Strap on back to use with rollable luggage </br>\r\n- Fair trade made </br>\r\n- Antique brass hardware </br>\r\n- Hand hammered copper rivets </br>\r\n- Hand Stitched Gussets for maximum strength and durability </br>', 1, '2020-05-26', '2020-05-26'),
(17, 'LKG Belt - Medium Brown English Bridle', 'BL', 'Buck Brown', '115', 19, 1, 'BeltMediumBrownEnglishBridle.jpg', 'BeltMediumBrownEnglishBridle_01.jpg,,BeltMediumBrownEnglishBridle_02.jpg,,BeltMediumBrownEnglishBridle_03.jpg', NULL, 'Made from the finest of leathers, the LKG belt will last you many years. It features an antique nickel rolling belt buckle which makes threading the belt very easy and smooth. It also features hand hammered copper rivets which are extremely durable. It measures 1.5\" wide and comes in any custom length. Please select the correct belt length in the drop down menu. Look at the chart below to see the correct way to measure your belt so that we can make it perfectly fit your waistline.', 1, '2020-06-14', '2020-06-14'),
(18, 'LKG Key Chain - Rugged Tan', 'BL', 'RuggedTan', '50', 27, 3, 'KeyChainRuggedTan.jpg', 'KeyChainRuggedTan_01.jpg', 0, 'The LKG Key Chain is crafted from premium full grain leather and will age beautifully. It is fitted with a top quality antique brass key hook and key ring which provides superior strength and durability.\r\n<br/>\r\n\r\n** If you are local and wish to pick up your order, please type in \"PICKUP\" in the discount code dialogue box when checking out.', 1, '2020-06-14', '2020-06-14'),
(19, 'LKG Key Chain - Stealth Black', 'BL', 'Black', '50', 0, 0, 'KeyChainStealthBlack.jpg', 'KeyChainStealthBlack_01.jpg', NULL, 'The LKG Key Chain is crafted from premium full grain leather and will age beautifully. It is fitted with a top quality antique brass key hook and key ring which provides superior strength and durability.', 1, '2020-06-14', '2020-06-14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `Roleid` int(255) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`Roleid`, `Role`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Userid` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Roleid` int(255) NOT NULL,
  `Create` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Userid`, `Username`, `Password`, `Name`, `Phone`, `Email`, `Address`, `Roleid`, `Create`, `Status`) VALUES
('UR01', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Đặng Văn Linh', '0395482136', 'vanlinhdang1999@gmail.com', '', 1, '2020-06-10', 1),
('UR02', 'manager', 'e10adc3949ba59abbe56e057f20f883e', 'van', '0395482135', 'vanlinh@gmail.com', '273 An Dương Vương, Q.5', 2, '2020-06-10', 1),
('UR03', 'user', 'e10adc3949ba59abbe56e057f20f883e', 'Linh', '0395482130', 'van@gmail.com', '', 3, '2020-06-10', 1),
('UR04', 'user11', 'e10adc3949ba59abbe56e057f20f883e', 'avc', '0369258100', 'ava@gmail.com', '', 3, '2020-06-13', 0),
('UR05', 'nam', 'e10adc3949ba59abbe56e057f20f883e', 'Hoang', '0357159275', 'nam@gmail.com', '273 An Dương Vương, Q.5', 3, '2020-06-13', 1),
('UR06', 'user2', 'e10adc3949ba59abbe56e057f20f883e', 'avc', '0369258101', 'avaaa@gmail.com', '', 3, '2020-06-15', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`CatalogID`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Chỉ mục cho bảng `email_notification`
--
ALTER TABLE `email_notification`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `OrderID` (`OrderID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Roleid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Userid`),
  ADD KEY `Roleid` (`Roleid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `email_notification`
--
ALTER TABLE `email_notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `Roleid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
