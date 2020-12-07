<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,80,50' c='center,center,left,left,center,center' u='FY_A_PWD.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>类型</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="user";
 $DB->FP($Wf);
 $DB->ft="id,us,pw";
 $DB->flike=F_HT."FY_A_PWD.php?/0_".$Ws."_*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[7]</span><span>名称</span><span></span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>帐户管理</span><span dd=\"a_pwd\">密码管理</span><span>修改密码</span>');");
  $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><div>".$DB->FY()."');");
$H->aj("djrtb('a_pwdt','FY_A_PWD.php?/1.html');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_PWD.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){ 

 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>新密码</span><input type='password' name='pwd' class='i'><b>新密码</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>确认密码</span><input type='password' name='pwd2' class='i'><b>确认密码</b></li>");
 $H->ar("</ul>");
 
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>帐户管理</span><span dd=\"a_pwd\">密码管理</span><span>修改密码</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_PWD.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_PWD.php')})");

 $H->aj("var scplr=editor('#cplr');");
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj("	var pwd=asz(id,'pwd');if(!BDYZ_s('pwd','*','不能为空')){return false;};");
 $H->aj("	var pwd2=asz(id,'pwd2');if(!BDYZ_s('pwd2','*','不能为空')){return false;};");
 $H->aj("if(pwd!=pwd2){alert('密码不同');return false;};");
 $H->aj("$.post('FY_A_PWD.php?/2.html',{pwd:pwd,pwd2:pwd2,id:".$Wf."},function(z){gdor('[ '+pwd+' ]'+z+'！','ok','FY_A_PWD.php');});");
 $H->aj("});");
 
 
}elseif($Wz==2){
  $id=rp("id");
  $pwd=rp("pwd");
  $pwd2=rp("pwd2");
if($id>0||$pwd==$pwd2){
    $DB->upd('user',array('pw'),array(M($pwd)),"id=$id");
    die("成功修改！");
  }
}else{
	die("操作失败！");
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_pwd','FY_A_PWD.php');");
 echo $H->x();
?>