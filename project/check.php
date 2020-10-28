<?php require'./connect.php' ;
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Payment</h1>
    <form action="check.php" method="post">
    Cheque Number:<input type="text" name="checknumber"><br><br>
    <input type="submit" value="Submit">
    </form>
   
    
</body>
</html>

<?php 
$username=$_SESSION['username'];
echo $username."<br>";
echo "point =".$_SESSION['point']."<br>";
echo "total=".$_SESSION['newtotal']."<br>";
if ($_POST) {
    Date_default_timezone_set("Asia/Bangkok");
//echo "The time is " .date("Y-m-d")."<br>";
$paymentdate=date("Y-m-d ");

$sql2="select customerNumber from users where username='$username' ";
$result2=mysqli_query($connect,$sql2);
if (!$result2) {
    echo mysqli_error($result2);
}
$record=mysqli_fetch_array($result2,MYSQLI_BOTH);
var_dump($record[0]);
    $checknumber=$_POST['checknumber'];
    echo "total".$_SESSION['total']."<br>";
echo "point".$_SESSION['point'];
$total=$_SESSION['total'];
$point=$_SESSION['point'];
echo "total".$total."<br>";
echo "point".$point;
$newtotal=$_SESSION['newtotal'];
if ($_SESSION['newtotal']<$_SESSION['total']) {
    $check="insert into payments(customerNumber,checkNumber,paymentDate,amount)values('$record[0]','$checknumber','$paymentdate','$newtotal')";
}else{
    $check="insert into payments(customerNumber,checkNumber,paymentDate,amount)values('$record[0]','$checknumber','$paymentdate','$total')";
}
//$check="insert into payments(customerNumber,checkNumber,paymentDate,amount)values('$record[0]','$checknumber','$paymentdate','$total')";
$checkresult=mysqli_query($connect,$check);
//echo $sql;


$addpoint="update set users point='$point' ";
$addpointresult=mysqli_query($connect,$addpoint);
echo $addpoint;
    


// $delproductsql="select quantityInStock from products where "
// $delcodesql="select "
    
}








?>

