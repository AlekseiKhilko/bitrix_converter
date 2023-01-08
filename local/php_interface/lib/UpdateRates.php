<?php

namespace CurrencyExchangeRates;

use \CurrencyExchangeRates\Orm\HrRatesTable;
use \Bitrix\Main\Type as FieldType;
use \Bitrix\Main\SystemException;


class UpdateRates
{
    public function update()
    {
        $this->addBynCurrency();
        foreach($this->getRates() as $row) {
            $data = [];
            $data["CURRENCY"] = $row["Cur_Abbreviation"];
            $data["RATE"] = $this->prepareRate($row["Cur_Scale"], $row["Cur_OfficialRate"]);
            $data["DATE"] = $this->prepareDate($row["Date"]);
            $this->addOrUpdateCurrency($data);
        }
        return true;
    }

    public function addBynCurrency()
    {
        $data = [];
        $data["CURRENCY"] ="BYN";
        $data["RATE"] = 1;
        $data["DATE"] =  new FieldType\DateTime();
        $this->addOrUpdateCurrency($data);
    }

    public function addOrUpdateCurrency($data)
    {
        $currencyId = $this->getCurrencyByCode($data["CURRENCY"]);
        if(is_null($currencyId)) {
            $this->addCurrency($data);
        } else {
            $this->updateCurrency($currencyId, $data);
        }
    }

    public function getRates()
    {
        $nbrbRates = new NbrbRates();
        return $nbrbRates->load();
    }

    public function getCurrencyByCode($code)
    {
        $parameters = ["select" => ["ID"], "filter" => ['CURRENCY' => $code], "limit" => 1];
        $result =  HrRatesTable::getList($parameters);
        if($result->getSelectedRowsCount() !== 0) {
            return $result->fetchRaw()["ID"];
        }
        return null;
    }

    public function addCurrency($data)
    {
            $result = HrRatesTable::add($data);
            if($result->isSuccess()) {
                return $result->getId();
            } else {
                throw new SystemException($result->getErrorMessages());
            }
    }

    public function updateCurrency($id, $data)
    {
        $result = HrRatesTable::update($id, $data);
        if (!$result->isSuccess()) {
            throw new SystemException($result->getErrorMessages());
        }
    }

    public function prepareDate($date)
    {
        $format = "Y-m-d H:i:s";
        return new FieldType\DateTime(date($format, strtotime($date)), $format);
    }

    public function prepareRate($scale, $rate)
    {
        return ($scale != 1) ? round((float)$rate / (float)$scale, 4) : $rate;
    }
}