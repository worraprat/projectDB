<?php require'./connect.php';
session_start();
ob_start();

unset($_SESSION['shopping_cart']);
unset($_SESSION['username']);
if($_POST){
    $username=$_POST['username'];
    $_SESSION['username']=$username;
    $password=$_POST['password'];
    $encrypt=sha1($password);
    $sql="select * from user where username='$username' and password='$encrypt' ";
    $sql2="select * from users where username='$username' and password='$encrypt' ";
    $result=mysqli_query($connect,$sql);
    $result2=mysqli_query($connect,$sql2);
    $equal1=mysqli_num_rows($result);
    $equal2=mysqli_num_rows($result2);
    // var_dump($sql);
    // var_dump($sql2);
    // var_dump($equal1);
    // var_dump($equal2);   
    
    if ($equal1!==1 && $equal2==1) {
        header("location:index.php");
    }elseif ($equal1==1 && $equal2!==1) {
        header("location:indexemploy.php");
    }else{
        echo"wrong username/password";
        echo "<br><a href='./login.php'>กลับสู่หน้าเดิม</a>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body> 
    <h1>Login</h1>
    <form action="login.php" method="post">
    username:<input type="text" name="username"><br><br>
    password:<input type="password" name="password"><br><br>
    <input type="submit" value="Sign in">
    </form><br><br><br>
    
    <a href="./register.php">Register</a>
    
</body>
</html>

