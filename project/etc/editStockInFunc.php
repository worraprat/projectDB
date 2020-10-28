<?php 

require'../connect.php';

$orderCode=$_POST['orderCode'];
$productCode=$_POST['productCode'];
$amount=$_POST['amount'];
$date=$_POST['date'];
$id_select=$_POST['id_select'];


echo "orderCode == ".$orderCode."<br>";

$sql="update stockin set orderCode = '$orderCode',productCode = '$productCode'
    ,amount = '$amount',date = '$date' where orderCode = '$id_select'"; 
   
$result=mysqli_query($connect,$sql);

if($result){
    echo "editted<br>";
    echo"<a href='stockIn.php'>Stock In</a>";
}else{
    echo mysqli_error($connect);
}

?>