<?php require'./connect.php'; 
$sql="select * from users";
$sql2="select * from customers";
$result=mysqli_query($connect,$sql);
$result2=mysqli_query($connect,$sql2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
</head>
<body>

<h1>customer in system</h1>
    <table border='1'>
        <tr>
        <th>Customer number</th>
        <th>customer name</th>
        <th>contact Lastname</th>
        <th>contact Firstname</th>
        <th>phone</th>
        <th>addressLine1</th>
        <th>addressLine2</th>
        <th>city</th>
        <th>state</th>
        <th>postalCode</th>
        <th>country</th>
        <th>salesRepemployeenumber</th>
        <th>creditLimit</th>
        
        </tr>
        <?php while($row=mysqli_fetch_row($result2)){ ?>
        <tr>
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
        <td><?php echo $row[6] ?></td>
        <td><?php echo $row[7] ?></td>
        <td><?php echo $row[8] ?></td>
        <td><?php echo $row[9] ?></td>
        <td><?php echo $row[10] ?></td>
        <td><?php echo $row[11] ?></td>
        <td><?php echo $row[12] ?></td>
        </tr>
        <?php } ?>
    </table>

<h1>user in system</h1>
    <table border='1'>
        <tr>
        <th>username</th>
        <th>pass</th>
        <th>name</th>
        <th>contactfirstname</th>
        <th>contactlname</th>
        <th>phone</th>
        <th>addr1</th>
        <th>addr2</th>
        <th>city</th>
        <th>state</th>
        <th>postal</th>
        <th>country</th>
        <th>customernumber</th>
        <th>creditlimit</th>
        
        </tr>
        <?php while($row=mysqli_fetch_row($result)){ ?>
        <tr>
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
        <td><?php echo $row[6] ?></td>
        <td><?php echo $row[7] ?></td>
        <td><?php echo $row[8] ?></td>
        <td><?php echo $row[9] ?></td>
        <td><?php echo $row[10] ?></td>
        <td><?php echo $row[11] ?></td>
        <td><?php echo $row[12] ?></td>
        <td><?php echo $row[13] ?></td>
        </tr>
        <?php } ?>
    </table>


    
            <h1>Add user to customer</h1>
            <form action="customer/Addcustomer.php" method="post">
            Customer Number:<input type="text" name="customernumber"><br><br>
            Name:<input type="text" name="name"><br><br>
            Contactfirstname:<input type="text" name="cfn" placeholder=''><br><br>
            Contactlastname:<input type="text" name="cln" placeholder=''><br><br>
            Phone number:<input type="text" name="phone" placeholder=''><br><br>
            Address 1:<input type="text" name="addr1" ><br><br>
            Address 2(optional):<input type="text" name="addr2" ><br><br>
            City:<input type="text" name="city" ><br><br>
            State:<input type="text" name="state" ><br><br>
            Postalcode:<input type="text" name="postal" ><br><br>
            Country:<input type="text" name="country" ><br><br>
            SaleRepEmployeeNumber:<input type="text" name="salerepno" ><br><br>
            CreditLimit:<input type="text" name="climit" ><br><br>
            <input type="submit" value="add">
            </form>

            <h1>Delete customer</h1>
            <form action="customer/deletecustomer.php" method="post">
            Customer number:<input type="text" name="deletebyid"><input type="submit" value="Delete"><br><br>
            </form>

            <h1>Edit customer</h1>
            <form action="customer/editcustomer.php" method="post">
            Customer number:<input type="text" name="editbyid"><input type="submit" value="Edit">
            </form>


        
</body>
</html>