<?php view("component/header"); ?>
<script type="text/javascript">
  var _job2_list = new Object();
  <?php foreach($job2_list as $key1 => $item): ?>
  _job2_list['<?php echo $key1 ?>'] = new Object();
  <?php foreach($item as $key2 => $val): ?>
  _job2_list['<?php echo $key1 ?>']['<?php echo $key2 ?>'] = '<?php echo $val ?>';
  <?php endforeach; ?>
  <?php endforeach; ?>

  function changeSelects() {
    var f = document.form1;
    var idx = f.job1.selectedIndex;
    _removeOptions( f.job2 );

    if( idx > 0 ) {
      var v = f.job1[idx].value;

      if( _job2_list[ v ] ) {
        _setOptions( f.job2, _job2_list[ v ] );
      }
    }
  }

  function _setOptions( sb, list ) {
    var i;
    sb.options[0] = new Option( '選択してください', '' );
    for( var v in list ) {
      i = sb.options.length;
      sb.options[i] = new Option( list[ v ], v );
    }
  }

  function _removeOptions( sb ) {
    for( var i = 0; i < sb.options.length; i++ ) {
      sb.removeChild( sb.options[ i ] );
    }
    sb.options.length = 0;
    sb.options[0] = new Option( '選択してください', '' );
  }

  function _showInquiryType() {
    d = document.getElementById( 'inquiry_type' );
    d.style.display = 'block';
  }

  function _hideInquiryType() {
    d = document.getElementById( 'inquiry_type' );
    d.style.display = 'none';
  }

  function selectOption( sb, k1 ) {
    if( k1 == '' ) {
      return false;
    }
    var op = sb.options;
    for( var i = 0; i < op.length; i ++ ) {
      if( k1 == op[i].value ) {
        op.selectedIndex = i;
        return true;
      }
    }
    return false;
  }

</script>
<!-- contents -->
<div id="contents">
  <h2 class="page-title">お問い合わせ</h2>
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

  <form name="form1" action="./prod_form.php" method="post">
    <div class="form-block">
      <div class="form-title-area clearfix">
        <h3 class="form-title">■氏名 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "name"); ?>" size="70" name="name" class="text-long<?php if(isset($errors['name'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['name'])): ?><p class="fs-m error-txt"><?php echo $errors['name']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">■職業 <span class="fs-m must">必須</span></h3>
      </div>
      <p>職業1</p>
      <select onchange="changeSelects()" name="job1" class="dropdown-select<?php if(isset($errors['job1'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
        <?php foreach($job1_list as $key => $val):  ?>
          <option value="<?php echo $key ?>" label="<?php echo $val ?>"<?php echo (isset($vars['job1']) && $vars['job1'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
        <?php endforeach; ?>
      </select>
      <?php if(isset($errors['job1'])): ?><p class="fs-m error-txt"><?php echo $errors['job1']; ?></p><?php endif; ?>
      <p>職業2</p>
      <select name="job2" class="dropdown-select<?php if(isset($errors['job2'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
      </select>
      <?php if(isset($errors['job2'])): ?><p class="fs-m error-txt"><?php echo $errors['job2']; ?></p><?php endif; ?>

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

      <div class="form-title-area clearfix">
        <h3 class="form-title">■連絡先</h3><br/>
        <h3 class="form-title">郵便番号 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※7桁半角数字</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "postcode1"); ?>" size="4" name="postcode1" class="zip-01<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>"> -
      <input type="text" value="<?php echo thaw($vars, "postcode2"); ?>" size="5" name="postcode2" class="zip-02<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>">
      <a href="javascript:;" id="zip-search1" class="zip-search" onClick="AjaxZip3.zip2addr('postcode1','postcode2','pref','address','');">住所検索</a>
      <p class="fs-m mb-10">※「<a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>」（日本郵便Webサイトへ）</p>
      <?php if(isset($errors['postcode'])): ?><p class="fs-m error-txt"><?php echo $errors['postcode']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">都道府県 <span class="fs-m must">必須</span></h3>
      </div>
      <select name="pref" class="dropdown-select<?php if(isset($errors['pref'])): ?> error-area<?php endif; ?>">
        <option value="">選択してください</option>
        <?php foreach($pref_list as $key => $val): ?>
          <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref']) && $vars['pref'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
        <?php endforeach; ?>
      </select>
      <?php if(isset($errors['pref'])): ?><p class="fs-m error-txt"><?php echo $errors['pref']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">市区町村／番地 <span class="fs-m must">必須</span></h3>
        <p class="form-memo">※全角</p>
      </div>
      <input type="text" value="<?php echo thaw($vars, "address"); ?>" size="70" name="address" class="text-long<?php if(isset($errors['address'])): ?> error-area<?php endif; ?>" />
      <?php if(isset($errors['address'])): ?><p class="fs-m error-txt"><?php echo $errors['address']; ?></p><?php endif; ?>

      <div class="form-title-area clearfix">
        <h3 class="form-title">電話番号 <span class="fs-m must">必須</span></h3>
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
    <input type="hidden" name="inquiry_type" value="<?php echo thaw($vars, 'inquiry_type'); ?>" />
    <input type="hidden" name="content" value="<?php echo thaw($vars, 'content'); ?>" />

    <input type="hidden" name="mode" value="input2" />
  </form>


  <script type="text/javascript">
    selectOption( document.form1.job1, "<?php echo thaw($vars, 'job1') ?>" );
    changeSelects();
    selectOption( document.form1.job2, "<?php echo thaw($vars, 'job2') ?>" );
  </script>

</div><!-- // container -->
<?php view("component/footer"); ?>
