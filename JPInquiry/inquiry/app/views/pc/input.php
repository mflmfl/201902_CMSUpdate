<?php view("component/header"); ?>
<script type="text/javascript">
  var _job2_list = new Object();
  <?php foreach($job2_list as $key1 => $item): ?>
  _job2_list['<?php echo $key1 ?>'] = new Object();
  <?php foreach($item as $key2 => $val): ?>
  _job2_list['<?php echo $key1 ?>']['<?php echo $key2 ?>'] = '<?php echo $val ?>';
  <?php endforeach; ?>
  <?php endforeach; ?>


  var _inquiry_type_list = new Object();
  <?php foreach($inquiry_list as $key1 => $item): ?>
  _inquiry_type_list['<?php echo $key1 ?>'] = new Object();
  <?php foreach($item as $key2 => $val): ?>
  _inquiry_type_list['<?php echo $key1 ?>']['<?php echo $key2 ?>'] = '<?php echo $val ?>';
  <?php endforeach; ?>
  <?php endforeach; ?>

  function changeSelects() {
    var f = document.form1;
    var idx = f.job1.selectedIndex;
    _removeOptions( f.job2 );
    _removeOptions( f.inquiry_type );

    if( idx > 0 ) {
      var v = f.job1[idx].value;

      if( _job2_list[ v ] ) {
        _setOptions( f.job2, _job2_list[ v ] );
      }

      if( _inquiry_type_list[ v ] ) {
        _showInquiryType();
        _setOptions( f.inquiry_type, _inquiry_type_list[ v ] );
        if( 2 === idx ) {
          f.inquiry_type.selectedIndex = 1;
          _hideInquiryType();
        }
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
    d = document.getElementById( 'inquiry_type_row' );
    d.style.display = '';
  }

  function _hideInquiryType() {
    d = document.getElementById( 'inquiry_type_row' );
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

<div class="contwrap" id="parent">

<div id="contact-contents"><!-- contents -->
  <h2 class="page-tti">お問い合わせ</h2>
  <div class="status clearfix">
    <ul>
      <li class="status-item">規約の確認</li>
      <li class="arrow">→</li>
      <li class="status-item focus">項目の入力</li>
      <li class="arrow">→</li>
      <li class="status-item">入力内容の確認</li>
      <li class="arrow">→</li>
      <li class="status-item">送信完了</li>
    </ul>
  </div>

  <?php if(!empty($errors)): ?>
    <p class="mb-20 error-txt">入力内容にエラーがあります。メッセージを参考に修正してください。</p>
  <?php else: ?>
    <p class="mb-20">「<span class="must">必須</span>」は必須項目となります。</p>
  <?php endif; ?>

  <form name="form1" action="./prod_form.php" method="post">
    <div class="contact-table">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
          <td colspan="2">■氏名 <span class="must-text">必須</span></td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "name"); ?>" size="70" name="name" class="text-long<?php if(isset($errors['name'])): ?> error-area<?php endif; ?>" />
            <span class="memo">※全角</span>
            <?php if(isset($errors['name'])): ?><p class="fs-m error-txt"><?php echo $errors['name']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">■職業 <span class="must-text">必須</span></td>
          <td width="140" align="center">職業1</td>
          <td>
            <div class="dropdown">
              <select onchange="changeSelects()" name="job1" class="dropdown-select<?php if(isset($errors['job1'])): ?> error-area<?php endif; ?>">
                <option value="">選択してください</option>
                <?php foreach($job1_list as $key => $val):  ?>
                  <option value="<?php echo $key ?>" label="<?php echo $val ?>"<?php echo (isset($vars['job1']) && $vars['job1'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php if(isset($errors['job1'])): ?><p class="fs-m error-txt"><?php echo $errors['job1']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">&nbsp;</td>
          <td width="140" align="center">職業2</td>
          <td>
            <div class="dropdown">
              <select name="job2" class="dropdown-select<?php if(isset($errors['job2'])): ?> error-area<?php endif; ?>">
                <option value="">選択してください</option>
              </select>
            </div>
            <?php if(isset($errors['job2'])): ?><p class="fs-m error-txt"><?php echo $errors['job2']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">■施設名/会社名 <span class="must-text">必須</span></td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "company"); ?>" size="70" name="company" class="text-long<?php if(isset($errors['company'])): ?> error-area<?php endif; ?>" />
            <span class="memo">※全角</span>
            <?php if(isset($errors['company'])): ?><p class="fs-m error-txt"><?php echo $errors['company']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">■所属</td>
          <td width="140">&nbsp;</td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "section"); ?>" size="70" name="section" class="text-long<?php if(isset($errors['section'])): ?> error-area<?php endif; ?>" />
            <span class="memo">※全角</span>
            <?php if(isset($errors['section'])): ?><p class="fs-m error-txt"><?php echo $errors['section']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">■連絡先</td>
          <td width="140">郵便番号 <span class="must-text">必須</span></td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "postcode1"); ?>" size="4" name="postcode1" class="zip-01<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>"> -
            <input type="text" value="<?php echo thaw($vars, "postcode2"); ?>" size="5" name="postcode2" class="zip-02<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>">
            <a href="javascript:;" id="zip-search1" class="zip-search" onClick="AjaxZip3.zip2addr('postcode1','postcode2','pref','address','');">住所検索</a>
            <span class="memo">※7桁半角数字</span><br />
            <span class="fs-m">※「<a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>」（日本郵便Webサイトへ）</span>
            <?php if(isset($errors['postcode'])): ?><p class="fs-m error-txt"><?php echo $errors['postcode']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">&nbsp;</td>
          <td width="140">都道府県 <span class="must-text">必須</span></td>
          <td>
            <div class="dropdown">
              <select name="pref" class="dropdown-select<?php if(isset($errors['pref'])): ?> error-area<?php endif; ?>">
                <option value="">選択してください</option>
                <?php foreach($pref_list as $key => $val): ?>
                  <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref']) && $vars['pref'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php if(isset($errors['pref'])): ?><p class="fs-m error-txt"><?php echo $errors['pref']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">&nbsp;</td>
          <td width="140">市区町村／番地 <span class="must-text">必須</span></td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "address"); ?>" size="70" name="address" class="text-long<?php if(isset($errors['address'])): ?> error-area<?php endif; ?>" />
            <span class="memo">※全角</span>
            <?php if(isset($errors['address'])): ?><p class="fs-m error-txt"><?php echo $errors['address']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">&nbsp;</td>
          <td width="140">電話番号 <span class="must-text">必須</span></td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "phone1"); ?>" size="5" name="phone1" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>"> -
            <input type="text" value="<?php echo thaw($vars, "phone2"); ?>" size="5" name="phone2" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>"> -
            <input type="text" value="<?php echo thaw($vars, "phone3"); ?>" size="5" name="phone3" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>">
            （内線：
            <input type="text" value="<?php echo thaw($vars, "phone4"); ?>" size="5" name="phone4" class="telno-02<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" />
            ）<span class="memo">※半角数字</span>
            <?php if(isset($errors['phone'])): ?><p class="fs-m error-txt"><?php echo $errors['phone']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">&nbsp;</td>
          <td width="140">FAX</td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "fax1"); ?>" size="5" name="fax1" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>"> -
            <input type="text" value="<?php echo thaw($vars, "fax2"); ?>" size="5" name="fax2" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>"> -
            <input type="text" value="<?php echo thaw($vars, "fax3"); ?>" size="5" name="fax3" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>">
            <span class="memo">※半角数字</span>
            <?php if(isset($errors['fax'])): ?><p class="fs-m error-txt"><?php echo $errors['fax']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td colspan="2">■E-mail <span class="must-text">必須</span></td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "mail"); ?>" size="70" name="mail" class="text-long<?php if(isset($errors['mail'])): ?> error-area<?php endif; ?>" />
            <span class="memo">※半角</span>
            <?php if(isset($errors['mail'])): ?><p class="fs-m error-txt"><?php echo $errors['mail']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td width="100">&nbsp;</td>
          <td width="140" align="center">確認用</td>
          <td>
            <input type="text" value="<?php echo thaw($vars, "mail_confirm"); ?>" size="70" name="mail_confirm" class="text-long<?php if(isset($errors['mail_confirm'])): ?> error-area<?php endif; ?>" />
            <span class="memo">※半角</span>
            <?php if(isset($errors['mail_confirm'])): ?><p class="fs-m error-txt"><?php echo $errors['mail_confirm']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr id="inquiry_type_row">
          <td colspan="2" valign="top">■お問い合わせ種類 <span class="must-text">必須</span></td>
          <td>
            <div class="dropdown">
              <select name="inquiry_type" id="inquiry_type" class="dropdown-select<?php if(isset($errors['inquiry_type'])): ?> error-area<?php endif; ?>">
                <option value="">選択してください</option>
              </select>
            </div>
            <?php if(isset($errors['inquiry_type'])): ?><p class="fs-m error-txt"><?php echo $errors['inquiry_type']; ?></p><?php endif; ?>
          </td>
        </tr>
        <tr>
          <td colspan="2" valign="top">■お問い合わせ内容 <span class="must-text">必須</span></td>
          <td>
            <textarea name="content" cols="50" rows="10" class="textarea-box<?php if(isset($errors['content'])): ?> error-area<?php endif; ?>"><?php echo thaw($vars, "content"); ?></textarea>
            <?php if(isset($errors['content'])): ?><p class="fs-m error-txt"><?php echo $errors['content']; ?></p><?php endif; ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>

    <div class="btn-area">
      <input type="submit" value="入力内容の確認" />
    </div>

    <input type="hidden" name="mode" value="confirm" />
  </form>

</div><!-- /contents -->

<script type="text/javascript">
  selectOption( document.form1.job1, "<?php echo thaw($vars, 'job1') ?>" );
  changeSelects();
  selectOption( document.form1.job2, "<?php echo thaw($vars, 'job2') ?>" );
  selectOption( document.form1.inquiry_type, '<?php echo thaw($vars, 'inquiry_type') ?>' );
</script>

</div><!-- .contwrap -->
<?php view("component/footer"); ?>
