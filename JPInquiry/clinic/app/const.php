<?php

// サーバ種別 ['local', 'stage', 'real']
define('SERVER_TYPE', 'real');

switch (SERVER_TYPE) {
  case 'local':
    ini_set("display_errors",true);
    error_reporting(E_ALL & ~E_NOTICE);
    //社内システム保存用メール送信先アドレス
    define("SYSTEM_TO", "takanori1.hitomi@medical.canon");
    //TOSMEC管理者アドレス　カンマ区切りで複数指定可能
    define("ADMIN_MAILTO_GP","takanori1.hitomi@medical.canon" );
    define("MAIL_FROM", "CMSC-System-Admin@medical.canon");
    define('MAIL_ERROR_TO', 'takanori1.hitomi@medical.canon');
    break;
  case 'stage':
    //社内システム保存用メール送信先アドレス
    define("SYSTEM_TO", "system-webinquiry-t@hdq.medical.canon");
    //TOSMEC管理者アドレス　カンマ区切りで複数指定可能
    define("ADMIN_MAILTO_GP","takanori1.hitomi@medical.canon" );
    define("MAIL_FROM", "CMSC-System-Admin@medical.canon");
    define('MAIL_ERROR_TO', 'takanori1.hitomi@medical.canon');
    break;
  case 'real':
    //社内システム保存用メール送信先アドレス
    define("SYSTEM_TO", "system-webinquiry@hdq.medical.canon,takenori.souma@medical.canon,ryuichi.yada@medical.canon,	takanori1.hitomi@medical.canon");
    //TOSMEC管理者アドレス　カンマ区切りで複数指定可能
	define("ADMIN_MAILTO_GP","hiroko.eno@medical.canon,takanori1.hitomi@medical.canon,makoto.kubota@medical.canon,CMSC-webmaster@medical.canon,kazufumi.ishiyama@medical.canon,naoaki.miyaji@medical.canon,nobuyuki.amano@medical.canon,tomoya3.hasegawa@medical.canon" );
    define("MAIL_FROM", "CMSC-System-Admin@medical.canon");
    define('MAIL_ERROR_TO', 'yasutaka.kominato@medical.canon,takanori1.hitomi@medical.canon,toshirou.ohtomo@medical.canon');
    break;
  default:
    break;

}
