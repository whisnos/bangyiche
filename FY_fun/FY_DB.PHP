<?php
//require() 里引用的文件必须存在，如果不存在，程序通不过 
//include()引用的文件如果不存在，只是有警告而已
//require_once()
//include_once()

defined("NO_TF") or exit('没有许可.');  
class FY_DB{
//public:  test中的public可以被继承。
//private:  test中的private不可以被继承。
//protected：  test中的protected可以被继承。
//static：  test中的static可以被继承。
//var_dump($con);
//print_r()
  public $fb="";//表名
  public $fw=array();//判断
  public $fx="";//排序
  public $fa=20;//默认页值
  public $fp=1;//当前页数
  public $ft="*";//没有字段
  public $fqhs=2;//前后有多条
  public $flike="";//链接样式
  public $flikez="u";//链接属性
  public $fs=0;//总条数
  public $fzz=1;//总页数
  public $con;
  function __construct(){}
  function __destory(){mysql_close(!$this->con);}
  function Open(){
    include("FY_DB_i.PHP");
    $con=mysqli_connect($db[0],$db[2],$db[3]);
    if(!$con){
      ERR('不能连接:'. mysqli_error());
    }
    mysqli_select_db($con, $db[1]);
    mysqli_query($con, "SET NAMES '".$db[4]."'");
    $this->con=$con;return $con;
  }
  function Sels($a,$b,$c,$d,$e){return SZ($this->LIM($a,$b,$c,$d,$e,""));}
  function Sel($a,$b,$c,$d,$e){return $this->LIM($a,$b,$c,$d,$e,"");}
  
  function add($a,$b,$c){$d="";$e="";$i=0;while(each($b)){$e.=IFT($i,",")."`".$b[$i]."`";$d.=IFT($i,",")."'".$this->SJLXBH($a,"field='".$b[$i]."'",FF($c[$i],1))."'";$i++;}$co=$this->Exe("INSERT INTO ".F_DB."$a ($e) VALUES ($d)",true);return $co;}
  function upd($a,$b,$c,$d){$e="";$i=0;while(each($b)){$e.=IFT($i,",")."`".$b[$i]."`='".$this->SJLXBH($a,"field='".$b[$i]."'",FF($c[$i],1))."'";$i++;}$co=$this->Exe("UPDATE ".F_DB."$a SET $e WHERE ($d)",true);return $co;}
  function del($a,$b){$co=$this->Exe("delete from ".F_DB."$a where $b",true);return $co;}
  
  function Ses($a,$b){$b=IFT($b," where $b");$co=SZ($this->Exe("SELECT count(*) as amount FROM ".F_DB."$a $b",false));return $co;}
  function Setf($a,$b){return !!SZT($this->Sel("*",$a,$b,"",""));}
  function Exe($a,$b){if (!$this->con){ERR('不能连接: '.mysqli_error());};$co=mysqli_query($this->con, $a) or ERR($a);if($b){return ITF($co);}else{return $co;}}
  function LIM($a,$b,$c,$d,$e,$f){$a=IIF($a,$a,"*");$c=IFT($c,"where $c");$d=IFT($d,"order by $d"); $f=IFT($f,",$f");$e=IFT($e||$f,"limit $e$f");
  
  $co=$this->Exe("Select $a From ".F_DB."$b $c $d $e",false);return $co;}
  function SJLXBH($a,$b,$z){
	    $aa=$this->Sffg($a,$b,"Type");
		$ab=array('int');
		if(BH($aa,$ab)){
			if(strlen($z)>0){
				return $z;
			}else{
				return '0';
			}
		}else{
			return $z;
		}
  }
  
  function Sffs($a,$b){return SZ($this->Sff($a,$b));}
  function Sff($a,$b){$b=IFT($b," where $b");$co=$this->Exe("show full fields from ".F_DB."$a $b",false);return $co;}
  function Zdgs($z){$i=0;while($s=SZ($z)){$i++;};return $i;}
  function Sffg($a,$b,$c){$cc=SZ($this->Sff($a,$b));return $cc[$c];}
  
  
  
