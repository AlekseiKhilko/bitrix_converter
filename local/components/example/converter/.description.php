<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = [
    "NAME" => Loc::getMessage("EXAMPLE_CONVERTER_COMPONENT"),
    "DESCRIPTION" => Loc::getMessage("EXAMPLE_CONVERTER_COMPONENT_DESCRIPTION"),
    "COMPLEX" => "N",
    "PATH" => [
        "ID" => Loc::getMessage("EXAMPLE_CONVERTER_COMPONENT_PATH_ID"),
        "NAME" => Loc::getMessage("EXAMPLE_CONVERTER_COMPONENT_PATH_NAME"),
        "CHILD" => array(
            "ID" => Loc::getMessage("EXAMPLE_CONVERTER_COMPONENT_CHILD_PATH_ID"),
            "NAME" => Loc::getMessage("EXAMPLE_CONVERTER_COMPONENT_CHILD_PATH_NAME")
        )
    ],
];
