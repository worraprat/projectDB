<?php require'./connect.php';
    // $count;
    $limit="select customerNumber from users order by customerNumber desc limit 1";
    $result2=mysqli_query($connect,$limit);
    $row=mysqli_fetch_assoc($result2);
    $add=$row['customerNumber']+1;
    echo $add;
    // var_dump($limit);
    // var_dump($result2);
    // echo $result2;
     $username=$_POST['username'];
     $password=$_POST['password'];
     $decrypt=sha1($password);
     $name=$_POST['name'];
     $cfn=$_POST['cfn'];
     $cln=$_POST['cln'];
     $phone=$_POST['phone'];
     $addr1=$_POST['addr1'];
     $addr2=$_POST['addr2'];
     $city=$_POST['city'];
     $state=$_POST['state'];
     $postal=$_POST['postal'];
     $country=$_POST['country'];
     $credit=$_POST['climit'];
     
     if ($addr2=="") {
        $sql="insert into users(username,password,Name,contactFirstname,contactLastname,phone,addressLine1,addressLine2,city,state,postalcode,country,customerNumber,creditlimit,point)
        values('$username','$decrypt','$name','$cfn'
        ,'$cln','$phone','$addr1',NULL,'$city','$state','$postal','$country','$add','$credit','0')";
     }else{
        $sql="insert into users(username,password,Name,contactFirstname,contactLastname,phone,addressLine1,addressLine2,city,state,postalcode,country,customerNumber,creditlimit,point)
        values('$username','$decrypt','$name','$cfn'
        ,'$cln','$phone','$addr1','$addr2','$city','$state','$postal','$country','$add','$credit','0')";

     }
     
    

    var_dump($sql);echo"<br>";
    $result=mysqli_query($connect,$sql);
if ($result) {
    echo"สมัครสำเร็จ";
    echo "<br><a href='./register.php'>กลับสู่หน้าเดิม</a>";
}else{
    echo mysqli_error('$connect');
    echo "<br><a href='./register.php'>กลับสู่หน้าเดิม</a>";
}

?>