// JavaScript Document

$(function(){
	initCookieAlert();
})

function initCookieAlert(){
	$('#system-alert').hide();
		
	var data = $.cookie('tmsc-cookie');
	
	$('#system-alert').on('click', '.btn-primary', function() {
		
		$.cookie('tmsc-cookie','on',{expires:12,path:'/'});
		
		$('#system-alert').hide();
	});
	
	if(data != 'on') {
		$('#system-alert').show();
	}
}