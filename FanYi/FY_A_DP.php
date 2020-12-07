<?php
 include_once("FY_fun.php");
 $H=new FY_html();
 $wdlx=array("行业新闻","企业新闻");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,1);
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,80,50' c='center,center,left,left,center,center'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span class='x'></span><span>编号</span><span>标题</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_dpt";
 $DB->fa=10;
 $DB->fp=1;
 $DB->flike=F_HT."FY_A_DP.php?/*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>名称</span><span>".DAT('Y-m-d',$R[6])."</span><span><a>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("lbwh();");
 $H->aj("lbhover();");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">产品管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=".chr(34)."czan".chr(34)."><a>修改</a><a>删除</a><a>全选</a><a>反选</a><a dd=\"a_dpt\">添加</a><select name=><option value=-1>所有列表</option>".ZH("<option value=\'{i}\'{t}>{z}</option>"," selected=\'selected\'",-1,$wdlx)."</select><a dd=\'a_wdl\'>类型</a></div>".$DB->FY()."');");
 $H->aj("djrtb('a_dpt','FY_A_DP.php?/1.html');");
 $H->aj("djrtb('a_wdl','FY_A_WDL.php');");
 
}elseif($Wz==1){
 $ss=array("a_wdl","");
 $zdlx=array("数字","文本","多行文本","单选","复选","列表","关键字id","编辑器","文本日期","文本上传","文本颜色");
 

 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>产品名称</span><input type='text' name='bm' value='' class='i'><b>标题</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>关键字</span><input type='text' name='bm' value='' class='i'><b>用说百度搜索的词语！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描述</span><textarea name='bm' class='t'></textarea><b>建议不要超过200个字符！</b></li>");
 $H->ar("  <li dl='60,50,a' h='50px' c='center,left,left'><span>上转图片</span><b>上传</b><b>上传图片</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>简要</span><textarea name='bm' class='t'></textarea><b>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,a,10' h='200px' c='center,left,left'><span>内容</span><textarea id='lr' name='lr' class='t'></textarea><b></b></li>");
 $H->ar("</ul>");
 

 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">产品管理</span><span>".IIF($Ws<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\">确认保存</a></div>');");
 
 $H->aj("bdwh();");
 $H->aj("editor('#lr')"); 
 
 
 $H->aj("\$('#Right .form .xg').click(function(){");
 $H->aj("var id=\$(this).parent();");
 $H->aj("	var bm=\$('.form').find('[name=\"bm\"]').val();");
 $H->aj("	var a=id.find('[name=\"a\"]').val();");
 $H->aj("	var b=id.find('[name=\"b\"]').val();");
 $H->aj("	var c=id.find('[name=\"c\"]').val();");
 $H->aj("	var d=id.find('[name=\"d\"]').val();");
 $H->aj("	var e=id.find('[name=\"e\"]').val();");
 $H->aj("	var f=id.find('[name=\"f\"]:checked').val();");
 $H->aj("	var g=id.find('[name=\"g\"]').val();");
 $H->aj("	var h=id.find('[name=\"h\"]').val();");
 
 $H->aj("$.post('FY_A_DY.php?/2.html',{bm:bm,a:a,b:b,c:c,d:d,e:e,f:f,g:g,h:h},function(z){});");
 
 $H->aj("});");
 
 
 
 
 $H->aj("KindEditor.create('textarea[name=\"t\"]');");
 
 
 

}elseif($Wz==2){
	$bm=F_DB.rp("bm");
	$a=rp("a");
	$b=rp("b");
	$c=rp("c");
	$d=rp("d");
	$e=rp("e");
	$f=rp("f");
	$g=rp("g");
	$h=rp("h");
	$ds=$bm."{c}".$a."{c}".$b."{c}".$c."{c}".$d."{c}".$e."{c}".$f."{c}".$g."{c}".$h;
	echo $DB->szx($ds)."\n";
	//$ss=$DB->Exe("",true);
}
 
 $H->aj("jzwc();");
 $H->aj("djrt('a_wd','FY_A_DY.php');");
 echo $H->x();
 $DB->FCZ();
?>