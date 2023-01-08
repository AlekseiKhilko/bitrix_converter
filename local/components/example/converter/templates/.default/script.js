function calculate() {
    BX.ajax.runComponentAction('example:converter', 'calculate',
        {
            mode: 'class',
            data: {
                amount: BX('amount').value,
                from: BX('exchanger_from').value,
                to: BX('exchanger_to').value,
                //sessid: BX.message('bitrix_sessid')
            }
        }).then(function (response) {
        BX('result').value = response.data.result;
        BX('last_update').innerHTML = response.data.date;
    });
}