<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Конвертор валют");

?><?$APPLICATION->IncludeComponent(
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
);?><?php require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"; ?>