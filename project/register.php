<?php require'./connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="storeusers.php" method="post">
    Enter username:<input type="text" name="username" placeholder='Enter username'><br><br>
    Enter password:<input type="password" name="password" placeholder='Enter password'><br><br>
     Name:<input type="text" name="name" placeholder='Enter Name'><br><br>
     Contactfirstname:<input type="text" name="cfn" placeholder=''><br><br>
     Contactlastname:<input type="text" name="cln" placeholder=''><br><br>
     Phone number:<input type="text" name="phone" placeholder=''><br><br>
     Address 1:<input type="text" name="addr1" ><br><br>
     Address 2(optional):<input type="text" name="addr2" ><br><br>
     City:<input type="text" name="city" ><br><br>
     State:<input type="text" name="state" ><br><br>
     Postalcode:<input type="text" name="postal" ><br><br>
     Country:<input type="text" name="country" ><br><br>
     CreditLimit:<input type="text" name="climit" ><br><br>
    <input type="submit" value="Sign up">
    </form><br><br><br>

    <a href="./login.php">Login</a>
</body>
</html>

