<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,1);
if ($Wz==0){ 
 $H->ar("<ul class='lb' dl='24,50,a,80,50' c='center,center,left,left,center,center' u='FY_A_CP.php'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_wl";
 $DB->fa=10;
 $DB->fp=$Wf;
 $DB->flike=F_HT."FY_A_WL.php?/*.html";
 $fz=$DB->FZ();
 $wdlx=array(); 
 while($R = mysql_fetch_array($fz))
  {
 
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span></span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
 array_push($wdlx,$R[1]);
  }
  
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_wl\">作品类型</span><span>列表</span>');"); 
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><select name=><option value=-1>所有列表</option>".ZH("<option value=\'{i}\'{t}>{z}</option>"," selected=\'selected\'",-1,$wdlx)."</select><a dd=\'a_wl\'>类型</a></div>".$DB->FY()."');");
 $H->aj("djrtb('a_wl','FY_A_WL.php');");
 $H->aj("lbwh();");
 $H->aj("lbhover('#web .czan','#Right','FY_A_WL.php');");
 
 }elseif($Wz==1){
 if($Ws>0){$z=$DB->Sels("type","a_wl","id=$Ws","id desc","");}
 else{$z=array("","","","","","");}

 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_wl\">作品类型</span><span>".IIF($Ws<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\">确认".IIF($Ws<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
	
	 
	
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp;&nbsp;签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>类型名称</span><input type='text' name='bm' value='".FF($z[0],0)."' class='i'><b>类型名称</b></li>");	
 
 
 
 
 $H->ar("</ul>");
 $H->aj("bdwh();");
 
 $H->aj("var ss=$('.form b').length;");
 $H->aj("for(i=0;i<=ss;i++){\$('.form b').eq(i).attr('dz',\$('.form b').eq(i).html())}");

 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var bm=asz(id,'bm');if(!BDYZ_s('bm','*','产品名称不能为空')){return false;};");
 $H->aj("   $.post('FY_A_WL.php?/2.html',{bm:bm,id:".$Ws."},function(z){gdor('[ bm ]'+z+'！','ok','FY_A_WL.php');});");
 $H->aj("})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_WL.php?/1_".$Ws."_-3.html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_WL.php')})");
}elseif($Wz==2){
  ZY();
  $bm=rp("bm");
  $id=rp("id");
  if($id==0){
    $DB->add('a_wl',array('type'),array($bm));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_wl',array('type'),array($bm),"id=$id");
    die("成功修改！");
  }

 }

if($Wf!=-3){$H->aj("jzwc();");}
$H->aj("djrt('a_wl','FY_A_WL.php');");//这是当前位置的连接
echo $H->x();
?>