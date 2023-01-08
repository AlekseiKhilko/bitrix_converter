<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog.php");

$updateRates = new \CurrencyExchangeRates\UpdateRates();
if($updateRates->update()){
   echo "Успешно обновлено";
}
