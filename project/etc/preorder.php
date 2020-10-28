<?php
include '../connect.php'; 

$sql = "select * from products where quantityInstock = '0' ";
$result = mysqli_query($connect,$sql);
$sql2 = "select * from customers";
$result2 = mysqli_query($connect,$sql2);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Pre order</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
      .column {
        float: left;
        width: 50%;
        padding: 10px;
        height: 300px;
      }

      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      } 
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      <nav class="navbar navbar-default" role ="navigation">
        <ul class="nav navbar-nav">
          <li>
            <a href="../indexemploy.php">Back</a>
          </li>
        </ul>
      </nav>
    </div>



    <div class = "jumbotron">
        <h3>Preorder products</h3>
    </div>
    
    <?php 
        while($row=mysqli_fetch_array($result)){  
        ?>
        
          <h4><?php echo "productCode: ".$row['productCode']."<br>ProductName: ".$row['productName']."<br>";
                    echo "productvendor: ".$row['productVendor']."<br>Productscale: ".$row['productScale']."<br>";
                    echo "Quentity: ".$row['quantityInStock']."<br>Buyprice: ".$row['buyPrice']."<br>";
                    echo"MSRP: ".$row['MSRP']
          
          ?></h4>
          <hr>
          
    <?php } ?>

        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
