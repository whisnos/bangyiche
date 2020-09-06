<?php  
require_once('FY_fun/FY_qt.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=R(1,0);
require_once("top.php");
if(rg('paifang')){
?>
<script type="text/javascript">
    
$(function(){
    $(this).parents("ul,div.left").find("a").removeClass("on");
    $(this).addClass("on");
    // $(this).parent().children(this).css({"background":"#fc5300","color":"#fff"});
    var lx = $(this).attr("zz");//alert(lx);
    var zh = $(this).attr("name");
    if(lx=='px'){
        if($(this).attr("pai")=='desc'){
            $(this).attr("pai","asc");
            $(this).attr("name",$(this).attr("name").replace(/desc/,'asc'));
        }else if($(this).attr("pai")=='asc'){
            $(this).attr("pai","desc");
            $(this).attr("name",$(this).attr("name").replace(/asc/,'desc'));
        }
    }
    if($('#sxz').attr('name')==1){$('#sxz').attr('name','');}else if($('#sxz').attr('name')==0){$('#sxz').attr('name','1');$('#sxz').removeClass('on');}
    if($('#sxf').attr('name')==1){$('#sxf').attr('name','');}else if($('#sxf').attr('name')==0){$('#sxf').attr('name','1');$('#sxf').removeClass('on');}
    // alert(lx);
    arr[lx] = zh;
    arr['pf']=<?php echo '"'.rg('paifang').'"';?>;
    $.post("../cpcl.php",
    {arr:arr},
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
 })
</script>
<?php }?>



<div id="main">
    <div id="bread" class="row clearfix">
        <!--页面路径-->
        <div class="left">当前位置：<a href="/"> 首页 </a> &gt; <a href=""> 分类列表</a></div>
    </div>
    <div class="row clearfix">
        <!-- 筛选列表 -->
        <div class="filter_list">
            <div class="filter_box clearfix">
                <div class="box_border clearfix">
                    <h4>级　　别</h4>
                    <div class="content">
                        <ul>
                            <li><a class="on" name="0" zz="jibie">不限</a></li>
                            <?php 
                                $jibie=$DB->Sel("id,lm","a_cpl","lid=1","id desc","");
                                while($jb=SZ($jibie)){
                            ?>
                            <li><a name="<?php echo $jb['lm'];?>" zz="jibie"><?php echo $jb['lm'];?></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="brand clearfix filter_box">
                <div class="box_border clearfix">
                    <h4>
                        品　　牌
                    </h4>
                    <div class="content">
                        <div class="letterlayer letterlayerxd" style="display: none;">
                            <span class="letter_list letter_listsx">
                                <a href="javascript:;" class="a1 on quanbu">全部</a>
                                <a class="zm" href="javascript:;">A</a>
                                <a class="zm" href="javascript:;">B</a>
                                <a class="zm" href="javascript:;">C</a>
                                <a class="zm" href="javascript:;">D</a>
                                <a class="zm" href="javascript:;">F</a>
                                <a class="zm" href="javascript:;">G</a>
                                <a class="zm" href="javascript:;">H</a>
                                <a class="zm" href="javascript:;">J</a>
                                <a class="zm" href="javascript:;">K</a>
                                <a class="zm" href="javascript:;">L</a>
                                <a class="zm" href="javascript:;">M</a>
                                <a class="zm" href="javascript:;">N</a>
                                <a class="zm" href="javascript:;">O</a>
                                <a class="zm" href="javascript:;">P</a>
                                <a class="zm" href="javascript:;">Q</a>
                                <a class="zm" href="javascript:;">R</a>
                                <a class="zm" href="javascript:;">S</a>
                                <a class="zm" href="javascript:;">T</a>
                                <a class="zm" href="javascript:;">W</a>
                                <a class="zm" href="javascript:;">X</a>
                                <a class="zm" href="javascript:;">Y</a>
                                <a class="zm" href="javascript:;">Z</a>
                            </span>
                        </div>
                        <ul style="display: none;" class="js_more_list js_more_listsxmz brand_list">
                            <?php 
                                $jibie=$DB->Sel("id,lm","a_cpl","lid=2","id desc","");
                                while($jb=SZ($jibie)){
                            ?>
                            <li szm="<?php echo szm($jb['lm']);?>"><a name="<?php echo $jb['lm'];?>" class="pinpai" zz="pp" lid="<?php echo $jb['id'];?>"><?php echo $jb['lm'];?></a></li>
                            <?php }?>
                        </ul>
                        <ul class="ls_collapse" style="display: block;">
                            <li><a class="on buxian" name="0" zz="pp">不限</a></li>
                            <?php 
                                $jibie=$DB->Sel("id,lm","a_cpl","lid=2","id desc","");
                                while($jb=SZ($jibie)){
                            ?>
                            <li><a name="<?php echo $jb['lm'];?>" class="pinpai" zz="pp" lid="<?php echo $jb['id'];?>"><?php echo $jb['lm'];?></a></li>
                            <?php }?>
                        </ul>
                        <span id="js_more" zt="0" class="btn btn-more js_m">
                            <a id="areaLinkMore" class="gd" style="display:block;right: -2px;width: 44px;top: 0;border-radius: 0;" href="javascript:;">更多<i></i></a>
                            <a id="areaLinkMore" class="sq" style="display:none;" href="javascript:;">收起<i></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="brand clearfix filter_box">
                <div class="box_border clearfix">
                    <h4>
                        车　　系
                    </h4>
                    <?php
                        $clb=$DB->Sel("id","a_cpl","lid=2","id desc","");
                        while($csc=SZ($clb)){
                            $clbx=$DB->Sel("lm","a_cpl","lid=".$csc['id'],"id desc","");
                            while($chexi=SZ($clbx)){
                                $chexitx .= '<li><a name="'.$chexi['lm'].'" class="chexisx" zz="chexi">'.$chexi['lm'].'</a></li>';
                            }
                        }?>
                    <div class="content">
                        <ul style="display: none;" class="js_more_list brand_list chexirongqi">
                            <?php echo $chexitx;?>
                        </ul>
                        <ul class="ls_collapse chexirongqi2" style="display: block;">
                            <li><a class="on" name="0" zz="chexi" >不限</a></li>
                            <?php echo $chexitx;?>
                        </ul>
                        <span id="js_more" zt="0" class="btn btn-more js_m">
                            <a id="areaLinkMore" style="display:block;right: -2px;width: 44px;top: 0;border-radius: 0;" href="javascript:;">更多<i></i></a>
                            <a id="areaLinkMore" style="display:none;" href="javascript:;">收起<i></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="filter_box clearfix">
                <div class="box_border clearfix">
                    <h4>
                        价　　格
                    </h4>
                    <div style="z-index: 5;" class="content">
                        <ul class="sx">
                            <li><a zz="yls" name="0" class="on" >不限</a></li>
                            <li><a zz="yls" name="0-3">3万以下</a></li>
                            <li><a zz="yls" name="3-5">3-5万</a></li>
                            <li><a zz="yls" name="5-10">5-10万</a></li>
                            <li><a zz="yls" name="10-20">10-20万</a></li>
                            <li><a zz="yls" name="20-30">20-30万</a></li>
                            <li><a zz="yls" name="30-40">30-40万</a></li>
                            <li><a zz="yls" name="40-999999999">40万以上</a></li>
                            <li>
                                <div class="custom">
                                    <p class="p1">
                                        <span style="color:#777;">自定义价格</span>
                                        <input class="i1 xde">-<input class="dde i1">
                                        <p class="sure"><button class="queding">确定</button></p>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="filter_box clearfix">
                <div class="box_border clearfix">
                    <h4>
                        车　　龄
                    </h4>
                    <div style="z-index: 4;" class="content">
                        <ul class="sx">
                            <li><a zz="zz" name="0" class="on" >不限</a></li>
                            <li><a zz="zz" name="0-1">1年以内</a></li>
                            <li><a zz="zz" name="1-3">1-3年</a></li>
                            <li><a zz="zz" name="3-5">3-5年</a></li>
                            <li><a zz="zz" name="5-99999">5年以上</a></li>
                            <li class="zh">
                                <div class="custom">
                                    <p class="p1">
                                        <span style="color:#777;">自定义车龄</span>
                                        <input class="i1 xde">-<input class="dde i1">
                                        <p class="sure"><button class="queding">确定</button></p>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="brand clearfix filter_box">
                <div class="box_border clearfix">
                    <h4>
                        地　　区
                    </h4>
                    <div class="content">
                        <ul style="display: none;" class="js_more_list brand_list">
                            <?php 
                                $jibie=$DB->Sel("id,lm","a_cpl","lid=5","id desc","");
                                while($jb=SZ($jibie)){
                            ?>
                            <li><a name="<?php echo $jb['lm'];?>" zz="guishudi"><?php echo $jb['lm'];?></a></li>
                            <?php }?>
                        </ul>
                        <ul class="ls_collapse" style="display: block;">
                            <li><a class="on" name="0" zz="guishudi">不限</a></li>
                            <?php 
                                $jibie=$DB->Sel("id,lm","a_cpl","lid=5","id desc","");
                                while($jb=SZ($jibie)){
                            ?>
                            <li><a name="<?php echo $jb['lm'];?>" zz="guishudi"><?php echo $jb['lm'];?></a></li>
                            <?php }?>
                        </ul>
                        <span id="js_more" zt="0" class="btn btn-more js_m">
                            <a id="areaLinkMore" style="display:block;right: -2px;width: 44px;top: 0;border-radius: 0;" href="javascript:;">更多<i></i></a>
                            <a id="areaLinkMore" style="display:none;" href="javascript:;">收起<i></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="brand clearfix filter_box">
                <div class="box_border clearfix">
                    <h4>
                        类　　型
                    </h4>
                    <div class="content">
                        <ul class="ls_collapse" style="display: block;">
                            <li><a class="on" name="0" zz="pf">不限</a></li>
						<?php $lb=$DB->Sel("lm","a_cpl","lid=7","id desc","");
						while($lbs=SZ($lb)){?>
                            <li><a name="<?php echo $lbs['lm'];?>" zz="pf"><?php echo $lbs['lm'];?></a></li>
							<?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="select_result" class="row clearfix">
        <!-- 筛选结果 -->
        <div class="result_left">
            <!-- 左 -->
            <div id="jump" class="detail_result" data-widget="app/ms_v2/js/list.js#jsLinks">
                <!-- 详细结果区 -->
                <div class="sub_title" data-widget="app/ms_v2/js/list.js#slideBar" style="">
                    <div class="left">
                        <a class="on" name="" zz="px" href="javascript:void(0);">默认排序</a>
                        <a class="current2" pai="desc" name="tjdj desc" zz="px" title="点击按发布时间从近到远排序" href="javascript:void(0);" rel="nofollow">
                            <span class="inline-block">发布时间</span>
                            <i class="i-up"></i>
                        </a>
                        <a title="点击按上牌时间从近到远排序" pai="desc" name="sp desc" zz="px" href="javascript:void(0);">
                            <span class="inline-block">上牌时间</span><i class="i-time"></i>
                        </a>
                        <a class="a1" title="点击按里程从少到多排序" pai="desc" name="lc desc" zz="px" href="javascript:void(0);">
                            <span class="inline-block">表显里程</span><i class="i-down"></i>
                        </a>
                        <a class="a1" title="点击按价格从低到高排序" pai="desc" name="yls desc" zz="px" href="javascript:void(0);">
                            <span class="inline-block">价格</span><i class="i-mid"></i>
                        </a>
                    </div>
                    <div class="onsale right">
                    </div>
                </div>
                <div style="width: 960px; height: 40px; display: none;">
                </div>
                <!-- 列表模式-->
                <div class="mb15 clearfix">
					<div class="car_filter_list car_list_pic">
					    <ul class="chanpin clearfix">
					        
					    </ul>
                </div>
               </div>
                <div class="pages" id="page">

                </div>
            </div>
        </div>
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
                $like=$DB->Sel("id,bt,img,ly,sxz,sp,lc,pf,jy,ms,tjdj,yls","a_cp","sxt=1","sxt desc,id desc","5");
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
<script type="text/javascript">
    


$(".pinpai").click(function(){
    var id=$(this).attr("lid");
    $.post('cl.php',{
        id:id,
        dd:'pinpai'
    },function(data){
        $(".chexirongqi").html(data);
        $(".chexirongqi2").html('<li><a class="on" name="0" zz="chexi" >不限</a></li>'+data);
    })
})


$(".buxian").click(function(){
    $.post('cl.php',{
        dd:'buxian'
    },function(data){
        $(".chexirongqi").html(data);
        $(".chexirongqi2").html('<li><a class="on" name="0" zz="chexi" >不限</a></li>'+data);
    })
})

</script>
<?php require_once("down.php");?>