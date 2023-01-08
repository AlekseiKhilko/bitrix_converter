
DROP TABLE IF EXISTS `hr_rates`;
CREATE TABLE `hr_rates` (
                            `ID` int NOT NULL AUTO_INCREMENT,
                            `CURRENCY` char(3) COLLATE utf8mb3_unicode_ci NOT NULL,
                            `RATE` decimal(10,4) NOT NULL,
                            `DATE` datetime NOT NULL,
                            PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

