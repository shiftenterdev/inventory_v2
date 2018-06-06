/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : inventory

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-06-06 08:55:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES ('1', 'Apple', '/media-src/photos/1/brand/knowledge_graph_logo.png', '2018-03-28 01:11:05', '2018-03-27 19:11:05');
INSERT INTO `brands` VALUES ('2', 'Samsung', '/media-src/photos/1/brand/samsung-logo-191-1.jpg', '2018-03-28 01:13:04', '2018-03-27 19:13:04');
INSERT INTO `brands` VALUES ('3', 'Philips', '0', '2018-03-26 05:49:05', '2018-03-26 05:49:05');
INSERT INTO `brands` VALUES ('4', 'Acer', '0', '2018-03-26 05:49:11', '2018-03-26 05:49:11');
INSERT INTO `brands` VALUES ('5', 'Asus', '0', '2018-03-26 05:49:17', '2018-03-26 05:49:17');
INSERT INTO `brands` VALUES ('6', 'Other', '', '2018-04-30 14:26:19', '2018-04-30 14:26:19');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', 'Electronics', null, '2018-05-06 23:31:55', '2018-05-06 23:31:55');
INSERT INTO `categories` VALUES ('2', '1', 'Mobile', null, '2018-05-07 00:44:33', '2018-05-06 18:44:33');
INSERT INTO `categories` VALUES ('3', '1', 'Television', null, '2018-05-07 12:40:26', '2018-05-07 06:40:26');
INSERT INTO `categories` VALUES ('4', '1', 'Air Condition', null, '2018-05-06 23:36:30', '2018-05-06 17:36:30');
INSERT INTO `categories` VALUES ('5', '0', 'Dress', null, '2018-05-06 23:30:42', '2018-05-06 17:30:42');
INSERT INTO `categories` VALUES ('6', '5', 'Male', null, '2018-05-06 23:13:34', '2018-05-06 17:13:34');
INSERT INTO `categories` VALUES ('7', '5', 'Female', null, '2018-05-07 01:04:12', '2018-05-06 19:04:12');
INSERT INTO `categories` VALUES ('11', '2', 'Smartphone', null, '2018-05-07 07:49:03', '2018-05-07 07:49:03');
INSERT INTO `categories` VALUES ('12', '11', 'Android Phone', null, '2018-05-07 07:49:21', '2018-05-07 07:49:21');
INSERT INTO `categories` VALUES ('13', '11', 'iOS Phone', null, '2018-05-07 07:50:11', '2018-05-07 07:50:11');
INSERT INTO `categories` VALUES ('14', '2', 'Feature Phone', null, '2018-05-07 07:50:28', '2018-05-07 07:50:28');
INSERT INTO `categories` VALUES ('15', '3', 'Flat Television', null, '2018-05-07 07:50:46', '2018-05-07 07:50:46');
INSERT INTO `categories` VALUES ('16', '3', 'Smart Television', null, '2018-05-07 07:50:58', '2018-05-07 07:50:58');
INSERT INTO `categories` VALUES ('17', '1', 'Computer', null, '2018-05-07 07:52:20', '2018-05-07 07:52:20');
INSERT INTO `categories` VALUES ('18', '17', 'Laptop', null, '2018-05-07 07:52:29', '2018-05-07 07:52:29');
INSERT INTO `categories` VALUES ('19', '17', 'Desktop', null, '2018-05-07 07:52:41', '2018-05-07 07:52:41');
INSERT INTO `categories` VALUES ('20', '16', 'Android TV', null, '2018-05-10 14:59:45', '2018-05-10 14:59:45');
INSERT INTO `categories` VALUES ('21', '16', 'Apple TV', null, '2018-05-10 14:59:57', '2018-05-10 14:59:57');
INSERT INTO `categories` VALUES ('22', '18', 'Ultrabook', null, '2018-05-10 15:00:19', '2018-05-10 15:00:19');
INSERT INTO `categories` VALUES ('23', '18', 'Netbook', null, '2018-05-10 15:00:29', '2018-05-10 15:00:29');
INSERT INTO `categories` VALUES ('24', '5', 'kids', null, '2018-05-10 15:00:52', '2018-05-10 15:00:52');
INSERT INTO `categories` VALUES ('25', '0', 'Homeware', null, '2018-05-11 01:22:13', '2018-05-10 19:22:13');

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `title` varchar(128) DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO `configs` VALUES ('currency', '৳');
INSERT INTO `configs` VALUES ('invoice_prefix', null);
INSERT INTO `configs` VALUES ('order_prefix', null);

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_no` int(20) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `mobile` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `balance` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', '1000001', 'Iftakharul Alam', 'Rampura Dhaka', '01670752214', 'bappa2du@gmail.com', '1', null, '2018-05-08 15:02:50', '2018-05-08 15:02:50');

-- ----------------------------
-- Table structure for discounts
-- ----------------------------
DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(32) DEFAULT NULL,
  `discount_type` varchar(32) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of discounts
-- ----------------------------
INSERT INTO `discounts` VALUES ('1', 'P1000001', '2', '200.00', '1', '2018-03-27 06:20:42', '2018-03-27 06:20:42');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `designation` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_of_join` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('0', 'Saiful Islam', 'Manager', '1', '2018-03-01', '2018-03-29 12:24:31', '2018-03-29 12:24:31');

