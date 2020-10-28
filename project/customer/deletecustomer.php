<?php require'../connect.php'; 

$id=$_POST['deletebyid'];

$sql="delete from customers WHERE customerNumber=$id";
$result=mysqli_query($connect,$sql);
var_dump($sql);
if($result){
    echo "ลบสำเร็จ";
    echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
}else{
    echo mysqli_error('$connect');
    echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
    
}

?>