<?php
require_once('FY_fun/FY_qt.php');
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=2;
$id=R(0,0);
$che=$DB->Sels("*","a_cp","id=$id","","");
$cimg=CF($che['img'],',');
$len=count($cimg);
$title=FF($che['bt'],0).' -【帮易车二手车交易网】';
require_once("top.php");
    $DB->upd('a_cp',array('click'),
                    array($che['click']+1),"id=".$che['id']);
?>
<div class="main clear">

<!-- -------------------------------------------------------------- -->
<div id="basic" style="width:100%;overflow:hidden; margin-top:10px;">
            
                <div class="container detail-title-wrapper">
    <div class="row">
        <div class="title"><?php echo FF($che['bt'],0);?></div>
        <?php if($che['sxz']==1){echo '<div class="tags" style="color:#00A1E9;border-color:#00A1E9">里程少</div>';}?>
                  
                
    </div>
</div>
            

            
                <div class="detail-box-wrapper">
                    <div class="container">
                        <div class="detail-box-bg">
                          <div class="bgbg"></div>
                                <dl class="car-owner">

        <dd>
            <p class="owner-info">
            <?php 
                $chezhuxinxi=CF(FF($che['chezhuxinxi'],0),'%~~');
            ?>
                <strong><?php echo $chezhuxinxi[0];?></strong>
                <?php echo $chezhuxinxi[1];?>
            </p>

        </dd>
    </dl>

    <div class="detail-box">
        <div class="bgx"></div>
        <div class="rongq">
        <p class="portrait-arrow"></p>

        
        <p class="box-price">￥<?php echo FF($che['yls'],0);?>万</p>
        <ul class="box-installment block-height">
            <li class="box-installment-hover" id="box_installment"><span id="box_installment_text"></span><img src="pc_detail_installment-933b01f2.png"></li>
            <li><?php echo FF($che['cheshui'],0);?></li>
        </ul>

        <table cellpadding="0" cellspacing="0" class="box-service">
            <tbody>
            <?php 
                $fuwufei=CF(FF($che['fuwufei'],0),'%~~');
            ?>
                <tr>
                <td style="width: 50px;display: block;">车龄：</td>
                    <td>
                        <?php echo FF($che['zz'],0);?>年
                    </td>
                </tr>
                <tr>
                <td style="width: 50px;display: block;">佣金费：</td>
                    <td>
                        <strong><?php echo $fuwufei[0];?></strong><small><?php echo $fuwufei[1];?></small>
                    </td>
                </tr>
                <tr>
                <td style="width: 50px;display: block;">服务项：</td>
                <td>
                    <table cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <?php 
                                    $fuwu=CF(FF($che['fuwuxiang'],0),'%~~');
                                    for($i=0;$i<count($fuwu);$i++){
                                        if($i%2==0){
                                            echo '</tr><tr>';
                                        }
                                ?>
                                <td>
                                    <img src="img/box-check-715f6205.png"><?php echo $fuwu[$i];?>
                                </td>
                                <?php }?>
                            </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody></table>

        <ul class="row-fluid list-unstyled box-list-primary">
            <li class="span7">
                <p><strong><?php echo preg_replace('/-/','月',preg_replace('/-/','年',substr($che['sp'],0,10),1));?></strong></p>
            </li>
            <li class="span7">
                <p><strong><?php echo FF($che['lc'],0);?>万公里</strong></p>
            </li>
            <li class="span5">
                <p><strong><?php echo mb_substr(FF($che['paifangliang'],0),0,2,'utf-8');?></strong></p>
            </li>
            <li class="span5">
                <p><strong><?php echo FF($che['guishudi'],0);?></strong></p>
            </li>
        </ul>
        <div class="row-fluid btn-wrapper">
            <button id="schedule_button" class="btn btn-large span11 btn-schedule" style="margin-right:10px;cursor: pointer;">预约看车</button>
            <a href="<?php $qq=$DB->Sels("jy","a_dy","id=3","","");echo FF($qq['jy'],0);?>"><button id="bargain_button" class="btn-large span11 btn-bargain1" >价格可谈</button></a>
            
            <span class="tel">
                <span class="telephone_call">咨询电话</span>
                <p><strong><?php echo FF($che['yewudianhua'],0);?></strong></p>
            </span>

        </div></div>
    </div>

        <p class="detail-car-id">
        编号：<?php echo FF($che['cheyuanhao'],0);?>
    </p>
    <?php
        $cpimg=CF($che['img'],',');
    ?>
    <div style="background:url(<?php echo $cpimg[2];?>) no-repeat center center;background-size:cover;" class="bgimg"></div>



                      </div>
                    </div>
                </div>
            

                <div class="container common-promise">
        <div class="row-fluid" style="background:url(<?php $ban=$DB->Sels("img","a_adv","lid=6","","");$banimg=CF($ban['img'],',');echo $banimg[1];?>) no-repeat center center;background-size:cover;height:80px;clear:left;"></div>
    </div>
        </div>
        <?php
    $arr=CF(FF($che['lr'],0),'%~~');
    $lens=count($arr);
    for($i=1;$i<$lens;$i++){
        $arrx=json_decode(FF($arr[$i],0),ture);
        $arrs[]=$arrx;
        if($arrs[$i-1]['daxiao']=='bigimg'){
?>
<div class="bigimg" style="background: url(<?php echo $arrs[$i-1]['tuimg'];?>) no-repeat center center; background-size: 100% auto;">
  <span class="titx"><?php echo $arrs[$i-1]['weizhi'];?></span>
  <div class="toutit">
    <div class="bg"></div>
      <p><?php echo $arrs[$i-1]['miaoshu'];?></p>
    </div>
<?php if(!empty($arrs[$i-1]['chezhu'])&&!empty($arrs[$i-1]['dizhi'])&&!empty($arrs[$i-1]['jiyu'])){?>
  <div class="youxia">
    <div class="bg"></div>
    <div class="nr">
      <p class="chezhu"><?php echo $arrs[$i-1]['chezhu'];?></p>
      <p class="chezhu"><?php echo $arrs[$i-1]['dizhi'];?></p>
      <p class="xms"><?php echo $arrs[$i-1]['jiyu'];?></p>
    </div>
  </div>
<?php }?>
</div>
<?php }else{?>
<div class="smimg" style="background: url(<?php echo $arrs[$i-1]['tuimg'];?>) no-repeat center center; background-size: cover;">
  <span class="titx"><?php echo $arrs[$i-1]['weizhi'];?></span>
  <div class="toutit">
    <div class="bg"></div>
      <p><?php echo $arrs[$i-1]['miaoshu'];?></p>
    </div>
</div>
<?php } }?>
<div class="container detail-report-card">
        <div class="content">
            <h2>帮易车预检报告</h2>
            <p class="row-fluid">
                <span class="span4 offset6">检测时间：<?php echo FF($che['jiance'],0);?></span>
                <span class="span4">评测师：<?php echo FF($che['pingceshi'],0);?></span>
                <span class="span6">检测对象：<?php echo FF($che['bt'],0);?></span>
            </p>

            <div class="row card-table">
                <div class="span23 offset1">
                    <table>
                        <tbody><tr>
                            <td class="span2 bg-gray">车身颜色</td>
                            <td class="span3"><?php echo FF($che['yanse'],0);?></td>
                            <td class="span2 bg-gray">年检到期时间</td>
                            <td class="span3"><?php echo FF($che['nianjian'],0);?></td>
                            <td class="span3 bg-gray">交强险到期时间</td>
                            <td class="span3"><?php echo FF($che['jiaoqiang'],0);?></td>
                            <td class="span3 bg-gray">商业险到期时间</td>
                            <td class="span3"><?php echo FF($che['shangye'],0);?></td>
                        </tr>
                        <tr>
                            <td class="span2 bg-gray">归属地</td>
                            <td class="span3"><?php echo FF($che['guishudi'],0);?></td>
                            <td class="span2 bg-gray">过户次数</td>
                            <td class="span3"><?php echo FF($che['guohu'],0);?></td>
                            <td class="span3 bg-gray">有无购车发票</td>
                            <td class="span3"><?php echo FF($che['fapiao'],0);?></td>
                            <td class="span3 bg-gray">是否4S店保养</td>
                            <td class="span3"><?php echo FF($che['fours'],0);?></td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    <div class="pc-main clear">
            <div class="rep-tit">参数配置</div>
            <div class="rep-tab left">
                