-- ----------------------------
-- Table structure for food_categories
-- ----------------------------
DROP TABLE IF EXISTS `food_categories`;
CREATE TABLE `food_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of food_categories
-- ----------------------------
INSERT INTO `food_categories` VALUES ('1', 'Desert', '2018-04-19 11:32:06', '2018-04-19 11:32:06');
INSERT INTO `food_categories` VALUES ('2', 'Drinks', '2018-04-19 11:32:17', '2018-04-19 11:32:17');
INSERT INTO `food_categories` VALUES ('3', 'Kids Meal', '2018-04-19 11:33:34', '2018-04-19 11:33:34');
INSERT INTO `food_categories` VALUES ('4', 'Salads', '2018-04-19 11:33:42', '2018-04-19 11:33:42');
INSERT INTO `food_categories` VALUES ('5', 'Plates', '2018-04-19 11:33:55', '2018-04-19 11:33:55');
INSERT INTO `food_categories` VALUES ('6', 'Extras', '2018-04-19 11:34:02', '2018-04-19 11:34:02');
INSERT INTO `food_categories` VALUES ('7', 'BREAKFAST', '2018-04-19 11:45:43', '2018-04-19 11:45:43');
INSERT INTO `food_categories` VALUES ('8', 'Coffee Breaks', '2018-04-19 11:46:04', '2018-04-19 11:46:04');
INSERT INTO `food_categories` VALUES ('9', 'Lunch & Dinner Buffets', '2018-04-19 11:46:50', '2018-04-19 11:46:50');
INSERT INTO `food_categories` VALUES ('10', 'Lunch & Dinner Menus', '2018-04-19 11:47:12', '2018-04-19 11:47:12');
INSERT INTO `food_categories` VALUES ('11', 'Special Options', '2018-04-19 11:47:30', '2018-04-19 11:47:30');
INSERT INTO `food_categories` VALUES ('12', 'Open Bars', '2018-04-19 11:47:43', '2018-04-19 11:47:43');

-- ----------------------------
-- Table structure for foods
-- ----------------------------
DROP TABLE IF EXISTS `foods`;
CREATE TABLE `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `code` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of foods
-- ----------------------------
INSERT INTO `foods` VALUES ('1', '7', 'F1000001', 'CONFERENCE BREAKFAST', 'Selection of mini bread rolls with cheese and\r\nsausage specialities\r\nMini croissants filled with kiwi and cream cheese\r\nFruit puff pastry bake and various muffins\r\nMini chocolate croissants\r\nActive yoghurt drink\r\nOrange juice', '1', '250.00', '/media-src/photos/1/foods/en_FRAHITW_Catering_Menus_May_2013.jpg', '2018-04-19 11:55:42', '2018-04-19 11:55:42');
INSERT INTO `foods` VALUES ('2', '7', 'F1000002', 'CONFERENCE BREAKFAST II', 'Selection of mini bread rolls | Croissants | Danish\r\npastries and muffins\r\nJam | Honey | Butter and low-fat margarine\r\nCold ham and salami\r\nSelection of cream and sliced cheeses\r\nFruit basket | Fresh fruit salad\r\nFruit and natural yoghurt | Active yoghurt', '1', '340.00', '/media-src/photos/1/foods/en_FRAHITW_Catering_Menus_May_20131.jpg', '2018-04-19 11:57:46', '2018-04-19 11:57:46');
INSERT INTO `foods` VALUES ('3', '7', 'F1000003', 'AMERICAN BREAKFAST', 'Freshly squeezed orange juice | Mineral water | \r\nMilk | Coffee | Tea | Selection of bread rolls |\r\nBread | Croissants | Toast | Danish pastries and\r\nmuffins Jam | Honey | Nutella | Butter | Low-fat\r\nmargarine | Boiled and smoked ham | Cold meats\r\nand sal', '1', '560.00', '/media-src/photos/1/foods/e2n_FRAHITW_Catering_Menus_May_2013.jpg', '2018-04-19 11:58:21', '2018-04-19 11:58:21');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('2', '1522043695_5ab88b2fdfe42.png', '2018-03-26 05:54:55', '2018-03-26 05:54:55');
INSERT INTO `images` VALUES ('3', '1522043795_5ab88b93a6bda.jpg', '2018-03-26 05:56:35', '2018-03-26 05:56:35');

