
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理端</title>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background:#333">
<?php set_time_limit(1);
/*
 include_once("FY_fun.php");
$jsid=rg("jsid");
echo $DB->arrayz("<a onclick='atc(\"$jsid\")'>{z1}</a><br />","id,lm","a_wdl","","","","","");


$jsid=0;
$a=4;
var_dump(is_array($jsid));
var_dump(in_array($a, $jsid));


*/
/*echo uniqid();
echo "<br />";
echo "ds";
echo "<br />";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br />";
highlight_string("Hello world! <?php phpinfo(\"没有东东\"); ?>");

echo "<br />";

$conn = ftp_connect("192.168.0.2") or die("ftp地址错误！");
echo "<br />";
ftp_login($conn,"xinshantong","123123")or die("ftp帐号或密码错误！");
echo "<br />";

echo ftp_size($conn,"web/index.asp");
print_r (ftp_nlist($conn,"web/"));
echo "<br />";

ftp_close($conn);

echo "dsd<br />";

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}'; 
var_dump(json_decode($json)); 
echo "dsd<br />";
var_dump(json_decode($json, true));*/
//echo phpinfo()
$b=new COM("iismanage.php");
var_dump($b)."<br>";
print_r($b)."<br>";
$a=$b->ZZ();

echo $a."<br />";

echo $_SERVER['HTTP_USER_AGENT'];


?>
</body>
</html>
