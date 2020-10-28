<?php
include '../connect.php'; 

$sql = "select * from orders";
$result = mysqli_query($connect,$sql);
?>

<!doctype html>
<html lang="en">

  <head>
    <title>orderadmin</title>
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
            <a href="../indexemploy.php">HOME</a>
          </li>
        </ul>
      </nav>
    </div>

    <div class = "jumbotron">
    <h3>Order list</h3>
    </div>


    <form>
        <center>
            <table style="width:90%">
                <tr>
                    <th><center>Order Number</center></th>
                    <th><center>Order Date</center></th>
                    <th><center>Required Date</center></th>
                    <th><center>Shipped Date</center></th>
                    <th><center>Status</center></th>
                    <th><center>Comments</center></th>
                    <th><center>Customer Number</center></th>
                    <th><center>Edit</center></th>
                </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><center><?php echo $row[0];?></center></td>
                    <td><center><?php echo $row[1];?></center></td>
                    <td><center><?php echo $row[2];?></center></td>
                    <td><center><?php echo $row[3];?></center></td>
                    <td><center><?php echo $row[4];?></center></td>
                    <td><center><?php echo $row[5];?></center></td>
                    <td><center><?php echo $row[6];?></center></td>
                    <td><center><a href="editOrder.php?id=<?php echo $row[0]?>">Edit</a></center></td>
                </tr>
                <?php } ?>
            </table><br>

            <div class="row">
                <div class="column">
                  <a href="addOrder.php">
                    <input type="button" value="Add Order" />
                  </a>
                </div>

            </div>
            
        
        </center>
    </form>
    
            
        
          
        
    

        
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>