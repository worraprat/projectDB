<?php
include '../connect.php';
$con = mysqli_connect("localhost","root","","classicmodels");
$sql = "select * from products";
$result = mysqli_query($connect,$sql);
?>


<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title." | ".$name;?></title>
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
            <a href="index.php">HOME</a>
          </li>
        </ul>
      </nav>
    </div>
  
    <div class = "jumbotron">
        <h3><?php echo $name." Melon'z";?></h3>
    </div>
    

    <div class="row">
      <div class="column">   
        <a href = "product1.php">
          <center>
            <input type = "button" onclick="alert('Hello World!')" value="pdvender">
          </center>
        </a><br><br>
      </div>
      <div class="column">
        <a href = "product2.php" 
          <center>
            <input type = "button" onclick="alert('Hello World2!')" value="pdscale">
          </center>
      </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
