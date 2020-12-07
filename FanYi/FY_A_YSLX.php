<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $wdlx=CF($DB->arrayz("{z0}||","lm","a_yslxl","","","","",""),"||");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,80,50' c='center,center,left,left,center,center' u='FY_A_YSLX.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>类型</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_yslx";
 $DB->fx="id desc";
 $DB->fa=20;
 $DB->FP($Wf);
 if ($Ws>0){
   $dlid=$DB->Sels("id,bh","a_yslxl","id=$Ws","id desc","");
   $DB->FZW("lbh like'$dlid[1]%'");
 }
 $DB->ft="id,bt,sxz,sxf,sxt,tjdj,lbh,lmc";
 $DB->flike=F_HT."FY_A_YSLX.php?/0_".$Ws."_*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[7]</span><span>名称</span><span>".DAT('Y-m-d',$R[5])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>运输路线</span><span dd=\"a_dy\">文档管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><select dd=\"a_lb\"><option value=\"FY_A_YSLX.php\">所有列表</option>".$DB->arrayz("<option value=\"FY_A_YSLX.php?/0_{z0}.html\" {t}>{bq}├{z1}</option>","id,lm,bh","a_yslxl","","","",'selected="selected"',$Ws)."</select><a dd=\'a_lx\'>类型</a></div>".$DB->FY()."');");
