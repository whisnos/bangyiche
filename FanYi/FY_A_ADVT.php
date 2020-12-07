<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,1);

if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,200,200,200,80' c='center,center,left,center,center,center'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span class='x'></span><span>序号</span><span>名称</span><span>投放时间</span><span>结束时间</span><span>样式</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="adv_t";
 $DB->fa=10;
 $DB->fp=$Wf;
 $DB->flike=F_HT."FY_A_ADVT.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
   $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[2]</span><span>$R[3]</span><span>$R[4]</span><span><a>修改</a></span></li>");
  }
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_wd\">广告管理</span><span dd=\"advt\">广告类型</span><span>列表</span>');"); 
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a></div>".$DB->FY()."');");
 $H->aj("djrtb('a_advt','FY_A_ADVT.php');");
 $H->aj("lbwh();");
 $H->aj("lbhover('#web .czan','#Right','FY_A_ADVT.php');"); 
 
}elseif($Wz==1){
	
 if($Ws>0){$z=$DB->Sels("type","adv_t","id=$Ws","id desc","");}
 else{$z=array("","","","","","");}

 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_wd\">广告管理</span><span dd=\"advt\">广告类型</span><span>".IIF($Ws<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\">确认".IIF($Ws<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>名字</span><input type='text' name='name' value='' class='i'><b>广告类型的名字</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>投放时间</span><input type='text' name='sTime' value='' class='i'><b>广告投放开始时间！</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>结束时间</span><input type='text' name='eTime' value='' class='i'><b>广告投放结束时间</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描述</span><textarea name='des' class='t'></textarea><b>广告类型描述建议不要超过200个字符！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>样式</span><textarea name='style' class='t'></textarea><b>广告所属样式</b></li>");
 $H->ar("</ul>");
 $H->aj("bdwh();");
 
 
 $H->aj("var ss=$('.form b').length;");
 $H->aj("for(i=0;i<=ss;i++){\$('.form b').eq(i).attr('dz',\$('.form b').eq(i).html())}");

 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
  $H->aj("	var name=asz(id,'name');if(!BDYZ_s('name','*','类型名称不能为空')){return false;};");
 $H->aj("	var sTime=asz(id,'sTime');if(!BDYZ_s('sTime','*','广告投放开始时间不能为空')){return false;};");
 $H->aj("	var eTime=asz(id,'eTime');if(!BDYZ_s('eTime','*','广告投放结束时间不能为空')){return false;};");
 $H->aj("	var des=asz(id,'des');");
 $H->aj("	var style=asz(id,'style');"); 
 $H->aj("$.post('FY_A_ADVT.php?/2.html',{name:name,sTime:sTime,eTime:eTime,des:des,style:style,id:".$Ws."},function(z){gdor('[name]'+z+'！','ok','FY_A_ADVT.php');});");
 $H->aj("})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_ADVT.php?/1_".$Ws."_-3.html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_ADVT.php')})");
}elseif($Wz==2){
  ZY();
 	$name=rp("name");
	$sTime=rp("sTime");
	$eTime=rp("eTime");
	$des=rp("des");
	$style=rp("style");
	$id=rp("id");	
	if($id==0){
    $DB->add('adv_t',array('name','sTime','eTime','style','des'),array($name,$sTime,$eTime,$style,$des));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('adv_t',array('name','sTime','eTime','style','des'),array($name,$sTime,$eTime,$style,$des),"id=$id");
    die("成功修改！");
  }

 } 
 
 $H->aj("jzwc();");
 $H->aj("djrt('a_advt','FY_A_ADVT.php');");
 echo $H->x();
?>