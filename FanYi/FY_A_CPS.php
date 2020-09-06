<?php include_once("FY_fun.php");

 $jt="<script language='javascript'>jzwc()";
 $jt.="</script>";
 echo $jt;


$date=date("YmdHis"); 
$date2=substr($date,0,8);

$str=getcwd();
$str=str_replace(strrchr($str,"/"),"",$str);


$tump="{$str}/FYUP/tump/";
$FYUP="{$str}/FYUP/image/image/";
$dir=scandir($tump);
if(isset($dir[2])){
		
	for($i=2;$i<count($dir);$i++){
		$lid=$dir[$i];	
		$lmc=$DB->Sels("bh,lm","a_cpl","id=$lid","","");
		$lmc2=$DB->Sels("lid,lbh,lmc,bt,gjz,ms,sxz,sxf,sxt,ly,zz,yls,img,jy,lr,id","a_cp","lid=$lid","id asc","1");
		$dir2=scandir($tump.$lid);
		for($j=2;$j<count($dir2);$j++){			
			$date3=$date."_".mt_rand(0,999999);
			$fiels=CF($dir2[$j],"_1.jpg");
			if(!isset($fiels[1])){
				$fiels=CF($dir2[$j],".jpg");
				$oldname=$tump.$dir[$i]."/".$dir2[$j];
				$newname=$FYUP.$date3.".jpg";
				
				$oldname2=$tump.$dir[$i]."/".$fiels[0]."_1.jpg";
				$newname2=$FYUP.$date3."_1.jpg";
				
				$imgs2=rename($oldname2,$newname2);
				if($imgs2){$img2='<img src="/FYUP/image/image/'.$date3.'_1.jpg" alt="" /><br/>';}else{$img2=null;}
				
				$imgs=rename($oldname,$newname);
				if($imgs){$img=",/FYUP/image/image/".$date3.".jpg";}
				$lrs=FF($lmc2[14],0);
				$lr=$img2.$lrs;
								
				$id=$DB->Sels("count(*)","a_cp","lid=$lid","id desc","");
				if($id[0]){$lmc2[15]=$id[0];}else{$lmc2[15]=0;}
				$bt=$lmc2[3].($lmc2[15]+1);
				
				$DB->add('a_cp',array('lid','lbh','lmc','bt','gjz','ms','sxz','sxf','sxt','ly','zz','yls','img','jy','lr','tjdj'),
				array($lmc2[0],$lmc2[1],$lmc2[2],$bt,$lmc2[4],$lmc2[5],$lmc2[6],$lmc2[7],$lmc2[8],$lmc2[9],$lmc2[10],$lmc2[11],$img,$lmc2[13],$lr,date('Y-m-d H:i:s')));
			}

				
		   	}
			
		}
	
for($a=0;$a<count($dir);$a++){
		$dir3=scandir($tump.$dir[$a]);
				
		if($a>1){	
			for($b=0;$b<count($dir3);$b++){
				if($b>1){					
					if(is_dir($tump.$dir[$a]."/".$dir3[$b])){
						rmdir($tump.$dir[$a]."/".$dir3[$b]);
					}else{
						unlink($tump.$dir[$a]."/".$dir3[$b]);
					}
				}else{
					if(is_dir($tump.$dir[$a]."/".$dir3[$b])){
						rmdir($tump.$dir[$a]."/".$dir3[$b]);
					}else{
						unlink($tump.$dir[$a]."/".$dir3[$b]);
					}
				}
				
			}
			rmdir($tump.$dir[$a]);
		}else{
			if(is_dir($tump.$dir[$a])){
					rmdir($tump.$dir[$a]);
				}else{
					rmdir($tump.$dir[$a]);
				}	
			
			}
	}
	
	
}else{
	die();
	}
?>