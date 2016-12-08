-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2016 at 03:37 PM
-- Server version: 5.5.50-MariaDB
-- PHP Version: 5.6.28

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
-- Table structure for table `AssetCategory`
--

CREATE TABLE `AssetCategory` (
  `AssetClass` varchar(10) NOT NULL,
  `ClassDefinition` varchar(50) NOT NULL,
  `DepreciationType` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AssetLocation`
--

CREATE TABLE `AssetLocation` (
  `LocationID` varchar(8) NOT NULL,
  `LocationName` varchar(50) NOT NULL,
  `LocationAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AssetLocationMovement`
--

CREATE TABLE `AssetLocationMovement` (
  `MovementNO` int(8) NOT NULL,
  `AssetID` varchar(8) NOT NULL,
  `LocationID` varchar(8) NOT NULL,
  `NewLocationID` varchar(8) NOT NULL,
  `NewLocationName` varchar(50) NOT NULL,
  `TranferDate` date NOT NULL,
  `EmployeeID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AssetMain`
--

CREATE TABLE `AssetMain` (
  `AssetID` varchar(8) NOT NULL,
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
-- Table structure for table `AssetPurchase`
--

CREATE TABLE `AssetPurchase` (
  `PurchaseID` int(8) NOT NULL,
  `AssetID` varchar(8) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `PurchasePrice` int(10) NOT NULL,
  `EmployeeID` int(8) NOT NULL,
  `VendorID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AssetSold`
--

CREATE TABLE `AssetSold` (
  `SoldID` int(8) NOT NULL,
  `AssetID` varchar(8) NOT NULL,
  `SoldDate` date NOT NULL,
  `SoldPrice` int(10) NOT NULL,
  `EmployeeID` int(8) NOT NULL,
  `ClientID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
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
-- Table structure for table `ContactedCompany`
--

CREATE TABLE `ContactedCompany` (
  `CompanyID` int(8) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `CompanyAddress` varchar(100) NOT NULL,
  `CompanyPhoneNO` int(10) NOT NULL,
  `CompanyFaxNO` varchar(15) DEFAULT NULL,
  `CompanyEmail` varchar(20) DEFAULT NULL,
  `SecondaryPhoneNO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DepreciationKey`
--

CREATE TABLE `DepreciationKey` (
  `DepreciationType` varchar(2) NOT NULL,
  `DepreciationDef` varchar(100) NOT NULL,
  `DepreciationMethod` varchar(50) NOT NULL,
  `DepreciationConstraint` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
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
-- Table structure for table `RoleAndPermission`
--

CREATE TABLE `RoleAndPermission` (
  `RoleID` int(2) NOT NULL,
  `RoleName` varchar(30) NOT NULL,
  `PermissionLevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Vendor`
--

CREATE TABLE `Vendor` (
  `VendorID` int(8) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `CompanyID` int(8) DEFAULT NULL,
  `VendorPhoneNO` int(10) NOT NULL,
  `VendorEmail` varchar(30) NOT NULL,
  `BuyLocation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AssetCategory`
--
ALTER TABLE `AssetCategory`
  ADD PRIMARY KEY (`AssetClass`),
  ADD KEY `DepreciationType` (`DepreciationType`);

--
-- Indexes for table `AssetLocation`
--
ALTER TABLE `AssetLocation`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `AssetLocationMovement`
--
ALTER TABLE `AssetLocationMovement`
  ADD PRIMARY KEY (`MovementNO`),
  ADD KEY `LocationID` (`LocationID`,`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `AssetID` (`AssetID`);

--
-- Indexes for table `AssetMain`
--
ALTER TABLE `AssetMain`
  ADD PRIMARY KEY (`AssetID`),
  ADD KEY `LocationID` (`LocationID`,`EmployeeID`,`VendorID`),
  ADD KEY `AssetClass` (`AssetClass`),
  ADD KEY `DepreciationType` (`DepreciationType`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `VendorID` (`VendorID`);

--
-- Indexes for table `AssetPurchase`
--
ALTER TABLE `AssetPurchase`
  ADD PRIMARY KEY (`PurchaseID`),
  ADD KEY `AssetID` (`AssetID`,`EmployeeID`,`VendorID`),
  ADD KEY `VendorID` (`VendorID`);

--
-- Indexes for table `AssetSold`
--
ALTER TABLE `AssetSold`
  ADD PRIMARY KEY (`SoldID`),
  ADD KEY `AssetID` (`AssetID`,`EmployeeID`,`ClientID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ClientID`),
  ADD KEY `CompanyID` (`CompanyID`,`RoleID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `ContactedCompany`
--
ALTER TABLE `ContactedCompany`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `DepreciationKey`
--
ALTER TABLE `DepreciationKey`
  ADD PRIMARY KEY (`DepreciationType`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `RoleAndPermission`
--
ALTER TABLE `RoleAndPermission`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `Vendor`
--
ALTER TABLE `Vendor`
  ADD PRIMARY KEY (`VendorID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AssetLocationMovement`
--
ALTER TABLE `AssetLocationMovement`
  MODIFY `MovementNO` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AssetPurchase`
--
ALTER TABLE `AssetPurchase`
  MODIFY `PurchaseID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AssetSold`
--
ALTER TABLE `AssetSold`
  MODIFY `SoldID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `ClientID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ContactedCompany`
--
ALTER TABLE `ContactedCompany`
  MODIFY `CompanyID` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `EmployeeID` int(8) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `AssetCategory`
--
ALTER TABLE `AssetCategory`
  ADD CONSTRAINT `AssetCategory_ibfk_1` FOREIGN KEY (`DepreciationType`) REFERENCES `DepreciationKey` (`DepreciationType`);

--
-- Constraints for table `AssetLocationMovement`
--
ALTER TABLE `AssetLocationMovement`
  ADD CONSTRAINT `AssetLocationMovement_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`),
  ADD CONSTRAINT `AssetLocationMovement_ibfk_2` FOREIGN KEY (`LocationID`) REFERENCES `AssetLocation` (`LocationID`),
  ADD CONSTRAINT `AssetLocationMovement_ibfk_3` FOREIGN KEY (`AssetID`) REFERENCES `AssetMain` (`AssetID`);

--
-- Constraints for table `AssetMain`
--
ALTER TABLE `AssetMain`
  ADD CONSTRAINT `AssetMain_ibfk_5` FOREIGN KEY (`LocationID`) REFERENCES `AssetLocation` (`LocationID`),
  ADD CONSTRAINT `AssetMain_ibfk_1` FOREIGN KEY (`AssetClass`) REFERENCES `AssetCategory` (`AssetClass`),
  ADD CONSTRAINT `AssetMain_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`),
  ADD CONSTRAINT `AssetMain_ibfk_3` FOREIGN KEY (`DepreciationType`) REFERENCES `DepreciationKey` (`DepreciationType`),
  ADD CONSTRAINT `AssetMain_ibfk_4` FOREIGN KEY (`VendorID`) REFERENCES `Vendor` (`VendorID`) ON UPDATE CASCADE;

--
-- Constraints for table `AssetPurchase`
--
ALTER TABLE `AssetPurchase`
  ADD CONSTRAINT `AssetPurchase_ibfk_1` FOREIGN KEY (`AssetID`) REFERENCES `AssetMain` (`AssetID`),
  ADD CONSTRAINT `AssetPurchase_ibfk_2` FOREIGN KEY (`VendorID`) REFERENCES `Vendor` (`VendorID`);

--
-- Constraints for table `AssetSold`
--
ALTER TABLE `AssetSold`
  ADD CONSTRAINT `AssetSold_ibfk_1` FOREIGN KEY (`AssetID`) REFERENCES `AssetMain` (`AssetID`),
  ADD CONSTRAINT `AssetSold_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`),
  ADD CONSTRAINT `AssetSold_ibfk_3` FOREIGN KEY (`ClientID`) REFERENCES `Client` (`ClientID`);

--
-- Constraints for table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `Client_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `RoleAndPermission` (`RoleID`),
  ADD CONSTRAINT `Client_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `ContactedCompany` (`CompanyID`);

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `Employee_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `RoleAndPermission` (`RoleID`);

--
-- Constraints for table `Vendor`
--
ALTER TABLE `Vendor`
  ADD CONSTRAINT `Vendor_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `ContactedCompany` (`CompanyID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
