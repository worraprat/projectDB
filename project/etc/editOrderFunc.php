<?php

require'../connect.php';

$orderNumber=$_POST['orderNumber'];
$orderDate=$_POST['orderDate'];
$requiredDate=$_POST['requiredDate'];
$shippedDate=$_POST['shippedDate'];
$status=$_POST['status'];
$comments=$_POST['comments'];
$customerNumber=$_POST['customerNumber'];
$id_select=$_POST['id_select'];

echo "orderNumber == ".$orderNumber;

$sql="update orders set orderNumber = '$orderNumber',orderDate = '$orderDate',requiredDate = '$requiredDate',shippedDate = '$shippedDate'
    ,status = '$status',comments = '$comments',customerNumber = '$customerNumber' where orderNumber = '$id_select'"; 
   
$result=mysqli_query($connect,$sql);

if($result){
    echo "editted<br>";
    echo"<a href='orderAdmin.php'>Order Admin</a>";
}else{
    echo mysqli_error($connect);
}

?>