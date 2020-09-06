<?php require_once('FY_fun.PHP');
sj($_SERVER['SERVER_NAME'],"/mweb");


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
















?>