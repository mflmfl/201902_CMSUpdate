<?php view("component/header"); ?>
  <!-- contents -->
  <div id="contents">
    <h2 class="page-title">新規開業プラン<br />お問い合わせ・資料請求</h2>
    <div class="flow-status">
      <ul>
        <li class="focus">規約</li>
        <li>→</li>
        <li>項目1</li>
        <li>→</li>
        <li>項目2</li>
        <li>→</li>
        <li>確認</li>
        <li>→</li>
        <li>完了</li>
      </ul>
    </div>

    <p class="mb-10">お問い合わせは下記サービス規約に則りご提供させていただきます。必ずご一読いただき、同意のうえでお申し込みいただくようお願いいたします。</p>

    <h3 class="corner-title">お問い合わせ規約</h3>
    <div class="tos-box">
      ■お問い合わせいただく前の注意
      <ul>
        <li>お客様にご記入頂く情報は、弊社もしくはグループ会社等からのご回答、情報提供に使わせて頂きます。</li>
        <li>利用目的の範囲内で、お客様の個人情報を当社グループ会社や委託業者が使用することがございます。</li>
        <li>お客様は、お客様ご本人の個人情報について、開示、訂正、削除をご請求いただけます。個人情報保護法に基づくご請求の場合、手数料をいただき、書面によって回答いたします。その際は下記お問い合わせ先までご連絡ください。 </li>
        <li>ご記入いただけない場合は、サービスの一部を提供できないことがあります。</li>
        <li>土曜日・日曜日・祝日・年末年始ほか、弊社休業日に頂いたお問い合わせについては、翌営業日以降の回答となりますのでご了承下さい。</li>
        <li>16歳未満のお客様は保護者の方の同意を得た上でお問い合わせ下さい。</li>
        <li>お客様の個人情報の取り扱い全般に関する当社の考え方をご覧になりたい方は <a href="https://jp.medical.canon/privacy">個人情報保護方針</a>のページをご覧下さい。</li>
      </ul>
      <!--■お問い合わせ先<br />
      東芝メディカルシステムズ（株）　広報室<br />
      電話：0287-26-5100<br />
      受付時間：9時～17時（土・日・祝日・当社休業日を除く）-->
    </div>

    <form action="" method="post" name="form1">
      <div class="tos-agree-box">
        <input type="checkbox" name="agree" id="agree" value="同意する" /><label for="agree" class="checkbox">規約に同意する</label>
        <div class="error-box">
          <p class="error-txt" style="display:none;">同意していただけない場合は、<br />お問い合わせはできません。</p>
        </div>
      </div>
      <input type="hidden" name="mode" value="input" />

      <div class="btn-area">
        <input type="submit" value="次へ" />
      </div>
    </form>

  </div><!-- // container -->
  <script type="text/javascript">
    $(function(){
      var $form = $("form[name=form1]");
      $form.on("submit",function(){
        var agree = $("#agree").prop("checked");
        if(agree) {
          $form.submit();
        } else {
          $form.find(".error-txt").show();
          return false;
        }
      });
    });
  </script>
<?php view("component/footer"); ?>