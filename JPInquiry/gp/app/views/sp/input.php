<?php view("component/header"); ?>
<!-- contents -->
<div id="contents">
  <h2 class="page-title">新規開業プラン<br />お問い合わせ・資料請求</h2>
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

  <form action="./toiawase.php" method="post" name="form1" >
    <div class="form-block">
      <div class="form-title-area clearfix">
        <h3 class="form-title">■氏名 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "name"); ?>" name="name" class="text-long<?php if(isset($errors['name'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['name'])): ?><p class="fs-m error-txt"><?php echo $errors['name']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■開業予定日 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※半角数字</p>
      </div>
      <input name="year" type="text" size="8" value="<?php echo thaw($vars, "year"); ?>" class="year<?php if(isset($errors['kaigyo'])): ?> error-area<?php endif; ?>" />年
      <select name="month" class="dropdown-select<?php if(isset($errors['kaigyo'])): ?> error-area<?php endif; ?>">
        <option value="">--</option>
        <?php foreach($month_list as $key => $val): ?>
          <option value="<?php echo $key ?>" label="<?php echo $key; ?>"<?php echo (isset($vars['month']) && $vars['month'] == $key) ? " selected" : ""; ?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      月頃
      <?php if(isset($errors['kaigyo'])): ?><p class="fs-m error-txt"><?php echo $errors['kaigyo']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■開業予定場所 <span class="fs-m must">必須</span></h3>
      </div>
      <p>都道府県</p>
      <select name="pref1" class="dropdown-select<?php if(isset($errors['pref1'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
        <?php foreach($pref_list as $key => $val): ?>
          <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref1']) && $vars['pref1'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
        <?php endforeach; ?>
      </select>
      <?php if(isset($errors['pref1'])): ?><p class="fs-m error-txt"><?php echo $errors['pref1']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">市区町村</h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" name="address1" value="<?php echo thaw($vars, "address1"); ?>"class="text-long<?php if(isset($errors['address1'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['address1'])): ?><p class="fs-m error-txt"><?php echo $errors['address1']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">診療科（複数選択可）</h3>
      </div>
      <?php foreach($department_list as $key => $val): ?>
        <?php if($key == "09"): ?><br /><?php endif; ?>
        <label><input type="checkbox" name="department[]" value="<?php echo $key ?>"<?php echo (isset($vars['department']) && in_array($key, $vars['department'])) ? " checked" : ""; ?>/> <?php echo $val; ?></label>
      <?php endforeach; ?>
      <input type="text" name="department_etc" value="<?php echo thaw($vars, "department_etc"); ?>" class="text-middle<?php if(isset($errors['department'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['department'])): ?><p class="fs-m error-txt"><?php echo $errors['department']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■連絡先</h3>
      </div>
      <div class="form-title-area clearfix">
        <h3 class="form-title">郵便番号</h3>
        <p class="form-memo">※7桁半角数字</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "postcode1"); ?>" size="4" name="postcode1" class="zip-01<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "postcode2"); ?>" size="5" name="postcode2" class="zip-02<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>">
      <a href="javascript:;" id="zip-search1" class="zip-search" onClick="AjaxZip3.zip2addr('postcode1','postcode2','pref2','address2','');">住所検索</a>
      <p class="fs-m mb-10">※「<a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>」（日本郵便Webサイトへ）</p>
      <?php if(isset($errors['postcode'])): ?><p class="fs-m error-txt"><?php echo $errors['postcode']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">都道府県 </h3>
      </div>
      <select name="pref2" class="dropdown-select">
        <option value="">選択してください</option>
        <?php foreach($pref_list as $key => $val): ?>
          <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref2']) && $vars['pref2'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
        <?php endforeach; ?>
      </select>

      <div class="form-title-area clearfix">
        <h3 class="form-title">市区町村／番地</h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "address2"); ?>" name="address2" class="text-long<?php if(isset($errors['address2'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['address2'])): ?><p class="fs-m error-txt"><?php echo $errors['address2']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">電話番号</h3>
        <p class="form-memo">※半角数字</p>
      </div>
      <input type="text" name="phone1" size="5" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone1"); ?>" /> -
      <input type="text" name="phone2" size="5" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone2"); ?>" /> -
      <input type="text" name="phone3" size="5" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone3"); ?>" />
      <p class="mb-10">（内線：
      <input type="text" name="phone4" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone4"); ?>" />
      ）</p>
      <?php if(isset($errors['phone'])): ?><p class="fs-m error-txt"><?php echo $errors['phone']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">FAX</h3>
        <p class="form-memo">※半角数字</p>
      </div>
      <input type="text" name="fax1" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "fax1"); ?>" /> -
      <input type="text" name="fax2" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "fax2"); ?>" /> -
      <input type="text" name="fax3" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "fax3"); ?>" />
      <?php if(isset($errors['fax'])): ?><p class="fs-m error-txt"><?php echo $errors['fax']; ?></p><?php endif; ?>

    </div>

    <div class="btn-area"><input type="submit" value="次へ" /></div>

    <input type="hidden" name="mail" value="<?php echo thaw($vars['mail']) ?>" />
    <input type="hidden" name="mail_confirm" value="<?php echo thaw($vars['mail_confirm']) ?>" />
    <input type="hidden" name="company" value="<?php echo thaw($vars['company']) ?>" />
    <input type="hidden" name="postcode3" value="<?php echo thaw($vars['postcode3']) ?>" />
    <input type="hidden" name="postcode4" value="<?php echo thaw($vars['postcode4']) ?>" />
    <input type="hidden" name="pref3" value="<?php echo thaw($vars['pref3']) ?>" />
    <input type="hidden" name="address3" value="<?php echo thaw($vars['address3']) ?>" />
    <?php if(isset($vars['quote_type'])): ?>
      <?php foreach ($vars['quote_type'] as $key => $val): ?>
        <input type="hidden" name="quote_type[]" value="<?php echo thaw($val); ?>" />
      <?php endforeach; ?>
    <?php endif; ?>
    <input type="hidden" name="content" value="<?php echo thaw($vars['content']) ?>" />

    <input type="hidden" name="mode" value="input2" />
  </form>


</div><!-- // container -->
<?php view("component/footer"); ?>
