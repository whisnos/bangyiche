<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $cplx=CF($DB->arrayz("{z0}||","lm","a_sjdindanl","","","","",""),"||");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 $sou=rp("sou");
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,a,a,50' c='center,center,left,left,center,center' u='FY_A_SJDINDAN.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("<li class='dh'><span>选择</span><span>编号</span><span>姓名</span><span>类别</span><span>状态</span><span>留言时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_sjdindan";
 $DB->fx="id desc";
 $DB->fa=20;
 $DB->FP($Wf);
 if ($Ws>0){
   $DB->FZW("lid=$Ws");
 }
 if($sou){
   $DB->FZW("bt like'%$sou%' or lmc like'%$sou%' or ms like'%$sou%' or jy like'%$sou%' or tjdj like'%$sou%' or ly like'%$sou%'");
 }
 $DB->ft="id,xm,lmc,ly,tjdj,jy";
 $DB->flike=F_HT."FY_A_SJDINDAN.php?/0_".$Ws."_*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>".$R['jy']."</span><span ".IFT($R['lmc']=="已处理","style='color:red;'").">".$R['lmc']."</span><span>".$R['tjdj']."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">订单管理</span><span>列表</span><div class=\"sou\"><input type=\"text\" name=\"sou\" value=\"$sou\"><span>搜索</span></div>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><select dd=\"a_lb\"><option value=\"FY_A_SJDINDAN.php\">所有列表</option>".$DB->arrayz("<option value=\"FY_A_SJDINDAN.php?/0_{z0}.html\" {t}>{bq}├{z1}</option>","id,lm,bh","a_sjdindanl","","","",'selected="selected"',$Ws)."</select><a dd=\'a_lx\'>状态</a></div>".$DB->FY()."');");
//$H->aj("djrtb('a_sjdindant','FY_A_SJDINDAN.php?/1.html');");
 $H->aj("djrtb('a_lx','FY_A_SJDINDANL.php');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_SJDINDAN.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("id,xm,gjz,dh,lmc,lbh,lid,ly,tjdj,zz,jy","a_sjdindan","id=$Wf","id desc","");}
 else{$z=array("","",1,"","","","","","","","","","","","");}
 
 $sx=array("发布","最新","推荐");
 $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form'>");

 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>会员编号</span><span>".$z['id']."</span><b></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>姓名</span><span>".$z['xm']."</span><b></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>电话</span><span>".$z['dh']."</span><b></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>类别</span><span>".$z['jy']."</span><b></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>欲购车品牌</span><span>".$z['gjz']."</span><b></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>欲购车时间</span><span>".$z['zz']."</span><b></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left' style='height:200px;'><span style='display:block;height:100%'>备注</span><div style='width:400px;height:200px;'>".FF($z['ly'],0)."</div><b></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>提交时间</span><span>".$z['tjdj']."</span></li>");
 
 $H->ar("  <li dl='60,200,60,60,60,a' c='center,left,left,left,center,left'><span>订单状态</span><input type='text' name='lxmc' value='".FF($z['lmc'],0)."' class='i' readonly><input type='text' name='lxid' value='".FF($z['lid'],0)."' class='i' readonly><input type='text' name='lxbh' value='".FF($z['lbh'],0)."' class='i' readonly><a dd='F_lx'>选择</a><b>订单状态</b></li>");
 $adminczjl=$DB->Sel("lr,cztime","a_sjdindanjl","lid=".$Wf,"id desc","");
 while($Rs=mysql_fetch_array($adminczjl)){
    $H->ar("<li dl='60,a,a' c='center,left,left'><span>操作记录</span><span>".$Rs['cztime'].$Rs['lr']."</span></li>");
  }
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">订单管理</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_SJDINDAN.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_SJDINDAN.php')})");
 
 
 
 
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'cpimg',3);}");//图片上传按钮
 $H->aj("function scing(a){scimg($(a),'cpimg',3)}");//图片上传删除
 
 
 
 
 $H->aj("\$(\".form a[dd='F_ly']\").click(function(){at('FY_A_SJDINDANL_X.php?z=F_ly','F_ly','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_lx']\").click(function(){at('FY_A_SJDINDANL_X.php?z=F_lx','F_lx','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_zz']\").click(function(){at('FY_A_SJDINDANL_X.php?z=F_zz','F_zz','150:',$(this))})");
 
 $H->aj("\$(\".form input[name='zc_gj']\").click(function(){if($(this).attr('checked')=='checked'){\$('.form .yc').show()}else{\$('.form .yc').hide()}})");//高级功能
 



 $H->aj("var scplr=editor('#cplr');");
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var lxmc=asz(id,'lxmc');if(!BDYZ_s('lxmc','*','请选状态')){return false;};");
 $H->aj("	var lxid=asz(id,'lxid');");
 $H->aj("	var lxbh=asz(id,'lxbh');");
 $H->aj("$.post('FY_A_SJDINDAN.php?/2.html',{lxmc:lxmc,lxid:lxid,lxbh:lxbh,id:".$Wf."},function(z){gdor('[订单]'+z+'！','ok','FY_A_SJDINDAN.php');});");
 $H->aj("});");
 
 
}elseif($Wz==2){
  ZY();
  $lmc=rp("lxmc");
  $lid=rp("lxid");
  $lbh=rp("lxbh");
  $id=rp("id");
  if($id==0){
    $DB->add('a_sjdindan',array('lid','lbh','lmc','tjdj'),array($lid,$lbh,$lmc,date('Y-m-d H:i:s')));
    die("成功添加！");
	
  }elseif($id>0){
			$DB->upd('a_sjdindan',array('lid','lbh','lmc'),array($lid,$lbh,$lmc),"id=$id"); 
			$DB->add('a_sjdindanjl',array('lr','cztime','lid'),array("admin修改订单为".$lmc,date('Y-m-d H:i:s'),$id));
	die("成功修改！");
  }
  
}elseif($Wz==3){
  $id=CF(rp("id"),",");
  for($i=0;$i<CFZ($id);$i++){
    $DB->del('a_sjdindan',"id=".$id[$i]);
  }
    die("成功删除！");
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_sjdindan','FY_A_SJDINDAN.php');");
 echo $H->x();
?>