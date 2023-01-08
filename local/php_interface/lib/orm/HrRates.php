<?php

namespace CurrencyExchangeRates\Orm;


use Bitrix\Main\Entity;
use Bitrix\Main\Entity\DatetimeField;
use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\Entity\FloatField;
use Bitrix\Main\Entity\Validator;


class HrRatesTable extends DataManager
{
    public static function getTableName()
    {
        return 'hr_rates';
    }

    public static function getMap()
    {
        return array(
            new IntegerField('ID', array(
                'autocomplete' => true,
                'primary' => true,
                'title' => 'ID',
            )),
            new StringField('CURRENCY', array(
                'title' => 'CURRENCY'
            )),
            new FloatField('RATE', array(
                'title' => 'RATE'
            )),
            new DatetimeField('DATE', array(
                'title' => 'DATE'
            ))
        );
    }
}