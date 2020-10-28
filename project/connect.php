<?php 
    
    $connect=mysqli_connect('localhost','root','','classicmodel');
    //echo "connected";
   if(!$connect){
       die("fail to connect");
   }
    
?>