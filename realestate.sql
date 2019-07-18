/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.1.38-MariaDB : Database - real_state
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`real_state` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `real_state`;

/*Table structure for table `property` */

DROP TABLE IF EXISTS `property`;

CREATE TABLE `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `description` text,
  `latitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `for_sale` mediumtext,
  `potential_listings` mediumtext,
  `for_rent` mediumtext,
  `recently_sold` tinyint(4) DEFAULT NULL,
  `open_houses` tinyint(4) DEFAULT NULL,
  `pending_under` tinyint(4) DEFAULT NULL,
  `max_price` int(11) DEFAULT NULL,
  `min_price` int(11) DEFAULT NULL,
  `beds` int(11) DEFAULT NULL,
  `home_types` mediumtext,
  `baths` int(11) DEFAULT NULL,
  `square_feet_min` int(11) DEFAULT NULL,
  `square_feet_max` int(11) DEFAULT NULL,
  `lot_size` int(11) DEFAULT NULL,
  `year_built_min` int(11) DEFAULT NULL,
  `year_built_max` int(11) DEFAULT NULL,
  `max_hoa` int(11) DEFAULT NULL,
  `days_on_zillow` int(11) DEFAULT NULL,
  `Keywords` mediumtext,
  `miles` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `property` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `flag` tinyint(4) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`email`,`password`,`flag`,`type`,`join_date`) values (1,'mingming','mingming424224@gmail.com','7b63d1cafe15e5edab88a8e81de794b5',NULL,NULL,'2019-05-02 17:23:15'),(2,'demo','demo@demo.com','fe01ce2a7fbac8fafaed7c982a04e229',NULL,NULL,'2019-05-02 17:26:28');

/*Table structure for table `user_cart` */

DROP TABLE IF EXISTS `user_cart`;

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `user_cart` */

