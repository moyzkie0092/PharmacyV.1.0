-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: pharmacy_db
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL,
  `Full_Name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (5,'Ricky Amante','admin1@gmail.com','827ccb0eea8a706c4c34a16891f84e7b');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_address`
--

DROP TABLE IF EXISTS `customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_address` (
  `address_id` int NOT NULL,
  `House_No` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Street_Name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Barangay` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_address`
--

LOCK TABLES `customer_address` WRITE;
/*!40000 ALTER TABLE `customer_address` DISABLE KEYS */;
INSERT INTO `customer_address` VALUES (1,'234b','6th Street','Metro Manila','Caloocan','89',1),(2,'234b','6th Street','Metro Manila','Caloocan','7',2),(3,'264','Velasco Ext.Camelot Street','Metro Manila','Caloocan','7',3);
/*!40000 ALTER TABLE `customer_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_cart`
--

DROP TABLE IF EXISTS `customer_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_cart` (
  `Item_No` int NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `Price` int DEFAULT NULL,
  `Customer_id` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  PRIMARY KEY (`Item_No`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_cart`
--

LOCK TABLES `customer_cart` WRITE;
/*!40000 ALTER TABLE `customer_cart` DISABLE KEYS */;
INSERT INTO `customer_cart` VALUES (1,'Alaxan',2,3,1,1),(2,'Gatas',2,5,1,3),(3,'Paracetamol',4,6,1,2),(4,'Alaxan',3,3,2,1);
/*!40000 ALTER TABLE `customer_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_detail`
--

DROP TABLE IF EXISTS `customer_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_detail` (
  `Customer_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `User_Name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Full_Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Age` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Contact_No` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created_at` datetime DEFAULT NULL,
  `Code` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Verify` int DEFAULT NULL COMMENT '0 = No\\\\1= Yes',
  PRIMARY KEY (`Customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_detail`
--

LOCK TABLES `customer_detail` WRITE;
/*!40000 ALTER TABLE `customer_detail` DISABLE KEYS */;
INSERT INTO `customer_detail` VALUES ('104075013108988066206',NULL,'Ricky Amante',NULL,NULL,NULL,'amante_ricky@spcc.edu.ph',NULL,'2021-12-17 06:42:57','fdd139b64fa3bbe0f8104f16e7e65261',2),('107120572222203144877',NULL,'Elicana Ricky',NULL,NULL,NULL,'elicanaricky0092@gmail.com',NULL,'2021-12-22 13:27:18','b119fa2557f2b0e9ecde446024e1fc41',2),('113305591106291166078',NULL,'Pharmacy OnlineShop',NULL,NULL,NULL,'pharmacyshop2021@gmail.com',NULL,'2021-12-22 13:33:15',NULL,1),('1190592127136371760','moyzkie','Ricky Amante','Male','21','09102956682','rockyelicana@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','2021-12-14 09:54:46','b8cc2e3ae41eb2ce7130c40afafae488',2),('8303278450439387778','Rzamora01','Raymond Zamora','Female','21','232443','raymond_zamora23456@yahoo.com','81dc9bdb52d04dc20036dbd8313ed055','2021-12-22 13:23:25','c63bb9e603fa051e70e9a7dadb1156da',NULL);
/*!40000 ALTER TABLE `customer_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_order` (
  `Order_Number` int NOT NULL AUTO_INCREMENT,
  `Order_id` int NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Delievery_Date` timestamp NOT NULL,
  `Order_Status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Customer_id` int DEFAULT NULL,
  `Product_id` int NOT NULL,
  PRIMARY KEY (`Order_Number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_order`
--

LOCK TABLES `customer_order` WRITE;
/*!40000 ALTER TABLE `customer_order` DISABLE KEYS */;
INSERT INTO `customer_order` VALUES (3,1,'2021-03-23 05:32:00','2021-04-04 19:00:00','pending',1,1),(4,1,'2021-03-23 05:32:00','2021-03-22 21:32:00','Shipped',75,1),(5,2,'2022-03-23 05:32:00','2021-03-28 21:32:00','pending',2,4);
/*!40000 ALTER TABLE `customer_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `Product_id` int NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Date_Manufacture` date DEFAULT NULL,
  `Date_Exp` date DEFAULT NULL,
  `Product_Detail` mediumtext COLLATE utf8_unicode_ci,
  `Supplier_id` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Category_id` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Picture` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (165,'Centrums',1244,157,'2021-12-22','2022-01-01','Centrum is a scientifically balanced dietary supplement, containing 26 vitamins and minerals as well as trace elements, formulated to help support your health needs. Each Centrum tablet contains the following ingredients: Nutrition information per Centrum table','6','14','16394549331638435968product1.jpg'),(166,'Immunpro 500 mg / 10 mg Tablet - 20s',100,160,'2021-12-09','2022-07-20','This nutritional supplement contains vitamin C and zinc.\r\nVitamin C and zinc together help the body\'s natural defense against damaging free radicals (antioxidant effect) and help boost immune function. Free radicals are highly reactive and unstable chemicals generated during normal body activities that require oxygen (e.g., respiration, digestion, blood circulation, immune system response, increased physical activity, etc.) and after exposure to UV light, cigarette smoke and various pollutants. One major effect of zinc is on the ability of cells to properly replicate their DNA, which is required for cells to multiply. Hence, zinc is needed for normal growth, cell renewal and cell repair. Vitamin C and zinc also function as cofactors of enzymes involved in collagen formation and synthesis. Collagen provides strength and elasticity to the skin and helps promote faster wound healing.','8','24','163947392322237.jpg'),(167,'AD - C Plus 500 / 15 mg Capsule - 30s',434,187,'2021-12-14','2022-04-07','Ascorbic Acid & Zinc\r\n500 mg / 15 mg\r\nVitamins and Minerals\r\n30 pcs capsules','4','24','163947628833307.jpg'),(168,'Lola Remedios Sachet 15 ml Syrup - 12s',156,120,'2021-12-14','2022-04-28','Food Supplement\r\nReady - to - Drink\r\n1 box / 12 sachets','6','14','163947668858852.jpg'),(169,'Ceelin Plus Ages 1 - 13 Apple Flavor 100 mg / 5 ml 120 ml Syrup',232,147,'2021-11-30','2022-04-29','Ascorbic Acid\r\n100 mg / 5 ml\r\n120 ml\r\nAges 1 - 13\r\nApple Flavor\r\n1 pc \r\n','5','14','163947689921869-21902.jpg'),(170,'ATC Vitacinc 500 mg / 10 mg Capsule - 30s',59,165,'2021-12-10','2022-03-31','Ascorbic Acid + Zinc\r\n500 mg / 10 mg\r\nVitamin and Mineral\r\n30 pcs capsules','4','24','163947701359533.jpg'),(171,'Stresstabs Multivitamins Tablet - 30s',100,311,'2021-12-09','2022-03-08',' Enriched with Vit-E + Other Skin Repairing Nutrients for healthy-looking skin\r\n Infused with 500mg of Vitamin C to help strengthen the Immune System\r\n Enriched with Vit-B to help glucose convert into energy, aids in wound healing and is essential for proper nerve functions\r\n Stresstabs replenishes the skin with more nutrients coming from more vitamins bringing back your skin\'s healthy appearance from stressed to looking fre','5','24','1639477127Stresstabs30s_12854.jpg'),(172,'Pharex Vitamin B Complex Tablet',232,76,'2021-12-24','2022-08-24','INDICATIONS: Nutritional supplement for vitamin B deficiency\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment','5','24','1639477249PHAREX_17_3TAB.jpg'),(173,'Enervon C Tablet - 30s',59,195,'2021-12-30','2022-03-30','INDICATIONS: Nutritional supplement \r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment\r\n','4','14','1639477612enervon.jpg'),(174,'Berocca Mango Orange Energy Vitamins Effervescent Tablets - 15s',434,284,'2021-12-23','2022-06-09','Vitamin B-Complex + Ascorbic Acid + Calcium + Magnesium + Zinc\r\nHelps your body release the maximum energy from the food you eat\r\nNo Sugar, No Artificial Stimulants\r\n15 tablets\r\nINDICATIONS: Nutritional supplement for vitamin B deficiency \r\nCONTRA INDICATIONS: Hypersensitivity \r\nSIDE EFFECTS: Abdominal discomfort.\r\n\r\n','5','24','163947772435228-2_2.jpg'),(175,'Potencee Sugar Free Film - Coated 500 mg Tablet - 30s',45,180,'2021-12-30','2022-04-13','Ascorbic Acid\r\n500 mg\r\nSugar Free\r\n30 pcs tablet','5','24','1639478069POTEN-CEE_SF_100_S.jpg'),(176,'Myra E 400 IU Capsule - 30s',75,352,'2021-12-24','2022-04-28','INDICATIONS: Prevention & treatment of Vit E deficiency\r\nCONTRA INDICATIONS: This information is not available at the moment\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: This information is not available at the moment\r\nDRUG INTERACTIONS: This information is not available at the moment\r\n','5','24','163947823021656_3.jpg'),(177,'Neurobion 100 mg / 200 mg / 200 mcg Tablet - 30s',434,630,'2021-12-02','2021-12-29','INDICATIONS: Nutritional supplement for vitamin B deficiency\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment\r\n','4','24','163947836859533.jpg'),(178,'Forti - D 800 IU Capsule - 30s',563,202,'2021-12-30','2021-12-30','Cholecalciferol\r\n800 IU\r\nVitamins / Minerals\r\n30 pcs capsules\r\n','6','24','163947862222143_2.jpg'),(179,'Conzace 9 + 1 Soft Gel Capsule',563,112,'2021-12-30','2022-03-30','Multivitamins plus Minerals\r\n9 plus 1 Free Soft Gel Capsule\r\n','4','24','163947881722363.jpg'),(180,'Ritemed Ascorbic Acid 500 mg Tablet - 20s',622,50,'2021-12-17','2022-03-29','Ascorbic Acid\r\n500 mg\r\nVitamin\r\n20 pcs tablets\r\nINDICATIONS: Vitamin C Supplement\r\nCONTRA INDICATIONS: This information is not available at the moment\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal cramps, diarrhea\r\nDRUG INTERACTIONS: This information is not available at the moment','3','24','163947903122471.jpg'),(181,'Cherifer Forte with Zinc 240 ml Syrup',63,360,'2021-12-17','2021-12-23','Vitamins Chollera Growth\r\n240 ml\r\nVitamins & Minerals\r\nwith Taurine & Double CGF\r\n1 bottle ','6','24','163947994411720_1.jpg'),(182,'Enervon C Tablet - 30s',59,195,'2021-12-02','2021-12-24','Vitamins & Minerals\r\n30 pcs','5','24','1639480075wdfr.jpg'),(183,'Caltrate Plus Tablet - 60s',235,165,'2021-12-08','2022-04-28','1 x Caltrate Plus Box of 60 Tablets\r\n Calcium + Vitamin D3 + Minerals\r\n Helps prevent stooped posture and bone mass loss resulting to fractures and bone breakage\r\n Helps prevent Osteoporosis','2','24','1639480198CaltratePlus60s_12535.jpg'),(184,'Immunomax 10 mg Capsule - 30s',542,504,'2021-12-01','2022-05-02','CM - Glucan\r\n10 mg\r\nFood supplement\r\n30 pcs capsules\r\n','5','14','1639480280immuno.jpg'),(185,'Pharex Vitamin B - Complex plus B1 + B6 + B12 - 20s',42,90,'2021-12-21','2021-12-24','Vitamin B - Complex plus B1, B6 and B12\r\n100 mg / 5 mg / 50 mcg\r\n20 pcs Tablets\r\nINDICATIONS: Nutritional supplement for vitamin B deficiency\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment\r\n','5','24','163948033941298.jpg'),(186,'Ceelin 100 mg / 5 ml 500 ml Syrup',455,414,'2021-12-07','2022-02-23','Ascorbic Acid\r\n500 ml\r\nMultivitamins & Minerals\r\n1 pc Bottle\r\n','3','24','163948048021747_2.jpg'),(187,'Ceelin Chewables 100 mg Tablet - 60s',340,267,'2021-12-16','2022-03-03','Ascorbic Acid\r\n100 mg\r\nChewable Tablet\r\n1 Pack / 60 Tablets \r\n','3','24','163948054422037_1.jpg'),(188,'Caltrate Plus Tablet - 30s',452,240,'2021-12-18','2021-12-21','1 x Caltrate Plus Box of 30 Tablets\r\n Calcium + Vitamin D3 + Minerals\r\n Helps prevent stooped posture and bone mass loss resulting to fractures and bone breakage\r\n Helps prevent Osteoporosis\r\n','8','14','1639480604CaltratePlus30s_12534.jpg'),(189,'Nutrilin Orange Flavor 30 ml Drops',234,112,'2021-12-22','2022-07-14','Vitamins & Minerals\r\n30 ml\r\nVitamins, B - Complex and Taurine\r\n1 pc Bottle','8','24','163948066921832_1.jpg'),(190,'Potencee plus Collagen Capsule 10s',452,197,'2021-12-10','2022-03-02','Vitamin C plus Collagen\r\n10 pcs','3','24','1639480747dfd.jpg'),(191,'UHP Ceetab 500 mg tablet',46,235,'2021-12-11','2021-12-30','Ascorbic Acid\r\n500 mg\r\nVitamin\r\n1 bottle','4','24','163948081122239.jpg'),(192,'Scott\'s Vitamin C Pastilles Orange Flavour 50s',232,212,'2021-12-18','2022-03-31','High in Vitamin C for immunity support\r\n Delicious and chewy pastille format\r\n Suitable for children 3 - 12 years old \r\n\r\nRelated to: Vitamin C, Immunity, Child development, Collagen\r\n','9','24','1639480885rtr.jpg'),(193,'MX3 Mangosteen 500 mg Capsule - 30s',468,512,'2021-12-24','2022-06-07','Food Supplement\r\n500 mg\r\nDietary Supplement\r\n30 pcs Capsule\r\n','2','14','163948093957533_3.png'),(194,'Cherifer Forte with Zinc 240 ml Syrup',232,360,'2021-12-10','2022-06-01','Vitamins Chollera Growth\r\n240 ml\r\nVitamins & Minerals\r\nwith Taurine & Double CGF\r\n1 bottle \r\n','8','24','163948110211719.jpg'),(195,'Cecon 500 mg Tablet - 30s',462,285,'2021-12-30','2022-04-12','Ascorbic acid\r\n500 mg\r\nChewable\r\n30 pcs tablet\r\n','5','24','163953234130026_1.jpg'),(197,'Ceelin Plus Apple Flavor 40 mg / ml 30 ml Oral Drops',42,150,'2021-12-23','2022-10-15','Ascorbic Acid\r\n30 ml\r\nApply Flavor\r\nFood Supplement \r\n1 pc','12','24','163953266722075_1.jpg'),(198,'Neurobion 100 mg / 200 mg / 200 mcg Tablet - 10s',562,210,'2021-12-03','2023-03-15','Vitamin B1 + B6 + B12\r\n100 mg / 200 mg / 200 mcg tablet\r\nVitamin B- Complex\r\n10 tablets','8','24','163953277634373_v1.jpg'),(199,'Mega Malunggay 600 mg Capsule - 30s',231,285,'2021-12-17','2023-11-23','Moringa Oleifera Malunggay plus Sodium Ascorbate\r\nFood Supplement\r\n30 pcs','5','14','163953422868742_1.jpg'),(200,'Fern - C Kidz 109.68 mg / 5 mg / 5 ml 120 ml',52,129,'2021-12-11','2022-10-15','Sodium Ascorbate & Zinc\r\n109.68 mg / 5 mg / 5 ml\r\n120 ml\r\nFood Supplement\r\n1 pc.  \r\n','9','24','163953434258505.jpg'),(201,'Ceelin 100 mg / 5 ml 120 ml Syrup',563,122,'2021-12-10','2021-12-31','INDICATIONS: Vitamin C Supplement\r\nCONTRA INDICATIONS: This information is not available at the moment\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal cramps, diarrhea\r\nDRUG INTERACTIONS: This information is not available at the moment','3','24','163953440821745_2.jpg'),(202,'RiteMed Vitamin B - Complex Tablet - 20s',53,90,'2021-12-10','2022-07-29','Vitamin B1+B6+B12\r\n100 mg / 5 mg / 50 mcg\r\n20 pcs tablet\r\n','8','24','163953450121923.jpg'),(203,'Asconvita With Zinc 600 mg / 5 mg Capsule',632,5,'2021-12-23','2022-11-23','Sodium Ascorbate + Zinc\r\n600 mg / 5 mg \r\nVitamin / Mineral\r\n1 pc capsule','4','24','163953459759529.jpg'),(204,'Potencee N.A. 562.50 mg Capsule - 20s',322,120,'2021-12-17','2022-03-30','Sodium Ascorbate\r\n562.50 mg\r\nNon - Acidic\r\n20 pcs capsules\r\n','4','24','163953481834687.jpg'),(205,'Bewell - C Plus Calcium Capsule - 20s',42,200,'2021-12-09','2022-11-26','Calcium Ascorbate, Calcium Citrate & Cholecalciferol\r\n500 mg / 500 mg / 200 IU\r\nNon - Acid Vitamin C\r\n20 pcs Capsule','6','24','163953490667820_3.jpg'),(206,'Ceelin Ages 0 - 12 100 mg 30 ml Oral Drops',452,130,'2021-12-23','2022-12-03','Ascorbic Acid\r\n100 mg / 5 ml\r\n30 ml\r\nAges 0 - 12\r\n1 pc \r\n','9','24','163953496321743_2.jpg'),(207,'Propan TLC 120 ml Syrup',63,199,'2021-12-22','2023-11-24','INDICATIONS: Nutritional supplement\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment','8','14','163953506533326.jpg'),(208,'Centrum Silver Advance Tablet - 20s',45,255,'2021-12-28','2022-08-24','Help level up your Immune System with 10 immunity-boosting vitamins, minerals and antioxidants such as Vitamin C, Vitamin D, Selenium, Zinc, and more found in Centrum Advance\r\n Help protect your Heart Health with Lycopene, Folic Acid, Vitamin B6 and B12.\r\nSupport Good Eyesight with Lutein and Beta-Carotene (Vitamin A)\r\n Protektahan and buong katawan at age 50+ with Centrum Silver Advance. Complete from A to Zinc\r\n For the treatment and prevention of vitamin and mineral deficiencies in adults aged 50 and above','7','24','1639535490CentrumSilverAdvance20s_12819.jpg'),(209,'Clusivol Plus Tablet - 20s',35,140,'2021-12-22','2024-06-15','Multivitamins, Zinc & Copper\r\n20 pcs tablets','7','24','163953570312917.jpg'),(210,'Dayzinc 562.4 mg / 10 mg Capsule - 30s',452,232,'2021-12-10','2023-11-24','Sodium ascorbate zinc\r\n562.4 mg / 10 mg\r\nVitamin & Mineral\r\n30 pcs capsules\r\n','5','24','1639535793hg.jpg'),(211,'Potencee 500 mg Sugar - Coated Tablet - 20s',434,125,'2021-12-22','2022-11-15','Ascorbic Acid\r\n500 mg\r\nSugar- Coated Tablet\r\n20 pcs tablets','5','24','1639536012vk.jpg'),(212,'Bewell C 5 + 1 Capsule',452,27,'2021-12-22','2021-12-20','Sodium Ascorbate\r\nNon-acidic Vitamin C\r\n5 capsules plus 1 free capsule','6','24','1639536156BEWELL-C_5_1CAP.jpg'),(213,'Stresstabs Multivitamins Tablet - 8s',122,88,'2021-12-24','2022-07-22','Enriched with Vit-E + Other Skin Repairing Nutrients for healthy-looking skin\r\n Infused with 500mg of Vitamin C to help strengthen the Immune System\r\n Enriched with Vit-B to help glucose convert into energy, aids in wound healing and is essential for proper nerve functions\r\n Stresstabs replenishes the skin withmore nutrients coming from more vitamins bringing back your skin\'s healthy appearance from stressed to looking fresh!','7','24','1639536247Stresstabs8s_12258.jpg'),(214,'Tolak Angin Sachet 15 ml Syrup',45,144,'2021-12-09','2022-07-29','Food Supplement\r\nReady - to - Drink\r\n1 box / 12 sachets\r\n','7','14','163953633059195.jpg'),(215,'Sleepwell 3 mg Capsule - 20s',563,320,'2021-12-18','2023-03-02','Melatonin\r\n3 mg\r\nFood Supplement\r\n20 pcs Capsules\r\n','6','14','163953646967465.jpg'),(216,'Folart 5 mg Capsule - 20s',36,205,'2021-12-08','2022-10-27','Folic Acid\r\n5 mg\r\nAnti - Anemic\r\n20 pcs Capsules\r\nINDICATIONS: Nutritional supplement for iron deficiency\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment\r\n','8','14','163953686151581.jpg'),(217,'Growee 250 ml Syrup',462,296,'2021-12-09','2022-12-02','Vitamins / Minerals\r\n250 ml\r\nFood Supplement\r\n1 pc\r\nINDICATIONS: Nutritional supplement\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment','6','24','163953711321261_2.jpg'),(218,'Caltrate Plus 500D Tablet - 20s',67,200,'2021-12-09','2023-06-21','1 x Caltrate Plus 500D Box of 20 Tablets\r\n With 600mg Calcium and 500IU Vitamin D (Highest level of Vitamin D) + 4 other bones & muscle strengthening nutrients\r\n Helps prevent Osteoporosis\r\n','6','24','1639537246CaltratePlus500D20s_12959.jpg'),(219,'mmunomax 10 mg 120 ml Syrup',523,365,'2021-12-07','2022-11-23','CM Glucan\r\n10 mg / 5 ml\r\nFood Supplement\r\n1 bottle','6','14','163953741134225.jpg'),(220,'Potencee Forte 1 g 8 + 1 Tablet',55,94,'2021-12-09','2023-11-16','Ascorbic acid\r\n1 g\r\nVitamins\r\n8 + 1 Promo pack\r\n','6','24','1639537478ygf.jpg'),(221,'Cherifer PGM Immunomax Capsule - 30s',53,817,'2021-12-18','2024-07-31','Multivitamins\r\nFood supplement\r\n30 pcs Capsule\r\n','4','14','163953762033698.jpg'),(222,'Propan TLC 250 ml Syrup',47,368,'2022-06-30','2022-10-12','Vitamin B Complex plus Lysine\r\n250 ml\r\nFood Supplement\r\n1 pc\r\n','6','14','163953775934452.jpg'),(223,'Sangobion Iron Plus Capsule - 30s',784,720,'2021-12-03','2023-09-15','Fe Gluconate  Vitamins & Minerals\r\nHematinic\r\nOrganic Iron plus Blood Health Builders\r\n30 pcs\r\n','6','24','163953783930605_3.jpg'),(224,'Cherifer 30 ml Drops',57,153,'2021-12-23','2023-11-17','Vitamins Chollera Growth\r\n30 ml\r\nwith Taurine & CGF\r\nwith Vitamins A, B - Complex & D\r\n1 pc Bottle\r\n','4','24','163953793110755_2.jpg'),(225,'Cardiclear Fish Oil 1000 mg Softgel Capsule - 20s',55,160,'2021-12-18','2022-10-12','Food Supplement\r\n1000 mg\r\nOmega - 3 Fish Oil\r\n20 pcs Soft Gel Capsule','8','14','163953804868100a.jpg'),(226,'Enervon 9 + 1 Tablet',100,58,'2021-12-29','2022-10-15','Multivitamins\r\nBuy 9, Get 1 Free Value Pack','5','24','1639538170ENERVON_9_1TAB.jpg'),(227,'Gen - Cee 500 mg Capsule - 30s',100,120,'2021-12-15','2022-06-15','Ascorbic Acid\r\n500 mg\r\nVitamins\r\n30 pcs capsules\r\nINDICATIONS: Nutritional supplement for vitamin C deficiency\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment','6','24','1639538261Gen-Cee-Ascorbic-Acid-website.png'),(228,'Ascozin 500 mg Chewable Tablet - 30s',53,147,'2021-12-01','2022-07-13','Ascorbic Acid + Zinc\r\n500 mg\r\nVitamin & Mineral\r\n30 pcs tablets ','4','24','1639538348ASCOZIN-CHEWTAB-500MG-website.png'),(229,'Revicon Forte Sugar Coated Tablet - 30s',46,150,'2021-12-15','2022-06-15','Vitamins & Minerals\r\nSugar Coated Tablets\r\n30 pcs','7','24','1639538426thi.jpg'),(230,'Cherifer 120 ml Syrup',568,171,'2021-12-15','2022-06-22','Vitamins Chlorella Growth\r\n120 ml\r\nwith Taurine & CGF\r\nwith Vitamins A, B - Complex & Lysine\r\n1 pc Bottle\r\n','6','24','163953851010756_1.jpg'),(231,'Ceelin Plus Ages 1 - 13 Apple Flavor 100 mg / 5 ml 60 ml Syrup',100,78,'2021-11-30','2022-07-15','Ascorbic Acid\r\n100 mg / 5 ml\r\n60Â ml\r\nAges 1 - 13\r\nApple Flavor\r\nVitamin - Mineral\r\n1 pc\r\n','8','24','163953858921868_2.jpg'),(232,'Calciumade 8 + 2 Tablet - 10s',56,78,'2021-12-09','2022-06-22','Calcium, Vitamin D & Minerals\r\nVitamins and Supplement\r\n10 pcs.\r\nINDICATIONS: Treatment & prevention of vitamin D deficiency\r\nCONTRA INDICATIONS: Hypersensitivity\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal discomfort\r\nDRUG INTERACTIONS: This information is not available at the moment','6','24','163953864222546.jpg'),(233,'Myra Ultimate Softgel Capsule - 30s',434,585,'2021-06-04','2022-03-24','Helps reduce fine lines and lighten dark spots promoting the formation of collagen to keep your skin firm and youthful as you age.\r\n30 pcs softgel capsules\r\n','5','14','163953906322558.jpg'),(234,'Cherifer Forte 240 ml Syrup',35,337,'2021-12-23','2023-02-22','Vitamins, Chlorella Growth\r\n240 ml\r\nVitamins & Minerals\r\n1 bottle\r\n','9','24','163953976111715_2.jpg'),(235,'PedZINC Plus C 100 mg 120 ml Syrup',46,157,'2021-12-15','2022-06-15','Ascorbic Acid\r\n100 mg\r\n120 ml\r\nVitamin C with Zinc\r\n1 pc\r\nINDICATIONS: Vitamin C Supplement\r\nCONTRA INDICATIONS: This information is not available at the moment\r\nPRECAUTIONS: This information is not available at the moment\r\nSIDE EFFECTS: Abdominal cramps, diarrhea\r\nDRUG INTERACTIONS: This information is not available at the moment\r\n','5','24','163953987133127.jpg'),(236,'Fersulfate Iron 65 mg Tablet',35,140,'2021-12-15','2023-10-17','Fersulfate\r\n65 mg\r\nHematinic\r\n1 bottle\r\nAnti - Anemia \r\n1 Pack\r\nINDICATIONS: Iron deficiency\r\nCONTRA INDICATIONS: This information is not available at the moment\r\nPRECAUTIONS: Administration w/ food. Gastric irritation\r\nSIDE EFFECTS: Black stools\r\nDRUG INTERACTIONS: Tetracycline, antacids','5','14','1639539969p2.jpg'),(237,'Scott\'s DHA Gummies Strawberry Flavour 60s',35,454,'2021-12-09','2022-11-24','Product: 1 x Scott\'s DHA Gummies Strawberry Flavour 60s\r\n Rich in DHA to help support brain development\r\n Normal Growth & Bone development supported by Vitamin D\r\n Animal-shaped gummy in delicious orange flavour\r\n Recommended for kids ages 5-12 yrs old \r\n','5','24','1639540466ew.jpg'),(238,'Rogin - E Male Multivatimins Soft Gel 30 + 6 Capsule',46,636,'2021-12-23','2024-11-15','Multivitamins + Minerals + Deanol + Royal Jelly + Korean Panax Ginseng\r\nMultivitamin made for men, contains multivitamins and minerals including Korean Panax Ginseng and Vitamin E that helps boost stamina and youthful vitality.\r\n1 Bottle / 36 capsules\r\n','8','24','1639540655wewwt.png'),(239,'Lactezin 100 mg / 11 I.U. / 5 mg Capsule - 20s',67,540,'2021-12-08','2023-10-24','Vitamin E\r\n100 mg / 11 I.U / 5 mg Capsule\r\nAnti - Acne\r\n20 pcs Capsule\r\n','3','24','163954072022294.jpg'),(240,'Potencee 20 plus 5 Holiday Pack Tablet',54,125,'2021-12-15','2022-06-15','Ascorbic Acid\r\n500 mg\r\nSugar Coated tablet\r\n20 + 5 tablets','12','24','1639541096wewt.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category` (
  `Category_id` int NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (8,'Gatas'),(9,'Skin Cares'),(10,'Pain reliever'),(11,'Food'),(12,'Drinks'),(13,'Alcohol'),(14,'Supplements'),(16,'Milk'),(21,'Soap'),(22,'Cloats'),(23,'Eye  protection'),(24,'Vitamins'),(26,'baby & kids');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_supplier`
--

DROP TABLE IF EXISTS `product_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_supplier` (
  `Supplier_id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_supplier`
--

LOCK TABLES `product_supplier` WRITE;
/*!40000 ALTER TABLE `product_supplier` DISABLE KEYS */;
INSERT INTO `product_supplier` VALUES (2,'Daniel Ongayo'),(3,'Denise Lipata'),(4,'Froilan Castillo'),(5,'Reynalyn Tabora'),(6,'Jhovince Co'),(7,'Rommel Ebarola'),(8,'Ricky Amante'),(9,'Christian Sagusay'),(12,'Aries Cabansag');
/*!40000 ALTER TABLE `product_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `test` (
  `product_id` int NOT NULL,
  `category_id` int NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,1,'ASUS Laptop 1500','799.00','asus-laptop.jpg'),(2,1,'Microsoft Surface Pro 3','898.00','surface-pro.jpg'),(3,1,'Samsung EVO 32GB','12.00','samsung-sd-card.jpg'),(4,1,'Desktop Hard Drive','50.00','computer-hard-disk.jpg'),(5,1,'External Hard Drive','80.00','external-hard-disk.jpg'),(6,2,'Crock-Pot Oval Slow Cooker','34.00','crok-pot-cooker.jpg'),(7,2,'Magic Blender System','80.00','blender.jpg'),(8,2,'Cordless Hand Vacuum','40.00','vaccum-cleaner.jpg'),(9,2,'Dishwasher Detergent','15.00','detergent-powder.jpg'),(10,2,'Essential Oil Diffuser','20.00','unpower-difuser.jpg'),(11,3,'Medical Personalized','11.00','hand-bag.jpg'),(12,3,'Best Bridle Leather Belt','64.00','mens-belt.jpg'),(13,3,'HANDMADE Bow set','24.00','pastal-colors.jpg'),(14,3,'Ceramic Coffee Mug','18.00','coffee-mug.jpg'),(15,3,'Wine Birthday Glass','18.00','wine-glass.jpg'),(1,1,'ASUS Laptop 1500','799.00','asus-laptop.jpg'),(2,1,'Microsoft Surface Pro 3','898.00','surface-pro.jpg'),(3,1,'Samsung EVO 32GB','12.00','samsung-sd-card.jpg'),(4,1,'Desktop Hard Drive','50.00','computer-hard-disk.jpg'),(5,1,'External Hard Drive','80.00','external-hard-disk.jpg'),(6,2,'Crock-Pot Oval Slow Cooker','34.00','crok-pot-cooker.jpg'),(7,2,'Magic Blender System','80.00','blender.jpg'),(8,2,'Cordless Hand Vacuum','40.00','vaccum-cleaner.jpg'),(9,2,'Dishwasher Detergent','15.00','detergent-powder.jpg'),(10,2,'Essential Oil Diffuser','20.00','unpower-difuser.jpg'),(11,3,'Medical Personalized','11.00','hand-bag.jpg'),(12,3,'Best Bridle Leather Belt','64.00','mens-belt.jpg'),(13,3,'HANDMADE Bow set','24.00','pastal-colors.jpg'),(14,3,'Ceramic Coffee Mug','18.00','coffee-mug.jpg'),(15,3,'Wine Birthday Glass','18.00','wine-glass.jpg'),(1,1,'ASUS Laptop 1500','799.00','asus-laptop.jpg'),(2,1,'Microsoft Surface Pro 3','898.00','surface-pro.jpg'),(3,1,'Samsung EVO 32GB','12.00','samsung-sd-card.jpg'),(4,1,'Desktop Hard Drive','50.00','computer-hard-disk.jpg'),(5,1,'External Hard Drive','80.00','external-hard-disk.jpg'),(6,2,'Crock-Pot Oval Slow Cooker','34.00','crok-pot-cooker.jpg'),(7,2,'Magic Blender System','80.00','blender.jpg'),(8,2,'Cordless Hand Vacuum','40.00','vaccum-cleaner.jpg'),(9,2,'Dishwasher Detergent','15.00','detergent-powder.jpg'),(10,2,'Essential Oil Diffuser','20.00','unpower-difuser.jpg'),(11,3,'Medical Personalized','11.00','hand-bag.jpg'),(12,3,'Best Bridle Leather Belt','64.00','mens-belt.jpg'),(13,3,'HANDMADE Bow set','24.00','pastal-colors.jpg'),(14,3,'Ceramic Coffee Mug','18.00','coffee-mug.jpg'),(15,3,'Wine Birthday Glass','18.00','wine-glass.jpg');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-22 20:48:40
