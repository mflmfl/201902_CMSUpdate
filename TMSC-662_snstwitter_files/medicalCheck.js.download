// JavaScript Document
// $("body").append('<div id="checkMedical" class="modal fade" data-backdrop="static"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title text-danger futo">ご確認ください</h4></div><div class="modal-body"><p>東芝メディカルシステムズウェブサイト（www.toshiba-medical.co.jp）は、薬事法対象商品の情報を医療従事者向けにお届けするためのコンテンツを含んでおります。<br>お客様がアクセスされたページは医療従事者向けの情報を掲載しているため、閲覧は医療従事者限定とさせていただきます。</p><p>あなたは医療従事者（医師、診療放射線技師など）ですか？</p></div><div class="modal-footer"><div class="text-center"><button type="button" class="btn btn-primary btn-lg">はい</button><button type="button" class="btn btn-danger btn-lg">いいえ</button></div><p class="text-left section-10-top">◎「いいえ」の場合は、東芝メディカルシステムズWebサイトトップページへリンクします。</p></div></div></div></div>')



$(function(){

    var data = $.cookie('tmsc');

    $('#checkMedical').on('click', '.modal-footer .btn-primary', function () {
        var date = new Date();
        date.setTime(date.getTime() + (90 * 24 * 60 * 60 * 1000));
        $.cookie('tmsc', 'on', { expires: date, path: '/' });

        $('#checkMedical').modal('hide');
    });

    $('#checkMedical').on('click', '.modal-footer .btn-danger', function () {
        location.href = "/general";
    });

    if (data != 'on') {
        $('#checkMedical').modal('show');
    }

})
