function DLsj(){$.get("SYS_sj.php",function(d){if(d=='true'){setTimeout('DLsj()',30000)}})}
$.extend({includePath:'',include:function(file){var files=typeof file=="string"?[file]:file;for(var i=0;i<files.length;i++){var name=files[i].replace(/^s|s$/g,"");var att=name.split('.');var ext=att[att.length-1].toLowerCase();var isCSS=ext=="css";var tag=isCSS?"link":"script";var attr=isCSS?" type='text/css' rel='stylesheet' ":" language='javascript' type='text/javascript' ";var link=(isCSS?"href":"src")+"='"+$.includePath+name+"'";if($(tag+"["+link+"]").length==0)document.write("<"+tag+attr+link+"></"+tag+">")}}});
function jzwc(){TS('数据加载完成！',1,'success28');}
function djs(dd,url){id=$("#Left .a ul li a[dd='"+dd+"']");fz=$("#Right");dj(id,url,fz);}


function djr(dd,url){id=$(dd);dj(id,url,"#Right");}
function djrt(dd,url){id=$("#RT .twz span[dd='"+dd+"']");dj(id,url,"#Right");}
function djrtb(dd,url){id=$(".rt .czan a[dd='"+dd+"']");dj(id,url,"#Right");}
function page(a,b){$(a).click(function(){var u=$(this).attr("u");gds(u,b)})}
function dj(id,url,fz){$(id).click(function(){gds(url,fz)})}
function gds(url,fz){gdo('数据加载中...','loading',url,"#Right")}
function gdor(ts,im,url){gdo(ts,im,url,"#Right")}
function gdo(ts,im,url,fz){TSs(ts,im);gd(url,fz)}
function gd(url,id){$.get(url,function(z){FZ(id,z)}) }
function FZ(a,b){$(a).html(b)}
function TSs(a,b){TS(a,600,b)} 
function TS(a,b,c){$.dialog.tips(a,b,c+'.gif')}
function FCZ(url){gd(url,"#Right")}
//下拉跳转
function XTZ(id,fid){$(id).change(function(){var url=$(this).children('option:selected').val();gdo('数据加载中...','loading',url,fid)})}


function rlbbt_k(w){var sy_width=$(window).width();if(sy_width>1000){$('#Right .lb .bt,#Right .lb').css('width',(sy_width-227)+'px');$('#Right .lb .tt .dl').css('width',(sy_width-380)+'px');$("#Right .lb span.mc").css('width',((sy_width-227)+(w-789))+"px")}else{$('#Right .lb .tt .dl').css('width','620px');$('#Right .lb .bt,#Right .lb').css('width','773px');$("#Right .lb span.mc").css('width',w+"px")}};


function syz(){var iis_width=$(window).width();var iis_height=$(window).height();if(iis_width>1000){$("body").css("overflow-x","hidden");$("#web,#Top").css("width",iis_width+"px");$("#RT,#RTb,#Right,#Bottom").css("width",(iis_width-211)+"px")}else{$("body").css("overflow-x","auto");$("#web").css("width","1000px");$("#RT,#RTb,#Right,#Bottom").css("width","789px")};if(iis_height>520){$("body").css("overflow-y","hidden");$("#web").css("height",iis_height+"px");$("#Left,#Left .Leftl").css("height",(iis_height-60)+"px");$("#Right").css("height",(iis_height-160)+"px")}else{$("body").css("overflow-y","auto");$("#web").css("height","510px");$("#Left,#Left .Leftl").css("height","470px");$("#Right").css("height","360px")}};

