<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<meta name="Keywords" content="<?php echo $gjz;?>" />
<meta name="Description" content="<?php echo $ms;?>" />
<meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name='format-detection' content='telephone=no'>

<link href="img/jc.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="img/jquery1.8.min.js"></script>
<script type="text/javascript" src="img/TouchSlide.1.1.js"></script>
<script type="text/javascript" src="img/iis100.js"></script>
</head>

<body>

<div class="ty"><?php  $tels=$DB->Sels("lr","a_dy","id=13","",""); echo FF($tels[0],0); ?></div>

<div class="tl">
	<a href="index.php"><img src="img/logo.jpg" /></a>
</div>

<div class="nav">
	<ul>
    	<li><a href="index.php">网站首页</a></li>
        <li><a href="cp.php">产品中心</a></li>
        <li><a href="about.php">关于我们</a></li>
        <li><a href="lx.php">联系我们</a></li>
    </ul>
</div>
