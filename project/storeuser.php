<?php require'./connect.php';
     $username=$_POST['username'];
     $password=$_POST['password'];
     $decrypt=sha1($password);
     
    $sql="insert into user(username,password)values('$username','$decrypt') ";
    $result=mysqli_query($connect,$sql);
if ($result) {
    echo"สมัครสำเร็จ";
    echo "<br><a href='./addemploy.php'>กลับสู่หน้าเดิม</a>";
}else{
    echo mysqli_error('$connect');
    echo "<br><a href='./addemploy.php'>กลับสู่หน้าเดิม</a>";
}

?>