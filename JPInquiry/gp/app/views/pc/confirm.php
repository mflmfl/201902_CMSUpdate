<?php view("component/header") ?>
<div class="contwrap" id="parent">



  <div id="contact-contents"><!-- contents -->
    <h2 class="page-tti">新規開業プラン｜お問い合わせ・資料請求</h2>
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

    <div class="contact-table">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr class="border-btm">
          <td colspan="3">■氏名</td>
          <td>
            <?php echo h(thaw($vars, 'name')); ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td colspan="3">■開業予定日</td>
          <td>
            <?php echo h(thaw($vars, 'year')); ?>年 <?php echo h(thaw($vars, 'month')); ?>月 頃
          </td>
        </tr>
        <tr>
          <td colspan="2">■開業予定場所</td>
          <td width="100" align="left">都道府県</td>
          <td>
            <?php echo $pref_list[$vars['pref1']]; ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td width="140">&nbsp;</td>
          <td width="100" align="left">&nbsp;</td>
          <td width="100" align="left">市区町村</td>
          <td>
            <?php echo h(thaw($vars, 'address1')); ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td colspan="3" valign="top">■診療科（複数選択可）</td>
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
        <tr>
          <td width="140">■連絡先</td>
          <td colspan="2">郵便番号</td>
          <td>
            <?php
            if(thaw($vars['postcode1']) || thaw($vars['postcode2'])) {
              echo implode("-",array( h(thaw($vars['postcode1'])), h(thaw($vars['postcode2']))) );
            }
            ?>
          </td>
        </tr>
        <tr>
          <td width="140">&nbsp;</td>
          <td colspan="2">都道府県</td>
          <td>
            <?php echo isset($vars['pref2']) ? $pref_list[$vars['pref2']] : ""; ?>
          </td>
        </tr>
        <tr>
          <td width="140">&nbsp;</td>
          <td colspan="2">市区町村／番地</td>
          <td>
            <?php echo h(thaw($vars, 'address2')); ?>
          </td>
        </tr>
        <tr>
          <td width="140">&nbsp;</td>
          <td colspan="2">電話番号</td>
          <td>
            <?php
            if(thaw($vars['phone1']) || thaw($vars['phone1']) || thaw($vars['phone3'])) {
              echo implode("-", array(h(thaw($vars, 'phone1')), h(thaw($vars, 'phone2')), h(thaw($vars, 'phone3'))));
            }
            ?>
            <?php if(h(thaw($vars, 'phone4'))): ?>（内線：<?php echo h(thaw($vars, 'phone4')); ?>）<?php endif; ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td width="140">&nbsp;</td>
          <td colspan="2">FAX</td>
          <td>
            <?php
            if(thaw($vars['fax1']) || thaw($vars['fax2']) || thaw($vars['fax3'])) {
              echo implode("-", array(h(thaw($vars, 'fax1')), h(thaw($vars, 'fax2')), h(thaw($vars, 'fax3'))));
            }
            ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td colspan="3">■E-mail</td>
          <td>
            <?php echo h(thaw($vars, 'mail')); ?>
          </td>
        <tr>
          <td>■勤務先</td>
          <td colspan="2">勤務先名称</td>
          <td>
            <?php echo h(thaw($vars, 'company')); ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">郵便番号</td>
          <td>
            <?php
            if(thaw($vars['postcode3']) || thaw($vars['postcode4'])) {
              echo implode("-", array(h(thaw($vars, 'postcode3')), h(thaw($vars, 'postcode4'))));
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">都道府県</td>
          <td>
            <?php echo isset($vars['pref3']) ? $pref_list[$vars['pref3']] : ""; ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td>&nbsp;</td>
          <td colspan="2">市区町村／番地</td>
          <td>
            <?php echo h(thaw($vars, 'address3')); ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td colspan="3" valign="top">■請求希望資料<br />
            （複数選択可）</td>
          <td>
            <?php
            $quote_name = [];
            if(isset($vars['quote_type'])):
              foreach ($vars['quote_type'] as $key => $val):
                $quote_name[] = $quote_type_list[$val];
              endforeach;
            endif;
            echo implode("　",$quote_name);
            ?>
          </td>
        </tr>
        <tr class="border-btm">
          <td colspan="3" valign="top">■お問い合わせ内容</td>
          <td>
            <?php echo nl2br(h(thaw($vars, 'content'))); ?>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
    <form action="./toiawase.php" method="post" name="form1" >

      <input type="hidden" name="mode" value="" />
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
      <input type="hidden" name="mail" value="<?php echo thaw($vars['mail']) ?>" />
      <input type="hidden" name="mail_confirm" value="<?php echo thaw($vars['mail_confirm']) ?>" />
      <input type="hidden" name="company" value="<?php echo thaw($vars['company']) ?>" />
      <input type="hidden" name="postcode3" value="<?php echo thaw($vars['postcode3']) ?>" />
      <input type="hidden" name="postcode4" value="<?php echo thaw($vars['postcode4']) ?>" />
      <input type="hidden" name="pref3" value="<?php echo thaw($vars['pref3']) ?>" />
      <input type="hidden" name="address3" value="<?php echo thaw($vars['address3']) ?>" />
      <?php if(isset($vars['quote_type'])): ?>
        <?php foreach ($vars['quote_type'] as $key => $val): ?>
          <input type="hidden" name="quote_type[]" value="<?php echo thaw($val); ?>" />
        <?php endforeach; ?>
      <?php endif; ?>
      <input type="hidden" name="content" value="<?php echo thaw($vars['content']) ?>" />


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


</div><!-- .contwrap -->
<?php view("component/footer") ?>