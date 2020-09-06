
        <!-- <div class="beijing"></div> -->
        <!-- E推荐区 -->
<div id="footer">
    <div class="main_footer">
        <div class="footer_gywm">
            <?php


            ?>
            <ul>
                <h3>关于帮易车</h3>
                <li><a rel="nofollow" href="#">公司介绍</a></li>
                <li><a rel="nofollow" href="#">联系我们</a></li>
                <li><a rel="nofollow" href="#">加入我们</a></li>
                <li><a rel="nofollow" href="#">媒体报道</a></li>
            </ul>
        </div>
        <style>
        .footer_gywm ul a.f33 {color: #c33;}
        </style>
        <div class="footer_gywm">
            <ul>
                <h3>交易介绍</h3>
                <li><a rel="nofollow" href="lcxj.php?/0_4_<?php $dy=$DB->Sels("id,na","a_dy","id=15","","");echo $dy['id'];?>.html"><?php echo FF($dy['na'],0);?></a></li>
                <li><a rel="nofollow" href="lcxj.php?/0_4_<?php $dy=$DB->Sels("id,na","a_dy","id=16","","");echo $dy['id'];?>.html"><?php echo FF($dy['na'],0);?></a></li>
            </ul>
        </div>
        <div class="footer_gywm"><h3>微信号</h3><i><img width="100" height="100" src="<?php $weixin=$DB->Sels("img","a_adv","lid=8","id desc","");$wimg=CF($weixin['img'],',');echo $wimg[1];?>"></i></div>
        <div class="footer_lxwm">
            <ul>
                <h3><a target="_blank" href="">联系我们</a></h3>
                <li>联系电话：<?php $tel=$DB->Sels("jy","a_dy","id=4","","");echo FF($tel['jy'],0);?> (8:00 - 20:00)</li>
                <li>公司邮箱：<?php $tel=$DB->Sels("jy","a_dy","id=6","","");echo FF($tel['jy'],0);?></li>
                <li>公司地址：<?php $tel=$DB->Sels("jy","a_dy","id=7","","");echo FF($tel['jy'],0);?></li>
                <li>商务合作：<?php $tel=$DB->Sels("jy","a_dy","id=8","","");echo FF($tel['jy'],0);?></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>


    <div class="footer_cx">
        

<div class="tab_menu1">
    <ul>
        <li id="kc2" onmouseover="rm(0)">友情链接</li>
    </ul>
    <div class="clear"></div>
</div>



<div class="tab_box0">
    <div id="rmkc0" class="csmap">
                <ul><?php 
                        $lj=$DB->Sel("bt,dz","a_lj","","id desc","21");
                        while($ljs=SZ($lj)){
                    ?>
                            <li><a target="_blank" href="<?php echo $ljs['dz'];?>"><?php echo FF($ljs['bt'],0);?></a></li>
                            <?php }?>
                    </ul>
        <div class="clear"></div>
    </div>
</div>




    </div>
    <div class="clear"></div>
</div><div class="footer_copy">
    <?php $bq=$DB->Sels("lr","a_dy","id=5","","");echo FF($bq['lr'],0);?>
</div>
    <div class="box_os">
  <div class="os_x"></div>
    <div class="osqq">
    <p><em>(工作日：9:30-18:30)</em></p>
      <p><strong>在线QQ</strong></p>
        <a target="_blank" href="<?php $qq=$DB->Sels("jy","a_dy","id=3","","");echo FF($qq['jy'],0);?>"><p id="ico_onlineqq" class="qq"></p></a>
    </div>
</div>
<div class="onlineService">
  <p class="ico_os"></p>
    <a class="ico_gt" href="#" target="_self" title=""></a>
</div>
<div class="tc">
    <div class="bgss"></div>
    <div class="bao">
        <div class="wen">请填写完整</div>
        <div class="okk">确定</div>
    </div>
</div>
<link rel="stylesheet" href="qq/public_index.css" />
<script type="text/javascript" src="qq/onlineService20130718.js" charset="utf-8"></script>
<?php $bd=$DB->Sels("lr","a_bd","","","");echo FF($bd['lr'],0);?>
    </BODY>
</HTML>