  function FP($a){$this->fp=IIF($a<2,1,$a);}
  function FZW($a){array_push($this->fw,$a);}
  function FZ(){$a=($this->fp-1)*$this->fa;return $this->LIM($this->ft,$this->fb,join(" and ",$this->fw),$this->fx,$a,$this->fa);}
  function Fzz(){$fs=($this->Ses($this->fb,join(" and ",$this->fw)));$this->fs=$fs[0];return ceil($this->fs/$this->fa);}
  function FCZ(){$this->fa=20;$this->ft="*";$this->fp=1;$this->fw=array();$this->fb="";$this->fx="";}
  function Fztl($a){return TH("*",$a,$this->flike);}
  function FY2(){
    $fs=($this->Ses($this->fb,join(" and ",$this->fw)));$this->fs=$fs[0];
    $this->fzz=ceil($this->fs/$this->fa);
    $f='<div class="page" style="display:none;">';
    $f=$f.IIF($this->fp>1,'<a '.' name="first">首页</a>','<span>首页</span>');
    $f=$f.IIF($this->fp>1,'<a '.' name="prev">上一页</a>','<span>上一页</span>');
	if($this->fzz<($this->fqhs*2)+1){$fi=1;$fzz=$this->fzz;}else{$fi=$this->fp-$this->fqhs;$fi=IIF($fi<1,1,$fi);$fzz=$this->fp+$this->fqhs;$fzz=IIF($fzz<$this->fzz,$fzz,$this->fzz);}
	for($i=$fi;$i<=$fzz;$i++){$f=$f.IIF($this->fp!=$i,'<a>'.$i.'</a>','<span class="cur">'.$i.'</span>');}
    $f=$f.IIF($this->fzz>$this->fp,'<a '.' name="next">下一页</a>','<span>下一页</span>');
    $f=$f.IIF($this->fzz>$this->fp,'<a '.' name="'.$this->Fzz().'">尾页</a>','<span>尾页</span>');
    $f=$f.'</div>';
	return $f;
  }
  function FY(){
    $fs=($this->Ses($this->fb,join(" and ",$this->fw)));$this->fs=$fs[0];
    $this->fzz=ceil($this->fs/$this->fa);
    $f='<div class="page">';
    $f=$f.IIF($this->fp>1,'<a '.$this->flikez.'="'.$this->Fztl(1).'">首页</a>','<span>首页</span>');
    $f=$f.IIF($this->fp>1,'<a '.$this->flikez.'="'.$this->Fztl($this->fp-1).'">上一页</a>','<span>上一页</span>');
  if($this->fzz<($this->fqhs*2)+1){$fi=1;$fzz=$this->fzz;}else{$fi=$this->fp-$this->fqhs;$fi=IIF($fi<1,1,$fi);$fzz=$this->fp+$this->fqhs;$fzz=IIF($fzz<$this->fzz,$fzz,$this->fzz);}
  for($i=$fi;$i<=$fzz;$i++){$f=$f.IIF($this->fp!=$i,'<a '.$this->flikez.'="'.$this->Fztl($i).'">'.$i.'</a>','<span>'.$i.'</span>');}
    $f=$f.IIF($this->fzz>$this->fp,'<a '.$this->flikez.'="'.$this->Fztl($this->fp+1).'">下一页</a>','<span>下一页</span>');
    $f=$f.IIF($this->fzz>$this->fp,'<a '.$this->flikez.'="'.$this->Fztl($this->fzz).'">尾页</a>','<span>尾页</span>');

    $f=$f.'</div>';
  return $f;
  }
  function arrayz($a,$b,$c,$d,$e,$f,$g,$h){
	  $f1=$this->Sel($b,$c,$d,$e,$f);
	  $z='';
	  while($R=SZ($f1)){
		  $t=$a;
		  for ($i=0;$i<CFZ(CF($b,","));$i++){
			  $t=TH("{z$i}",$R[$i],$t);
			  if($R[0]==$h){
				  $t=TH("{t}",$g,$t);
			  }
			  if(BH($a,"{bq}")){$t=TH("{bq}",BQ("","&nbsp; ",(CFZ(CF($R[2],","))-2)),$t);}
		  }
		  $z.=$t;
	  }
	  return  $z;
  }
  function XH($a,$b,$c,$d,$e){
  }

}?>