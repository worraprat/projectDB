<?php include '../connect.php'; 

$employno=$_POST['addnumber'];
$ln=$_POST['addlname'];
$fn=$_POST['addfname'];
$ex=$_POST['addexten'];
$em=$_POST['addemail'];
$ao=$_POST['addoffice'];
$ap=$_POST['addreport'];
$aj=$_POST['addjob'];

$sql="insert into employees(employeeNumber,lastName,firstName,
extension,email,officeCode,reportsTo,jobTitle) 
values('$employno','$ln','$fn','$ex','$em','$ao','$ap','$aj')";
$result=mysqli_query($connect,$sql);

if ($result) {
    echo "เพิ่มสำเร็จ";
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";
}else{
    echo mysqli_error('$connect');
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";
}