function iis_cl(id,css){$(id+":first").addClass(css);$(id).click(function(){$(id).removeClass(css);$(this).addClass(css)});}
function ge(url,id){$.get(url,function(data){$(id).html(data)})}
function asj(z){return z/*encodeURI()*/}
function asz(id,z){return asj($(id).find('input[name="'+z+'"]').val())}
function ast(id,z){return asj($(id).find('textarea[name="'+z+'"]').val())}
function ass(id,z){return asj($(id).find('select[name="'+z+'"]').val())}
function asfs(id,z){return $(id).find('input[name="'+z+'"]:checked').val()};
function asf(id,z){var chk_value ="";$(id).find('input[name="'+z+'"]:checked').each(function(){var ur=$(this).val();chk_value+=IIF(ur!='',","+ur,'')});return asj(chk_value)};
function aszf(id,z){var chk_value ="";$(id).find('input[name="'+z+'"]').each(function(){var ur=$(this).val();chk_value+=IIF(ur!='',","+ur,'')});return asj(chk_value)};
function astf(id,z){return asj($(id).find('select[name="'+z+'"]').val())}
function asd(id,z){return asj($(id).find('input:radio[name="'+z+'"]:checked').val())};
function ct(u,i){var api=$.dialog({id:i,lock:true});$.ajax({url:u+Math.random(),success:function(data){api.content(data);},cache:false});}
function at(u,i,s,t){var z=s.split(":");var le=$(t).offset().left-30;var to=$(t).offset().top-30;var api=$.dialog({id:i,max:false,width:atz(z[0]),height:atz(z[1]),left:le,top:to});$.ajax({url:u+"&"+Math.random(),success:function(data){api.content(data);},cache:false});return api}
function atz(z){if(z){return z+'px'}else{return 'auto'}}
function atc(z){$.dialog.list[z].close();}
//表单验证
function fromtf(obj){$(obj).blur(function(){$(this).css({'border-color':'#DADEE5','background':'#fff'});validate($(this))});$(obj).click(function(){$(this).css({'border-color':'#F60','background':'#FFF8F4'});$(this).parent().siblings('#for').removeClass();$(this).parent().siblings('#for').addClass('frb')})}
function validate(obj){var reg=new RegExp(obj.attr("reg"));var objValue=obj.val();var tipObj=obj.parent().siblings('#for');tipObj.removeClass();if(!reg.test(objValue)){tipObj.addClass("fra");return false}else{tipObj.addClass("frc");return true}}

function editor(idd){return KindEditor.create($(idd),{themeType:'simple',resizeType:0,allowFileManager:true});}

