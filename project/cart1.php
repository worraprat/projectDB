<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<ul>
  <li><a class="active">Home</a></li>
  <li><a href="cart.php">ProductVender</a></li>
  <li><a href="cart3.php">Scale</a></li>
  <li><c>Logout</c></li>
  <li><b>User</b></li>
</ul>

<div class="sidenav">
<?php 

   require'./connect.php';

    $search=$_POST['search'];
    $sqls = "select * from products where productVendor like '%$search%'";
    $result1 = mysqli_query($connect,$sqls);

    $sql="select distinct productVendor from products Order by productVendor";
    $result=mysqli_query($connect,$sql);
    if($result){
        while($record=mysqli_fetch_array($result,MYSQLI_BOTH)){
            echo "<a>".$record[0]."<br>";

            echo "";

        }
        
    }
?>
</div>
<?php
session_start();
ob_start();
$sql="select * from products order by productVendor";
$result=mysqli_query($connect,$sql);
if(isset($_POST["add_product"])){
      if(isset($_SESSION["shopping_cart"]))
      {
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'               =>     $_GET["id"],
                     'item_name'               =>     $_POST["hidden_name"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'          =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
                echo '<script>window.location="cart.php"</script>';
           }
      }
      else
      {
           $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }
if(isset($_GET['action'])){
  if($_GET['action']=="delete"){
  foreach ($_SESSION['shopping_cart'] as $key => $value) {
    if($value['item_id']==$_GET['id']){
        unset($_SESSION['shopping_cart'][$key]);
        echo '<script>alert("ลบเรียบร้อย")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }
  }
}
?>

    <br><br><br><br>

    <div class="container" style="width:900px;margin-left:270px">

        <form method="post" action="cart1.php" align="center">
            <a></a></a>Search Product Vendor :</a>
            <input type="text" name="search">
            <input type="submit" name="Submit" value="search">
        </form>  
        <br>

        <!-- <form method="post" action="cart2.php" align="center">
            Search Product Scale : 
            <input type="text" name="search2">
            <input type="submit" name="Submit" value="search">
        </form>
        <br> -->
    <?php
        while($row=mysqli_fetch_array($result1)){
    ?>
    <div class="col-md-6" style="position:static;">
    <form method="post" action="cart.php?action=add&id=<?php echo $row['productCode'];?>">
        <div style="border:1px solid #127989;background-color: #F2F2F2;border-radius:5px;padding:15px;">
        <h4 class="text-info"style="margin-left:10px;margin-top:-2px;font-size:15px;">ProductVender : <?php echo $row['productVendor'];?></h4>
          <h4 class="text-info"style="margin-left:10px;font-size:15px;">Name : <?php echo $row['productName'];?></h4>
          <h4 class="text-success"style="margin-left:10px;font-size:15px;">Price: <?php echo number_format($row['MSRP'],2);?> Bath</h4>
          <h4 class="text-info" style="margin-left:10px;font-size:15px;" >Scale: <?php echo ($row['productScale']);?></h4>
          <input type="text" name="quantity" class="form-control"style="margin-top:15px;" value="1"/>
          <input type="hidden" name="hidden_name" value="<?php echo $row['productName'];?>"/>
          <input type="hidden" name="hidden_price" value="<?php echo $row['MSRP'];?>"/>
          <center>
          <input type="submit" name="add_product" style="margin-top:15px;" class="btn btn-info" value="Add to cart" />
          </center>
        </div>
        </form><br>
    </div>
    <?php
        }
    ?>
    <br>
    <div style="clear:both;"></div>
    <br>
      <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Delete</th>
        </tr>
        <?php
          if(!empty($_SESSION["shopping_cart"])){
              $total=0;
              foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
              <tr>
                <td style="text-align: left;"><?php echo $value['item_name'];?></td>
                <td><?php echo $value['item_quantity'];?></td>
                <td><?php echo number_format($value['item_price'],2);?></td>
                <td><?php echo number_format($value['item_price']*$value['item_quantity'],2);?></td>
                <td><a href="cart.php?action=delete&id=<?php echo $value['item_id'];?>">Delete Product</td>
              </tr>
          <?php
              $total=$total+($value['item_price']*$value['item_quantity']);
              }
          ?>
          <tr>
              <td colspan="3" align="right">Total Price</td>
              <td align="right"><?php echo number_format($total, 2); ?> ฿</td>
              <td><a href="orderInfo.php">Payment</a></td>
              </tr>
          <?php
          }
        ?>
      </table>
      <!-- <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?> -->
      </div>
    </div>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the side navigation */
.sidenav {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #686868;
  overflow-x: hidden;
  font-size:11.2px;
  margin-top:48px
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
/* .sidenav a:hover {
  background-color: #ddd;
  color: black;
  
} */

/* Style the content */
.content {
  margin-left: 160px;
  padding-left:40px;
  padding-top:60px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  width: 100%;
  
}



li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  float: left;
  
}

li a:hover:not(.active) {
  background-color: #111;
  text-decoration: none;
  color:white;
}

li b {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  float: right;
  
}
li c {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  float: right;
  
}

li c:hover:not(.active) {
  background-color: #A43733;
}

.active {
  background-color: #289E96;
  
}
.active:hover {
  text-decoration: none;
  color:white;
  background-color: #148981;
}
  

table {
  border-collapse: separate;
  width: 100%;
  
}
th, td {
  text-align: center;
  padding: 8px;
  
  
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4FCB9A;
  color: white;

}
h2 {
  font-size:22px;
  margin-top:8px
}
</style>