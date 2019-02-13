<?php view("component/header"); ?>
<!-- contents -->
<div id="contents">
  <h2 class="page-title">診療所ソリューション<br>お問い合わせ・資料請求</h2>
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

  <form action="./index.php" method="post" name="form1" >
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

      <div class="form-title-area clearfix">
        <h3 class="form-title">■診療科（複数選択可）</h3>
      </div>
      <?php foreach($department_list as $key => $val): ?>
        <?php if($key == "05" || $key == "09"): ?><br /><?php endif; ?>
        <label><input type="checkbox" name="department[]" value="<?php echo $key ?>"<?php echo (isset($vars['department']) && in_array($key, $vars['department'])) ? " checked" : ""; ?>/> <?php echo $val; ?></label>
      <?php endforeach; ?><br>
      <input type="text" name="department_etc" value="<?php echo thaw($vars, "department_etc"); ?>" class="text-long<?php if(isset($errors['department'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['department'])): ?><p class="fs-m error-txt"><?php echo $errors['department']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■規模</h3>
      </div>
      <select name="capacity" class="dropdown-select<?php if(isset($errors['capacity'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
        <?php foreach($capacity_list as $key => $val): ?>
          <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['capacity']) && $vars['capacity'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
        <?php endforeach; ?>
      </select>
      <?php if(isset($errors['capacity'])): ?><p class="fs-m error-txt"><?php echo $errors['capacity']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">お問い合わせ内容</h3>
        <p class="form-memo">※全角</p>
      </div>
      <textarea name="content" class="textarea-box<?php if(isset($errors['content'])): ?> error-area<?php endif; ?>"><?php echo thaw($vars, "content"); ?></textarea>
      <?php if(isset($errors['content'])): ?><p class="fs-m error-txt"><?php echo $errors['content']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■資料請求</h3>
      </div>
      <label><input type="checkbox" value="1" name="quote"<?php echo isset($vars['quote']) ? " checked" : ""; ?>> 資料を請求する</label>

    </div>

    <div class="btn-area">
      <input type="submit" value="入力内容の確認" />
    </div>

    <input type="hidden" name="name" value="<?php echo thaw($vars, 'name'); ?>" />
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


</div><!-- // container -->
<?php view("component/footer"); ?>
