<?php
include_once("FY_fun.php");
ZYs();
$H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,80,a,50' c='center,center,left,left,center,center' u='FY_A_LJ.php' d='0'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>地址</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_lj";
 $DB->fa=10;
 $DB->fx="id desc";
 $DB->FP($Wf);
 $DB->ft="id,bt,dz,time";
 $DB->flike=F_HT."FY_A_LJ.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[2]</span><span>".DAT('Y-m-d',$R[3])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_lj\">友情链接</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a></div>".$DB->FY()."');");
 $H->aj("lbwh();");
 $H->aj("lbhover('#web .czan','#Right','FY_A_LJ.php');");
 $DB->FCZ();

}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("bt,dz,img,time","a_lj","id=$Wf","id desc","");}
 else{$z=array("","","");}

 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_lj\">友情链接</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_ljq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp;&nbsp;签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>链接名称</span><input type='text' name='bt' value='".FF($z[0],0)."' class='i'><b>链接名称</b></li>");
  $H->ar("  <li dl='60,a,a' c='center,left,left'><span>链接地址</span><input type='text' name='dz' value='".FF($z[1],0)."' class='i'><b>链接地址</b></li>");
 $H->ar("  <li style='display:block' class='yc img' h='115px' dl='60' c='center'><span>图&nbsp; &nbsp; 片</span>");
 $img=CF(FF($z[2],0),",");
   $H->ar("  <b><span><img src='".$img[0]."'></span><input name='img' type='hidden' value='".$img[0]."' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)'>删除</a></b>");

 $H->ar("  </li>");
 $H->ar("</ul>");
 $H->aj("bdwh();");
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'img',1);}");
 $H->aj("function scing(a){scimg($(a),'img',1)}");
 
 $H->aj("var swdlr=editor('#lr');");
 $H->aj("var ss=$('.form b').length;");
 $H->aj("for(i=0;i<=ss;i++){\$('.form b').eq(i).attr('dz',\$('.form b').eq(i).html())}");
 $H->aj("\$('#web .rt .czan a[dd=\"a_ljq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var bt=asz(id,'bt');");
 $H->aj("	var dz=asz(id,'dz');");
 $H->aj("	var img=asz(id,'img');");
 $H->aj("   $.post('FY_A_LJ.php?/2.html',{bt:bt,dz:dz,img:img,id:".$Wf."},function(z){gdor('[ '+bt+' ]'+z+'！','ok','FY_A_LJ.php');});");
 $H->aj("})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_LJ.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_LJ.php')})");
}elseif($Wz==2){
  ZY();
  $bt=rp("bt");
  $dz=rp("dz");
  $img=rp("img");
  $id=rp("id"); 
  if($id==0){
    $DB->add('a_lj',array('bt','dz','img','time'),array($bt,$dz,$img,date('Y-m-d H:i:s')));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_lj',array('bt','dz','img','time'),array($bt,$dz,$img,date('Y-m-d H:i:s')),"id=$id");
    die("成功修改！");
  }
}elseif($Wz==3){
  $id=CF(rp("id"),",");
  for($i=0;$i<CFZ($id)-1;$i++){
    $DB->del('a_lj',"id=".$id[$i]);
  }
    die("成功删除！ ".rp("id"));
}

if($Ws!=-3){$H->aj("jzwc();");}
$H->aj("djrt('a_lj','FY_A_LJ.php');");
echo $H->x();
?>