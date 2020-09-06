<?php
 include_once("FY_fun.php");
 ZYs();
 $H=new FY_html();
 $cplx=CF($DB->arrayz("{z0}||","lm","a_cpl","","","","",""),"||");
 $Wz=R(0,0);
 $Ws=R(1,0);
 $Wf=R(2,0);
 
 
 
if ($Wz==0){
 $H->ar("<ul class='lb' dl='24,50,a,a,a,80,50' c='center,center,left,left,center,center' u='FY_A_CP.php' d='$Ws'><li class='dhy'></li>");
 $H->ar("  <li class='dh'><span>选择</span><span>编号</span><span>标题</span><span>类型</span><span>属性</span><span>时间</span><span>操作</span></li>");
 $DB->FCZ();
 $DB->fb="a_cp";
 $DB->fx="id desc";
 $DB->fa=20;
 $DB->FP($Wf);
 if ($Ws>0){
   $dlid=$DB->Sels("id,bh","a_cpl","id=$Ws","id desc","");
   $DB->FZW("lbh like'$dlid[1]%'");
 }
 $DB->ft="id,bt,sxz,sxf,sxt,tjdj,lbh,lmc";
 $DB->flike=F_HT."FY_A_CP.php?/0_".$Ws."_*.html";
 $fz=$DB->FZ();
 while($R = mysql_fetch_array($fz))
  {
 $H->ar("  <li z='$R[0]'><span class='x'></span><span>$R[0]</span><span>$R[1]</span><span>$R[7]</span><span>名称</span><span>".DAT('Y-m-d',$R[5])."</span><span><a dd='xg' z='$R[0]'>修改</a></span></li>");
  }
 $H->ar("</ul>");
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">产品管理</span><span>列表</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"g_qx\">全选</a><a dd=\"g_fx\">反选</a><a dd=\"a_xg\">修改</a><a dd=\"a_sc\">删除</a><a dd=\"a_tj\">添加</a><select dd=\"a_lb\"><option value=\"FY_A_CP.php\">所有列表</option>".$DB->arrayz("<option value=\"FY_A_CP.php?/0_{z0}.html\" {t}>{bq}├{z1}</option>","id,lm,bh","a_cpl","","","",'selected="selected"',$Ws)."</select><a dd=\'a_lx\'>类型</a></div>".$DB->FY()."');");
 $H->aj("djrtb('a_lx','FY_A_CPL.php');");
 $H->aj("lbwh();");
 $H->aj("XTZ($(\".rt .czan select[dd='a_lb']\"),'#Right');");
 $H->aj("lbhover('#web .czan','#Right','FY_A_CP.php');");
 $DB->FCZ();
 
 
 
}elseif($Wz==1){
	
 if($Wf>0){$z=$DB->Sels("*","a_cp","id=$Wf","id desc","");}
 else{$z=array("","",1,"","","","","","","","","","","","");}
 
 $clb=$DB->Sel("id","a_cpl","lid=2","id desc","");
while($csc=SZ($clb)){
 	$clbx=$DB->Sel("lm","a_cpl","lid=".$csc['id'],"id desc","");
 	while($chexi=SZ($clbx)){
 		$chexitx .= '<a onclick="bsxuanze(this);"><span style="margin-left:0">'.$chexi['lm'].'</span></a>';
 	}
}
 
 $zs=$DB->Sel("lm","a_cpl","lid=7","id desc","");while($zsx=SZ($zs)){$zstx .= '<a onclick="xuanze(this);"><span style="margin-left:0">'.$zsx['lm'].'</span></a>';}
 $pp=$DB->Sel("lm","a_cpl","lid=2","id desc","");while($ppx=SZ($pp)){$pptx .= '<a onclick="ppxuanze(this);"><span style="margin-left:0">'.$ppx['lm'].'</span></a>';}
 $dq=$DB->Sel("lm","a_cpl","lid=5","id desc","");while($dqx=SZ($dq)){$dqtx .= '<a onclick="dqxuanze(this);"><span style="margin-left:0">'.$dqx['lm'].'</span></a>';}
 $pf=$DB->Sel("lm","a_cpl","lid=6","id desc","");while($pfx=SZ($pf)){$pftx .= '<a onclick="pfxuanze(this);"><span style="margin-left:0">'.$pfx['lm'].'</span></a>';}
 $bs=$DB->Sel("lm","a_cpl","lid=1","id desc","");while($bsx=SZ($bs)){$bstx .= '<a onclick="jbxuanze(this);"><span style="margin-left:0">'.$bsx['lm'].'</span></a>';}
 // $cx=$DB->Sel("lm","a_cpl","lid=38","id desc","");while($bsx=SZ($cx)){$chexitx .= '<a onclick="bsxuanze(this);"><span style="margin-left:0">'.$bsx['lm'].'</span></a>';}
 $sx=array("支持分期","是否在售","是否推荐");
 $img="<b><img src='/FYUP/image/image/20140123/20140123071948_30527.jpg'></b>";
 $H->ar("<ul class='form' style='position:relative;'>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标签</span><span>填写</span><b>提示</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>标&nbsp; &nbsp; 题</span><input type='text' name='cpbt' value='".FF($z['bt'],0)."' class='i'><b>标题</b></li>");
 $H->ar("  <li dl='60,100,100,100,a' c='center,left,left'><span>属&nbsp; &nbsp; 性</span>");
 $H->ar("  <label><input type='checkbox' name='cpsx0' id='cpsx0' value='1'".IFT($z['sxz']," checked").">里程少</label>");
 $H->ar("  <label><input type='checkbox' name='cpsx1' id='cpsx1' value='1'".IFT($z['sxf']," checked").">是否保修</label>");
 $H->ar("  <label><input type='checkbox' name='cpsx2' id='cpsx2' value='1'".IFT($z['sxt']," checked").">是否推荐</label>");
 $H->ar("  <b style='color:red;'>简要说明及概述！</b></li>");
 $H->ar("  <li dl='60,200,60,a' c='center,left,center,left'><span>品&nbsp;&nbsp;&nbsp;&nbsp;牌</span><input type='text' id='pinpai' name='pinpai' value='".FF($z['pp'],0)."' class='i' readonly><a dd='F_lx1' onclick='ppxianshi()'>选择</a><b style='color:red;'>当前车辆所属品牌</b></li>");
 

 $H->ar("  <li dl='60,200,60,a' c='center,left,center,left'><span>类&nbsp;&nbsp;&nbsp;&nbsp;别</span><input type='text' id='paifang' name='paifang' value='".FF($z['pf'],0)."' class='i' readonly><a dd='F_lx1' onclick='xianshi()'>选择</a><b style='color:red;'>当前车辆所属排类别</b></li>");
 $H->ar("  <li dl='60,200,60,a' c='center,left,center,left'><span>排&nbsp;&nbsp;&nbsp;&nbsp;放</span><input type='text' id='paifangliang' name='paifangliang' value='".FF($z['paifangliang'],0)."' class='i' readonly><a dd='F_lx1' onclick='pfxianshi()'>选择</a><b style='color:red;'>当前车辆所属排类别</b></li>");
 $H->ar("  <li dl='60,200,60,a' c='center,left,center,left'><span>车&nbsp;&nbsp;&nbsp;&nbsp;系</span><input type='text' id='chexi' name='chexi' value='".FF($z['chexi'],0)."' class='i' readonly><a dd='F_lx1' onclick='chexixianshi()'>选择</a><b style='color:red;'>当前车辆所属排类别</b></li>");
 

 $H->ar("  <li dl='60,200,60,a' c='center,left,center,left'><span>访&nbsp;问&nbsp;量</span><input type='text' value='".FF($z['click'],0)."' class='i' readonly><b style='color:#999;'>该车访问量</b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>表显里程</span><input type='text' id='licheng' name='licheng' value='".FF($z['lc'],0)."' class='i'><b style='color:red;'>当前车辆的表显里程<strong>（单位：万公里）</strong></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>车&nbsp;&nbsp;&nbsp;龄</span><input type='text' id='cheling' name='cheling' value='".FF($z['zz'],0)."' class='i'><b style='color:red;'>当前车辆的车龄<strong>（单位：年）</strong></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>价&nbsp;&nbsp;&nbsp;格</span><input type='text' id='yls' name='yls' value='".FF($z['yls'],0)."' class='i yls'><b style='color:red;'>当前车辆的价格<strong>（单位：万）</strong></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>服&nbsp;务&nbsp;费</span><input type='text' id='fuwufei' name='fuwufei' value='".FF($z['fuwufei'],0)."' class='i'><b style='color:red;'>服务费<strong>（ 多项用%~~隔开 ）</strong></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>服&nbsp;务&nbsp;项</span><input type='text' id='fuwuxiang' name='fuwuxiang' value='".FF($z['fuwuxiang'],0)."' class='i'><b style='color:red;'>服务项<strong>（ 多项用%~~隔开 ）</strong></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>车主基本信息</span><input type='text' id='chezhuxinxi' name='chezhuxinxi' value='".FF($z['chezhuxinxi'],0)."' class='i'><b style='color:red;'>车主基本信息<strong>（ 多项用%~~隔开 ）</strong></b></li>");
 $H->ar("  <li dl='60,a,a' c='center,left,left'><span>电&nbsp;话</span><input type='text' id='yewudianhua' name='yewudianhua' value='".FF($z['yewudianhua'],0)."' class='i'><b style='color:red;'>业务员电话<strong>（ 多项用%~~隔开 ）</strong></b></li>");
 $H->ar(" <li dl='80,200,a' c='center,left,left'><span>上牌时间</span><input placeholder='默认为当前时间'  value='".$z['sp']."'name='shangpai' id='shangpai' class='laydate-icon' onClick=\"laydate({istime: true, format: 'YYYY-MM-DD'})\"><b style='color:red;'>上牌时间！</b></li>");
 $H->ar(" <li dl='80,200,a' c='center,left,left'><span>发布时间</span><input placeholder='默认为当前时间'  value='".$z['tjdj']."'name='tjdj' class='laydate-icon' onClick=\"laydate({istime: true, format: 'YYYY-MM-DD'})\"><b style='color:red;'>发布时间！</b></li>");
 $H->ar("  <li dl='60,a,a' h='50px' c='center,left,left'><span>描&nbsp; &nbsp; 述</span><textarea name='cpms' class='t' style='resize:none;'>".FF($z['ms'],0)."</textarea><b>建议不要超过200个字符！</b></li>");
 $H->ar("  <li class='img' h='auto' dl='60' c='center'><span>图&nbsp; &nbsp; 片</span>");
 $img=CF(FF($z['img'],0),",");
 $imgz=CFZ($img)-1;
 for ($imi=1;$imi<=$imgz;$imi++){
   $H->ar("  <b><span><img src='".$img[$imi]."' $imgz></span><input name='cpimg' type='hidden' value='".$img[$imi]."' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)'>删除</a></b>");
 }
 if($imgz<16){
 $H->ar("  <b><span></span><input name='cpimg' type='hidden' value='' /><a onclick='uping(this)'>上传</a><a onclick='scing(this)' style='display:none'>删除</a></b>");
 }
 $H->aj("function uping2(a){upimg2(a,$(a),'cpimg',16);}");//图片上传按钮
 $H->aj("function uping(a){upimg($(a).prev('input'),$(a),'cpimg',16);}");//图片上传按钮
 $H->aj("function scing(a){scimg($(a),'cpimg',16)}");//图片上传删除

 $H->ar("  </li>");
 // $H->ar("  <li dl='60,a,10' h='600px' c='center,left,left'><span>内&nbsp; &nbsp; 容</span><textarea id='cplr' name='cplr' class='t'>".FF($z['lr'],0)."</textarea><b></b></li>");
 $H->ar('<div style="left:463px;top:100px;visibility:visible;position:fixed;width:156px;z-index:2007;display:none" id="tanchuang1" class=""><div style="width:100%;height:100%;background: #fff;filter: alpha(opacity=50);opacity: 0.5;position:fixed;top:0;left:0;z-index: -1;"></div><table class="ui_border ui_state_visible ui_state_lock ui_state_focus"><tbody><tr><td class="ui_lt"></td><td class="ui_t"></td><td class="ui_rt"></td></tr><tr><td class="ui_l"></td><td class="ui_c"><div class="ui_inner"><table class="ui_dialog"><tbody><tr><td colspan="2"><div class="ui_title_bar"><div class="ui_title" unselectable="on" style="cursor:move">视窗</div><div class="ui_title_buttons"><a class="ui_min" href="javascript:void(0);" title="最小化" style="display:none"><b class="ui_min_b"></b></a><a class="ui_max" href="javascript:void(0);" title="最大化" style="display:none"><b class="ui_max_b"></b></a><a class="ui_res" href="javascript:void(0);" title="还原"><b class="ui_res_b"></b><b class="ui_res_t"></b></a><a class="ui_close" onclick="yincang();" title="关闭" style="display:inline-block">×</a></div></div></td></tr><tr><td class="ui_icon" style="display:none"></td><td class="ui_main" style="width:150px;height:auto"><div class="ui_content" style="padding:10px"><div id="Txzlx">'.$zstx.'</div></div></td></tr><tr><td colspan="2"><div class="ui_buttons" style="display:none"></div></td></tr></tbody></table></div></td><td class="ui_r"></td></tr><tr><td class="ui_lb"></td><td class="ui_b"></td><td class="ui_rb" style="cursor:auto"></td></tr></tbody></table></div>');
 $H->ar('<div style="left:463px;top:100px;visibility:visible;position:fixed;width:156px;z-index:2007;display:none" id="tanchuang2" class=""><div style="width:100%;height:100%;background: #fff;filter: alpha(opacity=50);opacity: 0.5;position:fixed;top:0;left:0;z-index: -1;"></div><table class="ui_border ui_state_visible ui_state_lock ui_state_focus"><tbody><tr><td class="ui_lt"></td><td class="ui_t"></td><td class="ui_rt"></td></tr><tr><td class="ui_l"></td><td class="ui_c"><div class="ui_inner"><table class="ui_dialog"><tbody><tr><td colspan="2"><div class="ui_title_bar"><div class="ui_title" unselectable="on" style="cursor:move">视窗</div><div class="ui_title_buttons"><a class="ui_min" href="javascript:void(0);" title="最小化" style="display:none"><b class="ui_min_b"></b></a><a class="ui_max" href="javascript:void(0);" title="最大化" style="display:none"><b class="ui_max_b"></b></a><a class="ui_res" href="javascript:void(0);" title="还原"><b class="ui_res_b"></b><b class="ui_res_t"></b></a><a class="ui_close" onclick="ppyincang();" title="关闭" style="display:inline-block">×</a></div></div></td></tr><tr><td class="ui_icon" style="display:none"></td><td class="ui_main" style="width:150px;height:auto"><div class="ui_content" style="padding:10px"><div id="Txzlx">'.$pptx.'</div></div></td></tr><tr><td colspan="2"><div class="ui_buttons" style="display:none"></div></td></tr></tbody></table></div></td><td class="ui_r"></td></tr><tr><td class="ui_lb"></td><td class="ui_b"></td><td class="ui_rb" style="cursor:auto"></td></tr></tbody></table></div>');
 $H->ar('<div style="left:463px;top:100px;visibility:visible;position:fixed;width:156px;z-index:2007;display:none" id="tanchuang3" class=""><div style="width:100%;height:100%;background: #fff;filter: alpha(opacity=50);opacity: 0.5;position:fixed;top:0;left:0;z-index: -1;"></div><table class="ui_border ui_state_visible ui_state_lock ui_state_focus"><tbody><tr><td class="ui_lt"></td><td class="ui_t"></td><td class="ui_rt"></td></tr><tr><td class="ui_l"></td><td class="ui_c"><div class="ui_inner"><table class="ui_dialog"><tbody><tr><td colspan="2"><div class="ui_title_bar"><div class="ui_title" unselectable="on" style="cursor:move">视窗</div><div class="ui_title_buttons"><a class="ui_min" href="javascript:void(0);" title="最小化" style="display:none"><b class="ui_min_b"></b></a><a class="ui_max" href="javascript:void(0);" title="最大化" style="display:none"><b class="ui_max_b"></b></a><a class="ui_res" href="javascript:void(0);" title="还原"><b class="ui_res_b"></b><b class="ui_res_t"></b></a><a class="ui_close" onclick="dqyincang();" title="关闭" style="display:inline-block">×</a></div></div></td></tr><tr><td class="ui_icon" style="display:none"></td><td class="ui_main" style="width:150px;height:auto"><div class="ui_content" style="padding:10px"><div id="Txzlx">'.$dqtx.'</div></div></td></tr><tr><td colspan="2"><div class="ui_buttons" style="display:none"></div></td></tr></tbody></table></div></td><td class="ui_r"></td></tr><tr><td class="ui_lb"></td><td class="ui_b"></td><td class="ui_rb" style="cursor:auto"></td></tr></tbody></table></div>');
 $H->ar('<div style="left:463px;top:100px;visibility:visible;position:fixed;width:156px;z-index:2007;display:none" id="tanchuang4" class=""><div style="width:100%;height:100%;background: #fff;filter: alpha(opacity=50);opacity: 0.5;position:fixed;top:0;left:0;z-index: -1;"></div><table class="ui_border ui_state_visible ui_state_lock ui_state_focus"><tbody><tr><td class="ui_lt"></td><td class="ui_t"></td><td class="ui_rt"></td></tr><tr><td class="ui_l"></td><td class="ui_c"><div class="ui_inner"><table class="ui_dialog"><tbody><tr><td colspan="2"><div class="ui_title_bar"><div class="ui_title" unselectable="on" style="cursor:move">视窗</div><div class="ui_title_buttons"><a class="ui_min" href="javascript:void(0);" title="最小化" style="display:none"><b class="ui_min_b"></b></a><a class="ui_max" href="javascript:void(0);" title="最大化" style="display:none"><b class="ui_max_b"></b></a><a class="ui_res" href="javascript:void(0);" title="还原"><b class="ui_res_b"></b><b class="ui_res_t"></b></a><a class="ui_close" onclick="pfyincang();" title="关闭" style="display:inline-block">×</a></div></div></td></tr><tr><td class="ui_icon" style="display:none"></td><td class="ui_main" style="width:150px;height:auto"><div class="ui_content" style="padding:10px"><div id="Txzlx">'.$pftx.'</div></div></td></tr><tr><td colspan="2"><div class="ui_buttons" style="display:none"></div></td></tr></tbody></table></div></td><td class="ui_r"></td></tr><tr><td class="ui_lb"></td><td class="ui_b"></td><td class="ui_rb" style="cursor:auto"></td></tr></tbody></table></div>');
 $H->ar('<div style="left:463px;top:100px;visibility:visible;position:fixed;width:156px;z-index:2007;display:none" id="tanchuang6" class=""><div style="width:100%;height:100%;background: #fff;filter: alpha(opacity=50);opacity: 0.5;position:fixed;top:0;left:0;z-index: -1;"></div><table class="ui_border ui_state_visible ui_state_lock ui_state_focus"><tbody><tr><td class="ui_lt"></td><td class="ui_t"></td><td class="ui_rt"></td></tr><tr><td class="ui_l"></td><td class="ui_c"><div class="ui_inner"><table class="ui_dialog"><tbody><tr><td colspan="2"><div class="ui_title_bar"><div class="ui_title" unselectable="on" style="cursor:move">视窗</div><div class="ui_title_buttons"><a class="ui_min" href="javascript:void(0);" title="最小化" style="display:none"><b class="ui_min_b"></b></a><a class="ui_max" href="javascript:void(0);" title="最大化" style="display:none"><b class="ui_max_b"></b></a><a class="ui_res" href="javascript:void(0);" title="还原"><b class="ui_res_b"></b><b class="ui_res_t"></b></a><a class="ui_close" onclick="jbyincang();" title="关闭" style="display:inline-block">×</a></div></div></td></tr><tr><td class="ui_icon" style="display:none"></td><td class="ui_main" style="width:150px;height:auto"><div class="ui_content" style="padding:10px"><div id="Txzlx">'.$bstx.'</div></div></td></tr><tr><td colspan="2"><div class="ui_buttons" style="display:none"></div></td></tr></tbody></table></div></td><td class="ui_r"></td></tr><tr><td class="ui_lb"></td><td class="ui_b"></td><td class="ui_rb" style="cursor:auto"></td></tr></tbody></table></div>');
 // $H->ar('<div style="left:463px;top:100px;visibility:visible;position:fixed;width:156px;z-index:2007;display:none" id="tanchuang5" class=""><div style="width:100%;height:100%;background: #fff;filter: alpha(opacity=50);opacity: 0.5;position:fixed;top:0;left:0;z-index: -1;"></div><table class="ui_border ui_state_visible ui_state_lock ui_state_focus"><tbody><tr><td class="ui_lt"></td><td class="ui_t"></td><td class="ui_rt"></td></tr><tr><td class="ui_l"></td><td class="ui_c"><div class="ui_inner"><table class="ui_dialog"><tbody><tr><td colspan="2"><div class="ui_title_bar"><div class="ui_title" unselectable="on" style="cursor:move">视窗</div><div class="ui_title_buttons"><a class="ui_min" href="javascript:void(0);" title="最小化" style="display:none"><b class="ui_min_b"></b></a><a class="ui_max" href="javascript:void(0);" title="最大化" style="display:none"><b class="ui_max_b"></b></a><a class="ui_res" href="javascript:void(0);" title="还原"><b class="ui_res_b"></b><b class="ui_res_t"></b></a><a class="ui_close" onclick="bsyincang();" title="关闭" style="display:inline-block">×</a></div></div></td></tr><tr><td class="ui_icon" style="display:none"></td><td class="ui_main" style="width:150px;height:auto"><div class="ui_content" style="padding:10px"><div id="Txzlx">'.$bstx.'</div></div></td></tr><tr><td colspan="2"><div class="ui_buttons" style="display:none"></div></td></tr></tbody></table></div></td><td class="ui_r"></td></tr><tr><td class="ui_lb"></td><td class="ui_b"></td><td class="ui_rb" style="cursor:auto"></td></tr></tbody></table></div>');
 $H->ar('<div style="left:463px;top:100px;visibility:visible;position:fixed;width:156px;z-index:2007;display:none" id="tanchuang7" class=""><div style="width:100%;height:100%;background: #fff;filter: alpha(opacity=50);opacity: 0.5;position:fixed;top:0;left:0;z-index: -1;"></div><table class="ui_border ui_state_visible ui_state_lock ui_state_focus"><tbody><tr><td class="ui_lt"></td><td class="ui_t"></td><td class="ui_rt"></td></tr><tr><td class="ui_l"></td><td class="ui_c"><div class="ui_inner"><table class="ui_dialog"><tbody><tr><td colspan="2"><div class="ui_title_bar"><div class="ui_title" unselectable="on" style="cursor:move">视窗</div><div class="ui_title_buttons"><a class="ui_min" href="javascript:void(0);" title="最小化" style="display:none"><b class="ui_min_b"></b></a><a class="ui_max" href="javascript:void(0);" title="最大化" style="display:none"><b class="ui_max_b"></b></a><a class="ui_res" href="javascript:void(0);" title="还原"><b class="ui_res_b"></b><b class="ui_res_t"></b></a><a class="ui_close" onclick="bsyincang();" title="关闭" style="display:inline-block">×</a></div></div></td></tr><tr><td class="ui_icon" style="display:none"></td><td class="ui_main" style="width:150px;height:auto"><div class="ui_content" style="padding:10px"><div id="Txzlx">'.$chexitx.'</div></div></td></tr><tr><td colspan="2"><div class="ui_buttons" style="display:none"></div></td></tr></tbody></table></div></td><td class="ui_r"></td></tr><tr><td class="ui_lb"></td><td class="ui_b"></td><td class="ui_rb" style="cursor:auto"></td></tr></tbody></table></div>');
$H->ar("</ul>");
if(FF($z['lr'],0)==''){
$H->ar('
		<div class="neirong left">
			<div class="danxiang left">
				<table>
					<tr>
						<td>大小：</td>
						<td>
							<select class="daxiao">
								<option value="bigimg">大图模式</option>
								<option value="smimg">小图模式</option>
							</select>
						</td>
						<td rowspan="5"><img src="/img/defaultimg.jpg" alt="上传图片" title="上传图片" class="tuimg" onclick="uping2(this)" width="130" /></td>
						<td rowspan="6" class="jiajian">
							<div class="jianyige" onclick="jianyige(this)"></div>
							<div class="jiayige" onclick="jiayige(this)"></div>
						</td>
					</tr>
					<tr>
						<td>位置：</td>
						<td><input type="text" value="" class="input_4 weizhi" placeholder="必填" /></td>
					</tr>
					<tr>
						<td>描述：</td>
						<td><input type="text" value="" class="input_4 miaoshu" placeholder="必填" /></td>
					</tr>
					<tr>
						<td>车主：</td>
						<td><input type="text" value="" class="input_4 chezhu" /></td>
					</tr>
					<tr>
						<td>地址：</td>
						<td><input type="text" value="" class="input_4 dizhi" /></td>
					</tr>
					<tr>
						<td>个人寄语：</td>
						<td colspan="2"><textarea type="text" value="" class="input_5 jiyu"></textarea></td>
					</tr>
				</table>
			</div>
			
		</div>
	');
}else{
	$H->ar('<div class="neirong left">');
	$arr=CF(FF($z['lr'],0),'%~~');
	$lens=count($arr);
	for($i=1;$i<$lens;$i++){
		$arrx=json_decode($arr[$i],ture);
		$arrs[]=$arrx;
		$H->ar('
			<div class="danxiang left">
				<table>
					<tr>
						<td>大小：</td>
						<td>
							<select class="daxiao">
								<option value="bigimg" '.IFT($arrs[$i-1]['daxiao']=='bigimg','selected="selected"').'>大图模式</option>
								<option value="smimg" '.IFT($arrs[$i-1]['daxiao']=='smimg','selected="selected"').'>小图模式</option>
							</select>
						</td>
						<td rowspan="5"><img src="'.$arrs[$i-1]['tuimg'].'" alt="上传图片" title="上传图片" class="tuimg" onclick="uping2(this)" width="130" /></td>
						<td rowspan="6" class="jiajian">
							<div class="jianyige" onclick="jianyige(this)"></div>
							'.IFT($i==$lens-1,'<div class="jiayige" onclick="jiayige(this)"></div>').'
						</td>
					</tr>
					<tr>
						<td>位置：</td>
						<td><input type="text" value="'.$arrs[$i-1]['weizhi'].'" class="input_4 weizhi" placeholder="必填" /></td>
					</tr>
					<tr>
						<td>描述：</td>
						<td><input type="text" value="'.$arrs[$i-1]['miaoshu'].'" class="input_4 miaoshu" placeholder="必填" /></td>
					</tr>
					<tr>
						<td>车主：</td>
						<td><input type="text" value="'.$arrs[$i-1]['chezhu'].'" class="input_4 chezhu" /></td>
					</tr>
					<tr>
						<td>地址：</td>
						<td><input type="text" value="'.$arrs[$i-1]['dizhi'].'" class="input_4 dizhi" /></td>
					</tr>
					<tr>
						<td>个人寄语：</td>
						<td colspan="2"><textarea type="text" class="input_5 jiyu">'.$arrs[$i-1]['jiyu'].'</textarea></td>
					</tr>
				</table>
			</div>
			
	');
	}
	$H->ar('</div>');
}
$war=CF(FF($z['waiguanxiang'],0),'|');
$wlen=count($war);
if($wlen==1){
	$str.='<li><span>1</span><input value="" placeholder="外挂检测" class="input_3 input" maxlength="30" /></li>';
}else{
	for($n=1;$n<$wlen;$n++){
		$str.='<li><span>'.$n.'</span><input value="'.IIF($war[$n],$war[$n],'').'" placeholder="外挂检测" class="input_3 input" maxlength="30" /></li>';
	}
}
$H->ar('<div class="container detail-report-card clear" style="clear:left;">
        <div class="content" style="width: 100%;margin: 0 auto;">
            <h2>帮易车检测报告</h2>
            <p class="row-fluid">
                <span class="span4 offset6">检测时间：<input value="'.IIF(FF($z['jiance'],0),FF($z['jiance'],0),date('Y-m-d')).'" class="input_0 jiance" maxlength="30"/></span>
                <span class="span4">评测师：<input value="'.IIF(FF($z['pingceshi'],0),FF($z['pingceshi'],0),'').'" class="input_0 pingceshi" maxlength="30"/></span>
                <span class="span4">车源号：<input value="'.IIF(FF($z['cheyuanhao'],0),FF($z['cheyuanhao'],0),'').'" class="input_0 cheyuanhao" maxlength="30"/></span>
                <span class="span4">节省价：<input value="'.IIF(FF($z['jieshengjia'],0),FF($z['jieshengjia'],0),'').'" class="input_0 jieshengjia" maxlength="30"/></span>
                <span class="span4">车税：<input value="'.IIF(FF($z['cheshui'],0),FF($z['cheshui'],0),'').'" class="input_0 cheshui" style="width:150px;" maxlength="30"/></span>
            </p>

            <div class="row card-table">
                <div class="span23 offset1">
                    <table style="width: 100%;">
                        <tbody><tr>
                            <td class="span2 td_1 bg-gray">车身颜色</td>
                            <td class="span3"><input value="'.IIF(FF($z['yanse'],0),FF($z['yanse'],0),'').'" class="input_1 yanse" maxlength="30"/></td>
                            <td class="span2 td_1 bg-gray">年检到期时间</td>
                            <td class="span3"><input value="'.IIF(FF($z['nianjian'],0),FF($z['nianjian'],0),'').'" class="input_1 nianjian" maxlength="30"/></td>
                            <td class="span3 td_1 bg-gray">交强险到期时间</td>
                            <td class="span3"><input value="'.IIF(FF($z['jiaoqiang'],0),FF($z['jiaoqiang'],0),'').'" class="input_1 jiaoqiang" maxlength="30"/></td>
                            <td class="span3 td_1 bg-gray">商业险到期时间</td>
                            <td class="span3"><input value="'.IIF(FF($z['shangye'],0),FF($z['shangye'],0),'').'" class="input_1 shangye" maxlength="30"/></td>
                        </tr>
                        <tr>
                            <td class="span2 td_1 bg-gray">归属地</td>

                            <td class="span3 clear"><input type="text" id="diqu" name="diqu" value="'.IIF(FF($z['guishudi'],0),FF($z['guishudi'],0),'').'" class="input_1 guishudi left" style="width:100px;" readonly><a class="xuanzepf" dd="F_lx1" onclick="dqxianshi()">选择</a></td>
                            <td class="span2 td_1 bg-gray">过户次数</td>
                            <td class="span3"><input value="'.IIF(FF($z['guohu'],0),FF($z['guohu'],0),'').'" class="input_1 guohu" maxlength="30"/></td>
                            <td class="span3 td_1 bg-gray">有无购车发票</td>
                            <td class="span3"><input value="'.IIF(FF($z['fapiao'],0),FF($z['fapiao'],0),'').'" class="input_1 fapiao" maxlength="30"/></td>
                            <td class="span3 td_1 bg-gray">是否4S店保养</td>
                            <td class="span3"><input value="'.IIF(FF($z['fours'],0),FF($z['fours'],0),'').'" class="input_1 fours" maxlength="30"/></td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    <div class="pc-main clear">
            <div class="rep-tit">参数配置</div>
            <div class="rep-tab left">
                



<div class="tab-list">
    <ul>
        <li class="ta-t">基本参数</li>
                    <li class="ta-e">厂商指导价</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhidaojia'],0),FF($z['zhidaojia'],0),'').'" class="input_2 zhidaojia" maxlength="30"/></li>
                    <li class="ta-e">级别</li>
            <li class="ta-f"><input type="text" id="jbxianshi" name="chexi" value="'.FF($z['jibie'],0).'" class="input_1 jibie left" style="width:111px;" readonly><a class="xuanzepf" dd="F_lx1" onclick="jbxianshi()" style="height:40px;">选择</a></li>
                    <li class="ta-e">发动机</li>
            <li class="ta-f"><input value="'.IIF(FF($z['fadongji'],0),FF($z['fadongji'],0),'').'" class="input_2 fadongji" maxlength="30"/></li>
                    <li class="ta-e">变速箱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['bs'],0),FF($z['bs'],0),'').'" class="input_2 bs" maxlength="30"/></li>
                    <li class="ta-e">长宽高(mm)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['changkuangao'],0),FF($z['changkuangao'],0),'').'" class="input_2 changkuangao" maxlength="30"/></li>
                    <li class="ta-e">轴距(mm)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhouju'],0),FF($z['zhouju'],0),'').'" class="input_2 zhouju" maxlength="30"/></li>
                    <li class="ta-e">车身结构</li>
            <li class="ta-f"><input value="'.IIF(FF($z['cheshenjiegou'],0),FF($z['cheshenjiegou'],0),'').'" class="input_2 cheshenjiegou" maxlength="30"/></li>
                    <li class="ta-e">整备质量(kg)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhiliang'],0),FF($z['zhiliang'],0),'').'" class="input_2 zhiliang" maxlength="30"/></li>
                    <li class="ta-e">行李箱容积(L)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['rongji'],0),FF($z['rongji'],0),'').'" class="input_2 rongji" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">发动机</li>
                    <li class="ta-e">发动机型号</li>
            <li class="ta-f"><input value="'.IIF(FF($z['fadongjixinghao'],0),FF($z['fadongjixinghao'],0),'').'" class="input_2 fadongjixinghao" maxlength="30"/></li>
                    <li class="ta-e">排量(L)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['pailiang'],0),FF($z['pailiang'],0),'').'" class="input_2 pailiang" maxlength="30"/></li>
                    <li class="ta-e">进气形式</li>
            <li class="ta-f"><input value="'.IIF(FF($z['jinqi'],0),FF($z['jinqi'],0),'').'" class="input_2 jinqi" maxlength="30"/></li>
                    <li class="ta-e">汽缸数(个)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qigang'],0),FF($z['qigang'],0),'').'" class="input_2 qigang" maxlength="30"/></li>
                    <li class="ta-e">压缩比</li>
            <li class="ta-f"><input value="'.IIF(FF($z['yasuobi'],0),FF($z['yasuobi'],0),'-').'" class="input_2 yasuobi" maxlength="30"/></li>
                    <li class="ta-e">最大马力(Ps)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuidamali'],0),FF($z['zuidamali'],0),'').'" class="input_2 zuidamali" maxlength="30"/></li>
                    <li class="ta-e">最大扭矩(N*m)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuidaniuju'],0),FF($z['zuidaniuju'],0),'').'" class="input_2 zuidaniuju" maxlength="30"/></li>
                    <li class="ta-e">燃油标号</li>
            <li class="ta-f"><input value="'.IIF(FF($z['ranyoubiaohao'],0),FF($z['ranyoubiaohao'],0),'').'" class="input_2 ranyoubiaohao" maxlength="30"/></li>
                    <li class="ta-e">供油方式</li>
            <li class="ta-f"><input value="'.IIF(FF($z['gongyou'],0),FF($z['gongyou'],0),'').'" class="input_2 gongyou" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">底盘和制动</li>
                    <li class="ta-e">驱动方式</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qudong'],0),FF($z['qudong'],0),'').'" class="input_2 qudong" maxlength="30"/></li>
                    <li class="ta-e">前悬架类型</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qianxuanjia'],0),FF($z['qianxuanjia'],0),'').'" class="input_2 qianxuanjia" maxlength="30"/></li>
                    <li class="ta-e">后悬架类型</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houxuanjia'],0),FF($z['houxuanjia'],0),'').'" class="input_2 houxuanjia" maxlength="30"/></li>
                    <li class="ta-e">助力类型</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhuli'],0),FF($z['zhuli'],0),'').'" class="input_2 zhuli" maxlength="30"/></li>
                    <li class="ta-e">前制动器类型</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qianzhi'],0),FF($z['qianzhi'],0),'').'" class="input_2 qianzhi" maxlength="30"/></li>
                    <li class="ta-e">后制动器类型</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houzhi'],0),FF($z['houzhi'],0),'').'" class="input_2 houzhi" maxlength="30"/></li>
                    <li class="ta-e">铝合金轮圈</li>
            <li class="ta-f"><input value="'.IIF(FF($z['lunquan'],0),FF($z['lunquan'],0),'●').'" class="input_2 lunquan" maxlength="30"/></li>
                    <li class="ta-e">前轮胎规格</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qiantai'],0),FF($z['qiantai'],0),'').'" class="input_2 qiantai" maxlength="30"/></li>
                    <li class="ta-e">后轮胎规格</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houtai'],0),FF($z['houtai'],0),'').'" class="input_2 houtai" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">安全装置</li>
                    <li class="ta-e">主/副驾驶座安全气囊</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhufuanquan'],0),FF($z['zhufuanquan'],0),'主●/副●').'" class="input_2 zhufuanquan" maxlength="30"/></li>
                    <li class="ta-e">前/后排侧气囊</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qianhoucebu'],0),FF($z['qianhoucebu'],0),'-').'" class="input_2 qianhoucebu" maxlength="30"/></li>
                    <li class="ta-e">前/后排头部气囊</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qianhoutoubu'],0),FF($z['qianhoutoubu'],0),'-').'" class="input_2 qianhoutoubu" maxlength="30"/></li>
                    <li class="ta-e">儿童座椅接口</li>
            <li class="ta-f"><input value="'.IIF(FF($z['ertongzuoyi'],0),FF($z['ertongzuoyi'],0),'-').'" class="input_2 ertongzuoyi" maxlength="30"/></li>
                    <li class="ta-e">无钥匙启动</li>
            <li class="ta-f"><input value="'.IIF(FF($z['wuyaoshiqidong'],0),FF($z['wuyaoshiqidong'],0),'-').'" class="input_2 wuyaoshiqidong" maxlength="30"/></li>
                    <li class="ta-e">无钥匙进入</li>
            <li class="ta-f"><input value="'.IIF(FF($z['wuyaoshijinru'],0),FF($z['wuyaoshijinru'],0),'-').'" class="input_2 wuyaoshijinru" maxlength="30"/></li>
                    <li class="ta-e">ABS 防抱死</li>
            <li class="ta-f"><input value="'.IIF(FF($z['absfangbaosi'],0),FF($z['absfangbaosi'],0),'●').'" class="input_2 absfangbaosi" maxlength="30"/></li>
                    <li class="ta-e">车身稳定控制(ESP)</li>
            <li class="ta-f"><input value="'.IIF(FF($z['cheshenkongzhi'],0),FF($z['cheshenkongzhi'],0),'-').'" class="input_2 cheshenkongzhi" maxlength="30"/></li>
                    <li class="ta-e">上坡辅助</li>
            <li class="ta-f"><input value="'.IIF(FF($z['shangpofuzhu'],0),FF($z['shangpofuzhu'],0),'-').'" class="input_2 shangpofuzhu" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">外部配置</li>
                    <li class="ta-e">电动天窗</li>
            <li class="ta-f"><input value="'.IIF(FF($z['diandongtianchuang'],0),FF($z['diandongtianchuang'],0),'-').'" class="input_2 diandongtianchuang" maxlength="30"/></li>
                    <li class="ta-e">全景天窗</li>
            <li class="ta-f"><input value="'.IIF(FF($z['quanjingtianchuang'],0),FF($z['quanjingtianchuang'],0),'-').'" class="input_2 quanjingtianchuang" maxlength="30"/></li>
                    <li class="ta-e">氙气大灯</li>
            <li class="ta-f"><input value="'.IIF(FF($z['shanqidadeng'],0),FF($z['shanqidadeng'],0),'-').'" class="input_2 shanqidadeng" maxlength="30"/></li>
                    <li class="ta-e">LED 大灯</li>
            <li class="ta-f"><input value="'.IIF(FF($z['leddadeng'],0),FF($z['leddadeng'],0),'-').'" class="input_2 leddadeng" maxlength="30"/></li>
                    <li class="ta-e">日间行车灯</li>
            <li class="ta-f"><input value="'.IIF(FF($z['rijianxingchedengy'],0),FF($z['rijianxingchedengy'],0),'-').'" class="input_2 rijianxingchedengy" maxlength="30"/></li>
                    <li class="ta-e">前雾灯</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qianwudeng'],0),FF($z['qianwudeng'],0),'●').'" class="input_2 qianwudeng" maxlength="30"/></li>
                    <li class="ta-e">后视镜电动调节</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houshijing'],0),FF($z['houshijing'],0),'●').'" class="input_2 houshijing" maxlength="30"/></li>
                    <li class="ta-e">前/后电动车窗</li>
            <li class="ta-f"><input value="'.IIF(FF($z['diandongchechuang'],0),FF($z['diandongchechuang'],0),'前●/后●').'" class="input_2 diandongchechuang" maxlength="30"/></li>
                    <li class="ta-e">感应雨刷</li>
            <li class="ta-f"><input value="'.IIF(FF($z['ganyingyushua'],0),FF($z['ganyingyushua'],0),'-').'" class="input_2 ganyingyushua" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">内部配置</li>
                    <li class="ta-e">真皮/仿皮座椅</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhenpizuoyi'],0),FF($z['zhenpizuoyi'],0),'-').'" class="input_2 zhenpizuoyi" maxlength="30"/></li>
                    <li class="ta-e">主/副驾驶座电动调节</li>
            <li class="ta-f"><input value="'.IIF(FF($z['jiashizuodiandong'],0),FF($z['jiashizuodiandong'],0),'-').'" class="input_2 jiashizuodiandong" maxlength="30"/></li>
                    <li class="ta-e">前/后排座椅加热</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoyijiare'],0),FF($z['zuoyijiare'],0),'-').'" class="input_2 zuoyijiare" maxlength="30"/></li>
                    <li class="ta-e">后排座椅放倒方式</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houpaidaofang'],0),FF($z['houpaidaofang'],0),'整体放倒').'" class="input_2 houpaidaofang" maxlength="30"/></li>
                    <li class="ta-e">真皮方向盘</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhenpifangxiangpan'],0),FF($z['zhenpifangxiangpan'],0),'-').'" class="input_2 zhenpifangxiangpan" maxlength="30"/></li>
                    <li class="ta-e">多功能方向盘</li>
            <li class="ta-f"><input value="'.IIF(FF($z['duogongnengfangxiangpan'],0),FF($z['duogongnengfangxiangpan'],0),'-').'" class="input_2 duogongnengfangxiangpan" maxlength="30"/></li>
                    <li class="ta-e">方向盘换挡</li>
            <li class="ta-f"><input value="'.IIF(FF($z['fangxiangpanhuandang'],0),FF($z['fangxiangpanhuandang'],0),'-').'" class="input_2 fangxiangpanhuandang" maxlength="30"/></li>
                    <li class="ta-e">定速巡航</li>
            <li class="ta-f"><input value="'.IIF(FF($z['dingsuxunhang'],0),FF($z['dingsuxunhang'],0),'-').'" class="input_2 dingsuxunhang" maxlength="30"/></li>
                    <li class="ta-e">空调控制方式</li>
            <li class="ta-f"><input value="'.IIF(FF($z['kongtiao'],0),FF($z['kongtiao'],0),'手动●').'" class="input_2 kongtiao" maxlength="30"/></li>
            </ul>
