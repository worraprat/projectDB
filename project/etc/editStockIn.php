<?php 

$idSelect=$_GET['id'];

require '../connect.php'; 
$sql = "select * from stockin where orderCode = '$idSelect' ";
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
    
        <form method="POST" action='editStockInFunc.php'>

            <input type="hidden" value='<?php echo $row['orderCode']?>' name='id_select' >
            Enter Order Code: <input type = "text" name = 'orderCode' value = '<?php echo $row['orderCode'] ?>' required> <br><br>
            Enter Product Code: <input type = "text" name = 'productCode' value = '<?php echo $row['productCode'] ?>' required > <br><br>
            Enter Amount: <input type = "number" name = 'amount' value = '<?php echo $row['amount'] ?>' min=0 required > <br><br>
            Enter Date: <input type = "date" name = 'date' value = '<?php echo $row['date'] ?>' required > <br><br>
           
        <input type="submit" value="Edit">
    </form>

</body>
</html>