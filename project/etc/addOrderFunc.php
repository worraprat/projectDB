<?php

require'../connect.php';

$orderNumber=$_POST['orderNumber'];
$orderDate=$_POST['orderDate'];
$requiredDate=$_POST['requiredDate'];
$shippedDate=$_POST['shippedDate'];
$status=$_POST['status'];
$comments=$_POST['comments'];
$customerNumber=$_POST['customerNumber'];

echo "orderNumber == ".$orderNumber;

$sql="insert into orders(orderNumber,orderDate,requiredDate,shippedDate
    ,status,comments,customerNumber)
    values('$orderNumber','$orderDate','$requiredDate','$shippedDate'
    ,'$status','$comments','$customerNumber')";
$result=mysqli_query($connect,$sql);

if($result){
    echo "save<br>";
    echo"<a href='orderAdmin.php'>orderAdmin</a>";
}else{
    echo mysqli_error($connect);
}

?>