<?php

define("VIEW_DIR", __DIR__."/./../views/");

function SendMail($data) {
  $vars = $data['vars'];
  $pref_list = $data['pref_list'];
  $department_list = $data['department_list'];
  $quote_type_list = $data['quote_type_list'];

  //郵便番号
  $vars['postcode1_c'] = ($vars['postcode1'] || $vars['postcode2']) ? implode("-",array(
    $vars['postcode1'],$vars['postcode2']
  )) : "";
  $vars['postcode3_c'] = ($vars['postcode3'] || $vars['postcode4']) ? implode("-",array(
      $vars['postcode3'],$vars['postcode4']
  )) : "";
  //電話番号
  $vars['phone1_c'] = ($vars['phone1'] || $vars['phone2'] || $vars['phone3']) ? implode("-",array(
      $vars['phone1'],$vars['phone2'],$vars['phone3']
  )) : "";
  //fax整形
  $vars['fax1_c'] = ($vars['fax1'] || $vars['fax2'] || $vars['fax3']) ? implode("-",array(
      $vars['fax1'],$vars['fax2'],$vars['fax3']
  )) : "";
  $headers = "FROM: ".MAIL_FROM."\r\n";
  $sys_subject = "DB：【Webお問い合わせシステム】新規開業に関するお問合せを受け付けました。";

  $sys_mailBody = <<<SYSMAIL
[SHIMEI]{$vars['name']}
[BUNRUI]0002
[KAIGYOU]{$vars['year']}/{$vars['month']}
[KAIGYOU_KEN]{$vars['pref1']}
[KAIGYOU_BASYO]{$vars['address1']}

SYSMAIL;
  if(isset($vars['department'])):
    foreach($vars['department'] as $val):
    $sys_mailBody .= <<<SYSMAIL
[SHINRYOUKA]{$val}

SYSMAIL;
    endforeach;
  endif;
  $sys_mailBody .= <<<SYSMAIL
[SHINRYOUKA_SONOTA]{$vars['department_etc']}
[RENRAKU_YUUBIN]{$vars['postcode1_c']}
[RENRAKU_KEN]{$vars['pref2']}
[RENRAKU_JITISYOU]{$vars['address2']}
[TEL]{$vars['phone1_c']}
[NAISEN]{$vars['phone4']}
[FAX]{$vars['fax1_c']}
[EMAIL]{$vars['mail']}
[SHISETSU]{$vars['company']}
[YUUBIN]{$vars['postcode3_c']}
[KEN]{$vars['pref3']}
[JITISYOU]{$vars['address3']}

SYSMAIL;
  if(isset($vars['quote_type'])):
    foreach($vars['quote_type'] as $val):
      $sys_mailBody .=  <<<SYSMAIL
[SHIRYOU]{$val}

SYSMAIL;
    endforeach;
  endif;
  $sys_mailBody .= <<<SYSMAIL
[NAIYOU]{$vars['content']}
SYSMAIL;
  mb_send_mail(SYSTEM_TO, $sys_subject, $sys_mailBody, $headers, '-f' . MAIL_ERROR_TO);


  $admin_headers = "FROM: ".MAIL_FROM."\r\n";

  $admin_subject = "[Webお問い合わせシステム] 新規開業に関するお問合せを受け付けました。";
  $admin_mailBody = <<<ADMMAIL
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
 ★★★お問い合わせ受付のお知らせ★★★
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

(CMSC)国内向け社外ホームページから新規開業に関するお問い合わせを受け付けました。

------------------------------------------------------------------------
施設名/会社名:{$vars['company']}
開業予定日：{$vars['year']}/{$vars['month']}
開業予定場所[都道府県]：{$pref_list[$vars['pref1']]}
開業予定場所[市区町村]：{$vars['address1']}
------------------------------------------------------------------------

個人情報保護のため、本メールにはお問い合わせ内容の詳細は表示していません。
内容は「Webお問合せ管理システム」にログインしてご確認ください。

http://web1.tmsc.toshiba.co.jp:8085/WebInquiry/LoginWindow.do

ご対応よろしくお願いいたします。

====================================================================
(CMSC)国内向け社外ホームページ(運営/管理:グローバルマーケティング部)
※本メールの宛先変更依頼などは、担当までご連絡ください。
====================================================================
ADMMAIL;

  mb_send_mail(ADMIN_MAILTO_GP, $admin_subject, $admin_mailBody, $admin_headers, '-f' . MAIL_ERROR_TO);

}

