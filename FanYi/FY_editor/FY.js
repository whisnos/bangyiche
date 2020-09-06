function upimg(a,b,c,d){var upe=KindEditor.editor({allowFileManager:true,pluginsPath:'FY_editor/plugins/',uploadJson:'FY_editor/php/upload_json.php'});upe.loadPlugin('image', function() {upe.plugin.imageDialog({showRemote : false,imageUrl :$(a).val(),clickFn : function(url, title, width, height, border, align) {$(a).val(url);if(!!b){$(b).prevAll('span').html('<img src="'+url+'" />');$(b).next('a').show();upimi=$(b).parent().parent().find("b").length+1;if(upimi<=d){$(b).parent().parent().append("<b><span></span><input name='"+c+"' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>")}};upe.hideDialog()}})})}

function scimg(a,b,c){var sc_a=$(a).parent().parent().find("img").length;var sc_b=$(a).parent().parent().find("b").length;if((sc_a<(c+1)&&sc_b==sc_a)||sc_b==0){$(a).parent().parent().append("<b><span></span><input name='"+b+"' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>")};$(a).parent().remove();}


function upfile(a){
   var upe=KindEditor.editor({allowFileManager:true,pluginsPath:'FY_editor/plugins/',uploadJson:'FY_editor/php/upload_json.php'});
   upe.loadPlugin('insertfile',function(){upe.plugin.fileDialog({fileUrl:$(a).val(),clickFn:function(url, title){$(a).val(url);upe.hideDialog()}})})
}
// 显示弹窗
function xianshi(){$("#tanchuang1").css("display","block");}
// 隐藏弹窗
function yincang(){$("#tanchuang1").css("display","none");}
// 将选择的字写入
function xuanze(a){$("#paifang").val($(a).find("span").html());$("#tanchuang1").css("display","none");}


// 显示弹窗
function ppxianshi(){$("#tanchuang2").css("display","block");}
// 隐藏弹窗
function ppyincang(){$("#tanchuang2").css("display","none");}
// 将选择的字写入
function ppxuanze(a){$("#pinpai").val($(a).find("span").html());$("#tanchuang2").css("display","none");}


// 显示弹窗
function dqxianshi(){$("#tanchuang3").css("display","block");}
// 隐藏弹窗
function dqyincang(){$("#tanchuang3").css("display","none");}
// 将选择的字写入
function dqxuanze(a){$("#diqu").val($(a).find("span").html());$("#tanchuang3").css("display","none");}


// 显示弹窗
function pfxianshi(){$("#tanchuang4").css("display","block");}
// 隐藏弹窗
function pfyincang(){$("#tanchuang4").css("display","none");}
// 将选择的字写入
function pfxuanze(a){$("#paifangliang").val($(a).find("span").html());$("#tanchuang4").css("display","none");}


// 显示弹窗
function jbxianshi(){$("#tanchuang6").css("display","block");}
// 隐藏弹窗
function jbyincang(){$("#tanchuang6").css("display","none");}
// 将选择的字写入
function jbxuanze(a){$("#jbxianshi").val($(a).find("span").html());$("#tanchuang6").css("display","none");}



// 显示弹窗
function chexixianshi(){$("#tanchuang7").css("display","block");}
// 隐藏弹窗
function bsyincang(){$("#tanchuang7").css("display","none");}
// 将选择的字写入
function bsxuanze(a){$("#chexi").val($(a).find("span").html());$("#tanchuang7").css("display","none");}



function upimg2(a, b, c, d) {
	var upe = KindEditor.editor({
		allowFileManager: true,
		pluginsPath: 'FY_editor/plugins/',
		uploadJson: 'FY_editor/php/upload_json.php'
	});
	upe.loadPlugin('image', function() {
		upe.plugin.imageDialog({
			showRemote: false,
			imageUrl: $(a).val(),
			clickFn: function(url, title, width, height, border, align) {
				$(a).val(url);
				if ( !! b) {
					$(b).prevAll('span').html('<img src="' + url + '" />');
					$(b).next('a').show();
					upimi = $(b).parent().parent().find("b").length + 1;
					if (upimi <= d) {
						// alert(url);
						$(a).attr("src",url);
						// $(b).parent().parent().append("<b><span></span><input name='" + c + "' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>")
					}
				};
				upe.hideDialog()
			}
		})
	})
}

function jiayige(a){
	$(".jiayige").remove();
	$(".neirong").append('<div class="danxiang left"><table><tr><td>大小：</td><td><select class="daxiao"><option value="bigimg">大图模式</option><option value="smimg">小图模式</option></select></td><td rowspan="5"><img src="/img/defaultimg.jpg" alt="上传图片" title="上传图片" class="tuimg" onclick="uping2(this)" height="100"></td><td rowspan="6"><div class="jianyige" onclick="jianyige(this)"></div><div class="jiayige" onclick="jiayige(this)"></div></td></tr><tr><td>位置：</td><td><input type="text" value="" class="input_4 weizhi" placeholder="必填"></td></tr><tr><td>描述：</td><td><input type="text" value="" class="input_4 miaoshu" placeholder="必填"></td></tr><tr><td>车主：</td><td><input type="text" value="" class="input_4 chezhu"></td></tr><tr><td>地址：</td><td><input type="text" value="" class="input_4 dizhi"></td></tr><tr><td>个人寄语：</td><td colspan="2"><textarea type="text" value="" class="input_5 jiyu"></textarea></td></tr></table></div>');
}
function jianyige(a){
	var l=$(".neirong").find(".danxiang").length-1;
	if(l==0){
		alert('最后一个了，不能再减了。');
		return false;
	}
	$(a).parents(".danxiang").remove();
	$(".neirong").find(".danxiang").eq($(".neirong").find(".danxiang").length-1).find(".jiajian").append('<div class="jiayige" onclick="jiayige(this)"></div>');
}

function jiayixiang(){
	var len=$(".waiguanxiang").find("li").length+1;
	$(".waiguanxiang").append('<li><span>'+len+'</span><input value="" placeholder="外挂检测" class="input_3 input" maxlength="10" /></li>');
}