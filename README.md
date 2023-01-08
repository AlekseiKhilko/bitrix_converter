# bitrix currency converter component

Обновить курсы валют http://localhost/local/update.php

или

http://localhost/bitrix/admin/php_command_line.php?lang=ru
```
$updateRates = new \CurrencyExchangeRates\UpdateRates();
if($updateRates->update()){
   echo "Успешно обновлено";
}
```
