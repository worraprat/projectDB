<?php 

require'../connect.php';

$idSelect=$_GET['id'];

// echo "$idSelect";

$sql = "delete from stockin where orderCode = '$idSelect'";
$result = mysqli_query($connect,$sql);

// echo $sql;

if($result){
    echo"del<br>";
    echo"<a href='stockIn.php'>Stock In</a>";
}else{
    echo"error".mysqli_error($connect);
}