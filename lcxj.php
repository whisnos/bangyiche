<?php  
require_once('FY_fun/FY_qt.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=R(1,0);
$id=R(2,0);
require_once("top.php");
$yad=$DB->Sels("img","a_adv","lid=4","id desc","1");
$yimg=CF($yad['img'],',');
?>

<div class="all" style="background:#9dd8ff url(<?php echo $yimg[1];?>) no-repeat center center;background-size:auto 100% ;">
	<div class="main womaiche"  style="">
		
	</div>
</div>

<div class="all">
	<div class="main liucheng">
		<?php $lc=$DB->Sels("lr","a_dy","id=$id","","");echo FF($lc['lr'],0);?>
	</div>
</div>

<?php require_once("down.php");?>

