<?php view("component/header"); ?>
<!-- contents -->
<div id="contents">
  <h2 class="page-title">診療所ソリューション<br>お問い合わせ・資料請求</h2>
  <div class="flow-status">
    <ul>
      <li>規約</li>
      <li>→</li>
      <li class="focus">項目1</li>
      <li>→</li>
      <li>項目2</li>
      <li>→</li>
      <li>確認</li>
      <li>→</li>
      <li>完了</li>
    </ul>
  </div>

  <?php if(!empty($errors)): ?>
    <p class="error-read">入力内容にエラーがあります。メッセージを参考に修正してください。</p>
  <?php else: ?>
    <p class="mb-20">「<span class="must">必須</span>」は必須項目です。</p>
  <?php endif; ?>

  <form action="./index.php" method="post" name="form1" >
    <div class="form-block">
      <div class="form-title-area clearfix">
        <h3 class="form-title">■氏名 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "name"); ?>" size="70" name="name" class="text-long<?php if(isset($errors['name'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['name'])): ?><p class="fs-m error-txt"><?php echo $errors['name']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■施設名/会社名 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "company"); ?>" size="70" name="company" class="text-long<?php if(isset($errors['company'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['company'])): ?><p class="fs-m error-txt"><?php echo $errors['company']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■所属</h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "section"); ?>" size="70" name="section" class="text-long<?php if(isset($errors['section'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['section'])): ?><p class="fs-m error-txt"><?php echo $errors['section']; ?></p><?php endif; ?>

      <p>■連絡先</p>
      <div class="form-title-area clearfix">
        <h3 class="form-title">郵便番号</h3>
        <p class="form-memo">※7桁半角数字</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "postcode1"); ?>" size="4" name="postcode1" class="zip-01<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "postcode2"); ?>" size="5" name="postcode2" class="zip-02<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>">
      <a href="javascript:;" id="zip-search1" class="zip-search" onClick="AjaxZip3.zip2addr('postcode1','postcode2','pref','address','');">住所検索</a>
      <br><span class="fs-m">※「<a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>」（日本郵便Webサイトへ）</span>
      <?php if(isset($errors['postcode'])): ?><p class="fs-m error-txt"><?php echo $errors['postcode']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">都道府県</h3>
      </div>
      <select name="pref" class="dropdown-select<?php if(isset($errors['pref'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
        <?php foreach($pref_list as $key => $val): ?>
          <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref']) && $vars['pref'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
        <?php endforeach; ?>
      </select>
      <?php if(isset($errors['pref'])): ?><p class="fs-m error-txt"><?php echo $errors['pref']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">市区町村／番地</h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "address"); ?>" size="70" name="address" class="text-long<?php if(isset($errors['address'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['address'])): ?><p class="fs-m error-txt"><?php echo $errors['address']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">電話番号</h3>
        <p class="form-memo">※半角数字</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "phone1"); ?>" size="5" name="phone1" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "phone2"); ?>" size="5" name="phone2" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "phone3"); ?>" size="5" name="phone3" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>">
      <p class="mb-10">（内線：
      <input type="text" value="<?php echo thaw($vars, "phone4"); ?>" size="5" name="phone4" class="telno-02<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" />
      ）</p>
      <?php if(isset($errors['phone'])): ?><p class="fs-m error-txt"><?php echo $errors['phone']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">FAX</h3>
        <p class="form-memo">※半角数字</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "fax1"); ?>" size="5" name="fax1" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "fax2"); ?>" size="5" name="fax2" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "fax3"); ?>" size="5" name="fax3" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>">
      <?php if(isset($errors['fax'])): ?><p class="fs-m error-txt"><?php echo $errors['fax']; ?></p><?php endif; ?>

    </div>

    <div class="btn-area"><input type="submit" value="次へ" /></div>

    <input type="hidden" name="mail" value="<?php echo thaw($vars, 'mail'); ?>" />
    <input type="hidden" name="mail_confirm" value="<?php echo thaw($vars, 'mail_confirm'); ?>" />
    <?php if(isset($vars['department'])): foreach ($vars['department'] as $key => $val): ?>
      <input type="hidden" name="department[]" value="<?php echo $val; ?>" />
    <?php endforeach; endif; ?>
    <input type="hidden" name="department_etc" value="<?php echo thaw($vars, 'department_etc'); ?>" />
    <input type="hidden" name="capacity" value="<?php echo thaw($vars, 'capacity'); ?>" />
    <input type="hidden" name="content" value="<?php echo thaw($vars, 'content'); ?>" />
    <?php if(isset($vars['quote'])): ?>
      <input type="hidden" name="quote" value="<?php echo thaw($vars, 'quote'); ?>" />
    <?php endif; ?>

    <input type="hidden" name="mode" value="input2" />
  </form>


</div><!-- // container -->
<?php view("component/footer"); ?>