/**
 * total validation
 *
 * @param $vars
 *
 * @return mixed
 */
function validation($vars) {
  // PC画面では2個いっぺんに
  return array_merge(validation1($vars), validation2($vars));
}

/**
 * validation
 *
 * @param $vars
 *
 * @return mixed
 */
function validation1($vars) {
  $errors = array();

  if(!$vars['name']) {
    $errors['name'] = "氏名をご記入ください。";
  } elseif( mb_strlen($vars['name'],'utf-8') > 50) {
    $errors['name'] = "氏名は50文字以内でご記入ください。";
  }

  if(!$vars['year']) {
    $errors['kaigyo'] = "開業予定日をご記入ください。";
  } elseif( !isNumeric($vars['year']) ) {
    $errors['kaigyo'] = "開業予定日は半角数字でご記入ください。";
  } elseif( mb_strlen($vars['year'], 'utf8') > 4 ) {
    $errors['kaigyo'] = "開業予定日は4桁の数字でご記入ください。";
  }
  if(!$vars['month']) {
    $errors['kaigyo'] = "開業予定日をご記入ください。";
  }

  if(!$vars['pref1']) {
    $errors['pref1'] = "都道府県を選択してください。";
  }

  if(!$vars['address1']) {
    $errors['address1'] = "市区町村をご記入ください。";
  } elseif( mb_strlen($vars['address1'],'utf-8') > 100) {
    $errors['address1'] = "市区町村は100文字以内でご記入ください。";
  }

  if( $vars['department_etc'] && mb_strlen($vars['department_etc'],'utf8') > 50) {
    $errors['department'] = "診療科は50文字以内でご記入ください。";
  }

  if( ($vars['postcode1'] || $vars['postcode2']) && !isZip($vars['postcode1'], $vars['postcode2'])) {
    $errors['postcode'] = "郵便番号を正しくご記入ください。";
  }

  if( mb_strlen($vars['address2'],'utf-8') > 100) {
    $errors['address2'] = "市区町村は100文字以内でご記入ください。";
  }

  if(($vars['phone1'] || $vars['phone2'] || $vars['phone3']) && !isPhoneNumber($vars['phone1'].$vars['phone2'].$vars['phone3'])) {
    $errors['phone'] = "電話番号を正しくご記入ください。";
  }

  if($vars['phone4'] && mb_strlen($vars['phone4'],'utf-8') > 6) {
    $errors['phone'] = "内線番号は6桁以内でご記入ください。";
  }

  if(($vars['fax1'] || $vars['fax2'] || $vars['fax3']) && !isPhoneNumber($vars['fax1'].$vars['fax2'].$vars['fax3'])) {
    $errors['fax'] = "FAXを正しくご記入ください。";
  }

  if( ($vars['postcode3'] || $vars['postcode4']) && !isZip($vars['postcode3'], $vars['postcode4'])) {
    $errors['postcode2'] = "郵便番号を正しくご記入ください。";
  }

  if( mb_strlen($vars['address3'],'utf-8') > 100) {
    $errors['address3'] = "市区町村は100文字以内でご記入ください。";
  }


  return $errors;
}

function validation2($vars) {
  $errors = array();

  if(!$vars['mail']) {
    $errors['mail'] = "E-mailをご記入ください。";
  } elseif(!isMailAddress($vars['mail'])) {
    $errors['mail'] = "E-mailを正しくご記入ください。";
  } elseif( mb_strlen($vars['mail'],'utf-8') > 200) {
    $errors['mail'] = "E-mailは200文字以内でご記入ください。";
  }

  if(!$vars['mail_confirm']) {
    $errors['mail_confirm'] = "E-mailをご記入ください。";
  } elseif(!isMailAddress($vars['mail_confirm'])) {
    $errors['mail_confirm'] = "E-mailを正しくご記入ください。";
  } elseif( mb_strlen($vars['mail_confirm'],'utf-8') > 200) {
    $errors['mail_confirm'] = "E-mailは200文字以内でご記入ください。";
  }

  if( ($vars['mail'] && $vars['mail_confirm']) && $vars['mail'] != $vars['mail_confirm'] ) {
    $errors['mail_confirm'] = "E-mailが一致しません。";
  }

  if(mb_strlen($vars['company'],'utf-8') > 100) {
    $errors['company'] = "お勤め先名は100文字以内でご記入ください。";
  }

  if(!$vars['postcode3'] || !$vars['postcode4']) {
    $errors['postcode2'] = "郵便番号をご記入ください。";
  } elseif(!isZip($vars['postcode3'], $vars['postcode4'])) {
    $errors['postcode2'] = "郵便番号を正しくご記入ください。";
  }

  if(!$vars['pref3']) {
    $errors['pref3'] = "都道府県を選択してください。";
  }

  if(!$vars['address3']) {
    $errors['address3'] = "市区町村/番地をご記入ください。";
  } elseif( mb_strlen($vars['address'],'utf-8') > 100) {
    $errors['address3'] = "市区町村/番地は100文字以内でご記入ください。";
  }

  if(mb_strlen($vars['content'],'utf-8') > 2000) {
    $errors['content'] = "お問い合わせ内容は2000文字以内でご記入ください。";
  }

  return $errors;
}

