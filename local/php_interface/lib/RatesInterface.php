<?php

namespace CurrencyExchangeRates;

interface RatesInterface
{
    public function load();

    public function toArray();
}