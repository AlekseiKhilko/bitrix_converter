<?php

namespace CurrencyExchangeRates;

use \Bitrix\Main\Web\HttpClient;
use \Bitrix\Main\SystemException;

class NbrbRates implements RatesInterface
{
    private $url = "https://www.nbrb.by/api/exrates/rates?periodicity=0";
    private $response;

    public function load()
    {
        $httpClient = new HttpClient();
        $this->response = $httpClient->get($this->url);
        if(empty($this->response)) {
            throw new SystemException("Empty responce");
        }
        return $this->toArray();
    }

    public function toArray()
    {
        return json_decode($this->response, true);
    }

}