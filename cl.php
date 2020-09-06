<?php
require_once('FY_fun/FY_qt.php');
if(rp("dd")=="yy"){
    ZYs();
        $c = strtoupper(rp("yzm"));
        if ($c != SE("FY_YZ")) {
            die('yz');
        }
        SED("FY_YZ");
        $lr=rp("lr");
        $dh=rp("tel");
        $DB->add('a_sjdindan',array('lid', 'lbh', 'dh', 'lr', 'tjdj', 'lmc'), array('1', ',1', $dh,  $lr,  date('Y-m-d H:i:s'),'未处理'));
        die('ok');
}

if(rp("dd")=='mmaiche'){
    $xm=rp('name');
    $dh=rp('num');
    $gjz=rp('car');
    $zz=rp('jihua');
    $ly=rp('xuqiu');
    $dianhua=$DB->Sels("dh","a_sjdindan","dh=$dh","","");
    if(empty($dianhua)){
        $DB->add('a_sjdindan',array('lid', 'lbh', 'dh', 'ly', 'tjdj', 'lmc', 'zz', 'xm', 'gjz', 'jy'), array('7', ',5,7', $dh,  $ly,  date('Y-m-d H:i:s'),'未处理',$zz,$xm,$gjz,'买车'));
        die('ok');
    }else{
        die('1');
    }
}

if(rp("dd")=='mmmaiche'){
    $xm=rp('name');
    $dh=rp('num');
    $gjz=rp('car');
    $zz=rp('jihua');
    $ly=rp('xuqiu');
    $hx=rp('addr');
    $dianhua=$DB->Sels("dh","a_sjdindan","dh=$dh","","");
    if(empty($dianhua)){
        $DB->add('a_sjdindan',array('lid', 'lbh', 'dh', 'ly', 'tjdj', 'lmc', 'zz', 'xm', 'gjz', 'hx', 'jy'), array('1', ',6,1', $dh,  $ly,  date('Y-m-d H:i:s'),'未处理',$zz,$xm,$gjz,$hx,'卖车'));
        die('ok');
    }else{
        die('1');
    }
}

if(rp("dd")=='mmsaiche'){
    $xm=rp('name');
    $dh=rp('tel');
    $hx=rp('addr');
    $dianhua=$DB->Sels("dh","a_sjdindan","dh=$dh","","");
    if(empty($dianhua)){
        $DB->add('a_sjdindan',array('lid', 'lbh', 'dh', 'ly', 'tjdj', 'lmc', 'zz', 'xm', 'gjz', 'hx', 'jy'), array('1', ',6,1', $dh,  $ly,  date('Y-m-d H:i:s'),'未处理',$zz,$xm,'未填写',$hx,'买车'));
        die('ok');
    }else{
        die('1');
    }
}




if(rp("dd")=='pinpai'){
    $lid=rp('id');
    $cx=$DB->Sel("lm","a_cpl","lid=$lid","","");
    while($jb=SZ($cx)){
        $str.='<li><a name="'.$jb['lm'].'" class="chexisx" zz="chexi">'.$jb['lm'].'</a></li>';
    }
    echo $str;
}




if(rp("dd")=='buxian'){
    $clb=$DB->Sel("id","a_cpl","lid=2","id desc","");
    while($csc=SZ($clb)){
        $clbx=$DB->Sel("lm","a_cpl","lid=".$csc['id'],"id desc","");
        while($chexi=SZ($clbx)){
            $chexitx .= '<li><a name="'.$chexi['lm'].'" class="chexisx" zz="chexi">'.$chexi['lm'].'</a></li>';
        }
    }
    echo $chexitx;
}


















?>