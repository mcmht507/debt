$().ready(function () {
    // カンマ表示
    let debt = $('.currency-filed').text();
    if (debt != null) {
        debt = Number(debt);
        $('.currency-filed').text(debt.toLocaleString());
    }

    // 支払い押下時
    $('#pay-submit').click(function () {
        // checkbox確認
        let paylist = [];
        $('.pay-row').each(function (i, e) {
            let payCheck = e.children[0];
            let checked = $(payCheck).children().prop('checked');
            if (checked === true) {
                let payPayment = e.children[4];
                let obj = {
                    id: $(payCheck).children().prop('value'),
                    payment: $(payPayment).children().val()
                };
                paylist.push(obj);
            }
        });
        if (paylist.length === 0) {
            alert('支払い項目がチェックがされていません。');
            return false;
        } else {
            // post処理
            let payUrl = '/pay';
            let token = $('input[name="_token"]')[0].value;
            $.ajax({
                url: payUrl,
                type: 'POST',
                dataType: 'json',
                data: { paylist: paylist, _token: token },
            }).done(function (data) {
                window.location =data.url;
            }).fail(function (XMLHttpRequest, textStatus, errorThrown) {
                alert("支払いに失敗しました。");
            })
        }
    });
});

const delEvent = (input) => {
    let id = input.name;
    let payUrl = '/pay';
    let token = $('input[name="_token"]')[0].value;
    $.ajax({
        url: payUrl,
        type: 'DELETE',
        dataType: 'json',
        data: { id: id, _token: token },
    }).done(function (data) {
        window.location = data.url;
    }).fail(function (XMLHttpRequest, textStatus, errorThrown) {
        alert("削除に失敗しました。");
    });
};