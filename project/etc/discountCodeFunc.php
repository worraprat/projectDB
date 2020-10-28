<?php

require'../connect.php';

$code=$_POST['code'];
$amount=$_POST['amount'];
$exDate=$_POST['exDate'];
$quantity=$_POST['quantity'];


$sql="insert into discountcode(code,amount,exDate,quantity) 
    values('$code','$amount','$exDate','$quantity')";

$result=mysqli_query($con,$sql);

if($result){
    echo "save<br>";
    echo"<a href='discountCode.php'>Discount Code</a>";
}else{
    echo mysqli_error($connect);
}

?>