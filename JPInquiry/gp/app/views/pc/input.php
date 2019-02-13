<?php view("component/header"); ?>
<div class="contwrap" id="parent">

<div id="contact-contents"><!-- contents -->
<h2 class="page-tti">新規開業プラン｜お問い合わせ・資料請求</h2>
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

<form action="./toiawase.php" method="post" name="form1" >
  <div class="contact-table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
      <tr>
        <td colspan="3">■氏名 <span class="must-text">必須</span></td>
        <td width="520">
          <input type="text" value="<?php echo thaw($vars, "name"); ?>" name="name" class="text-long<?php if(isset($errors['name'])): ?> error-area<?php endif; ?>" />
          <span class="memo">※全角</span>
          <?php if(isset($errors['name'])): ?><p class="fs-m error-txt"><?php echo $errors['name']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3">■開業予定日 <span class="must-text">必須</span></td>
        <td width="520">
          <input name="year" type="text" size="8" value="<?php echo thaw($vars, "year"); ?>" class="year<?php if(isset($errors['kaigyo'])): ?> error-area<?php endif; ?>" />
          年
          <div class="dropdown">
            <select name="month" class="dropdown-select<?php if(isset($errors['kaigyo'])): ?> error-area<?php endif; ?>">
              <option value="">--</option>
              <?php foreach($month_list as $key => $val): ?>
                <option value="<?php echo $key ?>" label="<?php echo $key; ?>"<?php echo (isset($vars['month']) && $vars['month'] == $key) ? " selected" : ""; ?>><?php echo $key; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          月頃
          <?php if(isset($errors['kaigyo'])): ?><p class="fs-m error-txt"><?php echo $errors['kaigyo']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td colspan="2">■開業予定場所 <span class="must-text">必須</span></td>
        <td width="100" align="left">都道府県</td>
        <td width="520">
          <div class="dropdown">
            <select name="pref1" class="dropdown-select<?php if(isset($errors['pref1'])): ?> error-area<?php endif; ?>">
              <option value="">選択してください</option>
              <?php foreach($pref_list as $key => $val): ?>
                <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref1']) && $vars['pref1'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <?php if(isset($errors['pref1'])): ?><p class="fs-m error-txt"><?php echo $errors['pref1']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td width="140">&nbsp;</td>
        <td width="100" align="left">&nbsp;</td>
        <td width="100" align="left">市区町村</td>
        <td width="520">
          <input type="text" name="address1" value="<?php echo thaw($vars, "address1"); ?>"class="text-long<?php if(isset($errors['address1'])): ?> error-area<?php endif; ?>" />
          <span class="memo">※全角</span>
          <?php if(isset($errors['address1'])): ?><p class="fs-m error-txt"><?php echo $errors['address1']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3" valign="top">■診療科（複数選択可）</td>
        <td width="520">
          <?php foreach($department_list as $key => $val): ?>
            <?php if($key == "07" || $key == "09"): ?><br /><?php endif; ?>
            <label><input type="checkbox" name="department[]" value="<?php echo $key ?>"<?php echo (isset($vars['department']) && in_array($key, $vars['department'])) ? " checked" : ""; ?>/> <?php echo $val; ?></label>
          <?php endforeach; ?>
          <input type="text" name="department_etc" value="<?php echo thaw($vars, "department_etc"); ?>" class="text-middle<?php if(isset($errors['department'])): ?> error-area<?php endif; ?>" />
          <?php if(isset($errors['department'])): ?><p class="fs-m error-txt"><?php echo $errors['department']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td width="140">■連絡先</td>
        <td colspan="2">郵便番号</td>
        <td width="520">
          <input type="text" value="<?php echo thaw($vars, "postcode1"); ?>" size="4" name="postcode1" class="zip-01<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>"> -
          <input type="text" value="<?php echo thaw($vars, "postcode2"); ?>" size="5" name="postcode2" class="zip-02<?php if(isset($errors['postcode'])): ?> error-area<?php endif; ?>">
          <a href="javascript:;" id="zip-search1" class="zip-search" onClick="AjaxZip3.zip2addr('postcode1','postcode2','pref2','address2','');">住所検索</a>
          <span class="memo">※7桁半角数字</span><br />
          <span class="fs-m">※「<a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>」（日本郵便Webサイトへ）</span>
          <?php if(isset($errors['postcode'])): ?><p class="fs-m error-txt"><?php echo $errors['postcode']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td width="140">&nbsp;</td>
        <td colspan="2">都道府県</td>
        <td width="520">
          <div class="dropdown">
            <select name="pref2" class="dropdown-select">
              <option value="">選択してください</option>
              <?php foreach($pref_list as $key => $val): ?>
                <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref2']) && $vars['pref2'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td width="140">&nbsp;</td>
        <td colspan="2">市区町村／番地</td>
        <td width="520">
          <input type="text" value="<?php echo thaw($vars, "address2"); ?>" name="address2" class="text-long<?php if(isset($errors['address2'])): ?> error-area<?php endif; ?>" />
          <span class="memo">※全角</span>
          <?php if(isset($errors['address2'])): ?><p class="fs-m error-txt"><?php echo $errors['address2']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td width="140">&nbsp;</td>
        <td colspan="2">電話番号</td>
        <td width="520">
          <input type="text" name="phone1" size="5" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone1"); ?>" /> -
          <input type="text" name="phone2" size="5" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone2"); ?>" /> -
          <input type="text" name="phone3" size="5" class="telno-01<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone3"); ?>" />
          （内線：<input type="text" name="phone4" class="telno-02<?php if(isset($errors['phone'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "phone4"); ?>" />）
          <span class="memo">※半角数字</span>
          <?php if(isset($errors['phone'])): ?><p class="fs-m error-txt"><?php echo $errors['phone']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td width="140">&nbsp;</td>
        <td colspan="2">FAX</td>
        <td width="520">
          <input type="text" name="fax1" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "fax1"); ?>" /> -
          <input type="text" name="fax2" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "fax2"); ?>" /> -
          <input type="text" name="fax3" class="telno-01<?php if(isset($errors['fax'])): ?> error-area<?php endif; ?>" value="<?php echo thaw($vars, "fax3"); ?>" />
          <span class="memo">※半角数字</span>
          <?php if(isset($errors['fax'])): ?><p class="fs-m error-txt"><?php echo $errors['fax']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3">■E-mail <span class="must-text">必須</span></td>
        <td width="520">
          <input type="text" name="mail" value="<?php echo thaw($vars, "mail"); ?>" class="text-long<?php if(isset($errors['mail'])): ?> error-area<?php endif; ?>" />
          <span class="memo">※半角</span>
          <?php if(isset($errors['mail'])): ?><p class="fs-m error-txt"><?php echo $errors['mail']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td width="140">&nbsp;</td>
        <td colspan="2" align="center">確認用</td>
        <td width="520">
          <input type="text" name="mail_confirm" value="<?php echo thaw($vars, "mail_confirm"); ?>" class="text-long<?php if(isset($errors['mail_confirm'])): ?> error-area<?php endif; ?>" />
          <span class="memo">※半角</span>
          <?php if(isset($errors['mail_confirm'])): ?><p class="fs-m error-txt"><?php echo $errors['mail_confirm']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>■勤務先</td>
        <td colspan="2">勤務先名称</td>
        <td width="520">
          <input type="text" value="<?php echo thaw($vars, "company"); ?>" name="company" class="text-long<?php if(isset($errors['company'])): ?> error-area<?php endif; ?>" />
          <span class="memo">※全角</span>
          <?php if(isset($errors['company'])): ?><p class="fs-m error-txt"><?php echo $errors['company']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">郵便番号 <span class="must-text">必須</span></td>
        <td width="520">
          <input type="text" value="<?php echo thaw($vars, "postcode3"); ?>" name="postcode3" class="zip-01<?php if(isset($errors['postcode2'])): ?> error-area<?php endif; ?>"> -
          <input type="text" value="<?php echo thaw($vars, "postcode4"); ?>" name="postcode4" class="zip-02<?php if(isset($errors['postcode2'])): ?> error-area<?php endif; ?>">
          <a href="javascript:;" id="zip-search1" class="zip-search" onClick="AjaxZip3.zip2addr('postcode3','postcode4','pref3','address3','');">住所検索</a>
          <span class="memo">※7桁半角数字</span><br />
          <span class="fs-m">※「<a href="http://www.post.japanpost.jp/zipcode/" target="_blank">郵便番号検索</a>」（日本郵便Webサイトへ）</span>
          <?php if(isset($errors['postcode2'])): ?><p class="fs-m error-txt"><?php echo $errors['postcode2']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">都道府県 <span class="must-text">必須</span></td>
        <td width="520">
          <div class="dropdown">
            <select name="pref3" class="dropdown-select<?php if(isset($errors['pref3'])): ?> error-area<?php endif; ?>">
              <option value="">選択してください</option>
              <?php foreach($pref_list as $key => $val): ?>
                <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['pref3']) && $vars['pref3'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <?php if(isset($errors['pref3'])): ?><p class="fs-m error-txt"><?php echo $errors['pref3']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">市区町村／番地 <span class="must-text">必須</span></td>
        <td width="520">
          <input type="text" value="<?php echo thaw($vars, "address3"); ?>" name="address3" class="text-long<?php if(isset($errors['address3'])): ?> error-area<?php endif; ?>" />
          <span class="memo">※全角</span>
          <?php if(isset($errors['address3'])): ?><p class="fs-m error-txt"><?php echo $errors['address3']; ?></p><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3" valign="top">■請求希望資料 <br />
          （複数選択可）</td>
        <td width="520">
          <?php foreach($quote_type_list as $key => $val): ?>
            <?php if($key == "06"): ?><br/><?php endif; ?>
            <label><input type="checkbox" name="quote_type[]" value="<?php echo $key ?>"<?php echo (isset($vars['quote_type']) && in_array($key, $vars['quote_type'])) ? " checked" : ""; ?>/> <?php echo $val; ?></label>
          <?php endforeach; ?>
        </td>
      </tr>
      <tr>
        <td colspan="3" valign="top">■お問い合わせ内容</td>
        <td width="520">
          <textarea class="textarea-box<?php if(isset($errors['content'])): ?> error-area<?php endif; ?>" name="content"><?php echo thaw($vars, "content"); ?></textarea>
          <?php if(isset($errors['content'])): ?><p class="fs-m error-txt"><?php echo $errors['address3']; ?></p><?php endif; ?>
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



</div><!-- .contwrap -->
<?php view("component/footer"); ?>
