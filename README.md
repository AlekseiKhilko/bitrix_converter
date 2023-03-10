# bitrix currency converter component 

Компонент Битрикс, конвертор валют с использованием AJAX и кэширования. На основе курсов валют НБ РБ

 


Обновить курсы валют http://localhost/local/update.php

или

http://localhost/bitrix/admin/php_command_line.php?lang=ru
```
$updateRates = new \CurrencyExchangeRates\UpdateRates();
if($updateRates->update()){
   echo "Успешно обновлено";
}
```
или

CAgent::AddAgent("updateCurrency();");


Код компонента:
```
$APPLICATION->IncludeComponent(
	"example:converter", 
	".default", 
	array(
		"CACHE_TIME" => "600",
		"CACHE_TYPE" => "A",
		"TEXT" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"DEFAULT_CURRENCY_FROM" => "USD",
		"DEFAULT_CURRENCY_TO" => "BYN",
		"DEFAULT_AMOUNT" => "100"
	),
	false
);
```

## Структруа БД

```
DROP TABLE IF EXISTS `hr_rates`;
CREATE TABLE `hr_rates` (
    `ID` int NOT NULL AUTO_INCREMENT,
    `CURRENCY` char(3) COLLATE utf8mb3_unicode_ci NOT NULL,
    `RATE` decimal(10,4) NOT NULL,
    `DATE` datetime NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
```

Тестовые данные

```
TRUNCATE `hr_rates`;
INSERT INTO `hr_rates` (`ID`, `CURRENCY`, `RATE`, `DATE`) VALUES
(1,	'BYN',	1.0000,	'2023-01-08 12:33:43'),
(2,	'AUD',	1.8626,	'2023-01-08 00:00:00'),
(3,	'AMD',	0.0069,	'2023-01-08 00:00:00'),
(4,	'BGN',	1.4824,	'2023-01-08 00:00:00'),
(5,	'BRL',	0.5024,	'2023-01-08 00:00:00'),
(6,	'UAH',	0.0742,	'2023-01-08 00:00:00'),
(7,	'DKK',	0.3898,	'2023-01-08 00:00:00'),
(8,	'AED',	0.7429,	'2023-01-08 00:00:00'),
(9,	'USD',	2.7287,	'2023-01-08 00:00:00'),
(10,	'VND',	0.0001,	'2023-01-08 00:00:00'),
(11,	'EUR',	2.8992,	'2023-01-08 00:00:00'),
(12,	'PLN',	0.6206,	'2023-01-08 00:00:00'),
(13,	'JPY',	0.0206,	'2023-01-08 00:00:00'),
(14,	'INR',	0.0331,	'2023-01-08 00:00:00'),
(15,	'IRR',	0.0001,	'2023-01-08 00:00:00'),
(16,	'ISK',	0.0191,	'2023-01-08 00:00:00'),
(17,	'CAD',	2.0207,	'2023-01-08 00:00:00'),
(18,	'CNY',	0.3956,	'2023-01-08 00:00:00'),
(19,	'KWD',	8.9100,	'2023-01-08 00:00:00'),
(20,	'MDL',	0.1420,	'2023-01-08 00:00:00'),
(21,	'NZD',	1.7135,	'2023-01-08 00:00:00'),
(22,	'NOK',	0.2713,	'2023-01-08 00:00:00'),
(23,	'RUB',	0.0381,	'2023-01-08 00:00:00'),
(24,	'XDR',	3.6421,	'2023-01-08 00:00:00'),
(25,	'SGD',	2.0379,	'2023-01-08 00:00:00'),
(26,	'KGS',	0.0318,	'2023-01-08 00:00:00'),
(27,	'KZT',	0.0059,	'2023-01-08 00:00:00'),
(28,	'TRY',	0.1454,	'2023-01-08 00:00:00'),
(29,	'GBP',	3.2834,	'2023-01-08 00:00:00'),
(30,	'CZK',	0.1209,	'2023-01-08 00:00:00'),
(31,	'SEK',	0.2596,	'2023-01-08 00:00:00'),
(32,	'CHF',	2.9461,	'2023-01-08 00:00:00');
```
