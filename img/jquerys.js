var arr = {};
window.onload=function(){


$(".tc").click(function(){
    $(".beijing").css("display","block");
    $(".ui-dialog").css("display","block");
});


$(".yc").click(function(){
    $(".beijing").css("display","none");
    $(".ui-dialog").css("display","none");
});

$("#f_cancel").click(function(){
	$("#f_image_code,#f_mobile,#f_content").val("");
    $(".beijing").css("display","none");
    $(".ui-dialog").css("display","none");
});

$(".item").mouseover(function(){
	$(this).find(".pop_layer").css("display","block");
});

$(".pop_layer").mouseleave(function(){
	$(this).css("display","none");
});


$("#js_more .gd").click(function(){
	$(".letterlayerxd").css("display","block");
})


$("#js_more .sq").click(function(){
	$(".letterlayerxd").css("display","none");
})


$(".letter_listsx a.zm").click(function(){
	$(".letter_listsx a").removeClass("on");
	$(this).addClass("on");
	$(".js_more_listsxmz li").hide();
	$("[szm="+$(this).html()+"]").show();
})


$(".letter_listsx a.quanbu").click(function(){
	$(".letter_listsx a").removeClass("on");
	$(this).addClass("on");
	$(".js_more_listsxmz li").show();
})


// ,"onclick":"fanye();"
// ajax数据交互
$(".queding").click(function(){
	var lx = $(this).parents(".sx").find("li a").attr("zz");
	var zh = $(this).parents(".custom").find(".xde").val();
	zh += '-' + $(this).parents('.custom').find(".dde").val();
	arr[lx] = zh;
	$.post("../cpcl.php",
	{arr:arr},
	function(data){
		$(".chanpin").html(data);
		$(".pages").html($(".chanpin").find(".page").html());
		$(".chanpin .page").remove();
		$(".pages").children().attr({"zz":"fy"});
		var len = $(".pages").children().length;
		for(var i=0;i<len;i++){
			if(!isNaN($(".pages").children().eq(i).html())){
				$(".pages").children().eq(i).attr("name",$(".pages").children().eq(i).html());
			}
			if($(".pages").children().eq(i).attr("name")=="next"){
				var next = parseInt($(".pages .cur").html()) + 1;
				$(".pages").children().eq(i).attr("name",next);
			}
			var k = $(".pages").children().eq(i).html();
			if(k == ''){
				$(".pages").children().eq(i).css("display","none");
			}
		}
	});
});



    $(this).parents("ul,div.left").find("a").removeClass("on");
    $(this).addClass("on");
    // $(this).parent().children(this).css({"background":"#fc5300","color":"#fff"});
    var lx = $(this).attr("zz");//alert(lx);
    var zh = $(this).attr("name");
    if(lx=='px'){
        if($(this).attr("pai")=='desc'){
            $(this).attr("pai","asc");
            $(this).attr("name",$(this).attr("name").replace(/desc/,'asc'));
        }else if($(this).attr("pai")=='asc'){
            $(this).attr("pai","desc");
            $(this).attr("name",$(this).attr("name").replace(/asc/,'desc'));
        }
    }
    if($('#sxz').attr('name')==1){$('#sxz').attr('name','');}else if($('#sxz').attr('name')==0){$('#sxz').attr('name','1');$('#sxz').removeClass('on');}
    if($('#sxf').attr('name')==1){$('#sxf').attr('name','');}else if($('#sxf').attr('name')==0){$('#sxf').attr('name','1');$('#sxf').removeClass('on');}
    // alert(lx);
    arr[lx] = zh;
    $.post("../cpcl.php",
    {arr:arr},
    function(data){
        $(".chanpin").html(data);
        $(".pages").html($(".chanpin").find(".page").html());
        $(".chanpin .page").remove();
        $(".pages").children().attr({"zz":"fy"});
        var len = $(".pages").children().length;
        for(var i=0;i<len;i++){
            if(!isNaN($(".pages").children().eq(i).html())){
                $(".pages").children().eq(i).attr("name",$(".pages").children().eq(i).html());
            }
            if($(".pages").children().eq(i).attr("name")=="next"){
                var next = parseInt($(".pages .cur").html()) + 1;
                $(".pages").children().eq(i).attr("name",next);
            }
            var k = $(".pages").children().eq(i).html();
            if(k == ''){
                $(".pages").children().eq(i).css("display","none");
            }
        }
    });



$(".js_m").click(function(){
	if($(this).attr("zt")=="0"){
		$(this).attr("zt","1");
		$(this).find("a").eq(0).css("display","none");
		$(this).find("a").eq(1).css("display","block");
		$(this).parents(".content").find(".js_more_list").css("display","block");
		$(this).parents(".content").find(".ls_collapse").css("display","none");
		$(this).parents(".brand").removeClass("filter_box");
		$(this).parents(".brand").addClass("more_box");
	}else if($(this).attr("zt")=="1"){
		$(this).attr("zt","0");
		$(this).find("a").eq(1).css("display","none");
		$(this).find("a").eq(0).css("display","block");
		$(this).parents(".content").find(".js_more_list").css("display","none");
		$(this).parents(".content").find(".ls_collapse").css("display","block");
		$(this).parents(".brand").removeClass("more_box");
		$(this).parents(".brand").addClass("filter_box");
	}
});

// var arr = {};
// 	$(".sub_title .left>a").click(function(){
// 		alert($(this).attr("pai"));

// 	});
$(".filter_list .content ul li a,.pop_layer ul li a,#page a,.fenq,.sub_title .left a,.onsale a,.pages a.fy,.sub_title .left>a,.chexisx").live("click",function(){
	$(this).parents("ul,div.left").find("a").removeClass("on");
	$(this).addClass("on");
	$("html, body").animate({ scrollTop: "0px" }, 0);
	// $(this).parent().children(this).css({"background":"#fc5300","color":"#fff"});
	var lx = $(this).attr("zz");
	var zh = $(this).attr("name");
	if(lx=='px'){
		if($(this).attr("pai")=='desc'){
			$(this).attr("pai","asc");
			$(this).attr("name",$(this).attr("name").replace(/desc/,'asc'));
		}else if($(this).attr("pai")=='asc'){
			$(this).attr("pai","desc");
			$(this).attr("name",$(this).attr("name").replace(/asc/,'desc'));
		}
	}
	if($('#sxz').attr('name')==1){$('#sxz').attr('name','');}else if($('#sxz').attr('name')==0){$('#sxz').attr('name','1');$('#sxz').removeClass('on');}
	if($('#sxf').attr('name')==1){$('#sxf').attr('name','');}else if($('#sxf').attr('name')==0){$('#sxf').attr('name','1');$('#sxf').removeClass('on');}
	// alert(lx);
	arr[lx] = zh;
	$.post("../cpcl.php",
	{arr:arr},
	function(data){
		$(".chanpin").html(data);
		$(".pages").html($(".chanpin").find(".page").html());
		$(".chanpin .page").remove();
		$(".pages").children().attr({"zz":"fy"});
		var len = $(".pages").children().length;
		for(var i=0;i<len;i++){
			if(!isNaN($(".pages").children().eq(i).html())){
				$(".pages").children().eq(i).attr("name",$(".pages").children().eq(i).html());
			}
			if($(".pages").children().eq(i).attr("name")=="next"){
				var next = parseInt($(".pages .cur").html()) + 1;
				$(".pages").children().eq(i).attr("name",next);
			}
			var k = $(".pages").children().eq(i).html();
			if(k == ''){
				$(".pages").children().eq(i).css("display","none");
			}
		}
	});



		var str = $(".tiaojian").html();
		$(".tiaojian").find(".tiaoj").append('<span class="tiaoj">'+$(this).attr("zz")+'：'+$(this).attr("name")+'</span>');




});


$(".xuanxk ul li a").click(function(){
	$(".xuanxk ul li a").removeClass("current");
	$(this).addClass("current");
	$(".js-content").css("display","none");
	$(".zx"+$(this).attr("zs")).css("display","block");
});




	$("input.jihua").manhuaDate({					       
		Event : "click",//可选				       
		Left : 0,//弹出时间停靠的左边位置
		Top : -16,//弹出时间停靠的顶部边位置
		fuhao : "-",//日期连接符默认为-
		isTime : false,//是否开启时间值默认为false
		beginY : 1949,//年份的开始默认为1949
		endY :2100//年份的结束默认为2049
	});



var lens = $(".pages2").find('span').children.length;
for(var n=0;n<=lens;n++){
	if(!isNaN($(".pages2 .page span").eq(n).html())){
		$(".pages2 .page span").eq(n).css({"border":"1px solid #4cb8ff","color":"#4cb8ff","background":"none"});
	}
}

$("#schedule_button").click(function(){
	$(".tcbg").css("display","block");
})

$(".cancel").click(function(){
	$(".tcbg").css("display","none");
})

$(".okk").click(function(){
	$(".tc").css("display","none");
})


// 买车/卖车 ajax


// 预约
$(".querentijiaos").click(function(){
	var name=$(this).parents(".tianxie").find(".name").val();
	var addr=$(this).parents(".tianxie").find(".addr").val();
	var qq=$(this).parents(".tianxie").find(".qq").val();
	var tel=$(this).parents(".tianxie").find(".tel").val();
	if(name==""||addr==""||qq==""||tel==""){
		$(".tc").find(".wen").html('请填写完整');
		$(".tc").css("display","block");
		return false;
	}
	if(isNaN(qq)){
		$(".tc").find(".wen").html('请输入正确的QQ号码');
		$(".tc").css("display","block");
		$(".qq").val('');
		return false;
	}
	if(!/(1[3-9]\d{9}$)/.test(tel)){
		$(".tc").find(".wen").html('请输入正确的手机号码');
		$(".tc").css("display","block");
		$(".tel").val('');
		return false;
	}
	$.post('cl.php',{
		name:name,
		addr:addr,
		qq:qq,
		tel:tel,
		dd:'mmsaiche'
	},function(data){
		if(data=='ok'){
		$(".tc").find(".wen").html('预约成功，我们会尽快处理');
		$(".tc").css("display","block");
			$('.tcbg').find(".name").val('');
			$('.tcbg').find(".addr").val('');
			$('.tcbg').find(".qq").val('');
			$('.tcbg').find(".tel").val('');
			$(".tcbg").css("display","none");
		}else if(data=='1'){
		$(".tc").find(".wen").html('您已经预约过！我们会尽快处理');
		$(".tc").css("display","block");
		return false;
		}
	});
})
// 买车
$(".mmaiche").click(function(){
	var name=$(this).parents(".mai").find(".name").val();
	var num=$(this).parents(".mai").find(".num").val();
	var car=$(this).parents(".mai").find(".car").val();
	var jihua=$(this).parents(".mai").find(".jihua").attr("placeholder");
	var xuqiu=$(this).parents(".mai").find(".xuqiu").val();
	if(name==""||num==""||car==""||jihua==""||jihua=="买车时间"||xuqiu==""){
		$(".tc").find(".wen").html('请填写完整');
		$(".tc").css("display","block");
		return false;
	}
	if(!/(1[3-9]\d{9}$)/.test(num)){
		$(".tc").find(".wen").html('请输入正确的手机号码');
		$(".tc").css("display","block");
		$(".num").val('');
		return false;
	}
	$.post('cl.php',{
		name:name,
		num:num,
		car:car,
		jihua:jihua,
		xuqiu:xuqiu,
		dd:'mmaiche'
	},function(data){
		if(data=='ok'){
		$(".tc").find(".wen").html('预约成功，我们会尽快处理');
		$(".tc").css("display","block");
		$(".mai").find(".name").val("");
		$(".mai").find(".num").val("");
		$(".mai").find(".car").val("");
		$(".mai").find(".jihua").attr("placeholder",'买车时间');
		$(".mai").find(".xuqiu").val("");
		}else if(data=='1'){
		$(".tc").find(".wen").html('您已经预约过！我们会尽快处理');
		$(".tc").css("display","block");
		return false;
		}
	});
})
// 卖车
$(".mmmaiche").click(function(){
	var name=$(this).parents(".mai").find(".name").val();
	var num=$(this).parents(".mai").find(".num").val();
	var addr=$(this).parents(".mai").find(".addr").val();
	var car=$(this).parents(".mai").find(".car").val();
	var jihua=$(this).parents(".mai").find(".jihua").attr("placeholder");
	var xuqiu=$(this).parents(".mai").find(".xuqiu").val();
	if(name==""||num==""||car==""||jihua==""||jihua=="卖车时间"||xuqiu==""||addr==""){
		$(".tc").find(".wen").html('请填写完整');
		$(".tc").css("display","block");
		return false;
	}
	if(!/(1[3-9]\d{9}$)/.test(num)){
		$(".tc").find(".wen").html('请输入正确的手机号码');
		$(".tc").css("display","block");
		$(".num").val('');
		return false;
	}
	$.post('cl.php',{
		name:name,
		num:num,
		car:car,
		jihua:jihua,
		xuqiu:xuqiu,
		addr:addr,
		dd:'mmmaiche'
	},function(data){
		if(data=='ok'){
		$(".tc").find(".wen").html('预约成功，我们会尽快处理');
		$(".tc").css("display","block");
		$(".mai").find(".name").val("");
		$(".mai").find(".num").val("");
		$(".mai").find(".addr").val("");
		$(".mai").find(".car").val("");
		$(".mai").find(".jihua").attr("placeholder",'卖车时间');
		$(".mai").find(".xuqiu").val("");
		}else if(data=='1'){
		$(".tc").find(".wen").html('您已经预约过！我们会尽快处理');
		$(".tc").css("display","block");
		return false;
		}
	});
})


}