</div>

            </div>
        </div>

    <div class="pc-main clear" style="border: solid 1px #ddd; width: 1063px;">
            <div class="rep-tit">外观检测</div>
            <div class="rep-tab left">
            	<span class="jia" title="添加一项" onclick="jiayixiang()"></span>
                <ul class="lidian waiguanxiang">
                	'.$str.'
                </ul>
              </div>
              <div class="right">
                <img src="'.IIF($z['waiguanimg'],$z['waiguanimg'],'/img/defaultimg.jpg').'" alt="上传图片" title="上传图片" class="waiguanimg" onclick="uping2(this)" width="670" alt="">
              </div>
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">事故排查</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">事故检测</li>
                    <li class="ta-e">左A柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoa'],0),FF($z['zuoa'],0),'正常').'" class="input_2 zuoa" maxlength="30"/></li>
                    <li class="ta-e">左B柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuob'],0),FF($z['zuob'],0),'正常').'" class="input_2 zuob" maxlength="30"/></li>
                    <li class="ta-e">左C柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoc'],0),FF($z['zuoc'],0),'正常').'" class="input_2 zuoc" maxlength="30"/></li>
                    <li class="ta-e">左D柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuod'],0),FF($z['zuod'],0),'正常').'" class="input_2 zuod" maxlength="30"/></li>
                    <li class="ta-e">左前纵梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoqian'],0),FF($z['zuoqian'],0),'正常').'" class="input_2 zuoqian" maxlength="30"/></li>
                    <li class="ta-e">左后纵梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuohou'],0),FF($z['zuohou'],0),'正常').'" class="input_2 zuohou" maxlength="30"/></li>
                    <li class="ta-e">前防撞梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['qianfang'],0),FF($z['qianfang'],0),'正常').'" class="input_2 qianfang" maxlength="30"/></li>
                    <li class="ta-e">左前梁头</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoqianl'],0),FF($z['zuoqianl'],0),'正常').'" class="input_2 zuoqianl" maxlength="30"/></li>
                    <li class="ta-e">左下大边</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoxia'],0),FF($z['zuoxia'],0),'正常').'" class="input_2 zuoxia" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">事故检测</li>
                    <li class="ta-e">右A柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youa'],0),FF($z['youa'],0),'正常').'" class="input_2 youa" maxlength="30"/></li>
                    <li class="ta-e">右B柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youb'],0),FF($z['youb'],0),'正常').'" class="input_2 youb" maxlength="30"/></li>
                    <li class="ta-e">右C柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youc'],0),FF($z['youc'],0),'正常').'" class="input_2 youc" maxlength="30"/></li>
                    <li class="ta-e">右D柱</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youd'],0),FF($z['youd'],0),'正常').'" class="input_2 youd" maxlength="30"/></li>
                    <li class="ta-e">右前纵梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youqian'],0),FF($z['youqian'],0),'正常').'" class="input_2 youqian" maxlength="30"/></li>
                    <li class="ta-e">右后纵梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youhou'],0),FF($z['youhou'],0),'正常').'" class="input_2 youhou" maxlength="30"/></li>
                    <li class="ta-e">后防撞梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houfang'],0),FF($z['houfang'],0),'正常').'" class="input_2 houfang" maxlength="30"/></li>
                    <li class="ta-e">右前梁头</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youqianl'],0),FF($z['youqianl'],0),'正常').'" class="input_2 youqianl" maxlength="30"/></li>
                    <li class="ta-e">右下大边</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youxia'],0),FF($z['youxia'],0),'正常').'" class="input_2 youxia" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">事故检测</li>
                    <li class="ta-e">左上纵梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoshang'],0),FF($z['zuoshang'],0),'正常').'" class="input_2 zuoshang" maxlength="30"/></li>
                    <li class="ta-e">右上纵梁</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youshang'],0),FF($z['youshang'],0),'正常').'" class="input_2 youshang" maxlength="30"/></li>
                    <li class="ta-e">左前翼子板骨架</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoqiany'],0),FF($z['zuoqiany'],0),'正常').'" class="input_2 zuoqiany" maxlength="30"/></li>
                    <li class="ta-e">右前翼子板骨架</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youqiany'],0),FF($z['youqiany'],0),'正常').'" class="input_2 youqiany" maxlength="30"/></li>
                    <li class="ta-e">左前减震器支座</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoqianj'],0),FF($z['zuoqianj'],0),'正常').'" class="input_2 zuoqianj" maxlength="30"/></li>
                    <li class="ta-e">右前减震器支座</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youqianj'],0),FF($z['youqianj'],0),'正常').'" class="input_2 youqianj" maxlength="30"/></li>
                    <li class="ta-e">后备箱底</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houbeid'],0),FF($z['houbeid'],0),'正常').'" class="input_2 houbeid" maxlength="30"/></li>
                    <li class="ta-e">水箱框架</li>
            <li class="ta-f"><input value="'.IIF(FF($z['shuixiang'],0),FF($z['shuixiang'],0),'正常').'" class="input_2 shuixiang" maxlength="30"/></li>
                    <li class="ta-e">后尾板</li>
            <li class="ta-f"><input value="'.IIF(FF($z['houweiban'],0),FF($z['houweiban'],0),'正常').'" class="input_2 houweiban" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list dalist">
    <ul class="shigujian">
        <li class="ta-t">泡水检测</li>
                    <li class="ta-e">座椅底部支架及滑轨有无锈蚀</li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoyi'],0),FF($z['zuoyi'],0),'正常').'" class="input_2 zuoyi" maxlength="30"/></li>
                    <li class="ta-e">安全带底部有无水渍或霉斑</li>
            <li class="ta-f"><input value="'.IIF(FF($z['anquandaidibu'],0),FF($z['anquandaidibu'],0),'正常').'" class="input_2 anquandaidibu" maxlength="30"/></li>
                    <li class="ta-e">车底板棉毡有无水渍或泥沙</li>
            <li class="ta-f"><input value="'.IIF(FF($z['chedimianzhan'],0),FF($z['chedimianzhan'],0),'正常').'" class="input_2 chedimianzhan" maxlength="30"/></li>
                    <li class="ta-e">悬挂的固定螺丝及刹车挡板有无锈蚀</li>
            <li class="ta-f"><input value="'.IIF(FF($z['xuanguaguding'],0),FF($z['xuanguaguding'],0),'正常').'" class="input_2 xuanguaguding" maxlength="30"/></li>
                    <li class="ta-e">备胎座有无水渍或泥沙</li>
            <li class="ta-f"><input value="'.IIF(FF($z['beitaishuizi'],0),FF($z['beitaishuizi'],0),'正常').'" class="input_2 beitaishuizi" maxlength="30"/></li>
                    <li class="ta-e">车厢内地胶或地毯有无水渍或污渍</li>
            <li class="ta-f"><input value="'.IIF(FF($z['chexiangdijiao'],0),FF($z['chexiangdijiao'],0),'正常').'" class="input_2 chexiangdijiao" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list dalist dalistyou">
    <ul class="shigujian">
        <li class="ta-t">火烧检测</li>
                    <li class="ta-e">车内线束有无火烧痕迹</li>
            <li class="ta-f"><input value="'.IIF(FF($z['cheneixianshu'],0),FF($z['cheneixianshu'],0),'正常').'" class="input_2 cheneixianshu" maxlength="30"/></li>
                    <li class="ta-e">发车内橡胶制品有无火烧痕迹</li>
            <li class="ta-f"><input value="'.IIF(FF($z['fachexiangjiao'],0),FF($z['fachexiangjiao'],0),'正常').'" class="input_2 fachexiangjiao" maxlength="30"/></li>
                    <li class="ta-e">车身各夹层内有无火烧熏黑痕迹</li>
            <li class="ta-f"><input value="'.IIF(FF($z['cheshenjiaceng'],0),FF($z['cheshenjiaceng'],0),'正常').'" class="input_2 cheshenjiaceng" maxlength="30"/></li>
                    <li class="ta-e">发动机舱、车厢、尾箱内有无熏黑痕迹</li>
            <li class="ta-f"><input value="'.IIF(FF($z['fadongjicang'],0),FF($z['fadongjicang'],0),'正常').'" class="input_2 fadongjicang" maxlength="30"/></li>
                    <li class="ta-e"></li>
            <li class="ta-f"><input value="" class="input_2" maxlength="30"/></li>
                    <li class="ta-e"></li>
            <li class="ta-f"><input value="" class="input_2" maxlength="30"/></li>
            </ul>
