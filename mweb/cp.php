<?php require_once('../FY_fun/FY_qtm.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=2;
$Wz=R(0,0);
$Ws=R(1,0);
$DB->FCZ();
$DB->fb="a_cp";
$DB->fa=10;
if ($Ws==1){
   $DB->FZW("lbh like',1,%'");
}elseif ($Ws>1){
   $dl=$DB->Sels("id,bh","a_cpl","id=$Ws","id desc","");
   $DB->FZW("lbh like'$dl[1]%'");
}
$DB->FP($Wz);
$DB->fx="id desc";
$DB->flikez="href";

$DB->ft="id,bt,sxz,sxf,sxt,tjdj,lbh,lmc,img";
$DB->flike="cp.php?/*_$Ws.html";
$fz=$DB->FZ();

require_once('top.php'); ?>
<div class="p_tabnav">
	<h3><a href="cp.php">产品分类</a></h3>
</div>

<div class="cpl">
	<ul>
<?php 
$cpl=$DB->Sel("id,lm","a_cpl","","","");
while($R=SZ($cpl))
{
  echo '<li><a href="cp.php?/0_'.$R[0].'.html">'.FF($R[1],0).'</a></li>'.PHP_EOL;
   
}?>
     </ul>  
</div>

<div class="p_tabnav">
	<h3><a href="cp.php">产品展示</a></h3>
</div>

<div class="cp">
     <ul><?php
         while($R = SZ($fz))
          { $img=CF($R[8],",");
          if(empty($img[1])){$img[1]="";}
              echo '<li><a class="img" href="cpx.php?/'.$R[0].'.html"><img src="'.$img[1].'" /></a><a href="cpx.php?/'.$R[0].'.html">'.FF($R[1],0).'</a></li>'.PHP_EOL;
          }?>
        </ul>
</div>
<div class="pages">
    <?php echo $DB->FY();?>
</div>
</div>

<?php require_once('down.php'); ?>