-- ----------------------------
-- Table structure for invoice_customers
-- ----------------------------
DROP TABLE IF EXISTS `invoice_customers`;
CREATE TABLE `invoice_customers` (
  `invoice_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of invoice_customers
-- ----------------------------
INSERT INTO `invoice_customers` VALUES ('8', '1');
INSERT INTO `invoice_customers` VALUES ('9', '1');

-- ----------------------------
-- Table structure for invoice_product
-- ----------------------------
DROP TABLE IF EXISTS `invoice_product`;
CREATE TABLE `invoice_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `product_code` varchar(64) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  `discount` decimal(10,2) DEFAULT '0.00',
  `price` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of invoice_product
-- ----------------------------
INSERT INTO `invoice_product` VALUES ('75', '600000', 'sell', 'P1000001', '1', '0.00', '32000.00', '2018-05-08 16:21:37', '2018-05-08 16:21:37');
INSERT INTO `invoice_product` VALUES ('76', '600000', 'sell', 'P1000004', '1', '0.00', '2400.00', '2018-05-08 16:21:38', '2018-05-08 16:21:38');
INSERT INTO `invoice_product` VALUES ('77', '600000', 'sell', 'P1000006', '3', '0.00', '2500.00', '2018-05-08 22:21:42', '2018-05-08 16:21:42');
INSERT INTO `invoice_product` VALUES ('78', '600001', 'sell', 'P1000004', '1', '0.00', '2400.00', '2018-05-08 19:26:44', '2018-05-08 19:26:44');
INSERT INTO `invoice_product` VALUES ('79', '600001', 'sell', 'P1000005', '1', '0.00', '2650.00', '2018-05-08 19:26:45', '2018-05-08 19:26:45');
INSERT INTO `invoice_product` VALUES ('80', '600001', 'sell', 'P1000006', '1', '0.00', '2500.00', '2018-05-08 19:26:46', '2018-05-08 19:26:46');
INSERT INTO `invoice_product` VALUES ('81', '600001', 'sell', 'P1000007', '1', '0.00', '280.00', '2018-05-08 19:26:47', '2018-05-08 19:26:47');
INSERT INTO `invoice_product` VALUES ('82', '600001', 'sell', 'P1000002', '2', '0.00', '66000.00', '2018-05-09 01:26:49', '2018-05-08 19:26:49');
INSERT INTO `invoice_product` VALUES ('105', '800000', 'purchase', 'P1000004', '1', '0.00', '2300.00', '2018-05-10 19:59:39', '2018-05-10 19:59:39');
INSERT INTO `invoice_product` VALUES ('106', '800000', 'purchase', 'P1000002', '1', '0.00', '65000.00', '2018-05-10 19:59:41', '2018-05-10 19:59:41');
INSERT INTO `invoice_product` VALUES ('107', '800000', 'purchase', 'P1000001', '1', '0.00', '31000.00', '2018-05-10 19:59:42', '2018-05-10 19:59:42');

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(64) DEFAULT NULL,
  `invoice_sl` varchar(64) DEFAULT NULL,
  `invoice_date` varchar(20) DEFAULT NULL,
  `delivery_charge` decimal(10,2) DEFAULT '0.00',
  `other_discount` decimal(10,2) DEFAULT '0.00',
  `type` varchar(32) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT '0.00',
  `status` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES ('7', '800000', null, null, '0.00', '0.00', 'purchase', '0.00', '0', '0.00', '2018-05-11 01:59:22', '2018-05-10 19:59:22');
INSERT INTO `invoices` VALUES ('8', '600000', '01772633', '2018-05-08', '0.00', '100.00', 'sell', '0.00', '1', '0.00', '2018-05-08 22:21:51', '2018-05-08 16:21:51');
INSERT INTO `invoices` VALUES ('9', '600001', '1233125', '2018-05-08', '90.00', '200.00', 'sell', '2.50', '1', '143415.75', '2018-05-09 01:27:09', '2018-05-08 19:27:09');
INSERT INTO `invoices` VALUES ('10', '600002', null, null, '0.00', '0.00', 'sell', '0.00', '0', '0.00', '2018-05-11 01:59:11', '2018-05-10 19:59:11');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(32) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `method` varchar(32) DEFAULT NULL,
  `trx_id` varchar(64) DEFAULT NULL,
  `info` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES ('4', '600000', '40000.00', 'Cash', '', '', '2018-05-08 19:19:55', '2018-05-08 19:19:55');
INSERT INTO `payments` VALUES ('5', '600001', '100000.00', 'Card', 'TYbagsre917', 'Brack Bank Ltd', '2018-05-08 19:27:55', '2018-05-08 19:27:55');
INSERT INTO `payments` VALUES ('6', '600001', '43415.75', 'Cash', '', '', '2018-05-08 19:28:11', '2018-05-08 19:28:11');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'Product Module', 'product', '2018-03-25 16:24:54', '2018-03-25 16:24:54');
INSERT INTO `permissions` VALUES ('2', 'Category Module', 'category', '2018-03-25 16:25:09', '2018-03-25 16:25:09');
INSERT INTO `permissions` VALUES ('3', 'Sell Module', 'sell', '2018-03-25 18:24:13', '2018-03-25 18:24:13');
INSERT INTO `permissions` VALUES ('4', 'Payment Module', 'payment', '2018-03-25 18:24:27', '2018-03-25 18:24:27');
INSERT INTO `permissions` VALUES ('5', 'Purchase Module', 'purchase', '2018-03-25 18:24:50', '2018-03-25 18:24:50');
INSERT INTO `permissions` VALUES ('6', 'Discount Module', 'discount', '2018-03-25 18:25:03', '2018-03-25 18:25:03');
INSERT INTO `permissions` VALUES ('7', 'User Module', 'user', '2018-03-25 18:25:18', '2018-03-25 18:25:18');
INSERT INTO `permissions` VALUES ('8', 'Role Module', 'role', '2018-03-25 18:25:31', '2018-03-25 18:25:31');
INSERT INTO `permissions` VALUES ('9', 'Permission Module', 'permission', '2018-03-25 18:25:43', '2018-03-25 18:25:43');
INSERT INTO `permissions` VALUES ('10', 'Customer Module', 'customer', '2018-03-25 18:25:57', '2018-03-25 18:25:57');
INSERT INTO `permissions` VALUES ('11', 'Brand Module', 'brand', '2018-03-25 18:26:15', '2018-03-25 18:26:15');
INSERT INTO `permissions` VALUES ('12', 'Report Module', 'report', '2018-03-25 18:26:25', '2018-03-25 18:26:25');

