<?php  
require_once('FY_fun/FY_qt.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=1;
require_once("top.php");
?>


        <div class="tb main lunbo" style="width: 100%;">

            <div class="hd hd3">

                <ul></ul>

            </div>

            <div class="bd" style="width: 100%; overflow:hidden;">

                <ul style="position: relative; width: 100%; height: 450px;">
                    <?php
                        $lbt=$DB->Sel("*","a_adv","lid=1","id desc","5");
                        while($lb=SZ($lbt)){
                            $img=CF($lb['img'],',');
                            if(empty($img[1])){$img[1]='img/default.jpeg';}
                    ?>

                    
                    <li style="background-image: url(<?php echo $img[1];?>); position: absolute; width: 100%; height: 100%; left: 0px; top: 0px; display: list-item; background-position: 50% 0px; background-repeat: no-repeat no-repeat;"><a href="http://www.bangyiche.com" target="_blank" style="display:block;width:100%;height:100%;"></a></li>
                    <?php }?>
                    
                </ul>

            </div>

        </div>
            <script type="text/javascript">
             $(".main").slide({titCell:".hd ul",mainCell:".bd ul",effect:"fold",autoPlay:true,interTime:5000,autoPage:true,trigger:"mouseover",startFun:function(i){var curLi=$(".a1 .bd li").eq(i);if(!!curLi.attr("_src")){curLi.css("background-image",curLi.attr("_src")).removeAttr("_src")}}});
            </script>
        <DIV class="row index_banners rel">
            <DIV class="xuanche on">
                <div class="bg"></div>
                    <p class="iwant">我要买车</p>
                    <form action="javascript:;" method="post" class="mai">
                        <input type="text" name="name" class="name" placeholder="姓名">
                        <input type="text" name="num" class="num" placeholder="手机号码,QQ">
                        <input type="text" name="car" class="car" placeholder="车型">
                        <input type="text" name="jihua" class="jihua" placeholder="买车时间" id="datetimepicker3" readOnly="true" dd="">
                        <textarea name="xuqiu" class="xuqiu" placeholder="您想购买什么品牌及车型，预算是多少？"></textarea>
                        <input type="submit" value="帮我买车" class="tijiao mmaiche">
                    </form>
            </DIV>
            <DIV class="xuanche2 mche on">
                <div class="bg"></div>
                <p class="iwant">我要卖车</p>
                    <form action="javascript:;" method="post" class="mai">
                        <input type="text" name="name" class="name" placeholder="姓名">
                        <input type="text" name="num" class="num" placeholder="手机号码">
                        <input type="text" name="addr" class="addr" placeholder="车辆所在地">
                        <input type="text" name="car" class="car" placeholder="车型">
                        <input type="text" name="jihua" class="jihua" placeholder="卖车时间" id="datetimepicker3" readOnly="true" dd="">
                        <div class="baoq">
                        </div>
                        <div class="baoq2">
                        </div>
                        <input type="submit" value="帮我卖车" class="tijiao mmmaiche">
                    </form>
            </DIV>
        </DIV>
        <div class="main shouche">
            <p class="tit clear" style="margin-top:0;"><span class="fk left"></span>热门练手<span class="ms">热门畅销，容易上手</span><a class="more" href="cldq.php?paifang=热门练手">更多></a></p>
            <ul class="ches clear">
                <?php $i=1;
                    $tuij=$DB->Sel("id,bt,lc,sp,guishudi,yls,img,jieshengjia","a_cp","pf='热门练手'","pf desc,id desc","9");
                    while($tuijs=SZ($tuij)){
                        $img=CF($tuijs['img'],',');
                ?>
                <li class="left <?php echo IFT($i%3==0,'three');?>" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                    <a href="cpx.php?/<?php echo $tuijs['id'];?>.html">
                        <div class="xiangq">
                            <div class="bg"></div>
                            <div class="left">
                                <p class="bt biaotis"><?php echo mb_substr(FF($tuijs['bt'],0),0,20,'utf-8');?></p>
                                <p>
                                    <span class="lc"><?php echo FF($tuijs['lc'],0);?>万公里</span>
                                    <span class="year"><?php echo substr(FF($tuijs['sp'],0),0,4);?>年</span>
                                    <span class="dq"><?php echo FF($tuijs['guishudi'],0);?></span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="jg">￥<span class="num"><?php echo FF($tuijs['yls'],0);?></span>万</p>
                                <p class="jie">已省<?php echo FF($tuijs['jieshengjia'],0);?>万元</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php $i++; }?>
            </ul>
            <p class="tit clear"><span class="fk left"></span>超值低价<span class="ms">车主急售，特价豪车</span><a class="more" href="cldq.php?paifang=超值低价">更多></a></p>
            <ul class="ches clear">
                <?php $i=1;
                    $tuij=$DB->Sel("id,bt,lc,sp,guishudi,yls,img,jieshengjia","a_cp","pf='超值低价'","pf desc,id desc","9");
                    while($tuijs=SZ($tuij)){
                        $img=CF($tuijs['img'],',');
                ?>
                <li class="left <?php echo IFT($i%3==0,'three');?>" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                    <a href="cpx.php?/<?php echo $tuijs['id'];?>.html">
                        <div class="xiangq">
                            <div class="bg"></div>
                            <div class="left">
                                <p class="bt biaotis"><?php echo mb_substr(FF($tuijs['bt'],0),0,20,'utf-8');?></p>
                                <p>
                                    <span class="lc"><?php echo FF($tuijs['lc'],0);?>万公里</span>
                                    <span class="year"><?php echo substr(FF($tuijs['sp'],0),0,4);?>年</span>
                                    <span class="dq"><?php echo FF($tuijs['guishudi'],0);?></span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="jg">￥<span class="num"><?php echo FF($tuijs['yls'],0);?></span>万</p>
                                <p class="jie">已省<?php echo FF($tuijs['jieshengjia'],0);?>万元</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php $i++; }?>
            </ul>
            <p class="tit clear"><span class="fk left"></span>经济实用<span class="ms">实用省油，居家首选</span><a class="more" href="cldq.php?paifang=经济实用">更多></a></p>
            <ul class="ches clear">
                <?php $i=1;
                    $tuij=$DB->Sel("id,bt,lc,sp,guishudi,yls,img,jieshengjia","a_cp","pf='经济实用'","pf desc,id desc","9");
                    while($tuijs=SZ($tuij)){
                        $img=CF($tuijs['img'],',');
                ?>
                <li class="left <?php echo IFT($i%3==0,'three');?>" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                    <a href="cpx.php?/<?php echo $tuijs['id'];?>.html">
                        <div class="xiangq">
                            <div class="bg"></div>
                            <div class="left">
                                <p class="bt biaotis"><?php echo mb_substr(FF($tuijs['bt'],0),0,20,'utf-8');?></p>
                                <p>
                                    <span class="lc"><?php echo FF($tuijs['lc'],0);?>万公里</span>
                                    <span class="year"><?php echo substr(FF($tuijs['sp'],0),0,4);?>年</span>
                                    <span class="dq"><?php echo FF($tuijs['guishudi'],0);?></span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="jg">￥<span class="num"><?php echo FF($tuijs['yls'],0);?></span>万</p>
                                <p class="jie">已省<?php echo FF($tuijs['jieshengjia'],0);?>万元</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php $i++; }?>
            </ul>
            <p class="tit clear"><span class="fk left"></span>经典SUV<span class="ms">超大空间，方便出行</span><a class="more" href="cldq.php?paifang=经典SUV">更多></a></p>
            <ul class="ches clear">
                <?php $i=1;
                    $tuij=$DB->Sel("id,bt,lc,sp,guishudi,yls,img,jieshengjia","a_cp","pf='经典SUV'","pf desc,id desc","9");
                    while($tuijs=SZ($tuij)){
                        $img=CF($tuijs['img'],',');
                ?>
                <li class="left <?php echo IFT($i%3==0,'three');?>" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                    <a href="cpx.php?/<?php echo $tuijs['id'];?>.html">
                        <div class="xiangq">
                            <div class="bg"></div>
                            <div class="left">
                                <p class="bt biaotis"><?php echo mb_substr(FF($tuijs['bt'],0),0,20,'utf-8');?></p>
                                <p>
                                    <span class="lc"><?php echo FF($tuijs['lc'],0);?>万公里</span>
                                    <span class="year"><?php echo substr(FF($tuijs['sp'],0),0,4);?>年</span>
                                    <span class="dq"><?php echo FF($tuijs['guishudi'],0);?></span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="jg">￥<span class="num"><?php echo FF($tuijs['yls'],0);?></span>万</p>
                                <p class="jie">已省<?php echo FF($tuijs['jieshengjia'],0);?>万元</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php $i++; }?>
            </ul>
			<p class="tit clear"><span class="fk left"></span>面包车酷<span class="ms">人人面包，载货必备</span><a class="more" href="cldq.php?paifang=面包车酷">更多></a></p>
            <ul class="ches clear">
                <?php $i=1;
                    $tuij=$DB->Sel("id,bt,lc,sp,guishudi,yls,img,jieshengjia","a_cp","pf='面包车酷'","pf desc,id desc","9");
                    while($tuijs=SZ($tuij)){
                        $img=CF($tuijs['img'],',');
                ?>
                <li class="left <?php echo IFT($i%3==0,'three');?>" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                    <a href="cpx.php?/<?php echo $tuijs['id'];?>.html">
                        <div class="xiangq">
                            <div class="bg"></div>
                            <div class="left">
                                <p class="bt biaotis"><?php echo mb_substr(FF($tuijs['bt'],0),0,20,'utf-8');?></p>
                                <p>
                                    <span class="lc"><?php echo FF($tuijs['lc'],0);?>万公里</span>
                                    <span class="year"><?php echo substr(FF($tuijs['sp'],0),0,4);?>年</span>
                                    <span class="dq"><?php echo FF($tuijs['guishudi'],0);?></span>
                                </p>
                            </div>
                            <div class="right">
                                <p class="jg">￥<span class="num"><?php echo FF($tuijs['yls'],0);?></span>万</p>
                                <p class="jie">已省<?php echo FF($tuijs['jieshengjia'],0);?>万元</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php $i++; }?>
            </ul>
            <a href="cldq.php" class="gmore">查看更多</a>
        </div>
        <div class="main">
            <ul class="other clear">
                <li class="left frist">
                    <a href="ycsj.php?/0_6_1"><p class="tit2">好车故事</p></a>
                    <?php $good=$DB->Sel("bt,id,img","a_wd","lid=1","sxt desc,id desc","5");
                    $n=1;
                        while($goods=SZ($good)){
                            if($n==1){
                                $img=CF($goods['img'],',');
                    ?>
                    <a href="ycsjx.php?/<?php echo $goods['id'];?>.html">
                        <div class="img" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                            <p class="bg"></p>
                            <p class="bt"><?php echo FF($goods['bt'],0);?></p>
                        </div>
                    </a>
                    <ul class="list">
                        <?php }else{?>
                        <li><a href="ycsjx.php?/<?php echo $goods['id'];?>.html"><?php echo FF($goods['bt'],0);?></a></li>
                        <?php } $n++; }?>
                    </ul>
                </li>
                <li class="left">
                    <a href="ycsj.php?/0_6_2"><p class="tit2">检测保障</p></a>
                    <?php $good=$DB->Sel("bt,id,img","a_wd","lid=2","sxt desc,id desc","5");
                    $n=1;
                        while($goods=SZ($good)){
                            if($n==1){
                                $img=CF($goods['img'],',');
                    ?>
                    <a href="ycsjx.php?/<?php echo $goods['id'];?>.html">
                        <div class="img" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                            <p class="bg"></p>
                            <p class="bt"><?php echo FF($goods['bt'],0);?></p>
                        </div>
                    </a>
                    <ul class="list">
                        <?php }else{?>
                        <li><a href="ycsjx.php?/<?php echo $goods['id'];?>.html"><?php echo FF($goods['bt'],0);?></a></li>
                        <?php } $n++; }?>
                    </ul>
                </li>
                <li class="left">
                    <a href="ycsj.php?/0_6_3"><p class="tit2">二手车问答</p></a>
                    <?php $good=$DB->Sel("bt,id,img","a_wd","lid=3","sxt desc,id desc","5");
                    $n=1;
                        while($goods=SZ($good)){
                            if($n==1){
                                $img=CF($goods['img'],',');
                    ?>
                    <a href="ycsjx.php?/<?php echo $goods['id'];?>.html">
                        <div class="img" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                            <p class="bg"></p>
                            <p class="bt"><?php echo FF($goods['bt'],0);?></p>
                        </div>
                    </a>
                    <ul class="list">
                        <?php }else{?>
                        <li><a href="ycsjx.php?/<?php echo $goods['id'];?>.html"><?php echo FF($goods['bt'],0);?></a></li>
                        <?php } $n++; }?>
                    </ul>
                </li>
                <li class="left last">
                    <a href="ycsj.php?/0_6_4"><p class="tit2">好车杂谈</p></a>
                    <?php $good=$DB->Sel("bt,id,img","a_wd","lid=4","sxt desc,id desc","5");
                    $n=1;
                        while($goods=SZ($good)){
                            if($n==1){
                                $img=CF($goods['img'],',');
                    ?>
                    <a href="ycsjx.php?/<?php echo $goods['id'];?>.html">
                        <div class="img" style="background:url(<?php echo $img[1];?>) no-repeat center center; background-size: cover;">
                            <p class="bg"></p>
                            <p class="bt"><?php echo FF($goods['bt'],0);?></p>
                        </div>
                    </a>
                    <ul class="list">
                        <?php }else{?>
                        <li><a href="ycsjx.php?/<?php echo $goods['id'];?>.html"><?php echo FF($goods['bt'],0);?></a></li>
                        <?php } $n++; }?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="all gaozhi">
            <div class="main">
                <ul class="clear">
                   <?php $wuxiang=$DB->Sel("gjz,ms,img","a_adv","lid=7","id asc","5");
                    while($wu=SZ($wuxiang)){
                        $img=CF($wu['img'],',');
                   ?>
                    <li style="background:url(<?php echo $img[1];?>) no-repeat center 25px;">
                        <p class="one"><?php echo FF($wu['gjz'],0);?></p>
                        <p><?php echo FF($wu['ms'],0);?></p>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <?php require_once("down.php");?>