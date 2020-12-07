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




}