-- ----------------------------
-- Table structure for product_category
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO `product_category` VALUES ('1', '1');
INSERT INTO `product_category` VALUES ('1', '3');
INSERT INTO `product_category` VALUES ('2', '1');
INSERT INTO `product_category` VALUES ('2', '3');
INSERT INTO `product_category` VALUES ('3', '1');
INSERT INTO `product_category` VALUES ('3', '2');
INSERT INTO `product_category` VALUES ('4', '5');
INSERT INTO `product_category` VALUES ('4', '6');
INSERT INTO `product_category` VALUES ('16', '4');
INSERT INTO `product_category` VALUES ('17', '4');
INSERT INTO `product_category` VALUES ('9', '1');
INSERT INTO `product_category` VALUES ('9', '2');
INSERT INTO `product_category` VALUES ('10', '18');
INSERT INTO `product_category` VALUES ('10', '22');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `code` varchar(128) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `purchase_price` decimal(10,2) DEFAULT '0.00',
  `sell_price` decimal(10,2) DEFAULT '0.00',
  `quantity` int(11) DEFAULT '0',
  `image` varchar(160) DEFAULT NULL,
  `reference` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'iPhone SE', 'P1000001', '1', '', '1', '31000.00', '32000.00', '20', '/media-src/photos/1/01-hero-devices-se.png', '', '2018-05-07 12:58:42', '2018-05-07 06:58:42');