/**
 * router
 *
 * @param $config
 * @param $data
 *
 * @return void
 */
function router(array $config, array $data) {
  $page = $data['vars']['mode'];
  // 初期画面
  $first = isset($config['pages'][0]) ? $config['pages'][0] : 'agree';

  if(empty($data['vars'])) {
    view($first, $data);
  } else {
    if(isset($page) && in_array($page, $config['pages'])) {
      // 遷移しようとした時、configのvalidatorにmode値があったら指定したvalidationを実行してerrorに返す
      if(array_key_exists($page, $config['validator'])) {
        $data['errors'] = call_user_func($config['validator'][$page], $data['vars']);
      }
      if(!empty($data['errors'])) {
        // エラーが存在していたら1ページ前に戻してvarsとerrorを出力
        $next_index = intval(array_search($page, $config['pages']) - 1);
        $idx = $next_index < 0 ? 0 : $next_index;
        if($config['pages'][$idx]) {
          $page = $config['pages'][$idx];
        } else {
          // なんらかの理由でpagesから値がとれなかったらfirstを設定する
          $page = $first;
        }
      }
      view($page, $data);
      // 最終ページへの遷移ならメール送信
      if($page == array_last($config['pages'])) {
        SendMail($data);
      }
    }
  }
}

/**
 * @param array $array
 *
 * @return mixed
 */
function array_last(array $array) {
  return end($array);
}


/**
 * スマートフォン判別
 * UA に iPhone, iPod, Androidを含む＝スマートフォンとする
 *
 * @return bool
 */
function is_sp() {
  $ua = $_SERVER['HTTP_USER_AGENT'];
  // sp
  if ( ( strpos( $ua, 'iPhone'  ) !== false ) || ( strpos( $ua, 'iPod'    ) !== false ) || ( strpos( $ua, 'Android' ) !== false ) ) {
    return true;
  }

  // not sp
  return false;
}

/**
 * htmlspecialcharsのalias
 *
 * @param mixed $str
 *
 * @return string
 */
function h( $str ) {
  return htmlspecialchars($str);
}


/**
 * 変数解凍用。
 * 配列・オブジェクトのプロパティの中身をissetして返す。
 *
 * @param null $var
 * @param null $key
 *
 * @return array|bool|null
 */
function thaw( $var = NULL, $key = NULL ) {
  // Array check
  if( is_array( $var ) )
  {
    if( is_int( $key ) || is_string( $key ) )
    {
      if( !isset( $var ) || $key === NULL || !array_key_exists( $key, $var ) )
      {
        return false;
      }
      return $var[$key];
    }
    elseif( is_array( $key ) )
    {
      $ret = $var;
      foreach( $key as $key_order => $index )
      {
        $ret = thaw( $ret, $index );

        if( $ret === false ) return $ret;
      }

      return $ret;
    }
  }
  // Object Check
  else if( is_object( $var ) )
  {
    if( is_int( $key ) || is_string( $key ) )
    {
      if( !property_exists( $var, $key ) )
      {
        return false;
      }

      return $var->$key;
    }
    else if( is_array( $key ) )
    {
      $ret = $var;
      foreach( $key as $key_order => $index )
      {
        $ret = thaw( $ret, $index );

        if( $ret === false ) return $ret;
      }

      return $ret;
    }
  }
  else
  {
    if($key !== NULL){
      return false;
    }
    return $var;
  }
}

/**
 * View 呼び出し
 *
 * @param string $file
 * @param array  $data
 * @param bool   $return
 */
