-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 10:06 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assetcategory`
--

CREATE TABLE IF NOT EXISTS `assetcategory` (
  `AssetClass` varchar(10) NOT NULL,
  `ClassDefinition` varchar(50) NOT NULL,
  `DepreciationType` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assetlocation`
--

CREATE TABLE IF NOT EXISTS `assetlocation` (
  `LocationID` varchar(8) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assetlocationmovement`
--

CREATE TABLE IF NOT EXISTS `assetlocationmovement` (
`MovementNO` int(8) NOT NULL,
  `AssetID` int(8) NOT NULL,
  `LocationID` varchar(8) NOT NULL,
  `NewLocationID` varchar(8) NOT NULL,
  `NewLocationName` varchar(50) NOT NULL,
  `TranferDate` date NOT NULL,
  `EmployeeID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assetmain`
--

CREATE TABLE IF NOT EXISTS `assetmain` (
`AssetID` int(8) NOT NULL,
  `AssetName` varchar(50) NOT NULL,
  `AssetNumber_Quantity` int(4) NOT NULL,
  `AssetClass` varchar(10) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `AcquisitionDate` date NOT NULL,
  `CapitalCost` int(10) NOT NULL,
  `DepreciationType` varchar(2) NOT NULL,
  `UsefulLife` int(4) NOT NULL,
  `LocationID` varchar(8) NOT NULL,
  `LocationDepartment` varchar(20) NOT NULL,
  `EmployeeID` int(8) NOT NULL,
  `VendorID` int(8) NOT NULL,
  `Manufacturer` varchar(25) NOT NULL,
  `SalvageValue` int(10) NOT NULL,
  `DepreciationValue_perYear` int(10) NOT NULL,
  `DepreciationRatio` int(2) NOT NULL,
  `DepreciationArea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Main table of asset';

-- --------------------------------------------------------

--
-- Table structure for table `assetpurchase`
--

CREATE TABLE IF NOT EXISTS `assetpurchase` (
`PurchaseID` int(8) NOT NULL,
  `AssetID` int(8) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `PurchasePrice` int(10) NOT NULL,
  `EmployeeID` int(8) NOT NULL,
  `VendorID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assetsold`
--

CREATE TABLE IF NOT EXISTS `assetsold` (
`SoldID` int(8) NOT NULL,
  `AssetID` int(8) NOT NULL,
  `SoldDate` date NOT NULL,
  `SoldPrice` int(10) NOT NULL,
  `EmployeeID` int(8) NOT NULL,
  `ClientID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`ClientID` int(8) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNO` int(10) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `CompanyID` int(8) DEFAULT NULL,
  `RoleID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contactedcompany`
--

CREATE TABLE IF NOT EXISTS `contactedcompany` (
`CompanyID` int(8) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `CompanyAddress` varchar(100) NOT NULL,
  `CompanyPhoneNO` varchar(10) NOT NULL,
  `CompanyFaxNO` varchar(15) DEFAULT NULL,
  `CompanyEmail` varchar(20) DEFAULT NULL,
  `SecondaryPhoneNO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactedcompany`
--

INSERT INTO `contactedcompany` (`CompanyID`, `CompanyName`, `CompanyAddress`, `CompanyPhoneNO`, `CompanyFaxNO`, `CompanyEmail`, `SecondaryPhoneNO`) VALUES
(1, 'บิ๊กบอสตำลึง', '126 ถนนประชาอุทิศ แขวงบางมด เขตทุ่งครุ กรุงเทพมหานคร 10140', '025412369', '025314568', 'bigboss@tamleong.com', '0811112547');

-- --------------------------------------------------------

--
-- Table structure for table `depreciationkey`
--

CREATE TABLE IF NOT EXISTS `depreciationkey` (
  `DepreciationType` varchar(2) NOT NULL,
  `DepreciationDef` varchar(100) NOT NULL,
  `DepreciationMethod` varchar(50) NOT NULL,
  `DepreciationConstraint` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`EmployeeID` int(8) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNO` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `RoleID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roleandpermission`
--

CREATE TABLE IF NOT EXISTS `roleandpermission` (
`RoleID` int(8) NOT NULL,
  `RoleName` varchar(30) NOT NULL,
  `PermissionLevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
`VendorID` int(8) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `CompanyID` int(8) DEFAULT NULL,
  `VendorPhoneNO` varchar(10) NOT NULL,
  `VendorEmail` varchar(30) NOT NULL,
  `BuyLocation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VendorID`, `FirstName`, `LastName`, `CompanyID`, `VendorPhoneNO`, `VendorEmail`, `BuyLocation`) VALUES
(2, 'ทดสอบ', 'อัดลงฐานข้อมูล', 1, '0863219383', 'id513128@gmail.com', 'fregtr15ghrt48hg1rt25h125rtyh45tyhyh'),
(3, 'ทดสอบนาจา', 'อัดลงฐานข้อมูลtrgrtg', 1, '0255885552', 'id513128@111gmail.com', 'ที่อยู่ไม่มั่วนาจา'),
(4, 'ทดสอบ', 'ครั้งที่ 2', 1, '0532215656', 'ffgerwf@ffgerwf.com', 'rfgkenmrgmkldrtghiudren gfiderpfo78swernfjewo0'),
(5, 'อีดิท', 'number 5', 1, '0851112454', 'id513128@gmail.com', 'fregfregfergerger');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assetcategory`
--
ALTER TABLE `assetcategory`
 ADD PRIMARY KEY (`AssetClass`), ADD KEY `DepreciationType` (`DepreciationType`);

--
-- Indexes for table `assetlocation`
--
ALTER TABLE `assetlocation`
 ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `assetlocationmovement`
--
ALTER TABLE `assetlocationmovement`
 ADD PRIMARY KEY (`MovementNO`), ADD KEY `LocationID` (`LocationID`,`EmployeeID`), ADD KEY `EmployeeID` (`EmployeeID`), ADD KEY `AssetID` (`AssetID`);

--
-- Indexes for table `assetmain`
--
ALTER TABLE `assetmain`
 ADD PRIMARY KEY (`AssetID`), ADD KEY `LocationID` (`LocationID`,`EmployeeID`,`VendorID`), ADD KEY `AssetClass` (`AssetClass`), ADD KEY `DepreciationType` (`DepreciationType`), ADD KEY `EmployeeID` (`EmployeeID`), ADD KEY `VendorID` (`VendorID`);

--
-- Indexes for table `assetpurchase`
--
ALTER TABLE `assetpurchase`
 ADD PRIMARY KEY (`PurchaseID`), ADD KEY `AssetID` (`AssetID`,`EmployeeID`,`VendorID`), ADD KEY `VendorID` (`VendorID`);

--
-- Indexes for table `assetsold`
--
ALTER TABLE `assetsold`
 ADD PRIMARY KEY (`SoldID`), ADD KEY `AssetID` (`AssetID`,`EmployeeID`,`ClientID`), ADD KEY `EmployeeID` (`EmployeeID`), ADD KEY `ClientID` (`ClientID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`ClientID`), ADD KEY `CompanyID` (`CompanyID`,`RoleID`), ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `contactedcompany`
--
ALTER TABLE `contactedcompany`
 ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `depreciationkey`
--
ALTER TABLE `depreciationkey`
 ADD PRIMARY KEY (`DepreciationType`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`EmployeeID`), ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `roleandpermission`
--
ALTER TABLE `roleandpermission`
 ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
 ADD PRIMARY KEY (`VendorID`), ADD KEY `CompanyID` (`CompanyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assetlocationmovement`
--
ALTER TABLE `assetlocationmovement`
MODIFY `MovementNO` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assetmain`
--
ALTER TABLE `assetmain`
MODIFY `AssetID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assetpurchase`
--
ALTER TABLE `assetpurchase`
MODIFY `PurchaseID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assetsold`
--
ALTER TABLE `assetsold`
MODIFY `SoldID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `ClientID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contactedcompany`
--
ALTER TABLE `contactedcompany`
MODIFY `CompanyID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `EmployeeID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roleandpermission`
--
ALTER TABLE `roleandpermission`
MODIFY `RoleID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
MODIFY `VendorID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assetcategory`
--
ALTER TABLE `assetcategory`
ADD CONSTRAINT `AssetCategory_ibfk_1` FOREIGN KEY (`DepreciationType`) REFERENCES `depreciationkey` (`DepreciationType`);

--
-- Constraints for table `assetlocationmovement`
--
ALTER TABLE `assetlocationmovement`
ADD CONSTRAINT `AssetLocationMovement_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
ADD CONSTRAINT `AssetLocationMovement_ibfk_2` FOREIGN KEY (`LocationID`) REFERENCES `assetlocation` (`LocationID`),
ADD CONSTRAINT `AssetLocationMovement_ibfk_3` FOREIGN KEY (`AssetID`) REFERENCES `assetmain` (`AssetID`);

--
-- Constraints for table `assetmain`
--
ALTER TABLE `assetmain`
ADD CONSTRAINT `AssetMain_ibfk_1` FOREIGN KEY (`AssetClass`) REFERENCES `assetcategory` (`AssetClass`),
ADD CONSTRAINT `AssetMain_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
ADD CONSTRAINT `AssetMain_ibfk_3` FOREIGN KEY (`DepreciationType`) REFERENCES `depreciationkey` (`DepreciationType`),
ADD CONSTRAINT `AssetMain_ibfk_4` FOREIGN KEY (`VendorID`) REFERENCES `vendor` (`VendorID`) ON UPDATE CASCADE,
ADD CONSTRAINT `AssetMain_ibfk_5` FOREIGN KEY (`LocationID`) REFERENCES `assetlocation` (`LocationID`);

--
-- Constraints for table `assetpurchase`
--
ALTER TABLE `assetpurchase`
ADD CONSTRAINT `AssetPurchase_ibfk_1` FOREIGN KEY (`AssetID`) REFERENCES `assetmain` (`AssetID`),
ADD CONSTRAINT `AssetPurchase_ibfk_2` FOREIGN KEY (`VendorID`) REFERENCES `vendor` (`VendorID`);

--
-- Constraints for table `assetsold`
--
ALTER TABLE `assetsold`
ADD CONSTRAINT `AssetSold_ibfk_1` FOREIGN KEY (`AssetID`) REFERENCES `assetmain` (`AssetID`),
ADD CONSTRAINT `AssetSold_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
ADD CONSTRAINT `AssetSold_ibfk_3` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
ADD CONSTRAINT `Client_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `roleandpermission` (`RoleID`),
ADD CONSTRAINT `Client_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `contactedcompany` (`CompanyID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
ADD CONSTRAINT `Employee_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `roleandpermission` (`RoleID`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
ADD CONSTRAINT `Vendor_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `contactedcompany` (`CompanyID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
