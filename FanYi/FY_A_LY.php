<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,80,50' c='center,center,left,left,center,center' u='FY_A_LY.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>姓名</span><span>电话</span><span>公司</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_ly";
 $DB->fx="id desc";
 $DB->fa=20;
 $DB->FP($Wf);
 $DB->ft="*";
 $DB->flike=F_HT."FY_A_LY.php?/0_".$Ws."_*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[2]</span><span>".$R['gs']."</span><span>".DAT('Y-m-d',$R['sj'])."</span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">留言管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">查看</a><a dd=\"a_sc\">删除</a></div>".$DB->FY()."');");
$H->aj("djrtb('a_lyt','FY_A_LY.php?/1.html');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_LY.php');");
 $DB->FCZ();
 
}elseif($Wz==1){	
 $z=$DB->Sels("*","a_ly","id=$Wf","id desc","");
  $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form'>");
 $H->ar(" <li dl='60,a,a' c='center,left,left'><span>名称</span><span>".$z['name']."</span></li>");
 $H->ar(" <li dl='60,a,a' c='center,left,left'><span>电话</span><span>".$z['tel']."</span></li>");
 $H->ar(" <li dl='60,a,a' c='center,left,left'><span>邮箱</span><span>".$z['meail']."</span></li>");
 $H->ar(" <li dl='60,a,a' c='center,left,left'><span>公司</span><span>".$z['gs']."</span></li>");
 $H->ar(" <li dl='60,a,a' c='center,left,left'><span>留言</span><span style='height:auto;'>".$z['lr']."</span></li>");
 $H->ar(" <li dl='60,a,a' c='center,left,left'><span>时间</span><span>".$z['sj']."</span></li>");
 $H->ar("</ul>");
  
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">留言管理</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_LY.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_LY.php')})");
}elseif($Wz==3){
  $id=CF(rp("id"),",");
  for($i=0;$i<CFZ($id)-1;$i++){
    $DB->del('a_ly',"id=".$id[$i]);
	}die("成功删除！");
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_ly','FY_A_LY.php');");
 echo $H->x();
?>