<?php

date_default_timezone_set("Asia/Bangkok");
require'../connect.php';

$orderCode=$_POST['orderCode'];
$productCode=$_POST['productCode'];
$amount=$_POST['amount'];
$date=$_POST['date'];




$sql="insert into stockin(orderCode,productCode,amount,date) 
    values('$orderCode','$productCode','$amount','$date')";

$result=mysqli_query($connect,$sql);

if($result){
    echo "saved<br>";
    echo"<a href='stockIn.php'>Stock In</a>";
}else{
    echo mysqli_error($connect);
}

?>