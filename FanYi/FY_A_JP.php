<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,80,50' c='center,center,left,left,center,center' u='FY_A_JP.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>类型</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_jp";
 $DB->fa=8;
 $DB->FP($Wf);
 $DB->ft="id,bt,gjz,img,time";
 $DB->flike=F_HT."FY_A_JP.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span></span><span></span><span>".DAT('Y-m-d',$R[4])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">精品推荐</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a></div>".$DB->FY()."');");

 $H->aj("djrtb('a_lx','FY_A_JPL.php');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_JP.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("id,bt,gjz,img","a_jp","id=$Wf","id desc","");}
 else{$z=array("","","","");}
 
 
 
 $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp; &nbsp; 题</span><input type='text' name='bt' value='".FF($z[1],0)."' class='i'><b>标题</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关 键 字</span><input type='text' name='gjz' value='".FF($z[2],0)."' class='i'><b>用说百度搜索的词语！</b></li>");
 $H->ar("  <li style='display:block' class='yc img' h='115px' dl='60' c='center'><span>图&nbsp; &nbsp; 片</span>");
 $img=CF(FF($z[3],0),",");
 $imgz=CFZ($img)-1;
 for ($imi=1;$imi<=$imgz;$imi++){
   $H->ar("  <b><span><img src='".$img[$imi]."' $imgz></span><input name='img' type='hidden' value='".$img[$imi]."' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)'>删除</a></b>");
 }
 if($imgz<1){
 $H->ar("  <b><span></span><input name='img' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>");
 }
 $H->ar("  </li>");
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">精品推荐</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_JP.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_JP.php')})");
 
 
 
 
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'img',1);}");
 $H->aj("function scing(a){scimg($(a),'img',1)}");
 
 
 
 
 $H->aj("\$(\".form a[dd='F_ly']\").click(function(){at('FY_A_JPL_X.php?z=F_ly','F_ly','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_lx']\").click(function(){at('FY_A_JPL_X.php?z=F_lx','F_lx','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_zz']\").click(function(){at('FY_A_JPL_X.php?z=F_zz','F_zz','150:',$(this))})");
 
 $H->aj("\$(\".form input[name='zc_gj']\").click(function(){if($(this).attr('checked')=='checked'){\$('.form .yc').show()}else{\$('.form .yc').hide()}})");
 



 $H->aj("var scplr=editor('#cplr');");
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var bt=asz(id,'bt');if(!BDYZ_s('bt','*','标题不能为空')){return false;};");
 $H->aj("	var gjz=asz(id,'gjz');if(!BDYZ_s('gjz','*','关键字不能为空')){return false;};");
 $H->aj("	var img=aszf(id,'img');");
 $H->aj("$.post('FY_A_JP.php?/2.html',{bt:bt,gjz:gjz,img:img,id:".$Wf."},function(z){gdor('[ '+bt+' ]'+z+'！','ok','FY_A_JP.php');});");
 $H->aj("});");
 
 
}elseif($Wz==2){
  ZY();
  $bt=rp("bt");
  $gjz=rp("gjz");
  $img=rp("img");
  $id=rp("id");
  if($id==0){
    $DB->add('a_jp',array('bt','gjz','img','time'),array($bt,$gjz,$img,date('Y-m-d H:i:s')));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_jp',array('bt','gjz','img'),array($bt,$gjz,$img),"id=$id");
    die("成功修改！");
  }
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_jp','FY_A_JP.php');");
 echo $H->x();
?>