<?php require_once('../FY_fun/FY_qtm.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=1;
$Wz=R(0,1);
require_once('top.php'); ?>

<div id="focus" class="focus">
    <div class="hd">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
            <li><img src="img/tb1.jpg" /></li>
            <li><img src="img/tb2.jpg" /></li>
            <li><img src="img/tb3.jpg" /></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#focus",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPlay:true,//自动播放
		autoPage:true //自动分页
	});
</script>

<div class="p_tabnav">
	<h3><a href="cp.php">产品展示</a></h3>
</div>

<div class="cp">
	<ul>
<?php 
	$cpl=$DB->Sel("id,bt,img","a_cp","sxt=1","id desc","0,12");
		while($R=SZ($cpl)){
			$img=CF($R[2],',');
			echo '	<li>
						<a href="cpx.php?/'.$R[0].'.html" class="img"><img src="'.$img[1].'" /></a>
						<a href="cpx.php?/'.$R[0].'.html">'.$R[1].'</a>
					</li>
			';
			}
?>
    </ul>
</div>

<?php require_once('down.php'); ?>