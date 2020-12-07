<?php  
require_once('FY_fun/FY_qt.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=R(1,0);
require_once("top.php");
$mad=$DB->Sels("img","a_adv","lid=2","id desc","1");
$yad=$DB->Sels("img","a_adv","lid=3","id desc","1");
$mimg=CF($mad['img'],',');
$yimg=CF($yad['img'],',');
?>

<div class="all" style="background:url(<?php echo $mimg[1];?>) no-repeat center center;background-size:auto 100% ;">
	<div class="main clear womaiche">
            <DIV class="xuanche2 xuanche3 on left">
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
                        <input type="submit" value="提交预约" class="tijiao mmmaiche">
                    </form>
            </DIV>
            <div class="youbtu right" style="background:url(<?php echo $yimg[1];?>) no-repeat center center;">
				<p class="bang right">在帮易车已有<span>8188</span>位车售出，<a href="">看看这些车主怎么说>></a></p>
            </div>
	</div>

</div>

<div class="all">
	<div class="maiche_fw main">

<?php
	$n=0;
	$mc=$DB->Sel("bt,ms,img","a_wd","lid=5","sxt desc,id desc","4");
	while($mcs=SZ($mc)){
		$n++;
		$img=CF($mcs['img'],',');
?>

	<dl>
		<dt><img src="<?php echo $img[1];?>"></dt>
		<dd class="mfz"><span><?php echo $n;?></span> <?php echo $mcs['bt'];?></dd>
		<dd></dd>
		<?php
			$x=CF($mcs['ms'],'%~~');
			for($i=0;$i<count($x);$i++){
		?>
		<p class="mfp" style="padding:3px 0 0 91px;"><?php echo $x[$i];?></p>
		<?php }?>
	</dl>

	<?php }?>
	<div class="clear">
	</div>
</div>

<div class="main mcxq">
	<?php $xq=$DB->Sels("lr","a_dy","id=18","","");echo FF($xq['lr'],0);?>
</div>

<div class="maiche_gushi main">
	<div class="mg_tit">
		车主卖车故事<a href="ycsj.php?/0_6_1">查看更多卖车故事&gt;&gt;</a>
	</div>
	<div class="mg_list">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
		<tr>
<?php
	$mc=$DB->Sel("id,bt,img","a_wd","lid=1","sxt desc,id desc","4");
	while($mcs=SZ($mc)){
		$img=CF($mcs['img'],',');
?>


			<td width="10">
				&nbsp;
			</td>
			<td class="gspic">
				<a target="_blank" href="ycsjx.php?/<?php echo $mcs['id'];?>.html"><img src="<?php echo $img[1];?>"></a>
				<div class="gstit">
					&nbsp;&nbsp;<a target="_blank" href="ycsjx.php?/<?php echo $mcs['id'];?>.html"><?php echo $mcs['bt'];?></a>
				</div>
			</td>
<?php }?>


			<td width="10">
				&nbsp;
			</td>
		</tr>
		</tbody>
		</table>
	</div>
</div>
</div>

<?php require_once("down.php");?>