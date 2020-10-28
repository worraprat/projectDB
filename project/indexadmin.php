<?php require'./connect.php'; 
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexadmin</title>
</head>
<body>
    <h1>first page</h1>
    <?php  $random=rand(100,200); 
    echo $random;//var_dump($username);
    echo "welcome ".$_SESSION['username'];
    //unset($_SESSION['username']);
    ?>
    <a href="profile.php">profile</a>
</body>
</html>