</div>
      <!-- -- -->
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">内饰检测</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">内饰检测</li>
                    <li class="ta-e">仪表台 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['yibiaotai'],0),FF($z['yibiaotai'],0),'正常').'" class="input_2 yibiaotai" maxlength="30"/></li>
                    <li class="ta-e">方向盘 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['fangxiangpan'],0),FF($z['fangxiangpan'],0),'正常').'" class="input_2 fangxiangpan" maxlength="30"/></li>
                    <li class="ta-e">点烟器 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['dianyanqi'],0),FF($z['dianyanqi'],0),'正常').'" class="input_2 dianyanqi" maxlength="30"/></li>
                    <li class="ta-e">中控台 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhongkongtai'],0),FF($z['zhongkongtai'],0),'正常').'" class="input_2 zhongkongtai" maxlength="30"/></li>
                    <li class="ta-e">档把 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['dangba'],0),FF($z['dangba'],0),'正常').'" class="input_2 dangba" maxlength="30"/></li>
                    <li class="ta-e">手套箱 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['shoutaoxiang'],0),FF($z['shoutaoxiang'],0),'正常').'" class="input_2 shoutaoxiang" maxlength="30"/></li>
                    <li class="ta-e">车顶棚 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['chedingpeng'],0),FF($z['chedingpeng'],0),'正常').'" class="input_2 chedingpeng" maxlength="30"/></li>
                    <li class="ta-e">主驾遮阳板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhuzheyangban'],0),FF($z['zhuzheyangban'],0),'正常').'" class="input_2 zhuzheyangban" maxlength="30"/></li>
                    <li class="ta-e">副驾遮阳板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['fuzheyangpan'],0),FF($z['fuzheyangpan'],0),'正常').'" class="input_2 fuzheyangpan" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">内饰检测</li>
                    <li class="ta-e">车内后视镜 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['cheneihoushijing'],0),FF($z['cheneihoushijing'],0),'正常').'" class="input_2 cheneihoushijing" maxlength="30"/></li>
                    <li class="ta-e">司机座椅 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['sijizuoyi'],0),FF($z['sijizuoyi'],0),'正常').'" class="input_2 sijizuoyi" maxlength="30"/></li>
                    <li class="ta-e">副驾座椅 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['fujiazuoyi'],0),FF($z['fujiazuoyi'],0),'正常').'" class="input_2 fujiazuoyi" maxlength="30"/></li>
                    <li class="ta-e">后排座椅 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['houpaizuoyi'],0),FF($z['houpaizuoyi'],0),'正常').'" class="input_2 houpaizuoyi" maxlength="30"/></li>
                    <li class="ta-e">中央扶手 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhongyangfushou'],0),FF($z['zhongyangfushou'],0),'正常').'" class="input_2 zhongyangfushou" maxlength="30"/></li>
                    <li class="ta-e">左前门饰板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoqianmen'],0),FF($z['zuoqianmen'],0),'正常').'" class="input_2 zuoqianmen" maxlength="30"/></li>
                    <li class="ta-e">右前门饰板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['youqianmen'],0),FF($z['youqianmen'],0),'正常').'" class="input_2 youqianmen" maxlength="30"/></li>
                    <li class="ta-e">左后门饰板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuohoumen'],0),FF($z['zuohoumen'],0),'正常').'" class="input_2 zuohoumen" maxlength="30"/></li>
                    <li class="ta-e">右后门饰板</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youhoumen'],0),FF($z['youhoumen'],0),'正常').'" class="input_2 youhoumen" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">内饰检测</li>
                    <li class="ta-e">左前门扶手 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuoqianfu'],0),FF($z['zuoqianfu'],0),'正常').'" class="input_2 zuoqianfu" maxlength="30"/></li>
                    <li class="ta-e">左后门扶手 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zuohoufu'],0),FF($z['zuohoufu'],0),'正常').'" class="input_2 zuohoufu" maxlength="30"/></li>
                    <li class="ta-e">右前门扶手 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['youqianfu'],0),FF($z['youqianfu'],0),'正常').'" class="input_2 youqianfu" maxlength="30"/></li>
                    <li class="ta-e">右后门扶手</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youhoufu'],0),FF($z['youhoufu'],0),'正常').'" class="input_2 youhoufu" maxlength="30"/></li>
                    <li class="ta-e">A柱饰板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['azhu'],0),FF($z['azhu'],0),'正常').'" class="input_2 azhu" maxlength="30"/></li>
                    <li class="ta-e">B柱饰板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['bzhu'],0),FF($z['bzhu'],0),'正常').'" class="input_2 bzhu" maxlength="30"/></li>
                    <li class="ta-e">C柱饰板 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['czhu'],0),FF($z['czhu'],0),'正常').'" class="input_2 czhu" maxlength="30"/></li>
                    <li class="ta-e">后备箱 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['houbeixiang'],0),FF($z['houbeixiang'],0),'正常').'" class="input_2 houbeixiang" maxlength="30"/></li>
                    <li class="ta-e">全车胶条 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['quanche'],0),FF($z['quanche'],0),'正常').'" class="input_2 quanche" maxlength="30"/></li>
            </ul>
