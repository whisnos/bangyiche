<?php  
require_once('FY_fun/FY_qt.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=2;
$ssc=rg("ssc");
$Wz=R(0,0);
$Ws=R(1,0);
$DB->FCZ();
$DB->fb="a_cp";
$DB->fa=20;
$DB->FZW('bt like "%'.$ssc.'%"');
$DB->FP($Wz);
$DB->fx="sxt desc,sxz desc,id desc";
$DB->flikez="href";
$DB->ft="id,bt,img,ly,sxz,sp,lc,yls";
$DB->flike="search.php?/*_$Ws.html?ssc=兰博基尼";
$fz=$DB->FZ();
require_once("top.php");
?>
<div id="main">
    <div id="bread" class="row clearfix">
        <!--页面路径-->
        <div class="left">当前位置：<a href="/">首页</a>&gt;<a>搜索结果</a></div>
    </div>
    <div id="select_result" class="row clearfix">
        <!-- 筛选结果 -->
        <div class="result_left">
            <!-- 左 -->
            <div id="jump" class="detail_result">
                <!-- 详细结果区 -->
                <div style="width: 960px; height: 40px; display: none;">
                </div>
                <!-- 列表模式-->
                <div class="mb15 clearfix">
					<div class="car_list car_list_pic">
					    <ul class="chanpi clearfix">
					        <?php while($cp=SZ($fz)){
                                $img=CF($cp['img'],',');
                                ?>
                            <li>
                                <div class="pic">
                                    <a target="_blank" style="background:url(<?php echo $img[1];?>) no-repeat center center;background-size:cover;" href="cpx.php?/<?php echo $cp['id'];?>.html"></a>
                                </div>
                                <h4>
                                    <a title="<?php echo FF($cp['bt'],0);?>" href="cpx.php?/<?php echo $cp['id'];?>.html" target="_blank"><?php echo FF($cp['bt'],0);?></a>
                                </h4>
                                <div class="price clearfix">
                                    <div class="l"><strong><?php echo FF($cp['yls'],0);?></strong>万</div>
                                <div class="r" <?php if($cp['sxz']==0){echo 'style="display:none;"';}?>><a href="fqmc.php" title="该车辆可享受分期购车服务" target="_blank"><i class="i-dk"></i></a></div>
                                </div>
                                <div class="other clearfix">
                                    <div class="l">
                                        <label>上牌：</label> <?php echo substr($cp['sp'],0,10);?>
                                    </div>
                                    <div class="r"><label>里程：</label><?php echo FF($cp['lc'],0);?>万公里</div>
                                </div>
                            </li>
                            <?php }?>
					    </ul>
                </div>
               </div>
                <div id="page">
                     <?php echo $DB->FY();?>   
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $.post("cpcl.php",
                {arr:<?php echo  json_encode($arr);?>},
                function(data){
                    $(".chanpin").html(data);
                    $(".pages").html($(".chanpin").find(".page").html());
                    $(".chanpin .page").remove();
                    $(".pages").children().attr({"zz":"fy"});
                    var len = $(".pages").children().length;
                    for(var i=0;i<len;i++){
                        if(!isNaN($(".pages").children().eq(i).html())){
                            $(".pages").children().eq(i).attr("name",$(".pages").children().eq(i).html());
                        }
                        if($(".pages").children().eq(i).attr("name")=="next"){
                            var next = parseInt($(".pages .cur").html()) + 1;
                            $(".pages").children().eq(i).attr("name",next);
                        }
                        var k = $(".pages").children().eq(i).html();
                        if(k == ''){
                            $(".pages").children().eq(i).css("display","none");
                        }
                    }
                });
            });
        </script>
        <div class="result_right">
        <div class="link_rec">
    <div class="right_title_style1">
        <h3>
        <i>
        </i>
            猜你喜欢
        </h3>
    </div>
    <div class="content">
        <ul class="car_list rec_list clearfix">
            <?php
                $like=$DB->Sel("id,bt,img,ly,sxz,sp,lc,pf,jy,ms,tjdj,ly,yls","a_cp","sxt=1","sxt desc","5");
                while($likes=SZ($like)){
                    $img=CF($likes['img'],',');
                    if(empty($img[1])){$img[1]='img/default.jpeg';}
            ?>
            <li>
            <div class="pic" style="background:url(<?php echo $img[1];?>) no-repeat center center;background-size:cover;">
                <a target="_blank" href="cpx.php?/<?php echo $likes['id'];?>.html" title="<?php echo $likes['bt'];?>">
                </a>
            </div>
            <h4>
            <a target="_blank" href="cpx.php?/<?php echo $likes['id'];?>.html" title="<?php echo $likes['bt'];?>"><?php echo $likes['bt'];?></a>
            </h4>
            <div class="price clearfix">
                <div class="l"><strong><?php echo $likes['yls'];?></strong>万</div>
            </div>
            <div class="other clearfix">
                <div class="l"><?php echo substr($likes['sp'],0,10);?><span class="color-hui">上牌</span></div>
                <div class="r"><?php echo $likes['lc'];?>万公里</div>
            </div>
            </li>
            <?php }?>
        </ul>
    </div>
</div> 
    </div>
    </div>
</div>

<?php require_once("down.php");?>