<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $cplx=CF($DB->arrayz("{z0}||","lm","a_scpl","","","","",""),"||");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,80,50' c='center,center,left,left,center,center' u='FY_A_SCP.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>类型</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_scp";
 $DB->fx="id desc";
 $DB->fa=20;
 $DB->FP($Wf);
 if ($Ws>0){
   $dlid=$DB->Sels("id,bh","a_scpl","id=$Ws","id desc","");
   $DB->FZW("lbh like'$dlid[1]%'");
 }
 $DB->ft="id,bt,sxz,sxf,sxt,tjdj,lbh,lmc";
 $DB->flike=F_HT."FY_A_SCP.php?/0_".$Ws."_*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[7]</span><span>名称</span><span>".DAT('Y-m-d',$R[5])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">产品管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><select dd=\"a_lb\"><option value=\"FY_A_SCP.php\">所有列表</option>".$DB->arrayz("<option value=\"FY_A_SCP.php?/0_{z0}.html\" {t}>{bq}├{z1}</option>","id,lm,bh","a_scpl","","","",'selected="selected"',$Ws)."</select><a dd=\'a_lx\'>类型</a></div>".$DB->FY()."');");
$H->aj("djrtb('a_scpt','FY_A_SCP.php?/1.html');");
 $H->aj("djrtb('a_lx','FY_A_SCPL.php');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_SCP.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("bt,sxz,sxf,sxt,gjz,ms,ly,zz,yls,img,jy,lid,lbh,lmc,lr","a_scp","id=$Wf","id desc","");}
 else{$z=array("","",1,"","","","","","","","","","","","");}
 
 
 
 $sx=array("发布","最新","推荐");
 $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp; &nbsp; 题</span><input type='text' name='cpbt' value='".FF($z[0],0)."' class='i'><b>标题</b></li>");
 $H->ar("  <li dl='60,70,70,70,a' c='center,left,left'><span>属&nbsp; &nbsp; 性</span>");
 $H->ar("  <label><input type='checkbox' name='cpsx0' value='1'".IFT($z[1]," checked").">发布</label>");
 $H->ar("  <label><input type='checkbox' name='cpsx1' value='1'".IFT($z[2]," checked").">最新</label>");
 $H->ar("  <label><input type='checkbox' name='cpsx2' value='1'".IFT($z[3]," checked").">推荐</label>");
 $H->ar("  <b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关 键 字</span><input type='text' name='cpgjz' value='".FF($z[4],0)."' class='i'><b>用说百度搜索的词语！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描&nbsp; &nbsp; 述</span><textarea name='cpms' class='t'>".FF($z[5],0)."</textarea><b>建议不要超过200个字符！</b></li>");
 $H->ar("  <li dl='60,a' c='center,left'><span>高级功能</span><label><input type='checkbox' name='zc_gj'>高级</label></li>");
 
 $H->ar("  <li class='yc' dl='60,200,60' c='center,left,center'><span>产品来源</span><input type='text' name='cply' value='".FF($z[6],0)."' class='i'><a dd='F_ly'>选择</a></li>");
 $H->ar("  <li class='yc' dl='60,200,60' c='center,left,center'><span>产品作者</span><input type='text' name='cpzz' value='".FF($z[7],0)."' class='i'><a dd='F_zz'>选择</a></li>");
 $H->ar("  <li class='yc' dl='60,60,a' c='center,left,left'><span>阅 览 数</span><input type='text' name='cpyls' value='".FF($z[8],0)."' class='i'><b>这里填写有作弊嫌疑哦！</b></li>");
 $H->ar("  <li class='yc img' h='115px' dl='60' c='center'><span>图&nbsp; &nbsp; 片</span>");
 $img=CF(FF($z[9],0),",");
 $imgz=CFZ($img)-1;
 for ($imi=1;$imi<=$imgz;$imi++){
   $H->ar("  <b><span><img src='".$img[$imi]."' $imgz></span><input name='cpimg' type='hidden' value='".$img[$imi]."' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)'>删除</a></b>");
 }
 if($imgz<3){
 $H->ar("  <b><span></span><input name='cpimg' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>");
 }


 $H->ar("  </li>");
 $H->ar("  <li class='yc' dl='60,a,a' h='50px' c='center,left,left'><span>简&nbsp; &nbsp; 要</span><textarea name='cpjy' class='t'>".FF($z[10],0)."</textarea><b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,200,60,60,60,a' c='center,left,left,left,center,left'><span>产品类型</span><input type='text' name='lxmc' value='".FF($z[13],0)."' class='i' readonly><input type='text' name='lxid' value='".FF($z[11],0)."' class='i' readonly><input type='text' name='lxbh' value='".FF($z[12],0)."' class='i' readonly><a dd='F_lx'>选择</a><b>当前产品所属类型</b></li>");
 $H->ar("  <li dl='60,a,10' h='400px' c='center,left,left'><span>内&nbsp; &nbsp; 容</span><textarea id='cplr' name='cplr' class='t'>".FF($z[14],0)."</textarea><b></b></li>");
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">产品管理</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_SCP.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_SCP.php')})");
 
 
 
 
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'cpimg',3);}");
 $H->aj("function scing(a){scimg($(a),'cpimg',3)}");
 
 
 
 
 $H->aj("\$(\".form a[dd='F_ly']\").click(function(){at('FY_A_SCPL_X.php?z=F_ly','F_ly','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_lx']\").click(function(){at('FY_A_SCPL_X.php?z=F_lx','F_lx','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_zz']\").click(function(){at('FY_A_SCPL_X.php?z=F_zz','F_zz','150:',$(this))})");
 
 $H->aj("\$(\".form input[name='zc_gj']\").click(function(){if($(this).attr('checked')=='checked'){\$('.form .yc').show()}else{\$('.form .yc').hide()}})");
 



 $H->aj("var scplr=editor('#cplr');");
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var cpbt=asz(id,'cpbt');if(!BDYZ_s('cpbt','*','标题不能为空')){return false;};");
 $H->aj("	var cpgjz=asz(id,'cpgjz');if(!BDYZ_s('cpgjz','*','关键字不能为空')){return false;};");
 $H->aj("	var cpms=ast(id,'cpms');if(!BDYZ_s('cpms','*','描述不能为空')){return false;};");
 $H->aj("	var cpsx0=asfs(id,'cpsx0');");
 $H->aj("	var cpsx1=asfs(id,'cpsx1');");
 $H->aj("	var cpsx2=asfs(id,'cpsx2');");
 $H->aj("	var cpimg=aszf(id,'cpimg');");
 $H->aj("	var cply=asz(id,'cply');");
 $H->aj("	var cpzz=asz(id,'cpzz');");
 $H->aj("	var cpyls=asz(id,'cpyls');");
 $H->aj("	var cpjy=ast(id,'cpjy');");
 $H->aj("	var lxmc=asz(id,'lxmc');if(!BDYZ_s('lxmc','*','请选类型')){return false;};");
 $H->aj("	var lxid=asz(id,'lxid');");
 $H->aj("	var lxbh=asz(id,'lxbh');");
 $H->aj("	var cplr=scplr.html();if(!BDYZ_b(cplr,scplr,'内容不能为空')){return false;};");
 $H->aj("$.post('FY_A_SCP.php?/2.html',{cpbt:cpbt,cpgjz:cpgjz,cpms:cpms,cply:cply,cpzz:cpzz,cpyls:cpyls,cpjy:cpjy,lxmc:lxmc,lxid:lxid,lxbh:lxbh,cpsx0:cpsx0,cpsx1:cpsx1,cpsx2:cpsx2,cpimg:cpimg,cplr:cplr,id:".$Wf."},function(z){gdor('[ '+cpbt+' ]'+z+'！','ok','FY_A_SCP.php');});");
 $H->aj("});");
 
 
}elseif($Wz==2){
  ZY();
  $bt=rp("cpbt");
  $gjz=rp("cpgjz");
  $ms=rp("cpms");
  $ly=rp("cply");
  $zz=rp("cpzz");
  $yls=rp("cpyls");
  $jy=rp("cpjy");
  $lmc=rp("lxmc");
  $lid=rp("lxid");
  $lbh=rp("lxbh");
  $sxz=rp("cpsx0");
  $sxf=rp("cpsx1");
  $sxt=rp("cpsx2");
  
  $sxf=IIF($sxf,$sxf,0);
  $sxz=IIF($sxz,$sxz,0);
  $sxt=IIF($sxt,$sxt,0);
  $yls=IIF($yls,$yls,0);
  
  $img=rp("cpimg");
  $lr=rp("cplr");
  $id=rp("id");
  if($id==0){
    $DB->add('a_scp',array('lid','lbh','lmc','bt','gjz','ms','sxz','sxf','sxt','ly','zz','yls','img','jy','lr','tjdj'),array($lid,$lbh,$lmc,$bt,$gjz,$ms,$sxz,$sxf,$sxt,$ly,$zz,$yls,$img,$jy,$lr,date('Y-m-d H:i:s')));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_scp',array('lid','lbh','lmc','bt','gjz','ms','sxz','sxf','sxt','ly','zz','yls','img','jy','lr'),array($lid,$lbh,$lmc,$bt,$gjz,$ms,$sxz,$sxf,$sxt,$ly,$zz,$yls,$img,$jy,$lr),"id=$id");
    die("成功修改！");
  }
}elseif($Wz==3){
  $id=CF(rp("id"),",");
  for($i=0;$i<CFZ($id);$i++){
    $DB->del('a_scp',"id=".$id[$i]);
  }
    die("成功删除！");
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_scp','FY_A_SCP.php');");
 echo $H->x();
?>