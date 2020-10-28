<?php require'./connect.php'; 
session_start();
ob_start();
$username=$_SESSION['username'];
var_dump($username);
$sql="select * from users where username='$username'";
$result=mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Your Profile:<?php echo $username?></h1>
    <?php 
     if($result){
        while($record=mysqli_fetch_array($result,MYSQLI_BOTH)){
            echo "Name: ".$record[2]."<br>";
            echo "firstname: ".$record[3]."<br>";
            echo "lastname: ".$record[4]."<br>";
            echo "phone: ".$record[5]."<br>";
            echo "address1: ".$record[6]."<br>";
            echo "address2: ".$record[7]."<br>";
            echo "city: ".$record[8]."<br>";
            echo "state: ".$record[9]."<br>";
            echo "postal: ".$record[10]."<br>";
            echo "country: ".$record[11]."<br>";
            echo "credit: ".$record[13]."<br>";
            echo "point: ".$record[14]."<br>";
            echo "<hr>";
            echo '<h1>Edit profile</h1>
            <form action="profile.php" method="post">
                    Name:<input type="text" name="name" value='.$record[2].'><br><br>
                    Firstname:<input type="text" name="fname" value='.$record[3].'><br><br>
                    Lastname:<input type="text" name="lname" value='.$record[4].'><br><br>
                    phone:<input type="text" name="phone" value='.$record[5].'><br><br>
                    address1:<input type="text" name="address1" value='.$record[6].'><br><br>
                    address2:<input type="text" name="address2" value='.$record[7].'><br><br>
                    city:<input type="text" name="city" value='.$record[8].'><br><br>
                    state:<input type="text" name="state" value='.$record[9].'><br><br>
                    postal:<input type="text" name="postal" value='.$record[10].'><br><br> 
                    country:<input type="text" name="country" value='.$record[11].'><br><br>
                    credit:<input type="text" name="credit" value='.$record[13].'><br><br>
                    <input type="submit" value="Edit"><br><br>
                    </form>';   
        }

    }else{
        echo mysqli_error($connect);
    }

    
    ?>

    <?php 
     if ($_POST) {
         $name=$_POST['name'];$fname=$_POST['fname'];$lname=$_POST['lname'];
         $phone=$_POST['phone'];$add1=$_POST['address1'];$add2=$_POST['address2'];
         $city=$_POST['city'];$state=$_POST['postal'];$country=$_POST['country'];
         $credit=$_POST['credit'];$postal=$_POST['postal'];
         var_dump($username);
         $sql2="update users set Name='$name',contactFirstname='$fname',contactLastname='$lname'
        ,phone='$phone',addressLine1='$add1',addressLine2='$add2',city='$city',state='$state',
        postalcode='$postal',country='$country',creditlimit='$credit' where username='$username' ";

         $result2=mysqli_query($connect,$sql2);
        var_dump($sql2);
        if ($result2) {
            echo "change success";
        }else{
            echo mysqli_error($connect);
        }
     }
    
    ?>

    <!-- <h1>Edit profile</h1>
    <form action="erm/AddEmploy.php" method="post">
            Name:<input type="text" name="name" value="<?php $name ?>"><br><br>
            Firstname:<input type="text" name="fname"><br><br>
            Lastname:<input type="text" name="lname"><br><br>
            phone:<input type="text" name="phone"><br><br>
            address1:<input type="text" name="address1"><br><br>
            address2:<input type="text" name="address2"><br><br>
            city:<input type="text" name="city"><br><br>
            state:<input type="text" name="state"><br><br>
            postal:<input type="text" name="postal"><br><br> 
            country:<input type="text" name="country"><br><br>
            credit:<input type="text" name="addjob"><br><br>
            <input type="submit" value="Add"><br><br>
            </form> -->



   <br> <a href="./index.php">index</a>
</body>
</html>