insert  into `user_cart`(`id`,`user_id`,`data`) values (3,2,'{\"zpid\":4443378,\"streetAddress\":\"412 N Washington St\",\"zipcode\":\"60187\",\"city\":\"Wheaton\",\"state\":\"IL\",\"latitude\":41.86894,\"longitude\":-88.101539,\"price\":1400000,\"dateSold\":0,\"bathrooms\":5,\"bedrooms\":6,\"livingArea\":4686,\"yearBuilt\":-1,\"lotSize\":19602,\"homeType\":\"SINGLE_FAMILY\",\"homeStatus\":\"FOR_SALE\",\"photoCount\":24,\"imageLink\":\"https://photos.zillowstatic.com/p_g/ISaxvrfxln08wo1000000000.jpg\",\"daysOnZillow\":-1,\"isFeatured\":false,\"shouldHighlight\":false,\"brokerId\":13881,\"zestimate\":1053272,\"rentZestimate\":4100,\"listing_sub_type\":{\"is_FSBA\":true},\"priceReduction\":\"\",\"isUnmappable\":false,\"rentalPetsFlags\":64,\"mediumImageLink\":\"https://photos.zillowstatic.com/p_c/ISaxvrfxln08wo1000000000.jpg\",\"isPreforeclosureAuction\":false,\"homeStatusForHDP\":\"FOR_SALE\",\"priceForHDP\":1400000,\"festimate\":779421,\"isListingOwnedByCurrentSignedInAgent\":false,\"isListingClaimedByCurrentSignedInUser\":false,\"hiResImageLink\":\"https://photos.zillowstatic.com/p_f/ISaxvrfxln08wo1000000000.jpg\",\"watchImageLink\":\"https://photos.zillowstatic.com/p_j/ISaxvrfxln08wo1000000000.jpg\",\"tvImageLink\":\"https://photos.zillowstatic.com/p_m/ISaxvrfxln08wo1000000000.jpg\",\"tvCollectionImageLink\":\"https://photos.zillowstatic.com/p_l/ISaxvrfxln08wo1000000000.jpg\",\"tvHighResImageLink\":\"https://photos.zillowstatic.com/p_n/ISaxvrfxln08wo1000000000.jpg\",\"zillowHasRightsToImages\":false,\"desktopWebHdpImageLink\":\"https://photos.zillowstatic.com/p_h/ISaxvrfxln08wo1000000000.jpg\",\"hideZestimate\":false,\"isPremierBuilder\":false,\"isZillowOwned\":false,\"currency\":\"USD\",\"country\":\"USA\"}'),(4,2,'{\"zpid\":2132210189,\"streetAddress\":\"1495 S County Farm Rd APT 2-1\",\"zipcode\":\"60189\",\"city\":\"Wheaton\",\"state\":\"IL\",\"latitude\":41.848245,\"longitude\":-88.141791,\"price\":149000,\"dateSold\":0,\"bathrooms\":2,\"bedrooms\":2,\"livingArea\":1270,\"yearBuilt\":-1,\"lotSize\":-1,\"homeType\":\"CONDO\",\"homeStatus\":\"FOR_SALE\",\"photoCount\":12,\"imageLink\":\"https://photos.zillowstatic.com/p_g/ISatcmfhgrtpz40000000000.jpg\",\"daysOnZillow\":-1,\"isFeatured\":false,\"shouldHighlight\":false,\"brokerId\":14312,\"zestimate\":158606,\"listing_sub_type\":{\"is_FSBA\":true},\"priceReduction\":\"\",\"isUnmappable\":false,\"rentalPetsFlags\":64,\"mediumImageLink\":\"https://photos.zillowstatic.com/p_c/ISatcmfhgrtpz40000000000.jpg\",\"isPreforeclosureAuction\":false,\"homeStatusForHDP\":\"FOR_SALE\",\"priceForHDP\":149000,\"festimate\":117368,\"isListingOwnedByCurrentSignedInAgent\":false,\"isListingClaimedByCurrentSignedInUser\":false,\"hiResImageLink\":\"https://photos.zillowstatic.com/p_f/ISatcmfhgrtpz40000000000.jpg\",\"watchImageLink\":\"https://photos.zillowstatic.com/p_j/ISatcmfhgrtpz40000000000.jpg\",\"lotId\":1006868737,\"tvImageLink\":\"https://photos.zillowstatic.com/p_m/ISatcmfhgrtpz40000000000.jpg\",\"tvCollectionImageLink\":\"https://photos.zillowstatic.com/p_l/ISatcmfhgrtpz40000000000.jpg\",\"tvHighResImageLink\":\"https://photos.zillowstatic.com/p_n/ISatcmfhgrtpz40000000000.jpg\",\"zillowHasRightsToImages\":false,\"lotId64\":1006868737,\"desktopWebHdpImageLink\":\"https://photos.zillowstatic.com/p_h/ISatcmfhgrtpz40000000000.jpg\",\"hideZestimate\":false,\"isPremierBuilder\":false,\"isZillowOwned\":false,\"currency\":\"USD\",\"country\":\"USA\"}'),(5,2,'{\"zpid\":4436455,\"streetAddress\":\"503 Newton Ave\",\"zipcode\":\"60137\",\"city\":\"Glen Ellyn\",\"state\":\"IL\",\"latitude\":41.877772,\"longitude\":-88.074461,\"price\":299900,\"dateSold\":0,\"bathrooms\":4,\"bedrooms\":4,\"livingArea\":1353,\"yearBuilt\":-1,\"lotSize\":9600,\"homeType\":\"SINGLE_FAMILY\",\"homeStatus\":\"FOR_SALE\",\"photoCount\":19,\"imageLink\":\"https://photos.zillowstatic.com/p_g/ISyb7pwvdhuxp40000000000.jpg\",\"daysOnZillow\":-1,\"isFeatured\":false,\"shouldHighlight\":false,\"brokerId\":17004,\"zestimate\":315739,\"rentZestimate\":2500,\"listing_sub_type\":{\"is_FSBA\":true},\"priceReduction\":\"\",\"isUnmappable\":false,\"rentalPetsFlags\":64,\"mediumImageLink\":\"https://photos.zillowstatic.com/p_c/ISyb7pwvdhuxp40000000000.jpg\",\"isPreforeclosureAuction\":false,\"homeStatusForHDP\":\"FOR_SALE\",\"priceForHDP\":299900,\"festimate\":233646,\"isListingOwnedByCurrentSignedInAgent\":false,\"isListingClaimedByCurrentSignedInUser\":false,\"hiResImageLink\":\"https://photos.zillowstatic.com/p_f/ISyb7pwvdhuxp40000000000.jpg\",\"watchImageLink\":\"https://photos.zillowstatic.com/p_j/ISyb7pwvdhuxp40000000000.jpg\",\"tvImageLink\":\"https://photos.zillowstatic.com/p_m/ISyb7pwvdhuxp40000000000.jpg\",\"tvCollectionImageLink\":\"https://photos.zillowstatic.com/p_l/ISyb7pwvdhuxp40000000000.jpg\",\"tvHighResImageLink\":\"https://photos.zillowstatic.com/p_n/ISyb7pwvdhuxp40000000000.jpg\",\"zillowHasRightsToImages\":false,\"desktopWebHdpImageLink\":\"https://photos.zillowstatic.com/p_h/ISyb7pwvdhuxp40000000000.jpg\",\"hideZestimate\":false,\"isPremierBuilder\":false,\"isZillowOwned\":false,\"currency\":\"USD\",\"country\":\"USA\"}');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
