<!--
//OS�̐U�蕪���̌�A�u���E�U�̐U�蕪���B
//�X�^�C���V�[�g�\���p
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

