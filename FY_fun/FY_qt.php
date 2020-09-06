<?php require_once('FY_fun.PHP');
sj($_SERVER['SERVER_NAME'],"");


//单页读取
//D_DY(样式,读取id)
function D_DY($w,$id){
	global $DB;
	if(is_numeric($id)){$id="id=".$id;}
	$FU=$DB->Sels("*","a_dy",$id,"","");
      $w=TH("{na}",FF($R[1],0),$w);
      $w=TH("{gjz}",FF($R[2],0),$w);
      $w=TH("{ms}",FF($R[3],0),$w);
      $w=TH("{jy}",FF($R[4],0),$w);
      $w=TH("{da}",FF($R[5],0),$w);
      $w=TH("{lr}",FF($R[6],0),$w);
      $w=TH("{t1}",FF($R[7],0),$w);
      $w=TH("{t2}",FF($R[8],0),$w);
      $w=TH("{t3}",FF($R[9],0),$w);
      $w=TH("{t4}",FF($R[10],0),$w);
      $w=TH("{t5}",FF($R[11],0),$w);
	return $w;
}

//单页读取列表
//D_DY(样式,特定样式id,特定样式,排序,显示个数)
function D_DYS($w,$id,$y,$z,$g){
	global $DB;
	if(is_numeric($id)){$idw=true;}else{$idw=false;}
	$FU=$DB->Sel("*","a_dy","",$z,$g);
	while($R=SZ($FU)){
      $a=TH("{na}",FF($R[1],0),$a);
      $a=TH("{gjz}",FF($R[2],0),$a);
      $a=TH("{ms}",FF($R[3],0),$a);
      $a=TH("{jy}",FF($R[4],0),$a);
      $a=TH("{da}",FF($R[5],0),$a);
      $a=TH("{lr}",FF($R[6],0),$a);
      $a=TH("{t1}",FF($R[7],0),$a);
      $a=TH("{t2}",FF($R[8],0),$a);
      $a=TH("{t3}",FF($R[9],0),$a);
      $a=TH("{t4}",FF($R[10],0),$a);
      $a=TH("{t5}",FF($R[11],0),$a);
	  if($idw){
        if($R[0]==$id){$a=TH("{t}",$y,$a);}
	  }else{
        if($R[1]==$id){$a=TH("{t}",$y,$a);}
	  }
	}	
	return $w;
}

//单页读取列表
//D_DY(样式,特定样式id,特定样式,筛选,排序,显示个数)
function D_WDS($w,$id,$y,$s,$z,$g){
	global $DB;
	if(is_numeric($id)){$idw=true;}else{$idw=false;}
	$FU=$DB->Sel("id,bt,gjz,ms,jy,tjdj,lr","a_wd",$s,$z,$g);
	$lb='';
	while($R=SZ($FU)){
      $a=TH("{id}",$R[0],$w);
      $a=TH("{bt}",FF($R[1],0),$a);
      $a=TH("{gjz}",FF($R[2],0),$a);
      $a=TH("{ms}",FF($R[3],0),$a);
      $a=TH("{jy}",FF($R[4],0),$a);
      $a=TH("{da}",FF($R[5],0),$a);
      $a=TH("{lr}",FF($R[6],0),$a);
	  if($idw){
        if($R[0]==$id){$a=TH("{t}",$y,$a);}
	  }else{
        if($R[1]==$id){$a=TH("{t}",$y,$a);}
	  }
	  $lb.=$a;
	}	
	return $lb;
}







//产品读取列表
//D_CPL(样式,特定样式id,特定样式,筛选,排序,显示个数)
function D_CPL($w,$id,$y,$s,$z,$g){
	global $DB;
	if(is_numeric($id)){$idw=true;}else{$idw=false;}
	$FU=$DB->Sel("*","a_cpl",$s,$z,$g);
	$lb='';
	while($R=SZ($FU)){
      $a=TH("{id}",$R[0],$w);
      $a=TH("{bt}",$R[1],$a);
      $a=TH("{gjz}",$R[2],$a);
      $a=TH("{ms}",$R[3],$a);
      $a=TH("{bh}",$R[6],$a);
      $a=TH("{lid}",$R[7],$a);
      $a=TH("{lmc}",$R[8],$a);
	  if($idw){
        if($R[0]==$id){$a=TH("{t}",$y,$a);}
	  }else{
        if($R[1]==$id){$a=TH("{t}",$y,$a);}
	  }
	  $lb.=$a;
	}	
	return $lb;
}




 function szm($str){       
    $fchar = ord($str{0});    
    if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($str{0});    
    $s1 = iconv("UTF-8","gb2312", $str);    
    $s2 = iconv("gb2312","UTF-8", $s1);    
    if($s2 == $str){$s = $s1;}  
    else{$s = $str;}    
    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;    
    if($asc >= -20319 and $asc <= -20284) return "A";    
    if($asc >= -20283 and $asc <= -19776) return "B";    
    if($asc >= -19775 and $asc <= -19219) return "C";    
    if($asc >= -19218 and $asc <= -18711) return "D";    
    if($asc >= -18710 and $asc <= -18527) return "E";    
    if($asc >= -18526 and $asc <= -18240) return "F";    
    if($asc >= -18239 and $asc <= -17923) return "G";    
    if($asc >= -17922 and $asc <= -17418) return "H";    
    if($asc >= -17417 and $asc <= -16475) return "J";    
    if($asc >= -16474 and $asc <= -16213) return "K";    
    if($asc >= -16212 and $asc <= -15641) return "L";    
    if($asc >= -15640 and $asc <= -15166) return "M";    
    if($asc >= -15165 and $asc <= -14923) return "N";    
    if($asc >= -14922 and $asc <= -14915) return "O";    
    if($asc >= -14914 and $asc <= -14631) return "P";    
    if($asc >= -14630 and $asc <= -14150) return "Q";    
    if($asc >= -14149 and $asc <= -14091) return "R";    
    if($asc >= -14090 and $asc <= -13319) return "S";    
    if($asc >= -13318 and $asc <= -12839) return "T";    
    if($asc >= -12838 and $asc <= -12557) return "W";    
    if($asc >= -12556 and $asc <= -11848) return "X";    
    if($asc >= -11847 and $asc <= -11056) return "Y";    
    if($asc >= -11055 and $asc <= -10247) return "Z";    
    return null;    
}












?>