<div class="tab-list">
    <ul>
        <li class="ta-t">基本参数</li>
                    <li class="ta-e">厂商指导价</li>
            <li class="ta-f"><?php echo FF($che['zhidaojia'],0);?></li>
                    <li class="ta-e">级别</li>
            <li class="ta-f"><?php echo FF($che['jibie'],0);?></li>
                    <li class="ta-e">发动机</li>
            <li class="ta-f"><?php echo FF($che['fadongji'],0);?></li>
                    <li class="ta-e">变速箱</li>
            <li class="ta-f"><?php echo FF($che['bs'],0);?></li>
                    <li class="ta-e">长宽高(mm)</li>
            <li class="ta-f"><?php echo FF($che['changkuangao'],0);?></li>
                    <li class="ta-e">轴距(mm)</li>
            <li class="ta-f"><?php echo FF($che['zhouju'],0);?></li>
                    <li class="ta-e">车身结构</li>
            <li class="ta-f"><?php echo FF($che['cheshenjiegou'],0);?></li>
                    <li class="ta-e">整备质量(kg)</li>
            <li class="ta-f"><?php echo FF($che['zhiliang'],0);?></li>
                    <li class="ta-e">行李箱容积(L)</li>
            <li class="ta-f"><?php echo FF($che['rongji'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">发动机</li>
                    <li class="ta-e">发动机型号</li>
            <li class="ta-f"><?php echo FF($che['fadongjixinghao'],0);?></li>
                    <li class="ta-e">排量(L)</li>
            <li class="ta-f"><?php echo FF($che['pailiang'],0);?></li>
                    <li class="ta-e">进气形式</li>
            <li class="ta-f"><?php echo FF($che['jinqi'],0);?></li>
                    <li class="ta-e">汽缸数(个)</li>
            <li class="ta-f"><?php echo FF($che['qigang'],0);?></li>
                    <li class="ta-e">压缩比</li>
            <li class="ta-f"><?php echo FF($che['yasuobi'],0);?></li>
                    <li class="ta-e">最大马力(Ps)</li>
            <li class="ta-f"><?php echo FF($che['zuidamali'],0);?></li>
                    <li class="ta-e">最大扭矩(N*m)</li>
            <li class="ta-f"><?php echo FF($che['zuidaniuju'],0);?></li>
                    <li class="ta-e">燃油标号</li>
            <li class="ta-f"><?php echo FF($che['ranyoubiaohao'],0);?></li>
                    <li class="ta-e">供油方式</li>
            <li class="ta-f"><?php echo FF($che['gongyou'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">底盘和制动</li>
                    <li class="ta-e">驱动方式</li>
            <li class="ta-f"><?php echo FF($che['qudong'],0);?></li>
                    <li class="ta-e">前悬架类型</li>
            <li class="ta-f"><?php echo FF($che['qianxuanjia'],0);?></li>
                    <li class="ta-e">后悬架类型</li>
            <li class="ta-f"><?php echo FF($che['houxuanjia'],0);?></li>
                    <li class="ta-e">助力类型</li>
            <li class="ta-f"><?php echo FF($che['zhuli'],0);?></li>
                    <li class="ta-e">前制动器类型</li>
            <li class="ta-f"><?php echo FF($che['qianzhi'],0);?></li>
                    <li class="ta-e">后制动器类型</li>
            <li class="ta-f"><?php echo FF($che['houzhi'],0);?></li>
                    <li class="ta-e">铝合金轮圈</li>
            <li class="ta-f"><?php echo FF($che['lunquan'],0);?></li>
                    <li class="ta-e">前轮胎规格</li>
            <li class="ta-f"><?php echo FF($che['qiantai'],0);?></li>
                    <li class="ta-e">后轮胎规格</li>
            <li class="ta-f"><?php echo FF($che['houtai'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">安全装置</li>
                    <li class="ta-e">主/副驾驶座安全气囊</li>
            <li class="ta-f"><?php echo FF($che['zhufuanquan'],0);?></li>
                    <li class="ta-e">前/后排侧气囊</li>
            <li class="ta-f"><?php echo FF($che['qianhoucebu'],0);?></li>
                    <li class="ta-e">前/后排头部气囊</li>
            <li class="ta-f"><?php echo FF($che['qianhoutoubu'],0);?></li>
                    <li class="ta-e">儿童座椅接口</li>
            <li class="ta-f"><?php echo FF($che['ertongzuoyi'],0);?></li>
                    <li class="ta-e">无钥匙启动</li>
            <li class="ta-f"><?php echo FF($che['wuyaoshiqidong'],0);?></li>
                    <li class="ta-e">无钥匙进入</li>
            <li class="ta-f"><?php echo FF($che['wuyaoshijinru'],0);?></li>
                    <li class="ta-e">ABS 防抱死</li>
            <li class="ta-f"><?php echo FF($che['absfangbaosi'],0);?></li>
                    <li class="ta-e">车身稳定控制(ESP)</li>
            <li class="ta-f"><?php echo FF($che['cheshenkongzhi'],0);?></li>
                    <li class="ta-e">上坡辅助</li>
            <li class="ta-f"><?php echo FF($che['shangpofuzhu'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">外部配置</li>
                    <li class="ta-e">电动天窗</li>
            <li class="ta-f"><?php echo FF($che['diandongtianchuang'],0);?></li>
                    <li class="ta-e">全景天窗</li>
            <li class="ta-f"><?php echo FF($che['quanjingtianchuang'],0);?></li>
                    <li class="ta-e">氙气大灯</li>
            <li class="ta-f"><?php echo FF($che['shanqidadeng'],0);?></li>
                    <li class="ta-e">LED 大灯</li>
            <li class="ta-f"><?php echo FF($che['leddadeng'],0);?></li>
                    <li class="ta-e">日间行车灯</li>
            <li class="ta-f"><?php echo FF($che['rijianxingchedengy'],0);?></li>
                    <li class="ta-e">前雾灯</li>
            <li class="ta-f"><?php echo FF($che['qianwudeng'],0);?></li>
                    <li class="ta-e">后视镜电动调节</li>
            <li class="ta-f"><?php echo FF($che['houshijing'],0);?></li>
                    <li class="ta-e">前/后电动车窗</li>
            <li class="ta-f"><?php echo FF($che['diandongchechuang'],0);?></li>
                    <li class="ta-e">感应雨刷</li>
            <li class="ta-f"><?php echo FF($che['ganyingyushua'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul>
        <li class="ta-t">内部配置</li>
                    <li class="ta-e">真皮/仿皮座椅</li>
            <li class="ta-f"><?php echo FF($che['zhenpizuoyi'],0);?></li>
                    <li class="ta-e">主/副驾驶座电动调节</li>
            <li class="ta-f"><?php echo FF($che['jiashizuodiandong'],0);?></li>
                    <li class="ta-e">前/后排座椅加热</li>
            <li class="ta-f"><?php echo FF($che['zuoyijiare'],0);?></li>
                    <li class="ta-e">后排座椅放倒方式</li>
            <li class="ta-f"><?php echo FF($che['houpaidaofang'],0);?></li>
                    <li class="ta-e">真皮方向盘</li>
            <li class="ta-f"><?php echo FF($che['zhenpifangxiangpan'],0);?></li>
                    <li class="ta-e">多功能方向盘</li>
            <li class="ta-f"><?php echo FF($che['duogongnengfangxiangpan'],0);?></li>
                    <li class="ta-e">方向盘换挡</li>
            <li class="ta-f"><?php echo FF($che['fangxiangpanhuandang'],0);?></li>
                    <li class="ta-e">定速巡航</li>
            <li class="ta-f"><?php echo FF($che['dingsuxunhang'],0);?></li>
                    <li class="ta-e">空调控制方式</li>
            <li class="ta-f"><?php echo FF($che['kongtiao'],0);?></li>
            </ul>
</div>

            </div>
        </div>

    <div class="pc-main clear" style="border: 10px solid #f2f2f2;border-top: none;">
            <div class="rep-tit">外观检测</div>
            <div class="rep-tab left">
                <ul class="lidian">
                <?php
                $war=CF(FF($che['waiguanxiang'],0),'|');
                    $wlen=count($war);
                        for($n=1;$n<$wlen;$n++){
                            $str.='<li style="width:430px;"><span>'.$n.'</span>'.IIF($war[$n],$war[$n],'').'</li>';
                }
                echo $str;
                ?>
                  
                </ul>
              </div>
              <div class="right">
                <img src="<?php echo FF($che['waiguanimg'],0);?>" width="600" alt="">
              </div>
      <!-- -- -->
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">事故排查</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">事故检测</li>
                    <li class="ta-e">左A柱</li>
            <li class="ta-f"><?php echo FF($che['zuoa'],0);?></li>
                    <li class="ta-e">左B柱</li>
            <li class="ta-f"><?php echo FF($che['zuob'],0);?></li>
                    <li class="ta-e">左C柱</li>
            <li class="ta-f"><?php echo FF($che['zuoc'],0);?></li>
                    <li class="ta-e">左D柱</li>
            <li class="ta-f"><?php echo FF($che['zuod'],0);?></li>
                    <li class="ta-e">左前纵梁</li>
            <li class="ta-f"><?php echo FF($che['zuoqian'],0);?></li>
                    <li class="ta-e">左后纵梁</li>
            <li class="ta-f"><?php echo FF($che['zuohou'],0);?></li>
                    <li class="ta-e">前防撞梁</li>
            <li class="ta-f"><?php echo FF($che['qianfang'],0);?></li>
                    <li class="ta-e">左前梁头</li>
            <li class="ta-f"><?php echo FF($che['zuoqianl'],0);?></li>
                    <li class="ta-e">左下大边</li>
            <li class="ta-f"><?php echo FF($che['zuoxia'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">事故检测</li>
                    <li class="ta-e">右A柱</li>
            <li class="ta-f"><?php echo FF($che['youa'],0);?></li>
                    <li class="ta-e">右B柱</li>
            <li class="ta-f"><?php echo FF($che['youb'],0);?></li>
                    <li class="ta-e">右C柱</li>
            <li class="ta-f"><?php echo FF($che['youc'],0);?></li>
                    <li class="ta-e">右D柱</li>
            <li class="ta-f"><?php echo FF($che['youd'],0);?></li>
                    <li class="ta-e">右前纵梁</li>
            <li class="ta-f"><?php echo FF($che['youqian'],0);?></li>
                    <li class="ta-e">右后纵梁</li>
            <li class="ta-f"><?php echo FF($che['youhou'],0);?></li>
                    <li class="ta-e">后防撞梁</li>
            <li class="ta-f"><?php echo FF($che['houfang'],0);?></li>
                    <li class="ta-e">右前梁头</li>
            <li class="ta-f"><?php echo FF($che['youqianl'],0);?></li>
                    <li class="ta-e">右下大边</li>
            <li class="ta-f"><?php echo FF($che['youxia'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">事故检测</li>
                    <li class="ta-e">左上纵梁</li>
            <li class="ta-f"><?php echo FF($che['zuoshang'],0);?></li>
                    <li class="ta-e">右上纵梁</li>
            <li class="ta-f"><?php echo FF($che['youshang'],0);?></li>
                    <li class="ta-e">左前翼子板骨架</li>
            <li class="ta-f"><?php echo FF($che['zuoqiany'],0);?></li>
                    <li class="ta-e">右前翼子板骨架</li>
            <li class="ta-f"><?php echo FF($che['youqiany'],0);?></li>
                    <li class="ta-e">左前减震器支座</li>
            <li class="ta-f"><?php echo FF($che['zuoqianj'],0);?></li>
                    <li class="ta-e">右前减震器支座</li>
            <li class="ta-f"><?php echo FF($che['youqianj'],0);?></li>
                    <li class="ta-e">后备箱底</li>
            <li class="ta-f"><?php echo FF($che['houbeid'],0);?></li>
                    <li class="ta-e">水箱框架</li>
            <li class="ta-f"><?php echo FF($che['shuixiang'],0);?></li>
                    <li class="ta-e">后尾板</li>
            <li class="ta-f"><?php echo FF($che['houweiban'],0);?></li>
            </ul>
</div>
<div class="tab-list dalist">
    <ul class="shigujian">
        <li class="ta-t">泡水检测</li>
                    <li class="ta-e">座椅底部支架及滑轨有无锈蚀</li>
            <li class="ta-f"><?php echo FF($che['zuoyi'],0);?></li>
                    <li class="ta-e">安全带底部有无水渍或霉斑</li>
            <li class="ta-f"><?php echo FF($che['anquandaidibu'],0);?></li>
                    <li class="ta-e">车底板棉毡有无水渍或泥沙</li>
            <li class="ta-f"><?php echo FF($che['chedimianzhan'],0);?></li>
                    <li class="ta-e">悬挂的固定螺丝及刹车挡板有无锈蚀</li>
            <li class="ta-f"><?php echo FF($che['xuanguaguding'],0);?></li>
                    <li class="ta-e">备胎座有无水渍或泥沙</li>
            <li class="ta-f"><?php echo FF($che['beitaishuizi'],0);?></li>
                    <li class="ta-e">车厢内地胶或地毯有无水渍或污渍</li>
            <li class="ta-f"><?php echo FF($che['chexiangdijiao'],0);?></li>
            </ul>
</div>
<div class="tab-list dalist dalistyou">
    <ul class="shigujian">
        <li class="ta-t">火烧检测</li>
                    <li class="ta-e">车内线束有无火烧痕迹</li>
            <li class="ta-f"><?php echo FF($che['cheneixianshu'],0);?></li>
                    <li class="ta-e">发车内橡胶制品有无火烧痕迹</li>
            <li class="ta-f"><?php echo FF($che['fachexiangjiao'],0);?></li>
                    <li class="ta-e">车身各夹层内有无火烧熏黑痕迹</li>
            <li class="ta-f"><?php echo FF($che['cheshenjiaceng'],0);?></li>
                    <li class="ta-e">发动机舱、车厢、尾箱内有无熏黑痕迹</li>
            <li class="ta-f"><?php echo FF($che['fadongjicang'],0);?></li>
                    <li class="ta-e"></li>
            <li class="ta-f"></li>
                    <li class="ta-e"></li>
            <li class="ta-f"></li>
            </ul>
</div>
      <!-- -- -->
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">内饰检测</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">内饰检测</li>
                    <li class="ta-e">仪表台 </li>
            <li class="ta-f"><?php echo FF($che['yibiaotai'],0);?></li>
                    <li class="ta-e">方向盘 </li>
            <li class="ta-f"><?php echo FF($che['fangxiangpan'],0);?></li>
                    <li class="ta-e">点烟器 </li>
            <li class="ta-f"><?php echo FF($che['dianyanqi'],0);?></li>
                    <li class="ta-e">中控台 </li>
            <li class="ta-f"><?php echo FF($che['zhongkongtai'],0);?></li>
                    <li class="ta-e">档把 </li>
            <li class="ta-f"><?php echo FF($che['dangba'],0);?></li>
                    <li class="ta-e">手套箱 </li>
            <li class="ta-f"><?php echo FF($che['shoutaoxiang'],0);?></li>
                    <li class="ta-e">车顶棚 </li>
            <li class="ta-f"><?php echo FF($che['chedingpeng'],0);?></li>
                    <li class="ta-e">主驾遮阳板 </li>
            <li class="ta-f"><?php echo FF($che['zhuzheyangban'],0);?></li>
                    <li class="ta-e">副驾遮阳板 </li>
            <li class="ta-f"><?php echo FF($che['fuzheyangpan'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">内饰检测</li>
                    <li class="ta-e">车内后视镜 </li>
            <li class="ta-f"><?php echo FF($che['cheneihoushijing'],0);?></li>
                    <li class="ta-e">司机座椅 </li>
            <li class="ta-f"><?php echo FF($che['sijizuoyi'],0);?></li>
                    <li class="ta-e">副驾座椅 </li>
            <li class="ta-f"><?php echo FF($che['fujiazuoyi'],0);?></li>
                    <li class="ta-e">后排座椅 </li>
            <li class="ta-f"><?php echo FF($che['houpaizuoyi'],0);?></li>
                    <li class="ta-e">中央扶手 </li>
            <li class="ta-f"><?php echo FF($che['zhongyangfushou'],0);?></li>
                    <li class="ta-e">左前门饰板 </li>
            <li class="ta-f"><?php echo FF($che['zuoqianmen'],0);?></li>
                    <li class="ta-e">右前门饰板 </li>
            <li class="ta-f"><?php echo FF($che['youqianmen'],0);?></li>
                    <li class="ta-e">左后门饰板 </li>
            <li class="ta-f"><?php echo FF($che['zuohoumen'],0);?></li>
                    <li class="ta-e">右后门饰板</li>
            <li class="ta-f"><?php echo FF($che['youhoumen'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">内饰检测</li>
                    <li class="ta-e">左前门扶手 </li>
            <li class="ta-f"><?php echo FF($che['zuoqianfu'],0);?></li>
                    <li class="ta-e">左后门扶手 </li>
            <li class="ta-f"><?php echo FF($che['zuohoufu'],0);?></li>
                    <li class="ta-e">右前门扶手 </li>
            <li class="ta-f"><?php echo FF($che['youqianfu'],0);?></li>
                    <li class="ta-e">右后门扶手</li>
            <li class="ta-f"><?php echo FF($che['youhoufu'],0);?></li>
                    <li class="ta-e">A柱饰板 </li>
            <li class="ta-f"><?php echo FF($che['azhu'],0);?></li>
                    <li class="ta-e">B柱饰板 </li>
            <li class="ta-f"><?php echo FF($che['bzhu'],0);?></li>
                    <li class="ta-e">C柱饰板 </li>
            <li class="ta-f"><?php echo FF($che['czhu'],0);?></li>
                    <li class="ta-e">后备箱 </li>
            <li class="ta-f"><?php echo FF($che['houbeixiang'],0);?></li>
                    <li class="ta-e">全车胶条 </li>
            <li class="ta-f"><?php echo FF($che['quanche'],0);?></li>
            </ul>
</div>
      <!-- -- -->
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">设备及安全相关检测</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">设备及安全相关检测</li>
                    <li class="ta-e">仪表盘  </li>
            <li class="ta-f"><?php echo FF($che['yibiaopan'],0);?></li>
                    <li class="ta-e">雨刷 </li>
            <li class="ta-f"><?php echo FF($che['yushua'],0);?></li>
                    <li class="ta-e">空调 </li>
            <li class="ta-f"><?php echo FF($che['kongtiaos'],0);?></li>
                    <li class="ta-e">手刹  </li>
            <li class="ta-f"><?php echo FF($che['shousha'],0);?></li>
                    <li class="ta-e">天窗  </li>
            <li class="ta-f"><?php echo FF($che['tianchuang'],0);?></li>
                    <li class="ta-e">GPS导航  </li>
            <li class="ta-f"><?php echo FF($che['gps'],0);?></li>
                    <li class="ta-e">主驾电动座椅  </li>
            <li class="ta-f"><?php echo FF($che['zhujiadiandong'],0);?></li>
                    <li class="ta-e">车内阅读灯  </li>
            <li class="ta-f"><?php echo FF($che['cheneiyuedu'],0);?></li>
                    <li class="ta-e">车窗  </li>
            <li class="ta-f"><?php echo FF($che['chechuang'],0);?></li>
                    <li class="ta-e">音响系统   </li>
            <li class="ta-f"><?php echo FF($che['yinxiang'],0);?></li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">设备及安全相关检测</li>
                    <li class="ta-e">中控锁  </li>
            <li class="ta-f"><?php echo FF($che['zhongkongsuo'],0);?></li>
                    <li class="ta-e">中控显示屏  </li>
            <li class="ta-f"><?php echo FF($che['zhongkongxianshi'],0);?></li>
                    <li class="ta-e">倒车雷达  </li>
            <li class="ta-f"><?php echo FF($che['daocheleida'],0);?></li>
                    <li class="ta-e">副驾电动座椅  </li>
            <li class="ta-f"><?php echo FF($che['fujiadiandong'],0);?></li>
                    <li class="ta-e">仪表提示灯  </li>
            <li class="ta-f"><?php echo FF($che['yibiaotishi'],0);?></li>
                    <li class="ta-e">ABS  </li>
            <li class="ta-f"><?php echo FF($che['abs'],0);?></li>
                    <li class="ta-e">安全气囊  </li>
            <li class="ta-f"><?php echo FF($che['anqanqinang'],0);?></li>
                    <li class="ta-e">安全带 </li>
            <li class="ta-f"><?php echo FF($che['anquandai'],0);?></li>
                    <li class="ta-e">-</li>
            <li class="ta-f">-</li>
                    <li class="ta-e">-</li>
            <li class="ta-f">-</li>
            </ul>
</div>
<div class="tab-list">
    <ul class="shigujian">
        <li class="ta-t">轮胎及灯光</li>
                    <li class="ta-e">轮胎一致性 </li>
            <li class="ta-f"><?php echo FF($che['luntaiyizhi'],0);?></li>
                    <li class="ta-e">胎纹  </li>
            <li class="ta-f"><?php echo FF($che['taiwen'],0);?></li>
                    <li class="ta-e">备胎  </li>
            <li class="ta-f"><?php echo FF($che['beitai'],0);?></li>
                    <li class="ta-e">远光灯 </li>
            <li class="ta-f"><?php echo FF($che['yuanguangdeng'],0);?></li>
                    <li class="ta-e">近光灯  </li>
            <li class="ta-f"><?php echo FF($che['jinguangdeng'],0);?></li>
                    <li class="ta-e">雾灯 </li>
            <li class="ta-f"><?php echo FF($che['wudeng'],0);?></li>
                    <li class="ta-e">转向灯  </li>
            <li class="ta-f"><?php echo FF($che['zhuanxiangdeng'],0);?></li>
                    <li class="ta-e">尾灯  </li>
            <li class="ta-f"><?php echo FF($che['weideng'],0);?></li>
                    <li class="ta-e">刹车灯  </li>
            <li class="ta-f"><?php echo FF($che['shachedeng'],0);?></li>
                    <li class="ta-e">日间行车灯  </li>
            <li class="ta-f"><?php echo FF($che['rijianxingchedeng'],0);?></li>
            </ul>
</div>
      <!-- -- -->
</div>

    <div class="pc-main clear" style="border-top: none;">
            <div class="rep-tit">设备及安全相关检测</div>
<div class="tab-list dalist dalistcenter">
    <ul class="shigujian last">
        <li class="ta-t">发动机舱</li>
                    <li class="ta-e">机油有无冷却液混入</li>
            <li class="ta-f"><?php echo FF($che['jiyou'],0);?></li>
                    <li class="ta-e">散热器格栅有无破损</li>
            <li class="ta-f"><?php echo FF($che['sanreqi'],0);?></li>
                    <li class="ta-e">蓄电池电解液有无渗漏</li>
            <li class="ta-f"><?php echo FF($che['xudianchishenlou'],0);?></li>
                    <li class="ta-e">油管有无老化裂痕</li>
            <li class="ta-f"><?php echo FF($che['youguan'],0);?></li>
                    <li class="ta-e">线束有无老化裂痕</li>
            <li class="ta-f"><?php echo FF($che['xianshulaohua'],0);?></li>
                    <li class="ta-e">缸盖外有无机油渗漏</li>
            <li class="ta-f"><?php echo FF($che['ganggai'],0);?></li>
                    <li class="ta-e">蓄电池电极有无腐蚀</li>
            <li class="ta-f"><?php echo FF($che['xudianchifushi'],0);?></li>
                    <li class="ta-e">发动机皮带有无老化</li>
            <li class="ta-f"><?php echo FF($che['fadongjipidai'],0);?></li>
                    <li class="ta-e">水管有无老化裂痕</li>
            <li class="ta-f"><?php echo FF($che['shuiguanlaohua'],0);?></li>
            </ul>
</div>
</div>
</div>
</div>
<!-- ---------------------------------- -->
<br/>
<div class="main">
<p class="container detail-title">看过的人又看了</p>
<div class="container detail-related">
        <ul class="row-fluid list-row" id="pc_detail_related_car">
                        <?php 
                            $max=$DB->Sel("id,bt,img,yls,tjdj,lc","a_cp","sxt=1","sxt desc,id desc","4");
                            while($maxs=SZ($max)){
                                $img=CF($maxs['img'],',');
                        ?>
                        <li class="span6 spanx list-item">
                <a href="cpx.php?/<?php echo $maxs['id'];?>.html" target="_blank" class="thumbnail" title="<?php echo FF($maxs['bt'],0);?>">

                                        <div class="img-backgound" style="background:url(<?php echo $img[1];?>) no-repeat center center;background-size:cover;"></div>
                    <p><?php echo mb_substr(FF($maxs['bt'],0),0,25,'utf-8');?></p>
                    <div class="price"><?php echo FF($maxs['yls'],0);?><span>万</span>
                        <span class="basic"><?php echo preg_replace('/-/','月',preg_replace('/-/','年',substr($che['tjdj'],0,10),1));?><em class="separator">/</em><?php echo FF($maxs['lc'],0);?>万公里</span>
                    </div>
                </a>
            </li>
            <?php }?>
                    </ul>
    </div>



</div>


<div class="tcbg">
    <div class="tbg"></div>
    <div class="tnr">
        <ul class="tianxie">
            <div class="cancel"></div>
            <li class="shouji">请输入你的手机号</li>
            <li class="baoliu">我们将为您保留车源，并主动联系您</li>
            <li><input type="text" class="name" placeholder="请输入您的姓名"></li>
            <li><input type="text" class="addr" placeholder="请输入您的地区"></li>
            <li><input type="text" class="qq" placeholder="请输入您的QQ"></li>
            <li><input type="text" class="tel" placeholder="请输入您的手机号"></li>
            <li><input type="submit" value="提交" style="cursor: pointer;" class="tijiaos querentijiaos"></li>
        </ul>
    </div>
</div>
<!-- E同价格车源 --><?php require_once("down.php");?>