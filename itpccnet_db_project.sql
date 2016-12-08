-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2016 at 11:56 AM
-- Server version: 5.5.50-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itpccnet_db_homework`
--

-- --------------------------------------------------------

--
-- Table structure for table `assetcategory`
--

CREATE TABLE `assetcategory` (
  `AssetClass` varchar(10) NOT NULL,
  `ClassDefinition` varchar(50) NOT NULL,
  `DepreciationType` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assetcategory`
--

INSERT INTO `assetcategory` (`AssetClass`, `ClassDefinition`, `DepreciationType`) VALUES
('BU', 'Building', 'SL'),
('EN_KC', 'Electronis Kitchen', 'SL'),
('EN_TP', 'Electronic Telephone', 'DC'),
('EQ', 'Equipment', 'SY'),
('EQ_PC', 'Electronic Personal Computer', 'SL'),
('HM_FT', 'Home Furnitures', 'SL'),
('JW', 'Jewelry', 'SL'),
('VC_AP', 'Vehicle Air plane', 'DC'),
('VC_CA', 'Vehicle Car', 'SL'),
('VC_MC', 'Vehicle Motorcycle', 'SL');

-- --------------------------------------------------------

--
-- Table structure for table `assetlocation`
--

CREATE TABLE `assetlocation` (
  `LocationID` varchar(8) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assetlocation`
--

INSERT INTO `assetlocation` (`LocationID`, `LocationName`, `LocationAddress`) VALUES
('1', 'Dubai Tower1', '1685 Bingamon Branch Road HOLTSVILLE New York 00501'),
('10', 'Jojo Blizard', '23/54 Athi Com Fharah 12422'),
('11', 'Double Coins Luxery', '2463 Rubaiyat Road Cheboygan Michigan 49721'),
('12', 'Niggaa House', '755 Evergreen Lane Los Angeles California 90017'),
('13', 'NY Big Ben', '114 Farnum Road New York New York 10016'),
('14', 'Jeane\'D Arc Industry', '4251 Creekside Lane Ventura California 93001'),
('15', 'M@gic Company', '1840 Columbia Boulevard Pikesville Maryland'),
('2', 'Rittichai Building', '1355 Ridge Road CINCINNATI Ohio 45205'),
('3', 'Titsanu Tower', '3437 Southside Lane Los Angeles 90044'),
('4', 'Taptap Twin Tower', '2921 Kelly Street Davidson North Carolina'),
('5', 'Ruilouis Department', '777 Goff Avenue Kalamazoo Michigan'),
('6', 'The Pause Chanocha', '3677 Grove Avenue Stillwater Oklahoma 74074'),
('7', 'Puchijao Garage', '217 Colony Street North Haven Connecticut 06473'),
('8', 'Danmachi Corporation', '164 Dovetail Estates Coalgate Oklahoma 74538'),
('9', 'Harambe Monument', '4446 Tuna Street JEFFERSON CITY Missouri 65015');

-- --------------------------------------------------------

--
-- Table structure for table `assetlocationmovement`
--

CREATE TABLE `assetlocationmovement` (
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

CREATE TABLE `assetmain` (
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
  `DepreciationRatio` double NOT NULL,
  `DepreciationArea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Main table of asset';

--
-- Dumping data for table `assetmain`
--

INSERT INTO `assetmain` (`AssetID`, `AssetName`, `AssetNumber_Quantity`, `AssetClass`, `PurchaseDate`, `AcquisitionDate`, `CapitalCost`, `DepreciationType`, `UsefulLife`, `LocationID`, `LocationDepartment`, `EmployeeID`, `VendorID`, `Manufacturer`, `SalvageValue`, `DepreciationValue_perYear`, `DepreciationRatio`, `DepreciationArea`) VALUES
(3, 'FCP', 1, 'BU', '2011-11-09', '2011-11-10', 10031100, 'SL', 10, '1', 'NK', 1, 2, 'Prueksa', 1000, 3000, 0.3, 'Tax'),
(4, 'Blue Diamond', 1, 'JW', '2012-03-04', '2012-04-04', 400000000, 'SL', 5, '4', 'Tamleung Finance', 2, 3, 'Saaudiarabia', 399800000, 40000, 0.001, 'Usage Age'),
(5, 'Valhalla Palace', 1, 'BU', '2013-04-05', '2013-05-05', 30000000, 'SL', 30, '4', 'Account', 1, 5, 'Gaia', 29730000, 3000, 0.00001, 'Usage Life'),
(6, 'Wheel Chair', 3, 'HM_FT', '1999-03-08', '1999-04-08', 5000, 'SL', 1, '5', 'Caring & Sharing', 5, 3, 'L\'Hospital', 4000, 1000, 0.2, 'Usage Life'),
(7, 'Rabka Squisher', 2, 'EN_KC', '2015-01-01', '2015-02-01', 3000, 'SL', 1, '9', 'Cooking', 4, 9, 'Uhalla Cooking', 2000, 1000, 0.33, 'Usage Life'),
(8, 'PizzaHut', 112, 'BU', '2012-04-04', '2012-04-05', 5000000, 'SL', 44, '9', 'Finance', 3, 5, 'Pizza Company', 4560000, 10000, 0.002, 'ค่าเสื่อมสภาพจากอายุการใช้งาน'),
(13, 'Laptop GW1', 20, 'EQ_PC', '1999-01-01', '2000-01-01', 20000, 'SL', 2, '3', 'IT', 1, 5, 'Asus', 15000, 2000, 0.1, 'UsageLife'),
(14, 'Computer tangto', 66, 'EQ_PC', '1998-01-02', '1998-03-03', 30000, 'SL', 5, '5', 'IT', 1, 8, 'Acer', 20000, 2000, 0.666, 'Usage Life'),
(16, 'ASUS A45VM ', 50, 'EQ_PC', '2001-11-05', '2001-11-05', 20000, 'SL', 10, '3', 'Office', 2, 1, 'ASUS', 5000, 2000, 0.1, 'Old'),
(18, 'Super Car', 5, 'VC_CA', '1980-10-09', '1980-11-09', 2000000, 'SL', 5, '11', 'Logistic', 1, 2, 'BMW', 1500000, 100000, 0.02, 'Usage Life'),
(19, 'Tangmo PC', 10, 'EQ_PC', '2013-04-05', '2013-00-05', 200000, 'SL', 5, '2', 'IT', 1, 5, 'Dell', 150000, 10000, 0.2, 'UsageLife'),
(21, 'Honda Altis', 3, 'VC_CA', '2001-12-05', '2001-12-06', 500000, 'SL', 20, '5', 'Warehouse', 6, 9, 'Honda', 100000, 10000, 0.2, 'Usage Age'),
(22, 'Truck', 2, 'VC_CA', '2014-09-08', '2014-09-08', 2000000, 'SL', 10, '1', 'Logistic', 1, 7, 'Hyundai', 1500000, 100000, 0.2, 'Usage Life');

-- --------------------------------------------------------

--
-- Table structure for table `assetpurchase`
--

CREATE TABLE `assetpurchase` (
  `PurchaseID` int(8) NOT NULL,
  `AssetID` int(8) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `PurchasePrice` int(10) NOT NULL,
  `EmployeeID` int(8) NOT NULL,
  `VendorID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assetpurchase`
--

INSERT INTO `assetpurchase` (`PurchaseID`, `AssetID`, `PurchaseDate`, `PurchasePrice`, `EmployeeID`, `VendorID`) VALUES
(1, 4, '2012-03-04', 380000000, 2, 1),
(2, 14, '1998-01-02', 30000, 3, 1),
(3, 16, '2001-11-05', 19000, 5, 3),
(4, 19, '2013-04-05', 180000, 3, 1),
(5, 18, '1980-10-09', 198421, 4, 5),
(6, 8, '2012-04-04', 4800000, 1, 7),
(7, 7, '2015-01-01', 2950, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `assetsold`
--

CREATE TABLE `assetsold` (
  `SoldID` int(8) NOT NULL,
  `AssetID` int(8) NOT NULL,
  `SoldDate` date NOT NULL,
  `SoldPrice` int(10) NOT NULL,
  `EmployeeID` int(8) NOT NULL,
  `ClientID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assetsold`
--

INSERT INTO `assetsold` (`SoldID`, `AssetID`, `SoldDate`, `SoldPrice`, `EmployeeID`, `ClientID`) VALUES
(2, 6, '2010-10-05', 6000, 2, 3),
(3, 4, '2014-03-05', 150000, 5, 3),
(4, 16, '2005-05-05', 10000, 4, 3),
(6, 21, '2008-08-08', 50000, 1, 5),
(7, 21, '2008-08-08', 8247, 1, 2),
(8, 22, '2008-10-10', 1000, 5, 3),
(9, 18, '2008-12-01', 3000, 2, 2),
(10, 13, '1999-01-01', 10000, 2, 3),
(11, 13, '2005-03-06', 8000, 2, 4),
(12, 14, '1999-01-01', 25000, 5, 3),
(13, 14, '2000-11-12', 20000, 2, 3),
(14, 14, '2002-01-03', 17300, 4, 5),
(15, 14, '2004-01-05', 13000, 3, 8),
(16, 16, '2008-01-09', 8000, 6, 7),
(17, 19, '2016-12-08', 100000, 1, 4),
(18, 3, '1995-01-05', 5000000, 1, 1),
(19, 8, '2013-05-05', 100000, 2, 2),
(20, 8, '2015-03-06', 80000, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientID` int(8) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNO` int(10) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `CompanyID` int(8) DEFAULT NULL,
  `RoleID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientID`, `FirstName`, `LastName`, `Address`, `PhoneNO`, `Email`, `CompanyID`, `RoleID`) VALUES
(1, 'Jessie', 'McArthur', '2365 Old Dear Lane Dover Plains New York', 2147483647, NULL, NULL, 4),
(2, 'Robert', 'Bracken', '1493 Sycamore Circle Fort Worth Texas', 2147483647, 'robert@mail.com', NULL, 4),
(3, 'David', 'Bowling', '47 Columbia Mine Road Wheeling West Virginia', 2147483647, NULL, 5, 4),
(4, 'Arin', 'adler', '1838 Yorkshire Circle Greenville North Carolina', 2147483647, NULL, 2, 4),
(5, 'shoorlock', 'hourton', '1059 Grove Avenue DOBSON North Carolina ', 2147483647, NULL, 7, 4),
(7, 'John', 'Cena', '736 Hinkle Deegan Lake newyork', 2147483647, NULL, NULL, 4),
(8, 'Son', 'Dad', '123 Supre Sydney', 74444126, 'Yo@hotmail.com', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contactedcompany`
--

CREATE TABLE `contactedcompany` (
  `CompanyID` int(8) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `CompanyAddress` varchar(100) NOT NULL,
  `CompanyPhoneNO` varchar(10) NOT NULL,
  `CompanyFaxNO` varchar(15) DEFAULT NULL,
  `CompanyEmail` varchar(20) DEFAULT NULL,
  `SecondaryPhoneNO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactedcompany`
--

INSERT INTO `contactedcompany` (`CompanyID`, `CompanyName`, `CompanyAddress`, `CompanyPhoneNO`, `CompanyFaxNO`, `CompanyEmail`, `SecondaryPhoneNO`) VALUES
(1, 'บิ๊กบอสตำลึง', '126 ถนนประชาอุทิศ แขวงบางมด เขตทุ่งครุ กรุงเทพมหานคร 10140', '025412369', '025314568', 'bigboss@tamleong.com', '0811112547'),
(2, 'Baidu Company', '99 Ichitan D.C America', '6684853518', '668453520', 'badiu@company.la', '668485319'),
(3, 'Shimakaze Building', '66/98 ถนนยูดาจิ แขวงยามาโตะ เขตริวโจ กุนมะ 12144 ', '6016016010', NULL, 'poi@poi.poi', '6016016012'),
(4, 'UMR Company', '69/69  Umaru  Nana Taihei Doma', '45856859', NULL, 'umr@hai.umr', NULL),
(5, 'ราชศักดิ์ การค้า', '474/5 ถนนบางผึ้ง แขวงบางมด เขตบางแมว กรุงเทพมหานคร 21035', '0964852358', NULL, NULL, NULL),
(6, 'Macrohard', '126 ถนนสุขสวัสดิ์ ตำบลบางครุ อำเภอพระประแดง สมุทรปราการ 10140', '0212345687', NULL, 'macro@ha.rd', '0212345690'),
(7, 'Transport Fever', '44 แขวงตลิ่งชัญ เขตบางขุนเทียน กรุงเทพมหานคร 12340', '0800654789', '080654790', NULL, NULL),
(8, 'Hualla Rabka Company', '595 Hught Dubai Iraq 59058 ', '878695132', NULL, 'allahu@bk.ar', NULL),
(9, 'Rui Louis Trading', '1/12 อาคารอักษรจุฬา เขตคลองเตย กรุงเทพมหานคร 10235 ', '0894382322', NULL, 'rui@lo.uis', NULL),
(10, 'G-ABLE CO., LTD.', '445 แขวงพระราม3 เขตสาทร กรุงเทพมหานคร 12358', '026859333', NULL, NULL, NULL),
(12, 'ตำลึงตึงตึง กำจัดมหาชน', '', '0324109957', '0324109960', 't@mluen.g', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `depreciationkey`
--

CREATE TABLE `depreciationkey` (
  `DepreciationType` varchar(2) NOT NULL,
  `DepreciationDef` varchar(100) NOT NULL,
  `DepreciationMethod` varchar(50) NOT NULL,
  `DepreciationConstraint` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depreciationkey`
--

INSERT INTO `depreciationkey` (`DepreciationType`, `DepreciationDef`, `DepreciationMethod`, `DepreciationConstraint`) VALUES
('DC', 'Doubling Declining balance method', '1 - sqrtN(rv/cf)', 'N = period ; rv = residualvalue ; cf = cost of fixed asset'),
('SL', 'Straight Line Method', 'BV = (n-1)d', 'BV = Bookvalue ; n = period ; d= depreciationvalue'),
('SY', 'Sum-of-years-digits method', 'SY = DB x ( RU / SYD)', 'DB = Cost - Salvage Value ; RU =Remaining Useful Life ; SYD = Sum of the Years\' Digits');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(8) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNO` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `RoleID` int(2) NOT NULL,
  `Password` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `FirstName`, `LastName`, `Address`, `PhoneNO`, `Email`, `RoleID`, `Password`) VALUES
(1, 'Rachasak', 'Rackamnerd', '2037 Cost Avenue Hyattsville Maryland 20783', 2147483647, 'itpcc@gmail.com', 3, ''),
(2, 'Athicom', 'Fahpratanchai', '1391 Austin Secret Lane Salt Lake City Utah 84014', 2147483647, 'T@mleu.ng', 3, ''),
(3, 'Sutthiwat', 'Songboonkaew', '4883 Sherwood Circle Lafayette louisiana 70506', 2147483647, 'Rui@louis.lul', 3, ''),
(4, 'Wiroat', 'Saeheng', '3664 Locust Street Grand Rapids Michigan 49508', 2147483647, 'satoung@gmail.com', 3, ''),
(5, 'Bigboss', 'Tamleung', '4297 Roosevelt Street HOUTZDALE Pennsylvania 16698', 2147483647, 'bigboss@at.ti', 1, ''),
(6, 'Titsanu', 'Wantanatorn', '112/44 ถนนประชาอุทิศ แขวงบางมด เขตทุ่งครุ กรุงเทพมหานคร 12345', 11223344, 'tits@us.co', 3, ''),
(7, 'Sorachat', 'Panom', '15 suravad RTT road Bangkok 50500', 851684553, 'Ko@hotmail.com', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `roleandpermission`
--

CREATE TABLE `roleandpermission` (
  `RoleID` int(8) NOT NULL,
  `RoleName` varchar(30) NOT NULL,
  `PermissionLevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roleandpermission`
--

INSERT INTO `roleandpermission` (`RoleID`, `RoleName`, `PermissionLevel`) VALUES
(1, 'Adminstrator', 1),
(2, 'CEO', 2),
(3, 'Common Employee', 3),
(4, 'Client and Vendor', 4);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `VendorID` int(8) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `CompanyID` int(8) DEFAULT NULL,
  `VendorPhoneNO` varchar(10) NOT NULL,
  `VendorEmail` varchar(30) NOT NULL,
  `BuyLocation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`VendorID`, `FirstName`, `LastName`, `CompanyID`, `VendorPhoneNO`, `VendorEmail`, `BuyLocation`) VALUES
(1, 'Aksss', 'Badad', 2, '0809996456', 'Vendor1@gmail.com', NULL),
(2, 'ทดสอบ', 'อัดลงฐานข้อมูล', 1, '0863219383', 'id513128@gmail.com', 'fregtr15ghrt48hg1rt25h125rtyh45tyhyh'),
(3, 'ทดสอบนาจา', 'อัดลงฐานข้อมูลtrgrtg', 1, '0255885552', 'id513128@111gmail.com', 'ที่อยู่ไม่มั่วนาจา'),
(5, 'อีดิท', 'number 5', 1, '0851112454', 'id513128@gmail.com', 'fregfregfergerger'),
(7, 'Kek', 'Tammaitanlaew', 3, '0978998977', 'Vendor2@gmail.com', NULL),
(8, 'Last', 'Minute', 6, '0809996999', 'Vendor3@gmail.com', NULL),
(9, 'Satoung', 'Lomjow', NULL, '0801121121', 'Satoung112boykeke@gmail.com', NULL),
(10, 'Titand', 'Sanu', NULL, '0809996457', 'dummy3@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assetcategory`
--
ALTER TABLE `assetcategory`
  ADD PRIMARY KEY (`AssetClass`),
  ADD KEY `DepreciationType` (`DepreciationType`);

--
-- Indexes for table `assetlocation`
--
ALTER TABLE `assetlocation`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `assetlocationmovement`
--
ALTER TABLE `assetlocationmovement`
  ADD PRIMARY KEY (`MovementNO`),
  ADD KEY `LocationID` (`LocationID`,`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `AssetID` (`AssetID`);

--
-- Indexes for table `assetmain`
--
ALTER TABLE `assetmain`
  ADD PRIMARY KEY (`AssetID`),
  ADD KEY `LocationID` (`LocationID`,`EmployeeID`,`VendorID`),
  ADD KEY `AssetClass` (`AssetClass`),
  ADD KEY `DepreciationType` (`DepreciationType`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `VendorID` (`VendorID`);

--
-- Indexes for table `assetpurchase`
--
ALTER TABLE `assetpurchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `AssetID` (`AssetID`,`EmployeeID`,`VendorID`),
  ADD KEY `VendorID` (`VendorID`);

--
-- Indexes for table `assetsold`
--
ALTER TABLE `assetsold`
  ADD PRIMARY KEY (`SoldID`),
  ADD KEY `AssetID` (`AssetID`,`EmployeeID`,`ClientID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`),
  ADD KEY `CompanyID` (`CompanyID`,`RoleID`),
  ADD KEY `RoleID` (`RoleID`);

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
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `roleandpermission`
--
ALTER TABLE `roleandpermission`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`VendorID`),
  ADD KEY `CompanyID` (`CompanyID`);

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
  MODIFY `AssetID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `assetpurchase`
--
ALTER TABLE `assetpurchase`
  MODIFY `PurchaseID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `assetsold`
--
ALTER TABLE `assetsold`
  MODIFY `SoldID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contactedcompany`
--
ALTER TABLE `contactedcompany`
  MODIFY `CompanyID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roleandpermission`
--
ALTER TABLE `roleandpermission`
  MODIFY `RoleID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `VendorID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
