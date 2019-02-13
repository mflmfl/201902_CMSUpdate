<?php view("component/header"); ?>
<!-- contents -->
<div id="contents">
  <h2 class="page-title">新規開業プラン<br />お問い合わせ・資料請求</h2>
  <div class="flow-status">
    <ul>
      <li>規約</li>
      <li>→</li>
      <li>項目1</li>
      <li>→</li>
      <li class="focus">項目2</li>
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
        <h3 class="form-title">■Eメール <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※半角</p>
      </div>
      <input type="text" name="mail" value="<?php echo thaw($vars, "mail"); ?>" class="text-long<?php if(isset($errors['mail'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['mail'])): ?><p class="fs-m error-txt"><?php echo $errors['mail']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">確認用 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※半角</p>
      </div>
      <input type="text" name="mail_confirm" value="<?php echo thaw($vars, "mail_confirm"); ?>" class="text-long<?php if(isset($errors['mail_confirm'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['mail_confirm'])): ?><p class="fs-m error-txt"><?php echo $errors['mail_confirm']; ?></p><?php endif; ?>

      <p>■勤務先</p>
      <div class="form-title-area clearfix">
        <h3 class="form-title">勤務先名称</h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "company"); ?>" name="company" class="text-long<?php if(isset($errors['company'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['company'])): ?><p class="fs-m error-txt"><?php echo $errors['company']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">郵便番号 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※7桁半角数字</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "postcode3"); ?>" name="postcode3" class="size-zip01<?php if(isset($errors['postcode2'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "postcode4"); ?>" name="postcode4" class="size-zip02<?php if(isset($errors['postcode2'])): ?> error-area<?php endif; ?>">
      <a href="javascript:;" id="zip-search1" class="zip-search" onClick="AjaxZip3.zip2addr('postcode3','postcode4','pref3','address3','');">住所検索</a>
      <br><span class="fs-m">※「<a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>」（日本郵便Webサイトへ）</span>
      <?php if(isset($errors['postcode2'])): ?><p class="fs-m error-txt"><?php echo $errors['postcode2']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">都道府県 <span class="fs-m must">必須</span></h3>
      </div>
      <select name="pref3" class="dropdown-select<?php if(isset($errors['pref3'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
        <?php foreach($pref_list as $key => $val): ?>
          <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref3']) && $vars['pref3'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
        <?php endforeach; ?>
      </select>
      <?php if(isset($errors['pref3'])): ?><p class="fs-m error-txt"><?php echo $errors['pref3']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">市区町村／番地 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "address3"); ?>" name="address3" class="text-long<?php if(isset($errors['address3'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['address3'])): ?><p class="fs-m error-txt"><?php echo $errors['address3']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■請求希望資料（複数選択可）</h3>
      </div>
      <?php foreach($quote_type_list as $key => $val): ?>
          <?php if(in_array($key,array("04","06"))): ?><br/><?php endif; ?>
        <label><input type="checkbox" name="quote_type[]" value="<?php echo $key ?>"<?php echo (isset($vars['quote_type']) && in_array($key, $vars['quote_type'])) ? " checked" : ""; ?>/> <?php echo $val; ?></label>
      <?php endforeach; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">お問い合わせ内容</h3>
        <p class="form-memo">※全角</p>
      </div>
      <textarea class="textarea-box<?php if(isset($errors['content'])): ?> error-area<?php endif; ?>" name="content"><?php echo thaw($vars, "content"); ?></textarea>
      <?php if(isset($errors['content'])): ?><p class="fs-m error-txt"><?php echo $errors['address3']; ?></p><?php endif; ?>

    </div>

    <div class="btn-area">
      <input type="submit" value="入力内容の確認" />
    </div>

    <input type="hidden" name="agree" value="<?php echo thaw($vars['agree']) ?>" />
    <input type="hidden" name="name" value="<?php echo thaw($vars['name']) ?>" />
    <input type="hidden" name="year" value="<?php echo thaw($vars['year']) ?>" />
    <input type="hidden" name="month" value="<?php echo thaw($vars['month']) ?>" />
    <input type="hidden" name="pref1" value="<?php echo thaw($vars['pref1']) ?>" />
    <input type="hidden" name="address1" value="<?php echo thaw($vars['address1']) ?>" />
    <?php if(isset($vars['department'])): foreach ($vars['department'] as $key => $val): ?>
      <input type="hidden" name="department[]" value="<?php echo thaw($val); ?>" />
    <?php endforeach; endif; ?>
    <input type="hidden" name="department_etc" value="<?php echo thaw($vars['department_etc']) ?>" />
    <input type="hidden" name="postcode1" value="<?php echo thaw($vars['postcode1']) ?>" />
    <input type="hidden" name="postcode2" value="<?php echo thaw($vars['postcode2']) ?>" />
    <input type="hidden" name="pref2" value="<?php echo thaw($vars['pref2']) ?>" />
    <input type="hidden" name="address2" value="<?php echo thaw($vars['address2']) ?>" />
    <input type="hidden" name="phone1" value="<?php echo thaw($vars['phone1']) ?>" />
    <input type="hidden" name="phone2" value="<?php echo thaw($vars['phone2']) ?>" />
    <input type="hidden" name="phone3" value="<?php echo thaw($vars['phone3']) ?>" />
    <input type="hidden" name="phone4" value="<?php echo thaw($vars['phone4']) ?>" />
    <input type="hidden" name="fax1" value="<?php echo thaw($vars['fax1']) ?>" />
    <input type="hidden" name="fax2" value="<?php echo thaw($vars['fax2']) ?>" />
    <input type="hidden" name="fax3" value="<?php echo thaw($vars['fax3']) ?>" />

    <input type="hidden" name="mode" value="confirm" />
  </form>


</div><!-- // container -->
<?php view("component/footer"); ?>
