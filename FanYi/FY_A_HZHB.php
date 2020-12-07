<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 //$cplx=CF($DB->arrayz("{z0}||","lm","a_hzhbl","","","","",""),"||");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,80,50' c='center,center,left,left,center,center' u='FY_A_HZHB.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>类型</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_hzhb";
 $DB->fx="id desc";
 $DB->fa=20;
 $DB->FP($Wf);
  if ($Ws>0){

   $DB->FZW("lid=$Ws");
 }

 $DB->ft="id,bt,lmc";
 $DB->flike=F_HT."FY_A_HZHB.php?/0_".$Ws."_*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[2]</span><span>名称</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">广告管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><select dd=\"a_lb\"><option value=\"FY_A_HZHB.php\">所有列表</option>".$DB->arrayz("<option value=\"FY_A_HZHB.php?/0_{z0}.html\" {t}>{bq}├{z1}</option>","id,lmc","a_hzhbl","","","",'selected="selected"',$Ws)."</select><a dd=\'a_lx\'>类型</a></div>".$DB->FY()."');");
//$H->aj("djrtb('a_hzhbt','FY_A_HZHB.php?/1.html');");
 $H->aj("djrtb('a_lx','FY_A_HZHBL.php');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_HZHB.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("id,bt,pic,lmc,lid,dz","a_hzhb","id=$Wf","id desc","");}
 else{$z=array("","","","");}
 
 
 
 $sx=array("发布","最新","推荐");
 $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp; &nbsp; 题</span><input type='text' name='bt' value='".FF($z['bt'],0)."' class='i'><b>标题</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>链接到</span><input type='text' name='dz' value='".FF($z['dz'],0)."' class='i'><b>链接到</b></li>");
 $H->ar("  <li dl='60,200,60,60,60,a' c='center,left,left,left,center,left'><span>文档类型</span><input type='text' name='lxmc' value='".FF($z['lmc'],0)."' class='i' readonly><input type='text' name='lxid' value='".FF($z['lid'],0)."' class='i' readonly><a dd='F_lx'>选择</a><b>当前文档所属类型</b></li>");
 $H->ar("  <li class='img' h='115px' dl='60' c='center'><span>图&nbsp; &nbsp; 片</span>");
 $img=CF(FF($z[2],0),",");
 $imgz=CFZ($img);
 for ($imi=1;$imi<$imgz;$imi++){
   $H->ar("  <b><span><img src='".$img[$imi]."' $imgz></span><input name='pic' type='hidden' value='".$img[$imi]."' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)'>删除</a></b>");
 }
 if($imgz<2){
 $H->ar("  <b><span></span><input name='pic' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>");
 }

 $H->ar("  </li>");
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">广告管理</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_HZHB.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_HZHB.php')})");
 
 
 
 
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'pic',1);}");//图片上传按钮
 $H->aj("function scing(a){scimg($(a),'pic',1)}");//图片上传删除
 
 
 
 
 $H->aj("\$(\".form a[dd='F_ly']\").click(function(){at('FY_A_HZHBL_X.php?z=F_ly','F_ly','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_lx']\").click(function(){at('FY_A_HZHBL_X.php?z=F_lx','F_lx','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_zz']\").click(function(){at('FY_A_HZHBL_X.php?z=F_zz','F_zz','150:',$(this))})");
 
 $H->aj("\$(\".form input[name='zc_gj']\").click(function(){if($(this).attr('checked')=='checked'){\$('.form .yc').show()}else{\$('.form .yc').hide()}})");//高级功能
 



 $H->aj("var scplr=editor('#cplr');");
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var bt=asz(id,'bt');if(!BDYZ_s('bt','*','标题不能为空')){return false;};");
  $H->aj("	var dz=asz(id,'dz');if(!BDYZ_s('','*','')){return false;};");
 $H->aj("	var lxmc=asz(id,'lxmc');if(!BDYZ_s('lxmc','*','请选类型')){return false;};");
 $H->aj("	var lxid=asz(id,'lxid');");
 $H->aj("	var pic=aszf(id,'pic');");
 $H->aj("$.post('FY_A_HZHB.php?/2.html',{bt:bt,pic:pic,lxmc:lxmc,lxid:lxid,dz:dz,id:".$Wf."},function(z){gdor('[ '+bt+' ]'+z+'！','ok','FY_A_HZHB.php');});");
 $H->aj("});");
 
 
}elseif($Wz==2){
  ZY();
  $bt=rp("bt");  
   $dz=rp("dz");  
  $pic=rp("pic");
  $lmc=rp("lxmc");
   $lid=rp("lxid");
  $id=rp("id");
  if($id==0){
    $DB->add('a_hzhb',array('bt','pic','lmc','lid','dz'),array($bt,$pic,$lmc,$lid,$dz));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_hzhb',array('bt','pic','lmc','lid','dz'),array($bt,$pic,$lmc,$lid,$dz),"id=$id");
    die("成功修改！");
  }
}elseif($Wz==3){
  $id=CF(rp("id"),",");
  for($i=0;$i<CFZ($id);$i++){
    $DB->del('a_hzhb',"id=".$id[$i]);
  }
    die("成功删除！");
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_hzhb','FY_A_HZHB.php');");
 echo $H->x();
?>