CREATE TABLE IF NOT EXISTS `f16g13`.`Renters`(
   `renter_id` int(9),
   `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
   `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
   `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
   `created_date` datetime DEFAULT CURRENT_TIMESTAMP COLLATE utf8_unicode_ci,
   `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COLLATE utf8_unicode_ci,
   PRIMARY KEY (`renter_id`),
   UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `f16g13`.`Lessors`(
   `lessor_id` int(9) AUTO_INCREMENT,
   `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
   `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
   `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
   `status` tinyint(1),
   `created_date` datetime DEFAULT CURRENT_TIMESTAMP COLLATE utf8_unicode_ci,
   `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COLLATE utf8_unicode_ci,
   PRIMARY KEY (`lessor_id`),
   UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `f16g13`.`Apartments`(
   `apartment_id` int(9) AUTO_INCREMENT,
   `lessor_id` int (9),
   `street_address` varchar(100) COLLATE utf8_unicode_ci,
   `zipcode`int (5),
   `price`int (5),
   `rooms`int (1),
   `description` varchar(512) COLLATE utf8_unicode_ci,
   `created_date` datetime DEFAULT CURRENT_TIMESTAMP COLLATE utf8_unicode_ci,
   `modified_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COLLATE utf8_unicode_ci,
   `picture_1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
   `picture_2` varchar(200) COLLATE utf8_unicode_ci,
   `picture_3` varchar(200) COLLATE utf8_unicode_ci,
   `picture_4` varchar(200) COLLATE utf8_unicode_ci,
   `is_available` tinyint(1),
   PRIMARY KEY (`apartment_id`),
   FOREIGN KEY(`lessor_id`) REFERENCES `f16g13`.`Lessors`(`lessor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