//$H->aj("djrtb('a_yslxt','FY_A_YSLX.php?/1.html');");
 $H->aj("djrtb('a_lx','FY_A_YSLXL.php');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_YSLX.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("bt,sxz,sxf,sxt,gjz,ms,ly,zz,yls,img,jy,lid,lbh,lmc,lr","a_yslx","id=$Wf","id desc","");}
 else{$z=array("","",1,"","","","","","","","","","","","");}
 
 
 
 $sx=array("发布","最新","推荐");
 $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp; &nbsp; 题</span><input type='text' name='wdbt' value='".FF($z[0],0)."' class='i'><b>标题</b></li>");
 $H->ar("  <li dl='60,70,70,70,a' c='center,left,left'><span>属&nbsp; &nbsp; 性</span>");
 $H->ar("  <label><input type='checkbox' name='wdsx0' value='1'".IFT($z[1]," checked").">发布</label>");
 $H->ar("  <label><input type='checkbox' name='wdsx1' value='1'".IFT($z[2]," checked").">最新</label>");
 $H->ar("  <label><input type='checkbox' name='wdsx2' value='1'".IFT($z[3]," checked").">推荐</label>");
 $H->ar("  <b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关 键 字</span><input type='text' name='wdgjz' value='".FF($z[4],0)."' class='i'><b>用说百度搜索的词语！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描&nbsp; &nbsp; 述</span><textarea name='wdms' class='t'>".FF($z[5],0)."</textarea><b>建议不要超过200个字符！</b></li>");
 $H->ar("  <li class='img' h='auto' dl='60' c='center'><span>图&nbsp; &nbsp; 片</span>");
 $img=CF(FF($z[9],0),",");
 $imgz=CFZ($img)-1;
 for ($imi=1;$imi<=$imgz;$imi++){
   $H->ar("  <b><span><img src='".$img[$imi]."' $imgz></span><input name='wdimg' type='hidden' value='".$img[$imi]."' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)'>删除</a></b>");
 }
 if($imgz<10){
 $H->ar("  <b><span></span><input name='wdimg' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>");
 }


 $H->ar("  </li>");
 $H->ar("  <li class='yc' dl='60,a,a' h='50px' c='center,left,left'><span>简&nbsp; &nbsp; 要</span><textarea name='wdjy' class='t'>".FF($z[10],0)."</textarea><b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,200,60,60,60,a' c='center,left,left,left,center,left'><span>文档类型</span><input type='text' name='lxmc' value='".FF($z[13],0)."' class='i' readonly><input type='text' name='lxid' value='".FF($z[11],0)."' class='i' readonly><input type='text' name='lxbh' value='".FF($z[12],0)."' class='i' readonly><a dd='F_lx'>选择</a><b>当前文档所属类型</b></li>");
 $H->ar("  <li dl='60,a,10' h='400px' c='center,left,left'><span>内&nbsp; &nbsp; 容</span><textarea id='wdlr' name='wdlr' class='t'>".FF($z[14],0)."</textarea><b></b></li>");
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>运输路线</span><span dd=\"a_dy\">文档管理</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_YSLX.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_YSLX.php')})");
 
 
 
 
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'wdimg',10);}");//图片上传按钮
 $H->aj("function scing(a){scimg($(a),'wdimg',10)}");//图片上传删除
 
 
 
 
 $H->aj("\$(\".form a[dd='F_ly']\").click(function(){at('FY_A_YSLXL_X.php?z=F_ly','F_ly','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_lx']\").click(function(){at('FY_A_YSLXL_X.php?z=F_lx','F_lx','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_zz']\").click(function(){at('FY_A_YSLXL_X.php?z=F_zz','F_zz','150:',$(this))})");
 
 $H->aj("\$(\".form input[name='zc_gj']\").click(function(){if($(this).attr('checked')=='checked'){\$('.form .yc').show()}else{\$('.form .yc').hide()}})");//高级功能
 



 $H->aj("var swdlr=editor('#wdlr');");
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var wdbt=asz(id,'wdbt');if(!BDYZ_s('wdbt','*','标题不能为空')){return false;};");
 $H->aj("	var wdgjz=asz(id,'wdgjz');if(!BDYZ_s('wdgjz','*','关键字不能为空')){return false;};");
 $H->aj("	var wdms=ast(id,'wdms');if(!BDYZ_s('wdms','*','描述不能为空')){return false;};");
 $H->aj("	var wdsx0=asfs(id,'wdsx0');");
 $H->aj("	var wdsx1=asfs(id,'wdsx1');");
 $H->aj("	var wdsx2=asfs(id,'wdsx2');");
 $H->aj("	var wdimg=aszf(id,'wdimg');");
 $H->aj("	var wdly=asz(id,'wdly');");
 $H->aj("	var wdzz=asz(id,'wdzz');");
 $H->aj("	var wdyls=asz(id,'wdyls');");
 $H->aj("	var wdjy=ast(id,'wdjy');");
 $H->aj("	var lxmc=asz(id,'lxmc');if(!BDYZ_s('lxmc','*','请选类型')){return false;};");
 $H->aj("	var lxid=asz(id,'lxid');");
 $H->aj("	var lxbh=asz(id,'lxbh');");
 $H->aj("	var wdlr=swdlr.html();if(!BDYZ_b(wdlr,swdlr,'内容不能为空')){return false;};");
 $H->aj("$.post('FY_A_YSLX.php?/2.html',{wdbt:wdbt,wdgjz:wdgjz,wdms:wdms,wdly:wdly,wdzz:wdzz,wdyls:wdyls,wdjy:wdjy,lxmc:lxmc,lxid:lxid,lxbh:lxbh,wdsx0:wdsx0,wdsx1:wdsx1,wdsx2:wdsx2,wdimg:wdimg,wdlr:wdlr,id:".$Wf."},function(z){gdor('[ '+wdbt+' ]'+z+'！','ok','FY_A_YSLX.php');});");
 $H->aj("});");
 
 
}elseif($Wz==2){
  ZY();
  $bt=rp("wdbt");
  $gjz=rp("wdgjz");
  $ms=rp("wdms");
  $ly=rp("wdly");
  $zz=rp("wdzz");
  $yls=rp("wdyls");
  $jy=rp("wdjy");
  $lmc=rp("lxmc");
  $lid=rp("lxid");
  $lbh=rp("lxbh");
  $sxz=rp("wdsx0");
  $sxf=rp("wdsx1");
  $sxt=rp("wdsx2");
  
  $sxf=IIF($sxf,$sxf,0);
  $sxz=IIF($sxz,$sxz,0);
  $sxt=IIF($sxt,$sxt,0);
  $yls=IIF($yls,$yls,0);
  
  $img=rp("wdimg");
  $lr=rp("wdlr");
  $id=rp("id");
  if($id==0){
    $DB->add('a_yslx',array('lid','lbh','lmc','bt','gjz','ms','sxz','sxf','sxt','ly','zz','yls','img','jy','lr','tjdj'),array($lid,$lbh,$lmc,$bt,$gjz,$ms,$sxz,$sxf,$sxt,$ly,$zz,$yls,$img,$jy,$lr,date('Y-m-d H:i:s')));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_yslx',array('lid','lbh','lmc','bt','gjz','ms','sxz','sxf','sxt','ly','zz','yls','img','jy','lr'),array($lid,$lbh,$lmc,$bt,$gjz,$ms,$sxz,$sxf,$sxt,$ly,$zz,$yls,$img,$jy,$lr),"id=$id");
    die("成功修改！");
  }
}elseif($Wz==3){
  $id=CF(rp("id"),",");
  for($i=0;$i<CFZ($id)-1;$i++){
    $DB->del('a_yslx',"id=".$id[$i]);
    
  }die("成功删除！");
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_yslx','FY_A_YSLX.php');");
 echo $H->x();
?>