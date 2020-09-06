<?php
function rg($a){return rgpq($a,"g");}
function rp($a){return rgpq($a,"p");}
function ru($a){header("Location: $a");}
function rgpq($a,$c){if($a){switch ($c){case "g":if(isset($_GET[$a])){return T($_GET[$a]);}else{return "";}break;case "p":if(isset($_POST[$a])){return T($_POST[$a]);}else{return "";}break;case "q":break;}}else{return "";}}
function IIF($a,$b,$c){if($a){return $b;}else{return $c;}}
function IFT($a,$b){if($a){return $b;}else{return "";}}
function ITF($a){if(isset($a)){return true;}else{return false;}}
function SZ($a){return mysql_fetch_array($a);};
function SZT($a){return mysql_num_rows($a);};
function BH($a,$b){if($a&&$b){if(is_array($b)){$tf=false;for($i=0;$i<CFZ($b);$i++){if(!is_bool(strpos($a,$b[$i]))){$tf=true;}}return $tf;}else{return strpos($a,$b)!==false;}}else{return false;}}
function TH($t,$h,$z){return str_replace($t,$h,$z);}

function SE($t){if(isset($_SESSION[$t])){return $_SESSION[$t];}else{return "";}}
function SEA($t,$h){$_SESSION[$t]=$h;}
function SED($t){unset($_SESSION[$t]);}
function SEQ(){session_destroy();}

function T($a){if($a){return FF($a,'');}else{return "";}}
function M($a){return md5($a);}
function DAT($a,$b){return date($a,strtotime($b));}
function CF($a,$b){return explode($b,$a);}
function CFZ($a){return count($a);}
function ZH($a,$b,$c,$d){$cl=is_numeric($c);$dz="";$ds="";for($i=0;$i<=CFZ($d)-1;$i++){if($cl){$dz=TH("{t}",IFT($c==$i,$b),$a);}else{$dz=TH("{t}",IFT($c==$d[$i],$b),$a);}$dz=TH("{z}",$d[$i],$dz);$dz=TH("{i}",$i,$dz);$ds=$ds.$dz;};return $ds;}
function ZHA($a,$b){$c=false;if(is_array($b)){$c=in_array($a,$b);}else{$c=ITF($a==$b);}return $c;}
function CMK($a){return new COM($a);}
function BQ($a,$b,$c){$aa=strlen($a);$bb="";for($i=0;$i<$c;$i++){$bb.=$b;}return $bb.$a;}

function FF($a,$b){
  $b=IIF($b,$b,0);
  switch ($b){
  case 0:
    $a=TH("&38;",chr(38),$a);
    $a=TH("&9;",chr(9),$a);
    $a=TH("&10;",chr(10),$a);
    $a=TH("&13;",chr(13),$a);
    $a=TH("&33;",chr(33),$a);
    $a=TH("&34;",chr(34),$a);
    $a=TH("&36;",chr(36),$a);
    $a=TH("&39;",chr(39),$a);
    $a=TH("&40;",chr(40),$a);
    $a=TH("&41;",chr(41),$a);
    $a=TH("&60;",chr(60),$a);
    $a=TH("&62;",chr(62),$a);
    $a=TH("&hc;",PHP_EOL,$a);
    break;  
  case 1://表单替换入
    $a=TH(chr(38),"&38;",$a);
    $a=TH(chr(9),"&9;",$a);
    $a=TH(chr(10),"&10;",$a);
    $a=TH(chr(13),"&13;",$a);
    $a=TH(chr(33),"&33;",$a);
    $a=TH(chr(34),"&34;",$a);
    $a=TH(chr(36),"&36;",$a);
    $a=TH(chr(39),"&39;",$a);
    $a=TH(chr(40),"&40;",$a);
    $a=TH(chr(41),"&41;",$a);
    $a=TH(chr(60),"&60;",$a);
    $a=TH(chr(62),"&62;",$a);
    $a=TH(PHP_EOL,"&hc;",$a);
    break;
  //default:
  };return $a;
}
function FFS($a){return FF($a,0);}

function dateas($a,$b,$c){
  $l=$c{strlen($c)-1};
  switch ($l){
    case "y":$c=str_replace("y","year",$c);break; //年
    case "m":$c=str_replace("m","month",$c);break; //月
    case "w":$c=str_replace("w","week",$c);break; //周
    case "d":$c=str_replace("d","day",$c);break; //日
    case "h":$c=str_replace("h","hours",$c);break; //时
    case "i":$c=str_replace("i","minutes",$c);break; //分
    case "s":$c=str_replace("s","seconds",$c);break; //秒
    default:$c="0 seconds";break;//不加
  }return date($a,strtotime("$b + $c"));
}
class FY_html{
  private $tj=array();//查询条件(数组)
  private $tc=array();//查询条件(数组)
  private $tr=array();//查询条件(数组)
  private $jt="\n<script language='javascript'>\n";
  private $jd="\n</script>";
  private $ct="<style type='text/css'>\n";
  private $cd="\n</style>\n";
  public function aj($a){$a=TH("$.dialog","#.dialog",$a);array_push($this->tj,$a);}
  public function ar($a){array_push($this->tr,$a);}
  public function ac($a){array_push($this->tc,$a);}
  public function c(){$a=join("\n",$this->tc);return IFT(count($this->tc)>0,$this->ct.$a.$this->cd);}
  public function r(){return join("\n",$this->tr);}
  public function j(){$a=join("\n",$this->tj);return IFT(count($this->tj)>0,$this->jt.$a.$this->jd);}
  public function x(){return $this->c().$this->r().$this->j();}
}


function ERR($a){die(IIF(NO_TF,$a,ER0));}
function ZY(){$action = $_SERVER['PHP_SELF'];if ($_SERVER['REQUEST_METHOD'] == 'POST'){$ref = $_SERVER['HTTP_REFERER'];$srv ="http://{$_SERVER['SERVER_NAME']}$action";if (strcmp($ref,$srv == 0)){}else {ERR('非法提交');}}else{ERR('没数据！');}}
function ZYs(){$action = $_SERVER['PHP_SELF'];if ($_SERVER['REQUEST_METHOD'] == 'POST'){$ref = $_SERVER['HTTP_REFERER'];$srv ="http://{$_SERVER['SERVER_NAME']}$action";if (strcmp($ref,$srv == 0)){}else {ERR('非法提交');}}}
function R($w,$z){$qz=TH(".html","",TH("/","",TH("&","_",$_SERVER["QUERY_STRING"])));if(!$qz){return $z;}else{$b=CF($qz,"_");$c=IIF(CFZ($b)>-1,CFZ($b),-1);if($c>($w)){return intval($b[$w]);}else{return $z;}}}
?>