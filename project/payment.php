<?php 
require'./connect.php';
session_start();
ob_start();


// var_dump ($_SESSION['shopping_cart']);echo"<br>";
echo '<h1>ยืนยันออเดอร์</h1>';
$total=number_format(0);
//var_dump($_SESSION['shopping_cart']);
// โชว์ที่เลือกจากหน้าที่แล้ว
foreach ($_SESSION['shopping_cart'] as $key => $value) {
    echo "Product Code:".$value['item_id'].'<br>';
    echo "Product Name:".$value['item_name'].'<br>';
    echo "quantity:".$value['item_quantity'].'<br>';
    $productcode=$value['item_id'];
    $preordersql="select quantityInStock from products where productCode='$productcode' ";
    $preorder=mysqli_query($connect,$preordersql);
    $po=mysqli_fetch_array($preorder);
    if (number_format($po[0] == 0)) {
        $value['item_price']=$value['item_price']/2;
        echo "<h4>Pre order products</h4><br>";
        echo "Priceeach upfront:".number_format(($value['item_price']),2).'<br>';
    }else{
        echo "Priceeach:".number_format($value['item_price'],2).'<br>';
    }
    
    echo "Price*quantity:".number_format($value['item_price']*$value['item_quantity'],2).'<br>';
    $total=$total+($value['item_price']*$value['item_quantity']);
    echo '<hr>';

}




//โชว์ total 
echo "total : ".$total;
$point=floor($total/100)*3; 
echo "       point: ".$point;
echo "<hr>";

$cusid=$_SESSION['username'];
$sql2="select customerNumber from users where username='$cusid' ";
$result2=mysqli_query($connect,$sql2);
// var_dump($cusid);
// var_dump($sql2);
$record=mysqli_fetch_array($result2,MYSQLI_BOTH);
//var_dump($record[0]);
$sql="select * from users where customerNumber='$record[0]'";
$result=mysqli_query($connect,$sql);
 



//โชว์ข้อมูลprofile
if($result){
    while($record=mysqli_fetch_array($result,MYSQLI_BOTH)){
        echo "Name: ".$record[2]."<br>";
        echo "firstname: ".$record[3]."<br>";
        echo "lastname: ".$record[4]."<br>";
        echo "phone: ".$record[5]."<br>";
        echo "address1: ".$record[6]."<br>";
        echo "address2: ".$record[7]."<br>";
        echo "city: ".$record[8]."<br>";
        echo "state: ".$record[9]."<br>";
        echo "postal: ".$record[10]."<br>";
        echo "country: ".$record[11]."<br>";
        echo "credit: ".$record[13]."<br>";
        echo "<hr>";
    }

}else{
    echo mysqli_error($connect);
}


//html ฟอร์มใส่รหัสลดราคา
echo '
<form action="payment.php" method="post">
Discount code:  <input type="text" name="dcode" >
<input type="submit" value="submit">
</form>';


echo '
<form action="payment.php" method="post">
<input type="submit" name="confirm" value="confirm" >
</form>';




//เมื่อใส่โค้ดลดราคา
if($_POST){
    $discountcode=$_POST['dcode'];
    $sql3="select * from discountcode where code='$discountcode' ";
    $result3=mysqli_query($connect,$sql3);
    $equal=mysqli_num_rows($result3);
    if ($equal==1) {
        $record=mysqli_fetch_array($result3,MYSQLI_BOTH);
        global $total;
        $total=$total-$record['amount'];
        $newtotal=$total;
        $_SESSION['newtotal']=$newtotal;
        echo"new total:".$total."<br>";
        echo "Using code success";

        
        $deldiscodesql="update discountcode set quantity=quantity-1 where code='$discountcode'";
        $deldiscode=mysqli_query($connect,$deldiscodesql);
        

    }else{
        echo mysqli_error($connect);
    }
     $point=floor($total/100)*3; 
    echo " point: ".$point;
    $_SESSION['point']=$point;
    $_SESSION['total']=$total;

}
date_default_timezone_set("Asia/Bangkok");
//echo "The time is " .date("Y-m-d")."<br>";
$orderdate=date("Y-m-d ");

