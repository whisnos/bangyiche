<?php include_once("FY_fun.php");
 $z=rg("z");
 $id=rg("id");
 $H=new FY_html();
 $H->ar("<div id='Txzlx'>");
 
  function WXL($id,$j,$d){
   global $DB;
   $fz=$DB->Sel("id,lmc","a_hzhbl","","id desc","");
   $ar="";
   while($R = mysql_fetch_array($fz))
     {
       //预览|内容|增加子类|更改|移动|删除
       $tf=$DB->Setf("a_hzhbl","");
       $ar.="<a z1='$R[0]' z2='$R[1]' z3='$R[2]'><span title='$R[2]' style='margin-left:".((CFZ(CF($R[2],","))-2)*20)."px;'>$R[1]</span></a>\n";
	   
     }
   return $ar;
 }
 if($z=="F_lx"){
   //$H->ar($DB->arrayz("<a z1='{z0}' z2='{z1}' z3='{z2}'><b>{z0}</b><span>{z1}</span></a>","id,lm,bh","a_hzhbl","","","","",""));
   $H->ar("<a z1='0' z2='' z3='0'><span title='0'>顶级 (系统默认存在)</span></a>\n");
   $H->ar(WXL(0,1,2));
 }elseif($z=="F_ly"){
   $arra=array('原创','本站','站外');
   $H->ar(ZH("<a z1='{z}'><b>{i}</b><span>{z}</span></a>","",0,$arra));
 }elseif($z=="F_zz"){
   $arra=array('本站作者','站外');
   $H->ar(ZH("<a z1='{z}'><b>{i}</b><span>{z}</span></a>","",0,$arra));
 }
 
 
 $H->ar("</div>");
 
 $H->aj("\$(function(){");
 $H->aj("\$('#Txzlx a').click(function(){");
 if($z=="F_lx"){
   $H->aj("	\$('#Right .form input[name=\"lxmc\"]').val(\$(this).attr('z2'));");
   $H->aj("	\$('#Right .form input[name=\"lxid\"]').val(\$(this).attr('z1'));");
   $H->aj("	\$('#Right .form input[name=\"lxbh\"]').val(\$(this).attr('z3'));");
   $H->aj("	atc('F_lx');");
 }elseif($z=="F_ly"){
   $H->aj("	\$('#Right .form input[name=\"cply\"]').val(\$(this).attr('z1'));");
   $H->aj("	atc('F_ly');");
 }elseif($z=="F_zz"){
   $H->aj("	\$('#Right .form input[name=\"cpzz\"]').val(\$(this).attr('z1'));");
   $H->aj("	atc('F_zz');");
 }
 $H->aj("})");
 $H->aj("})");
 echo $H->x();
?>