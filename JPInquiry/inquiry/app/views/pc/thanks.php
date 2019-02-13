<?php
 　header('Location: https://jp.medical.canon/contact/inquiry_thanks.html');
　 exit();
?>
<?php view("component/header"); ?>
<div class="contwrap" id="parent">

  <div id="contact-contents"><!-- contents -->
    <h2 class="page-tti">お問い合わせ</h2>
    <div class="status clearfix">
      <ul>
        <li class="status-item">規約の確認</li>
        <li class="arrow">→</li>
        <li class="status-item">項目の入力</li>
        <li class="arrow">→</li>
        <li class="status-item">入力内容の確認</li>
        <li class="arrow">→</li>
        <li class="status-item focus">送信完了</li>
      </ul>
    </div>

    <p class="complete-read">お問い合わせ・資料請求のお申し込みをいただき、誠にありがとうございました。<br />
      <br />
      ご記入いただいたメールアドレス宛に、お申し込みを承った旨のお知らせを送信いたしますので<br />
      ご確認ください（自動送信）。<br />
      <br />
      万が一お知らせが届かない場合はメールアドレス記入ミスの可能性がございます。<br />
      その場合はお手数をおかけしますが、再度お問い合わせいただけますようお願い申し上げます。</p>

    <div class="btn-area"><a href="https://jp.medical.canon/contact/index" class="go-top-btn">お問い合わせトップに戻る</a></div>

  </div><!-- /contents -->

</div><!-- .contwrap -->
<?php view("component/footer"); ?>
