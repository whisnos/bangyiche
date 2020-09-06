<?php
 include_once("FY_fun.php");
 $H=new FY_html();
 $H->ar('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">');
 $H->ar('<html xmlns="http://www.w3.org/1999/xhtml">');
 $H->ar('</head>');
 $H->ar("  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />");
 $H->ar("  <title>$FYS[1]</title>");
 $H->ar("  <link href='".F_HT."FY_img/css.css' rel='stylesheet' type='text/css' />");
 $H->ar("  <script type='text/javascript' src='".F_ML."FY_img/jquery.js'></script>");
 // $H->ar("  <script type='text/javascript' src='/FanYi/FY_editor/FY.js'></script>");
 $H->aj('  $(document).ready(function() {$.post("FY_KJ.php",function(data, status) {$("body").html(data)})})');
 $H->ar("</head>");
 $H->ar("<body>");
 $H->ar("  <noscript><h1 style='color:#fff;'>您的浏览器禁用了脚本，请启用脚本后再继续访问</h1></noscript>");
 $H->ar("</body>");
 $H->ar("</html>");
 echo $H->x();
?>