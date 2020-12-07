<?php
 include_once("FY_fun.php");
 $H=new FY_html();
 $cplx=array("行业新闻","企业新闻");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
if ($Wz==0){
 $H->ar("<ul class='lb' dl='a,24,50,60,150,50' c='left,center,center,center,center,center' u='FY_a_hzhbl.php' d='0'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>名称</span><span>级别</span><span></span><span></span><span>操作</span></li>");
 function WXL($id,$j,$d){
   global $DB;
   $fz=$DB->Sel("*","a_hzhbl","","id desc","");
   $ar="";
   while($R = mysql_fetch_array($fz))
     {
       //预览|内容|增加子类|更改|移动|删除
       $tf=$DB->Setf("a_hzhbl","");
       $ar.="  <li z='$R[0]'><span>".WXLa($R['bh'],$tf,$j,$d)."<h5>$R[1]</h5><a dd='xg' z='$R[0]' class='s'></a></span><span title='".$R['bh']."'>$j.级</span><span>内容</span>";
	   if($j<$d){
       $ar.="<span dd=''>增加子类</span>";
	   }else{
       $ar.="<span></span>";
	   }
       $ar.="<span><a dd='xg' z='$R[0]'>更改</a><a>移动</a><a dd='sc' z='$R[0]'>删除</a></span><span>$j</span></li>\n";
       $ar.="  <ul style='display:none;'>\n";
	   if($tf&&$j<$d){
         $ar.= WXL($R[0],$j+1,$d);
	   }
	   $ar.="  </ul>\n";
     }
   return $ar;
 }
 function WXLa($a,$b,$j,$d){
   $ar="<b";
   $ar.=" style='margin-left:".((CFZ(CF($a,","))-2)*30)."px;'";
   if($b&&$j<$d){
      $ar.=" class='s'";
   }else{
      $ar.=" class='w'";
   }
   $ar.="></b>";
   return $ar;
 }
 $H->ar(WXL(0,1,3));
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_adv\">产品管理</span><span dd=\"a_hzhbl\">产品类型</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_tj\">添加顶级</a></div>');");
 $H->aj("lbwh();");
 $H->aj("lbho('#Right','h');");
 }elseif($Wz==1){
 	if($Ws>0){$zz=$DB->Sels("id,lmc","a_hzhbl","id=$Ws","","");$z=array($zz[0],$zz[1]);}
 	elseif($Wf>0){$z=$DB->Sels("id,lmc","a_hzhbl","id=$Wf","id desc","");}
 	else{$z=array("","");}
	
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_adv\">产品管理</span><span dd=\"a_hzhbl\">产品类型</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");	
	 
	
 $H->ar("<ul class='form'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp;&nbsp;签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>类型名称</span><input type='text' name='lmc' value='".FF($z[1],0)."' class='i'><b>类型名称</b></li>");
 
 
 $H->ar("</ul>");
 $H->aj("bdwh();");
 $H->aj("\$(\".form a[dd='F_lx']\").click(function(){at('FY_A_HZHBL_X.php?z=F_lx&id=$Wf','F_lx','150:',$(this))})");

 $H->aj("var ss=$('.form b').length;");
 $H->aj("for(i=0;i<=ss;i++){\$('.form b').eq(i).attr('dz',\$('.form b').eq(i).html())}");

 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("   var id=\$('#Right');");
 $H->aj("	var lmc=asz(id,'lmc');if(!BDYZ_s('lm','*','类型名称不能为空！')){return false;};");
 $H->aj("   $.post('FY_a_hzhbl.php?/2.html',{lmc:lmc,id:".$Wf."},function(z){gdor('[ lm ]'+z+'！','ok','FY_a_hzhbl.php');});");
 $H->aj("})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_a_hzhbl.php?/1_".$Wf."_-3.html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_a_hzhbl.php')})");
}elseif($Wz==2){
  ZY();
  $lmc=rp("lmc");
  $id=rp("id");
  if($id==0){
	  
	 $DB->add('a_hzhbl',array('lmc'),array($lmc));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_hzhbl',array('lmc'),array($lmc),"id=$id");
	$DB->upd('a_adv',array('lmc'),array($lmc),"lid=$id");
    die("成功修改！");
  }
  
}elseif($Wz==3){
	
	 $DB->del("a_hzhbl","id=$Ws");
	 ru("FY_a_hzhbl.php");
	}
if($Wf!=-3){$H->aj("jzwc();");}
$H->aj("djrt('a_hzhbl','FY_a_hzhbl.php');");//这是当前位置的连接
$H->aj("djrt('a_adv','FY_A_ADV.php');");//这是当前位置的连接
echo $H->x();

?>