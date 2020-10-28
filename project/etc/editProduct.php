<?php 

$idSelect=$_GET['id'];

require'../connect.php'; 
$sql = "select * from products where productCode = '$idSelect' ";
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
    
        <form method="POST" action='editProductFunc.php'>

        <input type="hidden" value='<?php echo $row['productCode']?>' name='id_select' >

        Enter Product Code: 
            <input type = "text" name = 'productCode' value = '<?php echo $row['productCode'] ?>' required > <br><br>
        Enter Product Name: 
            <input type = "text" name = 'productName' value = '<?php echo  $row['productName'] ?>' required > <br><br>

        Enter Product Line: <br>
            <?php 
            if($row['productLine']=='Classic Cars'){
                echo    " <input type='radio' id='Classic Cars' name='productLine' value='Classic Cars' checked required /> 
                <label for='Classic Cars'>Classic Cars</label><br>";
            }else{
                echo    "<input type='radio' id='Classic Cars' name='productLine' value='Classic Cars' />
                        <label for='Classic Cars'>Classic Cars</label><br>";
            }

            if($row['productLine']=='Motorcycles'){
                echo    " <input type='radio' id='Motorcycles' name='productLine' value='Motorcycles' checked /> 
                <label for='Motorcycles'>Motorcycles</label><br>";
            }else{
                echo    "<input type='radio' id='Motorcycles' name='productLine' value='Motorcycles' />
                        <label for='Motorcycles'>Motorcycles</label><br>";
            }
            
            if($row['productLine']=='Planes'){
                echo    " <input type='radio' id='Planes' name='productLine' value='Planes' checked /> 
                <label for='Planes'>Planes</label><br>";
            }else{
                echo    "<input type='radio' id='Planes' name='productLine' value='Planes' />
                        <label for='Planes'>Planes</label><br>";
            }
            
            if($row['productLine']=='Ships'){
                echo    " <input type='radio' id='Ships' name='productLine' value='Ships' checked /> 
                <label for='Ships'>Ships</label><br>";
            }else{
                echo    "<input type='radio' id='Ships' name='productLine' value='Ships' />
                        <label for='Ships'>Ships</label><br>";
            }
            
            if($row['productLine']=='Trains'){
                echo    " <input type='radio' id='Trains' name='productLine' value='Trains' checked /> 
                <label for='Trains'>Trains</label><br>";
            }else{
                echo    "<input type='radio' id='Trains' name='productLine' value='Trains' />
                        <label for='Trains'>Trains</label><br>";
            }
            
            if($row['productLine']=='Trucks and Buses'){
                echo    " <input type='radio' id='Trucks and Buses' name='productLine' value='Trucks and Buses' checked /> 
                <label for='Trucks and Buses'>Trucks and Buses</label><br>";
            }else{
                echo    "<input type='radio' id='Trucks and Buses' name='productLine' value='Trucks and Buses' />
                        <label for='Trucks and Buses'>Trucks and Buses</label><br>";
            }
            
            if($row['productLine']=='Vintage Cars'){
                echo    " <input type='radio' id='Vintage Cars' name='productLine' value='Vintage Cars' checked /> 
                <label for='Vintage Cars'>Vintage Cars</label><br>";
            }else{
                echo    "<input type='radio' id='Vintage Cars' name='productLine' value='Vintage Cars' />
                        <label for='Vintage Cars'>Vintage Cars</label><br>";
            }
            ?>
            
            <br><br>
        Enter Product Scale: 
            <input type = "text" name = 'productScale' value = '<?php echo $row['productScale'] ?>' required > <br><br>
        Enter Product Vendor: 
            <input type = "text" name = 'productVendor' value = '<?php echo $row['productVendor'] ?>'required > <br><br>
        Enter Product Description: 
            <input type = "text" name = 'productDescription' size="50" value = '<?php echo $row['productDescription'] ?>' required > <br><br>
        Enter Quantity In Stock : 
            <input type = "number" name = 'quantityInStock' min="0" value = '<?php echo $row['quantityInStock'] ?>' required > <br><br>
        Enter Buy Price: 
            <input type = "number" name = 'buyPrice' min="0" value = '<?php echo $row['buyPrice'] ?>' required > <br><br>
        Enter MSRP: 
            <input type = "number" name = 'MSRP' min="0" value = '<?php echo $row['MSRP'] ?>' required > <br><br><br>

        <input type="submit" value="Edit">
    </form>

</body>
</html>