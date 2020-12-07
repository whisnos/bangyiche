<?php require_once('../FY_fun/FY_qtm.php');
$title=FFS($FYS[1]);
$gjz=FFS($FYS[2]);
$ms=FFS($FYS[3]);
require_once('top.php'); ?>
<div class="p_tabnav" style=" margin-top:10px;">
	<h3><a href="lx.php">联系我们</a></h3>
</div>

<div class="about">                    
	 <?php 
        $ab=$DB->Sels("lr","a_dy","id=9","","");echo FF($ab[0],0);
    ?>                    
</div>
<?php require_once('down.php'); ?>