<?php require'../connect.php'; 

$id=$_POST['demotebyid'];
$report=$_POST['setreport'];
$sql="update employees set jobTitle='Sales Rep',reportsTo='$report' where employeeNumber='$id' ";

 $result=mysqli_query($connect,$sql);
if($result){

    echo "demote complete";
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";

}else{
    echo mysqli_error('$connect');
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";
}
