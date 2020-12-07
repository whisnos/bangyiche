<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<meta name="Keywords" content="<?php echo $gjz;?>" />
<meta name="Description" content="<?php echo $ms;?>" />
<link href="img/jc.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="img/jquery1.8.min.js"></script>
<script type="text/javascript" src="img/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="img/iis100.js"></script>
</head>

<body>
	
    <div class="ty26">
    	<div class="main">
        	<div class="l">免费上门定做、测量尺寸，设计方案</div>
            <div class="r">
            	<a href="#">设为首页</a>
                <a href="#">收藏本站</a>              
             </div>
        </div>
    </div>
<div class="tl2">
	<div class="main">
    	<img src="<?php $tls=$DB->Sels("pic","a_adv","lid=2","",""); $img2=CF($tls['pic'],",");	  echo $img2[1]?>" class="l"/>
    	<div class="r"><span>联系电话：</span><?php $teltop=$DB->Sels("lr","a_dy","id=13","","");echo FF($teltop[0],0);?></div></div>
</div>
	<div class="td24">
    	<div class="main">
        	<ul>
            	<li><a href="/"<?php echo IFT($z==0," class='on'")?>>首页</a></li>
                <li><a href="news.php"<?php echo IFT($z==1," class='on'")?>>新闻中心</a></li>
                <li><a href="cp.php#cp"<?php echo IFT($z==2," class='on'")?>>产品中心</a></li>
                <li><a href="al.php"<?php echo IFT($z==3," class='on'")?>>成功案例</a></li>
                <li><a href="about.php"<?php echo IFT($z==5," class='on'")?>>关于我们</a></li>
                <li><a href="lx.php"<?php echo IFT($z==6," class='on'")?>>联系我们</a></li>
                <li><a href="fw.php"<?php echo IFT($z==7," class='on'")?>>服务中心</a></li>
            </ul>
        </div>
    </div>