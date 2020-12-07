<?php include_once("FY_fun.php");
ZY();
$Wz=R(0,0);
  // header("location: FY.php");
if($Wz==1){
  $a=rp("us");
  $b=rp("pw");
  $c=strtoupper(rp("yz"));
  if(!$a&&!$b){die("1");}else{$b=M($b);}
  if(!$c){die("2");}  
  if($c!=SE("FY_YZ")){die("3");}SED("FY_YZ");
  $us=$DB->Sels("id,us,pw","user","us='$a'","id desc","");
  //print_r($us);
  if($us){
	 	  echo($b."\n".$us["pw"]."\n");
	  if($b==$us["pw"]){SEA("SU_id",$us[0]);SEA("SU_us",$us[1]);ru(F_HT);header("location: FY.php");}else{die(4);}}else{die(4);}
	
	
}elseif($Wz==2){
	  SED("SU_id");SEQ();
  // header("location: FY.php");
	  ru(F_HT);
}?>