$(function(){

	$('body').prepend('<div class="test"><p id="bCwindow">ウィンドウを閉じる</p><p id="bDisp">確認レイヤー表示</p><p id="bDispnone">確認レイヤー非表示</p><p id="bSav">保存テスト</p><p id="bLod">読込テスト</p><p id="bDel">削除テスト</p><p id="test">test</p></div>');
	$('.test p').css('cursor','pointer');

//スマートフォン対応仮
//setpos();

	$('.JSoff').css('display','none');

	$data = $.cookie('tmsc');
	if($data == 'on') {
		$('#cwrap, #clayer').css('display','none');
		$('#test').text('cookieが保存されていたのでレイヤー非表示');
	} else {
		$('#test').text('cookieが存在しないかnullのためレイヤーを表示');
	}

	$('#lYes').click(function(){
		$data = 'on';
		$.cookie('tmsc',$data,{expires:12,path:'/'});
		$('#test').text('cookieを保存してレイヤーを非表示: '+$data);
		$('#cwrap, #clayer').css('display','none');
		return false;
	});


//
	$('#bCwindow').click(function(){
		$('.test').css('display','none');
	});
// レイヤー表示ボタン
	$('#bDisp').click(function(){
		$('#cwrap, #clayer').css('display','block');
	});
	$('#bDispnone').click(function(){
		$('#cwrap, #clayer').css('display','none');
	});
// 保存
	$('#bSav').click(function() {
		$data = 'on';
		$.cookie('tmsc',$data,{expires:12,path:'/'});
		$('#test').text('cookieを保存しました: '+$data);
	});
// ロード
	$('#bLod').click(function() {
		$data = $.cookie('tmsc');
		if($data == 'on') {
			$('#test').text('保存されているcookieの中身: ' +$data);
		} else {
			$('#test').text('cookieが存在しないかnull');
		}
	});
//削除
	$('#bDel').click(function() {
		$.cookie('tmsc',null,{path:'/'});
		$.removeCookie('tmsc');
		$data = $.cookie('tmsc');
		$('#test').text('cookieを削除しました : '+$data);
	});
//
});





//スマートフォン対応仮
//$(window).bind('resize', setpos);

function setpos() {
	$whsize = $(window).height();
	
	if($whsize < 700) {
		$('#clayer').css('margin-left','0');
	}
}