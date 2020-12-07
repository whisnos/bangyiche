<?php
include_once("FY_fun.php");
ZYs();
$H=new FY_html();
$Wz=R(0,0);
$Ws=R(1,0);
$Wf=R(2,1);
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,80,50' c='center,center,left,left,center,center' u='FY_A_CO.php'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_dy";
 $DB->fa=10;
 $DB->fp=$Wf;
 $DB->flike=F_HT."FY_A_CO.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>".DAT('Y-m-d',$R[5])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">评论管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a></div>".$DB->FY()."');");
 $H->aj("lbwh();");
 $H->aj("lbhover('#web .czan','#Right','FY_A_CO.php');");
 $DB->FCZ();

}elseif($Wz==1){
	
 if($Ws>0){$z=$DB->Sels("na,gjz,ms,jy,lr","a_dy","id=$Ws","id desc","");}
 else{$z=array("","","","","");}
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">单页管理</span><span>".IIF($Ws<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\">确认".IIF($Ws<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp;&nbsp;签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp;&nbsp;题</span><input type='text' name='bm' value='".FF($z[0],0)."' class='i'><b>单页名称</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关键字</span><input type='text' name='a' value='".FF($z[1],0)."' class='i'><b>用说百度搜索的词语！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描&nbsp;&nbsp;述</span><textarea name='b' class='t'>".FF($z[2],0)."</textarea><b>建议不要超过200个字符！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>简&nbsp;&nbsp;要</span><textarea name='c' class='t'>".FF($z[3],0)."</textarea><b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,a,100' h='400px' c='center,left,left'><span>内&nbsp;&nbsp;容</span><textarea id='lr' name='d' class='t'>".FF($z[4],0)."</textarea><b></b></li>");
 $H->ar("</ul>");
 $H->aj("bdwh();");
 
 $H->aj("var edit=editor('#lr');");
 $H->aj("var ss=$('.form b').length;");
 $H->aj("for(i=0;i<=ss;i++){\$('.form b').eq(i).attr('dz',\$('.form b').eq(i).html())}");

 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var bm=asz(id,'bm');if(!BDYZ_s('bm','*','标题不能为空')){return false;};");
 $H->aj("	var a=asz(id,'a');if(!BDYZ_s('a','*','关键字不能为空')){return false;};");
 $H->aj("	var b=ast(id,'b');if(!BDYZ_s('b','*','描述不能为空')){return false;};");
 $H->aj("	var c=ast(id,'c');if(!BDYZ_s('c','*','简要不能为空')){return false;};");
 $H->aj("	var d=edit.html();if(!BDYZ_b('d',ss,'内容不能为空')){return false;};");
 $H->aj("   $.post('FY_A_CO.php?/2.html',{bm:bm,a:a,b:b,c:c,d:d,id:".$Ws."},function(z){gdor('[ bm ]'+z+'！','ok','FY_A_CO.php');});");
 $H->aj("})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_CO.php?/1_".$Ws."_-3.html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_CO.php')})");
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
$H->aj("djrt('a_co','FY_A_CO.php');");
echo $H->x();
?>