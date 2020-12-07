<?php  
require_once('FY_fun/FY_qt.php');
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=6;
$id=R(0,0);
$newx=$DB->Sels("id,lid,bt,ms,tjdj,lr,lid,gjz,lmc,click","a_wd","id=$id","","");
$lid=$newx['lid'];
$syy=$DB->Sels("id,bt","a_wd","lid=$lid and id>$id","id asc","");
$xyy=$DB->Sels("id,bt","a_wd","lid=$lid and id<$id","id desc","");
$DB->upd('a_wd',array('click'),
                    array($newx['click']+1),"id=".$newx['id']);

$title=FF($newx['bt'],0).' - 帮易车二手车常识';
require_once("top.php");
?>
    <div style="display: none;" id="mn_userapp_menu" class="p_pop h_pop">
    </div>
    <div id="mu" class="cl">
    </div>
  </div>
</div>
<div id="wp" class="wp">
    <div id="bread" class="row clearfix">
        <!--页面路径-->
        <div class="left">当前位置：<a href="/"> 易车世界 </a> &gt; <a href="ycsj.php?/0_6_<?php echo $newx['lid'];?>.html"> <?php echo $newx['lmc'];?></a> &gt; <a href=""> 正文</a></div>
    </div>
  <style id="diy_style" type="text/css">
  </style>
  <div class="wp">
    <!--[diy=diy1]-->
    <div id="diy1" class="area">
    </div>
    <!--[/diy]-->
  </div>
  <div id="ct" class="ct2 wp cl">
    <div class="mn">
      <div class="bm vw">
        <div class="h hm">
          <h1 class="ph"><?php echo FF($newx['bt'],0);?></h1>
          <div class="gushi_xq">
            <span class="xqi left">作者：<?php echo FF($newx['gjz'],0);?></span>
            <span class="xqi left">时间：<?php echo substr(FF($newx['tjdj'],0),0,10);?></span>
            <span class="xqi left">阅读：<?php echo $newx['click'];?></span>
        </div>
          <p class="xg1">
            <span class="pipe"></span><a></a><span class="pipe"></span><em id="_viewnum"></em><span class="pipe"></span>
          </p>
        </div>
      <?php echo FF($newx['lr'],0);?>
        <div class="pren pbm cl">
          <em class="sxp">上一篇：<?php if(empty($syy['id'])){echo '<a>没有了</a>';}else{echo '<a href="?/'.$syy['id'].'">'.FF($syy['bt'],0).'</a>';}?></em>
          <em class="sxp">下一篇：<?php if(empty($xyy['id'])){echo '<a>没有了</a>';}else{echo '<a href="?/'.$xyy['id'].'">'.FF($xyy['bt'],0).'</a>';}?></em>
        </div>
      </div>
      </div>
      <div class="sd pph">


<div class="drag">
<!--[diy=diyrighttop]--><div id="diyrighttop" class="area"></div><!--[/diy]-->
</div>

      <div class="content_right">
        <div class="hot_article"><span>热门文章</span></div>

    <?php
    $rm=$DB->Sel("id,bt,img,ms","a_wd","sxt=1","click desc,sxt desc,id desc","5");
      while($wz=SZ($rm)){
        $img=CF($wz['img'],',');
    ?>
                <div class="article_list">
                  <a target="_blank" href="ycsjx.php?/<?php echo $wz['id'];?>.html" class="aimg">
                    <div class="article_pic" style="background:url(<?php echo $img[1];?>) no-repeat center center;background-size:cover;"></div>
                </a>
          <div class="article_text">
            <h3><a target="_blank" href="ycsjx.php?/<?php echo $wz['id'];?>.html"><?php echo FF($wz['bt'],0);?></a></h3>  
            <div class="atricle_content" limit="25">
              <a target="_blank" href="ycsjx.php?/<?php echo $wz['id'];?>.html" style="text-decoration:none;"><?php echo mb_substr(FF($wz['ms'],0),0,24,'utf-8');?>...</a>
              </div>
          </div>
        </div>
        <?php }?>
                <div class="fxewm"><img src="<?php $weixin=$DB->Sels("img","a_adv","lid=8","id desc","");$wimg=CF($weixin['img'],',');echo $wimg[1];?>"><span>微信扫一扫，关注帮易车</span></div>
      </div>

<div class="drag">
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>


</div>
      </div>
      </div>
      <?php require_once("down.php");?>