<?php view("component/header"); ?>
<div class="contwrap" id="parent">

  <div id="contact-contents"><!-- contents -->
    <h2 class="page-tti">お問い合わせ</h2>
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

    <p class="mb-20 strong">入力項目をご確認の上［送信］ボタンを押してください。</p>


    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="contact-table">
      <tbody>
      <tr class="border-btm">
        <td colspan="2">■氏名</td>
        <td><?php echo h(thaw($vars, 'name')); ?></td>
      </tr>
      <tr>
        <td width="100">■職業</td>
        <td width="140" align="center">職業1</td>
        <td><?php echo $job1_list[$vars['job1']]; ?></td>
      </tr>
      <tr class="border-btm">
        <td width="100">&nbsp;</td>
        <td width="140" align="center">職業2</td>
        <td><?php echo $job2_list[$vars['job1']][$vars['job2']]; ?></td>
      </tr>
      <tr class="border-btm">
        <td colspan="2">■施設名/会社名</td>
        <td><?php echo h(thaw($vars, 'company')); ?></td>
      </tr>
      <tr class="border-btm">
        <td width="100">■所属</td>
        <td width="140">&nbsp;</td>
        <td><?php echo h(thaw($vars, 'section')); ?></td>
      </tr>
      <tr>
        <td width="100">■連絡先</td>
        <td width="140">郵便番号</td>
        <td><?php echo h(thaw($vars, 'postcode1')); ?>-<?php echo h(thaw($vars, 'postcode2')); ?></td>
      </tr>
      <tr>
        <td width="100">&nbsp;</td>
        <td width="140">都道府県</td>
        <td><?php echo $pref_list[$vars['pref']]; ?></td>
      </tr>
      <tr>
        <td width="100">&nbsp;</td>
        <td width="140">市区町村／番地</td>
        <td><?php echo h(thaw($vars, 'address')); ?></td>
      </tr>
      <tr>
        <td width="100">&nbsp;</td>
        <td width="140">電話番号</td>
        <td><?php echo implode("-", array( h(thaw($vars, 'phone1')), h(thaw($vars, 'phone2')), h(thaw($vars, 'phone3')) )); ?>（内線：<?php echo h(thaw($vars, 'phone4')); ?>）</td>
      </tr>
      <tr class="border-btm">
        <td width="100">&nbsp;</td>
        <td width="140">FAX</td>
        <td>
          <?php
          if(thaw($vars,'fax1') || thaw($vars,'fax2') || thaw($vars,'fax3')) {
            echo implode("-", array( h(thaw($vars, 'fax1')), h(thaw($vars, 'fax2')), h(thaw($vars, 'fax3')) ));
          }
          ?>
        </td>
      </tr>
      <tr class="border-btm">
        <td colspan="2">■E-mail</td>
        <td><?php echo h(thaw($vars, 'mail')); ?></td>
      </tr>
      <?php if (2 != $vars['job1']): ?>
      <tr class="border-btm">
        <td colspan="2" valign="top">■お問い合わせ種別</td>
        <td>
          <?php echo $inquiry_list[$vars['job1']][$vars['inquiry_type']]; ?>
        </td>
      </tr>
      <?php endif; ?>
      <tr class="border-btm">
        <td colspan="2" valign="top">■お問い合わせ内容</td>
        <td>
          <?php echo nl2br(h(thaw($vars, 'content'))); ?>
        </td>
      </tr>
      </tbody>
    </table>


    <form name="form1" action="./prod_form.php" method="post">
      <input type="hidden" name="mode" value="" />
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
      <input type="hidden" name="mail" value="<?php echo thaw($vars, 'mail'); ?>" />
      <input type="hidden" name="mail_confirm" value="<?php echo thaw($vars, 'mail_confirm'); ?>" />
      <input type="hidden" name="inquiry_type" value="<?php echo thaw($vars, 'inquiry_type'); ?>" />
      <input type="hidden" name="content" value="<?php echo thaw($vars, 'content'); ?>" />


      <div class="btn-area">
        <a href="javascript:;" class="page-back" onclick="formSubmit( 'input' );">修正する</a>
        <input type="submit" value="送信する" onclick="formSubmit( 'thanks' );" />
      </div>

    </form>

  </div><!-- /contents -->

<script type="text/javascript">
  function formSubmit( str ) {
    var f = document.form1;
    f.reset();
    f.mode.value = str;
    f.submit();
  }
</script>

</div><!-- .contwrap -->
<?php view("component/footer"); ?>