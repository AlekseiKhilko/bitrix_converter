<?php
use \Bitrix\Main\Loader;

Loader::registerAutoLoadClasses($module = null, [
    'CurrencyExchangeRates\Orm\HrRatesTable' => '/local/php_interface/lib/orm/HrRates.php',
    'CurrencyExchangeRates\UpdateRates' => '/local/php_interface/lib/UpdateRates.php',
    'CurrencyExchangeRates\NbrbRates' => '/local/php_interface/lib/NbrbRates.php',
    'CurrencyExchangeRates\RatesInterface' => '/local/php_interface/lib/RatesInterface.php',
    'CurrencyExchangeRates\Repository\HrRatesRepository' => '/local/php_interface/lib/repository/HrRatesRepository.php'
]);
