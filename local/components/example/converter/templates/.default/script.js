BX.ready(function () {

    BX.bindDelegate(document, 'click', {attribute: {'id': 'calculate'}}, function (ev) {

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
                if (response.status === 'success') {
                    BX('result').value = response.data.result;
                    BX('last_update').innerHTML = response.data.date;
                }
        });

    });
});