<?php require'./connect.php'; 
$sql="select * from employees";
$result=mysqli_query($connect,$sql);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erm</title>
</head>
<body>
<a href="indexemploy.php">Go back</a>
    <table border='1'>
        <tr>
        <th>Employeenumber</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Extension</th>
        <th>Email</th>
        <th>officecode</th>
        <th>reportto</th>
        <th>jobtitle</th>
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
        </tr>
        <?php } ?>
    </table>
            <h1>Add Employee</h1>
            <form action="erm/AddEmploy.php" method="post">
            Employee Number:<input type="text" name="addnumber"><br><br>
            Lastname:<input type="text" name="addlname"><br><br>
            Firstname:<input type="text" name="addfname"><br><br>
            Extension:<input type="text" name="addexten"><br><br>
            Email:<input type="text" name="addemail"><br><br>
            OfficeCode:<input type="text" name="addoffice"><br><br>
            Reports To:<input type="text" name="addreport"><br><br>
            JobTitle:<input type="text" name="addjob"><input type="submit" value="Add"><br><br>
            </form>

            <h1>Delete Employee</h1>
            <form action="erm/DeleteEmploy.php" method="post">
            ID:<input type="text" name="deletebyid"><input type="submit" value="Delete"><br><br>
            </form>

            <h1>Promote to Sale Manager(APAC,EMEA,NA)</h1>
            <form action="erm/promoteEmploy.php" method="post">
            ID:<input type="text" name="editbyid"><br><br>
            Continent:<input type="radio" name="contn" value='APAC'>APAC
                      <input type="radio" name="contn" value='EMEA'>EMEA
                      <input type="radio" name="contn" value='NA'>NA
                <input type="submit" value="Promoted">
            </form>

            <h1>Demote to Sales Represent</h1>
            <form action="erm/demoteEmploy.php" method="post">
            ID:<input type="text" name="demotebyid"><br><br>
            Report To:<input type="text" name="setreport"><input type="submit" value="Demoted"><br><br>
            
            </form>

             <!-- <h1>Edit employee</h1>

        <form action="EditEmploy.php" method="post">
        EmployeeNumber: <input type="text" name="en"><br><br>
        Lastname:<input type="text" name="ln"><br><br>
        Firstname:<input type="text" name="fn"><br><br>
        Extension:<input type="text" name="etn"><br><br>
        Email:<input type="text" name="eml"><br><br>
        officecode:<input type="text" name="ofc"><br><br>
        reportto:<input type="text" name="rpt"><br><br>
        jobtitle:<input type="text" name="jt"><input type="submit" value="Edit"><br><br>
        
        </form>  -->
</body>
</html>