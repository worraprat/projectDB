<?php require'../connect.php'; 

$id=$_POST['editbyid'];
$contn=$_POST['contn'];

$sql="update employees set jobTitle='Sale Manager($contn)',reportsTo='1056' 
where employeeNumber='$id' ";
//var_dump($sql);
 $result=mysqli_query($connect,$sql);
if($result){

    echo "promote complete";
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";

}else{
    echo mysqli_error('$connect');
    echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";
}
