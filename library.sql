-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2020 lúc 01:41 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `library`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(2, 'Phạm Thị Thanh Mai', 'phamthanhmai0809@gmail.com', 'admin', 'f925916e2754e5e03f75dd58a5733251', '2020-06-11 13:56:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Agatha Christie', '2020-06-08 12:49:09', '2020-06-08 15:16:59'),
(2, 'Victor Hugo', '2020-06-08 14:30:23', '2020-06-08 15:15:09'),
(3, 'Puskin', '2020-06-08 14:35:08', '2020-06-08 14:37:09'),
(4, 'Nguyễn Ngọc Ánh', '2020-06-08 14:35:21', '2020-06-08 14:40:03'),
(5, 'Paulo Coelho', '2020-06-08 14:35:36', '2020-06-08 14:36:05'),
(9, 'Mặc Bảo Phi Bảo', '2020-06-08 15:22:03', '2020-06-08 15:25:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` int(11) DEFAULT NULL,
  `BookPrice` int(11) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookPrice`, `RegDate`, `UpdationDate`) VALUES
(1, 'Án mạng trên tàu tốc hành phương Đông', 5, 1, 486925, 357000, '2020-06-08 20:04:55', '2020-06-14 05:54:41'),
(3, 'Mười hai năm, kịch cố nhân', 4, 9, 625879, 215000, '2020-06-08 20:17:31', '2020-06-14 06:13:17'),
(5, 'Nhà giả kim', 7, 5, 161594, 120000, '2020-06-08 20:35:31', '2020-06-14 06:19:30'),
(7, 'Những người khốn khổ', 7, 2, 135790, 502000, '2020-06-08 01:20:12', '2020-06-15 02:10:20'),
(9, 'Tôi yêu em', 4, 3, 246824, 155000, '2020-06-08 20:35:31', '2020-06-13 06:19:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(4, 'Lãng mạn', 1, '2020-06-04 18:35:25', '2020-06-06 16:00:42'),
(5, 'Trinh thám', 1, '2020-06-04 18:35:39', '2020-06-08 17:13:03'),
(6, 'Khoa học', 1, '2020-06-04 18:35:55', '2020-06-15 02:14:07'),
(7, 'Văn học nước ngoài', 0, '2020-06-04 18:36:16', '2020-06-15 02:14:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(1, 1, 'SID002', '2020-06-14 06:09:47', '2020-06-14 11:15:20', 1, 0),
(2, 1, 'SID005', '2020-06-10 06:12:27', '2020-06-10 11:15:23', 1, 5),
(3, 3, 'SID011', '2020-06-14 06:13:40', NULL, 0, NULL),
(4, 3, 'SID010', '2020-06-10 06:23:23', '2020-06-13 11:22:29', 1, 2),
(5, 1, 'SID002', '2020-06-12 10:59:26', NULL, 0, NULL),
(6, 3, 'SID012', '2020-06-10 18:02:55', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID002', 'Nguyễn Thành Long', '7on9@gmail.com', '0986547255', 'f925916e2754e5e03f75dd58a5733251', 1, '2020-06-11 15:37:05', '2020-06-15 02:15:38'),
(4, 'SID005', 'Trịnh Thị Thanh Nhung', 'tnhung306@gmail.com', '0856971002', '92228410fc8b872914e023160cf4ae8f', 0, '2020-06-11 15:41:27', '2020-06-15 02:15:45'),
(9, 'SID010', 'Lê Quyết Chiến', 'lequyetchien@gmail.com', '0858585622', 'f925916e2754e5e03f75dd58a5733251', 1, '2020-06-15 13:40:30', '2020-06-15 02:15:52'),
(10, 'SID011', 'Nguyễn Ngọc Thiên Long', 'thienlong@gmail.com', '0467242375', 'f925916e2754e5e03f75dd58a5733251', 1, '2020-06-15 18:00:59', '2020-06-15 02:15:58'),
(11, 'SID012', 'Huỳnh Thị Hiền', 'utnho@gmail.com', '0945208280', '21232f297a57a5a743894a0e4a801fc3', 1, '2020-06-11 13:46:30', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
