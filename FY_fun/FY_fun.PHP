<?php
session_start();
include_once('IIS.PHP');
include_once('100.PHP');
include_once('FY_DB.PHP');
//include_once()
//require_once()
$DB= new FY_DB(); 
$CN=$DB->Open();
$FYS=$DB->Sels("*","sy","id=1","id desc","");
defined("NO_TF") or exit('没有许可.');    
include_once('FY_Form.PHP');
function sj($u,$us){
	// $agent=$_SERVER['HTTP_USER_AGENT'];
	// if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){$cp='/mweb';}
	// if($us!=@$cp){
	// 	header("Location:http://".$u.$cp);
	// }
}
?>