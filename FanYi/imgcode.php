<?php  
session_start();  
require_once('CreateImg.class.php');  
$image = new ValidationCode('80','20','4');    //图片长度、宽度、字符个数  
$image->outImg();  
$_SESSION['validationcode'] = $image->checkcode; //存贮验证码到 $_SESSION 中  