<?php view("component/header"); ?>
<div class="contwrap" id="parent">

  <div id="contact-contents"><!-- contents -->
    <h2 class="page-tti">診療所ソリューション｜お問い合わせ・資料請求</h2>
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

    <div class="contact-table">
      <form action="./index.php" name="form1" method="post">
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
            <td width="140">郵便番号</td>
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
            <td width="140">都道府県</td>
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
            <td width="140">市区町村／番地</td>
            <td>
              <input type="text" value="<?php echo thaw($vars, "address"); ?>" size="70" name="address" class="text-long<?php if(isset($errors['address'])): ?> error-area<?php endif; ?>" />
              <span class="memo">※全角</span>
              <?php if(isset($errors['address'])): ?><p class="fs-m error-txt"><?php echo $errors['address']; ?></p><?php endif; ?>
            </td>
          </tr>
          <tr>
            <td width="100">&nbsp;</td>
            <td width="140">電話番号</td>
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
          <tr>
            <td colspan="2" valign="top">■診療科（複数選択可）</td>
            <td>
              <?php foreach($department_list as $key => $val): ?>
                <?php if($key == "07" || $key == "09"): ?><br /><?php endif; ?>
                <label><input type="checkbox" name="department[]" value="<?php echo $key ?>"<?php echo (isset($vars['department']) && in_array($key, $vars['department'])) ? " checked" : ""; ?>/> <?php echo $val; ?></label>
              <?php endforeach; ?>
              <input type="text" name="department_etc" value="<?php echo thaw($vars, "department_etc"); ?>" class="text-middle<?php if(isset($errors['department'])): ?> error-area<?php endif; ?>" />
              <?php if(isset($errors['department'])): ?><p class="fs-m error-txt"><?php echo $errors['department']; ?></p><?php endif; ?>
            </td>
          </tr>
          <tr>
            <td colspan="2">■規模</td>
            <td>
              <div class="dropdown">
                <select name="capacity" class="dropdown-select<?php if(isset($errors['capacity'])): ?> error-area<?php endif; ?>">
                  <option value="">選択してください</option>
                  <?php foreach($capacity_list as $key => $val): ?>
                    <option value="<?php echo $key ?>" label="<?php echo $val; ?>"<?php echo (isset($vars['capacity']) && $vars['capacity'] == $key) ? " selected" : ""; ?>><?php echo $val; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <?php if(isset($errors['capacity'])): ?><p class="fs-m error-txt"><?php echo $errors['capacity']; ?></p><?php endif; ?>
            </td>
          </tr>
          <tr>
            <td colspan="2" valign="top">■お問い合わせ内容</td>
            <td>
              <textarea name="content" cols="50" rows="10" class="textarea-box<?php if(isset($errors['content'])): ?> error-area<?php endif; ?>"><?php echo thaw($vars, "content"); ?></textarea>
              <?php if(isset($errors['content'])): ?><p class="fs-m error-txt"><?php echo $errors['content']; ?></p><?php endif; ?>
            </td>
          </tr>
          <tr>
            <td colspan="2">■資料請求</td>
            <td>
              <label><input type="checkbox" value="1" name="quote"<?php echo isset($vars['quote']) ? " checked" : ""; ?>> 資料を請求する</label>
            </td>
          </tr>
          </tbody>
        </table>

        <div class="btn-area">
          <input type="submit" value="入力内容の確認" />
        </div>

        <input type="hidden" name="mode" value="confirm" />

    </form>
  </div>
</div>


</div><!-- .contwrap -->
<?php view("component/footer"); ?>
