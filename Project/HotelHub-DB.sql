-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 09:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`) VALUES
(1, 'Máy lạnh'),
(2, 'Tủ lạnh'),
(3, 'Nhà bếp'),
(4, 'Máy sưởi'),
(5, 'Bồn tắm');

-- --------------------------------------------------------

--
-- Table structure for table `bookingroom`
--

CREATE TABLE `bookingroom` (
  `bookingRoomId` int(11) NOT NULL,
  `customerNumbers` int(11) NOT NULL,
  `checkinDate` datetime NOT NULL,
  `checkoutDate` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `userAccountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingroom`
--

INSERT INTO `bookingroom` (`bookingRoomId`, `customerNumbers`, `checkinDate`, `checkoutDate`, `status`, `userAccountID`) VALUES
(1, 2, '2025-06-10 00:00:00', '2025-06-15 00:00:00', 'confirmed', 1),
(2, 1, '2025-06-12 00:00:00', '2025-06-14 00:00:00', 'completed', 2),
(3, 3, '2025-07-01 00:00:00', '2025-07-05 00:00:00', 'confirmed', 1),
(4, 2, '2025-07-10 00:00:00', '2025-07-12 00:00:00', 'cancelled', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking_room_map`
--

CREATE TABLE `booking_room_map` (
  `bookingRoomId` int(11) NOT NULL,
  `roomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_room_map`
--

INSERT INTO `booking_room_map` (`bookingRoomId`, `roomId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `booking_service_map`
--

CREATE TABLE `booking_service_map` (
  `bookingRoomId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_service_map`
--

INSERT INTO `booking_service_map` (`bookingRoomId`, `serviceId`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 3),
(4, 1),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `userAccount` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `roomID`, `userAccount`, `rate`, `comment`) VALUES
(1, 1, 1, 4, 'Phòng sạch sẽ, phù hợp giá tiền.'),
(2, 1, 2, 5, 'Dịch vụ ổn, nhưng cách âm chưa tốt.'),
(3, 2, 1, 5, 'Yên tĩnh, thoải mái cho công việc.'),
(4, 3, 1, 5, 'Phòng đẹp, tiện nghi hiện đại.'),
(5, 3, 2, 4, 'Mọi thứ ổn nhưng wifi hơi yếu.'),
(6, 3, 1, 5, 'Nhân viên thân thiện.'),
(7, 4, 1, 5, 'Quá tuyệt vời, đáng tiền.'),
(8, 4, 2, 5, 'Nội thất sang trọng và dịch vụ chu đáo.'),
(9, 4, 1, 5, 'Rất thích bồn tắm và view biển.'),
(10, 4, 2, 5, 'Lần sau sẽ quay lại tiếp.');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `invoiceDetailID` int(11) NOT NULL,
  `discount` float NOT NULL,
  `tax` float NOT NULL,
  `finalAmount` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `paymentType` varchar(50) NOT NULL,
  `invoiceDate` date NOT NULL,
  `paymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `invoiceDetailID`, `discount`, `tax`, `finalAmount`, `status`, `paymentType`, `invoiceDate`, `paymentDate`) VALUES
(1, 1, 0, 5, 1596000, 'paid', 'cash', '2025-06-10', '2025-06-10'),
(2, 2, 0, 5, 1260000, 'paid', 'momo', '2025-06-12', '2025-06-12'),
(3, 3, 0, 5, 2341500, 'unpaid', 'cash', '2025-07-01', NULL),
(4, 4, 0, 5, 5460000, 'unpaid', 'momo', '2025-07-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `invoiceDetailID` int(11) NOT NULL,
  `serviceDate` datetime NOT NULL,
  `bookingRoomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoicedetail`
--

INSERT INTO `invoicedetail` (`invoiceDetailID`, `serviceDate`, `bookingRoomID`) VALUES
(1, '2025-06-10 00:00:00', 1),
(2, '2025-06-12 00:00:00', 2),
(3, '2025-07-01 00:00:00', 3),
(4, '2025-07-10 00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `roomType` int(11) NOT NULL,
  `roomNumber` varchar(4) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `describeDetail` varchar(255) NOT NULL,
  `discount_percent` float DEFAULT 0,
  `sale_price` float DEFAULT NULL,
  `rating` float DEFAULT 0,
  `feedbackCount` int(11) DEFAULT 0,
  `featured_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `roomType`, `roomNumber`, `price`, `status`, `describeDetail`, `discount_percent`, `sale_price`, `rating`, `feedbackCount`, `featured_image`) VALUES
(1, 1, 'E101', 800000, 'available', 'Phòng Economy nhỏ gọn, đầy đủ tiện nghi cơ bản.', 10, 720000, 4.2, 2, 'economy1.jpg'),
(2, 1, 'E102', 900000, 'booked', 'Phòng Economy gần cửa sổ, view vườn.', 0, 900000, 4.5, 1, 'economy2.jpg'),
(3, 2, 'S201', 1800000, 'available', 'Phòng Standard rộng rãi, có ban công riêng.', 15, 1530000, 4.6, 3, 'standard1.jpg'),
(4, 3, 'V301', 5000000, 'available', 'Phòng VIP suite với phòng khách riêng và bồn tắm massage.', 20, 4000000, 4.9, 4, 'vip1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `roomTypeId` int(11) NOT NULL,
  `typeName` varchar(50) NOT NULL,
  `roomDescribe` varchar(100) NOT NULL,
  `priceRange` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomTypeId`, `typeName`, `roomDescribe`, `priceRange`) VALUES
(1, 'Economy Room', 'Phòng cơ bản với tiện nghi tối giản, phù hợp với ngân sách tiết kiệm.', '500.000đ - 1.000.000đ'),
(2, 'Standard Room', 'Phòng tiêu chuẩn với không gian thoải mái, đầy đủ tiện nghi hiện đại.', '1.000.000đ - 2.500.000đ'),
(3, 'VIP Suite', 'Phòng cao cấp với không gian rộng rãi, dịch vụ VIP và nội thất sang trọng.', '2.500.000đ - 6.000.000đ');

-- --------------------------------------------------------

--
-- Table structure for table `room_amenity_map`
--

CREATE TABLE `room_amenity_map` (
  `room_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_amenity_map`
--

INSERT INTO `room_amenity_map` (`room_id`, `amenity_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(30) NOT NULL,
  `serviceTypeID` int(11) NOT NULL,
  `price` float NOT NULL,
  `describeDetail` varchar(255) NOT NULL,
  `featured_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`, `serviceTypeID`, `price`, `describeDetail`, `featured_img`) VALUES
(1, 'Nhà hàng', 1, 500000, 'Dịch vụ ăn uống với thực đơn đa dạng từ món địa phương đến quốc tế, mang đến trải nghiệm ẩm thực tuyệt vời.', 'restaurant.jpg'),
(2, 'Bar', 1, 300000, 'Không gian sang trọng với nhiều loại cocktail, rượu vang và đồ uống đặc sắc.', 'bar.jpg'),
(3, 'Đưa đón', 2, 700000, 'Dịch vụ đưa đón khách từ sân bay hoặc các địa điểm khác, giúp hành trình thuận tiện và thoải mái.', 'transfer.jpg'),
(4, 'Hồ bơi', 3, 400000, 'Hồ bơi rộng lớn với khu vực nghỉ ngơi và quầy bar phục vụ nước uống.', 'pool.jpg'),
(5, 'Spa trị liệu', 4, 1200000, 'Liệu trình spa cao cấp giúp thư giãn và phục hồi sức khỏe.', 'spa.jpg'),
(6, 'Gym', 4, 350000, 'Phòng tập gym hiện đại với đầy đủ thiết bị luyện tập, phù hợp cho mọi nhu cầu vận động.', 'gym.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `servicetype`
--

CREATE TABLE `servicetype` (
  `idServiceType` int(11) NOT NULL,
  `typeName` varchar(30) NOT NULL,
  `serviceDescribe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicetype`
--

INSERT INTO `servicetype` (`idServiceType`, `typeName`, `serviceDescribe`) VALUES
(1, 'Ẩm thực', 'Dịch vụ ăn uống bao gồm nhà hàng và quầy bar, mang đến trải nghiệm ẩm thực đa dạng '),
(2, 'Vận chuyển', 'Dịch vụ đưa đón khách từ sân bay hoặc các địa điểm khác trong thành phố, đảm bảo sự thuận tiện '),
(3, 'Giải trí', 'Các dịch vụ giải trí như hồ bơi ngoài trời'),
(4, 'Sức khỏe', 'Các dịch vụ chăm sóc sức khỏe bao gồm spa trị liệu, massage, phòng xông hơi, yoga và gym');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `loginID` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `loginBy` varchar(50) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT 1,
  `userAccountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`loginID`, `password`, `email`, `loginBy`, `isActive`, `userAccountID`) VALUES
(1, '123456', 'a@gmail.com', 'local', 1, 1),
(2, 'abcdef', 'b@gmail.com', 'local', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `idAccount` int(11) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `userImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`idAccount`, `fullName`, `phoneNumber`, `gender`, `userImage`) VALUES
(1, 'Nguyễn Văn A', '0901234567', 'Nam', 'avatar1.png'),
(2, 'Trần Thị B', '0912345678', 'Nữ', 'avatar2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingroom`
--
ALTER TABLE `bookingroom`
  ADD PRIMARY KEY (`bookingRoomId`),
  ADD UNIQUE KEY `bookingRoomId` (`bookingRoomId`),
  ADD KEY `fk_booking_useraccount` (`userAccountID`);

--
-- Indexes for table `booking_room_map`
--
ALTER TABLE `booking_room_map`
  ADD PRIMARY KEY (`bookingRoomId`,`roomId`),
  ADD KEY `roomId` (`roomId`);

--
-- Indexes for table `booking_service_map`
--
ALTER TABLE `booking_service_map`
  ADD PRIMARY KEY (`bookingRoomId`,`serviceId`),
  ADD KEY `serviceId` (`serviceId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FeedBack_fk1` (`roomID`),
  ADD KEY `FeedBack_fk2` (`userAccount`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD UNIQUE KEY `invoiceID` (`invoiceID`),
  ADD KEY `Invoice_fk1` (`invoiceDetailID`);

--
-- Indexes for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD PRIMARY KEY (`invoiceDetailID`),
  ADD UNIQUE KEY `invoiceDetailID` (`invoiceDetailID`),
  ADD KEY `InvoiceDetail_fk2` (`bookingRoomID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`),
  ADD UNIQUE KEY `roomId` (`roomId`),
  ADD KEY `Room_fk1` (`roomType`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomTypeId`),
  ADD UNIQUE KEY `roomTypeId` (`roomTypeId`);

--
-- Indexes for table `room_amenity_map`
--
ALTER TABLE `room_amenity_map`
  ADD PRIMARY KEY (`room_id`,`amenity_id`),
  ADD KEY `amenity_id` (`amenity_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`),
  ADD UNIQUE KEY `serviceID` (`serviceID`),
  ADD KEY `Service_fk2` (`serviceTypeID`);

--
-- Indexes for table `servicetype`
--
ALTER TABLE `servicetype`
  ADD PRIMARY KEY (`idServiceType`),
  ADD UNIQUE KEY `idServiceType` (`idServiceType`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`loginID`),
  ADD UNIQUE KEY `loginID` (`loginID`),
  ADD KEY `User_fk3` (`userAccountID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`idAccount`),
  ADD UNIQUE KEY `idAccount` (`idAccount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookingroom`
--
ALTER TABLE `bookingroom`
  MODIFY `bookingRoomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  MODIFY `invoiceDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `roomTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `idServiceType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `idAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingroom`
--
ALTER TABLE `bookingroom`
  ADD CONSTRAINT `fk_booking_useraccount` FOREIGN KEY (`userAccountID`) REFERENCES `useraccount` (`idAccount`);

--
-- Constraints for table `booking_room_map`
--
ALTER TABLE `booking_room_map`
  ADD CONSTRAINT `booking_room_map_ibfk_1` FOREIGN KEY (`bookingRoomId`) REFERENCES `bookingroom` (`bookingRoomId`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_room_map_ibfk_2` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`) ON DELETE CASCADE;

--
-- Constraints for table `booking_service_map`
--
ALTER TABLE `booking_service_map`
  ADD CONSTRAINT `booking_service_map_ibfk_1` FOREIGN KEY (`bookingRoomId`) REFERENCES `bookingroom` (`bookingRoomId`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_service_map_ibfk_2` FOREIGN KEY (`serviceId`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FeedBack_fk1` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomId`),
  ADD CONSTRAINT `FeedBack_fk2` FOREIGN KEY (`userAccount`) REFERENCES `useraccount` (`idAccount`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `Invoice_fk1` FOREIGN KEY (`invoiceDetailID`) REFERENCES `invoicedetail` (`invoiceDetailID`);

--
-- Constraints for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD CONSTRAINT `InvoiceDetail_fk2` FOREIGN KEY (`bookingRoomID`) REFERENCES `bookingroom` (`bookingRoomId`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `Room_fk1` FOREIGN KEY (`roomType`) REFERENCES `roomtype` (`roomTypeId`);

--
-- Constraints for table `room_amenity_map`
--
ALTER TABLE `room_amenity_map`
  ADD CONSTRAINT `room_amenity_map_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`roomId`),
  ADD CONSTRAINT `room_amenity_map_ibfk_2` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `Service_fk2` FOREIGN KEY (`serviceTypeID`) REFERENCES `servicetype` (`idServiceType`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_fk3` FOREIGN KEY (`userAccountID`) REFERENCES `useraccount` (`idAccount`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
