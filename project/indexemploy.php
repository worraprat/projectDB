<?php require'./connect.php'; 
session_start();
ob_start();
$employeenumber=$_SESSION['username'];
$sql="select jobTitle from employees where employeeNumber='$employeenumber' ";
$result=mysqli_query($connect,$sql);
$record=mysqli_fetch_array($result,MYSQLI_BOTH);
echo"emno=".var_dump($employeenumber)."<br>";
echo"sql=".var_dump($sql)."<br>";
echo"record[0]=".var_dump($record[0])."<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee index</title>
</head>
<body>
    <h1>Employee</h1>
    <?php  
    echo "welcome ".$_SESSION['username']."<br>";

    if($record[0]=='President'){
        echo "Welcome President<br>";
        echo '<a href="./etc/orderAdmin.php">Order_admin</a><br>';
    }elseif ($record[0]=='VP Sales') {
        echo 'Welcome VP Sale<br>';
        echo '<a href="./etc/orderAdmin.php">Order_admin</a><br>';
        echo '<a href="./etc/productAdmin.php">product_admin</a><br>';
        echo '<a href="erm.php">erm_admin</a><br>';
        echo '<a href="./etc/stockIn.php">stock in</a><br>';

    }elseif ($record[0]=='VP Marketing') {
        echo 'Welcome VP Market<br>';
        echo '<a href="./etc/orderAdmin.php">Order_admin</a><br>';
        echo '<a href="discount.php">discountCode</a><br>';
    }else{
        echo 'Welcome'.$record[0]."<br>";
        echo '<a href="./etc/orderAdmin.php">order_admin</a><br>';
        echo '<a href="./etc/productAdmin.php">product_admin</a><br>';
        echo '<a href="./etc/stockIn.php">stock in</a><br>';
    
    }

   
    ?>
         <a href="login.php">log out</a>
</body>
</html>