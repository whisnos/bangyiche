<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
require_once("FY_YZ_C.php");
$rsi = "";
$code = "";
$rsi = new Utils_Caption();
$rsi->TFontSize=array(15,17);
$rsi->Width=50;
$rsi->Height=25;
$code = $rsi->RandRSI();
session_start();
$_SESSION["CHECKCODE"] = $code;
$rsi->Draw();
exit;
?>