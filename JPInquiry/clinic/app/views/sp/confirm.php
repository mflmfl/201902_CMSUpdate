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
      <li>項目2</li>
      <li>→</li>
      <li class="focus">確認</li>
      <li>→</li>
      <li>完了</li>
    </ul>
  </div>

  <p class="mb-20 fs-m fw-b">入力項目をご確認の上［送信］ボタンを押してください。</p>

  <div class="confirm-box">
    ■氏名<br />
    <?php echo h(thaw($vars, 'name')); ?>
  </div>

  <div class="confirm-box">
    ■施設名/会社名<br />
    <?php echo h(thaw($vars, 'company')); ?>
  </div>

  <div class="confirm-box">
    ■所属<br />
    <?php echo h(thaw($vars, 'section')); ?>
  </div>

  <div class="confirm-box">
    ■連絡先<br />
    <?php
    if(thaw($vars['postcode1']) || thaw($vars['postcode2'])) {
      echo implode("-", array(h(thaw($vars, 'postcode1')), h(thaw($vars, 'postcode2'))))."<br />";
    }
    ?>
    <?php echo $pref_list[$vars['pref']]; ?><br />
    <?php echo h(thaw($vars, 'address')); ?><br />
    電話番号
    <?php
    if(thaw($vars['phone1']) || thaw($vars['phone1']) || thaw($vars['phone3'])) {
      echo implode("-", array(h(thaw($vars, 'phone1')), h(thaw($vars, 'phone2')), h(thaw($vars, 'phone3'))))."<br />";
    }
    ?>
    <?php if(h(thaw($vars, 'phone4'))): ?>（内線：<?php echo h(thaw($vars, 'phone4')); ?>）<?php endif; ?><br />
    FAX
    <?php
    if(thaw($vars['fax1']) || thaw($vars['fax2']) || thaw($vars['fax3'])) {
      echo implode("-", array(h(thaw($vars, 'fax1')), h(thaw($vars, 'fax2')), h(thaw($vars, 'fax3'))));
    }
    ?>
  </div>

  <div class="confirm-box">
    ■E-mail<br />
    <?php echo h(thaw($vars, 'mail')); ?>
  </div>

  <div class="confirm-box">
    ■診療科<br />
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
  </div>

  <div class="confirm-box">
    ■規模<br />
    <?php echo $capacity_list[$vars['capacity']] ?>
  </div>

  <div class="confirm-box">
    ■お問い合わせ内容<br />
    <?php echo nl2br(h(thaw($vars, 'content'))); ?>
  </div>

  <div class="confirm-box">
    ■資料請求<br />
    資料を請求<?php echo (isset($vars['quote'])) ? "する" : "しない"; ?>
  </div>

  <form action="./index.php" method="post" name="form1" >

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

  <p class="mb-20"><a href="javascript:;" class="page-back" onclick="formSubmit( 'input' );">修正する</a></p>
  <div class="btn-area"><input type="submit" value="送信する" onclick="formSubmit( 'thanks' );" /></div>

</form>
<script type="text/javascript">
  function formSubmit( str ) {
    var f = document.form1;
    f.reset();
    f.mode.value = str;
    f.submit();
  }
</script>
</div><!-- // container -->
<?php view("component/footer"); ?>
