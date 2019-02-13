<?php view("component/header"); ?>
<!-- contents -->
<div id="contents">
  <h2 class="page-title">お問い合わせ</h2>
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

  <form name="form1" action="./prod_form.php" method="post">
    <div class="form-block">
      <div class="form-title-area clearfix">
        <h3 class="form-title">■Eメール <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※半角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "mail"); ?>" size="70" name="mail" class="text-long<?php if(isset($errors['mail'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['mail'])): ?><p class="fs-m error-txt"><?php echo $errors['mail']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">確認用 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※半角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "mail_confirm"); ?>" size="70" name="mail_confirm" class="text-long<?php if(isset($errors['mail_confirm'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['mail_confirm'])): ?><p class="fs-m error-txt"><?php echo $errors['mail_confirm']; ?></p><?php endif; ?>

      <?php if (2 != $vars['job1']): ?>
      <div class="form-title-area clearfix">
        <h3 class="form-title">お問い合わせ種類 <span class="fs-m must">必須</span></h3>
      </div>
      <select name="inquiry_type" id="inquiry_type" class="dropdown-select<?php if(isset($errors['inquiry_type'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
      <?php foreach($inquiry_list[$vars['job1']] as $key => $val): ?>
        <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['inquiry_type']) && $vars['inquiry_type'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
      <?php endforeach; ?>
      </select>
      <?php if(isset($errors['inquiry_type'])): ?><p class="fs-m error-txt"><?php echo $errors['inquiry_type']; ?></p><?php endif; ?>
      <?php else: ?>
      <input type="hidden" name="inquiry_type" value="00" />
      <?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">お問い合わせ内容 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※全角</p>
      </div>
      <textarea name="content" class="textarea-box<?php if(isset($errors['content'])): ?> error-area<?php endif; ?>"><?php echo thaw($vars, "content"); ?></textarea>
      <?php if(isset($errors['content'])): ?><p class="fs-m error-txt"><?php echo $errors['content']; ?></p><?php endif; ?>

    </div>

    <div class="btn-area">
      <input type="submit" value="入力内容の確認" />
    </div>

    <input type="hidden" name="name" value="<?php echo thaw($vars, 'name'); ?>" />
    <input type="hidden" name="job1" value="<?php echo thaw($vars, 'job1'); ?>" />
    <input type="hidden" name="job2" value="<?php echo thaw($vars, 'job2'); ?>" />
    <input type="hidden" name="company" value="<?php echo thaw($vars, 'company'); ?>" />
    <input type="hidden" name="section" value="<?php echo thaw($vars, 'section'); ?>" />
    <input type="hidden" name="postcode1" value="<?php echo thaw($vars, 'postcode1'); ?>" />
    <input type="hidden" name="postcode2" value="<?php echo thaw($vars, 'postcode2'); ?>" />
    <input type="hidden" name="pref" value="<?php echo thaw($vars, 'pref'); ?>" />
    <input type="hidden" name="address" value="<?php echo thaw($vars, 'address'); ?>" />
    <input type="hidden" name="phone1" value="<?php echo thaw($vars, 'phone1'); ?>" />
    <input type="hidden" name="phone2" value="<?php echo thaw($vars, 'phone2'); ?>" />
    <input type="hidden" name="phone3" value="<?php echo thaw($vars, 'phone3'); ?>" />
    <input type="hidden" name="phone4" value="<?php echo thaw($vars, 'phone4'); ?>" />
    <input type="hidden" name="fax1" value="<?php echo thaw($vars, 'fax1'); ?>" />
    <input type="hidden" name="fax2" value="<?php echo thaw($vars, 'fax2'); ?>" />
    <input type="hidden" name="fax3" value="<?php echo thaw($vars, 'fax3'); ?>" />

    <input type="hidden" name="mode" value="confirm" />
  </form>


  <script type="text/javascript">
    changeSelects();
    selectOption( document.form1.inquiry_type, '<?php echo thaw($vars, 'inquiry_type') ?>' );
  </script>


</div><!-- // container -->
<?php view("component/footer"); ?>
