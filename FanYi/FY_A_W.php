<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,1);
 $f1=$DB->Sel("type","a_wl","","id desc","");
$wdlx=array();
while($R = mysql_fetch_array($f1))
  {	  
	   array_push($wdlx,$R[0]);
	} 
 
if ($Wz==0){ 
 


 $H->ar("<ul class='lb' dl='24,50,a,80,50' c='center,center,left,left,center,center' u='FY_A_W.php'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_w";
 $DB->fa=10;
 $DB->fp=$Wf;
 $DB->flike=F_HT."FY_A_W.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {

 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>".DAT('Y-m-d',$R[6])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
 
  } 

 
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_w\">作品管理</span><span>列表</span>');"); 
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><select name=><option value=-1>所有列表</option>".ZH("<option value=\'{i}\'{t}>{z}</option>"," selected=\'selected\'",-1,$wdlx)."</select><a dd=\'a_wl\'>类型</a></div>".$DB->FY()."');");
 $H->aj("djrtb('a_wl','FY_a_WL.php');");
 $H->aj("lbwh();");
 $H->aj("lbhover('#web .czan','#Right','FY_A_W.php');");
 
 }elseif($Wz==1){
 if($Ws>0){$z=$DB->Sels("writer,type,ke,pic,intro","a_w","id=$Ws","id desc","");}
 else{$z=array("","","","","","");}

 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_w\">作品管理</span><span>".IIF($Ws<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\">确认".IIF($Ws<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
	
	 
	
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp;&nbsp;签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>作&nbsp;&nbsp;者</span><input type='text' name='bm' value='".FF($z[0],0)."' class='i'><b>产品名称</b></li>");
 if($z[1]){
	   $H->ar(" <li dl='60,a,a' c='center,left,left'><span>类型</span><select name='type'><option value=-1>".$z[1]."</option>".ZH("<option value=\{i}\{t}>{z}</option>"," selected=\'selected\'",-1,$wdlx)."</select><b>类型！</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关键字</span><input type='text' name='ke' value='".FF($z[2],0)."' class='i'><b>用说百度搜索的词语！</b></li>");
	 }else{
	$H->ar(" <li dl='60,a,a' c='center,left,left'><span>类型</span><select name='type'><option value=-1>所有列表</option>".ZH("<option value=\'{i}\'{t}>{z}</option>"," selected=\'selected\'",-1,$wdlx)."</select><b>类型！</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关键字</span><input type='text' name='ke' value='".FF($z[2],0)."' class='i'><b>用说百度搜索的词语！</b></li>");	 
		 }
  
 
 $H->ar("  <li class='img' h='115px' dl='60' c='center'><span>图&nbsp;&nbsp;片</span>");
 
 $img=substr(FF($z[3],0),1);
 $img=substr($img,0,-1);
 $img=explode(",",$img);
 for($i=0;$i<count($img);$i++){
	 
	 $H->ar("  <b><span><img src='".$img[$i]."'/></span><input name='pic' type='hidden' value='".$img[$i]."' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)'>删除</a></b>");
	}

 $H->ar("  </li>");

 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'pic',4);}");//图片上传按钮   (文本框name,按钮的id,自动创建文本框的name名称,最多可以上传个数)
 $H->aj("function scing(a){scimg($(a),'pic',4)}");//图片上传删除
 

 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>简&nbsp;&nbsp;要</span><textarea name='intro' class='t'>".FF($z[4],0)."</textarea><b>简要说明及概述！</b></li>");
 

 
 
 $H->ar("</ul>");
 $H->aj("bdwh();");
 $H->aj("var edit=editor('#lr');");		
 
 $H->aj("var ss=$('.form b').length;");
 $H->aj("for(i=0;i<=ss;i++){\$('.form b').eq(i).attr('dz',\$('.form b').eq(i).html())}");
 

 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var bm=asz(id,'bm');if(!BDYZ_s('bm','*','产品名称不能为空')){return false;};");
 $H->aj("	var ke=asz(id,'ke');if(!BDYZ_s('ke','*','关键字不能为空')){return false;};");
 $H->aj("	var type=astf(id,'type');");
 $H->aj("	var intro=ast(id,'intro');if(!BDYZ_s('intro','*','简要不能为空')){return false;};");
 $H->aj("	var pic=aszf(id,'pic');");
 
 $H->aj("if(\$('.img b').html()==\$('.img b').attr('dz')){pic=','+\$(\"[name='pic']\").val()+',';}else{}");
 
 $H->aj("   $.post('FY_A_W.php?/2.html',{bm:bm,ke:ke,type:type,intro:intro,pic:pic,id:".$Ws."},function(z){gdor('[ bm ]'+z+'！','ok','FY_A_W.php');});");
 $H->aj("})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_W.php?/1_".$Ws."_-3.html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_W.php')})");
 
 
 
 
}elseif($Wz==2){
	 
  ZY();
  $bm=rp("bm");
  $ke=rp("ke");
  $type=rp("type");
  $intro=rp("intro");
  $pic=rp("pic");
  $id=rp("id");
  if($id==0){
    $DB->add('a_w',array('writer','type','ke','pic','intro','time'),array($bm,$type,$ke,$pic,$intro,date('Y-m-d H:i:s')));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_w',array('writer','type','ke','pic','intro','time'),array($bm,$type,$ke,$pic,$intro,date('Y-m-d H:i:s')),"id=$id");
    die("成功修改！");
  }

 }

if($Wf!=-3){$H->aj("jzwc();");}
$H->aj("djrt('a_w','FY_A_W.php');");//这是当前位置的连接
echo $H->x();
?>