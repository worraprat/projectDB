<?php include '../connect.php'; 

$cmno=$_POST['customernumber'];
$cmn=$_POST['name'];
$ctln=$_POST['cfn'];
$ctfn=$_POST['cln'];
$phone=$_POST['phone'];
$add1=$_POST['addr1'];
$add2=$_POST['addr2'];
$city=$_POST['city'];
$state=$_POST['state'];
$postal=$_POST['postal'];
$country=$_POST['country'];
$sreno=$_POST['salerepno'];
$climit=$_POST['climit'];

$sql="insert into customers(customerNumber,customerName,contactLastname,
contactFirstname,phone,addressLine1,addressLine2,city,state,postalCode,country,salesRepEmployeeNumber,creditLimit) 
values('$cmno','$cmn','$ctln','$ctfn','$phone','$add1','$add2','$city','$state','$postal','$country','$sreno','$climit')";
$result=mysqli_query($connect,$sql);
var_dump($sql);
if ($result) {
    echo "เพิ่มสำเร็จ";
    echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
}else{
    echo "เพิ่มไม่สำเร็จกรุณาตรวจสอบข้อมูล";
    echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
}
