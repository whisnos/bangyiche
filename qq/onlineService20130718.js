jQuery.cookie=function(key,value,options){if(arguments.length>1&&String(value)!=="[object Object]"){options=jQuery.extend({},options);if(value===null||value===undefined){options.expires=-1}if(typeof options.expires==='number'){var days=options.expires,t=options.expires=new Date();t.setDate(t.getDate()+days)}value=String(value);return(document.cookie=[encodeURIComponent(key),'=',options.raw?value:encodeURIComponent(value),options.expires?'; expires='+options.expires.toUTCString():'',options.path?'; path='+options.path:'',options.domain?'; domain='+options.domain:'',options.secure?'; secure':''].join(''))}options=value||{};var result,decode=options.raw?function(s){return s}:decodeURIComponent;return(result=new RegExp('(?:^|; )'+encodeURIComponent(key)+'=([^;]*)').exec(document.cookie))?decode(result[1]):null};
$(function(){
	
	var _userAgent = window.navigator.userAgent.toLowerCase();
	if(_userAgent.indexOf('android')<0 && _userAgent.indexOf('iphone')<0 &&  _userAgent.indexOf('ipad')<0 )
	{ 
	
	if($.cookie("onlineSP")==null||$.cookie("onlineSP")=="0"||$.cookie("onlineSP")=="")
		{
			$('.onlineService').hide();
			$('.box_os').show();		
		}
		else if($.cookie("onlineSP")=="1")
		{
			$('.onlineService').show();
			$('.box_os').hide();		
		}
	
	}
	else{
		$('.onlineService').hide();
		$('.box_os').hide();
		
	}
	
	$('.onlineService .ico_os').click(function()
	{		
		$('.onlineService').hide();
		$('.box_os').show();
		$.cookie("onlineSP","0",{expires:1,path:"/",domain:"umiwi.com"});		
	});
	$('.os_x').click(function()
	{
		$('.box_os').hide();
		$('.onlineService').show();
		$.cookie("onlineSP","1",{expires:2100000000,path:"/",domain:"umiwi.com"});
	});
	$boxOsFun = function(){var st=$(document).scrollTop();if (!window.XMLHttpRequest) {$('.box_os').css('top',st+44);$('.onlineService').css('top',st+44);}};
	$(window).bind('scroll', $boxOsFun);
	$boxOsFun();
	
	var feedback_url ='http://www.zztuku.com/?account/suggestion.php?action=save';
	
	$('.acbox .ico_pp').hover(function(){
		$(this).stop().animate({height:'52px'},'fast');
		},function(){
		$(this).stop().animate({height:'33px'},'fast');
		}
	);
	$('.acbox .ico_gt').hover(function(){
		$(this).stop().animate({height:'52px'},'fast');
		},function(){
		$(this).stop().animate({height:'33px'},'fast');
		}
	);
	
	$('.onlineService .ico_pp').hover(function(){
		$(this).stop().animate({width:'87px'},'fast');
		},function(){
		$(this).stop().animate({width:'39px'},'fast');
		}
	);
	$('.onlineService .ico_gt').hover(function(){
		$(this).stop().animate({width:'97px'},'fast');
		},function(){
		$(this).stop().animate({width:'39px'},'fast');
		}
	);
	
	$('.ico_gt').click(function(){
		$("html, body").animate({scrollTop:0}, 1);
	})
	
	
	//分辨率
	if ( $(window).width()<1200 || screen.width<1200) 
    { 
    	$('.hydp950,.w_950,.sdmain,.main').css('overflow','hidden');
		$('.top_bg').css({'overflow':'hidden','width':'950px','margin':'0 auto'});
		$('.db_bg2').addClass('db_bg2_s');
		$('.jstd_c .bg_l,.jstd_c .bg_r').css('display','none');
		$('#js_play .prev').css('left','0');
		$('#js_play .next').css('right','0');
		$('#videoplay .prev, #videoplay2 .prev').addClass('prev_s');
		$('#videoplay .next, #videoplay2 .next').addClass('next_s');
    }else{
    	$('.hydp950,.w_950,.sdmain,.main').removeAttr('style');
		$('.top_bg').removeAttr('style');
		$('.db_bg2').removeClass('db_bg2_s');
		$('.jstd_c .bg_l,.jstd_c .bg_r').removeAttr('style');
		$('#js_play .prev').removeAttr('style');
		$('#js_play .next').removeAttr('style');
		$('#videoplay .prev, #videoplay2 .prev').removeClass('prev_s');
		$('#videoplay .next, #videoplay2 .next').removeClass('next_s');
    }

});