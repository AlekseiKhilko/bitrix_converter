<?php

use \CurrencyExchangeRates\Orm\HrRatesTable;
use \Bitrix\Main\Error;
use \Bitrix\Main\ErrorCollection;
use \Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class ExampleConverterComponent extends CBitrixComponent implements \Bitrix\Main\Engine\Contract\Controllerable, \Bitrix\Main\Errorable
{
    private $rates;
    protected $errorCollection;

    public function calculateAction($amount, $from, $to)
    {
        $this->getRates();
        $fromRate = $this->getRateById((float)$from);
        $toRate = $this->getRateById((float)$to);
        $rate = ($fromRate / $toRate);
        $date = $this->getDateById((float)$to);
        return ["result" => round((float)$amount * $rate, 4), "date" => $date];
    }

    public function configureActions(){
        return [
            'calculate' => [
                'prefilters' => [],
                'postfilters' => []
            ]
        ];
    }

    public function getErrors()
    {
        return $this->errorCollection->toArray();
    }

    public function getErrorByCode($code)
    {
        return $this->errorCollection->getErrorByCode($code);
    }

    public function executeComponent()
    {
        if ($this->StartResultCache($this->arParams['CACHE_TIME'])) {
            $this->getRates();
            $this->getResult();
            $this->IncludeComponentTemplate();
        }
    }

    public function onPrepareComponentParams($arParams)
    {
        $this->errorCollection = new ErrorCollection();
        if (!isset($arParams['CACHE_TIME'])) {
            $arParams['CACHE_TIME'] = 3600;
        } else {
            $arParams['CACHE_TIME'] = intval($arParams['CACHE_TIME']);
        }
        return $arParams;
    }

    protected function getRates()
    {
        $result = HrRatesTable::getList(["select" => ["*"], "order" => ["CURRENCY"], "cache" => ["ttl" => $this->arParams["CACHE_TIME"]] ]);
        $this->rates = [];
        while($row = $result->fetch()) {
            $this->rates[$row["ID"]] = $row;
        }
    }

    protected function getRateById($id)
    {
        if(isset($this->rates[$id])) {
            return (float)$this->rates[$id]["RATE"];
        }
        return null;
    }

    protected function getDateById($id)
    {
        if(isset($this->rates[$id])) {
            return (string)$this->rates[$id]["DATE"];
        }
        return null;
    }

    protected function getResult()
    {
        $this->arResult["AMOUNT"] = isset($this->arParams["DEFAULT_AMOUNT"]) ? $this->arParams["DEFAULT_AMOUNT"] : 1;
        $this->arResult["DEFALUT_CURRENCY_FROM"] = isset($this->arParams["DEFAULT_CURRENCY_FROM"]) ? $this->arParams["DEFAULT_CURRENCY_FROM"] : "USD";
        $this->arResult["DEFALUT_CURRENCY_TO"] = isset($this->arParams["DEFAULT_CURRENCY_TO"]) ? $this->arParams["DEFAULT_CURRENCY_TO"] : "EUR";
        $this->arResult['CURRENCY_LIST'] = $this->rates;
    }
}