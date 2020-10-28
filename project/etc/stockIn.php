<?php
require'../connect.php';
$sql = "select * from stockin";
$result = mysqli_query($connect,$sql);
?>
<!doctype html>
<html lang="en">

  <head>
    <title>Stock in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
      .column {
        float: left;
        width: 33.33%;
        padding: 10px;
        height: 100px;
      }

      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      } 

      table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
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
            <a href="../indexemploy.php">Go back</a>
          </li>
        </ul>
      </nav>
    </div>

    <div class = "jumbotron">
        <h3>stock in</h3>
    </div>

    <form method="post" action="deleteStockIn.php">
        <center>
            <table style="width:90%">
                <tr>
                    <th><center>orderCode</center></th>
                    <th><center>productCode</center></th>
                    <th><center>amount</center></th>
                    <th><center>date</center></th>
                    <th><center>Delete</center></th>
                    <th><center>Edit</center></th>
                </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><center><?php echo $row[0];?></center></td>
                    <td><center><?php echo $row[1];?></center></td>
                    <td><center><?php echo $row[2];?></center></td>
                    <td><center><?php echo $row[3];?></center></td>
                    <td><center><a href="deleteStockIn.php?id=<?php echo $row[0]?>">Delete</a></center></td>
                    <td><center><a href="editStockIn.php?id=<?php echo $row[0]?>">Edit</a></center></td>
                </tr>
                <?php } ?>
            </table><br>

        </center>
    </form>
    
    <div class="container">
      <h3>Insert New Stock In</h3><br>
      <form method="POST" action='stockInFunc.php'>
          Enter Order Code: <input type = "text" name = 'orderCode' required > <br><br>
          Enter Product Code: <input type = "text" name = 'productCode'required > <br><br>
          Enter Amount: <input type = "number" name = 'amount'required > <br><br>

          <!-- date_default_timezone_set("Asia/Bangkok");-->
          Enter Date: <input type = "date" name = 'date'required > <br><br> 
          <input type="submit" value="SUBMIT"><br>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>