<?php
include_once("FY_fun.php");
ZYs();
$H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,80,50' c='center,center,left,left,center,center' u='FY_A_SY.php' d='0'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="sy";
 $DB->fx="id desc";
 $DB->FP($Wf);
 $DB->flike=F_HT."FY_A_SE.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>".DAT('Y-m-d',$R[5])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_sy\">单页管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a></div>".$DB->FY()."');");
 $H->aj("lbwh();");
 $H->aj("lbhover('#web .czan','#Right','FY_A_SY.php');");
 $DB->FCZ();

}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("wzm,gjz,ms","sy","id=1","id desc","");}
 else{$z=array("","","");}

 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>网站管理</span><span dd=\"a_sy\">网站管理</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_syq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>网站名称</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>网站名称</span><input type='text' name='wzm' value='".FF($z[0],0)."' class='i'><b>网站名字</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关键字</span><input type='text' name='gjz' value='".FF($z[1],0)."' class='i'><b>用说百度搜索的词语！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描&nbsp;&nbsp;述</span><textarea name='ms' class='t'>".FF($z[2],0)."</textarea><b>建议不要超过200个字符！</b></li>");
 $H->ar("</ul>");
 $H->aj("bdwh();");
 
 $H->aj("var swdlr=editor('#lr');");
 $H->aj("var ss=$('.form b').length;");
 $H->aj("for(i=0;i<=ss;i++){\$('.form b').eq(i).attr('dz',\$('.form b').eq(i).html())}");
 $H->aj("\$('#web .rt .czan a[dd=\"a_syq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var wzm=asz(id,'wzm');if(!BDYZ_s('bm','*','网站名字不能为空')){return false;};");
 $H->aj("	var gjz=asz(id,'gjz');if(!BDYZ_s('a','*','关键字不能为空')){return false;};");
 $H->aj("	var ms=ast(id,'ms');if(!BDYZ_s('b','*','描述不能为空')){return false;};");
 $H->aj("   $.post('FY_A_SY.php?/2.html',{wzm:wzm,gjz:gjz,ms:ms,id:".$Wf."},function(z){gdor('[ '+wzm+' ]'+z+'！','ok','FY_A_SY.php');});");
 $H->aj("})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_SY.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_SY.php')})");
}elseif($Wz==2){
  ZY();
  $wzm=rp("wzm");
  $gjz=rp("gjz");
  $ms=rp("ms");
  $id=1;
  if($id==0){
    $DB->add('sy',array('wzm','gjz','ms'),array($wzm,$gjz,$ms));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('sy',array('wzm','gjz','ms'),array($wzm,$gjz,$ms),"id=1");
    die("成功修改！");
  }
}

if($Ws!=-3){$H->aj("jzwc();");}
$H->aj("djrt('a_sy','FY_A_SY.php');");
echo $H->x();
?>