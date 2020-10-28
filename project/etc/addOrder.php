<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Admin</title>
</head>
<body>

    <form method="POST" action='addOrderFunc.php'>
        
        Enter Order Number: <input type = "text" name = 'orderNumber' required> <br><br>
        Enter Order Date: <input type = "date" name = 'orderDate' required> <br><br>
        Enter Required Date: <input type = "date" name = 'requiredDate' required> <br><br>
        Enter Shipped Date: <input type = "date" name = 'shippedDate'> <br><br>
        Enter Status: <input type = "text" name = 'status' default="In process"> <br><br>
        Enter Comments: <input type = "text" name = 'comments' > <br><br>
        Enter Customer Number: <input type = "text" name = 'customerNumber' required > <br><br>

        <input type="submit" value="SUBMIT">

    </form>
    
</body>
</html>