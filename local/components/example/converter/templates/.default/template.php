<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="exchange">
<?=getMessage('EXAMPLE_CONVERTER_TEXT_CONVERT')?>
<input type="text" name="amount" id="amount" value="<?=$arResult["AMOUNT"]?>" size="10">
<select name="exchanger_from" id="exchanger_from">
    <?foreach ($arResult["CURRENCY_LIST"] as $key => $arCurrency):?>
    <option value="<?=$arCurrency["ID"]?>"<?=($arCurrency["CURRENCY"]==$arResult["DEFALUT_CURRENCY_FROM"]?" selected":"")?>><?=$arCurrency["CURRENCY"]?></option>
    <?endforeach?>
</select>
 >>
<input type="text" name="result" id="result" value="" size="10">
<select name="exchanger_to" id="exchanger_to">
    <?foreach ($arResult["CURRENCY_LIST"] as $key => $arCurrency):?>
        <option value="<?=$arCurrency["ID"]?>"<?=($arCurrency["CURRENCY"]==$arResult["DEFALUT_CURRENCY_TO"]?" selected":"")?>><?=$arCurrency["CURRENCY"]?></option>
    <?endforeach?>
</select>
<input name="calculate" id="calculate" type="button" value="<?=getMessage('EXAMPLE_CONVERTER_TEXT_CALCULATE')?>" onclick="calculate()">
    <div id="last_update"></div>
