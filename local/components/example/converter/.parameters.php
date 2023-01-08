<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc as Loc;
use \CurrencyExchangeRates\Orm\HrRatesTable;

$result = HrRatesTable::getList(["select" => ["ID", "CURRENCY"], "order" => ["CURRENCY"]]);
$arCurrencyLIst = [];
while($row = $result->fetch()) {
    $code = $row["CURRENCY"];
    $arCurrencyLIst[$code] = $code;
}

$arComponentParameters = array(
    'GROUPS' => array(
    ),
    'PARAMETERS' => array(
        "DEFAULT_CURRENCY_FROM" => [
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage('EXAMPLE_CONVERTER_PARAMETERS_DEFAULT_CURRENCY_FROM'),
            "TYPE" => "LIST",
            "VALUES" => $arCurrencyLIst,
            "REFRESH" => "Y"
        ],
        "DEFAULT_CURRENCY_TO" => [
            "PARENT" => "BASE",
            "NAME" => Loc::getMessage('EXAMPLE_CONVERTER_PARAMETERS_DEFAULT_CURRENCY_TO'),
            "TYPE" => "LIST",
            "VALUES" => $arCurrencyLIst,
            "REFRESH" => "Y"
        ],
        'DEFAULT_AMOUNT' => Array(
            'PARENT' => 'BASE',
            'NAME' => Loc::getMessage('EXAMPLE_CONVERTER_PARAMETERS_DEFAULT_AMOUNT'),
            'TYPE' => 'INTEGER',
            'DEFAULT' => 1
        ),
        'CACHE_TIME' => [
            'DEFAULT' => 3600
        ],
    )
);