$date1 = str_replace('-', '/', $orderdate);
$requireddate = date('Y-m-d',strtotime($date1 . "+7 days"));
$limit="select orderNumber from orders order by orderNumber desc limit 1";
$result4=mysqli_query($connect,$limit);
    $row4=mysqli_fetch_assoc($result4);
    $add=$row4['orderNumber']+1;
    //echo $add;

    $cusid=$_SESSION['username'];
    $sql2="select customerNumber from users where username='$cusid' ";
    $result2=mysqli_query($connect,$sql2);
    // var_dump($cusid);
    // var_dump($sql2);
    $record=mysqli_fetch_array($result2,MYSQLI_BOTH);
    //var_dump($record[0]);
    //$sql="select * from users where customerNumber='$record[0]'";

    
    $confirm=$_POST['confirm'];
    if ($confirm) {
        $inputorder="insert into orders(orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNumber)
        values('$add','$orderdate','$requireddate',NULL,'in progress',NULL,'$record[0]') ";
         $result5=mysqli_query($connect,$inputorder);
        var_dump($inputorder);
        if(!$result5){ echo "result5แตก";}
        echo "add:".$add;
        //echo mysqli_error($connect);


//  $inputorderdetail="insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)values(
//  '$cu','$value['item_id']','7')";
        
    foreach ($_SESSION['shopping_cart'] as $key => $value) {
        $a=$value['item_id'];
        $b=$value['item_price'];
        $c=$value['item_quantity'];
        // echo "Product Code:".$a.'<br>';
        // echo "Price Each:".$b.'<br>';
        $inputorderdetail="insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)values(
        '$add','$a','$c','$b','1')"; echo"<br>";
        $delproductquansql="update products set quantityInStock=quantityInStock-$c where productCode='$a' ";
        $setquanzerosql="update products set quantityInStock=0 where quantityInstock<=0";
        //echo $delproductquan."<br>";
        $puttoorderD=mysqli_query($connect,$inputorderdetail);
        $delproductquansql=mysqli_query($connect,$delproductquansql);
        $setquanzero=mysqli_query($connect,$setquanzerosql);
        echo "sql: ".$inputorderdetail."<br>";
        // echo "delquan: ".$delproductquansql."<br>";
        }if (!$puttoorderD) {
        echo mysqli_error($connect);
    }
    $getpointsql="select point from users where username='$cusid' ";
    $result6=mysqli_query($connect,$getpointsql);
    $pointo=mysqli_fetch_assoc($result6);
    echo "pointo=".$pointo['point'];
    echo "point".$point;
      
    $pointtotal=(int)$point+(int)$pointo['point'];
    
    echo "point".$pointtotal;
    

    $updatepointsql="update users set point='$pointtotal' where customerNumber='$record[0]' ";
    $updatepoint=mysqli_query($connect,$updatepointsql);
    
    }

// $inputorder="insert into orders(orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNumber)values('$add','$orderdate',
// '$requireddate',NULL,'in progress',NULL,'$record[0]') ";
// $result5=mysqli_query($connect,$inputorder);
// var_dump($inputorder);
// if(!$result5) echo "result5แตก";
// echo "add:".$add;
// echo mysqli_error($connect);


// //  $inputorderdetail="insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)values(
// //  '$cu','$value['item_id']','7')";
        
//     foreach ($_SESSION['shopping_cart'] as $key => $value) {
//         $a=$value['item_id'];
//         $b=$value['item_price'];
//         $c=$value['item_quantity'];
//         // echo "Product Code:".$a.'<br>';
//         // echo "Price Each:".$b.'<br>';
//         $inputorderdetail="insert into orderdetails(orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber)values(
//         '$add','$a','$c','$b','1')"; echo"<br>";
//          $puttoorderD=mysqli_query($connect,$inputorderdetail);
//         echo "sql: ".$inputorderdetail;
//     }if (!$puttoorderD) {
//         echo mysqli_error($connect);
//     }

   
//    $_SESSION['point']=$point;
//    $_SESSION['total']=$total;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- <form action="payment.php" method="post">
<input type="submit" name="confirm" value="confirm" >
</form> -->


<form action="check.php" method="post">
    <?php  echo $_SESSION['point']."<br>"; 
           echo $_SESSION['total'];?>
    <!-- <input type="hidden" name='total' values='<?php $total ?>'>
    <input type="hidden" name='point' values='<?php $point ?>'> -->
    <input type="submit" value="Payment method">
    </form>

</body>
</html>
    