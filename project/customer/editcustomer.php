<?php require'../connect.php'; 

$id=$_POST['editbyid'];
$showsql="select * from customers where CustomerNumber='$id' ";
$result=mysqli_query($connect,$showsql);
if($result){
    while($record=mysqli_fetch_array($result,MYSQLI_BOTH)){
        echo "number: ".$record[0]."<br>";
        echo "name: ".$record[1]."<br>";
        echo "lastname: ".$record[2]."<br>";
        echo "firstname: ".$record[3]."<br>";
        echo "phone: ".$record[4]."<br>";
        echo "address1: ".$record[5]."<br>";
        echo "address2: ".$record[6]."<br>";
        echo "city: ".$record[7]."<br>";
        echo "state: ".$record[8]."<br>";
        echo "postal: ".$record[9]."<br>";
        echo "country: ".$record[10]."<br>";
        echo "salesrepnumber: ".$record[11]."<br>";
        echo "credit: ".$record[12]."<br>";
        echo "<hr>";
        echo '<h1>Edit profile</h1>
        <form action="editcustomer2.php" method="post">
                customernumber:<input type="text" name="number" value='.$record[0].'><br><br>
                customername:<input type="text" name="name" value='.$record[1].'><br><br>
                lastname:<input type="text" name="lname" value='.$record[2].'><br><br>
                firstname:<input type="text" name="fname" value='.$record[3].'><br><br>
                phone:<input type="text" name="phone" value='.$record[4].'><br><br>
                address1:<input type="text" name="address1" value='.$record[5].'><br><br>
                address2:<input type="text" name="address2" value='.$record[6].'><br><br>
                city:<input type="text" name="city" value='.$record[7].'><br><br>
                state:<input type="text" name="state" value='.$record[8].'><br><br>
                postal:<input type="text" name="postal" value='.$record[9].'><br><br> 
                country:<input type="text" name="country" value='.$record[10].'><br><br>
                salerepnumber:<input type="text" name="salerepno" value='.$record[11].'><br><br>
                credit:<input type="text" name="credit" value='.$record[12].'><br><br>
                <input type="hidden" name="hiddenid" value='.$id.'>
                <input type="submit" value="Edit"><br><br>
                </form>';   
    }
}else{
    echo mysqli_error('$connect');
    echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
}

// if ($_POST) {
//     $number=$_POST['number'];$name=$_POST['name'];$fname=$_POST['fname'];$lname=$_POST['lname'];
//     $phone=$_POST['phone'];$add1=$_POST['address1'];$add2=$_POST['address2'];
//     $city=$_POST['city'];$state=$_POST['state'];$country=$_POST['country'];
//     $credit=$_POST['credit'];$postal=$_POST['postal'];
//     var_dump($username);
//     $sql2="update customers set customerNumber='$number',customerName='$name',contactLastname='$lname',contactFirstname='$fname'
//    ,phone='$phone',addressLine1='$add1',addressLine2='$add2',city='$city',state='$state',
//    postalcode='$postal',country='$country',creditlimit='$credit' where username='$username' ";

//     $result2=mysqli_query($connect,$sql2);
//    var_dump($sql2);
//    if ($result2) {
//        echo "change success";
//        echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
//    }else{
//        echo mysqli_error($connect);
//        echo "<br><a href='../customer.php'>กลับสู่หน้าเดิม</a>";
//    }
// }




// if($result){

//     echo "promote complete";
//     echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";

// }else{
//     echo mysqli_error('$connect');
//     echo "<br><a href='../erm.php'>กลับสู่หน้าเดิม</a>";
// }
