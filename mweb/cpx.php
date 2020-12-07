<?php require_once('../FY_fun/FY_qtm.php');
$Wz=R(0,0);
$Ws=R(1,0);
if($Wz==0){
$sy=$DB->Sels("bt,img,lr,gjz,ms,lid,id","a_cp","","id desc","");
}else{
$sy=$DB->Sels("bt,img,lr,gjz,ms,lid,id","a_cp","id=$Wz","id desc","");
}
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
$z=2;
require_once('top.php'); ?>

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

<div class="cpx">
	<h3><?php echo $sy[0];?></h3>
    <div class="cont">
    	<img src="<?php  $img=CF($sy[1],",");echo $img[1];?>" />
    </div>
</div>

<?php require_once('down.php');?>