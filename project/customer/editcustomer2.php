<?php 
 require'../connect.php';
//if ($_POST) {
    $number=$_POST['number'];$name=$_POST['name'];$fname=$_POST['fname'];$lname=$_POST['lname'];
    $phone=$_POST['phone'];$add1=$_POST['address1'];$add2=$_POST['address2'];
    $city=$_POST['city'];$state=$_POST['state'];$country=$_POST['country'];
    $credit=$_POST['credit'];$postal=$_POST['postal'];$id=$_POST['hiddenid'];$salerep=$_POST['salerepno'];
    if ($add2=="") {$add2='NULL';} if ($state=="") {$state='NULL';} if ($postal=="") {$postal='NULL';} 
    if ($salerep=="") {$add2='NULL';} if ($credit=="") {$add2='NULL';}

    $sql2="update customers set customerNumber='$number',customerName='$name',contactLastname='$lname',contactFirstname='$fname'
   ,phone='$phone',addressLine1='$add1',addressLine2='$add2',city='$city',state='$state',
   postalcode='$postal',country='$country',salesRepEmployeeNumber='$salerep',creditlimit='$credit' where customerNumber='$id' ";

    $result2=mysqli_query($connect,$sql2);
   var_dump($sql2);
   if ($result2) {
       echo "change success";
       echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
   }else{
       echo mysqli_error($connect);
       echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
   }
//}




?>