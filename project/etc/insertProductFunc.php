<?php

require'../connect.php';

$productCode=$_POST['productCode'];
$productName=$_POST['productName'];
$productLine=$_POST['productLine'];
$productScale=$_POST['productScale'];
$productVendor=$_POST['productVendor'];
$productDescription=$_POST['productDescription'];
$quantityInStock=$_POST['quantityInStock'];
$buyPrice=$_POST['buyPrice'];
$MSRP=$_POST['MSRP'];

echo "productCode == ".$productCode;

$sql="insert into products(productCode,productName,productLine,productScale
    ,productVendor,productDescription,quantityInStock,buyPrice,MSRP) 
    values('$productCode','$productName','$productLine','$productScale'
    ,'$productVendor','$productDescription','$quantityInStock','$buyPrice','$MSRP')";
$result=mysqli_query($connect,$sql);

if($result){
    echo "save<br>";
    echo"<a href='productAdmin.php'>productAdmin</a>";
}else{
    echo mysqli_error($connect);
}

?>