</div>
      <!-- -- -->
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">设备及安全相关检测</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">设备及安全相关检测</li>
                    <li class="ta-e">仪表盘  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['yibiaopan'],0),FF($z['yibiaopan'],0),'正常').'" class="input_2 yibiaopan" maxlength="30"/></li>
                    <li class="ta-e">雨刷 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['yushua'],0),FF($z['yushua'],0),'正常').'" class="input_2 yushua" maxlength="30"/></li>
                    <li class="ta-e">空调 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['kongtiaos'],0),FF($z['kongtiaos'],0),'正常').'" class="input_2 kongtiaos" maxlength="30"/></li>
                    <li class="ta-e">手刹  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['shousha'],0),FF($z['shousha'],0),'正常').'" class="input_2 shousha" maxlength="30"/></li>
                    <li class="ta-e">天窗  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['tianchuang'],0),FF($z['tianchuang'],0),'正常').'" class="input_2 tianchuang" maxlength="30"/></li>
                    <li class="ta-e">GPS导航  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['gps'],0),FF($z['gps'],0),'正常').'" class="input_2 gps" maxlength="30"/></li>
                    <li class="ta-e">主驾电动座椅  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhujiadiandong'],0),FF($z['zhujiadiandong'],0),'正常').'" class="input_2 zhujiadiandong" maxlength="30"/></li>
                    <li class="ta-e">车内阅读灯  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['cheneiyuedu'],0),FF($z['cheneiyuedu'],0),'正常').'" class="input_2 cheneiyuedu" maxlength="30"/></li>
                    <li class="ta-e">车窗  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['chechuang'],0),FF($z['chechuang'],0),'正常').'" class="input_2 chechuang" maxlength="30"/></li>
                    <li class="ta-e">音响系统   </li>
            <li class="ta-f"><input value="'.IIF(FF($z['yinxiang'],0),FF($z['yinxiang'],0),'正常').'" class="input_2 yinxiang" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">设备及安全相关检测</li>
                    <li class="ta-e">中控锁  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhongkongsuo'],0),FF($z['zhongkongsuo'],0),'正常').'" class="input_2 zhongkongsuo" maxlength="30"/></li>
                    <li class="ta-e">中控显示屏  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhongkongxianshi'],0),FF($z['zhongkongxianshi'],0),'正常').'" class="input_2 zhongkongxianshi" maxlength="30"/></li>
                    <li class="ta-e">倒车雷达  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['daocheleida'],0),FF($z['daocheleida'],0),'正常').'" class="input_2 daocheleida" maxlength="30"/></li>
                    <li class="ta-e">副驾电动座椅  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['fujiadiandong'],0),FF($z['fujiadiandong'],0),'正常').'" class="input_2 fujiadiandong" maxlength="30"/></li>
                    <li class="ta-e">仪表提示灯  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['yibiaotishi'],0),FF($z['yibiaotishi'],0),'正常').'" class="input_2 yibiaotishi" maxlength="30"/></li>
                    <li class="ta-e">ABS  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['abs'],0),FF($z['abs'],0),'正常').'" class="input_2 abs" maxlength="30"/></li>
                    <li class="ta-e">安全气囊  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['anqanqinang'],0),FF($z['anqanqinang'],0),'正常').'" class="input_2 anqanqinang" maxlength="30"/></li>
                    <li class="ta-e">安全带 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['anquandai'],0),FF($z['anquandai'],0),'正常').'" class="input_2 anquandai" maxlength="30"/></li>
                    <li class="ta-e">-</li>
            <li class="ta-f"><input value="-" class="input_2" maxlength="30"/></li>
                    <li class="ta-e">-</li>
            <li class="ta-f"><input value="-" class="input_2" maxlength="30"/></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">轮胎及灯光</li>
                    <li class="ta-e">轮胎一致性 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['luntaiyizhi'],0),FF($z['luntaiyizhi'],0),'正常').'" class="input_2 luntaiyizhi" maxlength="30"/></li>
                    <li class="ta-e">胎纹  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['taiwen'],0),FF($z['taiwen'],0),'正常').'" class="input_2 taiwen" maxlength="30"/></li>
                    <li class="ta-e">备胎  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['beitai'],0),FF($z['beitai'],0),'正常').'" class="input_2 beitai" maxlength="30"/></li>
                    <li class="ta-e">远光灯 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['yuanguangdeng'],0),FF($z['yuanguangdeng'],0),'正常').'" class="input_2 yuanguangdeng" maxlength="30"/></li>
                    <li class="ta-e">近光灯  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['jinguangdeng'],0),FF($z['jinguangdeng'],0),'正常').'" class="input_2 jinguangdeng" maxlength="30"/></li>
                    <li class="ta-e">雾灯 </li>
            <li class="ta-f"><input value="'.IIF(FF($z['wudeng'],0),FF($z['wudeng'],0),'正常').'" class="input_2 wudeng" maxlength="30"/></li>
                    <li class="ta-e">转向灯  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['zhuanxiangdeng'],0),FF($z['zhuanxiangdeng'],0),'正常').'" class="input_2 zhuanxiangdeng" maxlength="30"/></li>
                    <li class="ta-e">尾灯  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['weideng'],0),FF($z['weideng'],0),'正常').'" class="input_2 weideng" maxlength="30"/></li>
                    <li class="ta-e">刹车灯  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['shachedeng'],0),FF($z['shachedeng'],0),'正常').'" class="input_2 shachedeng" maxlength="30"/></li>
                    <li class="ta-e">日间行车灯  </li>
            <li class="ta-f"><input value="'.IIF(FF($z['rijianxingchedeng'],0),FF($z['rijianxingchedeng'],0),'正常').'" class="input_2 rijianxingchedeng" maxlength="30"/></li>
            </ul>
</div>
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">设备及安全相关检测</div>
<div class="tab-list dalist dalistcenter">
    <ul class="shigujian last">
        <li class="ta-t">发动机舱</li>
                    <li class="ta-e">机油有无冷却液混入</li>
            <li class="ta-f"><input value="'.IIF(FF($z['jiyou'],0),FF($z['jiyou'],0),'正常').'" class="input_2 jiyou" maxlength="30"/></li>
                    <li class="ta-e">散热器格栅有无破损</li>
            <li class="ta-f"><input value="'.IIF(FF($z['sanreqi'],0),FF($z['sanreqi'],0),'正常').'" class="input_2 sanreqi" maxlength="30"/></li>
                    <li class="ta-e">蓄电池电解液有无渗漏</li>
            <li class="ta-f"><input value="'.IIF(FF($z['xudianchishenlou'],0),FF($z['xudianchishenlou'],0),'正常').'" class="input_2 xudianchishenlou" maxlength="30"/></li>
                    <li class="ta-e">油管有无老化裂痕</li>
            <li class="ta-f"><input value="'.IIF(FF($z['youguan'],0),FF($z['youguan'],0),'正常').'" class="input_2 youguan" maxlength="30"/></li>
                    <li class="ta-e">线束有无老化裂痕</li>
            <li class="ta-f"><input value="'.IIF(FF($z['xianshulaohua'],0),FF($z['xianshulaohua'],0),'正常').'" class="input_2 xianshulaohua" maxlength="30"/></li>
                    <li class="ta-e">缸盖外有无机油渗漏</li>
            <li class="ta-f"><input value="'.IIF(FF($z['ganggai'],0),FF($z['ganggai'],0),'正常').'" class="input_2 ganggai" maxlength="30"/></li>
                    <li class="ta-e">蓄电池电极有无腐蚀</li>
            <li class="ta-f"><input value="'.IIF(FF($z['xudianchifushi'],0),FF($z['xudianchifushi'],0),'正常').'" class="input_2 xudianchifushi" maxlength="30"/></li>
                    <li class="ta-e">发动机皮带有无老化</li>
            <li class="ta-f"><input value="'.IIF(FF($z['fadongjipidai'],0),FF($z['fadongjipidai'],0),'正常').'" class="input_2 fadongjipidai" maxlength="30"/></li>
                    <li class="ta-e">水管有无老化裂痕</li>
            <li class="ta-f"><input value="'.IIF(FF($z['shuiguanlaohua'],0),FF($z['shuiguanlaohua'],0),'正常').'" class="input_2 shuiguanlaohua" maxlength="30"/></li>
            </ul>
