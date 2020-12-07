<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
    <HEAD>
        <TITLE><?php echo $title;?></TITLE>
        <META name="keywords" content="<?php echo $gjz;?>">
        <META name="description" content="<?php echo $ms;?>">
        <META content="text/html; charset=utf-8" http-equiv="Content-Type">
            <?php $tit=$DB->Sels("img","a_adv","lid=5","id desc","1");$timg=CF($tit['img'],',');?>
        <LINK rel="shortcut icon" href="<?php echo $timg[1];?>">
        <LINK rel="stylesheet" type="text/css" href="img/index2.__1433980800__.css">
        <LINK rel="stylesheet" type="text/css" href="img/basic.__1434585600__.css">
        <LINK rel="stylesheet" type="text/css" href="img/car_cl.__1434585600__.css">
        <LINK rel="stylesheet" type="text/css" href="img/image_slide.__1434585600__.css">
        <LINK rel="stylesheet" type="text/css" href="img/vehicle.__1433980800__.css">
        <LINK rel="stylesheet" type="text/css" href="img/car_list.__1434585600__.css">
        <LINK rel="stylesheet" type="text/css" href="img/basic.__1433821751__.css">
        <link rel="stylesheet" type="text/css" href="img/style_4_common.css">
        <LINK rel="stylesheet" type="text/css" href="img/jc.css">
        <script type="text/javascript" src="img/jquery1.8.min.js"></script>
        <script type="text/javascript" src="img/jquery.SuperSlide.2.1.1.js"></script>
        <script type="text/javascript" src="img/jquerys.js"></script>
        <script type="text/javascript" src="img/manhuaDate.1.0.js"></script>
    </HEAD>
    <BODY>
        <DIV id="header" class="clearfix">
            <DIV class="row">
                <a href="/">
                    <DIV class="logo">
                        <img src="img/logo.png" alt="" />
                    </DIV>
                </a>
                <DIV class="search">
                    <DIV class="clearfix">
                        <FORM class="search_box" method="get" action="search.php">
                            <DIV class="fl">
                                <I>
                                </I>
                                <INPUT id="keywords" placeholder="请输入车辆名称 如：别克" name="ssc"/>
                            </DIV>
                            <DIV class="fr">
                                <BUTTON>搜 索</BUTTON>
                            </DIV>
                        </FORM>
                    </DIV>
                </DIV>
                <div class="right qqonline">
                    <p class="teln"><?php $tel=$DB->Sels("jy","a_dy","id=4","","");echo FF($tel['jy'],0);?></p>
                </div>
            </DIV>
        </DIV>
        <DIV id="nav">
            <UL class="row clearfix">
                <LI class="fl<?php if($z==1){echo ' on';}?>"><A href="/">首页</A></LI>
                <LI class="fl<?php if($z==2){echo ' on';}?>"><A href="cldq.php?/0_2">我要买车</A></LI>
                <LI class="fl<?php if($z==3){echo ' on';}?>"><A href="wymc.php?/0_3">我要卖车</A></LI>
                <LI class="fl<?php if($z==4){echo ' on';}?>"><A href="lcxj.php?/0_4_2">流程详解</A></LI>
                <LI class="fl<?php if($z==5){echo ' on';}?>"><A href="fwbz.php?/0_5">服务保障</A></LI>
                <LI class="fl<?php if($z==6){echo ' on';}?>"><A href="ycsj.php?/0_6_1">易车世界</A></LI>
            </UL>
        </DIV>