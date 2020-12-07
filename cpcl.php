<?php
require_once('FY_fun/FY_qt.php');
ZY();
$arr=rp("arr");
// var_dump($arr);
$fx='';
$string='';
@$fy=$arr['fy'];
$Wz=R($fy,0);
$Ws=R(1,0);
$tj='';
$DB->FCZ();
$DB->fb="a_cp";
$DB->fa=10;
// 20
@$cx=$arr['cx'];
@$jibie=$arr['jibie'];
@$chexi=$arr['chexi'];
@$pp=$arr['pp'];
@$yls=$arr['yls'];
@$zz=$arr['zz'];
@$jy=$arr['guishudi'];
@$pf=$arr['pf'];
@$sxz=$arr['sxz'];
@$bs=$arr['bs'];
@$sxf=$arr['sxf'];
@$px=$arr['px'];
@$lx=$arr['lx'];
// @$ssc=$arr['ssc'];
if(!empty($cx)){$tj .= " and cx='".$cx."'";}
if(!empty($jibie)){$tj .= " and jibie='".$jibie."'";}
if(!empty($chexi)){$tj .= " and chexi='".$chexi."'";}
if(!empty($pp)){$tj .= " and pp='".$pp."'";}
if(!empty($yls)){$fw=CF($yls,'-');$tj .= " and yls > $fw[0] and yls <= $fw[1]";}
if(!empty($zz)){$fw=CF($zz,'-');$tj .= " and zz > $fw[0] and zz <= $fw[1]";}
if(!empty($jy)){$tj .= " and jy='".$jy."'";}
if(!empty($pf)){$tj .= " and pf='".$pf."'";}
if($sxf === '0' || $sxf === '1'){$tj .= " and sxf='".$sxf."'";}
if($sxz === '0' || $sxz === '1'){$tj .= " and sxz='".$sxz."'";}
if(!empty($bs)){$tj .= " and bs='".$bs."'";}
if(!empty($px)){$fx = $px;}
if(!empty($lx)){$tj .= " and lx='".$lx."'";}
// if($px != 'def'){
// 	if($px == 'time'){
// 		$fx .= " tjdj desc";
// 	}else if($px == 'sp'){
// 		$fx .= 'sp desc';
// 	}else if($px == 'lc'){
// 		$fx .= 'lc desc';
// 	}else if($px == 'buy'){
// 		$fx .= 'ly desc';
// 	}
// }
if(substr($tj,0,4) == ' and'){$tj=preg_replace('/ and/','',$tj,1);}
// var_dump($tj);
$DB->FZW($tj);
$DB->FP($fy);
$DB->fx=$fx;
$DB->flikez="href";
$DB->ft="id,bt,img,ly,sxz,sp,lc,pf,jy,ms,tjdj,ly,yls";
$DB->flike="cldq.php?/".$fy."_".$Ws.".html";
$fz=$DB->FZ();
while($str=SZ($fz)){
	$img=CF($str['img'],',');
	if($str['sxz']==1){
		$fq='<div class="r"><a href="fqmc.php" title="该车辆可享受分期购车服务" target="_blank"><i class="i-dk"></i></a></div>';
	}
	$string .= '<li>
    <div class="car_list_box clearfix">
        <a data-flag="true" href="cpx.php?/'.$str['id'].'.html" target="_blank"title="'.$str['bt'].'">
            <div class="pic" style="background: url('.$img[1].') no-repeat center center;background-size:cover;">
                    <i class="i-bao-b" title="该车重要部件免费保修半年">
                    </i>
            </div>
        </a>
        <div class="info">
            <h4>
                <a data-flag="true" href="cpx.php?/'.$str['id'].'.html" target="_blank"
                title="'.$str['bt'].'">'.$str['bt'].'</a>
            </h4>
            <p class="p1">
                <strong>'.substr($str['sp'],0,10).'</strong>
                上牌
                <b>
                    |
                </b>
                <strong>'.$str['lc'].'</strong>
                万公里
                <b>
                    |
                </b>'.$str['pf'].'<b>
                    |
                </b>'.$str['jy'].'
            </p>
            <p>'.mb_substr($str['ms'],0,120,'utf-8').'</p>
            <p class="p2">
                <span class="time">'.substr($str['tjdj'],0,10).'</span>
                更新
                <span class="tag">
                    车况已检测
                </span>
                <a href="cpx.php?/'.$str['id'].'.html" class="view">
                    查看检测报告
                </a>
            </p>
        </div>
        <p class="price">
            <strong>'.$str['yls'].'</strong>
            万
        </p>
    </div>
</li>';
}
echo $string,$DB->FY2();