//alert(cfzsc("<a value='asa'>{i}</a>",content).join('\n'));
//从字符串中拆分出图片路径来
function cfzsc(ing,url){var urls=[];url.replace(/\<img.*?src\=\"(.*?)\"[^>]*>/ig,function(a,b){urls.push(ing.replace("{i}",b));});return urls;}
//

function lbwh(){if($('#Right ul.lb').length>0){var a=$('#Right ul.lb');var b=$('#Right');var arr=$(a).attr("dl");var arc=$(a).attr("c");var sw=($(b).width()-15);var spl=arr.split(",");var sp=arc.split(",");var z=0;var s=0;var fz=0;$(a).css("width",sw+"px");for(i=0;i<spl.length;i++){if(!isNaN(spl[i])){z=z+(spl[i]/1)}else{s++}};s=(sw-(z+(spl.length*11)))/s;for(k=1;k<$(a).find("li").length;k++){$(a).find("li").eq(k).css({"width":sw+"px"});for(i=0;i<spl.length;i++){fz=0;if(!isNaN(spl[i])){fz=spl[i]}else{fz=s};$(a).find("li").eq(k).find("span").eq(i).css({"width":fz+"px","text-align":sp[i]})}}}}

function bdwh(){if($('#Right .form').length>0){var a=$('#Right .form').children();var sw=$('#Right').width()-15;for(k=0;k<$(a).length;k++){var li=$(a).eq(k);var arr=$(li).attr("dl");if(!arr){return false};var arc=$(li).attr("c");var arh=$(li).attr("h");var spl=arr.split(",");var sp=arc.split(",");var z=0;var s=0;var fz=0;$(li,a).css("width",sw+"px");for(i=0;i<spl.length;i++){if(!isNaN(spl[i])){z=z+(spl[i]/1)}else{s++}};s=(sw-(z+(spl.length*11)))/s;for(i=0;i<spl.length;i++){id=$(li).children().eq(i);fz=0;if(!isNaN(spl[i])){fz=spl[i]}else{fz=s};if(arh!=''){$(li).css("height",arh);id.css("height",arh)};id.css({"width":fz+"px","text-align":sp[i]})}}}}






function lbhover(A,B,C){
	lbhover_fs(A,B);var a=$(B+" .lb li:gt(1)");lbho(B,"h");
  $(a).click(function(){var css=$(this).attr("class")+"";if(css.indexOf("c")>=0){$(this).removeClass("c");}else{$(this).addClass("c");}lbhover_fs(A,B);})
  $(A+" a[dd='g_fx']").click(function(){$(B+" .lb li.c").addClass("fx");a.addClass("c");$(B+" .lb li.fx").removeClass("c fx");lbhover_fs(A,B);})
  $(A+" a[dd='g_qx']").click(function(){a.addClass("c");lbhover_fs(A,B);})
  $(".rt .czan a[dd='a_xg']").click(function(){if($(B+" .lb li.c").length==1){if(!$(this).hasClass("ka")){gd(C+'?/1_'+$(B+" .lb").attr("d")+'_'+$(B+" .lb li.c").attr("z")+'.html',"#Right")}}})
  $(".rt .czan a[dd='a_sc']").click(function(){if(!$(this).hasClass("ka")){$.dialog.confirm('你确定要删除这个消息吗？',function(){var lj=$(B+" .lb").attr("u");var z=lbhuz(B+" .lb li.c","z");$.post(lj+'?/3.html',{id:z},function(z){$(B).html(z);}); },function(){});}})
  page(".rt .page a","");
  
  
}

function lbho(B,C){
	var a=$(B+" .lb li:gt(1)");
	var u=$(B+" .lb").attr("u");
	
	$(a).hover(function(){var id=$(a).index();if(id>2){$(this).addClass(C)}},function(){$(a).removeClass(C)})
	$(a).find("b.s").click(function(){var id=$(this).parent().parent();
	    if(!$(id).hasClass("x")){
	     $(id).addClass("x").next("ul:eq(0)").show()
		}else{
	     $(id).removeClass("x").next("ul:eq(0)").hide()
			
			}
    })
  $(a).find("a[dd='xg']").click(function(){var u=$(a).parent().attr("u")+'?/1_'+$(a).parent().attr("d")+'_'+$(this).attr("z")+'.html';gds(u,B);lbhover_fs(a,B);})
  $(a).find("a[dd='sc']").click(function(){var u=$(a).parent().attr("u")+'?/3_'+$(this).attr("z")+'.html';$.dialog.confirm('你确定要删除这个消息吗？',function(){gds(u,B);lbhover_fs(a,B);},function(){});
  })
 djrtb('a_tj',u+'?/1.html');
}


function lbhover_fs(A,B){var Z=$(B+" .lb li.c").length;
if(Z>0){$(A).find("a[dd='a_sc']").removeClass("ka")}else{$(A).find("a[dd='a_sc']").addClass("ka");}
if(Z==1){$(A).find("a[dd='a_xg']").removeClass("ka")}else{$(A).find("a[dd='a_xg']").addClass("ka");}
}
function lbhuz(a,b){var i=$(a).length-1;var k="";for(ii=0;ii<=i;ii++){k+=$(a).eq(ii).attr(b)+",";};return k;}


//产生定值随机数
function randomString(length){var chars='0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz'.split('');if(!length){length=Math.floor(Math.random()*chars.length)};var str='';for(var i=0;i<length;i++){str+=chars[Math.floor(Math.random()*chars.length)]};return str}

function ct(u,i){var api=$.dialog({id:i,lock:true});$.ajax({url:u+Math.random(),success:function(data){api.content(data);},cache:false});}
function ctt(u,i){$.ajax({url:u+Math.random(),success:function(data){i.content(data);},cache:false});}


function ZX(){syz();setTimeout('lbwh();bdwh();',10)}

function IIF(a,b,c){if(a){return b}else{return c}}
function BDYZ(zz,y){switch(y){
  case "*":var reg=/[\w\W]+/;break;
  case "*6-16":var reg=/^[\w\W]{6,16}$/;break;
  case "ip":var reg=/(d+).(d+).(d+).(d+)/;break;
  case "n":var reg=/^\d+$/;break;
  case "n6-16":var reg=/^\d{6,16}$/;break;
  case "s":var reg=/^[\u4E00-\u9FA5\uf900-\ufa2d\w\.\s]+$/;break;
  case "s6-18":var reg=/^[\u4E00-\u9FA5\uf900-\ufa2d\w\.\s]{6,18}$/;break;
  case "p":var reg=/^[0-9]{6}$/;break;
  case "m":var reg=/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/;break;
  case "e":var reg=/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;break;
  case "url":var reg=/^(\w+:\/\/)?\w+(\.\w+)+.*$/;break;
}return !!reg.test(zz);}
function BDYZ_s(id,z,d){var id=$('#Right .form li [name="'+id+'"]');var tf=BDYZ(id.val(),z);id.next().html(IIF(tf,id.next().attr('dz'),d));id.next().removeClass('y n').addClass(IIF(tf,'y','n'));return tf;}
function BDYZ_b(id,z,d){var id=$('#Right .form li [name="'+id+'"]');var tf=!z.isEmpty();id.next().html(IIF(tf,id.next().attr('dz'),d));id.next().removeClass('y n').addClass(IIF(tf,'y','n'));return tf;}


$(document).ready(function(){
syz();$(window).resize(ZX);
$("#Left .a .b").click(function(){$("#Left .a").removeClass("z");$("#Left .a ul").css("display","none");$(this).parent().addClass("z");$(this).siblings("ul").css("display","block")});
$('#Left .a .b').eq(0).trigger("click");
$('#Left .a ul li a').click(function(){$('#Left li ul li a').removeClass("d");$(this).addClass("d");});	



//$("#Left li.gg").click(function(){$.dialog.tips('数据加载中...',600,'loading.gif');get("cs.asp?/12.html","#Right")})
//$("#Left li.ld").click(function(){$.dialog.tips('数据加载中...',600,'loading.gif');get("cs.asp?/1.html","#Right")})
//$("#Left li.hy").click(function(){$.dialog.tips('数据加载中...',600,'loading.gif');get("cs.asp?/2.html","#Right")})
//$("#Left li.dw").click(function(){$.dialog.tips('数据加载中...',600,'loading.gif');get("cs.asp?/3.html","#Right")})
//$('ul.news li span.cz b.hyb').click(function(){var id=$(this).attr('i');get('cs.asp?/5_'+i+'.html','#Right')})

function lbmcw(){rlbbt_k(80)};lbmcw();$(window).resize(lbmcw);
ge('FY_qs.php','#Right');
//头部
$("#Top .dh li.f").click(function(){$.post("FY_CL.php?/2.html",{},function(a){alert("已成功安全退出！");$("body").html(a)})})




djs('a_dy','FY_A_DY.php');
djs('a_sy','FY_A_SY.php');
djs('a_bd','FY_A_BD.php');
djs('a_ly','FY_A_LY.php');

djs('a_pwd','FY_A_PWD.php');

djs('a_wdt','FY_A_WD.php?/1.html');
djs('a_wd','FY_A_WD.php');
djs('a_wdl','FY_A_WDL.php');

djs('a_cpt','FY_A_CP.php?/1.html');
djs('a_cp','FY_A_CP.php');
djs('a_cpl','FY_A_CPL.php');

djs('a_cps','FY_A_CPS.php');

djs('a_sjdindant','FY_A_SJDINDAN.php?/1.html');
djs('a_sjdindan','FY_A_SJDINDAN.php');
djs('a_sjdindanl','FY_A_SJDINDANL.php');

djs('a_advt','FY_A_ADV.php?/1.html');
djs('a_adv','FY_A_ADV.php');
djs('a_advl','FY_A_ADVL.php');

djs('a_hzhbt','FY_A_HZHB.php?/1.html');
djs('a_hzhb','FY_A_HZHB.php');
djs('a_hzhbl','FY_A_HZHBL.php');

djs('a_khjzt','FY_A_KHJZ.php?/1.html');
djs('a_khjz','FY_A_KHJZ.php');
djs('a_khjzl','FY_A_KHJZL.php');

djs('a_yslxt','FY_A_YSLX.php?/1.html');
djs('a_yslx','FY_A_YSLX.php');
djs('a_yslxl','FY_A_YSLXL.php');

djs('a_lj','FY_A_LJ.php');

djs('a_m','FY_A_TO.php');
djs('a_my','FY_A_R.php');
DLsj();






})

