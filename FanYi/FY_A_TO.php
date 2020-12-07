<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $wdlx=array("行业新闻","企业新闻");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,1);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,80,50' c='center,center,left,left,center,center'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_wd";
 $DB->fa=10;
 $DB->fp=1;
 $DB->flike=F_HT."FY_A_TO.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>名称</span><span>".DAT('Y-m-d',$R[6])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">专业管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><select name=><option value=-1>所有列表</option>".ZH("<option value=\'{i}\'{t}>{z}</option>"," selected=\'selected\'",-1,$wdlx)."</select><a dd=\'a_lx\'>类型</a></div>".$DB->FY()."');");
//$H->aj("djrtb('a_wdt','FY_A_TOD.php?/1.html');");
//$H->aj("djrtb('a_wdl','FY_A_TODL.php');");
 $H->aj("lbwh();");
 $H->aj("lbhover('#web .czan','#Right','FY_A_TO.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){
 $ss=array("a_wdl","");
 $sx=array("显示","发布","推荐");
 $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp; &nbsp; 题</span><input type='text' name='bm' value='' class='i'><b>标题</b></li>");
 $H->ar("  <li dl='60,70,70,70,a' c='center,left,left'><span>属&nbsp; &nbsp; 性</span>".ZH("<label><input type='checkbox' name='b' value='{i}' {t}>{z}</label>"," checked",0,$sx)."<b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关 键 字</span><input type='text' name='bm' value='' class='i'><b>用说百度搜索的词语！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描&nbsp; &nbsp; 述</span><textarea name='bm' class='t'></textarea><b>建议不要超过200个字符！</b></li>");
 $H->ar("  <li dl='60,a' c='center,left'><span>高级功能</span><label><input type='checkbox' name='zc_gj'>高级</label></li>");
 
 $H->ar("  <li class='yc' dl='60,200,60' c='center,left,center'><span>文档来源</span><input type='text' name='bm' value='' class='i'><a dd='F_ly'>选择</a></li>");
 $H->ar("  <li class='yc' dl='60,200,60' c='center,left,center'><span>文档作者</span><input type='text' name='bm' value='' class='i'><a>选择</a></li>");
 $H->ar("  <li class='yc' dl='60,60,a' c='center,left,left'><span>阅 览 数</span><input type='text' name='bm' value='0' class='i'><b>这里填写有作弊嫌疑哦！</b></li>");
 
 
 $H->ar("  <li class='yc img' h='115px' dl='60' c='center'><span>图&nbsp; &nbsp; 片</span>");
 $H->ar("  <b><span></span><input name='a' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>");
 $H->ar("  </li>");

 
 $H->ar("  <li class='yc img' dl='60,160' c='center,left'><span>图&nbsp; &nbsp; 片</span><label><input type='checkbox' name='a'>从内容中获取第一张图片</label></li>");
 
 $H->ar("  <li class='yc' dl='60,a,a' h='50px' c='center,left,left'><span>简&nbsp; &nbsp; 要</span><textarea name='bm' class='t'></textarea><b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,200,60,60,60,a' c='center,left,left,left,center,left'><span>文档类型</span><input type='text' name='bm' value='' class='i' readonly><input type='text' name='bm' value='' class='i' readonly><input type='text' name='bm' value='' class='i' readonly><a>选择</a><b>当前文档所属类型</b></li>");
 $H->ar("  <li dl='60,a,10' h='400px' c='center,left,left'><span>内&nbsp; &nbsp; 容</span><textarea id='lr' name='lr' class='t'></textarea><b></b></li>");
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">文档管理</span><span>".IIF($Ws<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\">确认".IIF($Ws<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 $H->aj("var edit=editor('#lr');");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_TO.php?/1_".$Ws."_-3.html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_TO.php')})");
 
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'a',4);}");//图片上传按钮
 $H->aj("function scing(a){scimg($(a),'a',4)}");//图片上传删除
 
 $H->aj("\$(\".form a[dd='F_ly']\").click(function(){at('ds.php?','F_ly','150:',$(this))})");
 
 $H->aj("\$(\".form input[name='zc_gj']\").click(function(){if($(this).attr('checked')=='checked'){\$('.form .yc').show()}else{\$('.form .yc').hide()}})");//高级功能
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var bm=asz(id,'bm');if(!BDYZ_s('bm','*','标题不能为空')){return false;};");
 $H->aj("	var a=asz(id,'a');if(!BDYZ_s('a','*','关键字不能为空')){return false;};");
 $H->aj("	var b=ast(id,'b');if(!BDYZ_s('b','*','描述不能为空')){return false;};");
 $H->aj("	var c=ast(id,'c');if(!BDYZ_s('c','*','简要不能为空')){return false;};");
 $H->aj("	var d=edit.html();if(!BDYZ_b('d',ss,'内容不能为空')){return false;};");
 $H->aj("   $.post('FY_A_TO.php?/2.html',{bm:bm,a:a,b:b,c:c,d:d,id:".$Ws."},function(z){gdor('[ bm ]'+z+'！','ok','FY_A_TO.php');});");
 $H->aj("})");
 
 
}elseif($Wz==2){
  ZY();
  $bm=rp("bm");
  $a=rp("a");
  $b=rp("b");
  $c=rp("c");
  $d=rp("d");
  $id=rp("id");
  if($id==0){
    $DB->add('a_dy',array('na','gjz','ms','jy','da','lr'),array($bm,$a,$b,$c,date('Y-m-d H:i:s'),$d));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_dy',array('na','gjz','ms','jy','da','lr'),array($bm,$a,$b,$c,date('Y-m-d H:i:s'),$d),"id=$id");
    die("成功修改！");
  }
}

if($Wf!=-3){$H->aj("jzwc();");}
$H->aj("djrt('a_to','FY_A_TO.php');");
echo $H->x();
?>