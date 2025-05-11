CREATE TABLE IF NOT EXISTS `Room` (
	`roomId` int AUTO_INCREMENT NOT NULL UNIQUE,
	`roomType` int NOT NULL,
	`roomNumber` int NOT NULL,
	`price` float NOT NULL,
	`status` int NOT NULL,
	`describe` varchar(100) NOT NULL,
	PRIMARY KEY (`roomId`)
);

CREATE TABLE IF NOT EXISTS `RoomType` (
	`roomTypeId` int AUTO_INCREMENT NOT NULL UNIQUE,
	`typeName` varchar(50) NOT NULL,
	`describe` varchar(100) NOT NULL,
	PRIMARY KEY (`roomTypeId`)
);


CREATE TABLE IF NOT EXISTS `FeedBack` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`roomID` int NOT NULL,
	`userAccount` int NOT NULL,
	`rate` int NOT NULL,
	`comment` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `UserAccount` (
	`idAccount` int AUTO_INCREMENT NOT NULL UNIQUE,
	`fullName` varchar(30) NOT NULL,
	`phoneNumber` varchar(10) NOT NULL,
	`gender` binary(1) NOT NULL,
	`bookingRoomID` int NOT NULL,
	`invoiceID` int NOT NULL,
	PRIMARY KEY (`idAccount`)
);

CREATE TABLE IF NOT EXISTS `Service` (
	`serviceID` int AUTO_INCREMENT NOT NULL UNIQUE,
	`serviceName` varchar(30) NOT NULL,
	`serviceTypeID` int NOT NULL,
	`price` float NOT NULL,
	`describe` varchar(100) NOT NULL,
	PRIMARY KEY (`serviceID`)
);

CREATE TABLE IF NOT EXISTS `ServiceType` (
	`idServiceType` int AUTO_INCREMENT NOT NULL UNIQUE,
	`typeName` varchar(30) NOT NULL,
	`describe` varchar(100) NOT NULL,
	PRIMARY KEY (`idServiceType`)
);

CREATE TABLE IF NOT EXISTS `BookingRoom` (
	`bookingRoomId` int AUTO_INCREMENT NOT NULL UNIQUE,
	`customerNumbers` int NOT NULL,
	`checkinDate` datetime NOT NULL,
	`checkoutDate` datetime NOT NULL,
	`status` int NOT NULL,
	`roomID` int NOT NULL,
	`serviceID` int NOT NULL,
	PRIMARY KEY (`bookingRoomId`)
);


CREATE TABLE IF NOT EXISTS `InvoiceDetail` (
	`invoiceDetailID` int AUTO_INCREMENT NOT NULL UNIQUE,
	`serviceDate` datetime NOT NULL,
	`bookingRoomID` int NOT NULL,
	PRIMARY KEY (`invoiceDetailID`)
);

CREATE TABLE IF NOT EXISTS `User` (
	`loginID` int AUTO_INCREMENT NOT NULL UNIQUE,
	`password` varchar(200) NOT NULL,
	`email` int NOT NULL,
	`userAccountID` int NOT NULL,
	PRIMARY KEY (`loginID`)
);

CREATE TABLE IF NOT EXISTS `Invoice` (
	`invoiceID` int AUTO_INCREMENT NOT NULL UNIQUE,
	`invoiceDetailID` int NOT NULL,
	`discount` float NOT NULL,
	`tax` float NOT NULL,
	`finalAmount` float NOT NULL,
	`status` int NOT NULL,
	`paymentType` int NOT NULL,
	PRIMARY KEY (`invoiceID`)
);


ALTER TABLE `Room` ADD CONSTRAINT `Room_fk1` FOREIGN KEY (`roomType`) REFERENCES `RoomType`(`roomTypeId`);


ALTER TABLE `FeedBack` ADD CONSTRAINT `FeedBack_fk1` FOREIGN KEY (`roomID`) REFERENCES `Room`(`roomId`);

ALTER TABLE `FeedBack` ADD CONSTRAINT `FeedBack_fk2` FOREIGN KEY (`userAccount`) REFERENCES `UserAccount`(`idAccount`);

ALTER TABLE `Service` ADD CONSTRAINT `Service_fk2` FOREIGN KEY (`serviceTypeID`) REFERENCES `ServiceType`(`idServiceType`);

ALTER TABLE `BookingRoom` ADD CONSTRAINT `BookingRoom_fk5` FOREIGN KEY (`roomID`) REFERENCES `Room`(`roomId`);

ALTER TABLE `BookingRoom` ADD CONSTRAINT `BookingRoom_fk6` FOREIGN KEY (`serviceID`) REFERENCES `Service`(`serviceID`);

ALTER TABLE `InvoiceDetail` ADD CONSTRAINT `InvoiceDetail_fk2` FOREIGN KEY (`bookingRoomID`) REFERENCES `BookingRoom`(`bookingRoomId`);
ALTER TABLE `User` ADD CONSTRAINT `User_fk3` FOREIGN KEY (`userAccountID`) REFERENCES `UserAccount`(`idAccount`);
ALTER TABLE `Invoice` ADD CONSTRAINT `Invoice_fk1` FOREIGN KEY (`invoiceDetailID`) REFERENCES `InvoiceDetail`(`invoiceDetailID`);
