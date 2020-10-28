<?php 

$idSelect=$_GET['id'];

require '../connect.php'; 
$sql = "select * from orders where orderNumber = '$idSelect' ";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);

// echo $row['buyPrice']."<br>";
// $add=$row['buyPrice']+1;
// echo $add;

// print_r($row);
// echo "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
</head>
<body>
    
        <form method="POST" action='editOrderFunc.php'>

            <input type="hidden" value='<?php echo $row['orderNumber']?>' name='id_select' >
            Enter Order Number: <input type = "text" name = 'orderNumber' value = '<?php echo $row['orderNumber'] ?>' required> <br><br>
            Enter Order Date: <input type = "date" name = 'orderDate' value = '<?php echo $row['orderDate'] ?>' required > <br><br>
            Enter Required Date: <input type = "date" name = 'requiredDate' value = '<?php echo $row['requiredDate'] ?>' required > <br><br>
            Enter Shipped Date: <input type = "date" name = 'shippedDate' value = '<?php echo $row['shippedDate'] ?>' > <br><br>
            Enter Status: <br>
                <?php 
                if($row['status']=='in process'){
                    echo    " <input type='radio' id='in process' name='status' value='in process' checked required /> 
                    <label for='in process'>in process</label><br>";
                }else{
                    echo    "<input type='radio' id='in process' name='status' value='in process' />
                            <label for='in process'>in process</label><br>";
                }

                if($row['status']=='on hold'){
                    echo    " <input type='radio' id='on hold' name='status' value='on hold' checked /> 
                    <label for='on hold'>on hold</label><br>";
                }else{
                    echo    "<input type='radio' id='on hold' name='status' value='on hold' />
                            <label for='on hold'>on hold</label><br>";
                }
                
                if($row['status']=='resolved'){
                    echo    " <input type='radio' id='resolved' name='status' value='resolved' checked /> 
                    <label for='resolved'>resolved</label><br>";
                }else{
                    echo    "<input type='radio' id='resolved' name='status' value='resolved' />
                            <label for='resolved'>resolved</label><br>";
                }
                
                if($row['status']=='disputed'){
                    echo    " <input type='radio' id='disputed' name='status' value='disputed' checked /> 
                    <label for='disputed'>disputed</label><br>";
                }else{
                    echo    "<input type='radio' id='disputed' name='status' value='disputed' />
                            <label for='disputed'>disputed</label><br>";
                }
                
                if($row['status']=='cancelled'){
                    echo    " <input type='radio' id='cancelled' name='status' value='cancelled' checked /> 
                    <label for='cancelled'>cancelled</label><br>";
                }else{
                    echo    "<input type='radio' id='cancelled' name='status' value='cancelled' />
                            <label for='cancelled'>cancelled</label><br>";
                }
                
                if($row['status']=='shipped'){
                    echo    " <input type='radio' id='shipped' name='status' value='shipped' checked /> 
                    <label for='shipped'>shipped</label><br>";
                }else{
                    echo    "<input type='radio' id='shipped' name='status' value='shipped' />
                            <label for='shipped'>shipped</label><br>";
                }
                ?><br>
            Enter Comments: <input type = "text" name = 'comments' value = '<?php echo $row['comments'] ?>' > <br><br>
            Enter Customer Number: <input type = "text" name = 'customerNumber' value = '<?php echo $row['customerNumber'] ?>' required > <br><br>
        
        <input type="submit" value="Edit">
    </form>

</body>
</html>