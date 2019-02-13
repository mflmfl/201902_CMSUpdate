<!--
//OSの振り分けの後、ブラウザの振り分け。
//スタイルシート表示用
var ua = navigator.userAgent ;
var browser = navigator.appName ;
var cssHTML = '<link rel="stylesheet" type="text/css" href="'
	if(ua.indexOf('Mac')!=-1){
	cssHTML += '/shared/css/mac.css';
	}
		else if(ua.indexOf('Win')!=-1){
			if(browser.charAt(0)=="N"){
			cssHTML += '/shared/css/winNN.css' ;
			}
				else if(browser.charAt(0)=="M"){
				cssHTML += '/shared/css/winIE.css' ;
				}
		}
cssHTML += '">'
document.write(cssHTML)
//-->

