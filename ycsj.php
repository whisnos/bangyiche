<?php  
require_once('FY_fun/FY_qt.php');
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=R(1,0);
$Wz=R(0,1);
$Ws=R(2,0);
$DB->FCZ();
$DB->fb="a_wd";
$DB->fa=10;
$DB->FZW("lid=$Ws");
$DB->FP($Wz);
$DB->fx="id desc";
$DB->flikez="href";
$DB->ft="id,bt,ms,img,tjdj,gjz,lmc,click";
$DB->flike="ycsj.php?/*_$Ws".'_'.$Ws.".html";
$fz=$DB->FZ();
$title='帮易车二手车常识';
require_once("top.php");
?>

<div class="container_max">
      <div class="content_left">
        <div class="tab_menu">
          <ul>
            <a href="ycsj.php?/0_6_1"><li class="<?php echo IFT($Ws==1,'selected');?>" data="0">好车故事</li></a>
            <a href="ycsj.php?/0_6_2"><li class="<?php echo IFT($Ws==2,'selected');?>" data="1">检测保障</li></a>
            <a href="ycsj.php?/0_6_3"><li class="<?php echo IFT($Ws==3,'selected');?>" data="2">二手车问答</li></a>
            <a href="ycsj.php?/0_6_4"><li class="<?php echo IFT($Ws==4,'selected');?>" data="3">好车杂谈</li></a>
          </ul>
        </div>
		<?php
			while($wz=SZ($fz)){
        $img=CF($wz['img'],',');
		?>
        <div class="tab_box"> 
          <div>
            <div class="tab_list">
              <div class="gushi_pic"><a target="_blank" href="ycsjx.php?/<?php echo $wz['id'];?>.html"><img src="<?php echo $img[1];?>"></a></div>
              <div class="gushi_text">
                <h3><a target="_blank" href="ycsjx.php?/<?php echo $wz['id'];?>.html"><?php echo FF($wz['bt'],0);?></a></h3>
                <div class="gushi_qt">
                  <span class="gsi">作者：<?php echo FF($wz['gjz'],0);?></span>
                  <span class="gsi">时间：<?php echo substr($wz['tjdj'],0,10);?></span>
                  <span class="gsi">阅读：<?php echo $wz['click'];?></span>
                  <span class="gsbq"><?php echo FF($wz['lmc'],0);?></span>
                </div>
                <div class="gushi_content"><?php echo FF($wz['ms'],0);?></div> 
              </div>
            </div>
           </div>
        </div>
		<?php }?>
      </div>
      <div class="content_right" style="width: 255px;">
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

      <div class="clear"></div>
      <div class="pages2">
      	<?php echo $DB->FY();?>
      </div>
    </div>

<?php require_once("down.php");?>