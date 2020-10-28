<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert with TextBox</title>
</head>
<body>
    <form method="POST" action='insertProductFunc.php'>
        
        Enter Product Code: <input type = "text" name = 'productCode' required > <br><br>
        Enter Product Name: <input type = "text" name = 'productName' required > <br><br>
        Enter Product Line: <br>
            <input type="radio" id="Classic Cars" name="productLine" value="Classic Cars" required >
            <label for="Classic Cars">Classic Cars</label><br>
            <input type="radio" id="Motorcycles" name="productLine" value="Motorcycles">
            <label for="Motorcycles">Motorcycles</label><br>
            <input type="radio" id="Planes" name="productLine" value="Planes">
            <label for="Planes">Planes</label> <br>
            <input type="radio" id="Ships" name="productLine" value="Ships">
            <label for="Ships">Ships</label><br>
            <input type="radio" id="Trains" name="productLine" value="Trains">
            <label for="Trains">Trains</label><br>
            <input type="radio" id="Trucks and Buses" name="productLine" value="Trucks and Buses">
            <label for="Trucks and Buses">Trucks and Buses</label> <br>
            <input type="radio" id="Vintage Cars" name="productLine" value="Vintage Cars">
            <label for="Vintage Cars">Vintage Cars</label> <br><br>
        Enter Product Scale: <input type = "text" name = 'productScale' required > <br><br>
        Enter Product Vendor: <input type = "text" name = 'productVendor' required > <br><br>
        Enter Product Description: <input type = "text" name = 'productDescription' size="50" required > <br><br>
        Enter Quantity In Stock: <input type = "number" name = 'quantityInStock' min="0" required> <br><br>
        Enter Buy Price: <input type = "number" name = 'buyPrice' min="0" required > <br><br>
        Enter MSRP: <input type = "number" name = 'MSRP' min="0" required > <br><br><br>

        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>