INSERT INTO `products` VALUES ('2', 'Smart TV UHD 3200', 'P1000002', '2', '', '1', '65000.00', '66000.00', '10', '/media-src/photos/1/MU9000_1.jpg', null, '2018-05-07 13:31:23', '2018-05-07 07:31:23');
INSERT INTO `products` VALUES ('3', 'iPhone 6', 'P1000003', '1', '', '1', '13000.00', '13500.00', '6', '', null, '2018-05-06 18:28:48', '2018-05-06 12:28:48');
INSERT INTO `products` VALUES ('4', 'Shirt ', 'P1000004', '6', '', '1', '2300.00', '2400.00', '7', '', null, '2018-05-06 18:28:56', '2018-05-06 12:28:56');
INSERT INTO `products` VALUES ('5', 'Pant', 'P1000005', '6', '', '1', '2650.00', '2650.00', '13', '', null, '2018-05-06 18:29:06', '2018-05-06 12:29:06');
INSERT INTO `products` VALUES ('6', 'Tangail Saree', 'P1000006', '6', '', '1', '2450.00', '2500.00', '10', '', null, '2018-05-06 12:30:50', '2018-05-06 12:30:50');
INSERT INTO `products` VALUES ('7', 'T Shirt White', 'P1000007', '6', '', '1', '250.00', '280.00', '10', '', null, '2018-05-06 12:31:15', '2018-05-06 12:31:15');
INSERT INTO `products` VALUES ('8', 'Full Shirt', 'P1000008', '6', '', '1', '2650.00', '2780.00', '10', '', null, '2018-05-06 12:31:51', '2018-05-06 12:31:51');
INSERT INTO `products` VALUES ('10', 'Asus S410U', 'P1000009', '5', null, '1', '52000.00', '0.00', '0', null, null, '2018-05-11 01:18:58', '2018-05-10 19:18:58');

-- ----------------------------
-- Table structure for refunds
-- ----------------------------
DROP TABLE IF EXISTS `refunds`;
CREATE TABLE `refunds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of refunds
-- ----------------------------

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role_permission
-- ----------------------------
INSERT INTO `role_permission` VALUES ('1', '1');
INSERT INTO `role_permission` VALUES ('1', '2');
INSERT INTO `role_permission` VALUES ('1', '4');
INSERT INTO `role_permission` VALUES ('1', '5');
INSERT INTO `role_permission` VALUES ('2', '4');
INSERT INTO `role_permission` VALUES ('2', '5');
INSERT INTO `role_permission` VALUES ('2', '6');
INSERT INTO `role_permission` VALUES ('2', '10');
INSERT INTO `role_permission` VALUES ('2', '11');
INSERT INTO `role_permission` VALUES ('2', '12');
INSERT INTO `role_permission` VALUES ('1', '3');
INSERT INTO `role_permission` VALUES ('1', '6');
INSERT INTO `role_permission` VALUES ('1', '7');
INSERT INTO `role_permission` VALUES ('1', '8');
INSERT INTO `role_permission` VALUES ('1', '9');
INSERT INTO `role_permission` VALUES ('1', '10');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Admin', 'admin', '2018-03-25 22:39:48', '2018-03-25 16:39:48');
INSERT INTO `roles` VALUES ('2', 'Sub Admin', 'subadmin', '2018-03-25 22:40:03', '2018-03-25 16:40:03');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  `target` varchar(32) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sliders
-- ----------------------------

-- ----------------------------
-- Table structure for tables
-- ----------------------------
DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_no` varchar(32) DEFAULT NULL,
  `to_seat` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tables
-- ----------------------------
INSERT INTO `tables` VALUES ('2', 'T11', '4', '1', '2018-04-19 12:12:19', '2018-04-19 12:12:19');
INSERT INTO `tables` VALUES ('3', 'T12', '6', '1', '2018-04-19 12:12:25', '2018-04-19 12:12:25');
INSERT INTO `tables` VALUES ('4', 'T13', '6', '1', '2018-04-19 12:12:32', '2018-04-19 12:12:32');
INSERT INTO `tables` VALUES ('5', 'T14', '5', '1', '2018-04-19 12:12:42', '2018-04-19 12:12:42');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Super Admin', 'admin@demo.com', '8801670752214', '1', '$2y$10$AysLHP2DWdB3.Ot2Ve1C5.EyuO3WMC46h4XwiYEuofhJo6COu6hP6', null, '2018-03-25 10:53:50', '2018-03-25 19:25:49');
