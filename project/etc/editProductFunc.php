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
$id_select=$_POST['id_select'];

echo "productCode == ".$productCode;

$sql="update products set productCode ='$productCode',productName='$productName',productLine='$productLine'
    ,productScale='$productScale',productVendor='$productVendor',productDescription='$productDescription'
    ,quantityInStock='$quantityInStock',buyPrice='$buyPrice',MSRP='$MSRP' where productCode='$id_select'" ;
    
$result=mysqli_query($connect,$sql);

if($result){
    echo "editted" ; 
    echo "<br> <a href='productAdmin.php'>productAdmin</a>"; 
}else{
    echo "error".mysqli_error($connect);
}