<?php require'./connect.php';
    
       
        $username=$_POST['username'];
        $username2=$username;
        $password=$_POST['password'];
        $encrypt=sha1($password);
        $sql="select * from users where username='$username' and password='$encrypt' ";
        $result=mysqli_query($connect,$sql);
        $equal=mysqli_num_rows($result);
        var_dump($username);   
        if ($equal==1) {
            header("location:index.php");
        }else{
            echo"wrong username/password";
            echo "<br><a href='./login.php'>กลับสู่หน้าเดิม</a>";
        }
    
    
    ?>