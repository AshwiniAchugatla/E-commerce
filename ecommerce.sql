-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 10:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Home and Kitchen', 'homeimprove.jpeg'),
(2, 'Tools and Home Improvements', 'tools.jpeg'),
(3, 'Furniture', 'Furniture.jpg'),
(4, 'Home Decor', 'decor.jpg'),
(5, 'Garden and Outdoors', 'garden.jpg'),
(6, 'Health and Personal Care', 'beauty.jpg'),
(7, 'Beauty', 'product.jpg'),
(8, 'Luggage and Bags', 'luggage.jpg'),
(9, 'Musical Instruments', 'musical-instruments.png'),
(10, 'Toys and Games', 'toys.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'aarush', 'aarush@gmail.com', 'Review', 'Hello'),
(2, 'Hiral Gadgi', 'hiralgadgi@gmail.com', 'Review', 'Very friendly to use');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cid`, `cname`, `name`, `image`, `description`, `quantity`, `mrp`, `discount`) VALUES
(2, 1, 'Home and Kitchen', 'Kitchen Sink', 'sink1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Jagger Stainless Steel Kitchen Sink Drain Waste Coupling or Waste Jali Used in Kitchen Sink (304 Grade Stainless Steel Material with Under Basket 4 INCH) (Made in India)</span></p>', 1, 899, 10),
(3, 1, 'Home and Kitchen', 'Kitchen Sink', 'sink2.jpg', '<h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"padding: 0px; margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; margin-bottom: 0px !important; font-size: 24px !important; line-height: 32px !important;\"><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"font-family: &quot;Times New Roman&quot;;\">KI Stainless Steel Heavy 3 Inch Coupling for Sink Drain Outlet (Silver)</span></h1>', 1, 449, 10),
(4, 1, 'Home and Kitchen', 'Wireless Electric Chopper', 'chopper.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Home Puff Japanese Technology Rechargeable Wireless Electric Chopper for Kitchen use, Vegetable Chopper for Kitchen, One Touch Operation, 10 Second Chopping, Stainless Steel Blades, Waterproof, with Warranty, 30W, 250ML</span></p>', 1, 719, 10),
(5, 1, 'Home and Kitchen', 'Mini Handy and Compact Chopper', 'chopper1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Pigeon Polypropylene Mini Handy and Compact Chopper with 3 Blades for Effortlessly Chopping Vegetables and Fruits for Your Kitchen (12420, Green, 400 ml)</span></p>', 1, 179, 10),
(6, 1, 'Home and Kitchen', 'Multipurpose Vegetable and Fruit Chopper', 'chopper2.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 24px; color: rgb(15, 17, 17); text-align: var(--bs-body-text-align);\">Amazon Brand - Solimo 11-in-1 Stainless Steel Multipurpose Vegetable and Fruit Chopper, Green</span></p>', 1, 449, 10),
(7, 1, 'Home and Kitchen', 'Dry Fruit Chopper', 'chopper3.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">TAZLYN Dry Fruits Cutter Slicer Fine Pack of 2 Smart Kitchen Gadgets for Home Dry Fruit Chopper Badam Cutter Machine Hand Nuts Cutter Chopper Slicer for Kitchen Items for Gift (Plastic)</span></p>', 1, 255, 10),
(8, 1, 'Home and Kitchen', 'Dry Fruit Slicer Cutter', 'chopper4.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">OZXI Stainless Steel, Plastic Vegetable and Dry Fruit Slicer Cutter Pack of 1.</span></p>', 1, 195, 10),
(9, 1, 'Home and Kitchen', 'Soap Holder', 'soapholder.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">SNOFER Leaf Shape Soap Box Self Draining Bathroom Soap Holder, Leafology Decorative Drainage Plastic Soap Dish, Bar Soap Holder with Draining Tray, Multicolour.</span></p>', 1, 129, 10),
(10, 1, 'Home and Kitchen', 'Soap Dish Holder', 'soapholder1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">MARMIX 1 Pack Soap Holder Leaf-Shape Self Draining Soap Dish Holder, Not Punched Easy Clean Bar Soap Holder, with Suction Cup Soap Dish Suitable for Shower, Bathroom, Kitchen Sink</span></p>', 1, 89, 0),
(11, 1, 'Home and Kitchen', 'Cleaning Wiper', 'wiper.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Window Cleaning Wiper, Car Windshield Cleaner Squeegee Plastic Glass Cleaner Silicone Blade Brush, Car-Cleaning Tool, All Purpose Squeegee (Multicolor)</span></p>', 1, 121, 10),
(12, 1, 'Home and Kitchen', 'Glass Wiper', 'wiper1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"font-family: &quot;Times New Roman&quot;; color: rgb(15, 17, 17); font-size: 24px; text-align: var(--bs-body-text-align);\">WANOTTA Rotatable Cleaning Glass Wiper for Window of Good Height with Bendable Head for Bathroom Cleaning, Car Cleaning, Floor Cleaning Double Side Squeegee</span></p>', 1, 989, 10),
(13, 1, 'Home and Kitchen', 'Door Mat', 'mat.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Status Polypropylene Anti Slip Floor Door Mat in Home Kitchen Office Entrance Mats (38x58 cm) (Grey)</span></p>', 1, 539, 10),
(14, 1, 'Home and Kitchen', 'Bathroom Carpet', 'mat1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Kintota Bathroom mat, Door Mat, Floor Mat, Bath Mat , Doormat , Bathroom Carpet | Non Slip mat for Bathroom Cushion Mat Super Absorbent Soft Carpet, Quick Dry Dirt Barrier for Home, Office, (40x60cm)</span></p>', 1, 899, 10),
(15, 1, 'Home and Kitchen', 'Mat', 'mat2.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">AEROHAVEN™ Glorious Super Soft Microfiber Abstract Moroccan Designer Anti Slip Bathmat (Blue, 50 cm x 180 cm (Runner))</span></p>', 1, 1799, 10),
(16, 1, 'Home and Kitchen', 'Wash Cloth for Kitchen', 'cloth.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">wolpin Microfiber Cleaning Cloths, 5 Pcs 25 x 25 cms Multi-Colour | Highly Absorbent, Lint and Streak Free, Multi -Purpose Wash Cloth for Kitchen, Car, Window, Stainless Steel, Silverware</span></p>', 1, 719, 10),
(17, 1, 'Home and Kitchen', 'Apron', 'apron.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">PIXEL HOME Cotton Apron&nbsp;100% Cotton Check Kitchen Apron&nbsp;with Front Center Pocket Best Design Apron</span></p>', 1, 198, 0),
(18, 1, 'Home and Kitchen', 'Wall Hanger Hooks', 'hook.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">KBS Wall Hanger Hooks for Hanging Clothes Strong Self Adhesive Magic Sticker Home Kitchen Office Bathroom Bedroom Door Organizers Accessories Items (TRANSPARENT-6-HOOK-HANGER)</span></p>', 1, 199, 0),
(19, 1, 'Home and Kitchen', 'Knife Set', 'knife.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Voltonix Stainless Steel 3 Pieces Professional Kitchen Knife Set/Meat Knife/Chef Knife with Non-Slip Handle Sharp Manual Sharpening for Home Kitchen/High Carbon Stainless Steel Knife Black Set (Black)</span></p>', 1, 1799, 10),
(20, 1, 'Home and Kitchen', 'Cleaning Brush Floor', 'brushfloor.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Eloxee Bathroom Cleaning Brush with Wiper 2 in 1 Tiles Cleaning Brush Floor Scrub Bathroom Brush with Long Handle 120° Rotate Bathroom Floor Cleaning Brush Home Kitchen Bathroom (Wiper MOP)</span></p>', 1, 899, 10),
(21, 2, 'Tools and Home Improvements', 'Tool Set', 'toolset.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">amazon basics 32 Piece Household Tool Set, steel alloy</span></p>', 1, 3300, 10),
(22, 2, 'Tools and Home Improvements', 'Wooden Claw Hammer', 'tool1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">VENEKETY 14in1 Multi Functional Multitool Stainless Steel and Wooden Claw Hammer Pack of 1</span></p>', 1, 899, 10),
(23, 2, 'Tools and Home Improvements', 'Mini Screwdriver Set', 'tool2.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Tec Tavakkal 32 in 1 Interchangeble Multipurpose Mini Screwdriver Set Magnetic Slot Wrench Bits Repair Tools Kit Set Combination Screwdriver Set for Home Appliance, Laptop, Mobile, Computer.</span></p>', 1, 990, 10),
(24, 2, 'Tools and Home Improvements', 'Scraper Tool', 'tool3.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">NEXT GEEK Glue Remover Cleaning Scraper Tool Double Edged Multipurpose Removing Paint, Labels, Sticker, 4 Piece Plastic Blades and 4 Piece Metal Blades</span></p>', 1, 629, 10),
(25, 2, 'Tools and Home Improvements', 'Multi-function Plier Tools', 'tool4.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">SHOPPOFOBIX 24in1 Multi-function Plier Tools Made of Stainless Steel with 11 Screwdriver bits Safety Hook, Bottle Opener, Multifunction Pliers (24 in 1 Multi-function Plier)</span></p>', 1, 1349, 10),
(26, 2, 'Tools and Home Improvements', 'Multifunctional Pliers', 'tool5.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">MYHEART 5 in 1 All Purpose Versatile Heavy Duty Tool Kit, Multifunctional Pliers, Dual-Color PVC Handle Pliers, Portable Tool Kit Household Hand Toolbox General Repair Screwdriver Pliers</span></p>', 1, 4499, 10),
(27, 2, 'Tools and Home Improvements', 'Plumbing Tool', 'tool6.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">KETSY 211 Plumbing Tool Kit Set of 3</span></p>', 1, 674, 10),
(28, 2, 'Tools and Home Improvements', 'Hammer Drill Machine and Hand Tool Kit', 'tool7.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">STANLEY SDH550KP 550W 10mm Corded Single Speed Hammer Drill Machine and Hand Tool Kit (120-Pieces) - Includes Hammer Drill, Measurement Tape, Drill Bits, Hammer, 1 Year Warranty, YELLOW &amp; BLACK</span></p>', 1, 2663, 10),
(29, 2, 'Tools and Home Improvements', 'Tree cutter', 'tool8.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span>﻿<span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 24px;=\"\" text-align:=\"\" var(--bs-body-text-align);\"=\"\">JD FRESH saw cutter tree cutting saw wood cutting saw Tree cutter tools wood saw Cut Professional Pruning Saw 12 inch Curved Blade Chromium Steel 3 Edge Sharpen Teeth Plastic Packing (HAND_SAW_LOCK)</span><p></p></p>', 1, 499, 10),
(30, 2, 'Tools and Home Improvements', 'Wire Crimping Tool', 'tool9.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Wire Crimping Tool Kit, Ferrule Crimping Tool, Self Adjusting Square Wire Crimper Plier for AWG23 7 with 1200pcs Assortment Ferrule Wire Copper Crimp Connector, Wiring Cable Connector</span></p>', 1, 1819, 10),
(33, 3, 'Furniture', 'Dining Table', 'dinningtable.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Amazon Brand - Solimo Melka 4-Seater Tempered Glass Dining Table with 4 Chairs (Wenge Finish)</span></p>', 1, 24299, 10),
(34, 3, 'Furniture', 'Wood TV Entertainment', 'tv.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Odestar Dax Engineered Wood TV Entertainment Unit Walnut &amp; White (Ideal for Upto 32\")</span></p>', 1, 1599, 10),
(35, 3, 'Furniture', 'Coffee Table', 'coffeetable.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Brown Art SHOPPEE Home Décor Furniture Round Side Coffee Table Sets,2 Piece MDF Top Couch Table,Stacking Nesting Table with Iron Frame for Living Room Living Room or Lounge (Gold &amp; White)</span></p>', 1, 3199, 10),
(36, 3, 'Furniture', 'Set Top Box Stand', 'settopbox.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Dime Store Engineered Wood Set Top Box Stand TV Stand WiFi Router Rack Wall Shelf for Living Room Stylish Hanging Rack Organizer Home Decor Furniture (Black)</span></p>', 1, 160, 0),
(37, 3, 'Furniture', 'Shoe Stand', 'shoestand.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">ABOUT SPACE 5-Tier Wooden Shoe Rack for Home (3.3 Ft) - Sturdy Slipper/Shoe Stand with Adjustable Bush - Shoe Storage Rack Organizer/Chappal Shelf - Footwear Stand for Indoor &amp; Outdoor L 2.5 X B 1 Ft</span></p>', 1, 4529, 10),
(38, 3, 'Furniture', 'Sofa Couch', 'couch.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 24px; color: rgb(15, 17, 17); text-align: var(--bs-body-text-align);\">ROUNDHILL FURNITURE 2 Seater Upholstered Ottoman Bench with Storage Settee Sofa Couch Button Tufted Pouffe for Living Room Bedroom Office (Sea Green)</span></p><div id=\"title_feature_div\" class=\"celwidget\" data-feature-name=\"title\" data-csa-c-type=\"widget\" data-csa-c-content-id=\"title\" data-csa-c-slot-id=\"title_feature_div\" data-csa-c-asin=\"B0BP2LDMHD\" data-csa-c-is-in-initial-active-row=\"false\" data-csa-c-id=\"kbz9u3-f1ejqy-l6v0rd-d93l4b\" data-cel-widget=\"title_feature_div\" style=\"color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"><div id=\"titleSection\" class=\"a-section a-spacing-none\" style=\"margin-bottom: 22px;\"><h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"padding: 0px; margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; margin-bottom: 0px !important; font-size: 24px !important; line-height: 32px !important;\"><span id=\"titleEDPPlaceHolder\"></span></h1><div><span class=\"a-size-large product-title-word-break\" style=\"text-rendering: optimizelegibility; word-break: break-word; line-height: 32px !important;\"><br></span></div></div><span class=\"edp-feature-declaration\" data-edp-feature-name=\"title\" data-edp-asin=\"B0BP2LDMHD\" data-data-hash=\"3511444501\" data-defects=\"[{&quot;id&quot;:&quot;defect-mismatch-info&quot;,&quot;value&quot;:&quot;Different from product&quot;},{&quot;id&quot;:&quot;defect-missing-information&quot;,&quot;value&quot;:&quot;Missing information&quot;},{&quot;id&quot;:&quot;defect-unessential-info&quot;,&quot;value&quot;:&quot;Unimportant information&quot;},{&quot;id&quot;:&quot;defect-incorrect-information&quot;,&quot;value&quot;:&quot;Incorrect information&quot;},{&quot;id&quot;:&quot;defect-other-productinfo-issue&quot;,&quot;value&quot;:&quot;Other&quot;}]\" data-metadata=\"CATALOG\" data-feature-container-id=\"productTitle\" data-custom-event-handler=\"productTitleEDPCustomEventHandler\" data-display-name=\"Product Name\" data-edit-data-state=\"productTitleEDPEditData\" data-position=\"1\" data-resolver=\"CQResolver\"></span></div><div id=\"qpeTitleTag_feature_div\" class=\"celwidget\" data-feature-name=\"qpeTitleTag\" data-csa-c-type=\"widget\" data-csa-c-content-id=\"qpeTitleTag\" data-csa-c-slot-id=\"qpeTitleTag_feature_div\" data-csa-c-asin=\"B0BP2LDMHD\" data-csa-c-is-in-initial-active-row=\"false\" data-csa-c-id=\"y2df78-90jv9w-i1mll4-6snunl\" data-cel-widget=\"qpeTitleTag_feature_div\" style=\"color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"></div><div id=\"bylineInfo_feature_div\" class=\"celwidget\" data-feature-name=\"bylineInfo\" data-csa-c-type=\"widget\" data-csa-c-content-id=\"bylineInfo\" data-csa-c-slot-id=\"bylineInfo_feature_div\" data-csa-c-asin=\"B0BP2LDMHD\" data-csa-c-is-in-initial-active-row=\"false\" data-csa-c-id=\"4daist-cahdh2-iwlhan-h69rqk\" data-cel-widget=\"bylineInfo_feature_div\" style=\"color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"></div>', 1, 7199, 10),
(39, 3, 'Furniture', 'Sofa', 'sofa.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Janzo Furnitures Living Room Traditional Designer Three Seater Sofa Wooden Legs for Home &amp; Office Furnitures (Color -Baby Pink)</span></p>', 1, 25099, 10),
(40, 3, 'Furniture', 'Sofa Set', 'sofaset.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 24px; color: rgb(15, 17, 17); text-align: var(--bs-body-text-align);\">FURNY Heaven 3 Seater Fabric Sofa Set (Beige)</span></p><div id=\"title_feature_div\" class=\"celwidget\" data-feature-name=\"title\" data-csa-c-type=\"widget\" data-csa-c-content-id=\"title\" data-csa-c-slot-id=\"title_feature_div\" data-csa-c-asin=\"B0C8GDR4ZY\" data-csa-c-is-in-initial-active-row=\"false\" data-csa-c-id=\"rr7jb-e64kpn-m3mhvo-q466d6\" data-cel-widget=\"title_feature_div\" style=\"color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"><div id=\"titleSection\" class=\"a-section a-spacing-none\" style=\"margin-bottom: 22px;\"><h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"padding: 0px; margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; margin-bottom: 0px !important; font-size: 24px !important; line-height: 32px !important;\"><span id=\"titleEDPPlaceHolder\"></span></h1><div><span class=\"a-size-large product-title-word-break\" style=\"text-rendering: optimizelegibility; word-break: break-word; line-height: 32px !important;\"><br></span></div></div><span class=\"edp-feature-declaration\" data-edp-feature-name=\"title\" data-edp-asin=\"B0C8GDR4ZY\" data-data-hash=\"2924234952\" data-defects=\"[{&quot;id&quot;:&quot;defect-mismatch-info&quot;,&quot;value&quot;:&quot;Different from product&quot;},{&quot;id&quot;:&quot;defect-missing-information&quot;,&quot;value&quot;:&quot;Missing information&quot;},{&quot;id&quot;:&quot;defect-unessential-info&quot;,&quot;value&quot;:&quot;Unimportant information&quot;},{&quot;id&quot;:&quot;defect-incorrect-information&quot;,&quot;value&quot;:&quot;Incorrect information&quot;},{&quot;id&quot;:&quot;defect-other-productinfo-issue&quot;,&quot;value&quot;:&quot;Other&quot;}]\" data-metadata=\"CATALOG\" data-feature-container-id=\"productTitle\" data-custom-event-handler=\"productTitleEDPCustomEventHandler\" data-display-name=\"Product Name\" data-edit-data-state=\"productTitleEDPEditData\" data-position=\"1\" data-resolver=\"CQResolver\"></span></div><div id=\"qpeTitleTag_feature_div\" class=\"celwidget\" data-feature-name=\"qpeTitleTag\" data-csa-c-type=\"widget\" data-csa-c-content-id=\"qpeTitleTag\" data-csa-c-slot-id=\"qpeTitleTag_feature_div\" data-csa-c-asin=\"B0C8GDR4ZY\" data-csa-c-is-in-initial-active-row=\"false\" data-csa-c-id=\"zuod7-sr4pdf-4blvq1-pjmc2f\" data-cel-widget=\"qpeTitleTag_feature_div\" style=\"color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"></div><div id=\"bylineInfo_feature_div\" class=\"celwidget\" data-feature-name=\"bylineInfo\" data-csa-c-type=\"widget\" data-csa-c-content-id=\"bylineInfo\" data-csa-c-slot-id=\"bylineInfo_feature_div\" data-csa-c-asin=\"B0C8GDR4ZY\" data-csa-c-is-in-initial-active-row=\"false\" data-csa-c-id=\"ij9h3x-ofdfgv-8k5yif-dxmujb\" data-cel-widget=\"bylineInfo_feature_div\" style=\"color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"></div>', 1, 22288, 10),
(41, 3, 'Furniture', 'L Shape Sofa Set', 'sofa1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Casaliving - Heine RHS 6 Seater L Shape Sofa Set for Living Room (Blue &amp; Grey Fabric) (6S-RHS)</span></p>', 1, 18199, 10),
(42, 3, 'Furniture', 'Wooden Sofa Set', 'sofa2.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">wopno Furniture Pure Sheesham Wooden 5 Seater Sofa Set for Living Room and Office |Termite Free|Wooden Sofa Set 3+1+1 Seater Sofa for Home(Honey with Burgandy Cushion)</span></p>', 1, 29945, 10),
(43, 3, 'Furniture', 'Trolley Rack', 'Trolley.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Vesty 4 Layer Plastic Kitchen Storage Trolley Rack with Caster Wheels, Rolling Utility Cart Slide Out Storage Shelves Space Saving Home Storage Organizer Racks, White (4 Layer)</span></p>', 1, 809, 10),
(44, 3, 'Furniture', 'Bed Side Table', 'bedsidetable.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"font-weight: initial; text-align: var(--bs-body-text-align); font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"font-weight: initial; text-align: var(--bs-body-text-align); color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px;\">Twist Home Small Round Side Table, 2 Tier Wooden End Table/Bed Side Table/Nightstand for Living Room/Bedroom/Small Space Home décor Living Room Bedroom Furniture-Golden White</span></p>', 1, 2999, 10),
(45, 3, 'Furniture', 'Bookshelf', 'Bookshelf.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Vinod Handicraft Solid SHEESHAM Wood Bookshelf Bookcase with Drawer | Floor Standing Bookcase | Living Room Furniture | BOOKCASES | Furniture | Natural Finish</span></p>', 1, 6299, 10),
(46, 3, 'Furniture', 'Garden Coffee Table', 'gardencoffeetable.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Corazzin Garden Patio Seating Chair and Table Set Outdoor Balcony Garden Coffee Table Set Furniture with 1 Table and 4 Chairs Set (Black)</span></p>', 1, 12999, 10),
(47, 3, 'Furniture', 'Balcony Table Set', 'balconytable.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">AAKARSHAK India 2+1 Outdoor Indoor Patio Furniture Sets Rattan Chair Patio Set Conversation Set Poolside Lawn Chairs Swingarea Balcony .Outdoor Garden Furniture Chair with Cushion (Cream &amp; Yellow)</span></p>', 1, 8099, 10),
(48, 3, 'Furniture', 'Wall Rack Shelves', 'wallrack.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Wooden Cave Handicraft Wooden Wall Rack Shelves (White) Set of 4 (Extra Large, Large, Medium and Small) for Living Room, Bedroom, Office, Kids Room and for Wall Decor and Home Decor</span></p>', 1, 790, 0),
(49, 3, 'Furniture', 'Study Table', 'Study Table.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Decoration Well Finished Study Table Desk, Reading Table, Wood Table, Writing Desk for Home and Office Made of MDF Solid Wood (White)</span></p>', 1, 7199, 10),
(50, 3, 'Furniture', 'Chair', 'chair.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Vergo Plush Dining Chair | Accent Chair for Living Room Bedroom Restuarant | Velvet Fabric &amp; Cushion Seat with Rosegold Metal Legs (Light Grey)</span></p>', 1, 7990, 10),
(51, 3, 'Furniture', 'Office Chair', 'office chair.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Amazon Brand - Solimo Aim Office Chair with Tilting Mechanism, Height-Adjustable, Nylon Base, Mesh Back (Black)</span></p>', 1, 7999, 10),
(52, 3, 'Furniture', 'Rolling Trolley', 'Rollingtrolley.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">KAUNOPILIS® Rolling Utility Cart, 3 Tier Mobile Storage Trolley Cart Organizer with Handle and Wheels for Home Bathroom Kitchen Office Library Salon Outdoor Use Cosmic Black (3 Tier ABS Trolley)</span></p>', 1, 3499, 10),
(53, 3, 'Furniture', 'Plastic Chair', 'chair1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Nilkamal CHR2180 Plastic Mid Back with Arm Chair | Chairs for Home| Dining Room| Bedroom| Kitchen| Living Room| Office - Outdoor - Garden |Dust Free|100% Polypropylene Stackable Chairs |Set of 2|Brown</span></p>', 2, 2699, 10),
(54, 3, 'Furniture', 'Revolving Chair', 'revolvingchair.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">beAAtho® Rio Executive High Back Revolving Office Chair/Director/Desk Chair with 3 Years Warranty(Black).</span></p>', 1, 8400, 10),
(55, 3, 'Furniture', 'Swing Chair', 'swingchair.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">SPYDER CRAFT Single Seater Swing Chair with Stand &amp; Cushion &amp; Hook Outdoor Indoor, Outdoor Balcony Garden, Powder Coated Frame, UV Protected Wicker</span></p>', 1, 9800, 10),
(56, 3, 'Furniture', 'Relaxing Chair', 'relaxchair.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Unique Wood Store Rocking Chair with Footrest and Cushion Comfort Relax/Rolling Chair for Adults</span></p>', 1, 14480, 10),
(57, 3, 'Furniture', 'Bar Stool', 'barstool.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">SAVYA Home® Curvy Kitchen Stool / BAR Stool (Qty-1) (Martin, Black &amp; Chrome)</span></p>', 1, 3577, 10),
(58, 3, 'Furniture', 'Metallic Stool', 'stool.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">LUSHLIN Semi Round Multipurpose Cushioned Metallic Stool with Golden Frame Ottoman for Sitting, Foot Rest, Vanity Seat, Dressing Table (33 x 30 x 40) CM, Pack of 1 (Pack of 1, Green)</span></p>', 1, 2990, 10),
(59, 4, 'Home Decor', 'Wall Clock', 'clock.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">GULLI BULLI Metal Wall Clock Stylish For Living Bed Room Home Decor Art A Hanging Decorative Showpiece Item 32 X 16 Inch (Wdc013), White</span></p>', 1, 2999, 10),
(60, 4, 'Home Decor', 'Wall Art', 'wallart.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">NexHome Multicolor Classic Golden &amp; Black Shade Floral Acrylic Wall Art Painting For Home Living Room and Bedroom Wall Decor Art (17 x 11.5 Inch)</span></p>', 1, 1499, 10),
(61, 4, 'Home Decor', 'Wall Hanger', 'Hanger.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Artvibes Good Vibes Only Decorative Wall Art MDF Wooden Hanger for Living Room | Bedroom | Home Decor | Office | Gift | Quotes Item | Wall Hanging For House Decoration | Wall Art(WH_6502N)</span></p>', 1, 269, 10),
(62, 4, 'Home Decor', 'Monks Buddha Figurines', 'buddha.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">eCraftIndia Colorful 4 Monks Buddha Figurines - for Home Decor| Office Decor| Chrismas Decor| Diwali Decor| Vaastu Decor| Fengshui</span></p>', 1, 295, 0),
(63, 4, 'Home Decor', 'Crystal Tree Showpiece', 'tree.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">PREK Seven Chakra Crystals and Gemstones, Seven Chakra Crystal Tree Showpiece for Good Luck Home Decor Item Bonsai Money Tree Plant Gift Item Figurine Standard Size - Multicolor, 1 Piece</span></p>', 1, 599, 10),
(64, 4, 'Home Decor', 'Decor Elephant', 'decor1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">SRJANA Home Decor Elephant Family Matte Finish Ceramic Figurines - (Set of 3, Matte Brown)</span></p>', 1, 749, 10),
(65, 4, 'Home Decor', 'Round Wall Mirror', 'mirror.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Saaz Macrame Fringe Round Wall Mirror Hanging Bohemian Handmade Boho Cotton Thread Art for Apartment Living Bedroom Room Wall Hanging Mirror Home decor Items. White, Framed</span></p>', 1, 499, 0),
(66, 4, 'Home Decor', 'Copper Diya', 'diya.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">R Ayurveda Copper Diya Shape Flower Decorative Urli Handcrafted Bowl for Floating Flowers and Tea Light Candles Home,Office and Table Decor| Diwali Decoration Items for Home (10 Inches)</span></p>', 1, 349, 0),
(67, 4, 'Home Decor', 'Flameless & Smokeless Light', 'light.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">SATYAM KRAFT 12 Pcs Acrylic Flameless &amp; Smokeless Decorative Candles Led Tea Light Perfect for Gifts; Home; Christmas (12 Piece; Yellow; 2 cm)</span></p>', 1, 299, 0),
(68, 4, 'Home Decor', 'Wind Chimes', 'chimes.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Paradigm Pictures Home Decoration Items Wind Chimes for Home (Golden, Pipe &amp; Hanging Bells)</span></p>', 1, 579, 10),
(69, 4, 'Home Decor', 'Candle Holder Glass', 'glass.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Vijyas Set of 6 Tealight Candle Holder Glass Votive for Wedding, Birthday, Holiday &amp; Home Decoration (Clear, Pack of 6)</span></p>', 1, 279, 0),
(70, 4, 'Home Decor', 'Flower Vase', 'vase.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">TIED RIBBONS Set of 2 Glass Flower Vase Decorative Items for Home Decor Living Room Bedroom Table Top Office Birthdate Wedding Decoration</span></p>', 1, 579, 0),
(71, 4, 'Home Decor', 'Artificial Plant', 'plant.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Ryme Small Mini Set of 4 Bonsai Wild Artificial Plant with Pot Artificial Potted Plants Set of 4 Home Decor Indoor Small Plants Pot Flowers for Table Desk Decoration (15 cm, Multicolor)</span></p>', 1, 599, 10),
(72, 4, 'Home Decor', 'Ceiling Lights', 'Ceiling Lights.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Homesake Hanging Light 3-Round Cluster, Ceiling Lights for Home Decoration, Pendant Light, Home Decor Items for Living Room, Chandelier for Living Room Modern, Balcony Decor, Diwali Decoration Items for Home Decor - Black, Pack of 1</span></p>', 1, 2089, 10),
(73, 4, 'Home Decor', 'Crystal Ceiling Light Glass Chandelier', 'Chandelier.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">GANE-SHART GA Two Color Crystal Ceiling Light Glass Chandelier Stainless Steel Rectangular Modern Led Light Home Decor Light for Hall, 9 inch Width</span></p>', 1, 2600, 10),
(74, 4, 'Home Decor', 'Key Holder', 'keyholder.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">SHREE RAM IMPEX Wooden Home Design Key Holder for Wall Decor Key Chain Hook Stand Wall Mounted Key Organizer for Home and Office Décor for Entryway Front Door Kitchen Hallway Garage</span></p>', 1, 399, 0),
(75, 4, 'Home Decor', 'Curtains', 'Curtains.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">BFAM Store Thermal Insulated 100% Blackout Curtains with White Liner, Double Layer Full Room Darkening Noise Reducing Rod Pocket Curtain-Premium Segment (Set of 1PC) (Grey, 7 FT Long (84inch))</span></p>', 1, 1019, 10),
(76, 4, 'Home Decor', 'Cushion Cover', 'Cushion Cover.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">BALLEY Silk Decorative Golden Leaf Striped Pillow Cover Bedroom &amp; Living Room Cushion Cover Set Sofa 16 X 16 Inches (Set of 5) (Beige)</span></p>', 1, 599, 10),
(77, 4, 'Home Decor', 'Testtube Glass Item Decor', 'testtubeglass.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Home Trends India Propagation Station with Metal Frame Testube Glass Item Gift Home Decor Bedroom Office Corner Living Room Decoration (Pack of 1)</span></p>', 2, 1000, 10),
(78, 4, 'Home Decor', 'Wall Decor with Frame', 'decor2.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Bharat Glass Wall Art Set of 3 Golden Ginkgo Leaves With Deer Wall Hanging Metal Wall Decor with Frame, Wall Decor For Living Room, Golden Metal Art Wall Sculpture for Bedroom, Office, Study.</span></p>', 1, 2260, 10),
(79, 5, 'Garden and Outdoors', 'Garden Light', 'light1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">CBK Firefly Outdoor Solar Lights | 6 LED | Starburst Swaying Solar Garden Light, Warm Garden Light | Outdoor Decoration | Waterproof | Path Lights for Pots, Balcon, Pathway (4)</span></p>', 1, 1449, 10),
(80, 5, 'Garden and Outdoors', 'Led Lotus', 'lotus.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Homehop Solar Outdoor String Lights 30 Led Lotus Shape for Home Garden Balcony Terrace, Lawn Wall Waterproof Rechargeable Decorative Lamp Diwali Decoration Item (6.5m,WarmColor)</span></p>', 1, 599, 10),
(81, 5, 'Garden and Outdoors', 'Pathway Lights', 'light2.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">hardoll Steel Led Solar Pathway Lights For Home Outdoor Garden Waterproof Decoration Warm White(Pack Of 1)</span></p>', 1, 460, 10),
(82, 5, 'Garden and Outdoors', 'Artifact Turtle', 'turtoise.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Garden Art Artifact Turtle with 7 LED, Garden Decor Statue with Solar Light for Outdoor Garden Ornament for Outside, Yard Lawn Outdoor Decoration, Gifts Turtle Garden Decorations (GASLT-7)</span></p>', 1, 2048, 10),
(83, 5, 'Garden and Outdoors', 'Garden Sprinker', 'sprinker.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Optifit® Garden Sprinker for Garden Agriculture Watering, 360° Rotating Irrigation Sprinkler Adjustable Irrigation Angle Sprinkler, Gardening Watering Systems for Outdoor Garden Yard Lawns</span></p>', 1, 499, 10),
(84, 5, 'Garden and Outdoors', 'Umbrella', 'Umbrella.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">OUTO Outdoor Garden Umbrella with Stand Holder 7ft Big Size Water Resistant Heavy Duty Cloth Patio for Rain &amp; Sun Protection</span></p>', 1, 1459, 10),
(85, 5, 'Garden and Outdoors', 'Plastic Pot', 'pot.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">E ERA UV Treated Plastic Pot Yellow Color - Heavy Duty Plant Container Gamla for Indoor Home Decor &amp; Outdoor Balcony Garden</span></p>', 1, 269, 10),
(86, 5, 'Garden and Outdoors', 'Camping / Picnic Folding Table', 'table.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">DHVAJA 4.5ft Large Metal Desktop, Camping/Picnic Folding Table with 2 Side Wing Panels, Aluminum Metal Mesh Outdoor Cooking Table (Black)</span></p>', 1, 5999, 10),
(87, 5, 'Garden and Outdoors', 'Bench', 'bench.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Takasho Steel Indoor Outdoor Garden Lovers Metal Bench for Patio Balcony Terrace Large Black</span></p>', 1, 2899, 10),
(88, 5, 'Garden and Outdoors', 'Lamp', 'lamp.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">hardoll Solar Lights Outdoor 2 LED for Home Garden Wall Decorative Waterproof Lamps(Pack of 1)</span></p>', 1, 498, 10),
(89, 5, 'Garden and Outdoors', 'Metal Flower Pot', 'pot1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Hurera Ceraft Metal Plant Pot with Stand, Pack of 1 | White Flower Indoor Planter | Living Room Outdoor Garden | Office Desk Pot with Gold Metal Stand (Medium)</span></p>', 1, 699, 10),
(90, 5, 'Garden and Outdoors', 'Wall Step Light Lamp', 'lamp1.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">PIXORA 4 Way Oval Up Down LED Outdoor Waterproof IP65 Exterior Wall Step Light Fixture Lamp (Warm White, Black Body) 8 Watts, Aluminium</span></p>', 1, 1199, 10),
(91, 5, 'Garden and Outdoors', 'Swing Roof Jhula', 'swing.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Home &amp; Garden Swing Outdoor Canopy Metal Swing Roof Jhula 3 Seater(Grey,Brown)</span></p>', 1, 23900, 10),
(92, 5, 'Garden and Outdoors', 'Water Blades', 'Blades.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Huma Fountains and Pools Stainless Steel Cascade Blade Nozzle, Water DESENT, Water Blades, Water Fountain (5 FEET)</span></p>', 1, 20999, 10),
(93, 5, 'Garden and Outdoors', 'Grass Mat', 'mat3.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">TAVASYA 40 MM Artificial Green Grass Mat 2 Feet X 2 Feet for Home Decor_Balcony_Floor Carpet_Terrace_Lawn and Garden_Decoration TAGMT2</span></p>', 1, 550, 10),
(94, 5, 'Garden and Outdoors', 'Watering Can', 'can.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Go Hooked Watering and Spray Dual-use Watering Can Garden Tool Watering Sprayer Bottle 1 L (Assorted Color)</span></p>', 1, 599, 10),
(95, 6, 'Health and Personal Care', 'Ear Cleaner Tool Set', 'niddle.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Boldfit Ear Wax Cleaner - Resuable Ear Cleaner Tool Set with Storage Box - Ear Wax Remover Tool Kit with Ear Curette Cleaner and Spring Ear Buds Cleaner - 6 Pc, (EarCleaner6Pcs)</span></p>', 1, 359, 10),
(96, 6, 'Health and Personal Care', 'Foot Patch ', 'foot.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">JIAVAXA Detox Organic Health Foot Patch Remove, Pain Free Foot Pads for Stress Relief Sleep, Natural ingredients Toxins Ginger Foot Detox Pads For Adhesive Foot And Body Cleansing (10 Pads)</span></p>', 1, 299, 10),
(97, 6, 'Health and Personal Care', 'Tongue Cleaners', 'Tongue Cleaners.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Indischen™ Pure Copper Ayurvedic Tongue Scraper. Health &amp; Personal Care Personal Care Oral Care Breath Fresheners Tongue Cleaners. Set of 3</span></p>', 1, 610, 10),
(98, 6, 'Health and Personal Care', 'Weight Machine', 'Weight Machine.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Health Sense Weight Machine for Body Weight, Digital Weighing Scale &amp; Weighing Machines with Strong ABS Build Body, Step-On Technology, Ultra Lightweight, Large LCD Display with Backlight, Skid Proof &amp; 1 Year Warranty, Ultra-Lite PS 126 (Grey)</span></p>', 1, 1499, 10),
(99, 6, 'Health and Personal Care', 'Foot Scrubber Roller', 'footscrub.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">ZAEGO Electronic And Rechargeble Foot Scrubber Roller Tool Feet Care Callus Remover Care Pedicure Pedi for Hard Cracked Health - Spa Choice Skin Massager Velvet Smooth Express Pedi Foot File with Diamond Crystal Personal Pedi.(multicolor)</span></p>', 1, 899, 10),
(100, 6, 'Health and Personal Care', 'Weight Loss Machine', 'weightloss.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">ARG Healthcare weight loss machine women / weight loss machine belly fat / Crazy Fit Vibrator / Big Size Massager for home and Gym Workout for Muscle Toning, Model with Digital Display Speed Up to 120 Leve</span></p>', 1, 9909, 10);
INSERT INTO `product` (`id`, `cid`, `cname`, `name`, `image`, `description`, `quantity`, `mrp`, `discount`) VALUES
(101, 6, 'Health and Personal Care', 'Silicon Heel Pad', 'heelpain.jpg', '<h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"padding: 0px; margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; margin-bottom: 0px !important; font-size: 24px !important; line-height: 32px !important;\"><span id=\"productTitle\" class=\"a-size-large product-title-word-break\" style=\"text-rendering: optimizelegibility; word-break: break-word; line-height: 32px !important; font-family: &quot;Times New Roman&quot;;\">Vn Care Silicon Heel Pad For Women Pain Relief, Heel Protector For Women, Heel Pain Relief Products For Women, Anti Crack Heel Socks, Silicon Gel Heel Pad For Men &amp; Women (HALF HEEL)</span></h1>', 1, 659, 10),
(102, 6, 'Health and Personal Care', 'Face Razor', 'razor.jpg', '<h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"padding: 0px; margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; margin-bottom: 0px !important; font-size: 24px !important; line-height: 32px !important;\"><span id=\"productTitle\" class=\"a-size-large product-title-word-break\" style=\"text-rendering: optimizelegibility; word-break: break-word; line-height: 32px !important; font-family: &quot;Times New Roman&quot;;\">Carmesi Reusable Face Razor for Women Facial Hair- 3 Razors | Instant &amp; Painless Hair Removal | For Eyebrows, Upper Lip, Forehead, Peach Fuzz, Chin and Sideburns | Dermaplaning Tool</span></h1>', 1, 299, 10),
(103, 6, 'Health and Personal Care', 'Hair Removal', 'Hair Removal.jpg', '<h1 id=\"title\" class=\"a-size-large a-spacing-none\" style=\"padding: 0px; margin-right: 0px; margin-left: 0px; text-rendering: optimizelegibility; color: rgb(15, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; margin-bottom: 0px !important; font-size: 24px !important; line-height: 32px !important;\"><span id=\"productTitle\" class=\"a-size-large product-title-word-break\" style=\"text-rendering: optimizelegibility; word-break: break-word; line-height: 32px !important; font-family: &quot;Times New Roman&quot;;\">Gillette Venus Simply Venus Pink Hair Removal for Women - 5 razors (Buy 4,Get 1 free)</span></h1>', 1, 299, 10),
(104, 6, 'Health and Personal Care', 'Sanitizer Spray', 'Sanitizer Spray.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Eyetech et21 Portable Mini Nano Sanitizer Spray Machine for Currency, Car, Home, Office, Bank, Mobile Care Personal Use</span></p>', 1, 459, 10),
(105, 6, 'Health and Personal Care', 'Tongue Cleaner', 'Tongue Cleaner.jpg', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿</span><span style=\"color: rgb(15, 17, 17); font-family: &quot;Times New Roman&quot;; font-size: 24px; text-align: var(--bs-body-text-align);\">Nurpi plastic single handle Tongue Cleaner for Fights Bad Breath Oral Health Care Tool, Easy to Use for Adults and KidsTravel Friendly (pack of 5)</span></p>', 1, 299, 10);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `mobileno`, `address`, `country`, `city`, `state`, `pin`) VALUES
(1, 'Ashwini Achugatla', 'ashwiniachugatla@gmail.com', 9404927827, 'Akkalkot Road', 'India', 'Solapur', 'Maharashtra', 413005),
(2, 'Divya Konda', 'divyakonda100@gmail.com', 8767875755, 'MIDC Road', 'India', 'Solapur', 'Maharashtra', 413006),
(3, 'Krishnaveni Khande', 'krishnavenikhande96@gmail.com', 842186987, 'Near WIT College', 'India', 'Solapur', 'Maharashtra', 413005),
(4, 'Ashwini Kembhavi', 'ashwinikembhavi0865@gmail.com', 9096930802, 'Airport Rd, Yerawada', 'India', 'Pune', 'Maharashtra', 411006);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`order_id`, `name`, `mobileno`, `address`, `country`, `city`, `state`, `pin`, `payment`) VALUES
(1, 'Ashwini Achugatla', 9404927827, 'Akkalkot Road', 'India', 'Solapur', 'Maharashtra', 413005, 'cash'),
(2, 'Ashwini Achugatla', 9404927827, 'Akkalkot Road', 'India', 'Solapur', 'Maharashtra', 413005, 'banktransfer'),
(3, 'Ashwini Kembhavi', 9096930802, 'Airport Rd, Yerawada', 'India', 'Pune', 'Maharashtra', 411006, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `userorders`
--

CREATE TABLE `userorders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userorders`
--

INSERT INTO `userorders` (`order_id`, `name`, `mrp`, `quantity`) VALUES
(2, 'Wall Hanger', 269, 1),
(2, 'Round Wall Mirror', 499, 1),
(2, 'Sanitizer Spray', 459, 1),
(2, 'Artifact Turtle', 2048, 1),
(3, 'Wireless Electric Chopper', 719, 1),
(3, 'Multipurpose Vegetable and Fruit Chopper', 449, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
