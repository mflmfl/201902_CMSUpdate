<?php view("component/header"); ?>
<div class="contwrap" id="parent">
  <div id="contact-contents"><!-- contents -->
    <h2 class="page-tti">診療所ソリューション｜お問い合わせ・資料請求</h2>
    <div class="status clearfix">
      <ul>
        <li class="status-item">規約の確認</li>
        <li class="arrow">→</li>
        <li class="status-item">項目の入力</li>
        <li class="arrow">→</li>
        <li class="status-item focus">入力内容の確認</li>
        <li class="arrow">→</li>
        <li class="status-item">送信完了</li>
      </ul>
    </div>

    <p class="mb-20">入力項目をご確認の上［送信］ボタンを押してください。</p>

    <form action="./index.php" name="form1" method="post">
      <div class="contact-table">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
          <tr class="border-btm">
            <td colspan="2">■氏名</td>
            <td>
              <?php echo h(thaw($vars, 'name')); ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td colspan="2">■施設名/会社名</td>
            <td>
              <?php echo h(thaw($vars, 'company')); ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td colspan="2">■所属</td>
            <td>
              <?php echo h(thaw($vars, 'section')); ?>
            </td>
          </tr>
          <tr class="">
            <td width="100">■連絡先</td>
            <td width="140">郵便番号</td>
            <td>
              <?php
              if(h(thaw($vars, 'postcode1')) || h(thaw($vars, 'postcode2'))) {
                echo implode("-",array( h(thaw($vars, 'postcode1')), h(thaw($vars, 'postcode2'))));
              }
              ?>
            </td>
          </tr>
          <tr class="">
            <td width="100">&nbsp;</td>
            <td width="140">都道府県</td>
            <td>
              <?php echo $pref_list[$vars['pref']]; ?>
            </td>
          </tr>
          <tr class="">
            <td width="100">&nbsp;</td>
            <td width="140">市区町村／番地</td>
            <td>
              <?php echo h(thaw($vars, 'address')); ?>
            </td>
          </tr>
          <tr class="">
            <td width="100">&nbsp;</td>
            <td width="140">電話番号</td>
            <td>
              <?php
              if($vars['phone1'] || $vars['phone2'] || $vars['phone3']) {
                echo implode("-", array( h(thaw($vars, 'phone1')), h(thaw($vars, 'phone2')), h(thaw($vars, 'phone3')) ));
              }
              ?>
              <?php if(h(thaw($vars, 'phone4'))): ?>
              （内線：<?php echo h(thaw($vars, 'phone4')); ?>）
              <?php endif; ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td width="100">&nbsp;</td>
            <td width="140">FAX</td>
            <td>
              <?php
              if($vars['fax1'] || $vars['fax2'] || $vars['fax3']) {
                echo implode("-", array( h(thaw($vars, 'fax1')), h(thaw($vars, 'fax2')), h(thaw($vars, 'fax3')) ));
              }
              ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td colspan="2">■E-mail</td>
            <td>
              <?php echo h(thaw($vars, 'mail')); ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td colspan="2" valign="top">■診療科（複数選択可）</td>
            <td>
              <?php
                $dep_names = [];
                if(isset($vars['department'])):
                  foreach ($vars['department'] as $key => $val):
                    if($val != "09"):
                      $dep_names[] = $department_list[$val];
                    endif;
                  endforeach;
                endif;
                echo implode("　",$dep_names);
              ?>
              <?php if($vars['department_etc']): ?>
                <br/>その他（<?php echo $vars['department_etc'] ?>）
              <?php endif; ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td colspan="2" valign="top">■規模</td>
            <td>
              <?php echo $capacity_list[$vars['capacity']] ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td colspan="2" valign="top">■お問い合わせ内容</td>
            <td>
              <?php echo nl2br(h(thaw($vars, 'content'))); ?>
            </td>
          </tr>
          <tr class="border-btm">
            <td colspan="2" valign="top">■資料請求</td>
            <td>
              資料を請求<?php echo (isset($vars['quote'])) ? "する" : "しない"; ?>
            </td>
          </tr>
          </tbody>
        </table>
      </div>

      <input type="hidden" name="mode" value="" />
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

      <script type="text/javascript">
        function formSubmit( str ) {
          var f = document.form1;
          f.reset();
          f.mode.value = str;
          f.submit();
        }
      </script>

      <div class="btn-area">
        <a href="javascript:;" class="page-back" onclick="formSubmit( 'input' );">修正する</a>
        <input type="submit" value="送信する" onclick="formSubmit( 'thanks' );" />
      </div>
    </form>

  </div><!-- /contents -->
  <?php view("component/footer"); ?>