</div>
</div>
</div>
<div class="rqs"></div>');
  
 $H->aj("FZ('#RT .twz','<span>当前位置：</span><span>内容管理</span><span dd=\"a_dy\">产品管理</span><span>".IIF($Wf<=0,"添加","修改")."</span>');");
 $H->aj("FZ('#web .rt','<div class=\"czan\"><a dd=\"a_dyq\" class=\"an\">确认".IIF($Wf<=0,"添加","修改")."</a><a dd=\"a_cz\">重置</a><a dd=\"a_fh\">返回</a></div>');");
 $H->aj("bdwh();");
 
 $H->aj("\$('#web .rt .czan a[dd=\"a_cz\"]').click(function(){FCZ('FY_A_CP.php?/1_-3_".$Wf.".html')})");
 $H->aj("\$('#web .rt .czan a[dd=\"a_fh\"]').click(function(){FCZ('FY_A_CP.php')})");
 
 
 
 
 
 
 
 
 $H->aj("\$(\".form a[dd='F_ly']\").click(function(){at('FY_A_CPL_X.php?z=F_ly','F_ly','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_lx']\").click(function(){at('FY_A_CPL_X.php?z=F_lx','F_lx','150:',$(this))})");
 $H->aj("\$(\".form a[dd='F_zz']\").click(function(){at('FY_A_CPL_X.php?z=F_zz','F_zz','150:',$(this))})");
 
 



 $H->aj("var scplr=editor('#cplr');");
 $H->aj("\$('#web .rt .czan a[dd=\"a_dyq\"]').click(function(){");
 $H->aj("var id=\$('#Right');");
 $H->aj(" var cpbt=asz(id,'cpbt');if(!BDYZ_s('cpbt','*','标题不能为空')){return false;};");
 $H->aj("	var cppp=asz(id,'pinpai');if($('#pinpai').val()==''){alert('品牌不能为空');return false;};");
 $H->aj("	var chexi=asz(id,'chexi');if($('#chexi').val()==''){alert('车系不能为空');return false;};");
 $H->aj(" var chexi=asz(id,'chexi');if($('#chexi').val()==''){alert('车系不能为空');return false;};");
 $H->aj(" var cheling=asz(id,'cheling');if($('#cheling').val()==''){alert('车龄不能为空');return false;};");
 $H->aj(" var diqu=asz(id,'diqu');if($('#diqu').val()==''){alert('地区不能为空');return false;};");
 $H->aj(" var paifang=asz(id,'paifang');if($('#paifang').val()==''){alert('类别不能为空');return false;};");
 $H->aj(" var paifangliang=asz(id,'paifangliang');if($('#paifangliang').val()==''){alert('类别不能为空');return false;};");
 $H->aj(" var biansu=asz(id,'biansu');if($('#biansu').val()==''){alert('变速箱不能为空');return false;};");
 $H->aj(" var licheng=asz(id,'licheng');if($('#licheng').val()==''){alert('表显里程不能为空');return false;};");
 $H->aj(" var fuwufei=asz(id,'fuwufei');if($('#fuwufei').val()==''){alert('服务费不能为空');return false;};");
 $H->aj(" var fuwuxiang=asz(id,'fuwuxiang');if($('#fuwuxiang').val()==''){alert('服务项不能为空');return false;};");
 $H->aj(" var chezhuxinxi=asz(id,'chezhuxinxi');if($('#chezhuxinxi').val()==''){alert('服务项不能为空');return false;};");
 $H->aj(" var yewudianhua=asz(id,'yewudianhua');if($('#yewudianhua').val()==''){alert('服务项不能为空');return false;};");
 $H->aj(" var shangpai=asz(id,'shangpai');if($('#shangpai').val()==''){alert('上牌时间不能为空');return false;};");
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
 // $H->aj("	var cplr=scplr.html();if(!BDYZ_b(cplr,scplr,'内容不能为空')){return false;};");
 $H->aj('var xqimg="";');
 $H->aj('var leng=$(".neirong").find(".danxiang").length-1;');
 $H->aj('for(var q=0;q<=leng;q++){
var daxiao=$(".neirong").find(".danxiang").eq(q).find(".daxiao").val();if(daxiao==""){alert("请填写完整！");$(".daxiao").css("background","#FFECEC"); return false;}
var tuimg=$(".neirong").find(".danxiang").eq(q).find(".tuimg").attr("src");if(tuimg=="/img/defaultimg.jpg"){alert("请选择图片！");$(".tuimg").css("background","#FFECEC"); return false;}
var weizhi=$(".neirong").find(".danxiang").eq(q).find(".weizhi").val();if(weizhi==""){alert("请填写完整！");$(".weizhi").css("background","#FFECEC"); return false;}
var miaoshu=$(".neirong").find(".danxiang").eq(q).find(".miaoshu").val();if(miaoshu==""){alert("请填写完整！");$(".miaoshu").css("background","#FFECEC"); return false;}
var chezhu=$(".neirong").find(".danxiang").eq(q).find(".chezhu").val();
var dizhi=$(".neirong").find(".danxiang").eq(q).find(".dizhi").val();
var jiyu=$(".neirong").find(".danxiang").eq(q).find(".jiyu").val();
xqimg = xqimg + "%~~" + \'{"daxiao":"\'+daxiao+\'","tuimg":"\'+tuimg+\'","weizhi":"\'+weizhi+\'","miaoshu":"\'+miaoshu+\'","chezhu":"\'+chezhu+\'","dizhi":"\'+dizhi+\'","jiyu":"\'+jiyu+\'"}\'
 }');
