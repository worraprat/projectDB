<?php require'../connect.php'; 

$id=$_POST['deletebyid'];

$sql="delete from employees where employeeNumber='$id' ";
$result=mysqli_query($connect,$sql);
var_dump($sql);
if($result){
    echo "ลบสำเร็จ";
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";
}else{
    echo mysqli_error('$connect');
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";
    
}

?>