window.onload=function(){

 //$(".tb20").slide({mainCell:".bd ul",effect:"fold",autoPlay:true,autoPage:true,trigger:"mouseover",startFun:function(i){var curLi=$(".tb20 .bd li").eq(i);if(!!curLi.attr("_src")){curLi.css("background-image",curLi.attr("_src")).removeAttr("_src")}}});
// $(".tb20").slide({mainCell:".bd ul",effect:"fold",autoPlay:true,trigger:"mouseover",delayTime:1000,startFun:function(i){var curLi=$(".tb20 .bd li").eq(i);if(!!curLi.attr("_src")){curLi.css("background-image",curLi.attr("_src")).removeAttr("_src")}}});

$("#backtop").click(function(){
	$(window).scrollTop(0);
	});

};