function view($file, $data = array(), $return = false) {
  $tmplPath = VIEW_DIR;
  $ext = ".php";

  if(is_sp()) {
    $tmplPath = $tmplPath."sp/";
  } else {
    $tmplPath = $tmplPath."pc/";
  }

  if(!empty($data)){
    $_fw_data = $data;
    extract($_fw_data);
  }

  if($return === true){
    //テキスト取得
    ob_start();
    echo eval('?>'.preg_replace("/;*\s*\?>/", "; ?>", str_replace('<?=', '<?php echo ', file_get_contents($tmplPath.$file.$ext))));
    $text = ob_get_contents();
    @ob_end_clean();
    return $text;

  } else {

    require $tmplPath.$file.$ext;

  }
}

/**
 * @param $data
 *
 * @return array
 */
function encodeFormValues( $data ) {
  if( is_array( $data )) {
    foreach( $data as $key => $val ) {
      if( is_array( $val )) {
        $data[$key] = encodeFormValues( $val );
      } else {
        $data[$key] = encodeFormVar( $val );
      }
    }
  }
  return $data;
}

/**
 * @param $str
 *
 * @return string
 */
function encodeFormVar( $str ) {
  if( $str != "" && !is_array(  $str )) {
    if( get_magic_quotes_gpc()) {
      $str = stripslashes( $str );
    }
    //カナ変換
    $str = mb_convert_kana( $str, "KVa", 'utf8');
  }
  return $str;
}


/**
 * @param $zip1
 * @param $zip2
 *
 * @return bool
 */
function isZip( $zip1, $zip2 ) {
  if( preg_match("/^\d{3}$/", $zip1) && preg_match("/^\d{4}$/",$zip2) ) {
    return true;
  } else {
    return false;
  }
}


/**
 * @param $str
 *
 * @return bool
 */
function isMailAddress( $str ) {
  $c_reg =	'(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\' .
      '\[\]\000-\037\x80-\xff])|"[^\\\\\x80-\xff\n\015"]*(?:\\\\[^\x80-\xff][' .
      '^\\\\\x80-\xff\n\015"]*)*")(?:\.(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x' .
      '80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|"[^\\\\\x80-' .
      '\xff\n\015"]*(?:\\\\[^\x80-\xff][^\\\\\x80-\xff\n\015"]*)*"))*@(?:[^(' .
      '\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\0' .
      '00-\037\x80-\xff])|\[(?:[^\\\\\x80-\xff\n\015\[\]]|\\\\[^\x80-\xff])*' .
      '\])(?:\.(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,' .
      ';:".\\\\\[\]\000-\037\x80-\xff])|\[(?:[^\\\\\x80-\xff\n\015\[\]]|\\\\[' .
      '^\x80-\xff])*\]))*';
  // メールアドレス
  if ( $str == "" || ! preg_match ( "/^$c_reg$/", $str ) ) {
    return false;
  } else {
    return true;
  }
}

/**
 * @param $str
 *
 * @return bool|int
 */
function isPhoneNumber( $str ) {
  if( $str == '' ) {
    return false;
  }
  if( preg_match( '/^0(5|[7-9])0/', $str )) {	// 携帯番号(PHS含む)
    $str = preg_replace( '/-/', '', $str );	//ハイフン削除
    if( ! preg_match( '/^\d{10,11}$/', $str ))
      return false;
  } elseif( preg_match( '/-/', $str )) {
    # ハイフン区切り
    $nums = explode( '-', $str );

    // 半角文字チェック
    if( ! isNumeric($nums[0]) || ! isNumeric($nums[1]) || ! isNumeric($nums[2]) )
      return false;

    if(
        ! preg_match( '/^0\d{1,5}$/', $nums[0] )			||	// 市外局番0+(1桁〜5桁)
        ! preg_match( '/^\d{0,4}$/', $nums[1] ) 			||	// 市内局番(0桁〜4桁)
        ! preg_match( '/^\d{5,6}$/', $nums[0] . $nums[1] )	||	// 市外局番+市内局番(5桁〜6桁)
        ! preg_match( '/^\d{4}$/', $nums[2] )
    ) {
      return false;
    }
  } else {
    return preg_match( '/^0\d{8,9}$/', $str );
  }
  return true;
}

/**
 * @param $str
 *
 * @return bool
 */
function isNumeric( $str ) {
  return preg_match('/^\d+$/', $str);
}