// $H->aj('$(".rqs").html("\""+xqimg+"\"");return false');
 $H->aj('var cheyuanhao=$(".cheyuanhao").val();if(cheyuanhao==""){alert("请填写完整！");$(".cheyuanhao").css("background","#FFECEC"); return false;}');
 $H->aj('var jieshengjia=$(".jieshengjia").val();if(jieshengjia==""){alert("请填写完整！");$(".jieshengjia").css("background","#FFECEC"); return false;}');
 $H->aj('var cheshui=$(".cheshui").val();if(cheshui==""){alert("请填写完整！");$(".cheshui").css("background","#FFECEC"); return false;}');
 $H->aj('var yls=$(".yls").val();if(yls==""){alert("请填写完整！");$(".yls").css("background","#FFECEC"); return false;}');
 $H->aj('var jiance=$(".jiance").val();if(jiance==""){alert("请填写完整！");$(".jiance").css("background","#FFECEC"); return false;}');
 $H->aj('var pingceshi=$(".pingceshi").val();if(pingceshi==""){alert("请填写完整！");$(".pingceshi").css("background","#FFECEC"); return false;}');
 $H->aj('var yanse=$(".yanse").val();if(yanse==""){alert("请填写完整！");$(".yanse").css("background","#FFECEC"); return false;}');
 $H->aj('var guishudi=$(".guishudi").val();if(guishudi==""){alert("请填写完整！");$(".guishudi").css("background","#FFECEC"); return false;}');
 $H->aj('var nianjian=$(".nianjian").val();if(nianjian==""){alert("请填写完整！");$(".nianjian").css("background","#FFECEC"); return false;}');
 $H->aj('var guohu=$(".guohu").val();if(guohu==""){alert("请填写完整！");$(".guohu").css("background","#FFECEC"); return false;}');
 $H->aj('var jiaoqiang=$(".jiaoqiang").val();if(jiaoqiang==""){alert("请填写完整！");$(".jiaoqiang").css("background","#FFECEC"); return false;}');
 $H->aj('var fapiao=$(".fapiao").val();if(fapiao==""){alert("请填写完整！");$(".fapiao").css("background","#FFECEC"); return false;}');
 $H->aj('var shangye=$(".shangye").val();if(shangye==""){alert("请填写完整！");$(".shangye").css("background","#FFECEC"); return false;}');
 $H->aj('var fours=$(".fours").val();if(fours==""){alert("请填写完整！");$(".fours").css("background","#FFECEC"); return false;}');
 $H->aj('var zhidaojia=$(".zhidaojia").val();if(zhidaojia==""){alert("请填写完整！");$(".zhidaojia").css("background","#FFECEC"); return false;}');
 $H->aj('var jibie=$(".jibie").val();if(jibie==""){alert("请填写完整！");$(".jibie").css("background","#FFECEC"); return false;}');
 $H->aj('var fadongji=$(".fadongji").val();if(fadongji==""){alert("请填写完整！");$(".fadongji").css("background","#FFECEC"); return false;}');
 $H->aj('var bs=$(".bs").val();if(bs==""){alert("请填写完整！");$(".bs").css("background","#FFECEC"); return false;}');
 $H->aj('var changkuangao=$(".changkuangao").val();if(changkuangao==""){alert("请填写完整！");$(".changkuangao").css("background","#FFECEC"); return false;}');
 $H->aj('var zhouju=$(".zhouju").val();if(zhouju==""){alert("请填写完整！");$(".zhouju").css("background","#FFECEC"); return false;}');
 $H->aj('var cheshenjiegou=$(".cheshenjiegou").val();if(cheshenjiegou==""){alert("请填写完整！");$(".cheshenjiegou").css("background","#FFECEC"); return false;}');
 $H->aj('var zhiliang=$(".zhiliang").val();if(zhiliang==""){alert("请填写完整！");$(".zhiliang").css("background","#FFECEC"); return false;}');
 $H->aj('var rongji=$(".rongji").val();if(rongji==""){alert("请填写完整！");$(".rongji").css("background","#FFECEC"); return false;}');
 $H->aj('var fadongjixinghao=$(".fadongjixinghao").val();if(fadongjixinghao==""){alert("请填写完整！");$(".fadongjixinghao").css("background","#FFECEC"); return false;}');
 $H->aj('var pailiang=$(".pailiang").val();if(pailiang==""){alert("请填写完整！");$(".pailiang").css("background","#FFECEC"); return false;}');
 $H->aj('var jinqi=$(".jinqi").val();if(jinqi==""){alert("请填写完整！");$(".jinqi").css("background","#FFECEC"); return false;}');
 $H->aj('var qigang=$(".qigang").val();if(qigang==""){alert("请填写完整！");$(".qigang").css("background","#FFECEC"); return false;}');
 $H->aj('var yasuobi=$(".yasuobi").val();if(yasuobi==""){alert("请填写完整！");$(".yasuobi").css("background","#FFECEC"); return false;}');
 $H->aj('var zuidamali=$(".zuidamali").val();if(zuidamali==""){alert("请填写完整！");$(".zuidamali").css("background","#FFECEC"); return false;}');
 $H->aj('var zuidaniuju=$(".zuidaniuju").val();if(zuidaniuju==""){alert("请填写完整！");$(".zuidaniuju").css("background","#FFECEC"); return false;}');
 $H->aj('var ranyoubiaohao=$(".ranyoubiaohao").val();if(ranyoubiaohao==""){alert("请填写完整！");$(".ranyoubiaohao").css("background","#FFECEC"); return false;}');
 $H->aj('var gongyou=$(".gongyou").val();if(gongyou==""){alert("请填写完整！");$(".gongyou").css("background","#FFECEC"); return false;}');
 $H->aj('var qudong=$(".qudong").val();if(qudong==""){alert("请填写完整！");$(".qudong").css("background","#FFECEC"); return false;}');
 $H->aj('var qianxuanjia=$(".qianxuanjia").val();if(qianxuanjia==""){alert("请填写完整！");$(".qianxuanjia").css("background","#FFECEC"); return false;}');
 $H->aj('var houxuanjia=$(".houxuanjia").val();if(houxuanjia==""){alert("请填写完整！");$(".houxuanjia").css("background","#FFECEC"); return false;}');
 $H->aj('var zhuli=$(".zhuli").val();if(zhuli==""){alert("请填写完整！");$(".zhuli").css("background","#FFECEC"); return false;}');
 $H->aj('var qianzhi=$(".qianzhi").val();if(qianzhi==""){alert("请填写完整！");$(".qianzhi").css("background","#FFECEC"); return false;}');
 $H->aj('var houzhi=$(".houzhi").val();if(houzhi==""){alert("请填写完整！");$(".houzhi").css("background","#FFECEC"); return false;}');
 $H->aj('var lunquan=$(".lunquan").val();if(lunquan==""){alert("请填写完整！");$(".lunquan").css("background","#FFECEC"); return false;}');
 $H->aj('var qiantai=$(".qiantai").val();if(qiantai==""){alert("请填写完整！");$(".qiantai").css("background","#FFECEC"); return false;}');
 $H->aj('var houtai=$(".houtai").val();if(houtai==""){alert("请填写完整！");$(".houtai").css("background","#FFECEC"); return false;}');
 $H->aj('var zhufuanquan=$(".zhufuanquan").val();if(zhufuanquan==""){alert("请填写完整！");$(".zhufuanquan").css("background","#FFECEC"); return false;}');
 $H->aj('var qianhoucebu=$(".qianhoucebu").val();if(qianhoucebu==""){alert("请填写完整！");$(".qianhoucebu").css("background","#FFECEC"); return false;}');
 $H->aj('var qianhoutoubu=$(".qianhoutoubu").val();if(qianhoutoubu==""){alert("请填写完整！");$(".qianhoutoubu").css("background","#FFECEC"); return false;}');
 $H->aj('var ertongzuoyi=$(".ertongzuoyi").val();if(ertongzuoyi==""){alert("请填写完整！");$(".ertongzuoyi").css("background","#FFECEC"); return false;}');
 $H->aj('var wuyaoshiqidong=$(".wuyaoshiqidong").val();if(wuyaoshiqidong==""){alert("请填写完整！");$(".wuyaoshiqidong").css("background","#FFECEC"); return false;}');
 $H->aj('var wuyaoshijinru=$(".wuyaoshijinru").val();if(wuyaoshijinru==""){alert("请填写完整！");$(".wuyaoshijinru").css("background","#FFECEC"); return false;}');
 $H->aj('var absfangbaosi=$(".absfangbaosi").val();if(absfangbaosi==""){alert("请填写完整！");$(".absfangbaosi").css("background","#FFECEC"); return false;}');
 $H->aj('var cheshenkongzhi=$(".cheshenkongzhi").val();if(cheshenkongzhi==""){alert("请填写完整！");$(".cheshenkongzhi").css("background","#FFECEC"); return false;}');
 $H->aj('var shangpofuzhu=$(".shangpofuzhu").val();if(shangpofuzhu==""){alert("请填写完整！");$(".shangpofuzhu").css("background","#FFECEC"); return false;}');
 $H->aj('var diandongtianchuang=$(".diandongtianchuang").val();if(diandongtianchuang==""){alert("请填写完整！");$(".diandongtianchuang").css("background","#FFECEC"); return false;}');
 $H->aj('var quanjingtianchuang=$(".quanjingtianchuang").val();if(quanjingtianchuang==""){alert("请填写完整！");$(".quanjingtianchuang").css("background","#FFECEC"); return false;}');
 $H->aj('var shanqidadeng=$(".shanqidadeng").val();if(shanqidadeng==""){alert("请填写完整！");$(".shanqidadeng").css("background","#FFECEC"); return false;}');
 $H->aj('var leddadeng=$(".leddadeng").val();if(leddadeng==""){alert("请填写完整！");$(".leddadeng").css("background","#FFECEC"); return false;}');
 $H->aj('var rijianxingchedengy=$(".rijianxingchedengy").val();if(rijianxingchedengy==""){alert("请填写完整！");$(".rijianxingchedengy").css("background","#FFECEC"); return false;}');
 $H->aj('var qianwudeng=$(".qianwudeng").val();if(qianwudeng==""){alert("请填写完整！");$(".qianwudeng").css("background","#FFECEC"); return false;}');
 $H->aj('var houshijing=$(".houshijing").val();if(houshijing==""){alert("请填写完整！");$(".houshijing").css("background","#FFECEC"); return false;}');
 $H->aj('var diandongchechuang=$(".diandongchechuang").val();if(diandongchechuang==""){alert("请填写完整！");$(".diandongchechuang").css("background","#FFECEC"); return false;}');
 $H->aj('var ganyingyushua=$(".ganyingyushua").val();if(ganyingyushua==""){alert("请填写完整！");$(".ganyingyushua").css("background","#FFECEC"); return false;}');
 $H->aj('var zhenpizuoyi=$(".zhenpizuoyi").val();if(zhenpizuoyi==""){alert("请填写完整！");$(".zhenpizuoyi").css("background","#FFECEC"); return false;}');
 $H->aj('var jiashizuodiandong=$(".jiashizuodiandong").val();if(jiashizuodiandong==""){alert("请填写完整！");$(".jiashizuodiandong").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoyijiare=$(".zuoyijiare").val();if(zuoyijiare==""){alert("请填写完整！");$(".zuoyijiare").css("background","#FFECEC"); return false;}');
 $H->aj('var houpaidaofang=$(".houpaidaofang").val();if(houpaidaofang==""){alert("请填写完整！");$(".houpaidaofang").css("background","#FFECEC"); return false;}');
 $H->aj('var zhenpifangxiangpan=$(".zhenpifangxiangpan").val();if(zhenpifangxiangpan==""){alert("请填写完整！");$(".zhenpifangxiangpan").css("background","#FFECEC"); return false;}');
 $H->aj('var duogongnengfangxiangpan=$(".duogongnengfangxiangpan").val();if(duogongnengfangxiangpan==""){alert("请填写完整！");$(".duogongnengfangxiangpan").css("background","#FFECEC"); return false;}');
 $H->aj('var fangxiangpanhuandang=$(".fangxiangpanhuandang").val();if(fangxiangpanhuandang==""){alert("请填写完整！");$(".fangxiangpanhuandang").css("background","#FFECEC"); return false;}');
 $H->aj('var dingsuxunhang=$(".dingsuxunhang").val();if(dingsuxunhang==""){alert("请填写完整！");$(".dingsuxunhang").css("background","#FFECEC"); return false;}');
 $H->aj('var kongtiao=$(".kongtiao").val();if(kongtiao==""){alert("请填写完整！");$(".kongtiao").css("background","#FFECEC"); return false;}');
 $H->aj('var waiguanxiang=$(".waiguanxiang").val();var len="";var waiguanxiang="";for(var n=0;n<$(".waiguanxiang").find("li input").length;n++){len++;}for(var e=0;e<len;e++){if($(".waiguanxiang").find("li input").eq(e).val()){waiguanxiang=waiguanxiang+"|"+$(".waiguanxiang").find("li input").eq(e).val();}}if(waiguanxiang==""){alert("请填写完整！");$(".waiguanxiang").css("background","#FFECEC"); return false;}');
 $H->aj('var waiguanimg=$(".waiguanimg").attr("src");if(waiguanimg==""){alert("请填写完整！");$(".waiguanimg").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoa=$(".zuoa").val();if(zuoa==""){alert("请填写完整！");$(".zuoa").css("background","#FFECEC"); return false;}');
 $H->aj('var zuob=$(".zuob").val();if(zuob==""){alert("请填写完整！");$(".zuob").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoc=$(".zuoc").val();if(zuoc==""){alert("请填写完整！");$(".zuoc").css("background","#FFECEC"); return false;}');
 $H->aj('var zuod=$(".zuod").val();if(zuod==""){alert("请填写完整！");$(".zuod").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoqian=$(".zuoqian").val();if(zuoqian==""){alert("请填写完整！");$(".zuoqian").css("background","#FFECEC"); return false;}');
 $H->aj('var zuohou=$(".zuohou").val();if(zuohou==""){alert("请填写完整！");$(".zuohou").css("background","#FFECEC"); return false;}');
 $H->aj('var qianfang=$(".qianfang").val();if(qianfang==""){alert("请填写完整！");$(".qianfang").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoqianl=$(".zuoqianl").val();if(zuoqianl==""){alert("请填写完整！");$(".zuoqianl").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoxia=$(".zuoxia").val();if(zuoxia==""){alert("请填写完整！");$(".zuoxia").css("background","#FFECEC"); return false;}');
 $H->aj('var youa=$(".youa").val();if(youa==""){alert("请填写完整！");$(".youa").css("background","#FFECEC"); return false;}');
 $H->aj('var youb=$(".youb").val();if(youb==""){alert("请填写完整！");$(".youb").css("background","#FFECEC"); return false;}');
 $H->aj('var youc=$(".youc").val();if(youc==""){alert("请填写完整！");$(".youc").css("background","#FFECEC"); return false;}');
 $H->aj('var youd=$(".youd").val();if(youd==""){alert("请填写完整！");$(".youd").css("background","#FFECEC"); return false;}');
 $H->aj('var youqian=$(".youqian").val();if(youqian==""){alert("请填写完整！");$(".youqian").css("background","#FFECEC"); return false;}');
 $H->aj('var youhou=$(".youhou").val();if(youhou==""){alert("请填写完整！");$(".youhou").css("background","#FFECEC"); return false;}');
 $H->aj('var houfang=$(".houfang").val();if(houfang==""){alert("请填写完整！");$(".houfang").css("background","#FFECEC"); return false;}');
 $H->aj('var youqianl=$(".youqianl").val();if(youqianl==""){alert("请填写完整！");$(".youqianl").css("background","#FFECEC"); return false;}');
 $H->aj('var youxia=$(".youxia").val();if(youxia==""){alert("请填写完整！");$(".youxia").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoshang=$(".zuoshang").val();if(zuoshang==""){alert("请填写完整！");$(".zuoshang").css("background","#FFECEC"); return false;}');
 $H->aj('var youshang=$(".youshang").val();if(youshang==""){alert("请填写完整！");$(".youshang").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoqiany=$(".zuoqiany").val();if(zuoqiany==""){alert("请填写完整！");$(".zuoqiany").css("background","#FFECEC"); return false;}');
 $H->aj('var youqiany=$(".youqiany").val();if(youqiany==""){alert("请填写完整！");$(".youqiany").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoqianj=$(".zuoqianj").val();if(zuoqianj==""){alert("请填写完整！");$(".zuoqianj").css("background","#FFECEC"); return false;}');
 $H->aj('var youqianj=$(".youqianj").val();if(youqianj==""){alert("请填写完整！");$(".youqianj").css("background","#FFECEC"); return false;}');
 $H->aj('var houbeid=$(".houbeid").val();if(houbeid==""){alert("请填写完整！");$(".houbeid").css("background","#FFECEC"); return false;}');
 $H->aj('var shuixiang=$(".shuixiang").val();if(shuixiang==""){alert("请填写完整！");$(".shuixiang").css("background","#FFECEC"); return false;}');
 $H->aj('var houweiban=$(".houweiban").val();if(houweiban==""){alert("请填写完整！");$(".houweiban").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoyi=$(".zuoyi").val();if(zuoyi==""){alert("请填写完整！");$(".zuoyi").css("background","#FFECEC"); return false;}');
 $H->aj('var anquandaidibu=$(".anquandaidibu").val();if(anquandaidibu==""){alert("请填写完整！");$(".anquandaidibu").css("background","#FFECEC"); return false;}');
 $H->aj('var chedimianzhan=$(".chedimianzhan").val();if(chedimianzhan==""){alert("请填写完整！");$(".chedimianzhan").css("background","#FFECEC"); return false;}');
 $H->aj('var xuanguaguding=$(".xuanguaguding").val();if(xuanguaguding==""){alert("请填写完整！");$(".xuanguaguding").css("background","#FFECEC"); return false;}');
 $H->aj('var beitaishuizi=$(".beitaishuizi").val();if(beitaishuizi==""){alert("请填写完整！");$(".beitaishuizi").css("background","#FFECEC"); return false;}');
 $H->aj('var chexiangdijiao=$(".chexiangdijiao").val();if(chexiangdijiao==""){alert("请填写完整！");$(".chexiangdijiao").css("background","#FFECEC"); return false;}');
 $H->aj('var cheneixianshu=$(".cheneixianshu").val();if(cheneixianshu==""){alert("请填写完整！");$(".cheneixianshu").css("background","#FFECEC"); return false;}');
 $H->aj('var fachexiangjiao=$(".fachexiangjiao").val();if(fachexiangjiao==""){alert("请填写完整！");$(".fachexiangjiao").css("background","#FFECEC"); return false;}');
 $H->aj('var cheshenjiaceng=$(".cheshenjiaceng").val();if(cheshenjiaceng==""){alert("请填写完整！");$(".cheshenjiaceng").css("background","#FFECEC"); return false;}');
 $H->aj('var fadongjicang=$(".fadongjicang").val();if(fadongjicang==""){alert("请填写完整！");$(".fadongjicang").css("background","#FFECEC"); return false;}');
 $H->aj('var yibiaotai=$(".yibiaotai").val();if(yibiaotai==""){alert("请填写完整！");$(".yibiaotai").css("background","#FFECEC"); return false;}');
 $H->aj('var fangxiangpan=$(".fangxiangpan").val();if(fangxiangpan==""){alert("请填写完整！");$(".fangxiangpan").css("background","#FFECEC"); return false;}');
 $H->aj('var dianyanqi=$(".dianyanqi").val();if(dianyanqi==""){alert("请填写完整！");$(".dianyanqi").css("background","#FFECEC"); return false;}');
 $H->aj('var zhongkongtai=$(".zhongkongtai").val();if(zhongkongtai==""){alert("请填写完整！");$(".zhongkongtai").css("background","#FFECEC"); return false;}');
 $H->aj('var dangba=$(".dangba").val();if(dangba==""){alert("请填写完整！");$(".dangba").css("background","#FFECEC"); return false;}');
 $H->aj('var shoutaoxiang=$(".shoutaoxiang").val();if(shoutaoxiang==""){alert("请填写完整！");$(".shoutaoxiang").css("background","#FFECEC"); return false;}');
 $H->aj('var chedingpeng=$(".chedingpeng").val();if(chedingpeng==""){alert("请填写完整！");$(".chedingpeng").css("background","#FFECEC"); return false;}');
 $H->aj('var zhuzheyangban=$(".zhuzheyangban").val();if(zhuzheyangban==""){alert("请填写完整！");$(".zhuzheyangban").css("background","#FFECEC"); return false;}');
 $H->aj('var fuzheyangpan=$(".fuzheyangpan").val();if(fuzheyangpan==""){alert("请填写完整！");$(".fuzheyangpan").css("background","#FFECEC"); return false;}');
 $H->aj('var cheneihoushijing=$(".cheneihoushijing").val();if(cheneihoushijing==""){alert("请填写完整！");$(".cheneihoushijing").css("background","#FFECEC"); return false;}');
 $H->aj('var sijizuoyi=$(".sijizuoyi").val();if(sijizuoyi==""){alert("请填写完整！");$(".sijizuoyi").css("background","#FFECEC"); return false;}');
 $H->aj('var fujiazuoyi=$(".fujiazuoyi").val();if(fujiazuoyi==""){alert("请填写完整！");$(".fujiazuoyi").css("background","#FFECEC"); return false;}');
 $H->aj('var houpaizuoyi=$(".houpaizuoyi").val();if(houpaizuoyi==""){alert("请填写完整！");$(".houpaizuoyi").css("background","#FFECEC"); return false;}');
 $H->aj('var zhongyangfushou=$(".zhongyangfushou").val();if(zhongyangfushou==""){alert("请填写完整！");$(".zhongyangfushou").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoqianmen=$(".zuoqianmen").val();if(zuoqianmen==""){alert("请填写完整！");$(".zuoqianmen").css("background","#FFECEC"); return false;}');
 $H->aj('var youqianmen=$(".youqianmen").val();if(youqianmen==""){alert("请填写完整！");$(".youqianmen").css("background","#FFECEC"); return false;}');
 $H->aj('var zuohoumen=$(".zuohoumen").val();if(zuohoumen==""){alert("请填写完整！");$(".zuohoumen").css("background","#FFECEC"); return false;}');
 $H->aj('var youhoumen=$(".youhoumen").val();if(youhoumen==""){alert("请填写完整！");$(".youhoumen").css("background","#FFECEC"); return false;}');
 $H->aj('var zuoqianfu=$(".zuoqianfu").val();if(zuoqianfu==""){alert("请填写完整！");$(".zuoqianfu").css("background","#FFECEC"); return false;}');
 $H->aj('var zuohoufu=$(".zuohoufu").val();if(zuohoufu==""){alert("请填写完整！");$(".zuohoufu").css("background","#FFECEC"); return false;}');
 $H->aj('var youqianfu=$(".youqianfu").val();if(youqianfu==""){alert("请填写完整！");$(".youqianfu").css("background","#FFECEC"); return false;}');
 $H->aj('var youhoufu=$(".youhoufu").val();if(youhoufu==""){alert("请填写完整！");$(".youhoufu").css("background","#FFECEC"); return false;}');
 $H->aj('var azhu=$(".azhu").val();if(azhu==""){alert("请填写完整！");$(".azhu").css("background","#FFECEC"); return false;}');
 $H->aj('var bzhu=$(".bzhu").val();if(bzhu==""){alert("请填写完整！");$(".bzhu").css("background","#FFECEC"); return false;}');
 $H->aj('var czhu=$(".czhu").val();if(czhu==""){alert("请填写完整！");$(".czhu").css("background","#FFECEC"); return false;}');
 $H->aj('var houbeixiang=$(".houbeixiang").val();if(houbeixiang==""){alert("请填写完整！");$(".houbeixiang").css("background","#FFECEC"); return false;}');
 $H->aj('var quanche=$(".quanche").val();if(quanche==""){alert("请填写完整！");$(".quanche").css("background","#FFECEC"); return false;}');
 $H->aj('var yibiaopan=$(".yibiaopan").val();if(yibiaopan==""){alert("请填写完整！");$(".yibiaopan").css("background","#FFECEC"); return false;}');
 $H->aj('var yushua=$(".yushua").val();if(yushua==""){alert("请填写完整！");$(".yushua").css("background","#FFECEC"); return false;}');
 $H->aj('var kongtiaos=$(".kongtiaos").val();if(kongtiaos==""){alert("请填写完整！");$(".kongtiaos").css("background","#FFECEC"); return false;}');
 $H->aj('var shousha=$(".shousha").val();if(shousha==""){alert("请填写完整！");$(".shousha").css("background","#FFECEC"); return false;}');
 $H->aj('var tianchuang=$(".tianchuang").val();if(tianchuang==""){alert("请填写完整！");$(".tianchuang").css("background","#FFECEC"); return false;}');
 $H->aj('var gps=$(".gps").val();if(gps==""){alert("请填写完整！");$(".gps").css("background","#FFECEC"); return false;}');
 $H->aj('var zhujiadiandong=$(".zhujiadiandong").val();if(zhujiadiandong==""){alert("请填写完整！");$(".zhujiadiandong").css("background","#FFECEC"); return false;}');
 $H->aj('var cheneiyuedu=$(".cheneiyuedu").val();if(cheneiyuedu==""){alert("请填写完整！");$(".cheneiyuedu").css("background","#FFECEC"); return false;}');
 $H->aj('var chechuang=$(".chechuang").val();if(chechuang==""){alert("请填写完整！");$(".chechuang").css("background","#FFECEC"); return false;}');
 $H->aj('var yinxiang=$(".yinxiang").val();if(yinxiang==""){alert("请填写完整！");$(".yinxiang").css("background","#FFECEC"); return false;}');
 $H->aj('var zhongkongsuo=$(".zhongkongsuo").val();if(zhongkongsuo==""){alert("请填写完整！");$(".zhongkongsuo").css("background","#FFECEC"); return false;}');
 $H->aj('var zhongkongxianshi=$(".zhongkongxianshi").val();if(zhongkongxianshi==""){alert("请填写完整！");$(".zhongkongxianshi").css("background","#FFECEC"); return false;}');
 $H->aj('var daocheleida=$(".daocheleida").val();if(daocheleida==""){alert("请填写完整！");$(".daocheleida").css("background","#FFECEC"); return false;}');
 $H->aj('var fujiadiandong=$(".fujiadiandong").val();if(fujiadiandong==""){alert("请填写完整！");$(".fujiadiandong").css("background","#FFECEC"); return false;}');
 $H->aj('var yibiaotishi=$(".yibiaotishi").val();if(yibiaotishi==""){alert("请填写完整！");$(".yibiaotishi").css("background","#FFECEC"); return false;}');
 $H->aj('var abs=$(".abs").val();if(abs==""){alert("请填写完整！");$(".abs").css("background","#FFECEC"); return false;}');
 $H->aj('var anqanqinang=$(".anqanqinang").val();if(anqanqinang==""){alert("请填写完整！");$(".anqanqinang").css("background","#FFECEC"); return false;}');
 $H->aj('var anquandai=$(".anquandai").val();if(anquandai==""){alert("请填写完整！");$(".anquandai").css("background","#FFECEC"); return false;}');
 $H->aj('var luntaiyizhi=$(".luntaiyizhi").val();if(luntaiyizhi==""){alert("请填写完整！");$(".luntaiyizhi").css("background","#FFECEC"); return false;}');
 $H->aj('var taiwen=$(".taiwen").val();if(taiwen==""){alert("请填写完整！");$(".taiwen").css("background","#FFECEC"); return false;}');
 $H->aj('var beitai=$(".beitai").val();if(beitai==""){alert("请填写完整！");$(".beitai").css("background","#FFECEC"); return false;}');
 $H->aj('var yuanguangdeng=$(".yuanguangdeng").val();if(yuanguangdeng==""){alert("请填写完整！");$(".yuanguangdeng").css("background","#FFECEC"); return false;}');
 $H->aj('var jinguangdeng=$(".jinguangdeng").val();if(jinguangdeng==""){alert("请填写完整！");$(".jinguangdeng").css("background","#FFECEC"); return false;}');
 $H->aj('var wudeng=$(".wudeng").val();if(wudeng==""){alert("请填写完整！");$(".wudeng").css("background","#FFECEC"); return false;}');
 $H->aj('var zhuanxiangdeng=$(".zhuanxiangdeng").val();if(zhuanxiangdeng==""){alert("请填写完整！");$(".zhuanxiangdeng").css("background","#FFECEC"); return false;}');
 $H->aj('var weideng=$(".weideng").val();if(weideng==""){alert("请填写完整！");$(".weideng").css("background","#FFECEC"); return false;}');
 $H->aj('var shachedeng=$(".shachedeng").val();if(shachedeng==""){alert("请填写完整！");$(".shachedeng").css("background","#FFECEC"); return false;}');
 $H->aj('var rijianxingchedeng=$(".rijianxingchedeng").val();if(rijianxingchedeng==""){alert("请填写完整！");$(".rijianxingchedeng").css("background","#FFECEC"); return false;}');
 $H->aj('var jiyou=$(".jiyou").val();if(jiyou==""){alert("请填写完整！");$(".jiyou").css("background","#FFECEC"); return false;}');
 $H->aj('var sanreqi=$(".sanreqi").val();if(sanreqi==""){alert("请填写完整！");$(".sanreqi").css("background","#FFECEC"); return false;}');
 $H->aj('var xudianchishenlou=$(".xudianchishenlou").val();if(xudianchishenlou==""){alert("请填写完整！");$(".xudianchishenlou").css("background","#FFECEC"); return false;}');
 $H->aj('var youguan=$(".youguan").val();if(youguan==""){alert("请填写完整！");$(".youguan").css("background","#FFECEC"); return false;}');
 $H->aj('var xianshulaohua=$(".xianshulaohua").val();if(xianshulaohua==""){alert("请填写完整！");$(".xianshulaohua").css("background","#FFECEC"); return false;}');
 $H->aj('var ganggai=$(".ganggai").val();if(ganggai==""){alert("请填写完整！");$(".ganggai").css("background","#FFECEC"); return false;}');
 $H->aj('var xudianchifushi=$(".xudianchifushi").val();if(xudianchifushi==""){alert("请填写完整！");$(".xudianchifushi").css("background","#FFECEC"); return false;}');
 $H->aj('var fadongjipidai=$(".fadongjipidai").val();if(fadongjipidai==""){alert("请填写完整！");$(".fadongjipidai").css("background","#FFECEC"); return false;}');
 $H->aj('var shuiguanlaohua=$(".shuiguanlaohua").val();if(shuiguanlaohua==""){alert("请填写完整！");$(".shuiguanlaohua").css("background","#FFECEC"); return false;}');//cplr:cplr,
 $H->aj("$.post('FY_A_CP.php?/2.html',{bt:cpbt,cppp:cppp,chexi:chexi,cheling:cheling,diqu:diqu,cpsx0:cpsx0,cpsx1:cpsx1,cpsx2:cpsx2,paifang:paifang,paifangliang:paifangliang,biansu:biansu,licheng:licheng,cpms:cpms,shangpai:shangpai,cpimg:cpimg,
jiance:jiance,
chexi:chexi,
pingceshi:pingceshi,
yanse:yanse,
guishudi:guishudi,
nianjian:nianjian,
guohu:guohu,
jiaoqiang:jiaoqiang,
fapiao:fapiao,
shangye:shangye,
fours:fours,
zhidaojia:zhidaojia,
jibie:jibie,
fadongji:fadongji,
bs:bs,
changkuangao:changkuangao,
zhouju:zhouju,
cheshenjiegou:cheshenjiegou,
zhiliang:zhiliang,
rongji:rongji,
fadongjixinghao:fadongjixinghao,
pailiang:pailiang,
jinqi:jinqi,
qigang:qigang,
yasuobi:yasuobi,
zuidamali:zuidamali,
zuidaniuju:zuidaniuju,
ranyoubiaohao:ranyoubiaohao,
gongyou:gongyou,
qudong:qudong,
qianxuanjia:qianxuanjia,
houxuanjia:houxuanjia,
zhuli:zhuli,
qianzhi:qianzhi,
houzhi:houzhi,
lunquan:lunquan,
qiantai:qiantai,
houtai:houtai,
zhufuanquan:zhufuanquan,
qianhoucebu:qianhoucebu,
qianhoutoubu:qianhoutoubu,
ertongzuoyi:ertongzuoyi,
wuyaoshiqidong:wuyaoshiqidong,
wuyaoshijinru:wuyaoshijinru,
absfangbaosi:absfangbaosi,
cheshenkongzhi:cheshenkongzhi,
shangpofuzhu:shangpofuzhu,
diandongtianchuang:diandongtianchuang,
quanjingtianchuang:quanjingtianchuang,
shanqidadeng:shanqidadeng,
leddadeng:leddadeng,
rijianxingchedengy:rijianxingchedengy,
qianwudeng:qianwudeng,
houshijing:houshijing,
diandongchechuang:diandongchechuang,
ganyingyushua:ganyingyushua,
zhenpizuoyi:zhenpizuoyi,
jiashizuodiandong:jiashizuodiandong,
zuoyijiare:zuoyijiare,
houpaidaofang:houpaidaofang,
zhenpifangxiangpan:zhenpifangxiangpan,
duogongnengfangxiangpan:duogongnengfangxiangpan,
fangxiangpanhuandang:fangxiangpanhuandang,
dingsuxunhang:dingsuxunhang,
kongtiao:kongtiao,
waiguanxiang:waiguanxiang,
waiguanimg:waiguanimg,
zuoa:zuoa,
zuob:zuob,
zuoc:zuoc,
zuod:zuod,
zuoqian:zuoqian,
zuohou:zuohou,
qianfang:qianfang,
zuoqianl:zuoqianl,
zuoxia:zuoxia,
youa:youa,
youb:youb,
youc:youc,
youd:youd,
youqian:youqian,
youhou:youhou,
houfang:houfang,
youqianl:youqianl,
youxia:youxia,
zuoshang:zuoshang,
youshang:youshang,
zuoqiany:zuoqiany,
youqiany:youqiany,
zuoqianj:zuoqianj,
youqianj:youqianj,
houbeid:houbeid,
shuixiang:shuixiang,
houweiban:houweiban,
zuoyi:zuoyi,
anquandaidibu:anquandaidibu,
chedimianzhan:chedimianzhan,
xuanguaguding:xuanguaguding,
beitaishuizi:beitaishuizi,
chexiangdijiao:chexiangdijiao,
cheneixianshu:cheneixianshu,
fachexiangjiao:fachexiangjiao,
cheshenjiaceng:cheshenjiaceng,
fadongjicang:fadongjicang,
yibiaotai:yibiaotai,
fangxiangpan:fangxiangpan,
dianyanqi:dianyanqi,
zhongkongtai:zhongkongtai,
dangba:dangba,
shoutaoxiang:shoutaoxiang,
chedingpeng:chedingpeng,
zhuzheyangban:zhuzheyangban,
fuzheyangpan:fuzheyangpan,
cheneihoushijing:cheneihoushijing,
sijizuoyi:sijizuoyi,
fujiazuoyi:fujiazuoyi,
houpaizuoyi:houpaizuoyi,
zhongyangfushou:zhongyangfushou,
zuoqianmen:zuoqianmen,
youqianmen:youqianmen,
zuohoumen:zuohoumen,
youhoumen:youhoumen,
zuoqianfu:zuoqianfu,
zuohoufu:zuohoufu,
youqianfu:youqianfu,
youhoufu:youhoufu,
azhu:azhu,
bzhu:bzhu,
czhu:czhu,
houbeixiang:houbeixiang,
quanche:quanche,
yibiaopan:yibiaopan,
yushua:yushua,
kongtiaos:kongtiaos,
shousha:shousha,
tianchuang:tianchuang,
gps:gps,
zhujiadiandong:zhujiadiandong,
cheneiyuedu:cheneiyuedu,
chechuang:chechuang,
yinxiang:yinxiang,
zhongkongsuo:zhongkongsuo,
zhongkongxianshi:zhongkongxianshi,
daocheleida:daocheleida,
fujiadiandong:fujiadiandong,
yibiaotishi:yibiaotishi,
abs:abs,
anqanqinang:anqanqinang,
anquandai:anquandai,
luntaiyizhi:luntaiyizhi,
taiwen:taiwen,
beitai:beitai,
yuanguangdeng:yuanguangdeng,
jinguangdeng:jinguangdeng,
wudeng:wudeng,
zhuanxiangdeng:zhuanxiangdeng,
weideng:weideng,
shachedeng:shachedeng,
rijianxingchedeng:rijianxingchedeng,
jiyou:jiyou,
sanreqi:sanreqi,
xudianchishenlou:xudianchishenlou,
youguan:youguan,
xianshulaohua:xianshulaohua,
ganggai:ganggai,
xudianchifushi:xudianchifushi,
fadongjipidai:fadongjipidai,
shuiguanlaohua:shuiguanlaohua,lr:xqimg,cheyuanhao:cheyuanhao,jieshengjia:jieshengjia,cheshui:cheshui,yls:yls,fuwufei:fuwufei,fuwuxiang:fuwuxiang,chezhuxinxi:chezhuxinxi,yewudianhua:yewudianhua,id:".$Wf."},function(z){gdor('[ '+cpbt+' ]'+z+'！','ok','FY_A_CP.php');});");
 $H->aj("});");
 
}elseif($Wz==2){
  ZY();
  $lr=rp("lr");
  $bt=rp("bt");
  $ms=rp("cpms");
  $zz=rp("cheling");
  $jy=rp("diqu");
  $pp=rp("cppp");
  $sxz=rp("cpsx0");
  $sxf=rp("cpsx1");
  $sxt=rp("cpsx2");
  $cx=rp("chexi");
  $pf=rp("paifang");
  $paifangliang=rp("paifangliang");
  $bs1=rp("biansu");
  $lc=rp("licheng");
  $sp=rp("shangpai");
$jiance=rp('jiance');
$pingceshi=rp('pingceshi');
$yanse=rp('yanse');
$guishudi=rp('guishudi');
$nianjian=rp('nianjian');
$guohu=rp('guohu');
$jiaoqiang=rp('jiaoqiang');
$fapiao=rp('fapiao');
$shangye=rp('shangye');
$fours=rp('fours');
$zhidaojia=rp('zhidaojia');
$jibie=rp('jibie');
$fadongji=rp('fadongji');
$bs=rp('bs');
$changkuangao=rp('changkuangao');
$zhouju=rp('zhouju');
$cheshenjiegou=rp('cheshenjiegou');
$zhiliang=rp('zhiliang');
$rongji=rp('rongji');
$fadongjixinghao=rp('fadongjixinghao');
$pailiang=rp('pailiang');
$jinqi=rp('jinqi');
$qigang=rp('qigang');
$yasuobi=rp('yasuobi');
$zuidamali=rp('zuidamali');
$zuidaniuju=rp('zuidaniuju');
$ranyoubiaohao=rp('ranyoubiaohao');
$gongyou=rp('gongyou');
$qudong=rp('qudong');
$qianxuanjia=rp('qianxuanjia');
$houxuanjia=rp('houxuanjia');
$zhuli=rp('zhuli');
$qianzhi=rp('qianzhi');
$houzhi=rp('houzhi');
$lunquan=rp('lunquan');
$qiantai=rp('qiantai');
$houtai=rp('houtai');
$zhufuanquan=rp('zhufuanquan');
$qianhoucebu=rp('qianhoucebu');
$qianhoutoubu=rp('qianhoutoubu');
$ertongzuoyi=rp('ertongzuoyi');
$wuyaoshiqidong=rp('wuyaoshiqidong');
$wuyaoshijinru=rp('wuyaoshijinru');
$absfangbaosi=rp('absfangbaosi');
$cheshenkongzhi=rp('cheshenkongzhi');
$shangpofuzhu=rp('shangpofuzhu');
$diandongtianchuang=rp('diandongtianchuang');
$quanjingtianchuang=rp('quanjingtianchuang');
$shanqidadeng=rp('shanqidadeng');
$leddadeng=rp('leddadeng');
$rijianxingchedengy=rp('rijianxingchedengy');
$qianwudeng=rp('qianwudeng');
$houshijing=rp('houshijing');
$diandongchechuang=rp('diandongchechuang');
$ganyingyushua=rp('ganyingyushua');
$zhenpizuoyi=rp('zhenpizuoyi');
$jiashizuodiandong=rp('jiashizuodiandong');
$zuoyijiare=rp('zuoyijiare');
$houpaidaofang=rp('houpaidaofang');
$zhenpifangxiangpan=rp('zhenpifangxiangpan');
$duogongnengfangxiangpan=rp('duogongnengfangxiangpan');
$fangxiangpanhuandang=rp('fangxiangpanhuandang');
$dingsuxunhang=rp('dingsuxunhang');
$kongtiao=rp('kongtiao');
$waiguanxiang=rp('waiguanxiang');
$waiguanimg=rp('waiguanimg');
$zuoa=rp('zuoa');
$zuob=rp('zuob');
$zuoc=rp('zuoc');
$zuod=rp('zuod');
$zuoqian=rp('zuoqian');
$zuohou=rp('zuohou');
$qianfang=rp('qianfang');
$zuoqianl=rp('zuoqianl');
$zuoxia=rp('zuoxia');
$youa=rp('youa');
$youb=rp('youb');
$youc=rp('youc');
$youd=rp('youd');
$youqian=rp('youqian');
$youhou=rp('youhou');
$houfang=rp('houfang');
$youqianl=rp('youqianl');
$youxia=rp('youxia');
$zuoshang=rp('zuoshang');
$youshang=rp('youshang');
$zuoqiany=rp('zuoqiany');
$youqiany=rp('youqiany');
$zuoqianj=rp('zuoqianj');
$youqianj=rp('youqianj');
$houbeid=rp('houbeid');
$shuixiang=rp('shuixiang');
$houweiban=rp('houweiban');
$zuoyi=rp('zuoyi');
$anquandaidibu=rp('anquandaidibu');
$chedimianzhan=rp('chedimianzhan');
$xuanguaguding=rp('xuanguaguding');
$beitaishuizi=rp('beitaishuizi');
$chexiangdijiao=rp('chexiangdijiao');
$cheneixianshu=rp('cheneixianshu');
$fachexiangjiao=rp('fachexiangjiao');
$cheshenjiaceng=rp('cheshenjiaceng');
$fadongjicang=rp('fadongjicang');
$yibiaotai=rp('yibiaotai');
$fangxiangpan=rp('fangxiangpan');
$dianyanqi=rp('dianyanqi');
$zhongkongtai=rp('zhongkongtai');
$dangba=rp('dangba');
$shoutaoxiang=rp('shoutaoxiang');
$chedingpeng=rp('chedingpeng');
$zhuzheyangban=rp('zhuzheyangban');
$fuzheyangpan=rp('fuzheyangpan');
$cheneihoushijing=rp('cheneihoushijing');
$sijizuoyi=rp('sijizuoyi');
$fujiazuoyi=rp('fujiazuoyi');
$houpaizuoyi=rp('houpaizuoyi');
$zhongyangfushou=rp('zhongyangfushou');
$zuoqianmen=rp('zuoqianmen');
$youqianmen=rp('youqianmen');
$zuohoumen=rp('zuohoumen');
$youhoumen=rp('youhoumen');
$zuoqianfu=rp('zuoqianfu');
$zuohoufu=rp('zuohoufu');
$youqianfu=rp('youqianfu');
$youhoufu=rp('youhoufu');
$azhu=rp('azhu');
$bzhu=rp('bzhu');
$czhu=rp('czhu');
$houbeixiang=rp('houbeixiang');
$quanche=rp('quanche');
$yibiaopan=rp('yibiaopan');
$yushua=rp('yushua');
$kongtiaos=rp('kongtiaos');
$shousha=rp('shousha');
$tianchuang=rp('tianchuang');
$gps=rp('gps');
$zhujiadiandong=rp('zhujiadiandong');
$cheneiyuedu=rp('cheneiyuedu');
$chechuang=rp('chechuang');
$yinxiang=rp('yinxiang');
$zhongkongsuo=rp('zhongkongsuo');
$zhongkongxianshi=rp('zhongkongxianshi');
$daocheleida=rp('daocheleida');
$fujiadiandong=rp('fujiadiandong');
$yibiaotishi=rp('yibiaotishi');
$abs=rp('abs');
$anqanqinang=rp('anqanqinang');
$anquandai=rp('anquandai');
$luntaiyizhi=rp('luntaiyizhi');
$taiwen=rp('taiwen');
$beitai=rp('beitai');
$yuanguangdeng=rp('yuanguangdeng');
$jinguangdeng=rp('jinguangdeng');
$wudeng=rp('wudeng');
$zhuanxiangdeng=rp('zhuanxiangdeng');
$weideng=rp('weideng');
$shachedeng=rp('shachedeng');
$rijianxingchedeng=rp('rijianxingchedeng');
$jiyou=rp('jiyou');
$sanreqi=rp('sanreqi');
$xudianchishenlou=rp('xudianchishenlou');
$youguan=rp('youguan');
$xianshulaohua=rp('xianshulaohua');
$ganggai=rp('ganggai');
$xudianchifushi=rp('xudianchifushi');
$fadongjipidai=rp('fadongjipidai');
$shuiguanlaohua=rp('shuiguanlaohua');
$cheyuanhao=rp('cheyuanhao');
$jieshengjia=rp('jieshengjia');
$cheshui=rp('cheshui');
$yls=rp('yls');
$fuwufei=rp('fuwufei');
$fuwuxiang=rp('fuwuxiang');
$chexi=rp('chexi');
$chezhuxinxi=rp('chezhuxinxi');
$yewudianhua=rp('yewudianhua');
  $sxf=IIF($sxf,$sxf,0);
  $sxz=IIF($sxz,$sxz,0);
  $sxt=IIF($sxt,$sxt,0);
  $yls=IIF($yls,$yls,0);
  
  $img=rp("cpimg");
  // $lr=rp("cplr");
  $id=rp("id");
  if($id==0){
    $DB->add('a_cp',array('lr','bt','pp','ms','sxz','sxf','sxt','ly','zz','img','jy','cx','pf','paifangliang','bs1','lc','sp','tjdj',
'jiance',
'pingceshi',
'yanse',
'guishudi',
'nianjian',
'guohu',
'jiaoqiang',
'fapiao',
'shangye',
'fours',
'zhidaojia',
'jibie',
'fadongji',
'bs',
'changkuangao',
'zhouju',
'cheshenjiegou',
'zhiliang',
'rongji',
'fadongjixinghao',
'pailiang',
'jinqi',
'qigang',
'yasuobi',
'zuidamali',
'zuidaniuju',
'ranyoubiaohao',
'gongyou',
'qudong',
'qianxuanjia',
'houxuanjia',
'zhuli',
'qianzhi',
'houzhi',
'lunquan',
'qiantai',
'houtai',
'zhufuanquan',
'qianhoucebu',
'qianhoutoubu',
'ertongzuoyi',
'wuyaoshiqidong',
'wuyaoshijinru',
'absfangbaosi',
'cheshenkongzhi',
'shangpofuzhu',
'diandongtianchuang',
'quanjingtianchuang',
'shanqidadeng',
'leddadeng',
'rijianxingchedengy',
'qianwudeng',
'houshijing',
'diandongchechuang',
'ganyingyushua',
'zhenpizuoyi',
'jiashizuodiandong',
'zuoyijiare',
'houpaidaofang',
'zhenpifangxiangpan',
'duogongnengfangxiangpan',
'fangxiangpanhuandang',
'dingsuxunhang',
'kongtiao',
'waiguanxiang',
'waiguanimg',
'zuoa',
'zuob',
'zuoc',
'zuod',
'zuoqian',
'zuohou',
'qianfang',
'zuoqianl',
'zuoxia',
'youa',
'youb',
'youc',
'youd',
'youqian',
'youhou',
'houfang',
'youqianl',
'youxia',
'zuoshang',
'youshang',
'zuoqiany',
'youqiany',
'zuoqianj',
'youqianj',
'houbeid',
'shuixiang',
'houweiban',
'zuoyi',
'anquandaidibu',
'chedimianzhan',
'xuanguaguding',
'beitaishuizi',
'chexiangdijiao',
'cheneixianshu',
'fachexiangjiao',
'cheshenjiaceng',
'fadongjicang',
'yibiaotai',
'fangxiangpan',
'dianyanqi',
'zhongkongtai',
'dangba',
'shoutaoxiang',
'chedingpeng',
'zhuzheyangban',
'fuzheyangpan',
'cheneihoushijing',
'sijizuoyi',
'fujiazuoyi',
'houpaizuoyi',
'zhongyangfushou',
'zuoqianmen',
'youqianmen',
'zuohoumen',
'youhoumen',
'zuoqianfu',
'zuohoufu',
'youqianfu',
'youhoufu',
'azhu',
'bzhu',
'czhu',
'houbeixiang',
'quanche',
'yibiaopan',
'yushua',
'kongtiaos',
'shousha',
'tianchuang',
'gps',
'zhujiadiandong',
'cheneiyuedu',
'chechuang',
'yinxiang',
'zhongkongsuo',
'zhongkongxianshi',
'daocheleida',
'fujiadiandong',
'yibiaotishi',
'abs',
'anqanqinang',
'anquandai',
'luntaiyizhi',
'taiwen',
'beitai',
'yuanguangdeng',
'jinguangdeng',
'wudeng',
'zhuanxiangdeng',
'weideng',
'shachedeng',
'rijianxingchedeng',
'jiyou',
'sanreqi',
'xudianchishenlou',
'youguan',
'xianshulaohua',
'ganggai',
'xudianchifushi',
'fadongjipidai',
'shuiguanlaohua',
'cheyuanhao',
'jieshengjia',
'cheshui',
'yls',
'fuwufei',
'fuwuxiang',
'chexi',
'yewudianhua',
'chezhuxinxi'),
                      array($lr,$bt,$pp,$ms,$sxz,$sxf,$sxt,$ly,$zz,$img,$jy,$cx,$pf,$paifangliang,$bs1,$lc,$sp,date('Y-m-d H:i:s'),
$jiance,
$pingceshi,
$yanse,
$guishudi,
$nianjian,
$guohu,
$jiaoqiang,
$fapiao,
$shangye,
$fours,
$zhidaojia,
$jibie,
$fadongji,
$bs,
$changkuangao,
$zhouju,
$cheshenjiegou,
$zhiliang,
$rongji,
$fadongjixinghao,
$pailiang,
$jinqi,
$qigang,
$yasuobi,
$zuidamali,
$zuidaniuju,
$ranyoubiaohao,
$gongyou,
$qudong,
$qianxuanjia,
$houxuanjia,
$zhuli,
$qianzhi,
$houzhi,
$lunquan,
$qiantai,
$houtai,
$zhufuanquan,
$qianhoucebu,
$qianhoutoubu,
$ertongzuoyi,
$wuyaoshiqidong,
$wuyaoshijinru,
$absfangbaosi,
$cheshenkongzhi,
$shangpofuzhu,
$diandongtianchuang,
$quanjingtianchuang,
$shanqidadeng,
$leddadeng,
$rijianxingchedengy,
$qianwudeng,
$houshijing,
$diandongchechuang,
$ganyingyushua,
$zhenpizuoyi,
$jiashizuodiandong,
$zuoyijiare,
$houpaidaofang,
$zhenpifangxiangpan,
$duogongnengfangxiangpan,
$fangxiangpanhuandang,
$dingsuxunhang,
$kongtiao,
$waiguanxiang,
$waiguanimg,
$zuoa,
$zuob,
$zuoc,
$zuod,
$zuoqian,
$zuohou,
$qianfang,
$zuoqianl,
$zuoxia,
$youa,
$youb,
$youc,
$youd,
$youqian,
$youhou,
$houfang,
$youqianl,
$youxia,
$zuoshang,
$youshang,
$zuoqiany,
$youqiany,
$zuoqianj,
$youqianj,
$houbeid,
$shuixiang,
$houweiban,
$zuoyi,
$anquandaidibu,
$chedimianzhan,
$xuanguaguding,
$beitaishuizi,
$chexiangdijiao,
$cheneixianshu,
$fachexiangjiao,
$cheshenjiaceng,
$fadongjicang,
$yibiaotai,
$fangxiangpan,
$dianyanqi,
$zhongkongtai,
$dangba,
$shoutaoxiang,
$chedingpeng,
$zhuzheyangban,
$fuzheyangpan,
$cheneihoushijing,
$sijizuoyi,
$fujiazuoyi,
$houpaizuoyi,
$zhongyangfushou,
$zuoqianmen,
$youqianmen,
$zuohoumen,
$youhoumen,
$zuoqianfu,
$zuohoufu,
$youqianfu,
$youhoufu,
$azhu,
$bzhu,
$czhu,
$houbeixiang,
$quanche,
$yibiaopan,
$yushua,
$kongtiaos,
$shousha,
$tianchuang,
$gps,
$zhujiadiandong,
$cheneiyuedu,
$chechuang,
$yinxiang,
$zhongkongsuo,
$zhongkongxianshi,
$daocheleida,
$fujiadiandong,
$yibiaotishi,
$abs,
$anqanqinang,
$anquandai,
$luntaiyizhi,
$taiwen,
$beitai,
$yuanguangdeng,
$jinguangdeng,
$wudeng,
$zhuanxiangdeng,
$weideng,
$shachedeng,
$rijianxingchedeng,
$jiyou,
$sanreqi,
$xudianchishenlou,
$youguan,
$xianshulaohua,
$ganggai,
$xudianchifushi,
$fadongjipidai,
$shuiguanlaohua,
$cheyuanhao,
$jieshengjia,
$cheshui,
$yls,
$fuwufei,
$fuwuxiang,
$chexi,
$yewudianhua,
$chezhuxinxi));
    die("成功添加！");
  }elseif($id>0){
    $DB->upd('a_cp',array('lr','bt','pp','ms','sxz','sxf','sxt','ly','zz','img','jy','cx','pf','paifangliang','bs1','lc','sp',
'jiance',
'pingceshi',
'yanse',
'guishudi',
'nianjian',
'guohu',
'jiaoqiang',
'fapiao',
'shangye',
'fours',
'zhidaojia',
'jibie',
'fadongji',
'bs',
'changkuangao',
'zhouju',
'cheshenjiegou',
'zhiliang',
'rongji',
'fadongjixinghao',
'pailiang',
'jinqi',
'qigang',
'yasuobi',
'zuidamali',
'zuidaniuju',
'ranyoubiaohao',
'gongyou',
'qudong',
'qianxuanjia',
'houxuanjia',
'zhuli',
'qianzhi',
'houzhi',
'lunquan',
'qiantai',
'houtai',
'zhufuanquan',
'qianhoucebu',
'qianhoutoubu',
'ertongzuoyi',
'wuyaoshiqidong',
'wuyaoshijinru',
'absfangbaosi',
'cheshenkongzhi',
'shangpofuzhu',
'diandongtianchuang',
'quanjingtianchuang',
'shanqidadeng',
'leddadeng',
'rijianxingchedengy',
'qianwudeng',
'houshijing',
'diandongchechuang',
'ganyingyushua',
'zhenpizuoyi',
'jiashizuodiandong',
'zuoyijiare',
'houpaidaofang',
'zhenpifangxiangpan',
'duogongnengfangxiangpan',
'fangxiangpanhuandang',
'dingsuxunhang',
'kongtiao',
'waiguanxiang',
'waiguanimg',
'zuoa',
'zuob',
'zuoc',
'zuod',
'zuoqian',
'zuohou',
'qianfang',
'zuoqianl',
'zuoxia',
'youa',
'youb',
'youc',
'youd',
'youqian',
'youhou',
'houfang',
'youqianl',
'youxia',
'zuoshang',
'youshang',
'zuoqiany',
'youqiany',
'zuoqianj',
'youqianj',
'houbeid',
'shuixiang',
'houweiban',
'zuoyi',
'anquandaidibu',
'chedimianzhan',
'xuanguaguding',
'beitaishuizi',
'chexiangdijiao',
'cheneixianshu',
'fachexiangjiao',
'cheshenjiaceng',
'fadongjicang',
'yibiaotai',
'fangxiangpan',
'dianyanqi',
'zhongkongtai',
'dangba',
'shoutaoxiang',
'chedingpeng',
'zhuzheyangban',
'fuzheyangpan',
'cheneihoushijing',
'sijizuoyi',
'fujiazuoyi',
'houpaizuoyi',
'zhongyangfushou',
'zuoqianmen',
'youqianmen',
'zuohoumen',
'youhoumen',
'zuoqianfu',
'zuohoufu',
'youqianfu',
'youhoufu',
'azhu',
'bzhu',
'czhu',
'houbeixiang',
'quanche',
'yibiaopan',
'yushua',
'kongtiaos',
'shousha',
'tianchuang',
'gps',
'zhujiadiandong',
'cheneiyuedu',
'chechuang',
'yinxiang',
'zhongkongsuo',
'zhongkongxianshi',
'daocheleida',
'fujiadiandong',
'yibiaotishi',
'abs',
'anqanqinang',
'anquandai',
'luntaiyizhi',
'taiwen',
'beitai',
'yuanguangdeng',
'jinguangdeng',
'wudeng',
'zhuanxiangdeng',
'weideng',
'shachedeng',
'rijianxingchedeng',
'jiyou',
'sanreqi',
'xudianchishenlou',
'youguan',
'xianshulaohua',
'ganggai',
'xudianchifushi',
'fadongjipidai',
'shuiguanlaohua',
'cheyuanhao',
'jieshengjia',
'cheshui',
'yls',
'fuwufei',
'fuwuxiang',
'chexi',
'yewudianhua',
'chezhuxinxi'),array($lr,$bt,$pp,$ms,$sxz,$sxf,$sxt,$ly,$zz,$img,$jy,$cx,$pf,$paifangliang,$bs,$lc,$sp,
$jiance,
$pingceshi,
$yanse,
$guishudi,
$nianjian,
$guohu,
$jiaoqiang,
$fapiao,
$shangye,
$fours,
$zhidaojia,
$jibie,
$fadongji,
$bs,
$changkuangao,
$zhouju,
$cheshenjiegou,
$zhiliang,
$rongji,
$fadongjixinghao,
$pailiang,
$jinqi,
$qigang,
$yasuobi,
$zuidamali,
$zuidaniuju,
$ranyoubiaohao,
$gongyou,
$qudong,
$qianxuanjia,
$houxuanjia,
$zhuli,
$qianzhi,
$houzhi,
$lunquan,
$qiantai,
$houtai,
$zhufuanquan,
$qianhoucebu,
$qianhoutoubu,
$ertongzuoyi,
$wuyaoshiqidong,
$wuyaoshijinru,
$absfangbaosi,
$cheshenkongzhi,
$shangpofuzhu,
$diandongtianchuang,
$quanjingtianchuang,
$shanqidadeng,
$leddadeng,
$rijianxingchedengy,
$qianwudeng,
$houshijing,
$diandongchechuang,
$ganyingyushua,
$zhenpizuoyi,
$jiashizuodiandong,
$zuoyijiare,
$houpaidaofang,
$zhenpifangxiangpan,
$duogongnengfangxiangpan,
$fangxiangpanhuandang,
$dingsuxunhang,
$kongtiao,
$waiguanxiang,
$waiguanimg,
$zuoa,
$zuob,
$zuoc,
$zuod,
$zuoqian,
$zuohou,
$qianfang,
$zuoqianl,
$zuoxia,
$youa,
$youb,
$youc,
$youd,
$youqian,
$youhou,
$houfang,
$youqianl,
$youxia,
$zuoshang,
$youshang,
$zuoqiany,
$youqiany,
$zuoqianj,
$youqianj,
$houbeid,
$shuixiang,
$houweiban,
$zuoyi,
$anquandaidibu,
$chedimianzhan,
$xuanguaguding,
$beitaishuizi,
$chexiangdijiao,
$cheneixianshu,
$fachexiangjiao,
$cheshenjiaceng,
$fadongjicang,
$yibiaotai,
$fangxiangpan,
$dianyanqi,
$zhongkongtai,
$dangba,
$shoutaoxiang,
$chedingpeng,
$zhuzheyangban,
$fuzheyangpan,
$cheneihoushijing,
$sijizuoyi,
$fujiazuoyi,
$houpaizuoyi,
$zhongyangfushou,
$zuoqianmen,
$youqianmen,
$zuohoumen,
$youhoumen,
$zuoqianfu,
$zuohoufu,
$youqianfu,
$youhoufu,
$azhu,
$bzhu,
$czhu,
$houbeixiang,
$quanche,
$yibiaopan,
$yushua,
$kongtiaos,
$shousha,
$tianchuang,
$gps,
$zhujiadiandong,
$cheneiyuedu,
$chechuang,
$yinxiang,
$zhongkongsuo,
$zhongkongxianshi,
$daocheleida,
$fujiadiandong,
$yibiaotishi,
$abs,
$anqanqinang,
$anquandai,
$luntaiyizhi,
$taiwen,
$beitai,
$yuanguangdeng,
$jinguangdeng,
$wudeng,
$zhuanxiangdeng,
$weideng,
$shachedeng,
$rijianxingchedeng,
$jiyou,
$sanreqi,
$xudianchishenlou,
$youguan,
$xianshulaohua,
$ganggai,
$xudianchifushi,
$fadongjipidai,
$shuiguanlaohua,
$cheyuanhao,
$jieshengjia,
$cheshui,
$yls,
$fuwufei,
$fuwuxiang,
$chexi,
$yewudianhua,
$chezhuxinxi),"id=$id");
    die("成功修改！");
  }
}elseif($Wz==3){
  $id=CF(rp("id"),",");
  for($i=0;$i<CFZ($id);$i++){
    $DB->del('a_cp',"id=".$id[$i]);
  }
    die("成功删除！");
}
 
 if($Ws!=-3){$H->aj("jzwc();");}
 $H->aj("djrt('a_cp','FY_A_CP.php');");
 echo $H->x();
?>