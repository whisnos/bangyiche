<?php

///创建文件夹 
function createdir($dir)
{
   if(file_exists($dir) && is_dir($dir)){
   }
   else{
    mkdir ($dir,0777);
   }
}
///创建文件
function creat_file($PATH){
   $sFile = "test.html";
   if (file_exists($PATH.$sFile)) {
    creat_file();
   } else {
    $fp= fopen($PATH.$sFile,"w");
    fclose($fp);
   } 
   return $sFile;
}



?>