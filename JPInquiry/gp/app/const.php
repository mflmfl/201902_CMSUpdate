<?php

// サーバ種別 ['local', 'stage', 'real']
define('SERVER_TYPE', 'real');

switch (SERVER_TYPE) {
  case 'local':
    ini_set("display_errors",true);
    error_reporting(E_ALL & ~E_NOTICE);
    //社内システム保存用メール送信先アドレス
    define("SYSTEM_TO", "takanori1.hitomi@glb.toshiba.co.jp");
    //新規開業管理者アドレス　カンマ区切りで複数指定可能
    define("ADMIN_MAILTO_GP","takanori1.hitomi@glb.toshiba.co.jp" );
    define("MAIL_FROM", "CMSC-System-Admin@medical.canon");
    define('MAIL_ERROR_TO', 'takanori1.hitomi@glb.toshiba.co.jp');
    break;
  case 'stage':
    //社内システム保存用メール送信先アドレス
    define("SYSTEM_TO", "system-webinquiry-t@hdq.medical.canon");
    //新規開業管理者アドレス　カンマ区切りで複数指定可能
    define("ADMIN_MAILTO_GP","takanori1.hitomi@medical.canon" );
    define("MAIL_FROM", "CMSC-System-Admin@medical.canon");
    define('MAIL_ERROR_TO', 'takanori1.hitomi@medical.canon');
    break;
  case 'real':
    //社内システム保存用メール送信先アドレス
    define("SYSTEM_TO", "system-webinquiry@hdq.medical.canon,takenori.souma@medical.canon,takanori1.hitomi@medical.canon");
    //新規開業管理者アドレス　カンマ区切りで複数指定可能
	define("ADMIN_MAILTO_GP","hiroko.eno@medical.canon,takanori1.hitomi@medical.canon,makoto.kubota@medical.canon,hiroshi.ogoshi@medical.canon,CMSC-webmaster@medical.canon,anna1.fujimoto@medical.canon,satoshi.tomita@medical.canon,hiroyuki.omori@medical.canon,kazufumi.ishiyama@medical.canon,takumi.sugiyama@medical.canon,hiroki3.kikuchi@medical.canon,tomoya3.hasegawa@medical.canon,asuka1.hayashi@medical.canon" );
    define("MAIL_FROM", "CMSC-System-Admin@medical.canon");
    define('MAIL_ERROR_TO', 'yasutaka.kominato@medical.canon,takanori1.hitomi@medical.canon,toshirou.ohtomo@medical.canon');
    break;
  default:
    break;

}
