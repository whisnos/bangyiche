$(function(){$("#login .d").click(function(){aa();$("#login .b").val('');})
$("form").die().live("keydown",function(event){if(event.keyCode==13){aa()}});


// function yzm(){$("#login .c img").attr("src",'minuo/YZ.php?n='+Math.random())}

$(function(){$(".verify").click(function(){$(this).attr("src","/FanYi/imgcode.php")})});

function aa() {
	var a = $("#login .a:eq(0)").val();
	var b = $("#login .a:eq(1)").val();
	var c = $("#login .b").val();
	if (a == "" || b == "" || c == "") {
		alert("填写完整！");
		return false;
	};
	$.post("FY_CL.php?/1.html", {
		us: a,
		pw: b,
		yz: c
	}, function(as) {
		if (as <= 2) {
			alert("填写完整！");
			return false;
		};
		if (as == 3) {
			alert("验证码错误！");
			$(".verify").attr("src","/FanYi/imgcode.php");
			$("#login .passwords").val('');
			return false;
		};
		if (as == 4) {
			alert("帐号或密码错误！");
			yzm();
			return false;
		};
		window.location.href="FY.php";
		// $.post("FY_KJ.php", function(data, status) {
		// 	$("body").html(data)
		// })
	})
}
})